<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['post']));

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

foreach (array_filter((['post']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>
<a href="<?php echo e(route('blog.show', $post)); ?>" class="card group block overflow-hidden">
    <div class="h-44 rounded-2xl bg-gradient-to-br from-primary-100 to-accent-400/20"></div>
    <span class="mt-4 inline-block section-label"><?php echo e($post->category->name ?? ''); ?></span>
    <h3 class="mt-2 text-lg font-bold text-navy-900 group-hover:text-primary-600"><?php echo e($post->title); ?></h3>
    <p class="mt-2 text-sm text-slate-500"><?php echo e($post->excerpt); ?></p>
</a>
<?php /**PATH C:\ITprojects\medicare-laravel\resources\views\components\blog-card.blade.php ENDPATH**/ ?>