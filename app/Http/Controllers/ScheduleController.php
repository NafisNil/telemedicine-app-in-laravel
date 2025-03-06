<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Http\Requests\ScheduleRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $schedule = Schedule::orderBy('id', 'desc')->get();
        return view('backend.schedule.index',['schedule'=>$schedule]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.schedule.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ScheduleRequest $request)
    {
        //
        $schedule = Schedule::create([
            'doctor_id' =>Auth::user()->id,
            'day' => $request->day,
            'start' => $request->start,
            'end' => $request->end,
            'status' => $request->status
        ]);

        return redirect()->route('schedule.index')->with('success','Data inserted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        //
        return view('backend.schedule.edit',[
            'edit' => $schedule,
     
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ScheduleRequest $request, Schedule $schedule)
    {
        //
        $schedule->update([
            'doctor_id' =>Auth::user()->id,
            'day' => $request->day,
            'start' => $request->start,
            'end' => $request->end,
            'status' => $request->status
        ]);
      
        return redirect()->route('schedule.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        //
        $schedule->delete();
      
        return redirect()->route('schedule.index')->with('status','Data deleted successfully!');
    }


    public function status($id){
        $schedule = Schedule::find($id);
        if($schedule->status == 'available'){
            $schedule->status = 'booked';
        }else{
            $schedule->status = 'available';
        }
        $schedule->save();
        return redirect()->route('schedule.index')->with('success','Status updated successfully');
    }


}
