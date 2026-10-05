<?php $__env->startSection('content'); ?>
<h1 style="margin:0 0 10px;font-size:28px">Welcome, <?php echo e($user->name); ?></h1>
<p style="line-height:1.7;color:#59697e">Your <?php echo e($portalLabel); ?> account is ready. Set your password using the secure, time-limited link below.</p>
<p style="margin:28px 0"><a href="<?php echo e($setupUrl); ?>" style="display:inline-block;background:#1f83fb;color:#fff;text-decoration:none;padding:14px 22px;border-radius:10px;font-weight:700">Set Your Password</a></p>
<p style="font-size:13px;color:#7a8798">This link expires in 60 minutes. If you did not expect this email, you can safely ignore it.</p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('emails.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\ITprojects\medicare-laravel\resources\views\emails\account-setup.blade.php ENDPATH**/ ?>