<x-app-layout>
    <div class="px-16 mt-4">
        <!-- Modal toggle -->
        <button data-modal-target="create-modal" data-modal-toggle="create-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mb-4" type="button">
        Toggle modal
        </button>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama institusi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Posisi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tahun mulai
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tahun selesai
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Deskripsi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody id="experience-list">
                    
                </tbody>
            </table>
        </div>
    </div>
    @include('pengalaman.create')
    @include('pengalaman.edit')

    <script>
        window.routes = {
            login: "{{ route('login') }}"
        };
    </script>
    <script src="{{ asset('js/pengalaman.js') }}"></script>
</x-app-layout>