@extends('layouts.app')

@section('content')
<div class="min-h-screen py-8 md:py-12">
    <div class="container max-w-7xl mx-auto px-4 md:px-8">
        <!-- Header -->
        <div class="mb-8 md:mb-12 glass-card bg-slate-900/40 border-slate-700/40 shadow-2xl p-8 md:p-10">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                <div>
                    <p class="text-amber-400 text-sm font-semibold uppercase tracking-wide mb-2">📚 Pembelajaran</p>
                    <h1 class="text-3xl md:text-4xl font-bold text-slate-100">Pilih Materi Pembelajaran</h1>
                </div>
                <div class="mt-4 md:mt-0 px-4 py-2 bg-slate-800/70 border border-slate-600/60 rounded-xl shadow-sm">
                    <p class="text-blue-200 text-sm font-semibold">
                        😊 Mood Anda: <span class="text-white font-bold">{{ $selectedMood }}</span>
                    </p>
                </div>
            </div>
            <p class="text-slate-300 text-lg">Pilih kelas untuk melihat materi pembelajaran yang disesuaikan dengan mood Anda.</p>
        </div>

        <!-- Kelas Grid -->
        @if($kelas->count() > 0)
            @php $sortedKelas = $kelas->sortBy('kelas'); @endphp
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
                @foreach($sortedKelas as $k)
                    <a href="{{ route('materi.jurusan', $k->kelas) }}" class="group cursor-pointer block">
                        <div class="relative h-full bg-slate-900/80 backdrop-blur-sm border border-white/10 rounded-xl p-6 hover:border-green-400/50 transition-all duration-200 group-hover:shadow-lg group-hover:shadow-green-400/10 overflow-hidden">
                            <!-- Background Accent -->
                            <div class="absolute top-0 right-0 w-32 h-32 bg-green-400/10 rounded-full blur-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                            <div class="relative z-10 flex flex-col items-center text-center">
                                <!-- Icon -->
                                <div class="text-4xl mb-3">🎓</div>

                                <!-- Title -->
                                <h3 class="text-xl md:text-2xl font-bold text-slate-100 mb-2 group-hover:text-green-400 transition-colors duration-200">
                                    Kelas {{ $k->kelas }}
                                </h3>

                                <!-- Description -->
                                <p class="text-slate-300 mb-4">
                                    Materi pembelajaran untuk Kelas {{ $k->kelas }}
                                </p>

                                <!-- Separator -->
                                <div class="w-full h-px bg-gradient-to-r from-transparent via-white/20 to-transparent my-6"></div>

                                <!-- Stats/Info -->
                                <div class="space-y-2 mb-4 w-full text-left">
                                    <div class="flex items-center text-gray-300 text-sm">
                                        <span class="mr-3 text-green-400">✓</span>
                                        <span>Materi Lengkap</span>
                                    </div>
                                    <div class="flex items-center text-gray-300 text-sm">
                                        <span class="mr-3 text-green-400">✓</span>
                                        <span>Video Pembelajaran</span>
                                    </div>
                                    <div class="flex items-center text-gray-300 text-sm">
                                        <span class="mr-3 text-green-400">✓</span>
                                        <span>Evaluasi Interaktif</span>
                                    </div>
                                </div>

                                <!-- CTA Button -->
                                <button class="w-full px-5 py-2.5 bg-gradient-to-r from-green-400 to-green-600 text-slate-900 font-bold rounded-lg hover:shadow-md hover:shadow-green-400/30 transition-all duration-200 group-hover:scale-102">
                                    Lihat Materi →
                                </button>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="flex flex-col items-center justify-center py-12 text-center">
                <div class="text-6xl mb-4">📭</div>
                <h3 class="text-2xl font-bold text-slate-100 mb-2">Belum Ada Data Materi</h3>
                <p class="text-slate-300 mb-6">Data materi pembelajaran akan ditampilkan di sini segera.</p>
                <a href="{{ route('dashboard') }}" class="px-6 py-3 bg-amber-400 text-slate-900 font-bold rounded-xl hover:shadow-lg transition-all">
                    ← Kembali ke Dashboard
                </a>
            </div>
        @endif
    </div>
</div>
@endsection