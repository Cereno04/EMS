<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMS Dashboard</title>
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
            <a href="{{ url('dashboard') }}" class="nav-item flex items-center gap-3 p-3 text-sm font-semibold bg-gray-50 text-blue-600 rounded-xl transition-all">
                <img src="{{ asset('assets/icons/dashboard.png') }}" class="w-5 h-5 shrink-0" alt="Dashboard">
                <span class="nav-text whitespace-nowrap">Dashboard</span>
            </a>
            <a href="{{ route('employees.index') }}" class="nav-item flex items-center gap-3 p-3 text-sm font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-50 rounded-xl transition-all">
                <img src="{{ asset('assets/icons/employees.png') }}" class="w-5 h-5 shrink-0" alt="Employees">
                <span class="nav-text whitespace-nowrap">Employees</span>
            </a>
            <a href="{{ route('departments.index') }}" class="nav-item flex items-center gap-3 p-3 text-sm font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-50 rounded-xl transition-all">
                <img src="{{ asset('assets/icons/department.png') }}" class="w-5 h-5 shrink-0" alt="Departments">
                <span class="nav-text whitespace-nowrap">Departments</span>
            </a>
            <a href="{{ route('attendance.index') }}" class="nav-item flex items-center gap-3 p-3 text-sm font-semibold bg-gray-50 text-blue-600 rounded-xl transition-all">
                <img src="{{ asset('assets/icons/attendance.png') }}" class="w-5 h-5 shrink-0" alt="Attendance">
                <span class="nav-text whitespace-nowrap">Attendance</span>
            </a>
            <a href="#" class="nav-item flex items-center gap-3 p-3 text-sm font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-50 rounded-xl transition-all">
                <img src="{{ asset('assets/icons/settings.png') }}" class="w-5 h-5 shrink-0" alt="Settings">
                <span class="nav-text whitespace-nowrap">Settings</span>
            </a>
        </nav>
        <div class="p-6">
            <button class="nav-item flex items-center gap-3 p-3 w-full text-sm font-medium text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-xl transition-all">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
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

        <!-- UPDATED STAT CARDS -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            
            <!-- Card 1: Dark Style -->
            <div class="bg-[#2d2d2d] p-5 rounded-2xl relative shadow-sm h-36 flex flex-col justify-between">
                <div>
                    <span class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider">Total Employees</span>
                    <h3 class="text-2xl font-bold text-white mt-1">2,324</h3>
                    <p class="text-[9px] text-gray-500 mt-0.5">+201</p>
                </div>
                <!-- Put your custom image path in src="" -->
                <img src="https://cdn-icons-png.flaticon.com/512/9131/9131529.png" class="absolute top-4 right-4 w-8 h-8 opacity-80 invert" alt="icon">
            </div>

            <!-- Card 2: Light Style -->
            <div class="bg-white border border-gray-100 p-5 rounded-2xl relative shadow-sm h-36 flex flex-col justify-between">
                <div>
                    <span class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider">Active Employees</span>
                    <h3 class="text-2xl font-bold text-gray-900 mt-1">0</h3>
                    <p class="text-[9px] text-gray-400 mt-0.5">Updated just now</p>
                </div>
                <img src="https://cdn-icons-png.flaticon.com/512/2098/2098402.png" class="absolute top-4 right-4 w-8 h-8 grayscale opacity-40" alt="icon">
            </div>

            <!-- Card 3: Light Style -->
            <div class="bg-white border border-gray-100 p-5 rounded-2xl relative shadow-sm h-36 flex flex-col justify-between">
                <div>
                    <span class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider">Departments</span>
                    <h3 class="text-2xl font-bold text-gray-900 mt-1">16,703</h3>
                    <p class="text-[9px] text-gray-400 mt-0.5">+1,202</p>
                </div>
                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" class="absolute top-4 right-4 w-8 h-8 grayscale opacity-40" alt="icon">
            </div>

            <!-- Card 4: Light Style -->
            <div class="bg-white border border-gray-100 p-5 rounded-2xl relative shadow-sm h-36 flex flex-col justify-between">
                <div>
                    <span class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider">Pending Requests</span>
                    <h3 class="text-2xl font-bold text-gray-900 mt-1">12.8%</h3>
                    <p class="text-[9px] text-gray-400 mt-0.5">-2.22%</p>
                </div>
                <img src="https://cdn-icons-png.flaticon.com/512/423/423786.png" class="absolute top-4 right-4 w-8 h-8 grayscale opacity-40" alt="icon">
            </div>

        </div>

        <!-- RECENT ACTIVITY -->
        <div class="mt-16">
            <h2 class="text-sm font-bold text-gray-900 mb-6 uppercase tracking-widest">Recent Activity</h2>
            <div class="w-full h-px bg-gray-100 mb-8"></div>
            <div class="text-sm text-gray-400 italic">All systems active. No logs to show.</div>
        </div>
    </main>

    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('toggleSidebar');
        toggleBtn.addEventListener('click', () => { sidebar.classList.toggle('sidebar-collapsed'); });
    </script>
</body>
</html>