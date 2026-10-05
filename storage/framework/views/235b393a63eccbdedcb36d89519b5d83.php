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
  <section class="editorial-hero"><img src="<?php echo e(asset('images/clinic-consultation.jpg')); ?>" alt="Clinic doctor consultation"><div class="container-shell reveal"><span class="section-kicker">Our clinical team</span><h1>Good care starts with a doctor who listens.</h1><p>Meet the people behind a more personal, clear and considered clinic experience.</p></div></section>
  <section class="relative -mt-10 z-10 pb-5"><div class="container-shell reveal"><form class="editorial-surface grid gap-3 p-4 sm:grid-cols-4"><input type="text" name="name" value="<?php echo e(request('name')); ?>" placeholder="Search a doctor" class="input-field border-0 bg-slate-50"><select name="specialty" class="input-field border-0 bg-slate-50"><option value="">All care areas</option><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $specialties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($s->slug); ?>" <?php if(request('specialty') === $s->slug): echo 'selected'; endif; ?>><?php echo e($s->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></select><input type="text" name="location" value="<?php echo e(request('location')); ?>" placeholder="Location" class="input-field border-0 bg-slate-50"><button type="submit" class="btn-primary justify-center">Find a doctor →</button></form></div></section>
  <section class="section bg-white"><div class="container-shell reveal"><div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between"><div><span class="section-kicker">Trusted care</span><h2 class="section-heading">Meet the clinic team.</h2></div><p class="max-w-sm text-sm leading-6 text-slate-500">A focused team offering everyday care, practical guidance and real continuity.</p></div><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($doctors->isEmpty()): ?><div class="editorial-surface mt-10 text-center"><p class="text-xl font-extrabold text-navy-900">No doctors match that search.</p><p class="mt-2 text-slate-500">Try another care area or clear filters.</p></div><?php else: ?><div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3"><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if (isset($component)) { $__componentOriginalc8c26a79d00a9d9b08e3c59fe1077d40 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c26a79d00a9d9b08e3c59fe1077d40 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.doctor-card','data' => ['doctor' => $doctor]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('doctor-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['doctor' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($doctor)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc8c26a79d00a9d9b08e3c59fe1077d40)): ?>
<?php $attributes = $__attributesOriginalc8c26a79d00a9d9b08e3c59fe1077d40; ?>
<?php unset($__attributesOriginalc8c26a79d00a9d9b08e3c59fe1077d40); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc8c26a79d00a9d9b08e3c59fe1077d40)): ?>
<?php $component = $__componentOriginalc8c26a79d00a9d9b08e3c59fe1077d40; ?>
<?php unset($__componentOriginalc8c26a79d00a9d9b08e3c59fe1077d40); ?>
<?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></div><div class="mt-10"><?php echo e($doctors->links()); ?></div><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></div></section>
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
<?php /**PATH C:\ITprojects\medicare-laravel\resources\views/doctors/index.blade.php ENDPATH**/ ?>