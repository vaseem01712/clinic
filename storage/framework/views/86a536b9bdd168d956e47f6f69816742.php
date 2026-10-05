
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
<section class="page-hero py-20"><div class="container-shell text-center"><span class="section-label">Patient stories</span><h1 class="section-heading text-5xl sm:text-6xl">Trusted by people who value great care.</h1></div></section>
<section class="section bg-slate-50"><div class="container-shell grid gap-5 md:grid-cols-2 lg:grid-cols-3"><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = [['Aarav Sharma','“From booking to consultation, every touchpoint felt simple and professional.”'],['Meera Kapoor','“The doctor took time to explain everything. The experience felt genuinely human.”'],['Rohan Verma','“A beautiful healthcare experience with excellent specialists.”'],['Ananya Singh','“The online appointment process saved me so much time.”'],['Kabir Jain','“Modern, responsive and very easy to navigate.”'],['Nisha Arora','“The team made a stressful appointment feel calm.”']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><article class="premium-card p-7"><div class="text-accent-500">★★★★★</div><p class="mt-6 text-lg font-semibold leading-8 text-navy-900"><?php echo e($t[1]); ?></p><div class="mt-8 flex items-center gap-3"><span class="flex h-10 w-10 items-center justify-center rounded-full bg-primary-100 font-extrabold text-primary-700"><?php echo e(substr($t[0],0,1)); ?></span><b class="text-sm text-navy-900"><?php echo e($t[0]); ?></b></div></article><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></div></section>
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
<?php /**PATH C:\ITprojects\medicare-laravel\resources\views\testimonials.blade.php ENDPATH**/ ?>