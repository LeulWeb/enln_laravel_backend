<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('subscribe.index', [
            'subscriberList' => Subscriber::latest()->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
    }

    /**dsf
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:subscribers,email'
        ]);

        Subscriber::create($validated);
        Mail::to($validated['email'])->send(new WelcomeMail());
        return redirect()->route('subscriber.index')->with('success', 'New subscription email added successfully');
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
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($reqeust->all())
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();
        return redirect()->route('subscriber.index')->with('success', "Subscriber deleted successfully");
    }


    public function toggleStatus(Subscriber $subscriber, Request $request)
    {
        dd($request);
        // dd($subscriber->subscribed);
        // $subscriber->subscribed != $subscriber->subscribed;
        // dd($subscriber->subscribed);
    }
}
