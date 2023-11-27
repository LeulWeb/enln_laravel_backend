<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Ebook;
use Illuminate\Http\Request;
use App\Http\Requests\EbookRequest;

class EbookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $ebookList = Ebook::latest()->paginate(5);

        if ($request->input('keyword')) {
            $ebookList = Ebook::search($request->input('keyword'))->latest()->paginate(5);
        }

        return view("ebook.index", [
            'ebookList' => $ebookList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ebook.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EbookRequest $request)
    {


        // dd($request->all());
        $formField = $request->validated();


        // create to new database

        if ($request->has('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('learning_materials_cover'), $imageName);
            $filePath = 'learning_materials_cover/' . $imageName;
            $formField['thumbnail'] = $filePath;
        }

        if ($request->has('pdf')) {
            $image = $request->file('pdf');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('learning_materials_book'), $imageName);
            $filePath = 'learning_materials_book/' . $imageName;
            $formField['pdf'] = $filePath;
        }

        Ebook::create($formField);
        return redirect()->route('ebook.index')->with('success', 'New resource added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ebook $ebook)
    {
        return view('ebook.show', [
            'ebook' => $ebook,
        ]);
    }



    public function downloadResource(Ebook $ebook)
    {
        $file_path = public_path($ebook->pdf);

        if (file_exists($file_path)) {
            return response()->download($file_path);
        } else {
            // Handle the error, for example, by returning a 404 response
            abort(404, 'File not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ebook $ebook)
    {
        return view('ebook.edit', [
            'ebook' => $ebook
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EbookRequest $request, Ebook  $ebook)
    {
        // dd($request->all());
        $formField = $request->validated();


        // create to new database

        if ($request->has('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('learning_materials_cover'), $imageName);
            $filePath = 'learning_materials_cover/' . $imageName;
            $formField['thumbnail'] = $filePath;
        }

        if ($request->has('pdf')) {
            $image = $request->file('pdf');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('learning_materials_book'), $imageName);
            $filePath = 'learning_materials_book/' . $imageName;
            $formField['pdf'] = $filePath;
        }

        $ebook->update($formField);
        return redirect()->route('ebook.index')->with('success', 'Resource updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ebook $ebook)
    {
        $ebook->delete();
        return redirect()->route('ebook.index')->with('success', 'Resource deleted successfully');
    }
}
