<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\General;
use App\Models\Social;
use App\Models\Slider;
class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function payment_method(){
        $data['general'] = General::first();
        $data['social'] = Social::first();
        $data['slider'] = Slider::first();
        $data['payment_method'] = PaymentMethod::all();
        return view('frontend.payment_method', $data);

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
