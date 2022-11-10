<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Evoting Web - {{ $title }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="font-sans text-gray-900 antialiased">
        <nav class="flex items-center h-20 px-10 justify-between bg-gray-200">
            {{-- logo --}}
            <div>
                <a href="{{ route('welcome') }}">
                    <img src={{ asset('assets/logo/evoting.png') }} alt="logo" class="w-32">
                </a>
            </div>
            {{-- nav-link --}}
            <div class="flex gap-2 items-center">
                @auth
                    @can('isAdmin')
                        <a href="{{ url('admin/dashboard') }}" class="hover:font-bold">Dashboard</a>
                    @endcan
                    @can('isWarga')
                        <a href="{{ url('/dashboard') }}" class="hover:font-bold">Dashboard</a>
                    @endcan
                    <form method="POST" action="{{ route('logout') }}" class="ml-4">
                        @csrf
                        <button type="submit"
                            class="rounded border bg-indigo-600 py-1 px-8 text-center font-medium text-white hover:bg-indigo-700">
                            Log out
                        </button>
                    </form>
                @else
                    <div class="flex items-center gap-1">
                        <a href="{{ route('register') }}"
                            class="font-medium text-gray-700 dark:text-gray-500 hover:bg-gray-500 hover:rounded hover:text-white py-1 px-7">Register</a>

                        <a href="{{ route('login') }}"
                            class="rounded border bg-indigo-600 py-1 px-8 text-center font-medium text-white hover:bg-indigo-700">Log
                            in</a>
                    </div>
                @endauth
            </div>
        </nav>
        {{ $slot }}
    </div>
</body>

</html>
