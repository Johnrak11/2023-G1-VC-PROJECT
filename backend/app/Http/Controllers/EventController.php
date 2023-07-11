<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreeventRequest;
use App\Http\Requests\UpdateeventRequest;
use App\Http\Resources\OrganizerResource;
use App\Models\User;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function getEventsNotDeadline()
    {
        $events = Event::all();
        $eventUnDeadline = [];
        $todayDate = date('Y-m-d');
        foreach ($events as $event) {
            if ($event['date'] >= $todayDate) {
                $eventUnDeadline[] = $event;
            }
        };
        if ($eventUnDeadline != null) {
            return response()->json([
                'status' => 'Success' . (true),
                'message' => 'There are all events that have not deadline yet.',
                'data' => $eventUnDeadline
            ], 200);
        }
        return response()->json([
            'satus' => 'Success (true)',
            'message' => 'There are no event that has not deadline.'
        ], 200);
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
    public function show(Event $event)
    {
        //
    }
    public function getEventById($id)
    {
        $event_detail = Event::find($id);
        if (isset($event_detail)) {
            return response()->json(['status' => 'success', 'data' => $event_detail], 200);
        } else {
            return response()->json(['status' => false, 'data' => 'Id' . ' ' . $id . ' does not exist'], 404);
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
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
    public function destroy(Event $event)
    {
        //
    }
    public function getOrganizerId($eventId)
    {
        $event = Event::find($eventId);
        $organizer = User::find($event->organizer_id);
        return new OrganizerResource ($organizer);
    }
}
