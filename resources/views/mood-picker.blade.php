<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Mood - Mood-Sync</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/mood-picker.css') }}">
</head>
<body>
    <main class="container" role="main">
        <header aria-labelledby="mood-title">
            <h1 id="mood-title">Pilih Mood Kamu Hari Ini</h1>
            <p class="lead">Pilih suasana belajar sesuai kondisi saat ini. Hover kartu untuk melihat preview latar halaman, lalu tekan Enter atau klik untuk memilih.</p>
        </header>

        <section class="mood-grid" role="list" aria-label="Pilihan mood">
            <button type="button" class="mood-card" data-mood="fokus" aria-labelledby="fokus-title" aria-describedby="fokus-desc">
                <span class="sr-only">Fokus - Deep Focus</span>
                <div class="mood-top" aria-hidden="true" style="background:linear-gradient(180deg,#EAF7F4 0%, #D1E8E2 100%)"></div>
                <div>
                    <span class="label">FOKUS</span>
                </div>
                <div>
                    <div id="fokus-title" class="title">Deep Focus</div>
                    <div id="fokus-desc" class="desc">Mendukung konsentrasi tinggi tanpa membuat mata cepat lelah saat membaca teks panjang.</div>
                </div>
            </button>

            <button type="button" class="mood-card" data-mood="santai" aria-labelledby="santai-title" aria-describedby="santai-desc">
                <span class="sr-only">Santai - Relaxed Mode</span>
                <div class="mood-top" aria-hidden="true" style="background:linear-gradient(180deg,#FFFDF5 0%, #FEFCE8 100%)"></div>
                <div>
                    <span class="label">SANTAI</span>
                </div>
                <div>
                    <div id="santai-title" class="title">Relaxed Mode</div>
                    <div id="santai-desc" class="desc">Suasana membaca rileks seperti buku fisik, nyaman untuk pemakaian lama.</div>
                </div>
            </button>

            <button type="button" class="mood-card" data-mood="lelah" aria-labelledby="lelah-title" aria-describedby="lelah-desc">
                <span class="sr-only">Lelah - Tired Mode</span>
                <div class="mood-top" aria-hidden="true" style="background:linear-gradient(180deg,#F7FDFF 0%, #F0F9FF 100%)"></div>
                <div>
                    <span class="label">LELAH</span>
                </div>
                <div>
                    <div id="lelah-title" class="title">Tired Mode</div>
                    <div id="lelah-desc" class="desc">Menurunkan kontras sedikit untuk menenangkan saraf dan mengurangi silau.</div>
                </div>
            </button>
        </section>
    </main>

    <div id="loading" class="overlay" style="display:none" aria-hidden="true">
        <div role="status" aria-live="polite">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="10" stroke="#CBD5E1" stroke-width="4" opacity="0.25"></circle><path d="M22 12a10 10 0 00-10-10" stroke="#0F766E" stroke-width="4" stroke-linecap="round"></path></svg>
            <div style="margin-top:8px;color:var(--text-main)">Menyiapkan mode Anda…</div>
        </div>
    </div>

    <script src="{{ asset('js/mood-picker.js') }}" defer></script>
</body>
</html>