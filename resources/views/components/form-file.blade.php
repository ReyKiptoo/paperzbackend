@props(['name', 'label', 'accept' => '', 'required' => false])

<div class="form-group mb-6">
    <label for="{{ $name }}" class="block text-sm font-semibold text-gray-700 mb-2">{{ $label }}</label>
    <div class="mt-1 relative">
        <label for="{{ $name }}" class="flex items-center justify-center px-4 py-3 border border-gray-300 border-dashed rounded-md cursor-pointer bg-white text-gray-700 hover:bg-gray-50 transition duration-200">
            <svg class="h-6 w-6 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
            </svg>
            <span class="text-base">Click to select a file or drag and drop</span>
            <input 
                type="file" 
                name="{{ $name }}"
                id="{{ $name }}"
                accept="{{ $accept }}"
                {{ $required ? 'required' : '' }}
                {{ $attributes->merge(['class' => 'absolute inset-0 w-full h-full opacity-0 cursor-pointer']) }}
            >
        </label>
        <div class="mt-2 text-sm text-gray-500 file-name-display"></div>
    </div>
    @error($name)
        <p class="mt-1 text-sm text-red-600 font-medium">{{ $message }}</p>
    @enderror
    
    {{ $slot }}

    <script>
        document.getElementById('{{ $name }}').addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name || 'No file selected';
            const fileDisplay = this.parentElement.nextElementSibling;
            fileDisplay.textContent = fileName;
        });
    </script>
</div>
