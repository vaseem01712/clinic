<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorAuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorPortalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\MedicalReportController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PatientPortalController;
use App\Http\Controllers\PushSubscriptionController;
use App\Http\Controllers\PasswordSetupController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SpecialtyController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index'])->name('home');
Route::view('/about','about')->name('about');
Route::view('/pricing','pricing')->name('pricing');
Route::view('/testimonials','testimonials')->name('testimonials');
Route::view('/faq','faq')->name('faq');
Route::view('/portfolio','portfolio')->name('portfolio');
Route::view('/coming-soon','coming-soon')->name('coming-soon');

Route::get('/doctors',[DoctorController::class,'index'])->name('doctors.index');
Route::get('/doctors/{doctor}',[DoctorController::class,'show'])->name('doctors.show');
Route::get('/doctors/{doctor}/slots',[DoctorController::class,'slots'])->name('doctors.slots');
Route::get('/services',[ServiceController::class,'index'])->name('services.index');
Route::get('/services/{service}',[ServiceController::class,'show'])->name('services.show');
Route::get('/specialties',[SpecialtyController::class,'index'])->name('specialties.index');
Route::get('/specialties/{specialty}',[SpecialtyController::class,'show'])->name('specialties.show');

Route::get('/appointments/create',[AppointmentController::class,'create'])->name('appointments.create');
Route::post('/appointments',[AppointmentController::class,'store'])->name('appointments.store');
Route::get('/appointments/{appointment}/success',[AppointmentController::class,'success'])->name('appointments.success');
Route::post('/appointment-push-subscriptions', [PushSubscriptionController::class, 'storeForLatestAppointment'])
    ->name('push-subscriptions.appointment.store');

Route::get('/blog',[BlogController::class,'index'])->name('blog.index');
Route::get('/blog/{post}',[BlogController::class,'show'])->name('blog.show');
Route::get('/contact',[ContactController::class,'index'])->name('contact');
Route::post('/contact',[ContactController::class,'store'])->name('contact.store');
Route::post('/newsletter',[NewsletterController::class,'store'])->name('newsletter.store');

Route::middleware('guest')->group(function () {
    Route::get('/doctor/login',[DoctorAuthController::class,'showLogin'])->name('doctor.login');
    Route::post('/doctor/login',[DoctorAuthController::class,'login'])->middleware('throttle:doctor-login')->name('doctor.login.store');
    Route::get('/forgot-password/{portal}',[PasswordSetupController::class,'forgotForm'])->where('portal','doctor|patient')->name('password.forgot');
    Route::post('/forgot-password/{portal}',[PasswordSetupController::class,'forgot'])->where('portal','doctor|patient')->name('password.forgot.store');
    Route::get('/set-password',[PasswordSetupController::class,'show'])->name('password.setup');
    Route::post('/set-password',[PasswordSetupController::class,'store'])->name('password.setup.store');
});

Route::middleware('auth')->group(function () {
    Route::post('/push-subscriptions', [PushSubscriptionController::class, 'store'])->name('push-subscriptions.store');
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::prefix('doctor')->group(function () {
        Route::get('/dashboard',[DoctorPortalController::class,'dashboard'])->name('doctor.dashboard');
        Route::get('/patients',[DoctorPortalController::class,'patients'])->name('doctor.patients');
        Route::get('/patients/{patient}',[DoctorPortalController::class,'patient'])->name('doctor.patient.show');
        Route::get('/appointments',[DoctorPortalController::class,'appointments'])->name('doctor.appointments');
        Route::get('/reports',[MedicalReportController::class,'index'])->name('doctor.reports');
        Route::get('/patients/{patient}/reports/create',[MedicalReportController::class,'create'])->name('doctor.reports.create');
        Route::post('/reports',[MedicalReportController::class,'store'])->name('doctor.reports.store');
        Route::get('/patients/{patient}/records/create',[MedicalRecordController::class,'create'])->name('doctor.records.create');
        Route::post('/records',[MedicalRecordController::class,'store'])->name('doctor.records.store');
        Route::get('/profile',[DoctorPortalController::class,'profile'])->name('doctor.profile');
        Route::put('/profile',[DoctorPortalController::class,'updateProfile'])->name('doctor.profile.update');
        Route::post('/logout',[DoctorAuthController::class,'logout'])->name('doctor.logout');
    });

    Route::get('/reports',[PatientPortalController::class,'reports'])->name('patient.reports');
    Route::get('/notifications',[PatientPortalController::class,'notifications'])->name('patient.notifications');
    Route::post('/notifications/{notification}/read',[PatientPortalController::class,'readNotification'])->name('patient.notifications.read');
    Route::get('/medical-reports/{report}/download',[MedicalReportController::class,'download'])->name('medical-reports.download');
});

require __DIR__.'/auth.php';
