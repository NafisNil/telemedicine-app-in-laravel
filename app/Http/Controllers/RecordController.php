<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;
use Auth;
class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $record = Record::where('doctor_id', Auth::user()->id)->get();
        return view('backend.record.index', ['record'=> $record]);
    }

    public function patient_index(){
        $record = Record::where('patient_id', Auth::user()->id)->get();
        return view('backend.record.patient_index', ['record'=> $record]);
    }

    public function record_create($patient, $doctor){
        $data['patient_id']= $patient;

        $data['doctor_id'] = $doctor;
        return view('backend.record.create', $data);
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
        $record = Record::create($request->all());
        return view('record.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $record  =Record::where('id', $id)->first();
        return view('backend.record.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $edit  =Record::where('id', $id)->first();
        return view('backend.record.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Record $record)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Record $record)
    {
        //
    }
}
