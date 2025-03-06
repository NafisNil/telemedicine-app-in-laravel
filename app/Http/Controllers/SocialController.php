<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;
class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $social = Social::orderBy('id', 'desc')->get();
        $socialCount = Social::count();

        return view('backend.social.index',['social'=>$social, 'socialCount' => $socialCount]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.social.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $social = Social::create($request->all());
      
        return redirect()->route('social.index')->with('success','Data inserted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Social $social)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Social $social)
    {
        //

        return view('backend.social.edit',[
            'edit' => $social
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Social $social)
    {
        //
        $social->update($request->all());
       
        return redirect()->route('social.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Social $social)
    {
        //
        $social->delete();
   
        return redirect()->route('social.index')->with('status','Data deleted successfully!');
    }
}
