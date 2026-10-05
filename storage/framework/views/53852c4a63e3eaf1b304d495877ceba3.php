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
  <?php ($doctorImage = $appointment->doctor?->photo ? asset('storage/'.$appointment->doctor->photo) : asset('images/'.(['clinic-consultation.jpg','clinic-care.jpg','clinic-wellness.jpg'][$appointment->doctor_id % 3]))); ?>
  <section class="success-page"><div class="container-shell reveal"><div class="success-shell"><div class="success-main"><div class="success-tick">✓</div><span class="section-kicker mt-6">Appointment request received</span><h1>Your visit is on its way.</h1><p>Your request has been shared with <strong class="text-navy-900"><?php echo e($appointment->doctor->name); ?></strong>. We have also sent your appointment details to <strong class="text-navy-900"><?php echo e($appointment->patient_email); ?></strong>.</p><div class="success-summary"><small>Your requested appointment</small><h2><?php echo e($appointment->appointment_date->format('l, d M Y')); ?></h2><p><?php echo e(\Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A')); ?> · <strong><?php echo e(ucfirst($appointment->status)); ?></strong></p></div><div class="success-actions"><a href="<?php echo e(route('home')); ?>" class="secondary">Back to home</a><a href="<?php echo e(route('appointments.create')); ?>" class="primary">Book another visit →</a></div></div><aside class="success-side"><div class="success-doctor"><img src="<?php echo e($doctorImage); ?>" alt="<?php echo e($appointment->doctor->name); ?>"><div><small>Your clinician</small><b><?php echo e($appointment->doctor->name); ?></b><span class="mt-1 block text-sm text-white/60"><?php echo e($appointment->doctor->specialty?->name ?? 'The Clinic'); ?></span></div></div><h3>What happens next?</h3><p>We will review your request and send an update if anything needs to be confirmed.</p><div class="success-checklist"><div><b>✓</b>Appointment details sent by email</div><div><b>✓</b>Doctor notified of your request</div><div><b>✓</b>Helpful reminders before your visit</div></div></aside></div></div></section>
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
<?php /**PATH C:\ITprojects\medicare-laravel\resources\views\appointments\success.blade.php ENDPATH**/ ?>