@props(['plan'])
<div class="card {{ $plan->is_recommended ? 'ring-2 ring-primary-600 scale-105' : '' }}">
    @if ($plan->is_recommended)
        <span class="section-label">Recommended</span>
    @endif
    <h3 class="mt-2 text-xl font-bold text-navy-900">{{ $plan->name }}</h3>
    <p class="mt-2 text-3xl font-extrabold text-primary-600">${{ number_format($plan->price, 0) }}<span class="text-base font-medium text-slate-400">/{{ $plan->billing_period }}</span></p>
    <ul class="mt-4 space-y-2 text-sm text-slate-600">
        @foreach ($plan->features as $feature)
            <li class="flex items-center gap-2">✓ {{ $feature }}</li>
        @endforeach
    </ul>
    <a href="{{ route('appointments.create') }}" class="btn-primary mt-6 w-full justify-center">Choose Plan</a>
</div>
