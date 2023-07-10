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
    public function getEventById($id) {
        $event_detail = event::find($id);
        if (isset($event_detail)) {
            return response()->json(['status'=> 'success','data' => $event_detail],200);
        }
        else {
            return response()->json(['status'=> false,'data' => 'Id'.' '. $id. ' does not exist'],404);
        }
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
