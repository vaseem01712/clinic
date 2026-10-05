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
  <section class="page-hero min-h-[650px] py-16"><div class="container-shell grid items-center gap-10 lg:grid-cols-[.9fr_1.1fr]"><div class="reveal"><span class="section-kicker">Patient portal</span><h1 class="internal-title mt-5">Your care, all in one secure place.</h1><p class="internal-copy">Review appointments, access reports and keep up with care updates whenever you need to.</p><div class="mt-8 grid max-w-md gap-3"><div class="rounded-2xl border border-white bg-white/75 p-4 shadow-sm"><p class="font-extrabold text-navy-900">Appointments</p><p class="mt-1 text-sm text-slate-500">See upcoming and past visits.</p></div><div class="rounded-2xl border border-white bg-white/75 p-4 shadow-sm"><p class="font-extrabold text-navy-900">Private reports</p><p class="mt-1 text-sm text-slate-500">Access your shared medical documents securely.</p></div></div></div><div class="reveal reveal-delay-2 rounded-[32px] border border-white bg-white p-7 shadow-[0_28px_85px_-40px_rgba(30,64,175,.35)] sm:p-10"><p class="text-xs font-extrabold uppercase tracking-[.17em] text-primary-600">Welcome back</p><h2 class="mt-2 text-3xl font-extrabold tracking-[-.05em] text-navy-900">Sign in to your portal</h2><p class="mt-2 text-sm leading-6 text-slate-500">Use the email address linked to your appointments.</p><form method="POST" action="<?php echo e(route('login.store')); ?>" class="mt-7 space-y-5"><?php echo csrf_field(); ?><div><label for="email" class="label">Email address</label><input id="email" name="email" type="email" value="<?php echo e(old('email')); ?>" required autofocus class="input-field"><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-2 text-sm font-semibold text-red-600"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></div><div><label for="password" class="label">Password</label><input id="password" name="password" type="password" required class="input-field"></div><div class="flex items-center justify-between gap-4 text-sm"><label class="flex items-center gap-2 text-slate-500"><input name="remember" type="checkbox"> Remember me</label><a class="font-bold text-primary-700" href="<?php echo e(route('password.forgot','patient')); ?>">Forgot password?</a></div><button type="submit" class="btn-primary w-full py-4">Sign in securely →</button><p class="text-center text-sm text-slate-500">Are you a doctor? <a href="<?php echo e(route('doctor.login')); ?>" class="font-extrabold text-primary-700">Use doctor portal</a></p></form></div></div></section>
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
<?php /**PATH C:\ITprojects\medicare-laravel\resources\views/auth/login.blade.php ENDPATH**/ ?>