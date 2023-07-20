<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreeventRequest;
use App\Http\Requests\UpdateeventRequest;
use App\Http\Resources\EventBookingResource;
use App\Http\Resources\EventCategoryResource;
use App\Http\Resources\EventResource;
use App\Http\Resources\OrganizerResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function getEvents(Request $request)
    {
        $perPage = $request->input('perPage', 12); // Number of items per page
        $todayDate = date('Y-m-d');
        $eventUnDeadline = Event::where('date', '>=', $todayDate)->paginate($perPage);

        if ($eventUnDeadline->isEmpty()) {
            return response()->json([
                'status' => true,
                'message' => 'There are no events that have not reached the deadline yet.',
                'data' => []
            ], 200);
        }
        return response()->json([
            'status' => true,
            'message' => 'There are events that have not reached the deadline yet.',
            'data' => $eventUnDeadline
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
        $eventDetail = Event::find($id);
        if (isset($eventDetail)) {
            return response()->json(['status' => 'success', 'data' => $eventDetail], 200);
        } else {
            return response()->json(['status' => false, 'data' => 'Id' . ' ' . $id . ' does not exist'], 404);
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function booking($id)
    {
        //
        $eventBooking = Event::find($id);
        return new EventBookingResource($eventBooking);
        // if (isset($eventBooking)) {
        //     return response()->json(['status' => 'success', 'data' => $eventBooking], 200);
        // } else {
        //     return response()->json(['status' => false, 'data' => 'Id' . ' ' . $id . ' does not exist'], 404);
        // }
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
    public function deleteEventById(Request $eventId)
    {
        $event = Event::find($eventId);
        if ( Auth::user()->role !== 'admin') {
            return response()->json(['message' => 'No permission to delete this event'], 403);
        }
        $event->delete();
        return response()->json(['success' => true, 'message' => 'Event deleted successfully'], 200);
    }
    
    public function getOrganizerId($eventId)
    {
        $event = Event::find($eventId);
        $organizer = User::find($event->organizer_id);
        return new OrganizerResource($organizer);
    }

    public function searchEventsNotDeadline(Request $request)
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
