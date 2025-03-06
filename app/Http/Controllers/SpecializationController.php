<?php

namespace App\Http\Controllers;

use App\Models\Specialization;
use Illuminate\Http\Request;
use App\Http\Requests\SpecializationRequest;
use Image;
use Illuminate\Support\Str; 
class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $specialization = Specialization::orderBy('id', 'desc')->get();
        return view('backend.specialization.index',['specialization'=>$specialization]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $specialization = Specialization::all();
        return view('backend.specialization.create', ['specialization' => $specialization]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SpecializationRequest $request)
    {
        //
        $specialization = Specialization::create([
            'title' => $request->title,
            'description' => $request->description,
            'slug' => Str::slug($request->title),
            'photo' => $request->photo,
        ]);
        if ($request->hasFile('photo')) {
            $this->_uploadImage($request, $specialization);
        }

        return redirect()->route('specialization.index')->with('success','Data inserted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Specialization $specialization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specialization $specialization)
    {
        //
        return view('backend.specialization.edit',[
            'edit' => $specialization,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SpecializationRequest $request, Specialization $specialization)
    {
        //
        $specialization->update([
            'title' => $request->title,
            'description' => $request->description,
            'slug' => Str::slug($request->title),
        //    'photo' => $request->photo,
        ]);
        if ($request->hasFile('photo')) {
            @unlink('storage/'.$specialization->photo);
            $this->_uploadImage($request, $specialization);
        
        }
        return redirect()->route('specialization.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specialization $specialization)
    {
        //
        $specialization->delete();
        if(!empty($specialization->photo));
        @unlink('storage/'.$specialization->photo);
        return redirect()->route('specialization.index')->with('status','Data deleted successfully!');
    }


    private function _uploadImage($request, $about)
    {
        # code...
        if( $request->hasFile('photo') ) {
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(750, 500)->save('storage/' . $filename);
            $about->photo = $filename;
            $about->save();
        }

    }
}
