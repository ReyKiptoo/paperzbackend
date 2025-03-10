@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-semibold text-gray-900">Create New User</h2>
        <a href="{{ route('admin.users.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-2.5 px-5 rounded-md shadow transition duration-200">
            Back to Users
        </a>
    </div>

    <div class="mt-8">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <form action="{{ route('admin.users.store') }}" method="POST" class="p-8">
                @csrf

                <div class="space-y-6">
                    <x-form-input 
                        name="name"
                        label="Name"
                        placeholder="Enter full name"
                        value="{{ old('name') }}"
                        required
                    />

                    <x-form-input 
                        type="email"
                        name="email"
                        label="Email Address"
                        placeholder="Enter email address"
                        value="{{ old('email') }}"
                        required
                    />

                    <x-form-input 
                        type="tel"
                        name="phone_number"
                        label="Phone Number"
                        placeholder="Enter phone number"
                        value="{{ old('phone_number') }}"
                    />

                    <x-form-input 
                        name="college"
                        label="College"
                        placeholder="Enter college name"
                        value="{{ old('college') }}"
                    />

                    <x-form-input 
                        name="course"
                        label="Course"
                        placeholder="Enter course name"
                        value="{{ old('course') }}"
                    />

                    <x-form-input 
                        type="number"
                        name="year"
                        label="Year"
                        placeholder="Enter year of study"
                        value="{{ old('year') }}"
                        min="1"
                        max="6"
                    />

                    <x-form-input 
                        type="password"
                        name="password"
                        label="Password"
                        placeholder="Enter password"
                        required
                    />

                    <x-form-input 
                        type="password"
                        name="password_confirmation"
                        label="Confirm Password"
                        placeholder="Confirm password"
                        required
                    />

                    <div class="flex justify-end pt-4">
                        <x-form-button>
                            Create User
                        </x-form-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
