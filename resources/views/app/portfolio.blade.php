<x-app-layout>
    <section id="home" class="bg-gray-800/10 backdrop-blur-lg min-h-screen flex flex-col justify-center items-center px-4 sm:px-6 lg:px-8 pt-20 md:pt-0">
        <div class="max-w-5xl w-full mx-auto">
        <!-- Hero Content -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <!-- Text Content -->
                <div class="space-y-6 order-2 md:order-1">
                    <div class="space-y-2">
                        <p class="text-blue-400 font-medium">Halo, saya adalah</p>
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-emerald-400" id="name"></h1>
                        <h2 class="text-2xl sm:text-3xl font-semibold text-gray-300">
                            Web Developer & UI/UX Designer
                        </h2>
                    </div>
                    <p class="text-gray-400 text-base sm:text-lg leading-relaxed">
                        Saya adalah seorang pengembang web yang berfokus pada membuat pengalaman digital yang menarik dan intuitif. Dengan lebih dari 3 tahun pengalaman, saya menggabungkan keahlian teknis dengan pemahaman desain UI/UX untuk menciptakan solusi web yang efektif.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#portfolio" class="px-6 py-3 bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-lg transition duration-300 ease-in-out transform hover:-translate-y-1">
                            Lihat Portfolio
                        </a>
                        <a href="#contact" class="px-6 py-3 bg-transparent hover:bg-blue-500/10 border border-blue-500 text-blue-400 font-medium rounded-lg transition duration-300 ease-in-out transform hover:-translate-y-1">
                            Hubungi Saya
                        </a>
                    </div>
                
                <!-- Social Media Icons -->
                <div class="flex gap-4 pt-4">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm4.46 7.94h-2.79c-.26 0-.52.01-.77.04-.33.15-.58.4-.77.75-.18.35-.28.78-.28 1.29v1.71h4.18l-.56 4.21h-3.62V28h-4.36V17.93H5.5v-4.21h2.92v-1.97c0-1.31.25-2.31.75-3 .5-.69 1.17-1.22 2-1.59.83-.37 1.77-.55 2.82-.55h2.47v3.32z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M7.168 0c-3.967 0-7.168 3.29-7.168 7.344v9.31c0 4.055 3.2 7.346 7.168 7.346h9.664C20.8 24 24 20.71 24 16.656v-9.31C24 3.289 20.8 0 16.832 0H7.168zm11.712 4.8c.736 0 1.328.592 1.328 1.328s-.592 1.328-1.328 1.328-1.328-.592-1.328-1.328.592-1.328 1.328-1.328zM12 6.24c3.2 0 5.76 2.56 5.76 5.76s-2.56 5.76-5.76 5.76-5.76-2.56-5.76-5.76 2.56-5.76 5.76-5.76zM12 8c-2.208 0-4 1.792-4 4s1.792 4 4 4 4-1.792 4-4-1.792-4-4-4z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                        </svg>
                    </a>
                </div>
                </div>
                
                <!-- Hero Image -->
                <div class="order-1 md:order-2 flex justify-center">
                    <div class="w-64 h-64 sm:w-80 sm:h-80 lg:w-96 lg:h-96 relative overflow-hidden rounded-full border-4 border-blue-500/30 shadow-xl shadow-blue-500/10">
                        <img 
                        class="w-full h-full object-cover" 
                        src="" 
                        alt="Foto Profil"
                        id="userImage"
                        />
                        <!-- Decorative Elements -->
                        <div class="absolute -bottom-16 -right-16 w-32 h-32 bg-blue-500/20 rounded-full blur-2xl"></div>
                        <div class="absolute -top-8 -left-8 w-24 h-24 bg-emerald-500/20 rounded-full blur-xl"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="tech-stack" class="overflow-hidden py-12 relative">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-emerald-400 mb-4">Tech Stack</h2>
            <div class="w-20 h-1 bg-blue-500/30 mx-auto"></div>
        </div>
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
    </section>

    <section id="education" class="pt-14">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-emerald-400 mb-4">Education</h2>
                <div class="w-20 h-1 bg-blue-500/30 mx-auto"></div>
            </div>

            <!-- Education Containeer -->
            <div class="max-w-4xl mx-auto" id="education-container">
                <!-- Education Item -->
            </div>
        </div>
    </section>

    <section id="experience" class="pt-14">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-emerald-400 mb-4">Experience</h2>
                <div class="w-20 h-1 bg-blue-500/30 mx-auto"></div>
            </div>

            <!-- Education Containeer -->
            <div class="max-w-4xl mx-auto" id="experience-container">
                <!-- Education Item -->
            </div>
        </div>
    </section>

    <script>
        const username = "{{ $username }}";
        const defaultImage = '{{ asset('images/default.jpeg') }}';
    </script>
    <script src="{{ asset('js/app/portfolio.js') }}"></script>
</x-app-layout>