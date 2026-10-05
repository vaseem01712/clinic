<?php
namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Services\AuditLogService;
use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    public function create(\App\Models\User $patient)
    {
        $user=auth()->user(); abort_unless($user && $user->isDoctor() && $user->doctor?->is_active,403); $doctor=$user->doctor;
        abort_unless($doctor->appointments()->where('patient_id',$patient->id)->exists(),403);
        return view('doctor.records.create',compact('patient'));
    }

    public function store(Request $request, AuditLogService $audit)
    {
        $user=auth()->user(); abort_unless($user && $user->isDoctor() && $user->doctor?->is_active,403); $doctor=$user->doctor;
        $data=$request->validate([
            'patient_id'=>['required','exists:users,id'],'appointment_id'=>['nullable','exists:appointments,id'],
            'diagnosis'=>['nullable','string','max:10000'],'symptoms'=>['nullable','string','max:10000'],
            'clinical_notes'=>['nullable','string','max:20000'],'prescription'=>['nullable','string','max:20000'],
            'treatment_plan'=>['nullable','string','max:20000'],'follow_up_instructions'=>['nullable','string','max:10000'],
            'test_recommendations'=>['nullable','string','max:10000'],'medical_history'=>['nullable','string','max:20000'],
            'visit_notes'=>['nullable','string','max:20000'],'doctor_notes'=>['nullable','string','max:20000'],
            'patient_visible_notes'=>['nullable','string','max:10000'],
        ]);
        abort_unless($doctor->appointments()->where('patient_id',$data['patient_id'])->exists(),403);
        $record=MedicalRecord::create(array_merge($data,['doctor_id'=>$doctor->id]));
        $audit->record('medical_record_updated',$record,$request->user());
        return redirect()->route('doctor.patient.show',$data['patient_id'])->with('success','Medical record saved securely.');
    }
}
