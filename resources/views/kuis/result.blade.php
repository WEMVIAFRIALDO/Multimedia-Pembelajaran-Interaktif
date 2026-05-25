@extends('layouts.app')

@section('content')

@php
    $totalQuestions = count($kuis->pertanyaan);
    $percentage = ($score / $totalQuestions) * 100;
    
    if ($percentage === 100) {
        $achievement = 'Sempurna!';
        $message = 'Anda menjawab semua pertanyaan dengan benar. Luar biasa!';
        $icon = '🏆';
        $bgColor = 'from-yellow-400 to-yellow-600';
        $accentColor = 'text-yellow-300';
    } elseif ($percentage >= 80) {
        $achievement = 'Excellent!';
        $message = 'Hasil yang sangat baik! Terus pertahankan prestasi Anda.';
        $icon = '⭐';
        $bgColor = 'from-blue-400 to-blue-600';
        $accentColor = 'text-blue-300';
    } elseif ($percentage >= 60) {
        $achievement = 'Bagus!';
        $message = 'Anda sudah cukup baik! Ada beberapa topik yang perlu diperdalam.';
        $icon = '👍';
        $bgColor = 'from-green-400 to-green-600';
        $accentColor = 'text-green-300';
    } elseif ($percentage >= 40) {
        $achievement = 'Cukup';
        $message = 'Pertahankan semangat belajar! Pelajari kembali materi yang belum dipahami.';
        $icon = '📚';
        $bgColor = 'from-orange-400 to-orange-600';
        $accentColor = 'text-orange-300';
    } else {
        $achievement = 'Perlu Belajar Lebih';
        $message = 'Jangan berkecil hati! Pelajari ulang materi dan coba lagi.';
        $icon = '💪';
        $bgColor = 'from-red-400 to-red-600';
        $accentColor = 'text-red-300';
    }
@endphp

<div class="bg-slate-950 min-h-screen py-8 md:py-12">
    <div class="container max-w-4xl mx-auto px-4 md:px-8 text-slate-100">
        <div class="space-y-8 md:space-y-12">
            <div class="bg-slate-900/80 border border-white/10 rounded-3xl p-8 md:p-12 text-center shadow-2xl">
                <div class="text-7xl md:text-8xl mb-6 animate-bounce">{{ $icon }}</div>

                <h1 class="text-4xl md:text-5xl font-bold bg-gradient-to-r {{ $bgColor }} bg-clip-text text-transparent mb-4">
                    {{ $achievement }}
                </h1>

                <p class="text-lg text-slate-300 mb-8 max-w-2xl mx-auto">
                    {{ $message }}
                </p>

                <div class="bg-slate-950/60 border border-white/10 rounded-2xl p-8 mb-8">
                    <p class="text-slate-400 text-sm uppercase tracking-wider mb-4">Skor Anda</p>
                    <div class="flex items-end justify-center gap-2 mb-8">
                        <span class="text-6xl md:text-7xl font-black text-white">{{ $score }}</span>
                        <span class="text-4xl text-slate-400 mb-2">/</span>
                        <span class="text-4xl md:text-5xl font-bold text-slate-300">{{ $totalQuestions }}</span>
                    </div>

                    <div class="text-5xl md:text-6xl font-bold {{ $accentColor }} mb-6">
                        {{ number_format($percentage, 0) }}%
                    </div>

                    <div class="w-full bg-slate-800 rounded-full h-4 overflow-hidden mb-4">
                        <div class="bg-gradient-to-r {{ $bgColor }} h-full rounded-full transition-all duration-500" 
                             style="width: {{ $percentage }}%"></div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 mt-6">
                        <div class="bg-green-500/10 rounded-lg p-4 border border-green-500/30">
                            <p class="text-green-300 text-xs font-semibold uppercase mb-1">Benar</p>
                            <p class="text-2xl font-bold text-green-200">{{ $score }}</p>
                        </div>
                        <div class="bg-red-500/10 rounded-lg p-4 border border-red-500/30">
                            <p class="text-red-300 text-xs font-semibold uppercase mb-1">Salah</p>
                            <p class="text-2xl font-bold text-red-200">{{ $totalQuestions - $score }}</p>
                        </div>
                        <div class="bg-blue-500/10 rounded-lg p-4 border border-blue-500/30">
                            <p class="text-blue-300 text-xs font-semibold uppercase mb-1">Total</p>
                            <p class="text-2xl font-bold text-blue-200">{{ $totalQuestions }}</p>
                        </div>
                    </div>
                </div>

                <div class="text-center mb-8">
                    <h3 class="text-2xl font-bold text-white mb-2">{{ $kuis->judul }}</h3>
                    <p class="text-slate-300">
                        📚 Materi: <span class="text-slate-100">{{ $kuis->material->title ?? 'Tidak Ditemukan' }}</span>
                    </p>
                </div>
            </div>

            <div class="bg-slate-900/80 border border-white/10 rounded-3xl p-8 mb-8">
                <h3 class="text-2xl font-bold text-white mb-4">Ringkasan Jawaban</h3>
                <div class="space-y-4">
                    @foreach($answerDetails as $index => $detail)
                        <div class="rounded-3xl p-5 border transition-all duration-200 @if($detail['is_correct']) border-emerald-500/30 bg-emerald-500/10 @else border-rose-500/30 bg-rose-500/10 @endif">
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-sm text-slate-300 uppercase tracking-wide">Soal {{ $index + 1 }}</span>
                                <span class="text-sm font-semibold @if($detail['is_correct']) text-emerald-200 @else text-rose-200 @endif">
                                    {{ $detail['is_correct'] ? 'Benar' : 'Salah' }}
                                </span>
                            </div>
                            <p class="text-slate-100 font-semibold mb-3">{{ $detail['pertanyaan'] }}</p>
                            <div class="grid gap-3 sm:grid-cols-2">
                                <div class="rounded-2xl border border-slate-700 bg-slate-950/80 p-4">
                                    <p class="text-slate-400 text-xs uppercase tracking-wide mb-2">Jawabanmu</p>
                                    <p class="text-slate-100">{{ $detail['selected_label'] }}</p>
                                </div>
                                <div class="rounded-2xl border border-slate-700 bg-slate-950/80 p-4">
                                    <p class="text-slate-400 text-xs uppercase tracking-wide mb-2">Jawaban yang benar</p>
                                    <p class="text-slate-100">{{ $detail['correct_label'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-slate-900/80 backdrop-blur-lg border border-white/10 rounded-2xl p-6">
                    <h3 class="text-xl font-bold text-white mb-4">💡 Tips Perbaikan</h3>
                    <ul class="space-y-3 text-slate-300">
                        @if($percentage === 100)
                            <li class="flex items-start">
                                <span class="text-green-400 mr-3 font-bold">✓</span>
                                <span>Pertahankan konsistensi belajar Anda</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-green-400 mr-3 font-bold">✓</span>
                                <span>Coba soal yang lebih menantang</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-green-400 mr-3 font-bold">✓</span>
                                <span>Bantu teman yang masih belajar</span>
                            </li>
                        @elseif($percentage >= 80)
                            <li class="flex items-start">
                                <span class="text-blue-400 mr-3 font-bold">→</span>
                                <span>Fokus pada topik yang masih kurang</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-blue-400 mr-3 font-bold">→</span>
                                <span>Ulang materi yang belum dikuasai</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-blue-400 mr-3 font-bold">→</span>
                                <span>Coba soal tambahan untuk latihan</span>
                            </li>
                        @elseif($percentage >= 60)
                            <li class="flex items-start">
                                <span class="text-orange-400 mr-3 font-bold">→</span>
                                <span>Pelajari kembali materi secara menyeluruh</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-orange-400 mr-3 font-bold">→</span>
                                <span>Tonton video pembelajaran ulang</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-orange-400 mr-3 font-bold">→</span>
                                <span>Coba lagi setelah belajar</span>
                            </li>
                        @else
                            <li class="flex items-start">
                                <span class="text-red-400 mr-3 font-bold">!</span>
                                <span>Pelajari ulang seluruh materi dengan fokus</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-red-400 mr-3 font-bold">!</span>
                                <span>Tonton video pembelajaran dengan seksama</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-red-400 mr-3 font-bold">!</span>
                                <span>Minta bantuan guru atau teman</span>
                            </li>
                        @endif
                    </ul>
                </div>

                <div class="bg-slate-900/80 backdrop-blur-lg border border-white/10 rounded-2xl p-6">
                    <h3 class="text-xl font-bold text-white mb-4">🎯 Langkah Selanjutnya</h3>
                    <div class="space-y-3">
                        @if($percentage >= 80)
                            <a href="{{ route('kuis.index') }}" class="block px-4 py-3 bg-blue-500/20 border border-blue-500/50 rounded-lg text-blue-300 font-semibold hover:bg-blue-500/30 transition-all text-center">
                                🎁 Coba Kuis Lainnya
                            </a>
                        @else
                            <a href="{{ route('materi.index') }}" class="block px-4 py-3 bg-green-500/20 border border-green-500/50 rounded-lg text-green-300 font-semibold hover:bg-green-500/30 transition-all text-center">
                                📚 Pelajari Materi Lagi
                            </a>
                            <a href="{{ route('kuis.show', $kuis->id) }}" class="block px-4 py-3 bg-orange-500/20 border border-orange-500/50 rounded-lg text-orange-300 font-semibold hover:bg-orange-500/30 transition-all text-center">
                                🔄 Coba Kuis Ulang
                            </a>
                        @endif
                        <a href="{{ route('kuis.index') }}" class="block px-4 py-3 bg-slate-800 border border-slate-700 rounded-lg text-slate-300 font-semibold hover:bg-slate-700 transition-all text-center">
                            ← Daftar Kuis Lainnya
                        </a>
                    </div>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('dashboard') }}" class="px-8 py-4 rounded-xl border border-slate-700 text-slate-200 font-semibold hover:bg-slate-800 hover:border-slate-500 transition-all text-center">
                    ← Kembali ke Dashboard
                </a>
                <a href="{{ route('progress.index') }}" class="px-8 py-4 rounded-xl bg-gradient-to-r from-amber-400 to-amber-600 text-slate-900 font-bold hover:shadow-lg hover:shadow-amber-400/50 transition-all text-center">
                    📈 Lihat Progress Anda
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }

    .animate-bounce {
        animation: bounce 1s infinite;
    }
</style>

@endsection