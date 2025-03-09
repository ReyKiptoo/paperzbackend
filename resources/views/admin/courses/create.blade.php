@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-semibold text-gray-900">Create New Course</h2>
        <a href="{{ route('admin.courses.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-2.5 px-5 rounded-md shadow transition duration-200">
            Back to Courses
        </a>
    </div>

    <div class="mt-8">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <form action="{{ route('admin.courses.store') }}" method="POST" class="p-8">
                @csrf

                <div class="space-y-6">
                    <x-form-input 
                        name="name"
                        label="Course Name"
                        placeholder="Enter course name"
                        value="{{ old('name') }}"
                        required
                    />

                    <x-form-select 
                        name="college_id"
                        label="College"
                        required
                    >
                        <option value="">Select College</option>
                        @foreach($colleges as $college)
                            <option value="{{ $college->id }}" {{ old('college_id') == $college->id ? 'selected' : '' }}>
                                {{ $college->name }}
                            </option>
                        @endforeach
                    </x-form-select>

                    <x-form-textarea 
                        name="description"
                        label="Description"
                        placeholder="Enter course description"
                        value="{{ old('description') }}"
                        rows="4"
                    />

                    <div class="flex justify-end pt-4">
                        <x-form-button>
                            Create Course
                        </x-form-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
