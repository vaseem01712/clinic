@props(['variant' => 'primary', 'href' => null])
@php $classes = $variant === 'primary' ? 'btn-primary' : 'btn-secondary'; @endphp
@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>
@else
    <button {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</button>
@endif
