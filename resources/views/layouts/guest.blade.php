<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Evoting Web - {{ $title }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="text-gray-900 antialiased">
        <nav class="flex items-center h-20 px-10 justify-between bg-gray-200">
            {{-- logo --}}
            <div>
                <a href="/welcome">
                    <x-application-logo class="w-32" />
                </a>
            </div>
            {{-- nav-link --}}
            <div class="flex gap-2 items-center">
                @auth
                    @can('isAdmin')
                        <a href="/admin/dashboard" class="hover:font-bold">Dashboard</a>
                    @endcan
                    @can('isWarga')
                        <a href="/dashboard" class="hover:font-bold">Dashboard</a>
                    @endcan
                    <form method="POST" action="/logout" class="ml-4">
                        @csrf
                        <button type="submit"
                            class="rounded border bg-indigo-600 py-1 px-8 text-center font-medium text-white hover:bg-indigo-700">
                            Log out
                        </button>
                    </form>
                @else
                    <div class="flex items-center gap-1">
                        <a href="/register"
                            class="font-medium text-gray-700 dark:text-gray-500 hover:bg-gray-500 hover:rounded hover:text-white py-1 px-7">Daftar</a>

                        <a href="/login"
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
