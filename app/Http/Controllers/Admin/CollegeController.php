<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\College;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $colleges = College::latest()->paginate(10);
        return view('admin.colleges.index', compact('colleges'));
    }

    public function create()
    {
        return view('admin.colleges.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        College::create($validated);

        return redirect()->route('colleges.index')
            ->with('success', 'College created successfully.');
    }

    public function edit(College $college)
    {
        return view('admin.colleges.edit', compact('college'));
    }

    public function update(Request $request, College $college)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $college->update($validated);

        return redirect()->route('colleges.index')
            ->with('success', 'College updated successfully.');
    }

    public function destroy(College $college)
    {
        $college->delete();

        return redirect()->route('colleges.index')
            ->with('success', 'College deleted successfully.');
    }
}
