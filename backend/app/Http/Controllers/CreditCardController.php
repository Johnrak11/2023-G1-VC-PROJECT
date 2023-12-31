<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCreditCardRequest;
use App\Models\Credit_card;
use App\Http\Requests\Updatecredit_cardRequest;
use Illuminate\Support\Facades\Auth;

class CreditCardController extends Controller
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCreditCardRequest $request)
    {
        $user = Auth::user();
        $creditCard = Credit_card::create([
            'name' => $request->input('name'),
            'cvv' => $request->input('cvv'),
            'number' => $request->input('number'),
            'type' => $request->input('type'),
            'expiration' => $request->input('expiration'),
            'user_id' => $user->id,
        ]);
        return response()->json(['status' => 'success', 'data' => $creditCard], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(credit_card $credit_card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(credit_card $credit_card)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatecredit_cardRequest $request, credit_card $credit_card)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(credit_card $credit_card)
    {
        //
    }
}
