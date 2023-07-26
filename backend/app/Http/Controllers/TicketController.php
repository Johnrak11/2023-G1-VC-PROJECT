<?php

namespace App\Http\Controllers;

use App\Models\ticket;
use App\Http\Resources\TicketResource;

class TicketController extends Controller
{

    public function getAllTicket()
    {
        $user = auth()->user();
        $tickets = Ticket::where('user_id', $user->id)->get();
        $ticketResources = TicketResource::collection($tickets);

        return response()->json(['status' => true, 'data' => $ticketResources], 200);
    }


    public function getOwnerOfTicket($eventId)
    {
        $ticketsOfUsers = Ticket::where('event_id', $eventId)
            ->with('user')
            ->get();

        if ($ticketsOfUsers != null) {
            return response()->json(['status' => 'success', 'data' => $ticketsOfUsers], 200);
        }
        return response()->json(['status' => 'success', 'data' => 'Sorry, we do not have any data that fit with the event'], 204);
    }


    public function getTicketByEventId($eventId)
    {
        $user = auth()->user();
        $ticket = Ticket::where('user_id', $user->id)
            ->where('event_id', $eventId)->first();
        if (!isset($ticket)) {
            return response()->json(['success' => false, 'message' => "You didn't register yet"], 400);
        }
        if ($ticket['is_check_in'] === 0) {
            $ticket['is_check_in'] = 1;
            $ticket->save();
            return response()->json(['success' => true, 'message' => "Get attendent successfuly", 'data' => new TicketResource($ticket)], 200);
        }
        return response()->json(['success' => true, 'message' => "You already register", 'data' => new TicketResource($ticket)], 200);
    }

    public function searchTicket($name)
    {
        $user = auth()->user();
        $tickets = Ticket::where('user_id', $user->id)
            ->whereHas('event', function ($query) use ($name) {
                $query->where('name', 'like', "%$name%");
            })
            ->get();

        if ($tickets->isEmpty()) {
            return response()->json(['status' => false, 'message' => 'No tickets found'], 201);
        }

        $ticketResources = TicketResource::collection($tickets);
        return response()->json(['status' => true, 'data' => $ticketResources], 200);
    }
}
