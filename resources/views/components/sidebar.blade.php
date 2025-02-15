<!-- Sidebar Toggle Button (Mobile) -->
    <button id="sidebarToggle" class="fixed top-4 left-4 z-50 p-2 rounded-md bg-gray-800 text-white lg:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <!-- Sidebar -->
    <div id="sidebar" class="fixed z-50 top-0 left-0 h-full w-64 bg-gray-800 text-white transform -translate-x-full transition-transform duration-300 ease-in-out lg:translate-x-0">
        <!-- Sidebar Header -->
        <div class="py-4 px-4 border-b border-gray-700 flex items-center justify-between">
            <div class="flex gap-2 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd" d="M3 6a3 3 0 0 1 3-3h12a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3V6Zm14.25 6a.75.75 0 0 1-.22.53l-2.25 2.25a.75.75 0 1 1-1.06-1.06L15.44 12l-1.72-1.72a.75.75 0 1 1 1.06-1.06l2.25 2.25c.141.14.22.331.22.53Zm-10.28-.53a.75.75 0 0 0 0 1.06l2.25 2.25a.75.75 0 1 0 1.06-1.06L8.56 12l1.72-1.72a.75.75 0 1 0-1.06-1.06l-2.25 2.25Z" clip-rule="evenodd" />
                </svg>
                <h2 class="text-xl font-semibold hidden lg:block">Dashboard</h2>
            </div>
            <button class="block lg:hidden" id="close-sidebar">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>

        <!-- Sidebar Links -->
        <nav class="mt-6">
            <div class="px-4 py-2">
                <a href="{{ route('dashboard') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 text-white hover:text-gray-300 {{ request()->routeIs('dashboard') ? 'bg-gray-700 text-gray-300' : '' }}">
                    Dashboard
                </a>
            </div>
            <div class="px-4 py-2">
                <a href="{{ route('riwayat-pendidikan.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 text-white hover:text-gray-300 {{ request()->routeIs('riwayat-pendidikan.index') ? 'bg-gray-700 text-gray-300' : '' }}">
                    Pendidikan
                </a>
            </div>
            <div class="px-4 py-2">
                <a href="{{ route('pengalaman.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 text-white hover:text-gray-300 {{ request()->routeIs('pengalaman.index') ? 'bg-gray-700 text-gray-300' : '' }}">
                    Pengalaman
                </a>
            </div>
        </nav>
    </div>