<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UpcomingEvent;
use App\Http\Requests\UpcomingEventRequest;

class UpcomingEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('upcoming.index', [
            'upcomingList'=>UpcomingEvent::latest()->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('upcoming.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UpcomingEventRequest $request)
    {
        $formField = $request->validated();
        UpcomingEvent::create($formField);
        return redirect()->route('upcoming.index')->with('success','New upcoming event is added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UpcomingEvent $upcoming)
    {
       return view('upcoming.edit',[
        'upcoming'=>$upcoming
       ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpcomingEventRequest $request, UpcomingEvent $upcoming)
    {
        $formField = $request->validated();
        $upcoming->update($formField);
        return redirect()->route('upcoming.index')->with('success','Upcoming event is updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UpcomingEvent $upcoming)
    {
        $upcoming->delete();
        return redirect()->route('upcoming.index')->with('success','Upcoming event is deleted successfully');

    }
}
