<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scantech Academy - Kurset</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    
    <nav class="bg-white shadow-lg p-4 mb-10">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-600">Scantech Academy</h1>
            <div class="space-x-4">
                <a href="/" class="text-gray-600">Ballina</a>
                <a href="/courses" class="text-blue-600 font-semibold">Kurset</a>
            </div>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-3xl font-extrabold text-gray-800 mb-8">Katalogu i Kurseve</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($kurset as $kurs)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6">
                        <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Kurs</div>
                        <h3 class="block mt-1 text-lg leading-tight font-medium text-black">{{ $kurs->titulli }}</h3>
                        <p class="mt-2 text-gray-500 text-sm line-clamp-3">
                            {{ $kurs->pershkrimi }}
                        </p>
                        
                        <div class="mt-4 flex items-center justify-between">
                            <span class="text-2xl font-bold text-gray-900">${{ $kurs->cmimi }}</span>
                            <a href="/courses/{{ $kurs->id }}" class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700">
                                Shiko Detajet
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</body>
</html>