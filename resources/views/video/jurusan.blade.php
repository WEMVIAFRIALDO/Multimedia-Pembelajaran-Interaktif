@extends('layouts.app')

@section('title', 'Pilih Jurusan - Video Kelas ' . $kelas)

@section('content')
<div class="min-h-screen py-10">
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-12">
                <div class="card mood-{{ session('user_mood', 'biasa') }} video-page-card bg-slate-900/80 border border-white/10 shadow-2xl">
                    <div class="card-header border-0 bg-transparent px-0 pb-0">
                        <h2 class="card-title text-white">
                            <i class="fas fa-video"></i> Video Pembelajaran - Kelas {{ $kelas }}
                        </h2>
                        <p class="card-subtitle text-slate-400">Pilih jurusan untuk melanjutkan</p>
                        <div class="breadcrumb-nav">
                            <a href="{{ route('video.index') }}" class="breadcrumb-link text-slate-200 hover:text-white">
                                <i class="fas fa-home"></i> Video
                            </a>
                            <span class="breadcrumb-separator">></span>
                            <span class="breadcrumb-current text-slate-400">Kelas {{ $kelas }}</span>
                        </div>
                    </div>

                    <div class="card-body px-0 pt-4">
                        <div class="row">
                            @forelse($jurusans as $item)
                            <div class="col-md-6 mb-4">
                                <div class="jurusan-card">
                                            @php
                                                $slug = \Illuminate\Support\Str::slug($item->jurusan);
                                                $imgPath = public_path('images/jurusan/' . $slug . '.png');
                                                $hasImage = file_exists($imgPath);
                                            @endphp

                                            <div class="jurusan-header mb-3">
                                                @if($hasImage)
                                                    <img src="{{ asset('images/jurusan/' . $slug . '.png') }}" alt="{{ $item->jurusan }}" class="jurusan-image">
                                                @endif
                                                <h3>{{ $item->jurusan }}</h3>
                                            </div>

                                            <div class="jurusan-body">
                                                <p>Video pembelajaran {{ $item->jurusan }} kelas {{ $kelas }}</p>
                                                <a href="{{ route('video.mataPelajaran', ['kelas' => $kelas, 'jurusan' => $item->jurusan]) }}" class="btn btn-primary">
                                                    <i class="fas fa-arrow-right"></i> Pilih Jurusan
                                                </a>
                                            </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-12">
                                <div class="alert alert-info">Belum ada jurusan RPL atau Multimedia untuk kelas {{ $kelas }}.</div>
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
    .jurusan-card {
        background: rgba(15, 23, 42, 0.9);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 1.75rem;
        padding: 1.5rem;
        transition: transform 0.25s ease, box-shadow 0.25s ease;
        min-height: 220px;
    }

    .jurusan-image {
        width: 100%;
        max-height: 120px;
        object-fit: cover;
        border-radius: 0.5rem;
        display: block;
        margin-bottom: 0.6rem;
        border: 1px solid rgba(255,255,255,0.04);
    }

    .jurusan-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 18px 40px rgba(15,23,42,0.3);
    }

    .jurusan-card h3 {
        color: #f8fafc;
    }

    .jurusan-card p {
        color: #cbd5e1;
    }

    .video-page-card .alert {
        background: rgba(15, 23, 42, 0.95);
        border-color: rgba(255,255,255,0.08);
        color: #e2e8f0;
    }
</style>
@endsection