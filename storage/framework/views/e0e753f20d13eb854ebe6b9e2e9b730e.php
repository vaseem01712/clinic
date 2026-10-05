<?php if (isset($component)) { $__componentOriginalc0848eaf28452caa8d672e14d7fde2bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc0848eaf28452caa8d672e14d7fde2bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.portal-shell','data' => ['title' => 'Medical Record']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('portal-shell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Medical Record']); ?>
<div class="mb-7"><span class="section-label">CLINICAL RECORD</span><h1 class="section-heading !mt-3 !text-4xl">New record · <?php echo e($patient->name); ?></h1><p class="mt-3 text-slate-500">Internal notes remain private; patient-visible notes are shown in the patient portal.</p></div>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?><div class="mb-5 rounded-2xl bg-red-50 p-4 text-sm font-semibold text-red-700"><?php echo e($errors->first()); ?></div><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<form method="POST" action="<?php echo e(route('doctor.records.store')); ?>" class="soft-panel grid gap-5 p-6 sm:grid-cols-2"><?php echo csrf_field(); ?><input type="hidden" name="patient_id" value="<?php echo e($patient->id); ?>">
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = [['diagnosis','Diagnosis'],['symptoms','Symptoms'],['clinical_notes','Clinical notes'],['prescription','Prescription'],['treatment_plan','Treatment plan'],['follow_up_instructions','Follow-up instructions'],['test_recommendations','Test recommendations'],['medical_history','Medical history'],['visit_notes','Visit notes'],['doctor_notes','Internal doctor notes'],['patient_visible_notes','Patient-visible notes']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="<?php echo e(in_array($field[0],['clinical_notes','prescription','treatment_plan','medical_history','doctor_notes','patient_visible_notes'])?'sm:col-span-2':''); ?>"><label class="label"><?php echo e($field[1]); ?></label><textarea name="<?php echo e($field[0]); ?>" rows="4" class="input-field"></textarea></div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<div class="sm:col-span-2 flex justify-end"><button class="btn-primary">Save Clinical Record</button></div>
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
<?php /**PATH C:\ITprojects\medicare-laravel\resources\views\doctor\records\create.blade.php ENDPATH**/ ?>