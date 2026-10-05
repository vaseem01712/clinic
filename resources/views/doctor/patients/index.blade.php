<x-portal-shell title="Patients">
<div class="mb-7"><span class="section-label">PATIENTS</span><h1 class="section-heading !mt-3 !text-4xl">Your patients</h1><p class="mt-3 text-slate-500">Only patients associated with your appointments are visible here.</p></div>
<form class="mb-5 flex gap-3"><input name="q" value="{{request('q')}}" class="input-field max-w-md" placeholder="Search by patient name or email"><button class="btn-primary">Search</button></form>
<div class="soft-panel overflow-hidden">
 <div class="overflow-x-auto"><table class="w-full text-left text-sm"><thead class="bg-slate-50 text-xs font-extrabold uppercase tracking-wider text-slate-400"><tr><th class="px-5 py-4">Patient</th><th class="px-5 py-4">Appointments</th><th class="px-5 py-4">Last visit</th><th class="px-5 py-4"></th></tr></thead><tbody class="divide-y divide-slate-100">
 @forelse($patients as $p)<tr><td class="px-5 py-5"><p class="font-bold text-navy-900">{{ $p->name }}</p><p class="text-xs text-slate-500">{{ $p->email }}</p></td><td class="px-5 py-5">{{ $p->appointments_count }}</td><td class="px-5 py-5">{{ optional($p->appointments->first()?->appointment_date)->format('d M Y') ?? '—' }}</td><td class="px-5 py-5 text-right"><a class="font-extrabold text-primary-700" href="{{route('doctor.patient.show',$p)}}">Open →</a></td></tr>
 @empty<tr><td colspan="4" class="px-5 py-14 text-center text-slate-500">No authorized patients found.</td></tr>@endforelse
 </tbody></table></div>
 <div class="border-t border-slate-100 p-4">{{ $patients->links() }}</div>
</div>
</x-portal-shell>
