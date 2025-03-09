@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-semibold text-gray-900">Create New Course</h2>
        <a href="{{ route('admin.courses.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
            Back to Courses
        </a>
    </div>

    <div class="mt-8">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow overflow-hidden">
            <form action="{{ route('admin.courses.store') }}" method="POST" class="p-8">
                @csrf

                <div class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Course Name</label>
                        <div class="mt-1">
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-300 rounded-md @error('name') border-red-300 @enderror"
                                placeholder="Enter course name">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="college_id" class="block text-sm font-medium text-gray-700">College</label>
                        <div class="mt-1">
                            <select name="college_id" id="college_id"
                                class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-300 rounded-md @error('college_id') border-red-300 @enderror">
                                <option value="">Select College</option>
                                @foreach($colleges as $college)
                                    <option value="{{ $college->id }}" {{ old('college_id') == $college->id ? 'selected' : '' }}>
                                        {{ $college->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('college_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <div class="mt-1">
                            <textarea name="description" id="description" rows="3"
                                class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-300 rounded-md @error('description') border-red-300 @enderror"
                                placeholder="Enter course description">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Create Course
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
