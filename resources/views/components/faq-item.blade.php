@props(['faq'])
<div x-data="{ open: false }" class="rounded-2xl border border-slate-100">
    <button @click="open = !open" class="flex w-full items-center justify-between p-5 text-left font-semibold text-navy-900">
        {{ $faq->question }}
        <span :class="open ? 'rotate-45' : ''" class="text-2xl text-primary-600 transition-transform">+</span>
    </button>
    <div x-show="open" x-collapse class="px-5 pb-5 text-slate-500">{{ $faq->answer }}</div>
</div>
