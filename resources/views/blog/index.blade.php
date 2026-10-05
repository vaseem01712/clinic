<x-layouts.app>
    <section class="mx-auto max-w-7xl px-6 py-16">
        <x-section-heading label="Blog" centered>Health Insights & News</x-section-heading>
        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($posts as $post)
                <x-blog-card :post="$post" />
            @endforeach
        </div>
        <div class="mt-10">{{ $posts->links() }}</div>
    </section>
</x-layouts.app>
