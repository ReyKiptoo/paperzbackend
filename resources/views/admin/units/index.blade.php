@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-semibold text-gray-900">Units</h2>
        <a href="{{ route('admin.units.create') }}" class="bg-primary hover:bg-primary-dark text-white font-medium py-2.5 px-5 rounded-md shadow transition duration-200">
            Add New Unit
        </a>
    </div>

    <div class="mt-8">
        <div class="bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Course
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Year & Semester
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Past Papers
                            </th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($units as $unit)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $unit->name }}</div>
                                    @if($unit->description)
                                        <div class="text-sm text-gray-500">{{ \Illuminate\Support\Str::limit($unit->description, 50) }}</div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $unit->course->name }}</div>
                                    <div class="text-sm text-gray-500">{{ $unit->course->college->name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Year {{ $unit->year }}</div>
                                    <div class="text-sm text-gray-500">Semester {{ $unit->semester }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $unit->pastPapers()->count() ?? 0 }} Papers</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <x-table-actions
                                        editRoute="{{ route('admin.units.edit', $unit) }}"
                                        deleteRoute="{{ route('admin.units.destroy', $unit) }}"
                                        itemName="unit"
                                    />
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                    No units found. <a href="{{ route('admin.units.create') }}" class="text-primary hover:text-primary-dark">Create one now</a>.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($units->hasPages())
                <div class="px-6 py-4 bg-white border-t border-gray-200">
                    {{ $units->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
