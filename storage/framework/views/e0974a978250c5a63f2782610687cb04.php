
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
<section class="page-hero py-20"><div class="container-shell"><span class="section-label">Our environment</span><h1 class="section-heading text-5xl sm:text-6xl">Designed for modern care.</h1><p class="section-copy">Explore the spaces, technology and people behind the MediCare experience.</p></div></section>
<section class="section bg-white"><div class="container-shell grid gap-5 md:grid-cols-2 lg:grid-cols-3"><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = [['https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=900&q=80','Modern facilities'],['https://images.unsplash.com/photo-1551076805-e1869033e561?w=900&q=80','Advanced technology'],['https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=900&q=80','Specialist care'],['https://images.unsplash.com/photo-1538108149393-fbbd81895907?w=900&q=80','Patient experience'],['https://images.unsplash.com/photo-1586773860418-d37222d8fce3?w=900&q=80','Clinical excellence'],['https://images.unsplash.com/photo-1584515933487-779824d29309?w=900&q=80','Compassionate teams']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><div class="group overflow-hidden rounded-[28px] bg-slate-100"><div class="h-72 overflow-hidden"><img src="<?php echo e($x[0]); ?>" alt="<?php echo e($x[1]); ?>" class="h-full w-full object-cover transition duration-700 group-hover:scale-105"></div><div class="p-5"><h3 class="font-extrabold text-navy-900"><?php echo e($x[1]); ?></h3><p class="mt-1 text-sm text-slate-500">A closer look at our care experience.</p></div></div><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></div></section>
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
<?php /**PATH C:\ITprojects\medicare-laravel\resources\views\portfolio.blade.php ENDPATH**/ ?>