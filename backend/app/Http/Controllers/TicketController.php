<?php

namespace App\Http\Controllers;

use App\Models\ticket;
use App\Http\Requests\StoreticketRequest;
use App\Http\Requests\UpdateticketRequest;
use App\Http\Resources\TicketResource;
use Illuminate\Support\Facades\Event;
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
    public function getAllTicket() {
        $ticket = Ticket::all();
        $ticket = TicketResource::collection($ticket);
        // $ticket = Event::where('name', )->get();

        return response()->json(['message' => true, 'data' => $ticket],201);
    }
    /**
     * Show the form for creating a new resource.
     */
    // public function createTicket(StoreticketRequest $request)
    // {
    //     $ticket = Ticket::create([
    //         'ticket_code' => $request->input('ticket_code'),
    //         'booking_date' => $request->input('booking_date'),
    //         'is_check_in' => $request->input('is_check_in'),
    //         'user_id' => $request->input('user_id'),
    //         'event_id' => $request->input('event_id')
    //     ]);
    
    //     if ($ticket) {
    //         return response()->json(['status' => 'success', 'data' => $ticket], 200);
    //     }
    
    //     return response()->json(['status' => false]);
    // }
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
    public function searchTicket($request) {
        $tickets = Ticket::all();
        $name = Ticket::where('name', 'LIKE', '%'.$tickets.'%')->get();
        return TicketResource::collection($name);
    }
}
