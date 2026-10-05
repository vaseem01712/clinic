@props(['post'])
<a href="{{ route('blog.show', $post) }}" class="card group block overflow-hidden">
    <div class="h-44 rounded-2xl bg-gradient-to-br from-primary-100 to-accent-400/20"></div>
    <span class="mt-4 inline-block section-label">{{ $post->category->name ?? '' }}</span>
    <h3 class="mt-2 text-lg font-bold text-navy-900 group-hover:text-primary-600">{{ $post->title }}</h3>
    <p class="mt-2 text-sm text-slate-500">{{ $post->excerpt }}</p>
</a>
