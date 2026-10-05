<x-layouts.app>
    <section class="specialty-hero">
        <div class="container-shell">
            <nav class="specialty-breadcrumb" aria-label="Breadcrumb">
                <a href="{{ route('home') }}">Home</a><span aria-hidden="true">/</span><a href="{{ route('specialties.index') }}">Specialties</a><span aria-hidden="true">/</span><span>{{ $specialty->name }}</span>
            </nav>
            <span class="section-kicker mt-6">Specialist care</span>
            <h1>{{ $specialty->name }}</h1>
            <p>{{ $specialty->description ?: 'A considered approach to your health, supported by experienced clinicians and clear next steps.' }}</p>
            <div class="specialty-hero-actions">
                <a href="{{ route('appointments.create') }}" class="btn-primary">Book an appointment <span aria-hidden="true">↗</span></a>
                <a href="#specialty-care-team" class="btn-secondary">Meet the care team <span aria-hidden="true">↓</span></a>
            </div>
            <div class="mt-7 flex flex-wrap gap-x-7 gap-y-2 text-xs font-semibold text-white/75">
                <span>{{ $specialty->doctors->count() }} {{ \Illuminate\Support\Str::plural('specialist', $specialty->doctors->count()) }}</span>
                <span>{{ $specialty->services->count() }} care services</span>
                <span>Personalized care, close to home</span>
            </div>
        </div>
    </section>
    <section id="specialty-care-team" class="mx-auto max-w-7xl px-6 py-16">
        <h2 class="text-xl font-bold text-navy-900">Doctors</h2>
        <div class="mt-6 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @forelse ($specialty->doctors as $doctor)
                <x-doctor-card :doctor="$doctor" />
            @empty
                <p class="text-slate-500">No doctors found for this specialty yet.</p>
            @endforelse
        </div>

        <h2 class="mt-14 text-xl font-bold text-navy-900">Services</h2>
        <div class="mt-6 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($specialty->services as $service)
                <x-service-card :service="$service" />
            @empty
                <p class="text-slate-500">No services found for this specialty yet.</p>
            @endforelse
        </div>

        <x-button :href="route('appointments.create')" class="mt-14">Book Appointment</x-button>
    </section>
</x-layouts.app>
