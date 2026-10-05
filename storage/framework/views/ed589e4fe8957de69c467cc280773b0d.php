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
<div class="mb-7"><span class="section-label">MEDICAL REPORTS</span><h1 class="section-heading !mt-3 !text-4xl">Reports you've sent</h1><p class="mt-3 text-slate-500">Files are stored privately and delivered through authorization-controlled access.</p></div>
<div class="soft-panel overflow-hidden"><div class="overflow-x-auto"><table class="w-full text-left text-sm"><thead class="bg-slate-50 text-xs font-extrabold uppercase text-slate-400"><tr><th class="px-5 py-4">Report</th><th class="px-5 py-4">Patient</th><th class="px-5 py-4">Date</th><th class="px-5 py-4">Status</th><th class="px-5 py-4"></th></tr></thead><tbody class="divide-y divide-slate-100"><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><tr><td class="px-5 py-5 font-bold"><?php echo e($r->title); ?><p class="text-xs font-normal text-slate-500"><?php echo e($r->test_type ?: 'Medical report'); ?></p></td><td class="px-5 py-5"><?php echo e($r->patient->name); ?></td><td class="px-5 py-5"><?php echo e($r->report_date->format('d M Y')); ?></td><td class="px-5 py-5"><span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-bold text-emerald-700"><?php echo e(ucfirst($r->status)); ?></span></td><td class="px-5 py-5 text-right"><a href="<?php echo e(route('medical-reports.download',$r)); ?>" class="font-bold text-primary-700">Open</a></td></tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><tr><td colspan="5" class="px-5 py-14 text-center text-slate-500">No medical reports yet.</td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></tbody></table></div><div class="border-t border-slate-100 p-4"><?php echo e($reports->links()); ?></div></div>
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
<?php /**PATH C:\ITprojects\medicare-laravel\resources\views\doctor\reports\index.blade.php ENDPATH**/ ?>