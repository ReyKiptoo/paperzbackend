@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-semibold text-gray-900">Edit Course: {{ $course->name }}</h2>
        <a href="{{ route('admin.courses.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
            Back to Courses
        </a>
    </div>

    <div class="mt-8">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow overflow-hidden">
            <form action="{{ route('admin.courses.update', $course) }}" method="POST" class="p-8">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <!-- College Selection -->
                    <div>
                        <label for="college_id" class="block text-sm font-medium text-gray-700">College</label>
                        <div class="mt-1">
                            <select name="college_id" id="college_id"
                                class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-300 rounded-md @error('college_id') border-red-300 @enderror">
                                <option value="">Select a College</option>
                                @foreach($colleges as $college)
                                    <option value="{{ $college->id }}" {{ old('college_id', $course->college_id) == $college->id ? 'selected' : '' }}>
                                        {{ $college->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('college_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Course Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Course Name</label>
                        <div class="mt-1">
                            <input type="text" name="name" id="name" value="{{ old('name', $course->name) }}"
                                class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-300 rounded-md @error('name') border-red-300 @enderror"
                                placeholder="e.g., Bachelor of Computer Science">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Course Code -->
                    <div>
                        <label for="code" class="block text-sm font-medium text-gray-700">Course Code</label>
                        <div class="mt-1">
                            <input type="text" name="code" id="code" value="{{ old('code', $course->code) }}"
                                class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-300 rounded-md @error('code') border-red-300 @enderror"
                                placeholder="e.g., BCS">
                            @error('code')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <div class="mt-1">
                            <textarea name="description" id="description" rows="4"
                                class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-300 rounded-md @error('description') border-red-300 @enderror"
                                placeholder="Brief description of the course...">{{ old('description', $course->description) }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Statistics -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Course Statistics</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-gray-500">Total Units</p>
                                <p class="text-lg font-semibold">{{ $course->units_count }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Total Past Papers</p>
                                <p class="text-lg font-semibold">{{ $course->units->sum('past_papers_count') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Update Course
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
