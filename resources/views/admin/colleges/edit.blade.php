@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-semibold text-gray-900">Edit College: {{ $college->name }}</h2>
        <a href="{{ route('admin.colleges.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-2.5 px-5 rounded-md shadow transition duration-200">
            Back to Colleges
        </a>
    </div>

    <div class="mt-8">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <form action="{{ route('admin.colleges.update', $college) }}" method="POST" class="p-8">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <!-- Name -->
                    <div>
                        <x-form-input
                            label="College Name"
                            name="name"
                            value="{{ old('name', $college->name) }}"
                            placeholder="e.g., College of Engineering"
                            required
                        />
                    </div>

                    <!-- Description -->
                    <div>
                        <x-form-textarea
                            label="Description"
                            name="description"
                            value="{{ old('description', $college->description) }}"
                            placeholder="Brief description of the college..."
                            rows="4"
                        />
                    </div>

                    <!-- Statistics -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-lg font-medium text-gray-900 mb-2">College Statistics</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-gray-500">Total Courses</p>
                                <p class="text-lg font-semibold">{{ $college->courses->count() }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Total Units</p>
                                <p class="text-lg font-semibold">{{ $college->courses->sum(function($course) { return $course->units->count(); }) }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end">
                        <x-form-button type="submit" color="primary">
                            Update College
                        </x-form-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
