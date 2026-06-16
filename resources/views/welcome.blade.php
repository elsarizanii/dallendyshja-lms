<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Scantech Academy</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.jsx'])
    </head>
    <body class="antialiased bg-gray-100 selection:bg-blue-500 selection:text-white">
        <div class="relative min-h-screen flex flex-col items-center justify-center">
            
            <div class="absolute top-0 right-0 p-6 text-right z-10">
                @if (Route::has('login'))
                    <div>
                        @auth
                            <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-blue-600 focus:outline focus:outline-2 focus:rounded-sm focus:outline-blue-500">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-blue-600 focus:outline focus:outline-2 focus:rounded-sm focus:outline-blue-500">Log in</a>
                            
                        @endauth
                    </div>
                @endif
            </div>

            <div class="max-w-7xl mx-auto p-6 lg:p-8 text-center">
                <div class="flex justify-center">
                    <h1 class="text-5xl font-bold text-blue-600">Scantech Academy</h1>
                </div>

                <div class="mt-8 text-xl text-gray-600">
                    Sistemi i Menaxhimit për Studentë dhe Administrim
                </div>

                <div class="mt-10">
                    @guest
                        <p class="text-sm text-gray-500">Ju lutem hyni në sistem për të vazhduar.</p>
                        <a href="{{ route('login') }}" class="mt-4 inline-block bg-blue-600 text-white px-8 py-3 rounded-md font-semibold hover:bg-blue-700 transition">
                            Hyr në Llogari
                        </a>
                    @else
                        <p class="text-sm text-gray-500">Mirë se erdhët përsëri, {{ Auth::user()->name }}!</p>
                        <a href="{{ url('/dashboard') }}" class="mt-4 inline-block bg-green-600 text-white px-8 py-3 rounded-md font-semibold hover:bg-green-700 transition">
                            Shko te Dashboard
                        </a>
                    @endguest
                </div>
            </div>

            <div class="absolute bottom-0 w-full p-6 text-center text-gray-400 text-sm">
                &copy; {{ date('Y') }} Scantech Academy LMS
            </div>
        </div>
    </body>
</html>