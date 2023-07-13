<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Http\Requests\StoreagendaRequest;
use App\Http\Requests\UpdateagendaRequest;
use App\Http\Resources\Agenda as ResourcesAgenda;
use Illuminate\Support\Facades\DB;

class AgendaController extends Controller
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
    public function getAgendaByEventId($eventId)
    {
        $agendas = Agenda::where('event_id', $eventId)->get();
        if ($agendas->isEmpty()) {
            return response()->json([
                'success' => false,
                'agendas' => $agendas,
                'message' => 'Agenda not found',
            ], 200);
        }
        return response()->json([
            'success' => true,
            'message' => 'Get agenda successfully',
            'agendas' => $agendas
        ], 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreagendaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(agenda $agenda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateagendaRequest $request, agenda $agenda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(agenda $agenda)
    {
        //
    }
}
