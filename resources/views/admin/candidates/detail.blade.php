<x-app-layout :title=$title>
    <div class="ml-56 py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 w-full flex justify-center">
                    <div class="w-4/5 my-5">
                        <div class="flex justify-between">
                            <h1 class="text-xl uppercase mb-5">Kandidat Details</h1>
                            {{-- <a class="text-lg text-blue-600 bg-red-300 rounded">Back</a> --}}
                        </div>

                        <div class="flex flex-col gap-6">

                            <img src={{ asset('assets/kandidatFoto/' . $candidate->foto) }}
                                alt={{ $candidate->nama_ketua }} class="h-96 w-full">

                            <div class="flex gap-10 text-lg tracking-wider uppercase font-semibold self-center">
                                <span>{{ $candidate->nama_ketua }}</span>
                                <span>Dan</span>
                                <span>{{ $candidate->nama_wakil }}</span>
                            </div>

                            <div class="flex flex-col">
                                <h5 class="font-semibold uppercase">Profil :</h5>
                                <span class="text-sm lowercase">{{ $candidate->profile }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
