@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-semibold text-gray-900">Edit Unit: {{ $unit->name }}</h2>
        <a href="{{ route('admin.units.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-2.5 px-5 rounded-md shadow transition duration-200">
            Back to Units
        </a>
    </div>

    <div class="mt-8">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <form action="{{ route('admin.units.update', $unit) }}" method="POST" class="p-8">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <x-form-select 
                        name="course_id"
                        label="Course"
                        required
                    >
                        <option value="">Select a Course</option>
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}" {{ old('course_id', $unit->course_id) == $course->id ? 'selected' : '' }}>
                                {{ $course->name }} ({{ $course->college->name }})
                            </option>
                        @endforeach
                    </x-form-select>

                    <x-form-input 
                        name="name"
                        label="Unit Name"
                        placeholder="e.g., Introduction to Programming"
                        value="{{ old('name', $unit->name) }}"
                        required
                    />

                    <x-form-input 
                        name="code"
                        label="Unit Code"
                        placeholder="e.g., CS101"
                        value="{{ old('code', $unit->code) }}"
                        required
                    />

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <x-form-select 
                            name="year"
                            label="Year"
                            required
                        >
                            @for($i = 1; $i <= 4; $i++)
                                <option value="{{ $i }}" {{ old('year', $unit->year) == $i ? 'selected' : '' }}>
                                    Year {{ $i }}
                                </option>
                            @endfor
                        </x-form-select>

                        <x-form-select 
                            name="semester"
                            label="Semester"
                            required
                        >
                            @for($i = 1; $i <= 2; $i++)
                                <option value="{{ $i }}" {{ old('semester', $unit->semester) == $i ? 'selected' : '' }}>
                                    Semester {{ $i }}
                                </option>
                            @endfor
                        </x-form-select>
                    </div>

                    <x-form-textarea 
                        name="description"
                        label="Description"
                        placeholder="Brief description of the unit..."
                        value="{{ old('description', $unit->description) }}"
                        rows="4"
                    />

                    <!-- Statistics -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Unit Statistics</h3>
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <p class="text-sm text-gray-500">Past Papers</p>
                                <p class="text-lg font-semibold">{{ $unit->pastPapers()->count() }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">CATs</p>
                                <p class="text-lg font-semibold">{{ $unit->pastPapers()->where('type', 'CAT')->count() }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Main Exams</p>
                                <p class="text-lg font-semibold">{{ $unit->pastPapers()->where('type', 'Main Exam')->count() }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end pt-4">
                        <x-form-button>
                            Update Unit
                        </x-form-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
