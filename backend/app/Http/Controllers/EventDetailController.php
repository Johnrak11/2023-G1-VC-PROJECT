<?php

namespace App\Http\Controllers;

use App\Models\event_detail;
use App\Http\Requests\Storeevent_detailRequest;
use App\Http\Requests\Updateevent_detailRequest;
use App\Models\event;
use App\Models\EventDetail;

class EventDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
    public function store(Storeevent_detailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }
    public function getEventDetail($eventId)
    {
        $eventDetail = EventDetail::where('event_id', '>=', $eventId)->first();
        if (isset($eventDetail)) {
            return response()->json(['status' => 'success', 'data' => $eventDetail], 200);
        } else {
            return response()->json(['status' => false, 'data' => 'Id does not exist'], 404);
        }
        // return $eventDetail;
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updateevent_detailRequest $request, event_detail $event_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $event_detail)
    {
        //
    }
}
