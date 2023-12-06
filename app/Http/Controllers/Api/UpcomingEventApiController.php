<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UpcomingEvent;
use Illuminate\Http\Request;

class UpcomingEventApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(UpcomingEvent::latest()->get());
        return response()->json(UpcomingEvent::latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $upcoming = UpcomingEvent::findOrFail($id);
        return response()->json($upcoming);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UpcomingEvent $upcomingEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UpcomingEvent $upcomingEvent)
    {
        //
    }
}
