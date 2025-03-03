<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// Route::resources([
//     'message' => MessageController::class,
// ]);

// Route::middleware('auth')->group(function () {
//     Route::resources([
//         'logo' => LogoController::class,
//         'slider' => SliderController::class,
//         'about' => AboutController::class,
//         'client' => ClientController::class,
//         'service' => ServiceController::class,
//         'portfolio' => PortfolioController::class,
//         'course' => CourseController::class,
//         'contact' => ContactController::class,
//         'social' => SocialController::class,
//         'testimonial' => TestimonialController::class
//     ]);

// });


require __DIR__.'/auth.php';
