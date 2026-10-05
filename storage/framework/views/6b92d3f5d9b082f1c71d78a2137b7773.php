<?php if (isset($component)) { $__componentOriginalc0848eaf28452caa8d672e14d7fde2bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc0848eaf28452caa8d672e14d7fde2bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.portal-shell','data' => ['title' => 'Patients']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('portal-shell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Patients']); ?>
<div class="mb-7"><span class="section-label">PATIENTS</span><h1 class="section-heading !mt-3 !text-4xl">Your patients</h1><p class="mt-3 text-slate-500">Only patients associated with your appointments are visible here.</p></div>
<form class="mb-5 flex gap-3"><input name="q" value="<?php echo e(request('q')); ?>" class="input-field max-w-md" placeholder="Search by patient name or email"><button class="btn-primary">Search</button></form>
<div class="soft-panel overflow-hidden">
 <div class="overflow-x-auto"><table class="w-full text-left text-sm"><thead class="bg-slate-50 text-xs font-extrabold uppercase tracking-wider text-slate-400"><tr><th class="px-5 py-4">Patient</th><th class="px-5 py-4">Appointments</th><th class="px-5 py-4">Last visit</th><th class="px-5 py-4"></th></tr></thead><tbody class="divide-y divide-slate-100">
 <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><tr><td class="px-5 py-5"><p class="font-bold text-navy-900"><?php echo e($p->name); ?></p><p class="text-xs text-slate-500"><?php echo e($p->email); ?></p></td><td class="px-5 py-5"><?php echo e($p->appointments_count); ?></td><td class="px-5 py-5"><?php echo e(optional($p->appointments->first()?->appointment_date)->format('d M Y') ?? '—'); ?></td><td class="px-5 py-5 text-right"><a class="font-extrabold text-primary-700" href="<?php echo e(route('doctor.patient.show',$p)); ?>">Open →</a></td></tr>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><tr><td colspan="4" class="px-5 py-14 text-center text-slate-500">No authorized patients found.</td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
 </tbody></table></div>
 <div class="border-t border-slate-100 p-4"><?php echo e($patients->links()); ?></div>
</div>
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
<?php /**PATH C:\ITprojects\medicare-laravel\resources\views\doctor\patients\index.blade.php ENDPATH**/ ?>