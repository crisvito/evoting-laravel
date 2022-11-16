<x-app-layout :title=$title>
    <div class="ml-56 py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-xl uppercase">Data Kandidat</h1>

                    @if (session()->has('success'))
                        <div class="my-3 w-3/5 px-4 py-4 rounded text-slate-800 bg-slate-300" role="alert">
                            {!! session('success') !!}
                        </div>
                    @endif

                    <div class="my-5">
                        <x-secondary-button :href="route('admin.candidates.create')">
                            Tambah Kandidat
                        </x-secondary-button>
                    </div>
                    <table class="table-fixed">
                        <thead>
                            <tr class="header-table tracking-widest">
                                <th>#</th>
                                <th>Foto</th>
                                <th>Nama Ketua</th>
                                <th>Nama Wakil</th>
                                <th>Profile</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="body-table candidates">
                            @foreach ($candidates as $candidate)
                                <tr>
                                    <td class="index-candidates">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="w-28">
                                        <img src="/assets/kandidatFoto/{{ $candidate->foto }}" alt="err">
                                    </td>
                                    <td>
                                        {{ $candidate->nama_ketua }}
                                    </td>
                                    <td>
                                        {{ $candidate->nama_wakil }}
                                    </td>
                                    <td>
                                        {{ $candidate->excerpt }}
                                        <a href="/admin/dashboard/candidates/{{ $candidate->id }}"
                                            class="text-blue-600 underline pl-2">detail</a>
                                    </td>
                                    <td>
                                        <span class="flex items-center gap-2 text-blue-800">
                                            <x-secondary-button :href="'/admin/dashboard/candidates/' . $candidate->id . '/edit'">
                                                Edit
                                            </x-secondary-button>|
                                            <form method="POST"
                                                action="/admin/dashboard/candidates/{{ $candidate->id }}">
                                                @method('delete')
                                                @csrf
                                                <button type="submit"
                                                    class="inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150"
                                                    onclick="return confirm('Yakin menghapus Data {{ $candidate->name }}')">
                                                    Delete
                                                </button>
                                            </form>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
