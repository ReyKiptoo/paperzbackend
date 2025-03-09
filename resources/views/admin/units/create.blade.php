@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-semibold text-gray-900">Create New Unit</h2>
        <a href="{{ route('admin.units.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-2.5 px-5 rounded-md shadow transition duration-200">
            Back to Units
        </a>
    </div>

    <div class="mt-8">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <form action="{{ route('admin.units.store') }}" method="POST" class="p-8">
                @csrf

                <div class="space-y-6">
                    <x-form-input 
                        name="name"
                        label="Unit Name"
                        placeholder="Enter unit name"
                        value="{{ old('name') }}"
                        required
                    />

                    <x-form-select 
                        name="course_id"
                        label="Course"
                        required
                    >
                        <option value="">Select Course</option>
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                {{ $course->name }} ({{ $course->college->name }})
                            </option>
                        @endforeach
                    </x-form-select>

                    <x-form-input 
                        name="code"
                        label="Unit Code"
                        placeholder="Enter unit code"
                        value="{{ old('code') }}"
                        required
                    />

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <x-form-select 
                            name="year"
                            label="Year"
                            required
                        >
                            @for($i = 1; $i <= 4; $i++)
                                <option value="{{ $i }}" {{ old('year') == $i ? 'selected' : '' }}>
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
                                <option value="{{ $i }}" {{ old('semester') == $i ? 'selected' : '' }}>
                                    Semester {{ $i }}
                                </option>
                            @endfor
                        </x-form-select>
                    </div>

                    <x-form-textarea 
                        name="description"
                        label="Description"
                        placeholder="Enter unit description"
                        value="{{ old('description') }}"
                        rows="4"
                    />

                    <div class="flex justify-end pt-4">
                        <x-form-button>
                            Create Unit
                        </x-form-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
