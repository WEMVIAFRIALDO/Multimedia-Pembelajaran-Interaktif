

<?php $__env->startSection('content'); ?>
<div class="dashboard-wrapper">
        <!-- Main Content Area -->
        <main class="main-content">
            <section class="dashboard-hero-panel">
                <div class="hero-copy">
                    <p class="hero-eyebrow">Selamat datang kembali, <?php echo e(Auth::user()->name); ?>.</p>
                    <h1 class="hero-title">Dashboard Pembelajaran Modern Anda.</h1>
                </div>
                <div class="hero-actions">
                    <div class="hero-chip">
                        <span>Mode Saat Ini</span>
                        <strong><?php echo e(session('selected_mood', 'Biasa')); ?></strong>
                    </div>
                    <div class="hero-chip soft">
                        <span>Progress</span>
                        <strong><?php echo e($completedMateri ?? '0'); ?> / <?php echo e($totalMateri ?? '0'); ?> Materi</strong>
                    </div>
                    <a href="<?php echo e(route('mood.selection')); ?>" class="hero-chip mood-link" aria-label="Kembali ke Pemilihan Mood">
                        <span class="chip-icon" aria-hidden="true">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                        <span>Ubah Mood</span>
                        <strong>Kembali Pilih Mood</strong>
                    </a>
                </div>
            </section>

            <!-- Page Header Terintegrasi -->
                <div class="page-header">
                <h1 class="page-title">Dashboard Pembelajaran Anda</h1>
                <p class="page-subtitle">Welcome, <?php echo e(Auth::user()->name); ?></p>
            </div>

            <!-- Grid Konten Utama 2x2 -->
            <section class="content-grid">
                <!-- Materi Pembelajaran (Atas-Kiri) -->
                <a href="<?php echo e(route('materi.index')); ?>" class="card-link">
                    <article class="grid-card materi-card">
                        <div class="card-header">
                            <div class="card-icon">📚</div>
                            <h2>Materi Pembelajaran</h2>
                        </div>
                    <p class="card-description">Akses materi lengkap dengan rangkaian topik yang disusun agar sesuai dengan mood dan kebutuhanmu.</p>
                    
                    <div class="card-content">
                        <div class="materi-item">
                            <div class="item-preview">
                                <div class="book-preview">📖</div>
                            </div>
                            <div class="item-info">
                                <p class="item-title">Dasar Pemrograman</p>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 65%"></div>
                                </div>
                                <p class="progress-text">65% selesai</p>
                            </div>
                        </div>
                        <div class="materi-item">
                            <div class="item-preview">
                                <div class="book-preview">📗</div>
                            </div>
                            <div class="item-info">
                                <p class="item-title">Database Fundamental</p>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 40%"></div>
                                </div>
                                <p class="progress-text">40% selesai</p>
                            </div>
                        </div>
                    </div>
                </article>
                </a>

                <!-- Video Interaktif (Atas-Kanan) -->
                <a href="<?php echo e(route('video.index')); ?>" class="card-link">
                    <article class="grid-card video-card">
                        <div class="card-header">
                            <div class="card-icon">🎬</div>
                            <h2>Video Interaktif</h2>
                        </div>
                    <p class="card-description">Tonton konten pembelajaran modern dengan pendekatan visual premium.</p>
                    
                    <div class="card-content">
                        <div class="video-item">
                            <div class="video-thumbnail">▶️</div>
                            <div class="video-info">
                                <p class="video-title">Pengenalan OOP</p>
                                <p class="video-meta">12 menit • Sedang Ditonton</p>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 50%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="video-item">
                            <div class="video-thumbnail">▶️</div>
                            <div class="video-info">
                                <p class="video-title">Struktur Data Lanjut</p>
                                <p class="video-meta">18 menit • Belum Ditonton</p>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 0%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                </a>

                <!-- Evaluasi (Bawah-Kiri) -->
                <a href="<?php echo e(route('kuis.index')); ?>" class="card-link">
                    <article class="grid-card evaluasi-card">
                        <div class="card-header">
                            <div class="card-icon">✅</div>
                            <h2>Evaluasi</h2>
                        </div>
                    <p class="card-description">Uji pemahaman Anda dengan soal interaktif dan skor adaptif.</p>
                    
                    <div class="card-content">
                        <div class="score-display">
                            <div class="score-circle">85</div>
                            <p class="score-label">Nilai Terakhir</p>
                        </div>
                        <div class="kuis-list">
                            <div class="kuis-item">
                                <p class="kuis-name">Kuis: Dasar Pemrograman</p>
                                <span class="kuis-status">✓ Selesai</span>
                            </div>
                            <div class="kuis-item">
                                <p class="kuis-name">Kuis: Database Fundamental</p>
                                <span class="kuis-status pending">⏳ Pending</span>
                            </div>
                        </div>
                    </div>
                </article>
                </a>

                <!-- Progress (Bawah-Kanan) -->
                <a href="<?php echo e(route('progress.index')); ?>" class="card-link">
                    <article class="grid-card progress-card">
                        <div class="card-header">
                            <div class="card-icon">📈</div>
                            <h2>Progress</h2>
                        </div>
                    <p class="card-description">Lihat perkembangan belajar secara visual dan real-time.</p>
                    
                    <div class="card-content">
                        <div class="progress-chart">
                            <div class="chart-bar">
                                <div class="bar" style="height: 70%"></div>
                                <span class="bar-label">Week 1</span>
                            </div>
                            <div class="chart-bar">
                                <div class="bar" style="height: 85%"></div>
                                <span class="bar-label">Week 2</span>
                            </div>
                            <div class="chart-bar">
                                <div class="bar" style="height: 75%"></div>
                                <span class="bar-label">Week 3</span>
                            </div>
                            <div class="chart-bar">
                                <div class="bar" style="height: 90%"></div>
                                <span class="bar-label">Week 4</span>
                            </div>
                        </div>
                        <p class="chart-summary">Peningkatan 25% dibanding bulan lalu</p>
                    </div>
                </article>
                </a>
            </section>

            <!-- Panel Capaian & Tujuan Pembelajaran (Full Width) -->
            <a href="<?php echo e(route('ki-kd')); ?>" class="competency-panel-link">
                <section class="competency-panel">
                <div class="panel-header">
                    <h2 class="panel-title">Capaian Pembelajaran (CP) & Tujuan Pembelajaran (TP)</h2>
                    <p class="panel-description">Telusuri elemen CP/TP SMK yang relevan dengan pembelajaran teknologi jaringan dan multimedia.</p>
                </div>

                <div class="competency-grid">
                    <div class="competency-item">
                        <div class="ki-badge">Elemen</div>
                        <h3 class="ki-title">Proses Bisnis di Bidang TJKT</h3>
                        <p class="ki-desc">Memahami siklus operasi dan layanan dalam ekosistem Teknologi Jaringan dan Komputer.</p>
                        <div class="kd-list">
                            <div class="kd-item">Analisis alur bisnis jaringan</div>
                            <div class="kd-item">Identifikasi kebutuhan pengguna</div>
                        </div>
                        <span class="status-badge active">Aktif</span>
                    </div>

                    <div class="competency-item">
                        <div class="ki-badge">TP</div>
                        <h3 class="ki-title">Memahami perkembangan teknologi jaringan</h3>
                        <p class="ki-desc">Mengidentifikasi tren dan inovasi arsitektur jaringan modern di industri SMK.</p>
                        <div class="kd-list">
                            <div class="kd-item">Perbandingan protokol lama dan baru</div>
                            <div class="kd-item">Skenario implementasi jaringan cerdas</div>
                        </div>
                        <span class="status-badge active">Aktif</span>
                    </div>

                    <div class="competency-item">
                        <div class="ki-badge">TP</div>
                        <h3 class="ki-title">Mendesain solusi jaringan berbasis protokol modern</h3>
                        <p class="ki-desc">Menerapkan desain topologi, keamanan, dan layanan jaringan sesuai kebutuhan industri.</p>
                        <div class="kd-list">
                            <div class="kd-item">Rancangan topologi jaringan</div>
                            <div class="kd-item">Pengamanan koneksi dan layanan</div>
                        </div>
                        <span class="status-badge active">Aktif</span>
                    </div>

                    <div class="competency-item">
                        <div class="ki-badge">CP</div>
                        <h3 class="ki-title">Mengelola layanan multimedia digital</h3>
                        <p class="ki-desc">Mengelola konten multimedia dan presentasi digital untuk pembelajaran dan proyek SMK.</p>
                        <div class="kd-list">
                            <div class="kd-item">Produksi konten audio visual</div>
                            <div class="kd-item">Optimasi distribusi media digital</div>
                        </div>
                        <span class="status-badge active">Aktif</span>
                    </div>
                </div>
            </section>
            </a>
        </main>
    </div>

    <!-- Footer Terintegrasi Penuh -->
    <footer class="footer-main">
        <div class="footer-container">
            <div class="footer-content">
                <a href="#" class="footer-link">Tentang Kami</a>
                <a href="#" class="footer-link">Kebijakan Privasi</a>
                <a href="#" class="footer-link">Hubungi Kami</a>
            </div>
            <p class="footer-copyright">© 2024 Mood-Sync.edu. Seluruh Hak Cipta Dilindungi.</p>
        </div>
    </footer>
</div>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .dashboard-wrapper {
        min-height: 100vh;
        width: 100%;
        margin: 0;
        display: flex;
        flex-direction: column;
        background: #1a2332;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', sans-serif;
        color: #f1f5f9;
    }

    /* ============ NAVBAR HORIZONTAL ============ */
    .navbar-main {
        width: 100%;
        max-width: none;
        background: linear-gradient(180deg, #1e293b 0%, #1a2332 100%);
        border-bottom: 1px solid #334155;
        padding: 1rem 2rem;
        position: sticky;
        top: 0;
        z-index: 50;
        box-shadow: 0 2px 20px rgba(15, 23, 42, 0.12);
    }

    .navbar-container {
        max-width: 1920px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 2rem;
    }

    .navbar-brand {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        flex-shrink: 0;
    }

    .logo-icon {
        width: 36px;
        height: 36px;
        background: linear-gradient(135deg, #2563eb, #0284c7);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 0.85rem;
    }

    .logo-text {
        font-size: 1.1rem;
        font-weight: 600;
        color: #f1f5f9;
    }

    .navbar-menu {
        display: flex;
        gap: 2rem;
        flex: 1;
        justify-content: center;
    }

    .nav-link {
        color: #cbd5e1;
        text-decoration: none;
        font-size: 0.95rem;
        font-weight: 500;
        transition: color 0.2s ease;
        padding: 0.5rem 0;
        border-bottom: 2px solid transparent;
    }

    .nav-link:hover {
        color: #60a5fa;
        border-bottom-color: #60a5fa;
    }

    .navbar-right {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        flex-shrink: 0;
    }

    .mode-status {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.9rem;
        color: #cbd5e1;
        background: #0f172a;
        padding: 0.5rem 0.75rem;
        border-radius: 20px;
        white-space: nowrap;
    }

    .status-icon {
        font-size: 1rem;
    }

    .navbar-actions {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .theme-toggle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 1px solid #334155;
        background: #0f172a;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        transition: all 0.2s ease;
        color: #cbd5e1;
    }

    .theme-toggle:hover {
        background: #1e293b;
        transform: scale(1.05);
    }

    .icon-moon {
        display: none;
    }

    .profile-chip {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        background: #0f172a;
        border: 1px solid #334155;
        border-radius: 20px;
        padding: 0.5rem 1rem;
    }

    .avatar {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: linear-gradient(135deg, #93c5fd, #60a5fa);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 0.85rem;
    }

    .user-name {
        font-weight: 500;
        color: #f1f5f9;
        font-size: 0.9rem;
    }

    .logout-btn {
        background: none;
        border: none;
        color: #ef4444;
        font-weight: 600;
        font-size: 0.85rem;
        cursor: pointer;
        transition: color 0.2s ease;
        padding: 0;
    }

    .logout-btn:hover {
        color: #dc2626;
    }

    /* ============ MAIN CONTAINER ============ */
    .dashboard-container {
        display: flex;
        flex: 1;
        width: 100%;
        max-width: 100%;
        margin: 0;
        gap: 1.5rem;
    }

    /* ============ SIDEBAR MINIMAL ============ */
    .sidebar-minimal {
        display: none;
    }

    .sidebar-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 2rem;
    }

    .sidebar-brand-secondary {
        width: 48px;
        height: 48px;
        background: linear-gradient(135deg, #2563eb, #0284c7);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-top: 0.5rem;
    }

    .sidebar-nav-minimal {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }

    .sidebar-link {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: transparent;
        border: 1px solid transparent;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        cursor: pointer;
        transition: all 0.2s ease;
        text-decoration: none;
        color: #64748b;
    }

    .sidebar-link:hover,
    .sidebar-link.active {
        background: #dbeafe;
        border-color: #93c5fd;
        color: #2563eb;
    }

    /* ============ MAIN CONTENT ============ */
    .main-content {
        flex: 1;
        padding: 2.5rem 2.5rem 3rem;
        overflow-y: auto;
        max-width: 100%;
        width: 100%;
    }

    /* Page Header */
    .page-header {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
        margin-bottom: 2.5rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.12);
    }

    .page-title {
        font-size: 2.75rem;
        font-weight: 800;
        color: #f1f5f9;
        margin-bottom: 0.5rem;
    }

    .page-subtitle {
        font-size: 1rem;
        color: #cbd5e1;
        margin-bottom: 0.75rem;
    }

    .page-description {
        font-size: 0.95rem;
        color: rgba(248, 250, 252, 0.82);
        max-width: 620px;
        line-height: 1.7;
    }

    .dashboard-hero-panel {
        display: grid;
        grid-template-columns: minmax(0, 1.35fr) minmax(260px, 0.65fr);
        gap: 1.5rem;
        padding: 2rem;
        margin-bottom: 2rem;
        border-radius: 32px;
        background: linear-gradient(135deg, #111827 0%, #0f172a 100%);
        border: 1px solid rgba(255, 255, 255, 0.08);
        box-shadow: 0 30px 80px rgba(15, 23, 42, 0.18);
        width: 100%;
        max-width: 1600px;
        margin-left: auto;
        margin-right: auto;
        position: relative;
        overflow: hidden;
        color: #f8fafc;
    }

    .dashboard-hero-panel::before {
        content: '';
        position: absolute;
        top: -18%;
        right: -12%;
        width: 340px;
        height: 340px;
        background: radial-gradient(circle, rgba(96,165,250,0.22), transparent 55%);
        filter: blur(42px);
        pointer-events: none;
    }

    .dashboard-hero-panel::after {
        content: '';
        position: absolute;
        bottom: -22%;
        left: -12%;
        width: 340px;
        height: 340px;
        background: radial-gradient(circle, rgba(190,18,60,0.14), transparent 55%);
        filter: blur(46px);
        pointer-events: none;
    }

    .hero-copy {
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 0.75rem;
        position: relative;
        z-index: 1;
    }

    .hero-eyebrow {
        font-size: 0.85rem;
        font-weight: 700;
        color: #2563eb;
        text-transform: uppercase;
        letter-spacing: 0.14em;
    }

    .hero-title {
        font-size: clamp(2.6rem, 4vw, 3.6rem);
        line-height: 1.02;
        letter-spacing: -0.04em;
        color: #f8fafc;
        margin: 0;
    }

    .hero-note {
        max-width: 680px;
        font-size: 1rem;
        color: rgba(248, 250, 252, 0.78);
        line-height: 1.75;
    }

    .hero-actions {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 1rem;
        align-items: center;
    }

    .hero-chip {
        display: flex;
        flex-direction: column;
        gap: 0.35rem;
        padding: 1.25rem 1.5rem;
        border-radius: 22px;
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.16);
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.08);
        color: #f8fafc;
        backdrop-filter: blur(10px);
        text-decoration: none;
        transition: transform 0.2s ease, background 0.2s ease, border-color 0.2s ease;
    }

    .hero-chip.mood-link {
        background: rgba(59, 130, 246, 0.14);
        border-color: rgba(59, 130, 246, 0.35);
        color: #eff6ff;
    }

    .hero-chip.mood-link:hover {
        background: rgba(59, 130, 246, 0.22);
        transform: translateY(-2px);
        border-color: rgba(96, 165, 250, 0.6);
    }

    .hero-chip .chip-icon{
        width:40px;
        height:40px;
        border-radius:10px;
        display:inline-flex;
        align-items:center;
        justify-content:center;
        background: rgba(255,255,255,0.04);
        color: #c7e2ff;
        margin-bottom:6px;
    }

    .hero-chip.mood-link .chip-icon{
        background: rgba(255,255,255,0.06);
        color: #e6f6ff;
    }

    .hero-chip.soft {
        background: rgba(255, 255, 255, 0.05);
    }

    .hero-chip span {
        font-size: 0.8rem;
        color: rgba(248, 250, 252, 0.78);
        text-transform: uppercase;
        letter-spacing: 0.12em;
    }

    .hero-chip strong {
        font-size: 1.05rem;
        color: #ffffff;
        font-weight: 700;
    }

    /* ============ GRID KONTEN 2x2 ============ */
    .content-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(280px, 1fr));
        gap: 1.75rem;
        margin-bottom: 2rem;
        max-width: 1600px;
        width: 100%;
        margin-left: auto;
        margin-right: auto;
    }

    .grid-card {
        background: linear-gradient(135deg, #111827 0%, #0f172a 100%);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 24px;
        padding: 1.75rem;
        box-shadow: 0 22px 60px rgba(15, 23, 42, 0.12);
        transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        color: #ffffff;
    }

    .card-link {
        display: block;
        text-decoration: none;
        color: inherit;
        cursor: pointer;
    }

    .card-link:hover .grid-card {
        transform: translateY(-6px);
    }

    .competency-panel-link {
        display: block;
        text-decoration: none;
        color: inherit;
        cursor: pointer;
    }

    .competency-panel-link:hover .competency-panel {
        transform: translateY(-3px);
    }

    .grid-card:hover {
        box-shadow: 0 24px 90px rgba(15, 23, 42, 0.18);
        transform: translateY(-6px);
        border-color: rgba(255, 255, 255, 0.16);
    }

    .card-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.25rem;
    }

    .card-icon {
        width: 48px;
        height: 48px;
        display: grid;
        place-items: center;
        font-size: 1.4rem;
        background: linear-gradient(135deg, #2563eb, #0ea5e9);
        color: white;
        border-radius: 16px;
        box-shadow: 0 12px 28px rgba(37, 99, 235, 0.16);
    }

    .card-header h2 {
        font-size: 1.2rem;
        font-weight: 700;
        color: #f1f5f9;
        margin: 0;
    }

    .card-description {
        font-size: 0.95rem;
        color: rgba(248, 250, 252, 0.78);
        margin-bottom: 1.5rem;
        line-height: 1.7;
    }

    .card-content {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    /* Materi Card */
    .materi-item {
        display: flex;
        gap: 1rem;
        padding: 1rem;
        background: #0f172a;
        border-radius: 18px;
        border: 1px solid rgba(255, 255, 255, 0.08);
    }

    .item-preview {
        width: 48px;
        height: 48px;
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.16), rgba(37, 99, 235, 0.24));
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    .item-info {
        flex: 1;
        min-width: 0;
    }

    .item-title {
        font-size: 0.9rem;
        font-weight: 600;
        color: #f1f5f9;
        margin-bottom: 0.4rem;
    }

    .progress-bar {
        width: 100%;
        height: 4px;
        background: #334155;
        border-radius: 2px;
        overflow: hidden;
        margin-bottom: 0.3rem;
    }

    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #2563eb, #0284c7);
        border-radius: 2px;
        transition: width 0.3s ease;
    }

    .progress-text {
        font-size: 0.75rem;
        color: rgba(248, 250, 252, 0.72);
    }

    /* Video Card */
    .video-item {
        display: flex;
        gap: 1rem;
        padding: 1rem;
        background: #0f172a;
        border-radius: 18px;
        border: 1px solid rgba(255, 255, 255, 0.08);
    }

    .video-thumbnail {
        width: 56px;
        height: 48px;
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.12), rgba(37, 99, 235, 0.22));
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        flex-shrink: 0;
    }

    .video-info {
        flex: 1;
        min-width: 0;
    }

    .video-title {
        font-size: 0.9rem;
        font-weight: 600;
        color: #f1f5f9;
        margin-bottom: 0.3rem;
    }

    .video-meta {
        font-size: 0.75rem;
        color: rgba(248, 250, 252, 0.72);
        margin-bottom: 0.4rem;
    }

    /* Evaluasi Card */
    .score-display {
        text-align: center;
        margin-bottom: 1rem;
    }

    .score-circle {
        width: 80px;
        height: 80px;
        margin: 0 auto 0.75rem;
        background: var(--accent, #3b82f6);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        font-weight: 700;
        color: white;
    }

    .score-label {
        font-size: 0.85rem;
        color: #cbd5e1;
    }

    .kuis-list {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }

    .kuis-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.75rem;
        background: #0f172a;
        border-radius: 8px;
        border: 1px solid rgba(255, 255, 255, 0.08);
    }

    .kuis-name {
        font-size: 0.9rem;
        font-weight: 500;
        color: #f1f5f9;
    }

    .kuis-status {
        font-size: 0.75rem;
        padding: 0.3rem 0.6rem;
        background: #dbeafe;
        color: #2563eb;
        border-radius: 4px;
        font-weight: 600;
    }

    .kuis-status.pending {
        background: #fed7aa;
        color: #d97706;
    }

    /* Progress Card */
    .progress-chart {
        display: flex;
        align-items: flex-end;
        justify-content: space-around;
        height: 120px;
        gap: 0.75rem;
        margin-bottom: 1rem;
        padding: 1rem 0;
    }

    .chart-bar {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.5rem;
        flex: 1;
    }

    .bar {
        width: 100%;
        background: var(--accent, #3b82f6);
        border-radius: 6px 6px 0 0;
        min-height: 8px;
    }

    .bar-label {
        font-size: 0.75rem;
        color: #94a3b8;
        font-weight: 500;
    }

    .chart-summary {
        text-align: center;
        font-size: 0.85rem;
        color: #60a5fa;
        font-weight: 600;
    }

    /* ============ COMPETENCY PANEL ============ */
    .competency-panel {
        background: linear-gradient(135deg, #111827 0%, #0f172a 100%);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 24px;
        padding: 2rem;
        box-shadow: 0 24px 60px rgba(15, 23, 42, 0.12);
        margin-bottom: 2rem;
        color: #ffffff;
        transition: transform 0.3s ease;
    }

    .panel-header {
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.12);
    }

    .panel-title {
        font-size: 1.4rem;
        font-weight: 700;
        color: #f8fafc;
        margin-bottom: 0.5rem;
    }

    .panel-description {
        font-size: 0.9rem;
        color: rgba(248, 250, 252, 0.72);
    }

    .competency-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1rem;
    }

    .competency-item {
        background: #0f172a;
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 18px;
        padding: 1.35rem;
        transition: all 0.3s ease;
    }

    .competency-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.24);
        border-color: rgba(255, 255, 255, 0.16);
    }

    .ki-badge {
        display: inline-block;
        background: rgba(59, 130, 246, 0.16);
        color: #1d4ed8;
        padding: 0.45rem 0.9rem;
        border-radius: 999px;
        font-size: 0.78rem;
        font-weight: 700;
        margin-bottom: 0.9rem;
        letter-spacing: 0.02em;
    }

    .ki-title {
        font-size: 1rem;
        font-weight: 700;
        color: #f8fafc;
        margin-bottom: 0.3rem;
    }

    .ki-desc {
        font-size: 0.85rem;
        color: rgba(248, 250, 252, 0.72);
        margin-bottom: 0.75rem;
    }

    .kd-list {
        display: flex;
        flex-direction: column;
        gap: 0.4rem;
        margin-bottom: 1rem;
    }

    .kd-item {
        font-size: 0.88rem;
        color: #f8fafc;
        line-height: 1.6;
        padding: 0.75rem 0.95rem;
        background: #111827;
        border-radius: 12px;
        border-left: 4px solid #60a5fa;
        padding-left: 1rem;
        box-shadow: inset 0 1px 2px rgba(255, 255, 255, 0.04);
    }

    .status-badge {
        display: inline-block;
        background: #dcfce7;
        color: #15803d;
        padding: 0.3rem 0.6rem;
        border-radius: 4px;
        font-size: 0.7rem;
        font-weight: 600;
    }

    /* ============ FOOTER ============ */
    .footer-main {
        background: transparent;
        color: #cbd5e1;
        padding: 2rem 1.5rem;
        border-top: 1px solid rgba(255, 255, 255, 0.08);
        margin-top: auto;
    }

    .footer-container {
        max-width: 1920px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 2rem;
    }

    .footer-content {
        display: flex;
        gap: 2rem;
    }

    .footer-link {
        color: #cbd5e1;
        text-decoration: none;
        font-size: 0.9rem;
        transition: color 0.2s ease;
    }

    .footer-link:hover {
        color: #f1f5f9;
    }

    .footer-copyright {
        font-size: 0.85rem;
        color: rgba(248, 250, 252, 0.7);
    }

    /* ============ RESPONSIVE ============ */
    @media (max-width: 1024px) {
        .dashboard-hero-panel {
            grid-template-columns: 1fr;
            padding: 1.5rem;
        }

        .content-grid {
            grid-template-columns: 1fr;
        }

        .navbar-menu {
            display: none;
        }

        .competency-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .navbar-container {
            gap: 1rem;
        }

        .mode-status {
            display: none;
        }

        .main-content {
            padding: 1rem;
        }

        .competency-grid {
            grid-template-columns: 1fr;
        }

        .sidebar-minimal {
            width: 60px;
        }

        .sidebar-link {
            width: 44px;
            height: 44px;
            font-size: 1.2rem;
        }
    }

    /* ============ DARK MODE ============ */
    .theme-dark {
        --bg-primary: #0f172a;
        --bg-secondary: #1e293b;
        --text-primary: #f1f5f9;
        --text-secondary: #cbd5e1;
        --border-color: #334155;
    }

    .theme-dark .dashboard-wrapper {
        background: #0f172a;
    }

    .theme-dark .navbar-main {
        background: linear-gradient(180deg, #1e293b 0%, #1a2332 100%);
        border-bottom-color: #334155;
    }

    .theme-dark .navbar-brand,
    .theme-dark .nav-link,
    .theme-dark .mode-status,
    .theme-dark .user-name {
        color: #f1f5f9;
    }

    .theme-dark .nav-link {
        color: #cbd5e1;
    }

    .theme-dark .nav-link:hover {
        color: #60a5fa;
    }

    .theme-dark .sidebar-minimal {
        background: linear-gradient(180deg, #1e293b 0%, #1a2332 100%);
        border-right-color: #334155;
    }

    .theme-dark .main-content {
        background: #0f172a;
        color: #f1f5f9;
    }

    .theme-dark .page-title,
    .theme-dark .card-header h2,
    .theme-dark .panel-title {
        color: #f1f5f9;
    }

    .theme-dark .page-subtitle,
    .theme-dark .page-description {
        color: #cbd5e1;
    }

    .theme-dark .grid-card,
    .theme-dark .competency-panel {
        background: linear-gradient(180deg, #1e293b 0%, #1a2332 100%);
        border-color: #334155;
    }

    .theme-dark .materi-item,
    .theme-dark .video-item,
    .theme-dark .kuis-item,
    .theme-dark .competency-item {
        background: #0f172a;
        border-color: #334155;
    }

    .theme-dark .item-title,
    .theme-dark .video-title,
    .theme-dark .kuis-name,
    .theme-dark .ki-title {
        color: #f1f5f9;
    }

    .theme-dark .item-preview,
    .theme-dark .video-thumbnail {
        opacity: 0.8;
    }

    .theme-dark .theme-toggle {
        background: #334155;
        border-color: #475569;
    }

    .theme-dark .profile-chip {
        background: #1e293b;
        border-color: #334155;
    }

    .theme-dark .kd-item {
        background: #0f172a;
        color: #cbd5e1;
        border-left-color: #60a5fa;
    }
</style>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    (function(){
        const switcher = document.getElementById('modeSwitcher');
        const storageKey = 'moodsync_theme';

        function applyTheme(theme) {
            if (theme === 'dark') {
                document.documentElement.classList.add('theme-dark');
                switcher.innerHTML = '<span class="icon-sun">☀️</span><span class="icon-moon" style="display:inline;">🌙</span>';
            } else {
                document.documentElement.classList.remove('theme-dark');
                switcher.innerHTML = '<span class="icon-sun">☀️</span><span class="icon-moon">🌙</span>';
            }
        }

        const saved = localStorage.getItem(storageKey) || 'light';
        applyTheme(saved);

        if (switcher) {
            switcher.addEventListener('click', function(){
                const isDark = document.documentElement.classList.contains('theme-dark');
                const next = isDark ? 'light' : 'dark';
                applyTheme(next);
                localStorage.setItem(storageKey, next);
            });
        }
    })();
</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\kuliah\WEMVI\Semester 4\Multimedia Pembelajaran Interaktif\Project\mood-sync\resources\views/dashboard.blade.php ENDPATH**/ ?>