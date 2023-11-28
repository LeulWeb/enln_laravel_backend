<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $blogList = Blog::latest()->paginate(5);

        if ($request->input('keyword')) {
            $blogList = Blog::search($request->input('keyword'))->latest()->paginate();
        }
        return view('blog.index', [
            'blogList' => $blogList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validated = $request->validate([
            'title' => ['required', 'string', 'unique:blogs,title', 'max:75'],
            'content' => ['required', 'min:200', 'max:10240'],
            'thumbnail' => ['nullable', 'image', 'mimes:png,jpg,JPG,jpeg', 'max:10240'],
            'author' => ['required', 'string'],
            'tags' => ['required', 'string'],
        ]);

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            // Specify the full destination path
            $destinationPath = public_path('metatf');

            // Move the image to the specified destination path
            $image->move($destinationPath, $imageName);

            // Update the formField with the image path
            $validated['thumbnail'] = 'metatf/' . $imageName;
        }

        Blog::create($validated);

        return redirect()->route('blog.index')->with('success', 'New blog has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('blog.show', [
            'blog' => $blog
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('blog.edit', [
            'blog' => $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'unique:blogs,title', 'max:75'],
            'content' => ['required', 'min:200', 'max:10240'],
            'thumbnail' => ['nullable', 'image', 'mimes:png,jpg,JPG,jpeg', 'max:10240'],
            'author' => ['required', 'string'],
            'tags' => ['required', 'string'],
        ]);
        $blog->update($validated);
        return redirect()->route('blog.index')->with('success', $blog->title . ' has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blog.index')->with('success', $blog->title . ' has been removed');
    }
}
