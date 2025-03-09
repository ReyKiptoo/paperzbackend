@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-semibold text-gray-800">Dashboard</h2>
        <div class="text-sm text-gray-600">Welcome, {{ auth()->user()->name }}</div>
    </div>

    <!-- Basic Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-medium text-gray-900">Total Colleges</h3>
            <p class="text-2xl font-bold text-primary mt-2">0</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-medium text-gray-900">Total Courses</h3>
            <p class="text-2xl font-bold text-primary mt-2">0</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-medium text-gray-900">Total Units</h3>
            <p class="text-2xl font-bold text-primary mt-2">0</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-medium text-gray-900">Past Papers</h3>
            <p class="text-2xl font-bold text-primary mt-2">0</p>
        </div>
    </div>
</div>
@endsection
