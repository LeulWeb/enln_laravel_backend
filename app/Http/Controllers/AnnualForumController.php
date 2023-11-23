<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnualForumRequest;
use App\Models\AnnualForum;
use Illuminate\Http\Request;

class AnnualForumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $forumList = AnnualForum::latest()->paginate(5);

        if ($request->input('keyword')) {
            $forumList = AnnualForum::search($request->input('keyword'))->latest()->paginate();
        }

        return view('forum.index', [
            'forumList' => $forumList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('forum.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnnualForumRequest $request)
    {
        $formField = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalName();
            $destinationPath = public_path('forum_pic');
            $image->move($destinationPath, $imageName);
            $formField['image'] = 'forum_pic/' . $imageName;
        }

        AnnualForum::create($formField);
        return redirect()->route('forum.index')->with('success', 'Annual forum created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(AnnualForum $forum)
    {
        return view('forum.show', [
            'forum' => $forum
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AnnualForum $forum)
    {
        return view('forum.edit', [
            'forum' => $forum
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnnualForumRequest $request, AnnualForum $forum)
    {
        $formField = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalName();
            $destinationPath = public_path('forum_pic');
            $image->move($destinationPath, $imageName);
            $formField['image'] = 'forum_pic/' . $imageName;
        }

        $forum->update($formField);
        return redirect()->route('forum.index')->with('success', 'Annual forum updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnnualForum $forum)
    {
        $forum->delete();
        return redirect()->route('forum.index')->with('success', 'Annual forum deleted successfully');
    }
}
