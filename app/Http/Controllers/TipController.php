<?php

namespace App\Http\Controllers;

use App\Models\Tip;
use Illuminate\Http\Request;
use App\Http\Requests\TipsRequest;
use Illuminate\Support\Str; 
class TipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
  
        $tips = Tip::orderBy('id', 'desc')->get();
        return view('backend.tips.index',['tips'=>$tips]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.tips.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TipsRequest $request)
    {
        //
        $tips = Tip::create([
          'problem' => $request->problem,
          'remedy' => $request->remedy,
          'symptoms' => $request->symptoms,
          'user_id' => $request->user_id,
          'slug' => Str::slug($request->problem),
        ]);

        return redirect()->route('tips.index')->with('success','Data inserted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tip $tip)
    {
        //
        return view('backend.tips.show',[
            'show' => $tip,
     
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tip $tip)
    {
        //
        return view('backend.tips.edit',[
            'edit' => $tip,
     
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TipsRequest $request, Tip $tip)
    {
        //
        $tip->update([
            'problem' => $request->problem,
            'remedy' => $request->remedy,
            'symptoms' => $request->symptoms,
            'user_id' => $request->user_id,
            'slug' => Str::slug($request->problem),
        ]);
      
        return redirect()->route('tips.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tip $tip)
    {
        //
        $tip->delete();
      
        return redirect()->route('tip.index')->with('status','Data deleted successfully!');
    }
}
