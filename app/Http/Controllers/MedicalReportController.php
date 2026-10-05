<?php
namespace App\Http\Controllers;

use App\Mail\MedicalReportMail;
use App\Models\Appointment;
use App\Models\MedicalReport;
use App\Models\Notification;
use App\Services\AuditLogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class MedicalReportController extends Controller
{
    private function doctor() { $user=auth()->user(); abort_unless($user && $user->isDoctor() && $user->doctor?->is_active,403); return $user->doctor; }

    public function index()
    {
        $reports=$this->doctor()->reports()->with('patient')->latest()->paginate(15);
        return view('doctor.reports.index',compact('reports'));
    }

    public function create(\App\Models\User $patient)
    {
        $doctor=$this->doctor();
        abort_unless($doctor->appointments()->where('patient_id',$patient->id)->exists(),403);
        $appointments=$doctor->appointments()->where('patient_id',$patient->id)->latest('appointment_date')->get();
        return view('doctor.reports.create',compact('patient','appointments'));
    }

    public function store(Request $request, AuditLogService $audit)
    {
        $doctor=$this->doctor();
        $data=$request->validate([
            'patient_id'=>['required','exists:users,id'],
            'appointment_id'=>['nullable','exists:appointments,id'],
            'title'=>['required','string','max:255'],
            'test_type'=>['nullable','string','max:150'],
            'description'=>['nullable','string','max:5000'],
            'report_date'=>['required','date'],
            'file'=>['required','file','mimes:pdf,jpg,jpeg,png,doc,docx','max:10240'],
        ]);
        abort_unless($doctor->appointments()->where('patient_id',$data['patient_id'])->exists(),403);
        if(!empty($data['appointment_id'])) abort_unless($doctor->appointments()->whereKey($data['appointment_id'])->where('patient_id',$data['patient_id'])->exists(),403);
        $file=$request->file('file');
        $path=$file->store('medical-reports','local');
        $report=MedicalReport::create([
            'patient_id'=>$data['patient_id'],'doctor_id'=>$doctor->id,'appointment_id'=>$data['appointment_id']??null,
            'title'=>$data['title'],'test_type'=>$data['test_type']??null,'description'=>$data['description']??null,
            'report_date'=>$data['report_date'],'file_path'=>$path,'file_name'=>$file->getClientOriginalName(),
            'mime_type'=>$file->getMimeType(),'file_size'=>$file->getSize(),'status'=>'sent','sent_at'=>now(),
        ]);
        Notification::create(['user_id'=>$report->patient_id,'type'=>'medical_report','title'=>'New medical report','message'=>'A new medical report has been added to your account.','action_url'=>route('patient.reports')]);
        $patient=$report->patient;
        if($patient?->email) { try { Mail::to($patient->email)->send(new MedicalReportMail($report,route('dashboard'))); } catch (\Throwable $mailError) { report($mailError); } }
        $audit->record('medical_report_uploaded',$report,$request->user());
        return redirect()->route('doctor.patient.show',$patient)->with('success','Report uploaded and securely sent to the patient.');
    }

    public function download(MedicalReport $report, AuditLogService $audit)
    {
        $user=auth()->user();
        if($user->isPatient()) abort_unless($report->patient_id===$user->id,403);
        elseif($user->isDoctor()) {
            $doctor=$user->doctor;
            abort_unless($report->doctor_id===$doctor?->id && $doctor->appointments()->where('patient_id',$report->patient_id)->exists(),403);
        } else abort_unless($user->isAdmin(),403);
        abort_unless(Storage::disk('local')->exists($report->file_path),404);
        $audit->record($user->isPatient() ? 'medical_report_viewed_by_patient' : 'medical_report_downloaded', $report, $user);
        return Storage::disk('local')->download($report->file_path,$report->file_name,['Content-Type'=>$report->mime_type]);
    }
}
