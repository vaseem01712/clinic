<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['doctor']));

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

foreach (array_filter((['doctor']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>
<a href="<?php echo e(route('doctors.show', $doctor)); ?>" class="premium-card group block overflow-hidden p-0">
  <div class="relative h-64 overflow-hidden bg-gradient-to-br from-primary-100 to-accent-100"><img src="<?php echo e($doctor->photo ? asset('storage/'.$doctor->photo) : asset('images/'.(['clinic-consultation.jpg','clinic-care.jpg','clinic-wellness.jpg'][$doctor->id % 3]))); ?>" alt="<?php echo e($doctor->name); ?>" class="h-full w-full object-cover transition duration-700 group-hover:scale-105"><div class="absolute inset-0 bg-gradient-to-t from-navy-900/45 via-transparent to-transparent"></div><span class="absolute left-4 top-4 rounded-full bg-white/90 px-3 py-1.5 text-xs font-bold text-primary-700 backdrop-blur">Available for care</span><span class="absolute bottom-4 left-4 text-xs font-bold text-white/85">The Clinic · Trusted care</span></div>
  <div class="p-6"><p class="text-xs font-extrabold uppercase tracking-[.14em] text-primary-600"><?php echo e($doctor->specialty->name ?? 'Clinic doctor'); ?></p><h3 class="mt-2 text-xl font-extrabold text-navy-900"><?php echo e($doctor->name); ?></h3><p class="mt-2 text-sm text-slate-500"><?php echo e($doctor->experience_years); ?>+ years experience · <?php echo e($doctor->rating); ?> rating</p><span class="mt-5 inline-flex items-center gap-2 text-sm font-extrabold text-primary-700">View profile <b class="transition group-hover:translate-x-1">→</b></span></div>
</a>
<?php /**PATH C:\ITprojects\medicare-laravel\resources\views/components/doctor-card.blade.php ENDPATH**/ ?>