<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UnitController extends Controller
{
    /**
     * Display a listing of the units.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::with(['course.college', 'pastPapers'])->get();
        
        return response()->json([
            'success' => true,
            'data' => $units
        ]);
    }

    /**
     * Get units by course and year
     *
     * @param int $courseId
     * @param string $year
     * @return JsonResponse
     */
    public function getUnitsByCourseAndYear($courseId, $year): JsonResponse
    {
        // Validate course exists
        $course = Course::find($courseId);
        if (!$course) {
            return response()->json([
                'success' => false,
                'message' => 'Course not found'
            ], 404);
        }

        // Validate year format
        if (!is_numeric($year) || $year < 1 || $year > 6) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid year. Must be between 1 and 6'
            ], 400);
        }

        $units = Unit::with('course')
            ->where('course_id', $courseId)
            ->where('year_semester', $year)
            ->get();

        return response()->json([
            'success' => true,
            'data' => [
                'course' => [
                    'id' => $course->id,
                    'name' => $course->name
                ],
                'year' => $year,
                'units' => $units
            ]
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
