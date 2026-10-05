<?php if (isset($component)) { $__componentOriginalc0848eaf28452caa8d672e14d7fde2bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc0848eaf28452caa8d672e14d7fde2bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.portal-shell','data' => ['title' => 'Notifications']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('portal-shell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Notifications']); ?>
<div class="mb-7"><span class="section-label">NOTIFICATIONS</span><h1 class="section-heading !mt-3 !text-4xl">Your updates</h1></div>
<div class="soft-panel divide-y divide-slate-100"><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><div class="flex items-start justify-between gap-5 p-5 <?php echo e(!$n->read_at?'bg-primary-50/40':''); ?>"><div><p class="font-extrabold text-navy-900"><?php echo e($n->title); ?></p><p class="mt-1 text-sm text-slate-500"><?php echo e($n->message); ?></p><p class="mt-2 text-xs font-semibold text-slate-400"><?php echo e($n->created_at->format('d M Y, H:i')); ?></p></div><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$n->read_at): ?><form method="POST" action="<?php echo e(route('patient.notifications.read',$n)); ?>"><?php echo csrf_field(); ?><button class="text-xs font-extrabold text-primary-700">Mark read</button></form><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></div><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><div class="p-14 text-center text-slate-500">No notifications.</div><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></div><div class="mt-5"><?php echo e($notifications->links()); ?></div>
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
<?php /**PATH C:\ITprojects\medicare-laravel\resources\views\patient\notifications.blade.php ENDPATH**/ ?>