@props(['type' => 'text', 'name', 'label', 'placeholder' => '', 'value' => '', 'required' => false])

<div class="form-group mb-6">
    <label for="{{ $name }}" class="block text-sm font-semibold text-gray-700 mb-2">{{ $label }}</label>
    <input 
        type="{{ $type }}" 
        name="{{ $name }}" 
        id="{{ $name }}" 
        value="{{ $value }}" 
        placeholder="{{ $placeholder }}"
        {{ $required ? 'required' : '' }}
        {{ $attributes->merge(['class' => 'form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-30 py-3 px-4 bg-white text-gray-700 text-base transition duration-200']) }}
    >
    @error($name)
        <p class="mt-1 text-sm text-red-600 font-medium">{{ $message }}</p>
    @enderror
</div>
