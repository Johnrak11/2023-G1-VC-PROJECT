<?php

namespace App\Http\Controllers;

use App\Models\favorite;
use App\Http\Requests\StorefavoriteRequest;
use App\Http\Requests\UpdatefavoriteRequest;

class FavoriteController extends Controller
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
    public function store(StorefavoriteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(favorite $favorite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatefavoriteRequest $request, favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(favorite $favorite)
    {
        //
    }
}
