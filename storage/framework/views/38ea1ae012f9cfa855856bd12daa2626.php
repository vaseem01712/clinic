<?php if (isset($component)) { $__componentOriginalc0848eaf28452caa8d672e14d7fde2bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc0848eaf28452caa8d672e14d7fde2bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.portal-shell','data' => ['title' => 'Doctor Profile']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('portal-shell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Doctor Profile']); ?>
<div class="mb-7"><span class="section-label">PROFILE</span><h1 class="section-heading !mt-3 !text-4xl">Your professional profile</h1><p class="mt-3 text-slate-500">Keep the information patients see on the public doctor profile accurate.</p></div>
<form method="POST" action="<?php echo e(route('doctor.profile.update')); ?>" enctype="multipart/form-data" class="soft-panel grid gap-5 p-6 sm:grid-cols-2"><?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
<div><label class="label">Name</label><input name="name" value="<?php echo e($doctor->name); ?>" required class="input-field"></div>
<div><label class="label">Email</label><input value="<?php echo e($user->email); ?>" disabled class="input-field bg-slate-50"></div>
<div><label class="label">Phone</label><input name="phone" value="<?php echo e($doctor->phone); ?>" class="input-field"></div>
<div><label class="label">Specialization</label><input value="<?php echo e($doctor->specialty?->name); ?>" disabled class="input-field bg-slate-50"></div>
<div><label class="label">Qualification</label><input name="education" value="<?php echo e($doctor->education); ?>" class="input-field"></div>
<div><label class="label">Experience (years)</label><input name="experience_years" type="number" min="0" value="<?php echo e($doctor->experience_years); ?>" required class="input-field"></div>
<div class="sm:col-span-2"><label class="label">Bio</label><textarea name="biography" rows="6" class="input-field"><?php echo e($doctor->biography); ?></textarea></div>
<div><label class="label">Current password</label><input name="current_password" type="password" class="input-field" autocomplete="current-password"></div><div><label class="label">New password</label><input name="password" type="password" class="input-field" autocomplete="new-password"></div><div><label class="label">Confirm new password</label><input name="password_confirmation" type="password" class="input-field" autocomplete="new-password"></div><div class="sm:col-span-2"><label class="label">Profile photo</label><input name="photo" type="file" accept="image/*" class="input-field"></div>
<div class="sm:col-span-2 flex justify-end"><button class="btn-primary">Save Profile</button></div>
</form>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc0848eaf28452caa8d672e14d7fde2bc)): ?>
<?php $attributes = $__attributesOriginalc0848eaf28452caa8d672e14d7fde2bc; ?>
<?php unset($__attributesOriginalc0848eaf28452caa8d672e14d7fde2bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc0848eaf28452caa8d672e14d7fde2bc)): ?>
<?php $component = $__componentOriginalc0848eaf28452caa8d672e14d7fde2bc; ?>
<?php unset($__componentOriginalc0848eaf28452caa8d672e14d7fde2bc); ?>
<?php endif; ?>
<?php /**PATH C:\ITprojects\medicare-laravel\resources\views\doctor\profile.blade.php ENDPATH**/ ?>