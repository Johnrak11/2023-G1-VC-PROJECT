<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreeventRequest;
use App\Http\Requests\UpdateeventRequest;
use App\Http\Resources\EventBookingResource;
use App\Http\Resources\EventCategoryResource;
use App\Http\Resources\EventResource;
use App\Http\Resources\OrganizerResource;
use App\Models\Agenda;
use App\Models\Discount;
use App\Models\Event_detail;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getOrganizerEvents(Request $request)
    {
        $perPage = $request->input('perPage', 20); // Number of items per page
        $isPublic = $request->input('isPublic');
        $organizerId = Auth::user()->id;
        $previewEvents = Event::where('organizer_id', $organizerId)
            ->where('is_public', $isPublic)
            ->orderBy('date', 'asc')
            ->paginate($perPage);

        if ($previewEvents->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'There are no event previews yet.',
                'data' => []
            ], 200);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get preview successfully',
            'data' => $previewEvents
        ], 200);
    }

    public function postPreviewEvent($id, $isPublic)
    {
        $organizerId = Auth::user()->id;
        $eventPreview = Event::where('organizer_id', $organizerId)
            ->where('id', $id)
            ->first();

        if (!$eventPreview) {
            return response()->json([
                'success' => true,
                'message' => 'Something wrong.. this event is not define',
            ], 404);
        }
        $eventPreview->is_public = $isPublic;
        $eventPreview->save();

        return response()->json([
            'success' => true,
            'message' => 'Event has been posted successfully',
        ], 200);
    }


    public function getEvents(Request $request)
    {
        $perPage = $request->input('perPage', 16); // Number of items per page
        $todayDate = date('Y-m-d');
        $eventUnDeadline = Event::where('date', '>=', $todayDate)->where('is_public', 1)->paginate($perPage);

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
            ->where('is_public', 1)
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

    public function store(Request $request)
    {
        $eventRules = [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'date' => ['required', 'date'],
            'time' => ['required', 'date_format:H:i:s'],
            'location' => ['required', 'string'],
            'longitude' => ['required', 'numeric'],
            'latitude' => ['required', 'numeric'],
            'image' => ['required'],
            'venue' => ['required', 'string'],
            'category_id' => ['required', 'exists:categories,id'],
        ];
        $eventRequest = $request['event'];
        $eventRequest['organizer_id'] =  Auth::user()->id;
        $validator = Validator::make($eventRequest, $eventRules);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $newEvent = Event::create($eventRequest);
        if ($request['ticket']) {
            $eventDetailRequest = $request['ticket'];
            $eventDetailRequest['event_id'] = $newEvent['id'];
            $newEventDetail = $this->eventDetailStore($eventDetailRequest);

            if ($request['discount']) {
                $discountRequest = $request['discount'];
                $discountRequest['event_detail_id'] = $newEventDetail['id'];
                $this->discountStore($discountRequest);
            }
        }
        if (is_array($request['agendas']) && !empty($request['agendas'])) {
            $newAgendas = [];
            foreach ($request['agendas'] as $agendaRequest) {
                $agendaRequest['event_id'] = $newEvent['id'];
                $date = DateTime::createFromFormat("m/d/Y h:i A", $agendaRequest['date']);
                if ($date) {
                    $formattedDate = $date->format('Y-m-d H:i:s');
                    $agendaRequest['date'] = $formattedDate;
                    $newAgenda = $this->agendaStore($agendaRequest);
                    array_push($newAgendas, $newAgenda);
                } else {
                    return 'agenda date incorrect';
                }
            }
        }
        return response()->json(['success' => true, 'message' => 'Event created successfully'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function eventDetailStore($request)
    {
        $eventDetailRules = [
            'available_ticket' => ['required', 'integer', 'min:0'],
            'description' => ['required', 'string'],
            'price' => ['required'],
            'event_id' => ['required', 'exists:events,id'],
        ];
        $validator = Validator::make($request, $eventDetailRules);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $newEventDetail = Event_detail::create($validator->validated());
        return $newEventDetail;
    }

    public function discountStore($request)
    {
        $discountRules = [
            'end_date' =>  ['required', 'date_format:Y-m-d H:i:s'],
            'percent' => ['required', 'integer'],
            'event_detail_id' => ['required', 'exists:event_details,id'],
        ];
        $validator = Validator::make($request, $discountRules);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $newDiscount = Discount::create($validator->validated());
        return $newDiscount;
    }

    public function agendaStore($request)
    {
        $agendaRules = [
            'date' => ['required', 'date_format:Y-m-d H:i:s'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'event_id' => ['required', 'exists:events,id'],
        ];
        $validator = Validator::make($request, $agendaRules);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $newAgenda = Agenda::create($validator->validated());
        return $newAgenda;
    }


    public function getEventById($id)
    {
        $eventDetail = Event::where('id', $id)->where('is_public', 1)->first();

        if ($eventDetail) {
            return response()->json(['status' => 'success', 'data' => $eventDetail], 200);
        } else {
            return response()->json(['status' => false, 'data' => 'Id ' . $id . ' does not exist or is not public'], 404);
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
    public function deleteEventById(int $eventId)
    {
        $organizer = Auth::user();
        if ($organizer->role !== 'admin') {
            return response()->json(['message' => 'No permission to delete this event'], 403);
        }

        $event = Event::where('id', $eventId)->where('organizer_id', $organizer->id)->first();
        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
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
            $eventList->where('name', 'like', '%' . $request->input('name') . '%')->where('is_public', 1);
        }

        if ($request->filled('category_id')) {
            $categoryId = $request->input('category_id');
            $eventList->where('category_id', $categoryId)->where('is_public', 1);
        }

        if ($request->filled('date')) {
            $eventList->whereDate('date', $request->input('date'))->where('is_public', 1);
        }

        $events = $eventList->get();
        if ($events->isEmpty()) {
            return response()->json(['success' => false, 'message' => 'Events not found.'], 404);
        }
        return response()->json(['success' => true, 'data' => $events], 200);
    }

    public function searchEventsName(Request $request)
    {
        $organizer = Auth::user();
        if ($organizer->role !== 'admin') {
            return response()->json(['message' => 'No permission to search events'], 403);
        }
        $eventList = Event::query();

        if ($request->filled('name')) {
            $eventList->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->filled('email') && $organizer->email === $request->input('email')) {
            $eventList->where('organizer_id', $organizer->id);
        }



        $events = $eventList->get();

        if ($events->isEmpty()) {
            return response()->json(['success' => false, 'message' => 'Events not found.'], 404);
        }

        return response()->json(['success' => true, 'data' => $events], 200);
    }
}
