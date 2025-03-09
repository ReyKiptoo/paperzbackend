@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-semibold text-gray-900">Edit User: {{ $user->name }}</h2>
        <a href="{{ route('admin.users.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-2.5 px-5 rounded-md shadow transition duration-200">
            Back to Users
        </a>
    </div>

    <div class="mt-8">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="p-8">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <x-form-input 
                        name="name"
                        label="Name"
                        placeholder="Enter full name"
                        value="{{ old('name', $user->name) }}"
                        required
                    />

                    <x-form-input 
                        type="email"
                        name="email"
                        label="Email Address"
                        placeholder="Enter email address"
                        value="{{ old('email', $user->email) }}"
                        required
                    />

                    <x-form-input 
                        type="password"
                        name="password"
                        label="Password"
                        placeholder="Enter new password (leave blank to keep current)"
                    />

                    <x-form-input 
                        type="password"
                        name="password_confirmation"
                        label="Confirm Password"
                        placeholder="Confirm new password"
                    />

                    <div class="flex justify-end pt-4">
                        <x-form-button>
                            Update User
                        </x-form-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
