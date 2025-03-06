<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use App\Http\Requests\PaymentMethodRequest;
use Illuminate\Support\Str; 
use Image;
class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $payment_method = PaymentMethod::orderBy('id', 'desc')->get();
        return view('backend.payment_method.index',['payment_method'=>$payment_method]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.payment_method.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaymentMethodRequest $request)
    {
        //
        $payment_method = PaymentMethod::create([
            'name' => $request->name,
            'photo' => $request->photo,
            'slug' => Str::slug($request->name),
        ]);

        if ($request->hasFile('photo')) {
            $this->_uploadImage($request, $payment_method);
        }

        return redirect()->route('payment_method.index')->with('success','Data inserted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentMethod $paymentMethod)
    {
        //
        return view('backend.payment_method.edit',[
            'edit' => $paymentMethod,
     
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PaymentMethodRequest $request, PaymentMethod $paymentMethod)
    {
        //
        $paymentMethod->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
        //    'photo' => $request->photo,
        ]);
        if ($request->hasFile('photo')) {
            @unlink('storage/'.$paymentMethod->photo);
            $this->_uploadImage($request, $paymentMethod);
           
        }
        return redirect()->route('payment_method.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentMethod $paymentMethod)
    {
        //
        $paymentMethod->delete();
        if(!empty($paymentMethod->photo));
        @unlink('storage/'.$paymentMethod->photo);
        return redirect()->route('payment_method.index')->with('status','Data deleted successfully!');
    }

    private function _uploadImage($request, $about)
    {
        # code...
        if( $request->hasFile('photo') ) {
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(96, 96)->save('storage/' . $filename);
            $about->photo = $filename;
            $about->save();
        }

    }
}
