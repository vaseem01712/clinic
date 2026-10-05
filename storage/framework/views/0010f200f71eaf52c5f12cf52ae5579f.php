
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
<section class="page-hero py-20"><div class="container-shell"><span class="section-label">About MediCare</span><h1 class="mt-5 max-w-4xl text-5xl font-extrabold tracking-[-.05em] text-navy-900 sm:text-6xl">Healthcare that feels <span class="text-primary-600">human.</span></h1><p class="mt-6 max-w-2xl text-lg leading-8 text-slate-500">We bring trusted specialists, thoughtful technology and a calmer patient experience together.</p></div></section>
<section class="section bg-white"><div class="container-shell grid gap-14 lg:grid-cols-2 lg:items-center"><div class="overflow-hidden rounded-[36px]"><img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=1200&q=85&auto=format&fit=crop" class="h-[520px] w-full object-cover" alt="MediCare team"></div><div><span class="section-label">Our mission</span><h2 class="section-heading">Make exceptional healthcare easier to reach.</h2><p class="section-copy">MediCare exists to make finding, booking and experiencing care simpler. We believe modern healthcare should be clinically excellent and emotionally thoughtful.</p><div class="mt-8 grid gap-4 sm:grid-cols-2"><div class="premium-card p-5"><b class="text-navy-900">Patient first</b><p class="mt-2 text-sm text-slate-500">Every decision starts with the patient experience.</p></div><div class="premium-card p-5"><b class="text-navy-900">Evidence led</b><p class="mt-2 text-sm text-slate-500">Modern medicine backed by trusted expertise.</p></div></div></div></div></section>
<section class="section bg-slate-50"><div class="container-shell grid gap-5 sm:grid-cols-2 lg:grid-cols-4"><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = [['15+','Years of experience'],['250+','Specialists'],['50K+','Patients served'],['98%','Satisfaction']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><div class="premium-card p-7"><div class="text-4xl font-extrabold text-navy-900"><?php echo e($x[0]); ?></div><p class="mt-2 text-sm font-bold text-slate-500"><?php echo e($x[1]); ?></p></div><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></div></section>
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
<?php /**PATH C:\ITprojects\medicare-laravel\resources\views\about.blade.php ENDPATH**/ ?>