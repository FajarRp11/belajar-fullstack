<nav class="bg-gray-800 p-4">
    <div class="container mx-auto">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <div class="text-white font-bold text-xl">Logo</div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-white focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path id="menu-icon" class="block" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        <path id="close-icon" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-4">
                <a href="#" class="text-white hover:text-gray-300">Beranda</a>
                <a href="#" class="text-white hover:text-gray-300">Tentang</a>
                <a href="#" class="text-white hover:text-gray-300">Layanan</a>
                <a href="#" class="text-white hover:text-gray-300">Kontak</a>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden mt-2">
            <div class="flex flex-col space-y-2">
                <a href="#" class="text-white hover:text-gray-300 py-2">Beranda</a>
                <a href="#" class="text-white hover:text-gray-300 py-2">Tentang</a>
                <a href="#" class="text-white hover:text-gray-300 py-2">Layanan</a>
                <a href="#" class="text-white hover:text-gray-300 py-2">Kontak</a>
            </div>
        </div>
    </div>
</nav>
