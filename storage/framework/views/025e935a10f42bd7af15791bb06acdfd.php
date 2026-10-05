<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <section class="specialty-hero">
        <div class="container-shell">
            <nav class="specialty-breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo e(route('home')); ?>">Home</a><span aria-hidden="true">/</span><span>Specialties</span>
            </nav>
            <span class="section-kicker mt-6">Personalized pathways to better health</span>
            <h1>Expert care, organized around what matters to you.</h1>
            <p>Explore our clinical specialties and find a thoughtful place to begin your care journey.</p>
            <div class="specialty-hero-actions">
                <a href="<?php echo e(route('appointments.create')); ?>" class="btn-primary">Book an appointment <span aria-hidden="true">↗</span></a>
                <a href="#specialty-list" class="btn-secondary">Explore specialties <span aria-hidden="true">↓</span></a>
            </div>
        </div>
    </section>
    <section class="mx-auto max-w-7xl px-6 py-16">
        <div id="specialty-list" class="mb-9 flex flex-wrap items-end justify-between gap-4">
            <div><span class="section-kicker">Find your care</span><h2 class="mt-3 font-serif text-4xl font-semibold text-navy-900">Explore specialties</h2></div>
            <p class="max-w-md text-sm leading-6 text-slate-500"><?php echo e($specialties->total()); ?> focused pathways, each supported by clinicians who take time to listen.</p>
        </div>
        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $specialties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specialty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (isset($component)) { $__componentOriginal3307fba7835b2f7f273620a42c9d4aee = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3307fba7835b2f7f273620a42c9d4aee = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.specialty-card','data' => ['specialty' => $specialty]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('specialty-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['specialty' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($specialty)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3307fba7835b2f7f273620a42c9d4aee)): ?>
<?php $attributes = $__attributesOriginal3307fba7835b2f7f273620a42c9d4aee; ?>
<?php unset($__attributesOriginal3307fba7835b2f7f273620a42c9d4aee); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3307fba7835b2f7f273620a42c9d4aee)): ?>
<?php $component = $__componentOriginal3307fba7835b2f7f273620a42c9d4aee; ?>
<?php unset($__componentOriginal3307fba7835b2f7f273620a42c9d4aee); ?>
<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
        <div class="mt-10"><?php echo e($specialties->links()); ?></div>
    </section>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $attributes = $__attributesOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__attributesOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $component = $__componentOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__componentOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php /**PATH C:\ITprojects\medicare-laravel\resources\views\specialties\index.blade.php ENDPATH**/ ?>