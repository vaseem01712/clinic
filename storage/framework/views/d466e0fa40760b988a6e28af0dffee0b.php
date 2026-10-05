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
  <section class="page-hero py-16 sm:py-20">
    <div class="container-shell grid items-start gap-10 lg:grid-cols-[.82fr_1.18fr]">
      <div class="lg:pt-8">
        <span class="section-label"><span class="eyebrow-dot"></span> Simple online booking</span>
        <h1 class="section-heading text-balance">Book a visit that fits your day.</h1>
        <p class="section-copy">Choose your doctor and preferred time. We will email your request immediately, then send helpful reminders before your visit.</p>
        <div class="mt-8 space-y-4">
          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = [['01','Choose your doctor','A small, trusted clinical team.'],['02','Pick a suitable time','Available slots are protected from double booking.'],['03','Receive your confirmation','You and your doctor get an email right away.']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="flex gap-4"><span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-primary-600 text-xs font-extrabold text-white"><?php echo e($item[0]); ?></span><div><p class="font-extrabold text-navy-900"><?php echo e($item[1]); ?></p><p class="mt-1 text-sm text-slate-500"><?php echo e($item[2]); ?></p></div></div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
      </div>
      <div class="soft-panel p-6 sm:p-8">
        <div class="mb-7 flex items-center justify-between"><div><p class="text-xs font-extrabold uppercase tracking-[.16em] text-primary-600">New appointment</p><h2 class="mt-1 text-2xl font-extrabold text-navy-900">Tell us about your visit</h2></div><span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-accent-50 text-accent-600">✦</span></div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?><div class="mb-5 rounded-2xl border border-red-100 bg-red-50 p-4 text-sm font-medium text-red-700"><ul class="list-disc space-y-1 pl-5"><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($error); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></ul></div><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <form id="appointment-form" action="<?php echo e(route('appointments.store')); ?>" method="POST" class="grid gap-5 sm:grid-cols-2">
          <?php echo csrf_field(); ?>
          <label><span class="label">Care area</span><select id="appointment-specialty" name="specialty_id" class="input-field" required><option value="">Select care area</option><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $specialties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($s->id); ?>" <?php if(old('specialty_id') == $s->id): echo 'selected'; endif; ?>><?php echo e($s->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></select></label>
          <label><span class="label">Your doctor</span><select id="appointment-doctor" name="doctor_id" class="input-field" required><option value="">Select doctor</option><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($d->id); ?>" data-specialty="<?php echo e($d->specialty_id); ?>" <?php if(old('doctor_id') == $d->id): echo 'selected'; endif; ?>><?php echo e($d->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></select><span id="doctor-help" class="mt-2 block text-xs font-semibold text-slate-400">Select a care area to see matching doctors.</span></label>
          <label><span class="label">Appointment type</span><select name="service_id" class="input-field"><option value="">General consultation</option><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($s->id); ?>" <?php if(old('service_id') == $s->id): echo 'selected'; endif; ?>><?php echo e($s->title); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></select></label>
          <label><span class="label">Preferred date</span><input type="date" name="appointment_date" value="<?php echo e(old('appointment_date')); ?>" min="<?php echo e(now()->toDateString()); ?>" required class="input-field"></label>
          <label><span class="label">Preferred time</span><input type="time" name="appointment_time" value="<?php echo e(old('appointment_time')); ?>" required class="input-field"></label>
          <label><span class="label">Phone number</span><input type="tel" name="patient_phone" value="<?php echo e(old('patient_phone')); ?>" placeholder="+91" class="input-field"></label>
          <label><span class="label">Full name</span><input type="text" name="patient_name" value="<?php echo e(old('patient_name', auth()->user()->name ?? '')); ?>" placeholder="Your full name" required class="input-field"></label>
          <label><span class="label">Email address</span><input type="email" name="patient_email" value="<?php echo e(old('patient_email', auth()->user()->email ?? '')); ?>" placeholder="you@example.com" required class="input-field"></label>
          <label class="sm:col-span-2"><span class="label">How can we help? <em class="font-medium text-slate-400">optional</em></span><textarea name="message" class="input-field min-h-28 resize-y" placeholder="A short note for your doctor"><?php echo e(old('message')); ?></textarea></label>
          <button type="submit" class="btn-primary sm:col-span-2 py-4">Request appointment <span class="text-lg">→</span></button>
          <p class="sm:col-span-2 text-center text-xs leading-5 text-slate-400">Your request is private. You will receive an email confirmation and appointment reminders.</p>
        </form>
        <script>
          (() => {
            const specialty = document.getElementById('appointment-specialty');
            const doctor = document.getElementById('appointment-doctor');
            const hint = document.getElementById('doctor-help');
            if (!specialty || !doctor) return;
            const filterDoctors = () => {
              const careId = specialty.value;
              [...doctor.options].forEach(option => {
                if (!option.value) return;
                option.hidden = Boolean(careId && option.dataset.specialty !== careId);
              });
              const selected = doctor.options[doctor.selectedIndex];
              if (selected?.value && selected.dataset.specialty !== careId) doctor.value = '';
              hint.textContent = careId ? 'Only doctors in this care area are shown.' : 'Select a care area to see matching doctors.';
            };
            specialty.addEventListener('change', filterDoctors);
            doctor.addEventListener('change', () => {
              const selected = doctor.options[doctor.selectedIndex];
              if (selected?.dataset.specialty) { specialty.value = selected.dataset.specialty; filterDoctors(); }
            });
            filterDoctors();
          })();
        </script>
      </div>
    </div>
  </section>
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
<?php /**PATH C:\ITprojects\medicare-laravel\resources\views/appointments/create.blade.php ENDPATH**/ ?>