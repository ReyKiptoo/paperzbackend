@props(['editRoute', 'deleteRoute', 'itemName' => 'item'])

<div class="flex justify-end items-center space-x-6">
    <a href="{{ $editRoute }}" class="bg-blue-100 text-blue-700 hover:bg-blue-200 px-3 py-1.5 rounded-md text-sm font-medium transition duration-200">
        <span class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            Edit
        </span>
    </a>
    
    <button 
        type="button" 
        class="bg-red-100 text-red-700 hover:bg-red-200 px-3 py-1.5 rounded-md text-sm font-medium transition duration-200 delete-btn"
        data-item-name="{{ $itemName }}"
        data-delete-url="{{ $deleteRoute }}"
        onclick="confirmDelete(this)">
        <span class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
            Delete
        </span>
    </button>
</div>

@once
@push('scripts')
<script>
    function confirmDelete(button) {
        const itemName = button.getAttribute('data-item-name');
        const deleteUrl = button.getAttribute('data-delete-url');
        
        if (confirm(`Are you sure you want to delete this ${itemName}? This action cannot be undone.`)) {
            // Create and submit a form programmatically
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = deleteUrl;
            
            // Add CSRF token
            const csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            form.appendChild(csrfToken);
            
            // Add method field
            const methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'DELETE';
            form.appendChild(methodField);
            
            // Append to body, submit and remove
            document.body.appendChild(form);
            form.submit();
            document.body.removeChild(form);
        }
    }
</script>
@endpush
@endonce
