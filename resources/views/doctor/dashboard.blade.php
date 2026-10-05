<x-portal-shell title="Doctor Dashboard" eyebrow="DOCTOR PORTAL">
<div>
 <div class="mb-7 flex flex-col justify-between gap-4 md:flex-row md:items-end">
  <div><span class="section-label">DOCTOR PORTAL</span><h1 class="section-heading !mt-3 !text-4xl">Good morning, Dr. {{ $doctor->name }}</h1><p class="mt-3 text-slate-500">Manage your appointments, patients and clinical records from one secure workspace.</p></div>
  <a href="{{ route('doctor.reports') }}" class="btn-primary">Medical Reports <span>↗</span></a>
 </div>
 <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-5">
  @foreach([['Patients',$totalPatients,'users'],["Today's appointments",$todayAppointments,'calendar'],['Upcoming',$upcomingAppointments,'clock'],['Completed',$completedAppointments,'check'],['Pending',$pendingAppointments,'pending']] as $stat)
   <div class="stat-card"><p class="text-sm font-bold text-slate-500">{{ $stat[0] }}</p><p class="mt-2 text-3xl font-extrabold text-navy-900">{{ $stat[1] }}</p><p class="mt-2 text-xs font-semibold text-primary-600">Live from database</p></div>
  @endforeach
 </div>
 <div class="mt-6 grid gap-6 xl:grid-cols-[1.35fr_.65fr]">
  <section class="soft-panel p-6">
   <div class="flex items-center justify-between"><div><p class="section-label">SCHEDULE</p><h2 class="mt-3 text-xl font-extrabold text-navy-900">Recent appointments</h2></div><a href="{{route('doctor.appointments')}}" class="text-sm font-extrabold text-primary-700">View all</a></div>
   <div class="mt-5 divide-y divide-slate-100">
    @forelse($recentAppointments as $a)
     <div class="flex items-center justify-between gap-4 py-4"><div><p class="font-bold text-navy-900">{{ $a->patient?->name ?? $a->patient_name }}</p><p class="text-sm text-slate-500">{{ $a->appointment_date->format('d M Y') }} · {{ substr($a->appointment_time,0,5) }}</p></div><span class="rounded-full bg-primary-50 px-3 py-1 text-xs font-bold text-primary-700">{{ ucfirst($a->status) }}</span></div>
    @empty <div class="py-12 text-center text-sm text-slate-500">No appointments yet.</div>@endforelse
   </div>
  </section>
  <section class="soft-panel p-6"><p class="section-label">QUICK ACTIONS</p><h2 class="mt-3 text-xl font-extrabold text-navy-900">Clinical tools</h2>
   <div class="mt-5 grid gap-3">
    <a href="{{route('doctor.patients')}}" class="btn-secondary justify-between">View Patients <span>→</span></a>
    <a href="{{route('doctor.appointments')}}" class="btn-secondary justify-between">Today's Appointments <span>→</span></a>
    <a href="{{route('doctor.reports')}}" class="btn-secondary justify-between">Medical Reports <span>→</span></a>
    <a href="{{route('doctor.profile')}}" class="btn-secondary justify-between">My Profile <span>→</span></a>
   </div>
  </section>
 </div>
</div>
</x-portal-shell>
