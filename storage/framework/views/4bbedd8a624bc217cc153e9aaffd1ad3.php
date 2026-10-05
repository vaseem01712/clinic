<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['faq']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['faq']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>
<div x-data="{ open: false }" class="rounded-2xl border border-slate-100">
    <button @click="open = !open" class="flex w-full items-center justify-between p-5 text-left font-semibold text-navy-900">
        <?php echo e($faq->question); ?>

        <span :class="open ? 'rotate-45' : ''" class="text-2xl text-primary-600 transition-transform">+</span>
    </button>
    <div x-show="open" x-collapse class="px-5 pb-5 text-slate-500"><?php echo e($faq->answer); ?></div>
</div>
<?php /**PATH C:\ITprojects\medicare-laravel\resources\views\components\faq-item.blade.php ENDPATH**/ ?>