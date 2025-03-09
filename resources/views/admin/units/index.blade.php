@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-semibold text-gray-900">Units</h2>
        <a href="{{ route('admin.units.create') }}" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded">
            Add New Unit
        </a>
    </div>

    <div class="mt-8">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
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
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
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
                                <div class="text-sm text-gray-900">{{ $unit->past_papers_count }} Papers</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end space-x-3">
                                    <a href="{{ route('admin.units.edit', $unit) }}" class="text-primary hover:text-primary-dark">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.units.destroy', $unit) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this unit? This will also delete all associated past papers.')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
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

            @if($units->hasPages())
                <div class="px-6 py-4 bg-white border-t border-gray-200">
                    {{ $units->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
