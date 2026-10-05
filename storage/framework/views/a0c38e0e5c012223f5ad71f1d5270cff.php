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
<section class="min-h-[calc(100vh-78px)] bg-slate-50 px-5 py-16"><div class="mx-auto max-w-lg rounded-[32px] border border-slate-200 bg-white p-8 shadow-[0_25px_80px_-45px_rgba(7,28,64,.35)] sm:p-10">
<span class="section-label">SECURE ACCESS</span><h1 class="mt-5 text-3xl font-extrabold text-navy-900">Set your <?php echo e($portal); ?> password</h1><p class="mt-2 text-sm text-slate-500">Choose a strong password. This secure setup link expires automatically.</p>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?><div class="mt-5 rounded-2xl bg-red-50 p-3 text-sm font-semibold text-red-700"><?php echo e($errors->first()); ?></div><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<form method="POST" action="<?php echo e(route('password.setup.store')); ?>" class="mt-7 space-y-5"><?php echo csrf_field(); ?><input type="hidden" name="email" value="<?php echo e($email); ?>"><input type="hidden" name="token" value="<?php echo e($token); ?>">
<div><label class="label">New password</label><input name="password" type="password" required minlength="10" class="input-field"></div><div><label class="label">Confirm password</label><input name="password_confirmation" type="password" required minlength="10" class="input-field"></div><button class="btn-primary w-full">Set Password</button></form>
</div></section>
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
<?php /**PATH C:\ITprojects\medicare-laravel\resources\views\auth\set-password.blade.php ENDPATH**/ ?>