<x-admin-layout>
    <div class="flex justify-center items-center w-full h-screen overflow-hidden">
        <div class="max-w-sm mx-auto bg-white rounded-xl shadow-md overflow-hidden">
            <!-- Profile Image Section -->
            <div class="flex justify-center p-6 bg-gray-50">
                <img class="h-32 w-32 rounded-full object-cover border-4 border-white shadow-lg" 
                    src="" 
                    alt="Profile picture"
                    id="profileImage">
            </div>
            
            <!-- Content Section -->
            <div class="p-6">
                <!-- Name -->
                <div class="text-center mb-4">
                    <h2 class="text-xl font-bold text-gray-800" id="name"></h2>
                </div>
                
                <!-- Details -->
                <div class="space-y-3">
                    <!-- Tanggal Lahir -->
                    <div class="flex items-center text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span id="tanggal_lahir"></span>
                    </div>

                    <!-- Email -->
                    <div class="flex items-center text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span id="email"></span>
                    </div>

                    <!-- Phone -->
                    <div class="flex items-center text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span id="phone"></span>
                    </div>

                    <!-- Gender -->
                    <div class="flex items-center text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span id="gender"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.routes = {
            dashboard: "{{ route('dashboard') }}",
            login: "{{ route('login') }}"
        };
        const profileImage = '{{ asset('images/default.jpeg') }}';
    </script>
    <script src="{{ asset('js/admin/profile.js') }}"></script>
</x-admin-layout>