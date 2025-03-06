<?php

namespace App\Http\Controllers;

use App\Models\General;
use Illuminate\Http\Request;
use Image;
use App\Http\Requests\GeneralRequest;
class GeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $general = General::orderBy('id', 'desc')->first();
        $generalCount = General::count();

        return view('backend.general.index',['general'=>$general, 'generalCount' => $generalCount]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.general.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GeneralRequest $request)
    {
        //
        $general = General::create($request->all());
        if ($request->hasFile('photo')) {
            $this->_uploadImage($request, $general);
        }

        return redirect()->route('general.index')->with('success','Data inserted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(General $general)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(General $general)
    {
        //
        return view('backend.general.edit',[
            'edit' => $general
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GeneralRequest $request, General $general)
    {
        //
        $general->update($request->all());
        if ($request->hasFile('photo')) {
            @unlink('storage/'.$general->photo);
            $this->_uploadImage($request, $general);
        }
        return redirect()->route('general.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(General $general)
    {
        //
        $general->delete();
        if(!empty($general->photo));
        @unlink('storage/'.$general->photo);
        return redirect()->route('general.index')->with('status','Data deleted successfully!');
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
