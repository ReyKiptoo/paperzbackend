<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PastPaper;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PastPaperController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $papers = PastPaper::with(['unit', 'unit.course', 'unit.course.college'])
            ->latest()
            ->paginate(10);
        return view('admin.papers.index', compact('papers'));
    }

    public function create()
    {
        $units = Unit::with(['course', 'course.college'])->get();
        return view('admin.papers.create', compact('units'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'unit_id' => 'required|exists:units,id',
            'year' => 'required|integer|min:2000|max:' . date('Y'),
            'type' => 'required|in:CAT,Main Exam',
            'file' => 'required|file|mimes:pdf|max:10240', // Max 10MB
            'description' => 'nullable|string',
        ]);

        // Handle file upload
        $path = $request->file('file')->store('past_papers', 'public');
        
        // Create past paper record
        PastPaper::create([
            'title' => $validated['title'],
            'unit_id' => $validated['unit_id'],
            'year' => $validated['year'],
            'type' => $validated['type'],
            'file_path' => $path,
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()->route('admin.papers.index')
            ->with('success', 'Past Paper uploaded successfully.');
    }

    public function show(PastPaper $paper)
    {
        return Storage::disk('public')->download($paper->file_path, $paper->title . '.pdf');
    }

    public function edit(PastPaper $paper)
    {
        $units = Unit::with(['course', 'course.college'])->get();
        return view('admin.papers.edit', compact('paper', 'units'));
    }

    public function update(Request $request, PastPaper $paper)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'unit_id' => 'required|exists:units,id',
            'year' => 'required|integer|min:2000|max:' . date('Y'),
            'type' => 'required|in:CAT,Main Exam',
            'file' => 'nullable|file|mimes:pdf|max:10240', // Max 10MB
            'description' => 'nullable|string',
        ]);

        // Handle file upload if new file is provided
        if ($request->hasFile('file')) {
            // Delete old file
            Storage::disk('public')->delete($paper->file_path);
            
            // Store new file
            $path = $request->file('file')->store('past_papers', 'public');
            $validated['file_path'] = $path;
        }

        $paper->update($validated);

        return redirect()->route('admin.papers.index')
            ->with('success', 'Past Paper updated successfully.');
    }

    public function destroy(PastPaper $paper)
    {
        // Delete file from storage
        Storage::disk('public')->delete($paper->file_path);
        
        // Delete record
        $paper->delete();

        return redirect()->route('admin.papers.index')
            ->with('success', 'Past Paper deleted successfully.');
    }
}
