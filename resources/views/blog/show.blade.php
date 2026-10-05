<x-layouts.app>
    <article class="mx-auto max-w-3xl px-6 py-16">
        <span class="section-label">{{ $post->category->name ?? '' }}</span>
        <h1 class="section-heading">{{ $post->title }}</h1>
        <p class="mt-2 text-sm text-slate-400">By {{ $post->author }} &middot; {{ $post->published_at?->format('d M Y') }}</p>
        <div class="prose mt-8 max-w-none text-slate-600">{!! $post->content !!}</div>

        @if ($related->isNotEmpty())
            <h2 class="mt-16 text-xl font-bold text-navy-900">Related Articles</h2>
            <div class="mt-6 grid gap-6 sm:grid-cols-3">
                @foreach ($related as $r) <x-blog-card :post="$r" /> @endforeach
            </div>
        @endif
    </article>
</x-layouts.app>
