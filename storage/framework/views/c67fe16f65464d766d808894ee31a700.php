
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
<section class="min-h-[78vh] bg-navy-900 py-24 text-white"><div class="container-shell flex min-h-[55vh] items-center justify-center text-center"><div class="max-w-3xl"><span class="section-label border-white/10 bg-white/10 text-accent-400">Coming soon</span><h1 class="mt-6 text-5xl font-extrabold tracking-[-.05em] sm:text-7xl">Something thoughtful is on the way.</h1><p class="mx-auto mt-6 max-w-xl text-lg leading-8 text-slate-400">We’re preparing a new healthcare experience. Leave your email and we’ll let you know when it launches.</p><form action="<?php echo e(route('newsletter.store')); ?>" method="POST" class="mx-auto mt-9 flex max-w-md gap-2"><?php echo csrf_field(); ?><input required type="email" name="email" placeholder="Email address" class="min-w-0 flex-1 rounded-full bg-white/10 px-5 py-4 text-sm text-white outline-none placeholder:text-slate-500"><button class="rounded-full bg-accent-500 px-6 py-4 font-extrabold text-navy-900">Notify me</button></form></div></div></section>
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
<?php /**PATH C:\ITprojects\medicare-laravel\resources\views\coming-soon.blade.php ENDPATH**/ ?>