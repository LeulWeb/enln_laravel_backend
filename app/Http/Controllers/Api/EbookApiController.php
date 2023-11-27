<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ebook;
use Illuminate\Http\Request;

class EbookApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Ebook::latest()->get());
    }

    public function download(String $id)
    {

        $ebook = Ebook::find($id);
        $file_path = public_path($ebook->pdf);

        if (file_exists($file_path)) {
            return response()->download($file_path);
        } else {
            // Handle the error, for example, by returning a 404 response
            abort(404, 'File not found');
        }
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
        $ebook = Ebook::find($id);
        return response()->json($ebook);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ebook $ebook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ebook $ebook)
    {
        //
    }
}
