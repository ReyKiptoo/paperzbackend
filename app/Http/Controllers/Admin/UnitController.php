<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use App\Models\Course;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $units = Unit::with(['course', 'course.college'])->latest()->paginate(10);
        return view('admin.units.index', compact('units'));
    }

    public function create()
    {
        $courses = Course::with('college')->get();
        return view('admin.units.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:units',
            'course_id' => 'required|exists:courses,id',
            'description' => 'nullable|string',
            'semester' => 'required|integer|min:1|max:8',
            'year' => 'required|integer|min:1|max:4',
        ]);

        Unit::create($validated);

        return redirect()->route('units.index')
            ->with('success', 'Unit created successfully.');
    }

    public function edit(Unit $unit)
    {
        $courses = Course::with('college')->get();
        return view('admin.units.edit', compact('unit', 'courses'));
    }

    public function update(Request $request, Unit $unit)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:units,code,' . $unit->id,
            'course_id' => 'required|exists:courses,id',
            'description' => 'nullable|string',
            'semester' => 'required|integer|min:1|max:8',
            'year' => 'required|integer|min:1|max:4',
        ]);

        $unit->update($validated);

        return redirect()->route('units.index')
            ->with('success', 'Unit updated successfully.');
    }

    public function destroy(Unit $unit)
    {
        $unit->delete();

        return redirect()->route('units.index')
            ->with('success', 'Unit deleted successfully.');
    }
}
