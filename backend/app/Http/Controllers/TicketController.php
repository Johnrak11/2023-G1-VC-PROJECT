<?php

namespace App\Http\Controllers;

use App\Models\ticket;
use App\Http\Requests\StoreticketRequest;
use App\Http\Requests\UpdateticketRequest;
use App\Http\Resources\TicketResource;
use GuzzleHttp\Psr7\Request;
use App\Models\Event;
use PHPUnit\Framework\Attributes\Ticket as AttributesTicket;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    // public function getAllTicket() {
    //     $ticket = Ticket::all();
    //     $ticket = TicketResource::collection($ticket);
    //     // $ticket = Event::where('name', )->get();

    //     return response()->json(['message' => true, 'data' => $ticket],201);
    // }
    public function getAllTicket()
    {
        $user = auth()->user();
        $tickets = Ticket::where('user_id',$user->id)->get();
        $ticketResources = TicketResource::collection($tickets);

        return response()->json(['status' => true, 'data' => $ticketResources], 200);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function getOwnerOfTicket($eventId)
    {
        $ticketsOfUsers = Ticket::where('event_id', $eventId)
            ->with('user')
            ->get();
        if($ticketsOfUsers!=null){
            return response()->json(['status'=>'success', 'data' => $ticketsOfUsers],200);
        }
        if($ticketsOfUsers==null){
            return response()->json(['status' => 'success', 'data' => 'Sorry, we do not have any data that fit with the event'],204);
        }
        return false;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreticketRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateticketRequest $request, ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ticket $ticket)
    {
        //
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
            return response()->json(['status'=> false,'message' => 'No tickets found'], 201);
        }
    
        $ticketResources = TicketResource::collection($tickets);
        return response()->json(['status' => true, 'data' => $ticketResources], 200);
    }
}
