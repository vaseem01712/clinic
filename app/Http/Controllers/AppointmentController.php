<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Mail\AppointmentConfirmationMail;
use App\Mail\DoctorAppointmentMail;
use App\Models\Appointment;
use App\Models\DeviceToken;
use App\Models\Doctor;
use App\Models\Service;
use App\Models\Specialty;
use App\Models\User;
use App\Notifications\AppointmentStatusNotification;
use App\Services\AccountAccessService;
use App\Services\UserNotificationService;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AppointmentController extends Controller
{
    public function create()
    {
        return view('appointments.create', [
            'specialties'=>Specialty::where('is_active',true)->get(),
            'doctors'=>Doctor::where('is_active',true)->with('specialty')->get(),
            'services'=>Service::where('is_active',true)->get(),
        ]);
    }

    public function store(StoreAppointmentRequest $request, AccountAccessService $access, UserNotificationService $notifications)
    {
        $data=$request->validated();
        $deviceToken=$data['device_token'] ?? null;
        unset($data['device_token']);
        $doctor=Doctor::whereKey($data['doctor_id'])->where('is_active',true)->firstOrFail();
        // The doctor is authoritative: keep care area in sync even if a stale form value is submitted.
        $data['specialty_id'] = $doctor->specialty_id;
        $existing=User::where('email',$data['patient_email'])->first();

        if ($existing && ! $existing->isPatient()) {
            return back()->withErrors(['patient_email'=>'This email is already associated with a staff account. Please use another patient email.'])->withInput();
        }

        if (auth()->check()) {
            abort_unless(auth()->user()->isPatient(),403);
            $patient=auth()->user();
            $data['patient_name']=$patient->name;
            $data['patient_email']=$patient->email;
            $data['patient_phone']=$patient->phone ?: ($data['patient_phone'] ?? null);
        } else {
            $patient=$existing;
            if (! $patient) {
                $patient=DB::transaction(function() use ($data) {
                    return User::create([
                        'name'=>$data['patient_name'],'email'=>$data['patient_email'],
                        'phone'=>$data['patient_phone'] ?? null,
                        'password'=>Hash::make(Str::random(48)),
                        'role'=>'patient',
                    ]);
                });
            }
        }

        try {
            $appointment=DB::transaction(function() use ($data,$patient,$doctor) {
                return Appointment::create([
                    ...$data,'patient_id'=>$patient->id,'doctor_id'=>$doctor->id,'status'=>'pending',
                ]);
            });
        } catch (QueryException $e) {
            if ((string)$e->getCode()==='23000') {
                return back()->withErrors(['appointment_time'=>'This appointment slot was just booked. Please choose another time.'])->withInput();
            }
            throw $e;
        }

        if ($deviceToken) {
            DeviceToken::updateOrCreate(['token_hash' => hash('sha256', $deviceToken)], [
                'user_id' => $patient->id,
                'token' => $deviceToken,
                'platform' => 'web',
                'last_seen_at' => now(),
            ]);
        }

        if (!auth()->check() && $patient->wasRecentlyCreated) {
            try { $access->sendSetup($patient,'Patient Dashboard'); } catch (\Throwable $mailError) { report($mailError); }
            $request->session()->put('appointment_push_patient_id', $patient->id);
        }
        $appointment->load(['doctor','service','patient']);
        $notifications->send($patient, 'appointment', 'Appointment request received', "Your appointment with {$doctor->name} is awaiting confirmation.", route('appointments.success', $appointment));
        try { Mail::to($patient->email)->send(new AppointmentConfirmationMail($appointment)); } catch (\Throwable $mailError) { report($mailError); }

        $doctorUser = $doctor->user;
        if ($doctorUser) {
            $notifications->send($doctorUser, 'appointment', 'New appointment request', "{$appointment->patient_name} booked {$appointment->appointment_date->format('d M')} at {$appointment->appointment_time}.", route('doctor.appointments'));
            if ($doctorUser->email) {
                try { Mail::to($doctorUser->email)->send(new DoctorAppointmentMail($appointment)); } catch (\Throwable $mailError) { report($mailError); }
            }
        }

        return redirect()->route('appointments.success',$appointment)
            ->with('success','Your appointment request has been received. A confirmation email has been sent.');
    }

    public function success(Appointment $appointment)
    {
        return view('appointments.success', compact('appointment'));
    }
}
