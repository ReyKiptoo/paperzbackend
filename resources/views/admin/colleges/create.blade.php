@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-semibold text-gray-900">Create New College</h2>
        <a href="{{ route('admin.colleges.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-2.5 px-5 rounded-md shadow transition duration-200">
            Back to Colleges
        </a>
    </div>

    <div class="mt-8">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <form action="{{ route('admin.colleges.store') }}" method="POST" class="p-8">
                @csrf

                <div class="space-y-6">
                    <x-form-input 
                        name="name"
                        label="College Name"
                        placeholder="e.g., College of Engineering"
                        value="{{ old('name') }}"
                        required
                    />

                    <x-form-textarea 
                        name="description"
                        label="Description"
                        placeholder="Brief description of the college..."
                        value="{{ old('description') }}"
                        rows="4"
                    />

                    <div class="flex items-center justify-end pt-4">
                        <x-form-button>
                            Create College
                        </x-form-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
