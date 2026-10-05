@props(['specialty'])
<a href="{{ route('specialties.show', $specialty) }}" class="card group block">
    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-accent-400/10 text-accent-600 transition group-hover:bg-primary-600 group-hover:text-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
        </svg>
    </div>
    <h3 class="mt-4 text-lg font-bold text-navy-900">{{ $specialty->name }}</h3>
    <p class="mt-2 text-sm text-slate-500 line-clamp-2">{{ $specialty->description }}</p>
    <span class="mt-4 inline-flex items-center gap-1 font-semibold text-primary-600 group-hover:gap-2 transition-all">
        Explore <span aria-hidden="true">→</span>
    </span>
</a>
