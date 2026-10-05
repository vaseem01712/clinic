<x-layouts.app>
    <section class="mx-auto max-w-2xl px-6 py-24 text-center">
        <p class="text-7xl font-extrabold text-primary-600">404</p>
        <h1 class="section-heading mt-4">Looks like this page needs medical attention.</h1>
        <div class="mt-8 flex justify-center gap-4">
            <x-button :href="route('home')">Back Home</x-button>
            <x-button variant="secondary" :href="route('doctors.index')">Find a Doctor</x-button>
        </div>
    </section>
</x-layouts.app>
