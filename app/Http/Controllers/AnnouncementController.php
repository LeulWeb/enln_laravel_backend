<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    // index function for showing all the data

    public function index(Request $request)
    {

        $announcementList = Announcement::latest()->paginate(5);

        if ($request->input('keyword')) {
            $announcementList = Announcement::search($request->input('keyword'))->latest()->paginate(5);
        }


        return view('announcement.index', [
            // 'announcementList'=>Announcement::latest()->get()
            'announcementList' => $announcementList
        ]);
    }

    public function create()
    {
        return view('announcement.create');
    }

    public function store(Request $request)
    {

        // dd($request->all());
        $formField = $request->validate([
            'title' => ['min:10', 'max:200', 'required'],
            'body' => ['min:200', 'required'],
            'date' => ['date', 'nullable'],
            'time' => ['date_format:H:i', 'nullable'],
        ]);


        Announcement::create($formField);

        return redirect('/announcements')->with('success', 'Announcements created successfully');
    }

    // show page
    public  function show(Announcement $announcement)
    {
        return view('announcement.show', [
            'announcement' => $announcement
        ]);
    }

    // edit page
    public function edit(Announcement $announcement)
    {
        // dd($announcement);
        return view('announcement.edit', [
            'announcement' => $announcement
        ]);
    }


    public function update(Request $request, Announcement $announcement)
    {
        $formField = $request->validate([
            'title' => ['min:10', 'max:200', 'required'],
            'body' => ['min:200', 'required'],
            'date' => ['date', 'nullable'],
            'time' => ['date_format:H:i', 'nullable'],
        ]);


        $announcement->update($formField);


        return redirect('/announcements')->with('success', 'Announcements updated successfully');
    }

    public function destroy(Announcement $announcement)
    {
        // dd($announcement);
        $announcement->delete();
        return redirect('/announcements')->with('success', 'Announcements deleted successfully');
    }
}
