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
use App\Http\Controllers\TipController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\VideoCallController;
use Agence104\LiveKit\AccessToken;
use Agence104\LiveKit\AccessTokenOptions;
use Agence104\LiveKit\VideoGrant;

use App\Models\Appointment;
Route::get('/test', function(){
    if (class_exists('Livekit\AccessToken')) {
        echo "Livekit\AccessToken class found!";
    } else {
        echo "Livekit\AccessToken class NOT found!";
    }
});

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/all_tips', [FrontendController::class, 'all_tips'])->name('all_tips');
Route::get('/all_doctors', [FrontendController::class, 'all_doctor'])->name('all_doctor');
Route::get('/patient_registration_form', [PatientController::class, 'patient_registration_form'])->name('patient_registration_form');
Route::get('/all_service', [FrontendController::class, 'all_service'])->name('all_service');
Route::get('/details_tips/{slug}', [FrontendController::class, 'tips_details'])->name('details_tips');
Route::get('/details_service/{id}/{slug}', [FrontendController::class, 'service_details'])->name('details_service');
Route::get('/details_doctor/{slug}', [FrontendController::class, 'details_doctor'])->name('details_doctor');
Route::get('/all_payment_method', [PaymentController::class, 'payment_method'])->name('all_payment_method');

Route::post('store_appointment_info', [AppointmentController::class, 'store'])->name('store_appointment_info');
Route::post('patient_register', [FrontendController::class, 'patient_reg'])->name('patient.register');
Route::post('patient_login', [FrontendController::class, 'patient_login'])->name('patient.login');
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
    Route::get('all-appointment', [AppointmentController::class, 'all_appointment'])->name('all_appointment');
 
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

    //    'tips' => TipController::class,
    ]);

});

Route::get('/call/{remoteUserId}', function($remoteUserId){
    $appointment = Appointment::find($remoteUserId);

    if (!$appointment) {
        // Handle the case where the appointment doesn't exist
        abort(404); // Or redirect with an error message
    }

    return view('call', ['appointmentId' => $remoteUserId]);
})->middleware('auth');

Route::get('/livekit/token', function () {
    try {
        $roomName = request('room');
        $identity = Auth::id();
        $apiKey = env('LIVEKIT_API_KEY');
        $apiSecret = env('LIVEKIT_API_SECRET');

        $tokenOptions = (new AccessTokenOptions())
            ->setIdentity((string) $identity); // Ensure identity is a string

        $videoGrant = (new VideoGrant())
            ->setRoomJoin()
            ->setRoomName($roomName);

        $token = (new AccessToken($apiKey, $apiSecret))
            ->init($tokenOptions)
            ->setGrant($videoGrant)
            ->toJwt();

        \Log::info('LiveKit Token Generated', [
            'roomName' => $roomName,
            'identity' => $identity,
            'token' => $token,
        ]);

        return response()->json(['token' => $token]);
    } catch (\Exception $e) {
        \Log::error('LiveKit Token Error', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);
        return response()->json(['error' => 'Token generation failed'], 500);
    }
});

// Route::middleware(['auth'])->group(function () {
//     Route::get('doctor-appointment-video', [VideoCallController::class, 'doctorAppointment'])->name('doctor_appointment_video');
//     Route::post('generate-token', [VideoCallController::class, 'generateToken'])->name('generate_token');
// });

Route::middleware(['auth', 'doctor'])->group(function () {
  
      //schedule available/booked
    Route::get('schedule_status/{id}', [ScheduleController::class, 'status'])->name('schedule.status');
    Route::get('appointment_status/{id}', [AppointmentController::class, 'status'])->name('appointment.status');
    Route::get('doctor-appointment', [AppointmentController::class, 'doctor_appointment'])->name('doctor_appointment');
    Route::get('record_create/{patient}/{doctor}', [RecordController::class, 'record_create'])->name('record_create');
    Route::get('record_doctor', [RecordController::class, 'index'])->name('record.doctor');

    Route::resources([
        'schedule' => ScheduleController::class,
        'record' => RecordController::class
    ]);

});


Route::middleware(['auth', 'patient'])->group(function () {
  
    //schedule available/booked

  Route::get('patient-appointment', [AppointmentController::class, 'patient_appointment'])->name('patient_appointment');

});

// Tips resource accessible by both admin and doctor
Route::middleware(['auth'])->group(function () {
    Route::delete('delete-appointment', [AppointmentController::class, 'delete'])->name('appointment.destroy');
    Route::get('record_show/{id}', [RecordController::class, 'show'])->name('record.show');
    Route::get('record_patient', [RecordController::class, 'patient_index'])->name('record.patient');
    Route::resources([
        'tips' => TipController::class,
    ]);
});
require __DIR__.'/auth.php';
