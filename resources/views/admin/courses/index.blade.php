@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-semibold text-gray-900">Courses</h2>
        <a href="{{ route('admin.courses.create') }}" class="bg-primary hover:bg-primary-dark text-white font-medium py-2.5 px-5 rounded-md shadow transition duration-200">
            Add New Course
        </a>
    </div>

    <div class="mt-8">
        <div class="bg-white shadow-md overflow-hidden sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            College
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Units
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Created At
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($courses as $course)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $course->name }}</div>
                                @if($course->description)
                                    <div class="text-sm text-gray-500">{{ Str::limit($course->description, 50) }}</div>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $course->college->name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $course->units->count() ?? 0 }} Units</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $course->created_at->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <x-table-actions
                                    editRoute="{{ route('admin.courses.edit', $course) }}"
                                    deleteRoute="{{ route('admin.courses.destroy', $course) }}"
                                    itemName="course"
                                />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                No courses found. <a href="{{ route('admin.courses.create') }}" class="text-primary hover:text-primary-dark">Create one now</a>.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            @if($courses->hasPages())
                <div class="px-6 py-4 bg-white border-t border-gray-200">
                    {{ $courses->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
