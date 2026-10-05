<x-layouts.app>
    <section class="specialty-hero">
        <div class="container-shell">
            <nav class="specialty-breadcrumb" aria-label="Breadcrumb">
                <a href="{{ route('home') }}">Home</a><span aria-hidden="true">/</span><span>Specialties</span>
            </nav>
            <span class="section-kicker mt-6">Personalized pathways to better health</span>
            <h1>Expert care, organized around what matters to you.</h1>
            <p>Explore our clinical specialties and find a thoughtful place to begin your care journey.</p>
            <div class="specialty-hero-actions">
                <a href="{{ route('appointments.create') }}" class="btn-primary">Book an appointment <span aria-hidden="true">↗</span></a>
                <a href="#specialty-list" class="btn-secondary">Explore specialties <span aria-hidden="true">↓</span></a>
            </div>
        </div>
    </section>
    <section class="mx-auto max-w-7xl px-6 py-16">
        <div id="specialty-list" class="mb-9 flex flex-wrap items-end justify-between gap-4">
            <div><span class="section-kicker">Find your care</span><h2 class="mt-3 font-serif text-4xl font-semibold text-navy-900">Explore specialties</h2></div>
            <p class="max-w-md text-sm leading-6 text-slate-500">{{ $specialties->total() }} focused pathways, each supported by clinicians who take time to listen.</p>
        </div>
        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($specialties as $specialty)
                <x-specialty-card :specialty="$specialty" />
            @endforeach
        </div>
        <div class="mt-10">{{ $specialties->links() }}</div>
    </section>
</x-layouts.app>
