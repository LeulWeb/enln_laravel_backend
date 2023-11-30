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
    public function index(Request $request)
    {

        $subscriberList = Subscriber::latest()->paginate();

        if ($request->input('keyword')) {
            $subscriberList =  Subscriber::search($request->input('keyword'))->latest()->paginate();
            // dd($request->input('keyword'));
        }

        return view('subscribe.index', [
            'subscriberList' => $subscriberList
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
            'email' => 'required|email|unique:subscribers,email',
            'name' => 'required|string|min:5|max:20'
        ]);

        $email = Subscriber::create($validated);
        Mail::to($validated['email'])->send(new WelcomeMail($email));
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
    public function update(Subscriber $subscriber, Request $request)
    {
        // dd($request->all(), $subscriber);
        $validated = $request->validate([
            'subscribed' => 'boolean'
        ]);
        $subscriber->update([
            'subscribed' => $validated['subscribed']
        ]);

        $status = $subscriber->subscribed == 0 ? 'Muted' : 'Active';
        return redirect()->route('subscriber.index')->with('success', $subscriber->email . "is now " . $status);
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
        // dd($request, $subscriber);
        // dd($subscriber->subscribed);
        // $subscriber->subscribed != $subscriber->subscribed;
        // dd($subscriber->subscribed);
    }



    // handle search
    // public function search(Request $request)
    // {
    //     $keyword = $request->input('search');


    // $subscriberList = Subscriber::search($keyword)->latest()->paginate();

    // return view('subscribe.index', [

    // ]);
    // }
}
