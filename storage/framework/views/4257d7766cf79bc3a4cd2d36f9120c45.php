<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['service']));

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

foreach (array_filter((['service']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>
<a href="<?php echo e(route('services.show', $service)); ?>" class="premium-card group block overflow-hidden p-0"><div class="relative h-44 overflow-hidden"><img src="<?php echo e(asset('images/'.(['clinic-services.jpg','clinic-wellness.jpg','clinic-care.jpg'][$service->id % 3]))); ?>" alt="<?php echo e($service->title); ?>" class="h-full w-full object-cover transition duration-700 group-hover:scale-105"><div class="absolute inset-0 bg-gradient-to-t from-navy-900/65 via-navy-900/5 to-transparent"></div><span class="absolute bottom-4 left-5 grid h-11 w-11 place-items-center rounded-2xl bg-white text-xl font-black text-primary-600 shadow-lg">+</span></div><div class="p-7"><h3 class="text-xl font-extrabold text-navy-900"><?php echo e($service->title); ?></h3><p class="mt-3 line-clamp-3 text-sm leading-7 text-slate-500"><?php echo e($service->short_description); ?></p><span class="mt-6 inline-flex items-center gap-2 text-sm font-extrabold text-primary-700">Explore service <b class="transition group-hover:translate-x-1">→</b></span></div></a>
<?php /**PATH C:\ITprojects\medicare-laravel\resources\views\components\service-card.blade.php ENDPATH**/ ?>