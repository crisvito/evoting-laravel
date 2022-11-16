<x-app-layout :title=$title>
    <div class="ml-56 py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-xl font-semibold uppercase mb-5">Menambah Data Kandidat</h1>

                    <div class="w-full flex">
                        <form method="POST" action="{{ route('admin.candidates.store') }}" enctype="multipart/form-data"
                            class="w-1/2">
                            @csrf

                            <!-- Nama Ketua -->
                            <div>
                                <x-input-label for="nama_ketua" :value="'Nama Ketua'" />

                                <x-text-input id="nama_ketua" class="block mt-1 w-full" type="text" name="nama_ketua"
                                    :value="old('nama_ketua')" required autofocus />

                                <x-input-error :messages="$errors->get('nama_ketua')" class="mt-2" />
                            </div>

                            <!-- Nama Wakil -->
                            <div class="mt-4">
                                <x-input-label for="nama_wakil" :value="'Nama Wakil'" />

                                <x-text-input id="nama_wakil" class="block mt-1 w-full" type="text" name="nama_wakil"
                                    :value="old('nama_wakil')" autofocus required />

                                <x-input-error :messages="$errors->get('nama_wakil')" class="mt-2" />
                            </div>

                            <!-- Profile -->
                            <div class="mt-4">
                                <x-input-label for="profile" :value="'Profile'" />

                                <textarea name="profile" id="profile"
                                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    required>{{ old('profile') }}</textarea>

                                <x-input-error :messages="$errors->get('profile')" class="mt-2" />
                            </div>

                            <!-- Foto -->
                            <div class="mt-4">
                                <x-input-label for="foto" :value="'Foto'" />

                                <input
                                    class="block mt-1 w-full px-3 py-1.5 text-gray-700 bg-white cursor-pointer border border-solid border-gray-300 rounded focus:border-blue-600 focus:outline-none"
                                    type="file" id="foto" name="foto" onchange="previewImg(this);">

                                <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                            </div>


                            <div class="flex items-center justify-end mt-4">
                                <x-danger-button :href="route('admin.candidates.index')">
                                    Cancel
                                </x-danger-button>
                                <x-primary-button class="ml-4">
                                    Tambah
                                </x-primary-button>
                            </div>
                        </form>
                        <div class="w-1/2 p-7 pr-0">
                            <img src={{ asset('assets/img/default.jpg') }} alt="err" class="img-preview">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function previewImg(input) {

            const imgPre = document.querySelector('.img-preview')
            const fileImg = new FileReader()
            fileImg.readAsDataURL(input.files[0])

            fileImg.addEventListener('load', function(e) {
                imgPre.src = e.target.result;
            })
        }
    </script>
</x-app-layout>
