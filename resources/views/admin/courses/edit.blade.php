@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-semibold text-gray-900">Edit Course: {{ $course->name }}</h2>
        <a href="{{ route('admin.courses.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-2.5 px-5 rounded-md shadow transition duration-200">
            Back to Courses
        </a>
    </div>

    <div class="mt-8">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <form action="{{ route('admin.courses.update', $course) }}" method="POST" class="p-8">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <x-form-select 
                        name="college_id"
                        label="College"
                        required
                    >
                        <option value="">Select a College</option>
                        @foreach($colleges as $college)
                            <option value="{{ $college->id }}" {{ old('college_id', $course->college_id) == $college->id ? 'selected' : '' }}>
                                {{ $college->name }}
                            </option>
                        @endforeach
                    </x-form-select>

                    <x-form-input 
                        name="name"
                        label="Course Name"
                        placeholder="e.g., Bachelor of Computer Science"
                        value="{{ old('name', $course->name) }}"
                        required
                    />

                    <x-form-input 
                        name="code"
                        label="Course Code"
                        placeholder="e.g., BCS"
                        value="{{ old('code', $course->code) }}"
                        required
                    />

                    <x-form-textarea 
                        name="description"
                        label="Description"
                        placeholder="Brief description of the course..."
                        value="{{ old('description', $course->description) }}"
                        rows="4"
                    />

                    <!-- Statistics -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Course Statistics</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-gray-500">Total Units</p>
                                <p class="text-lg font-semibold">{{ $course->units->count() }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Total Past Papers</p>
                                <p class="text-lg font-semibold">{{ $course->units->sum(function($unit) { 
                                    return $unit->pastPapers->count(); 
                                }) }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end pt-4">
                        <x-form-button>
                            Update Course
                        </x-form-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
