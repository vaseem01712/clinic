<?php if (isset($component)) { $__componentOriginalc0848eaf28452caa8d672e14d7fde2bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc0848eaf28452caa8d672e14d7fde2bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.portal-shell','data' => ['title' => 'Upload Report']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('portal-shell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Upload Report']); ?>
<div class="mb-7"><span class="section-label">MEDICAL REPORT</span><h1 class="section-heading !mt-3 !text-4xl">Upload report for <?php echo e($patient->name); ?></h1><p class="mt-3 text-slate-500">PDF, JPG, JPEG, PNG, DOC and DOCX · maximum 10 MB.</p></div>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?><div class="mb-5 rounded-2xl bg-red-50 p-4 text-sm font-semibold text-red-700"><?php echo e($errors->first()); ?></div><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<form method="POST" action="<?php echo e(route('doctor.reports.store')); ?>" enctype="multipart/form-data" class="soft-panel grid gap-5 p-6 sm:grid-cols-2"><?php echo csrf_field(); ?><input type="hidden" name="patient_id" value="<?php echo e($patient->id); ?>">
<div class="sm:col-span-2"><label class="label">Report title</label><input name="title" required class="input-field" placeholder="e.g. Complete Blood Count"></div>
<div><label class="label">Test type</label><input name="test_type" class="input-field" placeholder="Blood test"></div>
<div><label class="label">Report date</label><input name="report_date" type="date" value="<?php echo e(now()->toDateString()); ?>" required class="input-field"></div>
<div class="sm:col-span-2"><label class="label">Appointment (optional)</label><select name="appointment_id" class="input-field"><option value="">Select appointment</option><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($a->id); ?>"><?php echo e($a->appointment_date->format('d M Y')); ?> · <?php echo e(substr($a->appointment_time,0,5)); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></select></div>
<div class="sm:col-span-2"><label class="label">Description / notes</label><textarea name="description" rows="4" class="input-field"></textarea></div>
<div class="sm:col-span-2"><label class="label">Secure file</label><input name="file" type="file" required accept=".pdf,.jpg,.jpeg,.png,.doc,.docx" class="input-field"></div>
<div class="sm:col-span-2 flex justify-end gap-3"><a href="<?php echo e(route('doctor.patient.show',$patient)); ?>" class="btn-secondary">Cancel</a><button class="btn-primary">Upload & Send to Patient</button></div>
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
<?php /**PATH C:\ITprojects\medicare-laravel\resources\views\doctor\reports\create.blade.php ENDPATH**/ ?>