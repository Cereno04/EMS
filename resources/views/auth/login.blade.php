<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/team.png') }}">
    <title>EMS|Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }

        /* Spinner animation */
        @keyframes spin {
            0%   { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .spinner {
            display: inline-block;
            width: 18px;
            height: 18px;
            border: 2px solid rgba(255,255,255,0.4);
            border-top-color: #fff;
            border-radius: 50%;
            animation: spin 0.7s linear infinite;
            vertical-align: middle;
            margin-right: 8px;
        }

        /* Button loading state */
        #loginBtn:disabled,
        #registerBtn:disabled {
            opacity: 0.85;
            cursor: not-allowed;
        }
    </style>
</head>
<body class="bg-gray-50 h-screen overflow-hidden">

    <div class="flex h-screen">
        
        <!-- LEFT SIDE: LARGE IMAGE SECTION (70%) -->
        <div class="hidden lg:flex lg:w-[70%] relative h-full">
            <img src="https://images.unsplash.com/photo-1499750310107-5fef28a66643?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" 
                 alt="Workspace" 
                 class="absolute inset-0 w-full h-full object-cover">
        </div>

        <!-- RIGHT SIDE: FORM SECTION (30%) -->
        <div class="w-full lg:w-[30%] flex flex-col items-center justify-center p-6 bg-white shadow-xl z-10 border-l border-gray-100 h-full">
            
            <div class="w-full max-w-[380px]">
                
                <div class="flex justify-center mb-6">
                    <img src="{{ asset('assets/img/logo.png') }}" 
                         alt="Logo" 
                         onerror="this.src='https://ui-avatars.com/api/?name=EMS&background=2563eb&color=fff&bold=true'"
                         class="h-12 w-auto object-contain" />
                </div>

                <!-- LOGIN FORM -->
                <div id="login-form" class="transition-all duration-300">
                    <div class="text-center mb-6">
                        <h2 class="text-2xl font-extrabold text-[#1e293b]">Welcome back</h2>
                        <p class="text-sm text-gray-500 mt-2">Enter your ID number and password to sign in.</p>
                    </div>

                    <form action="/login" method="POST" class="space-y-4" onsubmit="handleLogin(event)">
                        @csrf
                        @if ($errors->any())
                            <div class="p-2 bg-red-100 text-red-600 text-xs rounded">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <div>
                            <label class="block text-sm font-bold text-[#1e293b] mb-1.5">ID no.</label>
                            <input type="text" name="id_number" id="idNumber" 
                                inputmode="numeric" 
                                oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                                placeholder="Enter your ID number" required
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:border-blue-500 outline-none transition-all placeholder:text-gray-300 text-sm" />
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-[#1e293b] mb-1.5">Password</label>
                            <div class="relative">
                                <input type="password" id="password" name="password" placeholder="Enter your password" required
                                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:border-blue-500 outline-none transition-all placeholder:text-gray-300 text-sm" />
                                <button type="button" onclick="togglePassword('password')" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                        <path d="M2.036 12.322a1.012 1.012 0 010-.644C3.399 8.049 7.452 5 12 5c4.548 0 8.601 3.049 9.964 6.678.042.112.042.24 0 .352C20.601 15.951 16.548 19 12 19c-4.548 0-8.601-3.049-9.964-6.678z" />
                                        <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="flex justify-between items-center py-1">
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" name="remember" class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="ml-2 text-sm text-gray-600">Remember me</span>
                            </label>
                            <a href="#" class="text-sm font-bold text-blue-600 hover:underline">Forgot?</a>
                        </div>

                        <!-- SIGN IN BUTTON WITH LOADING -->
                        <button type="submit" id="loginBtn"
                            class="w-full bg-[#2563eb] hover:bg-blue-700 text-white font-bold py-3.5 rounded-xl transition-all shadow-md text-sm flex items-center justify-center">
                            <span id="loginBtnText">Sign in</span>
                        </button>

                        <div class="relative flex items-center py-2">
                            <div class="flex-grow border-t border-gray-200"></div>
                            <span class="flex-shrink mx-4 text-xs text-gray-400 uppercase">or</span>
                            <div class="flex-grow border-t border-gray-200"></div>
                        </div>

                        <button type="button" class="w-full flex items-center justify-center gap-3 bg-white border border-gray-300 hover:bg-gray-50 text-[#1e293b] font-bold py-3 rounded-xl transition-all text-sm">
                            <img src="https://www.svgrepo.com/show/355037/google.svg" class="w-4 h-4" alt="Google">
                            Sign in with Google
                        </button>
                    </form>

                    <p class="text-center text-gray-700 text-sm mt-6">
                        Don't have an account? 
                        <button onclick="toggleAuth()" class="text-blue-600 font-bold hover:underline">Sign up</button>
                    </p>
                </div>

                <!-- SIGN UP FORM -->
                <div id="signup-form" class="hidden transition-all duration-300">
                    <div class="text-center mb-6">
                        <h2 class="text-2xl font-extrabold text-[#1e293b]">Create account</h2>
                    </div>

                    <form action="/signup" method="POST" class="space-y-4" onsubmit="handleRegister(event)">
                        @csrf
                        <input type="text" name="name" placeholder="Full Name" required class="w-full px-4 py-3 rounded-lg border border-gray-300 outline-none text-sm" />
                        
                        <input type="text" name="id_number" placeholder="ID Number" required 
                            oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 outline-none text-sm" />
                        
                        <div class="relative">
                            <input type="password" id="reg_password" name="password" placeholder="Password" required class="w-full px-4 py-3 rounded-lg border border-gray-300 outline-none text-sm" />
                            <button type="button" onclick="togglePassword('reg_password')" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path d="M2.036 12.322a1.012 1.012 0 010-.644C3.399 8.049 7.452 5 12 5c4.548 0 8.601 3.049 9.964 6.678.042.112.042.24 0 .352C20.601 15.951 16.548 19 12 19c-4.548 0-8.601-3.049-9.964-6.678z" />
                                    <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </button>
                        </div>
                        
                        <!-- REGISTER BUTTON WITH LOADING -->
                        <button type="submit" id="registerBtn"
                            class="w-full bg-[#2563eb] hover:bg-blue-700 text-white font-bold py-3 rounded-xl shadow-md mt-2 text-sm flex items-center justify-center">
                            <span id="registerBtnText">Register</span>
                        </button>
                    </form>

                    <p class="text-center text-gray-700 text-sm mt-6">
                        Already have an account? 
                        <button onclick="toggleAuth()" class="text-blue-600 font-bold hover:underline">Sign in</button>
                    </p>
                </div>

            </div>
        </div>
    </div>

    <script>
        // Toggle password visibility
        function togglePassword(id) {
            const el = document.getElementById(id);
            el.type = el.type === "password" ? "text" : "password";
        }

        // Toggle between login and signup forms
        function toggleAuth() {
            const login = document.getElementById('login-form');
            const signup = document.getElementById('signup-form');
            login.classList.toggle('hidden');
            signup.classList.toggle('hidden');
        }

        // Login button loading state
        function handleLogin(event) {
            const btn = document.getElementById('loginBtn');
            const btnText = document.getElementById('loginBtnText');

            btn.disabled = true;
            btnText.innerHTML = '<span class="spinner"></span> Signing in...';
        }

        // Register button loading state
        function handleRegister(event) {
            const btn = document.getElementById('registerBtn');
            const btnText = document.getElementById('registerBtnText');

            btn.disabled = true;
            btnText.innerHTML = '<span class="spinner"></span> Registering...';
        }
    </script>
</body>
</html>