<x-portal-shell title="Upload Report">
<div class="mb-7"><span class="section-label">MEDICAL REPORT</span><h1 class="section-heading !mt-3 !text-4xl">Upload report for {{ $patient->name }}</h1><p class="mt-3 text-slate-500">PDF, JPG, JPEG, PNG, DOC and DOCX · maximum 10 MB.</p></div>
@if($errors->any())<div class="mb-5 rounded-2xl bg-red-50 p-4 text-sm font-semibold text-red-700">{{$errors->first()}}</div>@endif
<form method="POST" action="{{route('doctor.reports.store')}}" enctype="multipart/form-data" class="soft-panel grid gap-5 p-6 sm:grid-cols-2">@csrf<input type="hidden" name="patient_id" value="{{$patient->id}}">
<div class="sm:col-span-2"><label class="label">Report title</label><input name="title" required class="input-field" placeholder="e.g. Complete Blood Count"></div>
<div><label class="label">Test type</label><input name="test_type" class="input-field" placeholder="Blood test"></div>
<div><label class="label">Report date</label><input name="report_date" type="date" value="{{now()->toDateString()}}" required class="input-field"></div>
<div class="sm:col-span-2"><label class="label">Appointment (optional)</label><select name="appointment_id" class="input-field"><option value="">Select appointment</option>@foreach($appointments as $a)<option value="{{$a->id}}">{{$a->appointment_date->format('d M Y')}} · {{substr($a->appointment_time,0,5)}}</option>@endforeach</select></div>
<div class="sm:col-span-2"><label class="label">Description / notes</label><textarea name="description" rows="4" class="input-field"></textarea></div>
<div class="sm:col-span-2"><label class="label">Secure file</label><input name="file" type="file" required accept=".pdf,.jpg,.jpeg,.png,.doc,.docx" class="input-field"></div>
<div class="sm:col-span-2 flex justify-end gap-3"><a href="{{route('doctor.patient.show',$patient)}}" class="btn-secondary">Cancel</a><button class="btn-primary">Upload & Send to Patient</button></div>
</form>
</x-portal-shell>
