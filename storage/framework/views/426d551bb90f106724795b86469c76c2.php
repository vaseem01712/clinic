
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
<section class="page-hero py-20"><div class="container-shell text-center"><span class="section-label">Membership</span><h1 class="section-heading text-5xl sm:text-6xl">Care that fits your life.</h1><p class="section-copy mx-auto">Flexible plans for ongoing support and better access to healthcare.</p></div></section>
<section class="section bg-white"><div class="container-shell grid gap-5 lg:grid-cols-3"><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = [['Essential','₹999','For everyday health needs',['Priority booking','Digital records','Health reminders']],['Plus','₹1,999','For proactive care',['Everything in Essential','Online consultations','Annual health review']],['Premium','₹3,999','For complete support',['Everything in Plus','Family care support','Priority specialist access']]]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><div class="premium-card relative p-8 <?php echo e($i===1 ? 'border-2 border-primary-500 shadow-[0_30px_90px_-35px_rgba(15,99,224,.45)]' : ''); ?>"><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($i===1): ?><span class="absolute right-6 top-6 rounded-full bg-primary-50 px-3 py-1 text-xs font-extrabold text-primary-700">Most popular</span><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?><h2 class="text-xl font-extrabold text-navy-900"><?php echo e($plan[0]); ?></h2><p class="mt-2 text-sm text-slate-500"><?php echo e($plan[2]); ?></p><div class="mt-7 text-4xl font-extrabold text-navy-900"><?php echo e($plan[1]); ?><span class="text-sm font-semibold text-slate-400">/year</span></div><ul class="mt-8 space-y-4"><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $plan[3]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li class="flex gap-3 text-sm font-semibold text-slate-600"><span class="text-accent-500">✓</span><?php echo e($f); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></ul><a href="<?php echo e(route('appointments.create')); ?>" class="btn-primary mt-9 w-full">Choose plan</a></div><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></div></section>
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
<?php /**PATH C:\ITprojects\medicare-laravel\resources\views\pricing.blade.php ENDPATH**/ ?>