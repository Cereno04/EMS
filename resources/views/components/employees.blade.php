<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/team.png') }}">
    <title>EMS - Employees List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style> 
        body { font-family: 'Inter', sans-serif; } 
        .sidebar-collapsed { width: 5rem !important; }
        .sidebar-collapsed .nav-text, .sidebar-collapsed .logo-text { display: none; }
        .sidebar-collapsed .nav-item { justify-content: center; padding-left: 0; padding-right: 0; }

        img:not([src]) { visibility: hidden; }
        img[src=""] { visibility: hidden; }
    </style>
</head>
<body class="bg-white flex h-screen overflow-hidden">

    <!-- SIDEBAR (Borders Removed) -->
    <aside id="sidebar" class="w-64 bg-white flex flex-col h-full transition-all duration-300 ease-in-out">
        <div class="p-6 flex items-center justify-between">
            <span class="logo-text text-xl font-bold text-gray-900 tracking-tight whitespace-nowrap">EMS Admin</span>
            <button id="toggleSidebar" class="p-2 rounded-lg hover:bg-gray-100 transition-colors text-gray-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
        </div>
        <nav class="flex-grow px-4 space-y-1">
            <a href="{{ url('/dashboard') }}" class="nav-item flex items-center gap-3 p-3 text-sm font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-50 rounded-xl transition-all">
                <img src="{{ asset('assets/icons/dashboard.png') }}" class="w-5 h-5 shrink-0 grayscale opacity-60" alt="Dashboard">
                <span class="nav-text whitespace-nowrap">Dashboard</span>
            </a>
            <a href="{{ route('employees.index') }}" class="nav-item flex items-center gap-3 p-3 text-sm font-semibold bg-gray-50 text-blue-600 rounded-xl transition-all">
                <img src="{{ asset('assets/icons/employees.png') }}" class="w-5 h-5 shrink-0" alt="Employees">
                <span class="nav-text whitespace-nowrap">Employees</span>
            </a>
            <a href="{{ route('departments.index') }}" class="nav-item flex items-center gap-3 p-3 text-sm font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-50 rounded-xl transition-all">
                <img src="{{ asset('assets/icons/department.png') }}" class="w-5 h-5 shrink-0 grayscale opacity-60" alt="Departments">
                <span class="nav-text whitespace-nowrap">Departments</span>
            </a>
            <a href="#" class="nav-item flex items-center gap-3 p-3 text-sm font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-50 rounded-xl transition-all">
                <img src="{{ asset('assets/icons/attendance.png') }}" class="w-5 h-5 shrink-0 grayscale opacity-60" alt="Attendance">
                <span class="nav-text whitespace-nowrap">Attendance</span>
            </a>
            <a href="#" class="nav-item flex items-center gap-3 p-3 text-sm font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-50 rounded-xl transition-all">
                <img src="{{ asset('assets/icons/settings.png') }}" class="w-5 h-5 shrink-0 grayscale opacity-60" alt="Settings">
                <span class="nav-text whitespace-nowrap">Settings</span>
            </a>
        </nav>
        <div class="p-6">
            <button class="nav-item flex items-center gap-3 p-3 w-full text-sm font-medium text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-xl transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                <span class="nav-text whitespace-nowrap">Logout</span>
            </button>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-grow h-screen overflow-y-auto p-12 transition-all duration-300">
        
        <header class="flex justify-between items-center mb-10">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Employees</h1>
                <p class="text-sm text-gray-400 mt-1">Manage and view your organization members.</p>
            </div>
            <div class="flex items-center gap-4">
                <button onclick="toggleModal()" class="bg-blue-600 text-white px-4 py-2 rounded-l text-sm font-semibold hover:bg-blue-700 transition-all">
                    + Add Employee
                </button>
                <div class="flex items-center gap-3 text-sm font-semibold text-gray-900 pl-4">
                    <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center">A</div>
                    Administrator
                </div>
            </div>
        </header>

        <!-- SUCCESS / ERROR MESSAGES -->
        @if (session('success'))
            <div class="mb-6 px-4 py-3 rounded-lg bg-green-50 text-green-700 text-sm font-medium">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 px-4 py-3 rounded-lg bg-red-50 text-red-700 text-sm">
                <p class="font-semibold mb-1">Please fix the following:</p>
                <ul class="list-disc list-inside space-y-0.5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- TABLE SECTION (All Borders and Shadows Removed) -->
        <div class="bg-white overflow-hidden">
            <div class="overflow-x-auto px-0 mt-6">
                <table class="w-full max-w-7xl">
                    <thead class="text-slate-900 text-left text-sm font-semibold whitespace-nowrap">
                        <tr>
                            <th scope="col" class="px-3 py-3.5">
                                <button type="button" class="flex items-center gap-1 cursor-pointer">
                                    ID
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-3 fill-slate-400" viewBox="0 0 64 64"><path d="M15.99 28.58h32.02c1.964.073 3.15-2.443 1.81-3.9L33.81 6.08c-.904-1.096-2.716-1.098-3.62 0l-16.01 18.6c-1.334 1.455-.16 3.975 1.81 3.9m32.02 6.84H15.99c-1.964-.073-3.15 2.443-1.81 3.9l16.01 18.6c.904 1.096 2.716 1.098 3.62 0l16.01-18.6c1.334-1.455.16-3.975-1.81-3.9" /></svg>
                                </button>
                            </th>
                            <th scope="col" class="px-3 py-3.5">
                                <button type="button" class="flex items-center gap-1 cursor-pointer">
                                    Name
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-3 fill-slate-400" viewBox="0 0 64 64"><path d="M15.99 28.58h32.02c1.964.073 3.15-2.443 1.81-3.9L33.81 6.08c-.904-1.096-2.716-1.098-3.62 0l-16.01 18.6c-1.334 1.455-.16 3.975 1.81 3.9m32.02 6.84H15.99c-1.964-.073-3.15 2.443-1.81 3.9l16.01 18.6c.904 1.096 2.716 1.098 3.62 0l16.01-18.6c1.334-1.455.16-3.975-1.81-3.9" /></svg>
                                </button>
                            </th>
                            <th scope="col" class="px-3 py-3.5">
                                <button type="button" class="flex items-center gap-1 cursor-pointer">
                                    Position
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-3 fill-slate-400" viewBox="0 0 64 64"><path d="M15.99 28.58h32.02c1.964.073 3.15-2.443 1.81-3.9L33.81 6.08c-.904-1.096-2.716-1.098-3.62 0l-16.01 18.6c-1.334 1.455-.16 3.975 1.81 3.9m32.02 6.84H15.99c-1.964-.073-3.15 2.443-1.81 3.9l16.01 18.6c.904 1.096 2.716 1.098 3.62 0l16.01-18.6c1.334-1.455.16-3.975-1.81-3.9" /></svg>
                                </button>
                            </th>
                            <th scope="col" class="px-3 py-3.5">
                                <button type="button" class="flex items-center gap-1 cursor-pointer">
                                    Department
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-3 fill-slate-400" viewBox="0 0 64 64"><path d="M15.99 28.58h32.02c1.964.073 3.15-2.443 1.81-3.9L33.81 6.08c-.904-1.096-2.716-1.098-3.62 0l-16.01 18.6c-1.334 1.455-.16 3.975 1.81 3.9m32.02 6.84H15.99c-1.964-.073-3.15 2.443-1.81 3.9l16.01 18.6c.904 1.096 2.716 1.098 3.62 0l16.01-18.6c1.334-1.455.16-3.975-1.81-3.9" /></svg>
                                </button>
                            </th>
                            <th scope="col" class="px-3 py-3.5">
                                <button type="button" class="flex items-center gap-1 cursor-pointer">
                                    Email
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-3 fill-slate-400" viewBox="0 0 64 64"><path d="M15.99 28.58h32.02c1.964.073 3.15-2.443 1.81-3.9L33.81 6.08c-.904-1.096-2.716-1.098-3.62 0l-16.01 18.6c-1.334 1.455-.16 3.975 1.81 3.9m32.02 6.84H15.99c-1.964-.073-3.15 2.443-1.81 3.9l16.01 18.6c.904 1.096 2.716 1.098 3.62 0l16.01-18.6c1.334-1.455.16-3.975-1.81-3.9" /></svg>
                                </button>
                            </th>
                            <th scope="col" class="px-3 py-3.5">
                                <button type="button" class="flex items-center gap-1 cursor-pointer">
                                    Status
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-3 fill-slate-400" viewBox="0 0 64 64"><path d="M15.99 28.58h32.02c1.964.073 3.15-2.443 1.81-3.9L33.81 6.08c-.904-1.096-2.716-1.098-3.62 0l-16.01 18.6c-1.334 1.455-.16 3.975 1.81 3.9m32.02 6.84H15.99c-1.964-.073-3.15 2.443-1.81 3.9l16.01 18.6c.904 1.096 2.716 1.098 3.62 0l16.01-18.6c1.334-1.455.16-3.975-1.81-3.9" /></svg>
                                </button>
                            </th>
                            <th scope="col" class="px-3 py-3.5">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="text-sm">
                        @forelse ($employees as $employee)
                            <tr class="hover:bg-gray-50/50 transition-all">
                                <td class="px-3 py-4 text-slate-500">{{ $employee->id }}</td>
                                <td class="px-3 py-4 font-medium text-slate-900 whitespace-nowrap">{{ $employee->full_name }}</td>
                                <td class="px-3 py-4 text-slate-500">{{ $employee->position }}</td>
                                <td class="px-3 py-4 text-slate-500">{{ $employee->department->name ?? '—' }}</td>
                                <td class="px-3 py-4 text-slate-500">{{ $employee->email }}</td>
                                <td class="px-3 py-4">
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $employee->status === 'Active' ? 'bg-green-50 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                                        {{ $employee->status }}
                                    </span>
                                </td>
                                <td class="px-3 py-4 flex gap-4">
                                    <button class="text-blue-700 hover:underline">Edit</button>
                                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" onsubmit="return confirm('Delete this employee?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-700 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-3 py-8 text-center text-slate-400">
                                    No employees yet. Click "+ Add Employee" to create one.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </main>


    @include('modal.add-employee-modal')
    <script>

        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('toggleSidebar');
        toggleBtn.addEventListener('click', () => { sidebar.classList.toggle('sidebar-collapsed'); });

       function toggleModal() {
            const backdrop = document.getElementById('modalBackdrop');
            const container = document.getElementById('modalContainer');
            
            if (backdrop.classList.contains('invisible')) {
                // Open Modal (Slide down and fade in)
                backdrop.classList.remove('invisible', 'opacity-0');
                container.classList.remove('-translate-y-10', 'opacity-0');
                container.classList.add('translate-y-0', 'opacity-100');
            } else {
                // Close Modal (Slide up and fade out)
                container.classList.remove('translate-y-0', 'opacity-100');
                container.classList.add('-translate-y-10', 'opacity-0');
                backdrop.classList.add('opacity-0');
                
                setTimeout(() => {
                    backdrop.classList.add('invisible');
                }, 300);
            }
        }
        document.getElementById('modalBackdrop').addEventListener('click', (e) => {
            if (e.target.id === 'modalBackdrop') toggleModal();
        });

        // Re-open modal automatically if validation failed, so user sees the errors
        @if ($errors->any())
            document.addEventListener('DOMContentLoaded', () => toggleModal());
        @endif
    </script>
</body>
</html> 