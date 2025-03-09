@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-semibold text-gray-900">Edit College: {{ $college->name }}</h2>
        <a href="{{ route('admin.colleges.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
            Back to Colleges
        </a>
    </div>

    <div class="mt-8">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow overflow-hidden">
            <form action="{{ route('admin.colleges.update', $college) }}" method="POST" class="p-8">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">College Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $college->name) }}" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50"
                            placeholder="e.g., College of Engineering">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="4"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50"
                            placeholder="Brief description of the college...">{{ old('description', $college->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Statistics -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-lg font-medium text-gray-900 mb-2">College Statistics</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-gray-500">Total Courses</p>
                                <p class="text-lg font-semibold">{{ $college->courses_count }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Total Units</p>
                                <p class="text-lg font-semibold">{{ $college->courses->sum('units_count') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end">
                        <button type="submit" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded">
                            Update College
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
