<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreeventRequest;
use App\Http\Requests\UpdateeventRequest;
use App\Http\Resources\EventCategoryResource;
use App\Http\Resources\EventResource;
use App\Http\Resources\OrganizerResource;
use App\Models\User;
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
        $todayDate = date('Y-m-d');
        $eventUnDeadline = Event::where('date', '>=', $todayDate)->get();
        $todayDate = date('Y-m-d');
        if ($eventUnDeadline != null) {
            return EventResource::collection($eventUnDeadline)
                ->additional([
                    'status' => true,
                    'message' => 'There are all events that have not deadline yet.',
                    'data' => $eventUnDeadline
                ], 200);
        }
        return response()->json([
            'satus' => true,
            'message' => 'There are no event that has not deadline.'
        ], 200);
    }
    public function getEventsByCategory($categoryId, $eventId)
    {
        $todayDate = date('Y-m-d');
        $eventUnDeadline = Event::where('date', '>=', $todayDate)
            ->where('category_id', $categoryId)
            ->whereNotIn('id', [$eventId])
            ->inRandomOrder()
            ->limit(12)
            ->get();
        if ($eventUnDeadline->isNotEmpty()) {
            return EventCategoryResource::collection($eventUnDeadline)
                ->additional([
                    'success' => true,
                    'message' => 'These are all events in the specified category that have not reached the deadline yet.'
                ]);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'There are no events in the specified category that have not reached the deadline yet, or all events have already reached the deadline.'
            ], 200);
        }
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
        return new OrganizerResource($organizer);
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
