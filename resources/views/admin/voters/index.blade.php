<x-app-layout :title=$title>
    <div class="ml-56 py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-xl uppercase">Data Pemilih</h1>

                    <div class="my-5">
                        <a href={{ route('admin.add.voters') }} class="px-5 py-2 rounded-lg bg-blue-300">Tambah
                            Pemilih</a>
                    </div>
                    <table class="table-fixed">
                        <thead>
                            <tr>
                                <th class="bg-blue-100 px-4">#</th>
                                <th class="bg-blue-100 px-4">Username</th>
                                <th class="bg-blue-100 px-4">Nama</th>
                                <th class="bg-blue-100 px-4">Email</th>
                                <th class="bg-blue-100 px-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($voters as $voter)
                                <tr>
                                    <td class="border px-8 py-4">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="border px-8 py-4">
                                        {{ $voter->username }}
                                    </td>
                                    <td class="border px-8 py-4">
                                        {{ $voter->name }}
                                    </td>
                                    <td class="border px-8 py-4">
                                        {{ $voter->email }}
                                    </td>
                                    <td class="border px-8 py-4">
                                        <span class="flex gap-2 text-blue-800">
                                            <a href="">Delete</a>|
                                            <a href="">Edit</a>
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
