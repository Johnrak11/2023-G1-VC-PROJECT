<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Http\Requests\StoreeventRequest;
use App\Http\Requests\UpdateeventRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function getEventsNotDeadline(){
        $events = event::all();
        $eventUnDeadline = [];
        $todayDate = date('Y-m-d');
        foreach ($events as $event){
            if ($event['date']>=$todayDate){
                $eventUnDeadline[] = $event;
            }
        };
        if($eventUnDeadline!=null){
            return response()->json([
                'status'=>'Success'. (true),
                'message'=>'There are all events that have not deadline yet.', 
                'data'=>$eventUnDeadline
            ],200);
        }
        return response()->json([
            'satus'=>'Success (true)',
            'message'=>'There are no event that has not deadline.'],200);
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
    public function store(StoreeventRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateeventRequest $request, event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(event $event)
    {
        //
    }
}
