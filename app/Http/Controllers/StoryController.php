<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\Subscriber;
use App\Events\NewsCreated;
use Illuminate\Http\Request;
use App\Mail\NewNewsNotification;
use App\Http\Requests\StoryRequest;
use Illuminate\Support\Facades\Mail;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $newsList = Story::latest()->paginate(5);

        if ($request->input('keyword')) {
            $newsList = Story::search($request->input('keyword'))->latest()->paginate();
        }


        return view('story.index', [
            'newsList' => $newsList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('story.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoryRequest $request)
    {
        // Validate the request and retrieve validated data
        $formField = $request->validated();

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Specify the full destination path
            $destinationPath = public_path('story');

            // Move the image to the specified destination path
            $image->move($destinationPath, $imageName);

            // Update the formField with the image path
            $formField['thumbnail'] = 'story/' . $imageName;
        }

        // Create a new Story record in the database
        $news = Story::create($formField);

        // event(new NewsCreated($news));


        // Mail::to($validated['email'])->send(new WelcomeMail());

        $subscriberList = Subscriber::where('subscribed', true)->get();

        foreach ($subscriberList as $subscriber) {
            Mail::to($subscriber->email)->send(new NewNewsNotification($news));
        }

        // Redirect to the index page with a success message
        return redirect()->route('new.index')->with('success', 'News story created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Story $new)
    {
        return view('story.show', [
            'story' => $new
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Story $new)
    {
        return view('story.edit', [
            'story' => $new
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoryRequest $request, Story $new)
    {
        $formField = $request->validated();

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Specify the full destination path
            $destinationPath = public_path('story');

            // Move the image to the specified destination path
            $image->move($destinationPath, $imageName);

            // Update the formField with the image path
            $formField['thumbnail'] = 'story/' . $imageName;
        }

        $new->update($formField);
        return redirect()->route('new.index')->with('success', 'News updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Story $new)
    {
        $new->delete();
        return redirect()->route('new.index')->with('success', 'News deleted successfully');
    }
}
