@extends('layouts.app')

@section('title', 'Pilih Mata Pelajaran - Video ' . $jurusan . ' Kelas ' . $kelas)

@section('content')
<div class="min-h-screen py-10">
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-12">
                <div class="card mood-{{ session('user_mood', 'biasa') }} video-page-card bg-slate-900/80 border border-white/10 shadow-2xl">
                    <div class="card-header border-0 bg-transparent px-0 pb-0">
                        <h2 class="card-title text-white">
                            <i class="fas fa-video"></i> Video Pembelajaran - {{ $jurusan }} Kelas {{ $kelas }}
                        </h2>
                        <p class="card-subtitle text-slate-400">Pilih mata pelajaran untuk menonton video</p>
                        <div class="breadcrumb-nav">
                            <a href="{{ route('video.index') }}" class="breadcrumb-link text-slate-200 hover:text-white">
                                <i class="fas fa-home"></i> Video
                            </a>
                            <span class="breadcrumb-separator">></span>
                            <a href="{{ route('video.jurusan', $kelas) }}" class="breadcrumb-link text-slate-200 hover:text-white">Kelas {{ $kelas }}</a>
                            <span class="breadcrumb-separator">></span>
                            <span class="breadcrumb-current text-slate-400">{{ $jurusan }}</span>
                        </div>
                    </div>

                    <div class="card-body px-0 pt-4">
                        <div class="row">
                            @forelse($videos as $video)
                            <div class="col-md-6 mb-4">
                                <div class="mata-pelajaran-card">
                                    <div class="mata-pelajaran-header mb-4">
                                        <h4>{{ $video->title }}</h4>
                                    </div>
                                    <div class="mata-pelajaran-body">
                                        <p>{{ $video->ringkasan }}</p>
                                        <p class="text-slate-400 mb-3">{{ $video->mata_pelajaran }} • {{ $video->jurusan }}</p>
                                        <a href="{{ route('video.show', ['kelas' => $kelas, 'jurusan' => $jurusan, 'mataPelajaran' => $video->mata_pelajaran, 'slug' => $video->slug]) }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-play"></i> Tonton Sekarang
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-12">
                                <div class="alert alert-info">Belum ada video untuk jurusan {{ $jurusan }} di kelas {{ $kelas }}.</div>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .mata-pelajaran-card {
        background: rgba(15, 23, 42, 0.9);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 1.75rem;
        padding: 1.5rem;
        transition: transform 0.25s ease, box-shadow 0.25s ease;
        min-height: 220px;
    }

    .mata-pelajaran-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 18px 40px rgba(15,23,42,0.3);
    }

    .mata-pelajaran-card h4 {
        color: #f8fafc;
    }

    .mata-pelajaran-card p {
        color: #cbd5e1;
    }

    .video-page-card .alert {
        background: rgba(15, 23, 42, 0.95);
        border-color: rgba(255,255,255,0.08);
        color: #e2e8f0;
    }
</style>
@endsection