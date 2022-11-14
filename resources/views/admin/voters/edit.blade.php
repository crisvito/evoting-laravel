<x-app-layout :title=$title>
    <div class="ml-56 py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-xl uppercase mb-5">Edit Data Pemilih</h1>

                    <div class="w-1/2">
                        <form method="POST" action={{ "/admin/dashboard/voters/$voter->username" }}>
                            @csrf
                            @method('put')

                            <!-- Name -->
                            <div>
                                <x-input-label for="name" :value="'Name'" />

                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                    :value="old('name', $voter->name)" required />

                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Username -->
                            <div class="mt-4">
                                <x-input-label for="username" :value="'Username'" />

                                <x-text-input id="username" class="block mt-1 w-full" type="text" name="username"
                                    :value="old('username', $voter->username)" required />

                                <x-input-error :messages="$errors->get('username')" class="mt-2" />
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-input-label for="email" :value="'Email'" />

                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="old('email', $voter->email)" required />

                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <x-input-label for="password" :value="'Password'" />

                                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                    required autocomplete="new-password" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <x-input-label for="password_confirmation" :value="'Confirm Password'" />

                                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                    name="password_confirmation" required />

                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-danger-button :href="route('admin.voters.index')">
                                    Cancel
                                </x-danger-button>
                                <x-primary-button class="ml-4">
                                    Edit
                                </x-primary-button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
