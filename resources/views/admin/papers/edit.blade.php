@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-semibold text-gray-900">Edit Past Paper</h2>
        <a href="{{ route('admin.papers.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
            Back to Papers
        </a>
    </div>

    <div class="mt-8">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow overflow-hidden">
            <form action="{{ route('admin.papers.update', $paper) }}" method="POST" enctype="multipart/form-data" class="p-8">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <div>
                        <label for="unit_id" class="block text-sm font-medium text-gray-700">Unit</label>
                        <div class="mt-1">
                            <select name="unit_id" id="unit_id"
                                class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-300 rounded-md @error('unit_id') border-red-300 @enderror">
                                <option value="">Select Unit</option>
                                @foreach($units as $unit)
                                    <option value="{{ $unit->id }}" {{ old('unit_id', $paper->unit_id) == $unit->id ? 'selected' : '' }}>
                                        {{ $unit->name }} ({{ $unit->course->name }})
                                    </option>
                                @endforeach
                            </select>
                            @error('unit_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="year" class="block text-sm font-medium text-gray-700">Year</label>
                        <div class="mt-1">
                            <input type="number" name="year" id="year" value="{{ old('year', $paper->year) }}"
                                class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-300 rounded-md @error('year') border-red-300 @enderror"
                                min="2000" max="{{ date('Y') }}">
                            @error('year')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-700">Paper Type</label>
                        <div class="mt-1">
                            <select name="type" id="type"
                                class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-300 rounded-md @error('type') border-red-300 @enderror">
                                <option value="">Select Type</option>
                                <option value="CAT" {{ old('type', $paper->type) == 'CAT' ? 'selected' : '' }}>CAT</option>
                                <option value="Main Exam" {{ old('type', $paper->type) == 'Main Exam' ? 'selected' : '' }}>Main Exam</option>
                                <option value="Supplementary" {{ old('type', $paper->type) == 'Supplementary' ? 'selected' : '' }}>Supplementary</option>
                            </select>
                            @error('type')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="file" class="block text-sm font-medium text-gray-700">Paper File (PDF)</label>
                        <div class="mt-1">
                            <input type="file" name="file" id="file" accept=".pdf"
                                class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-300 rounded-md @error('file') border-red-300 @enderror">
                            @error('file')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <p class="mt-2 text-sm text-gray-500">Current file: {{ $paper->file_name }}</p>
                        <p class="mt-1 text-sm text-gray-500">Upload a new PDF file only if you want to replace the current one. Maximum size: 10MB</p>
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description (Optional)</label>
                        <div class="mt-1">
                            <textarea name="description" id="description" rows="3"
                                class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-300 rounded-md @error('description') border-red-300 @enderror"
                                placeholder="Any additional notes about this paper...">{{ old('description', $paper->description) }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Update Paper
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
