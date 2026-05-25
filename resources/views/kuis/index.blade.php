@extends('layouts.app')

@section('content')
<div class="min-h-screen py-8 md:py-12 bg-slate-950">
    <div class="container max-w-7xl mx-auto px-4 md:px-8">
        <!-- Header -->
        <div class="mb-8 md:mb-12">
            <p class="text-amber-400 text-sm font-semibold uppercase tracking-wide mb-2">Uji Kemampuan</p>
            <h1 class="text-3xl md:text-4xl font-bold text-slate-100 mb-4">Daftar Evaluasi</h1>
            <p class="text-slate-300 text-lg max-w-2xl">Pilih kuis yang ingin Anda ikuti untuk menguji pemahaman materi pembelajaran.</p>
        </div>

        @if($kuis->count() > 0)
            <!-- Kuis Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
                @foreach($kuis as $k)
                    <article class="group cursor-pointer">
                        <a href="{{ route('kuis.show', $k->id) }}" class="block h-full">
                            <div class="relative h-full bg-slate-900/80 backdrop-blur-xl border border-white/10 rounded-[2rem] p-10 hover:border-amber-400/50 transition-all duration-300 group-hover:shadow-2xl group-hover:shadow-amber-400/20 overflow-hidden">
                                <!-- Background Accent -->
                                <div class="absolute top-0 right-0 w-32 h-32 bg-amber-400/10 rounded-full blur-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                                <div class="relative z-10">
                                    <!-- Kategori Badge -->
                                    <div class="inline-block mb-4">
                                        <span class="px-3 py-1 bg-amber-400/20 text-amber-300 rounded-full text-xs font-bold uppercase tracking-wider">
                                            ❓ Evaluasi
                                        </span>
                                    </div>

                                    <!-- Judul Kuis -->
                                    <h3 class="text-2xl font-bold text-slate-100 mb-2 group-hover:text-amber-500 transition-colors duration-200 line-clamp-2">
                                        {{ $k->judul }}
                                    </h3>

                                    <!-- Materi -->
                                    <p class="text-sm text-slate-300 mb-4">
                                        <span class="inline-block mr-2">📚</span>
                                        {{ $k->material->title ?? 'Materi Tidak Ditemukan' }}
                                    </p>

                                    <!-- Separator -->
                                    <div class="w-full h-px bg-gradient-to-r from-transparent via-white/20 to-transparent my-4"></div>

                                    <!-- Info Cards -->
                                    <div class="grid grid-cols-2 gap-3 mb-6">
                                        <!-- Jumlah Soal -->
                                        <div class="bg-blue-500/10 rounded-lg p-3 border border-blue-500/30">
                                            <p class="text-blue-300 text-xs font-semibold uppercase tracking-wide">Soal</p>
                                            <p class="text-2xl font-bold text-blue-200">{{ count($k->pertanyaan ?? []) }}</p>
                                        </div>

                                        <!-- Tingkat Kesulitan -->
                                        <div class="bg-orange-500/10 rounded-lg p-3 border border-orange-500/30">
                                            <p class="text-orange-300 text-xs font-semibold uppercase tracking-wide">Kesulitan</p>
                                            <p class="text-lg font-bold text-orange-200">{{ $k->kesulitan ?? 'Sedang' }}</p>
                                        </div>
                                    </div>

                                    <!-- CTA Button -->
                                    <button class="w-full px-6 py-3 bg-gradient-to-r from-amber-400 to-amber-600 text-slate-900 font-bold rounded-xl hover:shadow-lg hover:shadow-amber-400/50 transition-all duration-200 group-hover:scale-105">
                                        Mulai Kuis →
                                    </button>
                                </div>
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="flex flex-col items-center justify-center py-12 text-center">
                <div class="text-6xl mb-4">📋</div>
                <h3 class="text-2xl font-bold text-slate-100 mb-2">Belum Ada Evaluasi</h3>
                <p class="text-slate-300 mb-6">Kuis akan ditambahkan segera. Coba kembali nanti!</p>
                <a href="{{ route('dashboard') }}" class="px-6 py-3 bg-amber-400 text-slate-900 font-bold rounded-xl hover:shadow-lg transition-all">
                    ← Kembali ke Dashboard
                </a>
            </div>
        @endif
    </div>
</div>
@endsection