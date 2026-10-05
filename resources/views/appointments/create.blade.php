<x-layouts.app>
  <section class="page-hero py-16 sm:py-20">
    <div class="container-shell grid items-start gap-10 lg:grid-cols-[.82fr_1.18fr]">
      <div class="lg:pt-8">
        <span class="section-label"><span class="eyebrow-dot"></span> Simple online booking</span>
        <h1 class="section-heading text-balance">Book a visit that fits your day.</h1>
        <p class="section-copy">Choose your doctor and preferred time. We will email your request immediately, then send helpful reminders before your visit.</p>
        <div class="mt-8 space-y-4">
          @foreach ([['01','Choose your doctor','A small, trusted clinical team.'],['02','Pick a suitable time','Available slots are protected from double booking.'],['03','Receive your confirmation','You and your doctor get an email right away.']] as $item)
            <div class="flex gap-4"><span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-primary-600 text-xs font-extrabold text-white">{{ $item[0] }}</span><div><p class="font-extrabold text-navy-900">{{ $item[1] }}</p><p class="mt-1 text-sm text-slate-500">{{ $item[2] }}</p></div></div>
          @endforeach
        </div>
      </div>
      <div class="soft-panel p-6 sm:p-8">
        <div class="mb-7 flex items-center justify-between"><div><p class="text-xs font-extrabold uppercase tracking-[.16em] text-primary-600">New appointment</p><h2 class="mt-1 text-2xl font-extrabold text-navy-900">Tell us about your visit</h2></div><span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-accent-50 text-accent-600">✦</span></div>
        @if ($errors->any())<div class="mb-5 rounded-2xl border border-red-100 bg-red-50 p-4 text-sm font-medium text-red-700"><ul class="list-disc space-y-1 pl-5">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
        <form id="appointment-form" action="{{ route('appointments.store') }}" method="POST" class="grid gap-5 sm:grid-cols-2">
          @csrf
          <label><span class="label">Care area</span><select id="appointment-specialty" name="specialty_id" class="input-field" required><option value="">Select care area</option>@foreach ($specialties as $s)<option value="{{ $s->id }}" @selected(old('specialty_id') == $s->id)>{{ $s->name }}</option>@endforeach</select></label>
          <label><span class="label">Your doctor</span><select id="appointment-doctor" name="doctor_id" class="input-field" required><option value="">Select doctor</option>@foreach ($doctors as $d)<option value="{{ $d->id }}" data-specialty="{{ $d->specialty_id }}" @selected(old('doctor_id') == $d->id)>{{ $d->name }}</option>@endforeach</select><span id="doctor-help" class="mt-2 block text-xs font-semibold text-slate-400">Select a care area to see matching doctors.</span></label>
          <label><span class="label">Appointment type</span><select name="service_id" class="input-field"><option value="">General consultation</option>@foreach ($services as $s)<option value="{{ $s->id }}" @selected(old('service_id') == $s->id)>{{ $s->title }}</option>@endforeach</select></label>
          <label><span class="label">Preferred date</span><input type="date" name="appointment_date" value="{{ old('appointment_date') }}" min="{{ now()->toDateString() }}" required class="input-field"></label>
          <label><span class="label">Preferred time</span><input type="time" name="appointment_time" value="{{ old('appointment_time') }}" required class="input-field"></label>
          <label><span class="label">Phone number</span><input type="tel" name="patient_phone" value="{{ old('patient_phone') }}" placeholder="+91" class="input-field"></label>
          <label><span class="label">Full name</span><input type="text" name="patient_name" value="{{ old('patient_name', auth()->user()->name ?? '') }}" placeholder="Your full name" required class="input-field"></label>
          <label><span class="label">Email address</span><input type="email" name="patient_email" value="{{ old('patient_email', auth()->user()->email ?? '') }}" placeholder="you@example.com" required class="input-field"></label>
          <label class="sm:col-span-2"><span class="label">How can we help? <em class="font-medium text-slate-400">optional</em></span><textarea name="message" class="input-field min-h-28 resize-y" placeholder="A short note for your doctor">{{ old('message') }}</textarea></label>
          <button type="submit" class="btn-primary sm:col-span-2 py-4">Request appointment <span class="text-lg">→</span></button>
          <p class="sm:col-span-2 text-center text-xs leading-5 text-slate-400">Your request is private. You will receive an email confirmation and appointment reminders.</p>
        </form>
        <script>
          (() => {
            const specialty = document.getElementById('appointment-specialty');
            const doctor = document.getElementById('appointment-doctor');
            const hint = document.getElementById('doctor-help');
            if (!specialty || !doctor) return;
            const filterDoctors = () => {
              const careId = specialty.value;
              [...doctor.options].forEach(option => {
                if (!option.value) return;
                option.hidden = Boolean(careId && option.dataset.specialty !== careId);
              });
              const selected = doctor.options[doctor.selectedIndex];
              if (selected?.value && selected.dataset.specialty !== careId) doctor.value = '';
              hint.textContent = careId ? 'Only doctors in this care area are shown.' : 'Select a care area to see matching doctors.';
            };
            specialty.addEventListener('change', filterDoctors);
            doctor.addEventListener('change', () => {
              const selected = doctor.options[doctor.selectedIndex];
              if (selected?.dataset.specialty) { specialty.value = selected.dataset.specialty; filterDoctors(); }
            });
            filterDoctors();
          })();
        </script>
      </div>
    </div>
  </section>
</x-layouts.app>
