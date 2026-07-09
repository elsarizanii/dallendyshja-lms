@extends('layouts.app')

@section('title', 'Katalogu i Kurseve')
@section('breadcrumb', 'Kurset')

@section('content')
    <div class="mb-8">
        <h2 class="text-3xl font-extrabold text-gray-800">Katalogu i Kurseve</h2>
        <p class="text-sm text-zinc-500 mt-1">Menaxhoni dhe shikoni të gjitha kurset e regjistruara në akademi.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($kurset as $kurs)
            <div class="bg-white rounded-xl shadow-sm border border-zinc-200 overflow-hidden hover:shadow-md transition-shadow duration-300">
                <div class="p-6">
                    <div class="uppercase tracking-wide text-xs text-indigo-500 font-bold mb-1">Kurs</div>
                    <h3 class="text-lg font-semibold text-zinc-900 leading-snug">{{ $kurs->titulli }}</h3>
                    
                    <p class="mt-2 text-zinc-500 text-sm line-clamp-3">
                        {{ $kurs->pershkrimi }}
                    </p>
                    
                    <div class="mt-6 flex items-center justify-between pt-4 border-t border-zinc-100">
                        <span class="text-xl font-bold text-zinc-900">${{ $kurs->cmimi }}</span>
                        <a href="/courses/{{ $kurs->id }}" class="px-4 py-2 bg-blue-600 text-white text-xs font-medium rounded-lg hover:bg-blue-700 transition-colors shadow-sm shadow-blue-500/10">
                            Shiko Detajet
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection