<!-- Modal Backdrop -->
<div id="modalBackdrop" class="fixed inset-0 bg-black/40 z-50 invisible opacity-0 transition-all duration-300 flex justify-center items-center px-4">

    
    <!-- Modal Container -->
    <div id="modalContainer" class="bg-white w-full max-w-2xl rounded-lg shadow-2xl transform -translate-y-10 opacity-0 transition-all duration-300 flex flex-col">
        
        <!-- Header -->
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-2xl font-normal text-gray-800">Add Employee</h3>
            <button onclick="toggleModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Body -->
        <div class="p-6 overflow-y-auto max-h-[75vh]">
            <form id="addEmployeeForm" action="{{ route('employees.store') }}" method="POST" class="space-y-2">
                @csrf
                <!-- Section 1: Basic Information -->
                <div class="space-y-4">
                    <h4 class="text-sm font-bold text-gray-900 uppercase tracking-wider flex items-center gap-2">
                        <span>👤    </span> Basic Information
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase">Full Name</label>
                            <input name="full_name" type="text" value="{{ old('full_name') }}" placeholder="e.g. John Doe" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:border-gray-500 outline-none @error('full_name') border-red-400 @enderror">
                            @error('full_name') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase">Email</label>
                            <input name="email" type="email" value="{{ old('email') }}" placeholder="email@example.com" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:border-gray-500 outline-none @error('email') border-red-400 @enderror">
                            @error('email') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase">Phone Number</label>
                            <input name="phone" type="tel" value="{{ old('phone') }}" placeholder="09XX XXX XXXX" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:border-gray-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase">Address</label>
                            <input name="address" type="text" value="{{ old('address') }}" placeholder="Street, City" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:border-gray-500 outline-none">
                        </div>
                    </div>
                </div>

                <hr class="border-gray-100">

                <!-- Section 2: Work Information -->
                <div class="space-y-4">
                    <h4 class="text-sm font-bold text-gray-900 uppercase tracking-wider flex items-center gap-2">
                        <span>💼</span> Work Information
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase">Position</label>
                            <input name="position" type="text" value="{{ old('position') }}" placeholder="e.g. Developer" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:border-gray-500 outline-none @error('position') border-red-400 @enderror">
                            @error('position') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase">Department</label>
                            <select name="department_id" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm bg-white outline-none @error('department_id') border-red-400 @enderror">
                                <option value="">Select Department</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                                @endforeach
                            </select>
                            @error('department_id') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase">Employee Type (Optional)</label>
                            <select name="employee_type" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm bg-white outline-none">
                                <option value="full-time" {{ old('employee_type') == 'full-time' ? 'selected' : '' }}>Full-time</option>
                                <option value="part-time" {{ old('employee_type') == 'part-time' ? 'selected' : '' }}>Part-time</option>
                                <option value="contract" {{ old('employee_type') == 'contract' ? 'selected' : '' }}>Contract</option>
                            </select>
                        </div>
                    </div>
                </div>

                <hr class="border-gray-100">

                <!-- Section 3: Employment Details -->
                <div class="space-y-4">
                    <h4 class="text-sm font-bold text-gray-900 uppercase tracking-wider flex items-center gap-2">
                        <span>📅</span> Employment Details
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase">Date Hired</label>
                            <input name="date_hired" type="date" value="{{ old('date_hired') }}" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:border-gray-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase">Status</label>
                            <div class="flex items-center gap-4 py-1">
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input name="status" type="radio" value="Active" class="w-4 h-4" {{ old('status', 'Active') == 'Active' ? 'checked' : '' }}>
                                    <span class="text-sm text-gray-700">Active</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input name="status" type="radio" value="Inactive" class="w-4 h-4" {{ old('status') == 'Inactive' ? 'checked' : '' }}>
                                    <span class="text-sm text-gray-700">Inactive</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <div class="px-6 py-4 border-t border-gray-200 flex justify-end gap-2">
            <button type="button" onclick="toggleModal()" class="bg-[#6c757d] hover:bg-[#5a6268] text-white px-5 py-2 rounded-md text-sm font-medium transition-colors">
                Close
            </button>
            <button type="submit" form="addEmployeeForm" class="bg-[#0d6efd] hover:bg-[#0b5ed7] text-white px-5 py-2 rounded-md text-sm font-medium transition-colors">
                Save Employee
            </button>
        </div>
    </div>
</div>

<script>
    function toggleModal() {
        const backdrop = document.getElementById('modalBackdrop');
        const container = document.getElementById('modalContainer');
        
        if (backdrop.classList.contains('invisible')) {
            // Open
            backdrop.classList.remove('invisible', 'opacity-0');
            container.classList.remove('-translate-y-10', 'opacity-0');
        } else {
            // Close
            backdrop.classList.add('invisible', 'opacity-0');
            container.classList.add('-translate-y-10', 'opacity-0');
        }
    }
</script>