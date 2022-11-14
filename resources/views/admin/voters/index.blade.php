<x-app-layout :title=$title>
    <div class="ml-56 py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-xl uppercase">Data Pemilih</h1>

                    <div class="my-5">
                        <x-secondary-button :href="route('admin.voters.create')">
                            Tambah Pemilih
                        </x-secondary-button>
                    </div>
                    <table class="table-fixed">
                        <thead>
                            <tr class="header-table">
                                <th>#</th>
                                <th>Username</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="body-table">
                            @foreach ($voters as $voter)
                                <tr>
                                    <td class="index-voters">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $voter->username }}
                                    </td>
                                    <td>
                                        {{ $voter->name }}
                                    </td>
                                    <td>
                                        {{ $voter->email }}
                                    </td>
                                    <td>
                                        <span class="flex gap-2 text-blue-800">
                                            <x-secondary-button :href="'/admin/dashboard/voters/' . $voter->username . '/edit'">
                                                Edit
                                            </x-secondary-button>|
                                            <x-danger-button :href="'voters/' . $voter->username . '/edit'">
                                                Delete
                                            </x-danger-button>
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
