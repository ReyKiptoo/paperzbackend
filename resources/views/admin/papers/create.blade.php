@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-semibold text-gray-900">Upload Past Paper</h2>
        <a href="{{ route('admin.papers.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-2.5 px-5 rounded-md shadow transition duration-200">
            Back to Papers
        </a>
    </div>

    <div class="mt-8">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <form action="{{ route('admin.papers.store') }}" method="POST" enctype="multipart/form-data" class="p-8">
                @csrf

                <div class="space-y-6">
                    <x-form-select 
                        name="unit_id"
                        label="Unit"
                        required
                    >
                        <option value="">Select Unit</option>
                        @foreach($units as $unit)
                            <option value="{{ $unit->id }}" {{ old('unit_id') == $unit->id ? 'selected' : '' }}>
                                {{ $unit->name }} ({{ $unit->course->name }})
                            </option>
                        @endforeach
                    </x-form-select>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <x-form-input 
                            type="number"
                            name="year"
                            label="Year"
                            value="{{ old('year', date('Y')) }}"
                            min="2000"
                            max="{{ date('Y') }}"
                            required
                        />

                        <x-form-select 
                            name="type"
                            label="Paper Type"
                            required
                        >
                            <option value="">Select Type</option>
                            <option value="CAT" {{ old('type') == 'CAT' ? 'selected' : '' }}>CAT</option>
                            <option value="Main Exam" {{ old('type') == 'Main Exam' ? 'selected' : '' }}>Main Exam</option>
                            <option value="Supplementary" {{ old('type') == 'Supplementary' ? 'selected' : '' }}>Supplementary</option>
                        </x-form-select>
                    </div>

                    <x-form-file 
                        name="file"
                        label="Paper File (PDF)"
                        accept=".pdf"
                        required
                    >
                        <p class="mt-2 text-sm text-gray-500">Upload a PDF file. Maximum size: 10MB</p>
                    </x-form-file>

                    <x-form-textarea 
                        name="description"
                        label="Description (Optional)"
                        placeholder="Any additional notes about this paper..."
                        value="{{ old('description') }}"
                        rows="4"
                    />

                    <div class="flex justify-end pt-4">
                        <x-form-button>
                            Upload Paper
                        </x-form-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
