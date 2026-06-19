<!-- Modal Backdrop -->
<div id="modalBackdrop" class="fixed inset-0 bg-black/40 z-50 invisible opacity-0 transition-all duration-300 flex justify-center items-center px-4">

    <!-- Modal Container -->
    <div id="modalContainer" class="bg-white w-full max-w-md rounded-lg shadow-2xl transform -translate-y-10 opacity-0 transition-all duration-300 flex flex-col">

        <!-- Header -->
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h3 id="modalTitle" class="text-xl font-normal text-gray-800">Add Department</h3>
            <button onclick="toggleModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Body -->
        <div class="p-6">
            <form id="departmentForm" action="{{ route('departments.store') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="_method" id="formMethod" value="POST">

                <div>
                    <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase">Department Name</label>
                    <input id="departmentNameInput" name="name" type="text" value="{{ old('name') }}" placeholder="e.g. Human Resources" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:border-gray-500 outline-none @error('name') border-red-400 @enderror">
                    @error('name') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
            </form>
        </div>

        <!-- Footer -->
        <div class="px-6 py-4 border-t border-gray-200 flex justify-end gap-2">
            <button type="button" onclick="toggleModal()" class="bg-[#6c757d] hover:bg-[#5a6268] text-white px-5 py-2 rounded-md text-sm font-medium transition-colors">
                Close
            </button>
            <button type="submit" form="departmentForm" class="bg-[#0d6efd] hover:bg-[#0b5ed7] text-white px-5 py-2 rounded-md text-sm font-medium transition-colors">
                Save
            </button>
        </div>
    </div>
</div>