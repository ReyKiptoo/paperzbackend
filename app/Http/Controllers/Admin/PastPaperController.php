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
            'file' => 'required|file|mimes:pdf|max:10240', // Max 10MB
            'description' => 'nullable|string',
            'exam_type' => 'required|string|in:CAT1,CAT2,Main', // Add more types if needed
        ]);

        // Handle file upload
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('past_papers', 'public');
            $validated['file_path'] = $path;
        }

        PastPaper::create($validated);

        return redirect()->route('admin.papers.index')
            ->with('success', 'Past Paper uploaded successfully.');
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
            'file' => 'nullable|file|mimes:pdf|max:10240', // Max 10MB
            'description' => 'nullable|string',
            'exam_type' => 'required|string|in:CAT1,CAT2,Main',
        ]);

        // Handle file upload if new file is provided
        if ($request->hasFile('file')) {
            // Delete old file
            if ($paper->file_path) {
                Storage::disk('public')->delete($paper->file_path);
            }
            
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
        // Delete the file from storage
        if ($paper->file_path) {
            Storage::disk('public')->delete($paper->file_path);
        }

        $paper->delete();

        return redirect()->route('admin.papers.index')
            ->with('success', 'Past Paper deleted successfully.');
    }

    public function download(PastPaper $paper)
    {
        if (!$paper->file_path || !Storage::disk('public')->exists($paper->file_path)) {
            return back()->with('error', 'File not found.');
        }

        return Storage::disk('public')->download($paper->file_path, $paper->title . '.pdf');
    }
}
