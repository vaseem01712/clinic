<?php if (isset($component)) { $__componentOriginalc0848eaf28452caa8d672e14d7fde2bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc0848eaf28452caa8d672e14d7fde2bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.portal-shell','data' => ['title' => 'Medical Reports']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('portal-shell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Medical Reports']); ?>
<div class="mb-7"><span class="section-label">MEDICAL REPORTS</span><h1 class="section-heading !mt-3 !text-4xl">Your secure reports</h1><p class="mt-3 text-slate-500">Only documents belonging to your account can be accessed.</p></div>
<div class="grid gap-4 md:grid-cols-2"><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><article class="premium-card p-6"><div class="flex items-start justify-between gap-4"><div><p class="text-lg font-extrabold text-navy-900"><?php echo e($r->title); ?></p><p class="mt-1 text-sm text-slate-500"><?php echo e($r->test_type ?: 'Medical test'); ?> · <?php echo e($r->report_date->format('d M Y')); ?></p><p class="mt-1 text-sm text-slate-500">Dr. <?php echo e($r->doctor->name); ?></p></div><span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-bold text-emerald-700">Sent</span></div><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($r->description): ?><p class="mt-4 text-sm leading-6 text-slate-600"><?php echo e($r->description); ?></p><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?><div class="mt-5 flex items-center justify-between"><span class="text-xs font-semibold text-slate-400"><?php echo e(number_format($r->file_size/1024,0)); ?> KB · <?php echo e(strtoupper(pathinfo($r->file_name,PATHINFO_EXTENSION))); ?></span><a href="<?php echo e(route('medical-reports.download',$r)); ?>" class="btn-primary !px-4 !py-2.5">View / Download</a></div></article><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><div class="soft-panel p-14 text-center md:col-span-2"><p class="text-lg font-extrabold text-navy-900">No medical reports yet.</p><p class="mt-2 text-sm text-slate-500">Reports sent by your doctor will appear here.</p></div><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></div><div class="mt-5"><?php echo e($reports->links()); ?></div>
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
<?php /**PATH C:\ITprojects\medicare-laravel\resources\views\patient\reports.blade.php ENDPATH**/ ?>