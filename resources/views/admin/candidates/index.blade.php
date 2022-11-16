<x-app-layout :title=$title>
    <div class="ml-56 py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-xl uppercase">Data Pemilih</h1>

                    @if (session()->has('success'))
                        <div class="my-3 w-3/5 px-4 py-4 rounded text-slate-800 bg-slate-300" role="alert">
                            {!! session('success') !!}
                        </div>
                    @endif

                    <div class="my-5">
                        <x-secondary-button :href="route('admin.voters.create')">
                            Tambah Pemilih
                        </x-secondary-button>
                    </div>
                    <table class="table-fixed">
                        <thead>
                            <tr class="header-table">
                                <th>#</th>
                                <th>Akses</th>
                                <th>Nik</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="body-table">
                            @foreach ($candidates as $candidate)
                                <tr>
                                    <td class="index-candidates">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="index-candidates">
                                        {{ $candidate->akses->nama }}
                                    </td>
                                    <td>
                                        {{ $candidate->nik }}
                                    </td>
                                    <td>
                                        {{ $candidate->name }}
                                    </td>
                                    <td>
                                        {{ $candidate->email }}
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
