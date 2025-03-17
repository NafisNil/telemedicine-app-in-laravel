<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Payment;
use Auth;
class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
    public function store(Request $request)
    {


        // Store appointment data
        $appointment = new Appointment();
        $appointment->patient_id = $request->patient_id;
        $appointment->doctor_id = $request->doctor_id;
        $appointment->schedule_id = $request->schedule_id;
        $appointment->status = "pending";
        $appointment->save();

        // Store payment data
        $payment = new Payment();
        $payment->appointment_id = $appointment->id;
        $payment->patient_id = $request->patient_id;
        $payment->amount = $request->amount; // Assuming amount is passed in the request
        $payment->payment_status = "pending";
        $payment->save();

        return redirect()->route('all_payment_method')->with('success', 'Choose payment method.');
    }

    public function all_appointment(){
        $appointment = Appointment::orderBy('id', 'desc')->get();
        return view('backend.appointment.index', ['appointment' => $appointment]);
    }


    public function doctor_appointment(){
        $appointment = Appointment::where('doctor_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('backend.appointment.doctor_appointment', ['appointment' => $appointment]);
    }

    public function patient_appointment(){
        $appointment = Appointment::where('patient_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('backend.appointment.patient_appointment', ['appointment' => $appointment]);
    }

    public function status($id){
        $appointment = Appointment::find($id);
        if($appointment->status == 'pending' || $appointment->status == 'cancelled'){
            $appointment->status = 'approved';
        }else{
            $appointment->status = 'cancelled';
        }
        $appointment->save();
        return redirect()->route('doctor_appointment')->with('success','Status updated successfully');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
