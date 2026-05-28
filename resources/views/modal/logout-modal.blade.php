<!-- Logout Confirmation Modal -->
<div id="logoutModal" class="hidden fixed inset-0 z-50 flex items-center justify-center">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-black/30 backdrop-blur-sm"
         onclick="document.getElementById('logoutModal').classList.add('hidden')"></div>

    <!-- Modal Card -->
    <div class="relative bg-white rounded-2xl shadow-xl p-8 w-full max-w-sm mx-4 flex flex-col items-center gap-4">
        <!-- Icon -->
        <div class="w-14 h-14 rounded-full bg-red-50 flex items-center justify-center">
            <svg class="w-7 h-7 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
            </svg>
        </div>

        <!-- Text -->
        <div class="text-center">
            <h3 class="text-lg font-bold text-gray-900">Log out?</h3>
            <p class="text-sm text-gray-400 mt-1">You'll be redirected to the login page.</p>
        </div>

        <!-- Actions -->
        <div class="flex gap-3 w-full mt-2">
            <button type="button"
                onclick="document.getElementById('logoutModal').classList.add('hidden')"
                class="flex-1 py-2.5 rounded-xl border border-gray-200 text-sm font-medium text-gray-600 hover:bg-gray-50 transition-all">
                Cancel
            </button>
            <form action="{{ route('logout') }}" method="POST" class="flex-1">
                @csrf
                <button type="submit"
                    class="w-full py-2.5 rounded-xl bg-red-500 text-white text-sm font-semibold hover:bg-red-600 transition-all">
                    Yes, log out
                </button>
            </form>
        </div>
    </div>
</div>