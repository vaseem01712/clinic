<x-portal-shell title="Medical Record">
<div class="mb-7"><span class="section-label">CLINICAL RECORD</span><h1 class="section-heading !mt-3 !text-4xl">New record · {{ $patient->name }}</h1><p class="mt-3 text-slate-500">Internal notes remain private; patient-visible notes are shown in the patient portal.</p></div>
@if($errors->any())<div class="mb-5 rounded-2xl bg-red-50 p-4 text-sm font-semibold text-red-700">{{$errors->first()}}</div>@endif
<form method="POST" action="{{route('doctor.records.store')}}" class="soft-panel grid gap-5 p-6 sm:grid-cols-2">@csrf<input type="hidden" name="patient_id" value="{{$patient->id}}">
@foreach([['diagnosis','Diagnosis'],['symptoms','Symptoms'],['clinical_notes','Clinical notes'],['prescription','Prescription'],['treatment_plan','Treatment plan'],['follow_up_instructions','Follow-up instructions'],['test_recommendations','Test recommendations'],['medical_history','Medical history'],['visit_notes','Visit notes'],['doctor_notes','Internal doctor notes'],['patient_visible_notes','Patient-visible notes']] as $field)
<div class="{{in_array($field[0],['clinical_notes','prescription','treatment_plan','medical_history','doctor_notes','patient_visible_notes'])?'sm:col-span-2':''}}"><label class="label">{{$field[1]}}</label><textarea name="{{$field[0]}}" rows="4" class="input-field"></textarea></div>
@endforeach
<div class="sm:col-span-2 flex justify-end"><button class="btn-primary">Save Clinical Record</button></div>
</form>
</x-portal-shell>
