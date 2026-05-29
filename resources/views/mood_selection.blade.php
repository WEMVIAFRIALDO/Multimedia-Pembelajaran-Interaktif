@extends('layouts.app')

@section('title', 'Pilih Mood Kamu Hari Ini')

@section('content')
<link rel="stylesheet" href="{{ asset('css/mood-selection.css') }}">
<div class="mood-page" role="main">
  <div class="mood-page__bg" aria-hidden="true"></div>

  <header class="mood-header glass-card bg-slate-900/40 border-slate-700/40 shadow-2xl p-8 md:p-10 text-center mb-8 mx-auto max-w-4xl">
    <p class="kicker text-blue-400 font-semibold tracking-wide">PILIH MOOD KAMU HARI INI</p>
    <h1 class="title text-4xl font-bold text-white mt-2">Pilih Mood Kamu Hari Ini</h1>
    <p class="subtitle text-gray-300 mt-3 max-w-2xl mx-auto">Pilih suasana belajar yang paling cocok untukmu hari ini. Setiap mood menghadirkan pengalaman pembelajaran adaptif dengan nuansa visual yang berbeda.</p>
  </header>

  <section class="mood-grid grid grid-cols-1 md:grid-cols-3 gap-8 justify-items-stretch items-center mt-8 px-4" aria-label="Pemilihan mood">
    
    <button class="mood-card mood-card--fokus relative rounded-2xl overflow-hidden transition-transform hover:scale-105" data-mood="fokus" data-bg="radial-gradient(circle at top, rgba(255,230,205,0.55), transparent 55%)" data-border="#f59e0b" data-text="#111827" aria-pressed="false">
      <div class="mood-card__art mood-card__art--fokus w-full">
        <img src="{{ asset('images/mood/fokus.png') }}" alt="Fokus mood illustration" class="mood-card__image w-full h-full object-cover" onerror="this.style.display='none'">
        <div class="art-glass-panel"></div>
        <div class="art-stack"></div>
        <div class="art-bulb"></div>
        <div class="art-glow"></div>
      </div>
      <div class="py-4 text-center bg-slate-900 border-t border-amber-500">
        <div class="mood-card__label text-xl font-bold text-white">Fokus</div>
      </div>
    </button>

    <button class="mood-card mood-card--santai relative rounded-2xl overflow-hidden transition-transform hover:scale-105" data-mood="santai" data-bg="radial-gradient(circle at top, rgba(219,234,254,0.55), transparent 55%)" data-border="#0ea5e9" data-text="#0f172a" aria-pressed="false">
      <div class="mood-card__art mood-card__art--santai w-full">
        <img src="{{ asset('images/mood/santai.png') }}" alt="Santai mood illustration" class="mood-card__image w-full h-full object-cover" onerror="this.style.display='none'">
        <div class="art-glass-panel"></div>
        <div class="art-pond"></div>
        <div class="art-stone art-stone--one"></div>
        <div class="art-stone art-stone--two"></div>
        <div class="art-stream"></div>
      </div>
      <div class="py-4 text-center bg-slate-900 border-t border-sky-500">
        <div class="mood-card__label text-xl font-bold text-white">Santai</div>
      </div>
    </button>

    <button class="mood-card mood-card--lelah relative rounded-2xl overflow-hidden transition-transform hover:scale-105" data-mood="lelah" data-bg="radial-gradient(circle at top, rgba(237,233,254,0.55), transparent 55%)" data-border="#8b5cf6" data-text="#111827" aria-pressed="false">
      <div class="mood-card__art mood-card__art--lelah w-full">
        <img src="{{ asset('images/mood/lelah.png') }}" alt="Lelah mood illustration" class="mood-card__image w-full h-full object-cover" onerror="this.style.display='none'">
        <div class="art-glass-panel"></div>
        <div class="art-sofa"></div>
        <div class="art-pillows"></div>
        <div class="art-zz">
          <span>Z</span><span>z</span>
        </div>
      </div>
      <div class="py-4 text-center bg-slate-900 border-t border-purple-500">
        <div class="mood-card__label text-xl font-bold text-white">Lelah</div>
      </div>
    </button>
  </section>

  <div class="mood-actions flex justify-center mt-8 pb-12">
    <button type="button" class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-full transition-colors" id="confirmMood">Pilih Mood</button>
  </div>

</div>

<script src="{{ asset('js/mood-selection.js') }}" defer></script>
@endsection