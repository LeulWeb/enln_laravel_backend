<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AnnualForum;
use Illuminate\Http\Request;

class AnnualForumApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(AnnualForum::latest()->get());
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
        $annualForum = AnnualForum::findOrFail($id);
        return response()->json($annualForum);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AnnualForum $annualForum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnnualForum $annualForum)
    {
        //
    }
}
