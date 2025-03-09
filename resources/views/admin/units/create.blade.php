@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-semibold text-gray-900">Create New Unit</h2>
        <a href="{{ route('admin.units.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
            Back to Units
        </a>
    </div>

    <div class="mt-8">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow overflow-hidden">
            <form action="{{ route('admin.units.store') }}" method="POST" class="p-8">
                @csrf

                <div class="space-y-6">
                    <!-- Unit Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Unit Name</label>
                        <div class="mt-1">
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-300 rounded-md @error('name') border-red-300 @enderror"
                                placeholder="Enter unit name">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Course Selection -->
                    <div>
                        <label for="course_id" class="block text-sm font-medium text-gray-700">Course</label>
                        <div class="mt-1">
                            <select name="course_id" id="course_id"
                                class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-300 rounded-md @error('course_id') border-red-300 @enderror">
                                <option value="">Select Course</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                        {{ $course->name }} ({{ $course->college->name }})
                                    </option>
                                @endforeach
                            </select>
                            @error('course_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Unit Code -->
                    <div>
                        <label for="code" class="block text-sm font-medium text-gray-700">Unit Code</label>
                        <div class="mt-1">
                            <input type="text" name="code" id="code" value="{{ old('code') }}"
                                class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-300 rounded-md @error('code') border-red-300 @enderror"
                                placeholder="Enter unit code">
                            @error('code')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Year -->
                    <div>
                        <label for="year" class="block text-sm font-medium text-gray-700">Year</label>
                        <div class="mt-1">
                            <select name="year" id="year"
                                class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-300 rounded-md @error('year') border-red-300 @enderror">
                                @for($i = 1; $i <= 4; $i++)
                                    <option value="{{ $i }}" {{ old('year') == $i ? 'selected' : '' }}>
                                        Year {{ $i }}
                                    </option>
                                @endfor
                            </select>
                            @error('year')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Semester -->
                    <div>
                        <label for="semester" class="block text-sm font-medium text-gray-700">Semester</label>
                        <div class="mt-1">
                            <select name="semester" id="semester"
                                class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-300 rounded-md @error('semester') border-red-300 @enderror">
                                @for($i = 1; $i <= 2; $i++)
                                    <option value="{{ $i }}" {{ old('semester') == $i ? 'selected' : '' }}>
                                        Semester {{ $i }}
                                    </option>
                                @endfor
                            </select>
                            @error('semester')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <div class="mt-1">
                            <textarea name="description" id="description" rows="3"
                                class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-300 rounded-md @error('description') border-red-300 @enderror"
                                placeholder="Enter unit description">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Create Unit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
