<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Http\Requests\StoreeventRequest;
use App\Http\Requests\UpdateeventRequest;
use Illuminate\Http\Request;

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
        $events = event::all();
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
    public function show(event $event)
    {
        //
    }
    public function getEventById($id)
    {
        $event_detail = event::find($id);
        if (isset($event_detail)) {
            return response()->json(['status' => 'success', 'data' => $event_detail], 200);
        } else {
            return response()->json(['status' => false, 'data' => 'Id' . ' ' . $id . ' does not exist'], 404);
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

    public function searchEvent(Request $request)
    {
        $eventList = Event::query();

        if ($request->filled('name')) {
            $eventList->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->filled('category_id')) {
            $categoryId = $request->input('category_id');
            $eventList->where('category_id', $categoryId);
        }

        if ($request->filled('date')) {
            $eventList->whereDate('date', $request->input('date'));
        }

        $events = $eventList->get();

        if ($events->isEmpty()) {
            return response()->json(['success' => false, 'message' => 'Events not found.'], 404);
        }

        return response()->json(['success' => true, 'data' => $events], 200);
    }
}
