@props(['label' => null, 'centered' => false])
<div class="{{ $centered ? 'text-center mx-auto max-w-2xl' : '' }}">
    @if ($label)
        <span class="section-label">{{ $label }}</span>
    @endif
    <h2 class="section-heading">{{ $slot }}</h2>
</div>
