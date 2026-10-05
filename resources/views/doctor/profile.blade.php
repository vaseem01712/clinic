<x-portal-shell title="Doctor Profile">
<div class="mb-7"><span class="section-label">PROFILE</span><h1 class="section-heading !mt-3 !text-4xl">Your professional profile</h1><p class="mt-3 text-slate-500">Keep the information patients see on the public doctor profile accurate.</p></div>
<form method="POST" action="{{route('doctor.profile.update')}}" enctype="multipart/form-data" class="soft-panel grid gap-5 p-6 sm:grid-cols-2">@csrf @method('PUT')
<div><label class="label">Name</label><input name="name" value="{{$doctor->name}}" required class="input-field"></div>
<div><label class="label">Email</label><input value="{{$user->email}}" disabled class="input-field bg-slate-50"></div>
<div><label class="label">Phone</label><input name="phone" value="{{$doctor->phone}}" class="input-field"></div>
<div><label class="label">Specialization</label><input value="{{$doctor->specialty?->name}}" disabled class="input-field bg-slate-50"></div>
<div><label class="label">Qualification</label><input name="education" value="{{$doctor->education}}" class="input-field"></div>
<div><label class="label">Experience (years)</label><input name="experience_years" type="number" min="0" value="{{$doctor->experience_years}}" required class="input-field"></div>
<div class="sm:col-span-2"><label class="label">Bio</label><textarea name="biography" rows="6" class="input-field">{{$doctor->biography}}</textarea></div>
<div><label class="label">Current password</label><input name="current_password" type="password" class="input-field" autocomplete="current-password"></div><div><label class="label">New password</label><input name="password" type="password" class="input-field" autocomplete="new-password"></div><div><label class="label">Confirm new password</label><input name="password_confirmation" type="password" class="input-field" autocomplete="new-password"></div><div class="sm:col-span-2"><label class="label">Profile photo</label><input name="photo" type="file" accept="image/*" class="input-field"></div>
<div class="sm:col-span-2 flex justify-end"><button class="btn-primary">Save Profile</button></div>
</form>
</x-portal-shell>
