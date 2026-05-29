@extends('layouts.app')

@section('content')

<!-- Particle Animation Background -->
<div class="particles-container">
    @for($i = 0; $i < 15; $i++)
        <div class="particle" style="left: {{ rand(0, 100) }}%; animation-delay: {{ rand(0, 8) }}s; animation-duration: {{ rand(8, 15) }}s;"></div>
    @endfor
</div>

<div class="min-h-screen py-10">
    <div class="container max-w-6xl mx-auto px-4">
        <div class="rounded-xl border border-white/10 bg-slate-900/80 p-4 shadow-md backdrop-blur-sm text-slate-100 mb-8">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start gap-4">
                <div>
                    <h1 class="h2 mb-2 text-white">📖 {{ $material->title }}</h1>
                    <p class="text-slate-300 mb-2">
                        Kelas {{ $material->kelas }} | {{ $material->jurusan }} | {{ $material->mata_pelajaran }}
                    </p>
                    @if($selectedMood === 'Fokus')
                        <span class="badge bg-primary mt-2">Tingkat Detail: Tinggi</span>
                    @elseif($selectedMood === 'Lelah')
                        <span class="badge bg-secondary mt-2">Tingkat Detail: Ringkasan</span>
                    @else
                        <span class="badge bg-info mt-2">Tingkat Detail: Normal</span>
                    @endif
                </div>
                <div class="text-end">
                    <span class="badge fs-6 px-3 py-2 rounded-pill mood-badge">
                        Mood: {{ $selectedMood }}
                    </span>
                </div>
            </div>
        </div>

        <div class="rounded-xl border border-white/10 bg-slate-900/80 p-4 shadow-md backdrop-blur-sm text-slate-100 mb-8">
            @php
                $userMood = strtolower(session('user_mood', 'biasa'));
            @endphp

            @if(session('user_mood') == 'fokus')
                <div class="bg-slate-800/90 p-4 mb-4 rounded-xl border-l-4 border-amber-300">
                    <strong class="text-white font-semibold">Mode Fokus:</strong> Menampilkan konten detail dan rumus teknis lengkap.
                </div>
            @elseif(session('user_mood') == 'lelah')
                <div class="bg-slate-800/90 p-4 mb-4 rounded-xl border-l-4 border-orange-300">
                    <strong class="text-white font-semibold">Mode Lelah:</strong> Menampilkan ringkasan inti dan poin penting saja.
                </div>
            @else
                <div class="bg-slate-800/90 p-4 mb-4 rounded-xl border-l-4 border-sky-300">
                    <strong class="text-white font-semibold">Mode Standar:</strong> Menampilkan konten pembelajaran normal.
                </div>
            @endif

            <div class="text-slate-100 leading-relaxed" style="line-height: 1.8;">
                {!! $content !!}
            </div>
        </div>

        @if($userMood !== 'lelah')
            <div class="rounded-xl border border-white/10 bg-slate-900/80 p-4 shadow-md backdrop-blur-sm text-slate-100 mb-8">
                <h5 class="text-slate-100 mb-3">💡 Ringkasan</h5>
                <p class="text-slate-200 mb-0 leading-relaxed">
                    {!! $material->ringkasan !!}
                </p>
            </div>
        @endif

        <div class="rounded-xl border border-white/10 bg-slate-900/80 p-4 shadow-md backdrop-blur-sm text-slate-100">
            <div class="d-flex flex-column flex-md-row gap-3">
                <form action="{{ route('materi.completed', $material->id) }}" method="POST" style="flex: 1;">
                    @csrf
                    <button type="submit" class="btn btn-success btn-lg w-100 py-3 rounded-xl font-bold transition-all duration-300 hover:transform hover:scale-105" style="background: linear-gradient(135deg, var(--relax-accent), var(--relax-secondary)); border: none;">
                        ✓ Selesai Membaca
                    </button>
                </form>
                <a href="javascript:history.back()" class="btn btn-outline-secondary btn-lg py-3 px-4 rounded-xl font-bold transition-all duration-300 hover:transform hover:scale-105" style="border-color: rgba(148, 163, 184, 0.3); color: #f8fafc;">
                    ← Kembali
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    h3, h4, h5, h6 {
        margin-top: 1.1rem;
        margin-bottom: 0.6rem;
        color: #e2e8f0;
        font-weight: 600;
    }

    h3:first-child {
        margin-top: 0;
    }

    ul, ol {
        margin-left: 1.5rem;
        margin-bottom: 1rem;
    }

    li {
        margin-bottom: 0.5rem;
    }

    pre {
        background: #0f172a;
        padding: 0.8rem;
        border-radius: 8px;
        overflow-x: auto;
        border-left: 4px solid #38bdf8;
        color: #e2e8f0;
    }

    /* strong used in headings/badges: use white for better contrast */
    strong {
        color: #f8fafc;
        font-weight: 700;
    }

    @if($selectedMood === 'Lelah')
        body {
            font-size: 1.02rem;
        }
        
        p {
            margin-bottom: 1rem;
        }
    @endif

    /* Page-specific title sizing */
    .material-title { font-size: clamp(1.25rem, 2.2vw, 1.6rem); }
    .small-title { font-size: clamp(1.15rem, 2vw, 1.4rem); }
</style>

@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const msg = `{{ session('success') }}`;
            const popup = document.createElement('div');
            popup.className = 'transient-session-success';
            popup.setAttribute('role', 'status');
            popup.style.position = 'fixed';
            popup.style.left = '50%';
            popup.style.top = '50%';
            popup.style.transform = 'translate(-50%, -50%)';
            popup.style.zIndex = 1060;
            popup.style.background = 'linear-gradient(180deg, rgba(16,185,129,0.15), rgba(16,185,129,0.08))';
            popup.style.color = '#e6f9ef';
            popup.style.padding = '1rem 1.25rem';
            popup.style.borderRadius = '10px';
            popup.style.border = '1px solid rgba(34,197,94,0.15)';
            popup.style.boxShadow = '0 8px 26px rgba(2,6,23,0.6)';
            popup.style.minWidth = '260px';
            popup.style.textAlign = 'center';
            popup.style.fontWeight = '600';
            popup.innerText = msg;
            document.body.appendChild(popup);

            setTimeout(function() {
                try { popup.remove(); } catch (err) { /* ignore */ }
            }, 2000);
        });
    </script>
@endif

<script>
// Initialize mood on page load
document.addEventListener('DOMContentLoaded', function() {
    const currentMood = '{{ session('user_mood') }}' || 'fokus';
    const moodClass = `mood-${currentMood.toLowerCase()}`;
    document.body.classList.add(moodClass);

    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 50
        });
    }
});
</script>

<!-- Confirmation Modal for "Selesai Membaca" -->
<div id="confirm-complete-modal" class="confirm-modal" style="display:none; position:fixed; inset:0; background:rgba(2,6,23,0.6); z-index:1050; align-items:center; justify-content:center;">
    <div class="confirm-modal-card" style="background:linear-gradient(180deg,#0b1220,#0f172a); padding:1.25rem; border-radius:12px; width: min(720px, 92%); box-shadow:0 8px 30px rgba(2,6,23,0.6); border:1px solid rgba(148,163,184,0.06); color:#e6eef8;">
        <h3 style="margin:0 0 .5rem;">Apakah Anda sudah selesai membaca?</h3>
        <p style="margin:0 0 1rem; color:#cbd5e1;">Klik <strong>Ya</strong> untuk menandai materi selesai atau <strong>Batal</strong> untuk kembali.</p>
        <div style="display:flex; gap:.75rem; justify-content:flex-end;">
            <button id="confirm-cancel-btn" class="btn btn-outline-secondary" style="padding:.5rem .9rem; border-radius:10px;">Batal</button>
            <button id="confirm-yes-btn" class="btn btn-success" style="padding:.5rem 1.1rem; border-radius:10px; background: linear-gradient(135deg, var(--relax-accent), var(--relax-secondary)); border:none;">Ya</button>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form[action*="materi.completed"]');
    if (!form) return;

    const modal = document.getElementById('confirm-complete-modal');
    const btnCancel = document.getElementById('confirm-cancel-btn');
    const btnYes = document.getElementById('confirm-yes-btn');

    // intercept submit
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    });

    // cancel
    btnCancel.addEventListener('click', function() {
        modal.style.display = 'none';
        document.body.style.overflow = '';
    });

    // yes -> show a centered transient popup for 2s then submit
    btnYes.addEventListener('click', function() {
        // create centered transient popup
        const popup = document.createElement('div');
        popup.className = 'transient-complete-popup';
        popup.setAttribute('role', 'status');
        popup.style.position = 'fixed';
        popup.style.left = '50%';
        popup.style.top = '50%';
        popup.style.transform = 'translate(-50%, -50%)';
        popup.style.zIndex = 1060;
        popup.style.background = 'linear-gradient(180deg, rgba(16,185,129,0.15), rgba(16,185,129,0.08))';
        popup.style.color = '#e6f9ef';
        popup.style.padding = '1rem 1.25rem';
        popup.style.borderRadius = '10px';
        popup.style.border = '1px solid rgba(34,197,94,0.15)';
        popup.style.boxShadow = '0 8px 26px rgba(2,6,23,0.6)';
        popup.style.minWidth = '260px';
        popup.style.textAlign = 'center';
        popup.style.fontWeight = '600';
        popup.innerText = 'Selamat — Anda menyelesaikan satu materi.';
        document.body.appendChild(popup);

        // close modal and restore scroll
        modal.style.display = 'none';
        document.body.style.overflow = '';

        // wait 2 seconds, remove popup, then submit
        setTimeout(function() {
            try { popup.remove(); } catch (err) { /* ignore */ }
            try { form.submit(); } catch (err) { console.error(err); }
        }, 2000);
    });
});
</script>

@endsection