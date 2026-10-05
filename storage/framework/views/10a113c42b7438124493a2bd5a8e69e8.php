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
  <section class="editorial-hero"><img src="<?php echo e(asset('images/clinic-services.jpg')); ?>" alt="Clinic service"><div class="container-shell reveal"><a href="<?php echo e(route('services.index')); ?>" class="text-sm font-bold text-white/75 hover:text-white">← All services</a><span class="section-kicker mt-7">Clinic service</span><h1 class="mt-4"><?php echo e($service->title); ?></h1><p><?php echo e($service->short_description ?: 'Thoughtful, expert-led care shaped around the person, not just the appointment.'); ?></p></div></section>
  <section class="section bg-white"><div class="container-shell editorial-grid reveal"><article class="editorial-main editorial-surface"><span class="section-kicker">About this service</span><div class="prose mt-7 max-w-none text-[16px] leading-8 text-slate-600"><?php echo nl2br(e($service->description ?: $service->short_description ?: 'Our clinic team will take time to understand your needs and help you choose a clear next step.')); ?></div><div class="mt-10 grid gap-4 sm:grid-cols-3"><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = [['01','Personal','Care that begins with listening.'],['02','Clear','Straightforward advice and next steps.'],['03','Connected','Follow-up when it matters.']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><div class="rounded-2xl bg-slate-50 p-5"><span class="text-xs font-extrabold text-primary-600"><?php echo e($item[0]); ?></span><p class="mt-3 font-extrabold text-navy-900"><?php echo e($item[1]); ?></p><p class="mt-1 text-sm text-slate-500"><?php echo e($item[2]); ?></p></div><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></div></article><aside class="editorial-aside"><div class="rounded-[30px] bg-gradient-to-br from-primary-600 to-accent-500 p-8 text-white shadow-premium"><p class="text-xs font-extrabold uppercase tracking-[.17em] text-white/70">Ready when you are</p><h2 class="mt-4 text-3xl font-extrabold tracking-[-.05em]">Let’s plan your visit.</h2><p class="mt-4 text-sm leading-7 text-white/75">Choose a doctor and time that suits you. We will confirm your appointment by email.</p><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($service->price): ?><p class="mt-6 text-xl font-extrabold">From ₹<?php echo e(number_format($service->price)); ?></p><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?><a href="<?php echo e(route('appointments.create')); ?>" class="mt-8 inline-flex rounded-xl bg-white px-5 py-3 font-extrabold text-primary-600">Book this service →</a></div><div class="image-ribbon mt-5"><img src="<?php echo e(asset('images/clinic-wellness.jpg')); ?>" alt="Wellness care"></div></aside></div></section>
  <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($related->isNotEmpty()): ?><section class="section bg-[#eef4ff]"><div class="container-shell reveal"><span class="section-kicker">More ways we can help</span><h2 class="section-heading">Related services</h2><div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-3"><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if (isset($component)) { $__componentOriginale804957ecdb153e8c822de5ed47a4ace = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale804957ecdb153e8c822de5ed47a4ace = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.service-card','data' => ['service' => $r]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('service-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['service' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($r)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale804957ecdb153e8c822de5ed47a4ace)): ?>
<?php $attributes = $__attributesOriginale804957ecdb153e8c822de5ed47a4ace; ?>
<?php unset($__attributesOriginale804957ecdb153e8c822de5ed47a4ace); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale804957ecdb153e8c822de5ed47a4ace)): ?>
<?php $component = $__componentOriginale804957ecdb153e8c822de5ed47a4ace; ?>
<?php unset($__componentOriginale804957ecdb153e8c822de5ed47a4ace); ?>
<?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></div></div></section><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
<?php /**PATH C:\ITprojects\medicare-laravel\resources\views\services\show.blade.php ENDPATH**/ ?>