<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AboutController;
Route::get('/', [FrontendController::class, 'index'])->name('index');

Route::get('/dashboard',[HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// Route::resources([
//     'message' => MessageController::class,
// ]);

Route::middleware(['auth', 'admin'])->group(function () {
    //doctor active/inactive
    Route::get('doctor_status/{slug}', [DoctorController::class, 'status'])->name('doctor.status');
      //schedule available/booked
  //  Route::get('schedule_status/{id}', [ScheduleController::class, 'status'])->name('schedule.status');
    Route::resources([
        'doctor' => DoctorController::class,
        'specialization' => SpecializationController::class,
        'payment_method' => PaymentMethodController::class,
       'general' => GeneralController::class,
        'social' => SocialController::class,
        'slider' => SliderController::class,
        'about' => AboutController::class,
    ]);

});

Route::middleware(['auth', 'doctor'])->group(function () {
  
      //schedule available/booked
    Route::get('schedule_status/{id}', [ScheduleController::class, 'status'])->name('schedule.status');
    Route::resources([
        'schedule' => ScheduleController::class,
    ]);

});


require __DIR__.'/auth.php';
