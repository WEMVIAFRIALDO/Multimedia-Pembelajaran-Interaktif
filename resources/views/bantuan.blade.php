@extends('layouts.app')

@section('title', 'Bantuan - Mood-Sync')

@section('content')
<div class="min-h-screen bg-slate-950 py-10">
    <div class="container max-w-4xl mx-auto px-4">
        <div class="rounded-[2rem] border border-slate-800 bg-slate-900/95 p-8 shadow-2xl">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between mb-10">
                <div>
                    <p class="text-slate-400 uppercase tracking-[0.24em] text-xs mb-3">Cara Menggunakan Web</p>
                    <h2 class="text-3xl font-bold text-white mb-3">Bantuan untuk Siswa SMK</h2>
                    <p class="text-slate-400">Gunakan Mood-Sync supaya belajar lebih mudah dan sesuai mood kamu.</p>
                </div>
                <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 rounded-2xl bg-amber-400 px-5 py-3 text-sm font-semibold text-slate-950 transition hover:bg-amber-300">
                    <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
                </a>
            </div>

            <div class="grid gap-4 md:grid-cols-3 mb-10">
                <div class="rounded-3xl border border-slate-800 bg-slate-950/80 p-6">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-500/15 text-blue-300 font-bold text-lg mb-4">1</div>
                    <h4 class="text-xl font-semibold text-white mb-3">Pilih Mood</h4>
                    <p class="text-slate-400 text-sm">Pilih mood kamu: Fokus, Santai, atau Capek. Materi akan otomatis menyesuaikan tampilan dan isi sesuai suasana hati kamu.</p>
                </div>
                <div class="rounded-3xl border border-slate-800 bg-slate-950/80 p-6">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-500/15 text-emerald-300 font-bold text-lg mb-4">2</div>
                    <h4 class="text-xl font-semibold text-white mb-3">Pelajari Materi Jurusan</h4>
                    <p class="text-slate-400 text-sm">Pilih materi sesuai jurusan kamu, lalu pelajari dengan tenang. Materi akan tersusun rapi supaya kamu tidak bingung.</p>
                </div>
                <div class="rounded-3xl border border-slate-800 bg-slate-950/80 p-6">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-amber-500/15 text-amber-300 font-bold text-lg mb-4">3</div>
                    <h4 class="text-xl font-semibold text-white mb-3">Evaluasi Mandiri</h4>
                    <p class="text-slate-400 text-sm">Kerjakan kuis sendiri untuk tahu sejauh mana kamu paham. Skor dan progress bisa dilihat di halaman Progress.</p>
                </div>
            </div>

            <div class="rounded-3xl border border-slate-800 bg-slate-950/80 p-6">
                <h5 class="text-xl font-semibold text-white mb-4">Keunggulan Sistem</h5>
                <p class="text-slate-400 mb-3">Kalau kamu lelah, materinya jadi singkat supaya kamu bisa tetap belajar tanpa merasa capek. Kalau kamu fokus, materinya jadi lengkap supaya kamu bisa memahami semua detail penting.</p>
                <p class="text-slate-400">Mood-Sync membuat belajar jadi lebih cocok untuk kamu, sesuai mood dan kebutuhan belajar sehari-hari.</p>
            </div>
        </div>
    </div>
</div>
@endsection
