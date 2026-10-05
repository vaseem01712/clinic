@props(['type' => 'success'])
<div {{ $attributes->merge(['class' => 'rounded-xl p-4 text-sm ' . ($type === 'success' ? 'bg-green-50 text-green-700' : 'bg-red-50 text-red-700')]) }}>
    {{ $slot }}
</div>
