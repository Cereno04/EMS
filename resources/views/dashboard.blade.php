<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/team.png') }}">
    <title>EMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style> 
        body { font-family: 'Inter', sans-serif; } 
        .sidebar-collapsed { width: 5rem !important; }
        .sidebar-collapsed .nav-text, .sidebar-collapsed .logo-text { display: none; }
        .sidebar-collapsed .nav-item { justify-content: center; padding-left: 0; padding-right: 0; }
    </style>
</head>
<body class="bg-white flex h-screen overflow-hidden">

    <!-- SIDEBAR -->
    <aside id="sidebar" class="w-64 bg-white border-r border-gray-100 flex flex-col h-full transition-all duration-300 ease-in-out">
        <div class="p-6 flex items-center justify-between">
            <span class="logo-text text-xl font-bold text-gray-900 tracking-tight whitespace-nowrap">EMS Admin</span>
            <button id="toggleSidebar" class="p-2 rounded-lg hover:bg-gray-100 transition-colors text-gray-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
        </div>
        <nav class="flex-grow px-4 space-y-1">
            <a href="{{ url('dashboard') }}" class="nav-item flex items-center gap-3 p-3 text-sm transition-all rounded-xl {{ request()->is('dashboard*') ? 'bg-gray-50 text-blue-600 font-semibold' : 'text-gray-500 hover:text-gray-900 hover:bg-gray-50 font-medium' }}">
                <img src="{{ asset('assets/icons/dashboard.png') }}" class="w-5 h-5 shrink-0 {{ request()->is('dashboard*') ? '' : 'grayscale opacity-60' }}" alt="Dashboard">
                <span class="nav-text whitespace-nowrap">Dashboard</span>
            </a>
            <a href="{{ route('employees.index') }}" class="nav-item flex items-center gap-3 p-3 text-sm transition-all rounded-xl {{ request()->routeIs('employees.*') ? 'bg-gray-50 text-blue-600 font-semibold' : 'text-gray-500 hover:text-gray-900 hover:bg-gray-50 font-medium' }}">
                <img src="{{ asset('assets/icons/employees.png') }}" class="w-5 h-5 shrink-0 {{ request()->routeIs('employees.*') ? '' : 'grayscale opacity-60' }}" alt="Employees">
                <span class="nav-text whitespace-nowrap">Employees</span>
            </a>
            <a href="{{ route('departments.index') }}" class="nav-item flex items-center gap-3 p-3 text-sm transition-all rounded-xl {{ request()->routeIs('departments.*') ? 'bg-gray-50 text-blue-600 font-semibold' : 'text-gray-500 hover:text-gray-900 hover:bg-gray-50 font-medium' }}">
                <img src="{{ asset('assets/icons/department.png') }}" class="w-5 h-5 shrink-0 {{ request()->routeIs('departments.*') ? '' : 'grayscale opacity-60' }}" alt="Departments">
                <span class="nav-text whitespace-nowrap">Departments</span>
            </a>
            <a href="{{ route('attendance.index') }}" class="nav-item flex items-center gap-3 p-3 text-sm transition-all rounded-xl {{ request()->routeIs('attendance.*') ? 'bg-gray-50 text-blue-600 font-semibold' : 'text-gray-500 hover:text-gray-900 hover:bg-gray-50 font-medium' }}">
                <img src="{{ asset('assets/icons/attendance.png') }}" class="w-5 h-5 shrink-0 {{ request()->routeIs('attendance.*') ? '' : 'grayscale opacity-60' }}" alt="Attendance">
                <span class="nav-text whitespace-nowrap">Attendance</span>
            </a>
            <a href="#" class="nav-item flex items-center gap-3 p-3 text-sm transition-all rounded-xl {{ request()->is('settings*') ? 'bg-gray-50 text-blue-600 font-semibold' : 'text-gray-500 hover:text-gray-900 hover:bg-gray-50 font-medium' }}">
                <img src="{{ asset('assets/icons/settings.png') }}" class="w-5 h-5 shrink-0 {{ request()->is('settings*') ? '' : 'grayscale opacity-60' }}" alt="Settings">
                <span class="nav-text whitespace-nowrap">Settings</span>
            </a>
        </nav>
        <div class="p-6">
            <button type="button" onclick="document.getElementById('logoutModal').classList.remove('hidden')"
                class="nav-item flex items-center gap-3 p-3 w-full text-sm font-medium text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-xl transition-all">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                <span class="nav-text whitespace-nowrap">Logout</span>
            </button>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-grow h-screen overflow-y-auto p-12 transition-all duration-300">
        <header class="flex justify-between items-center mb-10">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
                <p class="text-sm text-gray-400 mt-1">Manage your employees effortlessly.</p>
            </div>
            <div class="flex items-center gap-3 text-sm font-semibold text-gray-900">
                <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center">A</div>
                Administrator
            </div>
        </header>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-[#2d2d2d] p-5 rounded-2xl relative shadow-sm h-36 flex flex-col justify-between">
                <div>
                    <span class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider">Total Employees</span>
                    <h3 class="text-2xl font-bold text-white mt-1">{{ $totalEmployees }}</h3>
                    <!-- <p class="text-[9px] text-gray-500 mt-0.5">0</p> -->
                </div>
                <img src="https://cdn-icons-png.flaticon.com/512/9131/9131529.png" class="absolute top-4 right-4 w-8 h-8 opacity-80 invert" alt="icon">
            </div>
            <div class="bg-white border border-gray-100 p-5 rounded-2xl relative shadow-sm h-36 flex flex-col justify-between">
                <div>
                    <span class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider">Active Employees</span>
                    <h3 class="text-2xl font-bold text-gray-900 mt-1">{{ $activeEmployees }}</h3>
                    <!-- <p class="text-[9px] text-gray-400 mt-0.5">Updated just now</p> -->
                </div>
                <img src="https://cdn-icons-png.flaticon.com/512/2098/2098402.png" class="absolute top-4 right-4 w-8 h-8 grayscale opacity-40" alt="icon">
            </div>
            <div class="bg-white border border-gray-100 p-5 rounded-2xl relative shadow-sm h-36 flex flex-col justify-between">
                <div>
                    <span class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider">Departments</span>
                    <h3 class="text-2xl font-bold text-gray-900 mt-1">{{ $totalDepartments }}</h3>
                    <!-- <p class="text-[9px] text-gray-400 mt-0.5">0</p> -->
                </div>
                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" class="absolute top-4 right-4 w-8 h-8 grayscale opacity-40" alt="icon">
            </div>
            <div class="bg-white border border-gray-100 p-5 rounded-2xl relative shadow-sm h-36 flex flex-col justify-between">
                <div>
                    <span class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider">Pending Requests</span>
                    <h3 class="text-2xl font-bold text-gray-900 mt-1">0</h3>
                    <!-- <p class="text-[9px] text-gray-400 mt-0.5">0</p> -->
                </div>
                <img src="https://cdn-icons-png.flaticon.com/512/423/423786.png" class="absolute top-4 right-4 w-8 h-8 grayscale opacity-40" alt="icon">
            </div>
        </div>

        <div class="mt-16">
            <h2 class="text-sm font-bold text-gray-900 mb-6 uppercase tracking-widest">Recent Activity</h2>
            <div class="w-full h-px bg-gray-100 mb-8"></div>
            <div class="text-sm text-gray-400 italic">All systems active. No logs to show.</div>
        </div>
    </main>
    @include('modal.logout-modal')
    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('toggleSidebar');
        toggleBtn.addEventListener('click', () => { sidebar.classList.toggle('sidebar-collapsed'); });
    </script>
</body>
</html>