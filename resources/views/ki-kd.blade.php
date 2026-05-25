@extends('layouts.app')

@section('title', 'CP & TP - Capaian dan Tujuan Pembelajaran')

@section('content')
<div class="min-h-screen bg-slate-950 py-10">
    <div class="container max-w-6xl mx-auto px-4">
        <div class="rounded-3xl border border-slate-800 bg-slate-900/95 shadow-2xl overflow-hidden">
            <div class="p-8 border-b border-slate-800">
                <h2 class="text-3xl font-bold text-white"><i class="fas fa-book"></i> CP & TP Kurikulum Merdeka</h2>
                <p class="text-slate-400 mt-2">Capaian Pembelajaran dan Tujuan Pembelajaran Kurikulum Merdeka</p>
            </div>
            <div class="p-6">
                <ul class="nav nav-tabs border-b border-slate-800 mb-6" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active text-slate-100 bg-slate-900/90 border-slate-700" id="rpl-tab" data-bs-toggle="tab" data-bs-target="#rpl-content" type="button" role="tab" aria-controls="rpl-content" aria-selected="true">
                            <i class="fas fa-code me-2"></i> RPL - Hardware
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-slate-100 bg-slate-900/90 border-slate-700" id="multimedia-tab" data-bs-toggle="tab" data-bs-target="#multimedia-content" type="button" role="tab" aria-controls="multimedia-content" aria-selected="false">
                            <i class="fas fa-palette me-2"></i> Multimedia - Grafika
                        </button>
                    </li>
                </ul>

                <div class="tab-content">
                    @foreach($kiKdData as $jurusan => $data)
                        @php
                            $jurusanSlug = str_replace(' ', '-', strtolower($jurusan));
                        @endphp
                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ $jurusanSlug }}-content" role="tabpanel" aria-labelledby="{{ $jurusanSlug }}-tab">
                            <div class="grid gap-6">
                                <div class="rounded-3xl border border-slate-800 bg-slate-950/80 p-6">
                                    <h4 class="text-xl font-semibold text-white mb-4"><i class="fas fa-star"></i> Kompetensi Inti (KI)</h4>
                                    <div class="accordion kikd-accordion" id="accordion-ki-{{ $jurusanSlug }}">
                                        @foreach($data['kompetensi_inti'] as $ki => $deskripsi)
                                            @php
                                                $collapseId = 'collapse-ki-' . $jurusanSlug . '-' . $loop->index;
                                            @endphp
                                            <div class="accordion-item kikd-accordion-item rounded-3xl border border-slate-800 bg-slate-900/90 mb-4 overflow-hidden">
                                                <h2 class="accordion-header" id="heading-{{ $collapseId }}">
                                                    <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }} bg-slate-900/90 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $collapseId }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="{{ $collapseId }}">
                                                        <span class="ki-badge">{{ $ki }}</span>
                                                        <span class="ki-title">Kompetensi Inti {{ str_replace('KI ', '', $ki) }}</span>
                                                    </button>
                                                </h2>
                                                <div id="{{ $collapseId }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" data-bs-parent="#accordion-ki-{{ $jurusanSlug }}">
                                                    <div class="accordion-body rounded-b-3xl bg-slate-950/90 text-slate-300">
                                                        <p class="ki-text">{{ $deskripsi }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="rounded-3xl border border-slate-800 bg-slate-950/80 p-6">
                                    <h4 class="text-xl font-semibold text-white mb-4"><i class="fas fa-bullseye"></i> Kompetensi Dasar (KD)</h4>
                                    <div class="accordion kikd-accordion" id="accordion-kd-{{ $jurusanSlug }}">
                                        @foreach($data['kompetensi_dasar'] as $kd)
                                            @php
                                                $collapseId = 'collapse-kd-' . $jurusanSlug . '-' . $loop->index;
                                            @endphp
                                            <div class="accordion-item kikd-accordion-item rounded-3xl border border-slate-800 bg-slate-900/90 mb-4 overflow-hidden">
                                                <h2 class="accordion-header" id="heading-{{ $collapseId }}">
                                                    <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }} bg-slate-900/90 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $collapseId }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="{{ $collapseId }}">
                                                        <span class="kd-badge">{{ $kd['kode'] }}</span>
                                                        <span class="kd-title">{{ $kd['deskripsi'] }}</span>
                                                        @if($kd['slug'] && isset($userProgress[$kd['slug']]) && $userProgress[$kd['slug']])
                                                            <span class="progress-status progress-completed ms-auto">
                                                                <i class="fas fa-check-circle"></i> Selesai
                                                            </span>
                                                        @elseif($kd['slug'])
                                                            <span class="progress-status progress-pending ms-auto">
                                                                <i class="fas fa-circle"></i> Belum
                                                            </span>
                                                        @endif
                                                    </button>
                                                </h2>
                                                <div id="{{ $collapseId }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" data-bs-parent="#accordion-kd-{{ $jurusanSlug }}">
                                                    <div class="accordion-body rounded-b-3xl bg-slate-950/90 text-slate-300">
                                                        <p class="kd-description">{{ $kd['deskripsi'] }}</p>
                                                        <h6 class="kd-detail-title">Materi Pembelajaran:</h6>
                                                        <ul class="kd-detail-list list-disc pl-5 mt-2 text-slate-300">
                                                            @forelse($kd['detail'] as $detail)
                                                                <li>{{ $detail }}</li>
                                                            @empty
                                                                <li class="text-slate-500">Tidak ada detail materi</li>
                                                            @endforelse
                                                        </ul>
                                                        @if($kd['slug'])
                                                            <div class="mt-3">
                                                                @if(isset($userProgress[$kd['slug']]) && $userProgress[$kd['slug']])
                                                                    <span class="badge bg-emerald-500/15 text-emerald-200 border border-emerald-500/20">
                                                                        <i class="fas fa-check"></i> Sudah Ditandai Selesai
                                                                    </span>
                                                                @else
                                                                    <span class="badge bg-slate-700 text-slate-200 border border-slate-600/40">
                                                                        <i class="fas fa-clock"></i> Belum Ditandai Selesai
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="rounded-3xl border border-slate-800 bg-slate-950/80 p-6 mt-6">
                    <h5 class="text-lg font-semibold text-white mb-3"><i class="fas fa-info-circle"></i> Informasi Penting</h5>
                    <p class="text-slate-400">Halaman ini menampilkan Kompetensi Inti (KI) dan Kompetensi Dasar (KD) sesuai dengan Kurikulum Merdeka. Status progress diperbarui secara otomatis ketika Anda menyelesaikan pembelajaran materi terkait.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
