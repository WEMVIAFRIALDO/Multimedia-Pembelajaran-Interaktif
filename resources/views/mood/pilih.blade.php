@extends('layouts.app')

@section('content')
<div class="mood-picker-page min-h-screen flex items-center justify-center py-12">
    <div class="mood-picker-shell mx-auto w-full max-w-7xl px-4">
        <div class="mood-picker-header text-center mb-12">
            <p class="text-sm uppercase tracking-[0.28em] text-slate-400 mb-4">Pilih Mood Kamu Hari Ini</p>
            <h1 class="text-4xl md:text-5xl font-semibold text-slate-100 mb-4">Pilih Mood Kamu Hari Ini</h1>
            <p class="mx-auto max-w-2xl text-slate-300 text-base md:text-lg leading-8">Pilih suasana belajar yang paling cocok untukmu hari ini. Setiap mood akan menghadirkan pengalaman pembelajaran adaptif dengan nuansa visual yang berbeda.</p>
        </div>

        <form action="{{ route('mood.set') }}" method="POST" class="grid gap-6 md:grid-cols-3">
            @csrf

            <label class="mood-card" for="mood-fokus">
                <input type="radio" id="mood-fokus" name="mood" value="fokus" class="mood-radio" required>
                <div class="mood-scene focus-scene">
                    <div class="focus-platform"></div>
                    <div class="focus-books">
                        <span class="book book-1"></span>
                        <span class="book book-2"></span>
                        <span class="book book-3"></span>
                    </div>
                    <div class="focus-lamp"></div>
                    <div class="focus-glow"></div>
                </div>
                <div class="mood-info">
                    <h2 class="mood-title">Fokus</h2>
                </div>
            </label>

            <label class="mood-card" for="mood-santai">
                <input type="radio" id="mood-santai" name="mood" value="santai" class="mood-radio" required>
                <div class="mood-scene relax-scene">
                    <div class="relax-pond"></div>
                    <div class="relax-lilypads">
                        <span class="pad pad-1"></span>
                        <span class="pad pad-2"></span>
                    </div>
                    <div class="relax-plants">
                        <span class="leaf leaf-1"></span>
                        <span class="leaf leaf-2"></span>
                        <span class="leaf leaf-3"></span>
                    </div>
                    <div class="relax-cup">
                        <span class="steam steam-1"></span>
                        <span class="steam steam-2"></span>
                    </div>
                    <div class="relax-glow"></div>
                </div>
                <div class="mood-info">
                    <h2 class="mood-title">Santai</h2>
                </div>
            </label>

            <label class="mood-card" for="mood-lelah">
                <input type="radio" id="mood-lelah" name="mood" value="lelah" class="mood-radio" required>
                <div class="mood-scene tired-scene">
                    <div class="tired-bed"></div>
                    <div class="tired-pillow"></div>
                    <div class="tired-headboard"></div>
                    <div class="tired-cloud">
                        <span class="tired-cloud-bubble"></span>
                        <span class="tired-star"></span>
                        <span class="tired-zzz"></span>
                    </div>
                </div>
                <div class="mood-info">
                    <h2 class="mood-title">Lelah</h2>
                </div>
            </label>

            <div class="md:col-span-3 text-center mt-2">
                <button type="submit" class="submit-mood-button">Pilih Mood</button>
            </div>
        </form>
    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@700;800&display=swap');

    .mood-picker-page {
        min-height: 100vh;
        padding: 4rem 1.25rem 5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #0f172a;
        position: relative;
    }

    .mood-picker-shell {
        position: relative;
        width: 100%;
        max-width: 1180px;
        margin: 0 auto;
        padding: 0 0 2rem;
    }

    .mood-picker-shell::before {
        content: '';
        position: absolute;
        inset: 0;
        pointer-events: none;
        background:
            radial-gradient(circle at 12% 18%, rgba(14, 165, 233, 0.16), transparent 18%),
            radial-gradient(circle at 90% 16%, rgba(245, 158, 11, 0.12), transparent 16%),
            radial-gradient(circle at 50% 92%, rgba(168, 85, 247, 0.14), transparent 24%);
        filter: blur(40px);
    }

    .mood-picker-shell > * {
        position: relative;
        z-index: 1;
    }

    .mood-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 28px;
    }

    .mood-card {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        min-height: 360px;
        padding: 1.75rem;
        border-radius: 32px;
        background: rgba(15, 23, 42, 0.92);
        border: 1px solid rgba(148, 163, 184, 0.12);
        box-shadow: 0 24px 64px rgba(0, 0, 0, 0.28);
        cursor: pointer;
        transition: transform 0.28s ease, box-shadow 0.28s ease, border-color 0.28s ease, background 0.28s ease;
        overflow: hidden;
    }

    .mood-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 50% 0%, rgba(255, 255, 255, 0.85), transparent 42%);
        pointer-events: none;
    }

    .mood-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 34px 96px rgba(15, 23, 42, 0.14);
    }

    .mood-card:hover .mood-scene {
        transform: translateY(-6px);
        box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.75), 0 24px 48px rgba(15, 23, 42, 0.08);
    }

    .mood-radio {
        display: none;
    }

    .mood-radio:checked + .mood-scene + .mood-info {
        transform: translateY(-4px);
    }

    .mood-radio:checked + .mood-scene + .mood-info .mood-title,
    .mood-card:hover .mood-title {
        color: #f8fafc;
    }

    .mood-scene {
        position: relative;
        width: 100%;
        height: 230px;
        margin-bottom: 1.8rem;
        border-radius: 28px;
        background: rgba(15, 23, 42, 0.9);
        border: 1px solid rgba(255, 255, 255, 0.08);
        box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.06), 0 8px 30px rgba(15, 23, 42, 0.16);
        overflow: hidden;
        transition: transform 0.28s ease, box-shadow 0.28s ease;
    }

    .mood-scene::after {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at top, rgba(255,255,255,0.18), transparent 28%);
        opacity: 0.6;
        pointer-events: none;
    }

    .focus-scene {
        background: radial-gradient(circle at 30% 20%, rgba(255, 201, 82, 0.26), transparent 30%),
                    linear-gradient(180deg, rgba(255,255,255,0.12), rgba(28, 28, 52, 0.7));
    }

    .relax-scene {
        background: radial-gradient(circle at 50% 22%, rgba(167, 248, 253, 0.26), transparent 26%),
                    linear-gradient(180deg, rgba(240, 255, 251, 0.12), rgba(30, 67, 61, 0.72));
    }

    .tired-scene {
        background: radial-gradient(circle at 70% 18%, rgba(253, 224, 187, 0.24), transparent 24%),
                    linear-gradient(180deg, rgba(255,255,255,0.08), rgba(52, 33, 45, 0.72));
    }

    .focus-platform,
    .relax-pond,
    .tired-bed {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        width: 72%;
        height: 36%;
        border-radius: 24px;
        box-shadow: 0 24px 60px rgba(0,0,0,0.22);
    }

    .focus-platform {
        bottom: 22px;
        background: linear-gradient(180deg, #fff1d4, #c68d2b);
    }

    .focus-books {
        position: absolute;
        left: 50%;
        bottom: 38px;
        transform: translateX(-50%) rotateX(12deg);
        width: 58%;
        height: 130px;
    }

    .book {
        position: absolute;
        left: 50%;
        width: 100%;
        height: 24px;
        border-radius: 18px;
        transform-origin: center;
        box-shadow: 0 10px 25px rgba(0,0,0,0.18);
    }

    .book::before {
        content: '';
        position: absolute;
        inset: 6px 14px 6px 14px;
        border-radius: 12px;
        background: rgba(255,255,255,0.18);
    }

    .book-1 {
        top: 0;
        transform: translateX(-50%) translateZ(18px);
        background: linear-gradient(135deg, #f7d580, #b17b20);
    }

    .book-2 {
        top: 24px;
        transform: translateX(-50%) translateZ(8px);
        background: linear-gradient(135deg, #f2c460, #9f6a1f);
    }

    .book-3 {
        top: 48px;
        transform: translateX(-50%);
        background: linear-gradient(135deg, #f0d38d, #b66b25);
    }

    .focus-lamp {
        position: absolute;
        top: 18px;
        right: 18px;
        width: 30px;
        height: 42px;
        border-radius: 18px 18px 8px 8px;
        background: linear-gradient(180deg, #fde68a, #f59e0b);
        box-shadow: 0 0 22px rgba(251, 191, 36, 0.38);
    }

    .focus-lamp::before {
        content: '';
        position: absolute;
        top: 8px;
        left: 50%;
        transform: translateX(-50%);
        width: 10px;
        height: 20px;
        background: rgba(255,255,255,0.88);
        border-radius: 999px;
    }

    .focus-lamp::after {
        content: '';
        position: absolute;
        top: 4px;
        left: 50%;
        transform: translateX(-50%);
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background: rgba(255,255,255,0.26);
        box-shadow: 0 0 18px rgba(251, 191, 36, 0.45);
    }

    .focus-glow {
        position: absolute;
        inset: 16px;
        border-radius: 28px;
        background: radial-gradient(circle at 50% 20%, rgba(255,255,255,0.18), transparent 45%);
        pointer-events: none;
    }

    .relax-pond {
        bottom: 26px;
        width: 72%;
        background: radial-gradient(circle at 35% 35%, rgba(206, 255, 248, 0.95), rgba(10, 94, 92, 0.9));
    }

    .relax-lilypads {
        position: absolute;
        bottom: 58px;
        left: 50%;
        transform: translateX(-50%);
        width: 56%;
        height: 36px;
    }

    .pad {
        position: absolute;
        width: 36px;
        height: 18px;
        border-radius: 999px 999px 50% 50%;
        background: linear-gradient(180deg, #9ee7d8, #059669);
        box-shadow: 0 10px 18px rgba(0,0,0,0.14);
    }

    .pad-1 { left: 18%; top: 0; transform: rotate(-10deg); }
    .pad-2 { right: 18%; top: 4px; transform: rotate(8deg); }

    .relax-plants {
        position: absolute;
        bottom: 48px;
        left: 50%;
        transform: translateX(-50%) rotateX(12deg);
        width: 62%;
        height: 82px;
    }

    .leaf {
        position: absolute;
        width: 14px;
        height: 46px;
        border-radius: 18px 18px 0 0;
        background: linear-gradient(180deg, #a7f3d0, #0f766e);
        box-shadow: 0 12px 18px rgba(6, 47, 46, 0.28);
    }

    .leaf-1 { left: 22%; bottom: 0; transform: rotate(-14deg); }
    .leaf-2 { left: 44%; bottom: 8px; transform: rotate(8deg); }
    .leaf-3 { left: 66%; bottom: 0; transform: rotate(-22deg); }

    .relax-cup {
        position: absolute;
        bottom: 30px;
        right: 20px;
        width: 46px;
        height: 44px;
        border-radius: 16px 16px 18px 18px;
        background: linear-gradient(180deg, #f1faf8, #d9f7ef);
        box-shadow: inset 0 4px 8px rgba(255,255,255,0.65), 0 12px 24px rgba(0,0,0,0.18);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .relax-cup::before {
        content: '';
        position: absolute;
        top: -8px;
        left: 8px;
        width: 24px;
        height: 10px;
        border-radius: 10px 10px 0 0;
        background: #f8fcfb;
    }

    .steam {
        position: absolute;
        width: 6px;
        height: 18px;
        border-radius: 999px;
        background: rgba(255,255,255,0.84);
        filter: blur(0.5px);
    }

    .steam-1 { left: 20px; top: 6px; transform: rotate(-8deg); }
    .steam-2 { left: 28px; top: 10px; transform: rotate(6deg); }

    .relax-glow {
        position: absolute;
        inset: 12px;
        border-radius: inherit;
        background: radial-gradient(circle at center, rgba(167,248,253,0.24), transparent 42%);
        pointer-events: none;
    }

    .tired-bed {
        bottom: 20px;
        height: 28%;
        background: linear-gradient(180deg, #d9a17d, #8c4f33);
    }

    .tired-pillow {
        position: absolute;
        bottom: 78px;
        left: 50%;
        width: 120px;
        height: 42px;
        transform: translateX(-50%);
        border-radius: 20px;
        background: linear-gradient(180deg, #f6e1c5, #c19475);
        box-shadow: inset 0 8px 16px rgba(255,255,255,0.24);
    }

    .tired-headboard {
        position: absolute;
        bottom: 16px;
        left: 50%;
        width: 100%;
        max-width: 160px;
        height: 28px;
        transform: translateX(-50%);
        border-radius: 16px 16px 0 0;
        background: linear-gradient(180deg, #8b5a42, #4a2d1d);
        box-shadow: inset 0 8px 16px rgba(255,255,255,0.12);
    }

    .tired-cloud {
        position: absolute;
        top: 16px;
        right: 18px;
        width: 88px;
        height: 48px;
        border-radius: 24px;
        background: rgba(255,255,255,0.92);
        box-shadow: 0 18px 32px rgba(12, 16, 25, 0.24);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
    }

    .tired-cloud-bubble {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: rgba(255,255,255,0.98);
        box-shadow: 0 6px 12px rgba(0,0,0,0.08);
    }

    .tired-zzz {
        position: relative;
        color: #7c3aed;
        font-weight: 900;
        font-size: 0.9rem;
        letter-spacing: 0.12em;
    }

    .tired-zzz::before {
        content: 'Z';
        display: block;
        transform: translateY(-4px);
    }

    .tired-zzz::after {
        content: 'zz';
        display: block;
        transform: translateY(-2px);
        opacity: 0.8;
    }

    .tired-star {
        width: 12px;
        height: 12px;
        background: #ffd183;
        clip-path: polygon(50% 0%, 61% 38%, 100% 38%, 68% 59%, 79% 100%, 50% 75%, 21% 100%, 32% 59%, 0% 38%, 39% 38%);
        filter: drop-shadow(0 0 4px rgba(255, 209, 128, 0.8));
    }

    .mood-info {
        text-align: center;
        z-index: 1;
        transition: transform 0.28s ease;
    }

    .mood-title {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 1.6rem;
        font-weight: 800;
        letter-spacing: -0.03em;
        margin-bottom: 0.75rem;
        color: #111827;
    }

    .mood-text {
        color: #64748b;
        font-size: 0.96rem;
        line-height: 1.75;
    }

    .submit-mood-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        max-width: 360px;
        margin: 0 auto;
        padding: 1rem 1.5rem;
        border-radius: 999px;
        border: none;
        background: linear-gradient(90deg, #14b8a6, #0f766e);
        color: white;
        font-weight: 800;
        letter-spacing: 0.02em;
        box-shadow: 0 18px 50px rgba(20, 184, 166, 0.25);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
        cursor: pointer;
    }

    .submit-mood-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 22px 58px rgba(20, 184, 166, 0.32);
    }

    .submit-mood-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 22px 58px rgba(16, 185, 129, 0.35);
    }

    @media (max-width: 1024px) {
        .mood-card {
            min-height: 360px;
        }
    }

    @media (max-width: 768px) {
        .mood-picker-shell {
            padding: 1.75rem;
        }

        .mood-picker-header h1 {
            font-size: 2.8rem;
        }

        .mood-card {
            min-height: 340px;
            padding: 1.5rem;
        }

        .mood-scene {
            height: 220px;
        }

        .mood-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

@endsection
