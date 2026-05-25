@extends('layouts.app')

@section('title', 'Video Pembelajaran')

@section('content')
<div class="min-h-screen py-8 md:py-12 bg-slate-950">
    <div class="container max-w-7xl mx-auto px-4 md:px-8">
        <!-- Header -->
        <div class="mb-8 md:mb-12">
            <p class="text-amber-400 text-sm font-semibold uppercase tracking-wide mb-2">📺 Pembelajaran Visual</p>
            <h1 class="text-3xl md:text-4xl font-bold text-slate-100 mb-4">Video Pembelajaran</h1>
            <p class="text-slate-300 text-lg max-w-2xl">Tonton video pembelajaran premium yang dirancang khusus untuk membantu Anda memahami materi dengan lebih baik.</p>
        </div>

        @if($kelas->count() > 0)
            <!-- Kelas Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
                @foreach($kelas as $item)
                    <a href="{{ route('video.jurusan', $item->kelas) }}" class="group cursor-pointer block">
                        <div class="relative h-full bg-slate-900/80 backdrop-blur-xl border border-white/10 rounded-[2rem] p-10 hover:border-amber-400/50 transition-all duration-300 group-hover:shadow-2xl group-hover:shadow-amber-400/20 overflow-hidden">
                            <!-- Background Accent -->
                            <div class="absolute top-0 right-0 w-32 h-32 bg-blue-400/10 rounded-full blur-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                            <div class="relative z-10">
                                <!-- Kelas Icon -->
                                <div class="text-5xl mb-4">🎬</div>

                                <!-- Kelas Title -->
                                <h3 class="text-2xl font-bold text-slate-100 mb-2 group-hover:text-amber-500 transition-colors duration-200">
                                    Kelas {{ $item->kelas }}
                                </h3>

                                <!-- Kelas Description -->
                                <p class="text-slate-300 mb-6">
                                    Pembelajaran video untuk kelas {{ $item->kelas }}
                                </p>

                                <!-- Separator -->
                                <div class="w-full h-px bg-gradient-to-r from-transparent via-white/20 to-transparent my-6"></div>

                                <!-- Stats -->
                                <div class="space-y-3 mb-6">
                                    <div class="flex items-center text-gray-300 text-sm">
                                        <span class="mr-2">📚</span>
                                        <span>Materi Lengkap Tersedia</span>
                                    </div>
                                    <div class="flex items-center text-gray-300 text-sm">
                                        <span class="mr-2">🎥</span>
                                        <span>Konten Video Premium</span>
                                    </div>
                                </div>

                                <!-- CTA Button -->
                                <button class="w-full px-6 py-3 bg-gradient-to-r from-blue-400 to-blue-600 text-white font-bold rounded-xl hover:shadow-lg hover:shadow-blue-400/50 transition-all duration-200 group-hover:scale-105">
                                    Lihat Video →
                                </button>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="flex flex-col items-center justify-center py-12 text-center">
                <div class="text-6xl mb-4">🎬</div>
                <h3 class="text-2xl font-bold text-slate-100 mb-2">Video Belum Tersedia</h3>
                <p class="text-slate-300 mb-6">Konten video pembelajaran akan segera ditambahkan. Silakan cek kembali nanti!</p>
                <a href="{{ route('dashboard') }}" class="px-6 py-3 bg-amber-400 text-slate-900 font-bold rounded-xl hover:shadow-lg transition-all">
                    ← Kembali ke Dashboard
                </a>
            </div>
        @endif
    </div>
</div>
@endsection