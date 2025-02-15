<x-app-layout>
    <div class="overflow-hidden py-12 relative">
         <!-- Gradient Overlay for Blur Effect -->
        <div class="absolute inset-y-0 left-0 w-32 bg-gradient-to-r from-gray-950 to-transparent z-10"></div>
        <div class="absolute inset-y-0 right-0 w-32 bg-gradient-to-l from-gray-950 to-transparent z-10"></div>
        <div class="relative w-full">
            <!-- Slider Container -->
            <div class="flex animate-infinite-scroll space-x-12">
                <!-- Logo Items -->
                <div class="flex-shrink-0 flex items-center space-x-4 bg-white rounded-lg shadow-md p-4">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/javascript/javascript-original.svg" alt="JavaScript" class="size-12">
                    <span class="text-lg font-semibold">JavaScript</span>
                </div>
                <div class="flex-shrink-0 flex items-center space-x-4 bg-white rounded-lg shadow-md p-4">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/python/python-original.svg" alt="Python" class="size-12">
                    <span class="text-lg font-semibold">Python</span>
                </div>
                <div class="flex-shrink-0 flex items-center space-x-4 bg-white rounded-lg shadow-md p-4">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/java/java-original.svg"" alt="Java" class="size-12">
                    <span class="text-lg font-semibold">Java</span>
                </div>
                <div class="flex-shrink-0 flex items-center space-x-4 bg-white rounded-lg shadow-md p-4">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/cplusplus/cplusplus-original.svg" alt="C++" class="size-12">
                    <span class="text-lg font-semibold">C++</span>
                </div>
                <div class="flex-shrink-0 flex items-center space-x-4 bg-white rounded-lg shadow-md p-4">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/ruby/ruby-original.svg" alt="Ruby" class="size-12">
                    <span class="text-lg font-semibold">Ruby</span>
                </div>
                <div class="flex-shrink-0 flex items-center space-x-4 bg-white rounded-lg shadow-md p-4">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/go/go-original-wordmark.svg" alt="Go" class="size-12">
                    <span class="text-lg font-semibold">Go</span>
                </div>
                <div class="flex-shrink-0 flex items-center space-x-4 bg-white rounded-lg shadow-md p-4">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/rust/rust-original.svg" alt="Rust" class="size-12">
                    <span class="text-lg font-semibold">Rust</span>
                </div>
                <!-- Duplicate Items for Infinite Effect -->
                <div class="flex-shrink-0 flex items-center space-x-4 bg-white rounded-lg shadow-md p-4">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/javascript/javascript-original.svg" alt="JavaScript" class="size-12">
                    <span class="text-lg font-semibold">JavaScript</span>
                </div>
                <div class="flex-shrink-0 flex items-center space-x-4 bg-white rounded-lg shadow-md p-4">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/python/python-original.svg" alt="Python" class="size-12">
                    <span class="text-lg font-semibold">Python</span>
                </div>
                <div class="flex-shrink-0 flex items-center space-x-4 bg-white rounded-lg shadow-md p-4">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/java/java-original.svg" alt="Java" class="size-12">
                    <span class="text-lg font-semibold">Java</span>
                </div>
                <div class="flex-shrink-0 flex items-center space-x-4 bg-white rounded-lg shadow-md p-4">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/cplusplus/cplusplus-original.svg" alt="C++" class="size-12">
                    <span class="text-lg font-semibold">C++</span>
                </div>
                <div class="flex-shrink-0 flex items-center space-x-4 bg-white rounded-lg shadow-md p-4">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/ruby/ruby-original.svg" alt="Ruby" class="size-12">
                    <span class="text-lg font-semibold">Ruby</span>
                </div>
                <div class="flex-shrink-0 flex items-center space-x-4 bg-white rounded-lg shadow-md p-4">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/go/go-original-wordmark.svg" alt="Go" class="size-12">
                    <span class="text-lg font-semibold">Go</span>
                </div>
                <div class="flex-shrink-0 flex items-center space-x-4 bg-white rounded-lg shadow-md p-4">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/rust/rust-original.svg" alt="Rust" class="size-12">
                    <span class="text-lg font-semibold">Rust</span>
                </div>
            </div>
        </div>
    </div>

    <script>
        const username = "{{ $username }}";
    </script>
    <script src="{{ asset('js/portfolio.js') }}"></script>
</x-app-layout>