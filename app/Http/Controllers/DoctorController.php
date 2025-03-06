<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Specialization;
use Illuminate\Http\Request;
use Image;
use App\Http\Requests\DoctorRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str; 
use Carbon\Carbon;
class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $doctor = Doctor::where('role', 'doctor')->orderBy('id', 'desc')->get();
        return view('backend.doctor.index',['doctor'=>$doctor]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $specialization = Specialization::all();
        return view('backend.doctor.create', ['specialization' => $specialization]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DoctorRequest $request)
    {
    
        $generatedPassword = Str::random(12);

        // Hash the password using bcrypt (the default and recommended method)
        $hashedPassword = Hash::make($generatedPassword);
        $doctor = Doctor::create([
            'full_name' => $request->full_name,
       //    'name' =>  explode(" ", $request->full_name)[0],
            'name' => $generatedPassword,
            'phone' => $request->phone,
            'role' => 'doctor',
            'password' => $hashedPassword,
            'slug' => Str::slug($request->full_name),
            'address' => $request->address,
            'dob' => $request->dob,
            'specialization_id' => $request->specialization_id,
            'email' => $request->email,
            'experience' => $request->experience,
            'bio' => $request->bio,
            'photo' => $request->photo,
            'license_number' => $request->license_number,
            'price' => $request->price,
        ]);
        if ($request->hasFile('photo')) {
            $this->_uploadImage($request, $doctor);
        }

        return redirect()->route('doctor.index')->with('success','Data inserted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        //
             return view('backend.doctor.show',[
            'show' => $doctor,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        //
        $specialization = Specialization::all();
        return view('backend.doctor.edit',[
            'edit' => $doctor,
            'specialization' => $specialization
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DoctorRequest $request, Doctor $doctor)
    {
        //
        $doctor->update([
            'full_name' => $request->full_name,
           // 'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'dob' => $request->dob,
            'specialization_id' => $request->specialization_id,
            'email' => $request->email,
            'experience' => $request->experience,
            'bio' => $request->bio,
            'license_number' => $request->license_number,
            'slug' => Str::slug($request->full_name),
            'price' => $request->price,
        ]);
        if ($request->hasFile('photo')) {
            @unlink('storage/'.$doctor->photo);
            $this->_uploadImage($request, $doctor);
          
        }
        return redirect()->route('doctor.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        //
        $doctor->delete();
        if(!empty($doctor->photo));
        @unlink('storage/'.$doctor->photo);
        return redirect()->route('doctor.index')->with('status','Data deleted successfully!');
    }

    private function _uploadImage($request, $about)
    {
        # code...
        if( $request->hasFile('photo') ) {
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(470, 470)->save('storage/' . $filename);
            $about->photo = $filename;
            $about->save();
        }

    }

    public function status($slug)
    {
        $doctor = Doctor::where('slug', $slug)->first();
        if ($doctor->status == 'active') {
            $doctor->status = 'inactive';
            $doctor->save();
            return redirect()->back()->with('success', 'Doctor inactive successfully');
        } else {
            $doctor->status = 'active';
            $doctor->save();
            return redirect()->back()->with('success', 'Doctor active successfully');
        }
    }
}
