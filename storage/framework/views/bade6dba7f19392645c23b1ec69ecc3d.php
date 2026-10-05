<?php if (isset($component)) { $__componentOriginalc0848eaf28452caa8d672e14d7fde2bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc0848eaf28452caa8d672e14d7fde2bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.portal-shell','data' => ['title' => 'Doctor Dashboard','eyebrow' => 'DOCTOR PORTAL']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('portal-shell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Doctor Dashboard','eyebrow' => 'DOCTOR PORTAL']); ?>
<div>
 <div class="mb-7 flex flex-col justify-between gap-4 md:flex-row md:items-end">
  <div><span class="section-label">DOCTOR PORTAL</span><h1 class="section-heading !mt-3 !text-4xl">Good morning, Dr. <?php echo e($doctor->name); ?></h1><p class="mt-3 text-slate-500">Manage your appointments, patients and clinical records from one secure workspace.</p></div>
  <a href="<?php echo e(route('doctor.reports')); ?>" class="btn-primary">Medical Reports <span>↗</span></a>
 </div>
 <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-5">
  <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = [['Patients',$totalPatients,'users'],["Today's appointments",$todayAppointments,'calendar'],['Upcoming',$upcomingAppointments,'clock'],['Completed',$completedAppointments,'check'],['Pending',$pendingAppointments,'pending']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <div class="stat-card"><p class="text-sm font-bold text-slate-500"><?php echo e($stat[0]); ?></p><p class="mt-2 text-3xl font-extrabold text-navy-900"><?php echo e($stat[1]); ?></p><p class="mt-2 text-xs font-semibold text-primary-600">Live from database</p></div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
 </div>
 <div class="mt-6 grid gap-6 xl:grid-cols-[1.35fr_.65fr]">
  <section class="soft-panel p-6">
   <div class="flex items-center justify-between"><div><p class="section-label">SCHEDULE</p><h2 class="mt-3 text-xl font-extrabold text-navy-900">Recent appointments</h2></div><a href="<?php echo e(route('doctor.appointments')); ?>" class="text-sm font-extrabold text-primary-700">View all</a></div>
   <div class="mt-5 divide-y divide-slate-100">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $recentAppointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
     <div class="flex items-center justify-between gap-4 py-4"><div><p class="font-bold text-navy-900"><?php echo e($a->patient?->name ?? $a->patient_name); ?></p><p class="text-sm text-slate-500"><?php echo e($a->appointment_date->format('d M Y')); ?> · <?php echo e(substr($a->appointment_time,0,5)); ?></p></div><span class="rounded-full bg-primary-50 px-3 py-1 text-xs font-bold text-primary-700"><?php echo e(ucfirst($a->status)); ?></span></div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> <div class="py-12 text-center text-sm text-slate-500">No appointments yet.</div><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
   </div>
  </section>
  <section class="soft-panel p-6"><p class="section-label">QUICK ACTIONS</p><h2 class="mt-3 text-xl font-extrabold text-navy-900">Clinical tools</h2>
   <div class="mt-5 grid gap-3">
    <a href="<?php echo e(route('doctor.patients')); ?>" class="btn-secondary justify-between">View Patients <span>→</span></a>
    <a href="<?php echo e(route('doctor.appointments')); ?>" class="btn-secondary justify-between">Today's Appointments <span>→</span></a>
    <a href="<?php echo e(route('doctor.reports')); ?>" class="btn-secondary justify-between">Medical Reports <span>→</span></a>
    <a href="<?php echo e(route('doctor.profile')); ?>" class="btn-secondary justify-between">My Profile <span>→</span></a>
   </div>
  </section>
 </div>
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
<?php /**PATH C:\ITprojects\medicare-laravel\resources\views\doctor\dashboard.blade.php ENDPATH**/ ?>