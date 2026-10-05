<?php $__env->startComponent('emails.layout'); ?>
    <h2>Your appointment is coming up</h2>
    <p>Hello <?php echo e($appointment->patient_name); ?>, this is a friendly reminder of your appointment with <?php echo e($appointment->doctor->name); ?>.</p>
    <p><strong><?php echo e($appointment->appointment_date->format('l, d M Y')); ?></strong> at <strong><?php echo e(\Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A')); ?></strong></p>
    <p>Please arrive a few minutes early. If you need to reschedule, please contact the clinic.</p>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\ITprojects\medicare-laravel\resources\views\emails\appointment-reminder.blade.php ENDPATH**/ ?>