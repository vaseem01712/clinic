
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
<section class="page-hero py-20"><div class="container-shell"><span class="section-label">Support</span><h1 class="section-heading text-5xl sm:text-6xl">Frequently asked questions.</h1><p class="section-copy">Clear answers before you book your care.</p></div></section>
<section class="section bg-white" x-data="{open:0}"><div class="container-shell max-w-4xl space-y-3"><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = [['How do I book an appointment?','Choose your specialty and doctor, select an available slot and confirm your details.'],['Can I see a doctor online?','Yes. Tele-health availability is shown for eligible doctors during booking.'],['Can I reschedule?','Yes. Contact the care team or use your patient dashboard where available.'],['How do I find the right specialist?','Use our doctor search and specialty filters, then compare profiles and availability.'],['Is my information secure?','We follow secure application practices and protect access through authenticated patient accounts.']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><div class="rounded-2xl border border-slate-200 bg-white"><button @click="open=open===<?php echo e($i); ?>?null:<?php echo e($i); ?>" class="flex w-full items-center justify-between p-6 text-left font-extrabold text-navy-900"><span><?php echo e($faq[0]); ?></span><span class="text-xl text-primary-600" x-text="open===<?php echo e($i); ?>?'−':'+'"></span></button><div x-show="open===<?php echo e($i); ?>" x-transition x-cloak class="px-6 pb-6 text-sm leading-7 text-slate-500"><?php echo e($faq[1]); ?></div></div><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></div></section>
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
<?php /**PATH C:\ITprojects\medicare-laravel\resources\views\faq.blade.php ENDPATH**/ ?>