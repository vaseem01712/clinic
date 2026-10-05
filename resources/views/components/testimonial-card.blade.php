@props(['testimonial'])
<div class="card">
    <div class="flex items-center gap-1 text-amber-400">
        @for ($i = 0; $i < $testimonial->rating; $i++) ★ @endfor
    </div>
    <p class="mt-4 text-slate-600">"{{ $testimonial->review }}"</p>
    <p class="mt-4 font-semibold text-navy-900">{{ $testimonial->patient_name }}</p>
</div>
