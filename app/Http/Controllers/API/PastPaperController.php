<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PastPaper;
use Illuminate\Http\Request;

class PastPaperController extends Controller
{
    /**
     * Display a listing of the past papers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $papers = PastPaper::with(['unit.course.college'])->get();
        
        return response()->json([
            'success' => true,
            'data' => $papers
        ]);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
