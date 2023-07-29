<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreeventRequest;
use App\Http\Requests\UpdateeventRequest;
use App\Http\Resources\EventBookingResource;
use App\Http\Resources\EventCategoryResource;
use App\Http\Resources\EventEditInforResource;
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
use PhpParser\Node\Expr\FuncCall;

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

    public function getAllEvents()
    {
        $userId = Auth::user()->id;
        $events = Event::where('organizer_id', $userId)->get();
        return response()->json(['message' => 'success', 'data' => $events], 200);
    }

    public function getEventId($eventId)
    {
        $userId = Auth::user()->id;
        $event = Event::where('id', $eventId)->where('organizer_id', $userId)->firstOrFail();
        return response()->json(['message' => 'success', 'data' => new EventResource($event)], 200);
    }

    // =============== Create ========

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

    public function booking($id)
    {
        //
        $eventBooking = Event::find($id);
        return new EventBookingResource($eventBooking);
    }

    public function deleteEventById($eventId)
    {
        $admin = Auth::user();
        if ($admin->role !== 'admin') {
            return response()->json(['message' => 'No permission to delete this event'], 403);
        }

        $event = Event::where('id', $eventId)->first();
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


    public function searchEventsByAdmin(Request $request)
    {
        $organizer = Auth::user();
        if ($organizer->role !== 'admin') {
            return response()->json(['message' => 'No permission to search events'], 403);
        }

        $eventList = Event::query();

        if ($request->filled('name')) {
            $eventList->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->filled('email')) {
            $user = User::where('email',  'like', '%' . $request->input('email') . '%')->first();

            if (!$user) {
                return response()->json(['success' => false, 'message' => 'Organizer email not found.'], 404);
            }

            $eventList->where('organizer_id', $user->id);
        }

        $events = $eventList->get();

        if ($events->isEmpty()) {
            return response()->json(['success' => false, 'message' => 'Events not found.'], 404);
        }

        return response()->json(['success' => true, 'data' => $events], 200);
    }


    // =============== Update========

    public function update(Request $request)
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
            'organizer_id' => ['required', 'exists:users,id'],
        ];

        $eventRequest = [
            'name' => $request->name,
            'description' => $request->description,
            'date' => $request->date,
            'time' => $request->time,
            'location' => $request->location,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'image' => $request->image,
            'venue' => $request->venue,
            'category_id' => $request->category_id,
            'organizer_id' => $request->organizer_id,
        ];
        $validator = Validator::make($eventRequest, $eventRules);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $event = Event::where('id', $request->id)
            ->where('organizer_id', Auth::user()->id)
            ->firstOrFail();
        $event->update($eventRequest);

        // ---- upadte event detail -----
        if ($request->input('event_detail')) {
            $eventDetailRequest = $request->input('event_detail');
            $eventDetailRequest[0]['event_id'] = $event->id;
            $eventDetail = $this->eventDetailEdit($eventDetailRequest[0]);

            if ($request->input('discounts')[0]['discounts']) {
                $discountRequest = $request->input('discounts')[0]['discounts'];
                $discountRequest['event_detail_id'] = $eventDetail->id;
                $this->discountEdit($discountRequest);
            }
        }

        if (is_array($request->input('agendas')) && !empty($request->input('agendas'))) {
            $newAgendas = [];
            foreach ($request->input('agendas') as $agendaRequest) {
                $agendaRequest['event_id'] = $event->id;
                if (!empty($agendaRequest['id'])) {
                    $newAgenda = $this->agendaEdit($agendaRequest, $agendaRequest['id']);
                    array_push($newAgendas, $newAgenda);
                } else {
                    $newAgenda = $this->agendaEdit($agendaRequest);
                    array_push($newAgendas, $newAgenda);
                }
            }
            // Get all agendas for the event
            $eventAgendas = Agenda::where('event_id', $event->id)->get();
            // Delete agendas that are not in the $newAgendas array
            foreach ($eventAgendas as $agenda) {
                $found = false;
                foreach ($newAgendas as $newAgenda) {
                    if ($agenda->id == $newAgenda->id) {
                        $found = true;
                        break;
                    }
                }
                if (!$found) {
                    $agenda->delete();
                }
            }
        }
        return response()->json(['success' => true, 'message' => 'Event updated successfully', new EventResource($event)], 200);
    }

    public function eventDetailEdit($request)
    {
        $eventDetailRules = [
            'available_ticket' => ['required', 'integer', 'min:0'],
            'description' => ['required', 'string'],
            'price' => ['required'],
            'event_id' => ['required', 'exists:events,id'],
        ];
        $eventDetailRequest = [
            'available_ticket' => $request['available_ticket'],
            'description' => $request['description'],
            'price' => $request['price'],
            'event_id' => $request['event_id'],
        ];
        $validator = Validator::make($eventDetailRequest, $eventDetailRules);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $eventDetail = Event_detail::find($request['id']);
        if (!$eventDetail) {
            return 'Event detail not found';
        }
        $eventDetail->update($validator->validated());
        return $eventDetail;
    }

    public function discountEdit($request)
    {
        $discountRules = [
            'end_date' =>  ['required', 'date_format:Y-m-d H:i:s'],
            'percent' => ['required', 'integer'],
            'event_detail_id' => ['required', 'exists:event_details,id'],
        ];

        $discountRequest = [
            'end_date' => $request['end_date'],
            'percent' => $request['percent'],
            'event_detail_id' => $request['event_detail_id'],
        ];
        $validator = Validator::make($discountRequest, $discountRules);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $discount = Discount::find($request['id']);
        $discount->update($validator->validated());
        return $discount;
    }

    public function agendaEdit($request, $id = null)
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
        $agendaData = $validator->validated();
        $agenda = Agenda::updateOrCreate(['id' => $id], $agendaData);
        return $agenda;
    }


    public function getEditInfor($eventId)
    {
        $userId = Auth::user()->id;
        $event = Event::where('id', $eventId)->where('organizer_id', $userId)->firstOrFail();
        return response()->json(['message' => 'success', 'data' => new EventEditInforResource($event)], 200);
    }

    // Referencses====
    // Recomand event 
    //Laravel Geospatial Docs: https://laravel.com/docs/8.x/eloquent-mutators#spatial-casting
    // GeoPHP Library: https://geophp.net/
    // PostGIS: https://postgis.net/
    public function getEventsWithinRadius($latitude, $longitude, $kilometers)
    {
        $events = Event::select("*")
            ->selectRaw("( 6371 * 2 * ASIN(SQRT(POWER(SIN((RADIANS($latitude) - RADIANS(latitude)) / 2), 2) + COS(RADIANS($latitude)) * COS(RADIANS(latitude)) * POWER(SIN((RADIANS($longitude) - RADIANS(longitude)) / 2), 2)))) as distance")
            ->having('distance', '<=', $kilometers)
            ->get();

        return response()->json($events);
    }
   
}
