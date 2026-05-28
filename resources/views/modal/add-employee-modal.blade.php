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
            <form id="addEmployeeForm" class="space-y-2">
                
                <!-- Section 1: Basic Information -->
                <div class="space-y-4">
                    <h4 class="text-sm font-bold text-gray-900 uppercase tracking-wider flex items-center gap-2">
                        <span>👤    </span> Basic Information
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase">Full Name</label>
                            <input type="text" placeholder="e.g. John Doe" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:border-gray-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase">Email</label>
                            <input type="email" placeholder="email@example.com" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:border-gray-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase">Phone Number</label>
                            <input type="tel" placeholder="09XX XXX XXXX" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:border-gray-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase">Address</label>
                            <input type="text" placeholder="Street, City" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:border-gray-500 outline-none">
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
                            <input type="text" placeholder="e.g. Developer" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:border-gray-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase">Department</label>
                            <select class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm bg-white outline-none">
                                <option value="">Select Department</option>
                                <option value="it">IT Department</option>
                                <option value="hr">Human Resources</option>
                                <option value="marketing">Marketing</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase">Employee Type (Optional)</label>
                            <select class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm bg-white outline-none">
                                <option value="full-time">Full-time</option>
                                <option value="part-time">Part-time</option>
                                <option value="contract">Contract</option>
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
                            <input type="date" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:border-gray-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 mb-1 uppercase">Status</label>
                            <div class="flex items-center gap-4 py-1">
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="status" value="active" class="w-4 h-4" checked>
                                    <span class="text-sm text-gray-700">Active</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="status" value="inactive" class="w-4 h-4">
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
            <button onclick="toggleModal()" class="bg-[#6c757d] hover:bg-[#5a6268] text-white px-5 py-2 rounded-md text-sm font-medium transition-colors">
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