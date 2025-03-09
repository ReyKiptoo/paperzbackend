@props(['type' => 'submit', 'color' => 'primary'])

@php
    $colorClasses = [
        'primary' => 'bg-primary hover:bg-primary-dark text-white',
        'secondary' => 'bg-gray-500 hover:bg-gray-600 text-white',
        'success' => 'bg-green-500 hover:bg-green-600 text-white',
        'danger' => 'bg-red-500 hover:bg-red-600 text-white'
    ][$color];
@endphp

<button 
    type="{{ $type }}" 
    {{ $attributes->merge(['class' => "$colorClasses font-medium py-3 px-6 rounded-md shadow-sm transition duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary"]) }}
>
    {{ $slot }}
</button>
