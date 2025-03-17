<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\General;
use App\Models\Social;
use App\Models\Slider;
use App\Models\Doctor;
use App\Models\About;
use App\Models\Specialization;
use App\Models\User;
use App\Models\Tip;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Support\Str; 
use App\Http\Requests\PatientRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function patient_registration_form(){
        $data['slider'] = Slider::first();
        $data['general'] = General::first();
        $data['social'] = Social::first();
        return view('frontend.patient_registration_form', $data);
     }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PatientRequest $request)
    {
        $patientId = DB::table('users')->insertGetId([
            'full_name' => $request->name,
            'phone' => $request->phone,
            'role' => 'patient',
            'password' => Hash::make($request->password),
            'slug' => Str::slug($request->name),
            'address' => $request->address,
            'dob' => $request->dob,
            'email' => $request->email,
            'sex' => $request->sex,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $patient = User::find($patientId);
        Auth::login($patient);

        return redirect()->intended(url()->previous());
    }

    public function patient_reg(PatientRequest $request){
        $patientId = DB::table('users')->insertGetId([
            'full_name' => $request->name,
            'phone' => $request->phone,
            'role' => 'patient',
            'password' => Hash::make($request->password),
            'slug' => Str::slug($request->name),
            'address' => $request->address,
            'dob' => $request->dob,
            'email' => $request->email,
            'sex' => $request->sex,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $patient = User::find($patientId);
        Auth::login($patient);

        return redirect()->intended(url()->previous());
    }

    

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
