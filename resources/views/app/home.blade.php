<x-app-layout>
    <div class="container mx-auto text-gray-100 mt-36 p-4" id="container">
        <h2>Portfolio List</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4" id="user-list-container">
        </div>
    </div>
    <script src="{{ asset('js/app/home.js') }}"></script>
</x-app-layout>