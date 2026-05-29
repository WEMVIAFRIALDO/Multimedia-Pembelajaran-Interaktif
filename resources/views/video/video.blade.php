@extends('layouts.app')

@section('title', 'Video: ' . $material->title)

@section('content')
<div class="min-h-screen py-10">
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-12">
                <div class="card mood-{{ session('user_mood', 'biasa') }} video-page-card bg-slate-900/80 border border-white/10 shadow-2xl">
                    <div class="card-header border-0 bg-transparent px-0 pb-0">
                        <h2 class="card-title text-white">
                            <i class="fas fa-video"></i> {{ $material->title }}
                        </h2>
                        <p class="card-subtitle text-slate-400">{{ $material->ringkasan }}</p>
                        <div class="breadcrumb-nav">
                            <a href="{{ route('video.index') }}" class="breadcrumb-link text-slate-200 hover:text-white">
                                <i class="fas fa-home"></i> Video
                            </a>
                            <span class="breadcrumb-separator">></span>
                            <a href="{{ route('video.jurusan', $kelas) }}" class="breadcrumb-link text-slate-200 hover:text-white">Kelas {{ $kelas }}</a>
                            <span class="breadcrumb-separator">></span>
                            <a href="{{ route('video.mataPelajaran', ['kelas' => $kelas, 'jurusan' => $jurusan]) }}" class="breadcrumb-link text-slate-200 hover:text-white">{{ $jurusan }}</a>
                            <span class="breadcrumb-separator">></span>
                            <span class="breadcrumb-current text-slate-400">{{ $material->mata_pelajaran }}</span>
                        </div>
                    </div>

                    <div class="card-body">
                        <!-- Video Player -->
                        <div class="video-container mb-4">
                            @if($material->video_url)
                                @php
                                    $videoId = '';
                                    if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $material->video_url, $matches)) {
                                        $videoId = $matches[1];
                                    }
                                @endphp

                                @if($videoId)
                                    <div class="ratio ratio-16x9 rounded-3xl overflow-hidden border border-white/10 shadow-lg">
                                        <iframe src="https://www.youtube.com/embed/{{ $videoId }}"
                                                title="{{ $material->title }}"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen>
                                        </iframe>
                                    </div>
                                @else
                                    <div class="alert alert-warning bg-slate-800 border border-white/10 text-slate-100">
                                        <i class="fas fa-exclamation-triangle"></i> URL video tidak valid atau tidak didukung.
                                    </div>
                                @endif
                            @else
                                <div class="alert alert-info bg-slate-800 border border-white/10 text-slate-100">
                                    <i class="fas fa-info-circle"></i> Video belum tersedia untuk materi ini.
                                </div>
                            @endif
                        </div>

                        <!-- Navigation -->
                        <div class="video-navigation mb-4">
                            <div class="d-flex justify-content-between">
                                @if($previousMaterial)
                                    <a href="{{ route('video.show', ['kelas' => $kelas, 'jurusan' => $jurusan, 'mataPelajaran' => $previousMaterial->mata_pelajaran, 'slug' => $previousMaterial->slug]) }}" class="btn btn-outline-secondary">
                                        <i class="fas fa-chevron-left"></i> Video Sebelumnya
                                    </a>
                                @else
                                    <div></div>
                                @endif

                                @if($nextMaterial)
                                    <a href="{{ route('video.show', ['kelas' => $kelas, 'jurusan' => $jurusan, 'mataPelajaran' => $nextMaterial->mata_pelajaran, 'slug' => $nextMaterial->slug]) }}" class="btn btn-primary">
                                        Video Selanjutnya <i class="fas fa-chevron-right"></i>
                                    </a>
                                @else
                                    <div></div>
                                @endif
                            </div>
                        </div>

                        <!-- Material Content removed per request (hide lengthy text under video) -->

                        <!-- Progress Button -->
                        @if(auth()->check())
                            <div class="progress-section mt-4">
                                <form method="POST" action="{{ route('progress.store') }}">
                                    @csrf
                                    <input type="hidden" name="materi_id" value="{{ $material->id }}">
                                    <input type="hidden" name="type" value="video">
                                    <button type="submit" class="btn btn-success btn-lg">
                                        <i class="fas fa-check"></i> Selesai Menonton Video
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection