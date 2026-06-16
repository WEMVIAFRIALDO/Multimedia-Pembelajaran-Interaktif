<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mood-Sync</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            color-scheme: dark;
            --bg-1: #110531;
            --bg-2: #050816;
            --card: rgba(255, 255, 255, 0.08);
            --card-border: rgba(255, 255, 255, 0.14);
            --accent: #a855f7;
            --accent-strong: #7c3aed;
            --text: #eef2ff;
            --muted: #b4b4d0;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }

        html, body {
            min-height: 100%;
        }

        body {
            background: radial-gradient(circle at top left, rgba(134, 77, 255, 0.18), transparent 18%),
                        radial-gradient(circle at 90% 10%, rgba(59, 130, 246, 0.12), transparent 15%),
                        linear-gradient(135deg, var(--bg-1) 0%, #0b1041 42%, var(--bg-2) 100%);
            color: var(--text);
            overflow: auto;
        }

        .particles-container {
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 0;
        }

        .particle {
            position: absolute;
            border-radius: 999px;
            opacity: 0.26;
            filter: blur(0.5px);
            animation: float 18s linear infinite;
        }

        .particle:nth-child(odd) {
            width: 5px;
            height: 5px;
            background: rgba(167, 139, 250, 0.55);
        }

        .particle:nth-child(even) {
            width: 10px;
            height: 10px;
            background: rgba(147, 51, 234, 0.24);
        }

        @keyframes float {
            from {
                transform: translateY(120vh) translateX(0);
                opacity: 0;
            }
            25% {
                opacity: 0.3;
            }
            75% {
                opacity: 0.3;
            }
            to {
                transform: translateY(-120vh) translateX(40px);
                opacity: 0;
            }
        }

        .page-shell {
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 2rem;
            position: relative;
            z-index: 1;
        }

        .browser-frame {
            width: min(780px, 94%);
            max-width: 780px;
            background: rgba(12, 8, 29, 0.78);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 18px;
            backdrop-filter: blur(16px);
            box-shadow: 0 22px 68px rgba(1, 6, 25, 0.45);
            overflow: hidden;
        }

        .browser-top {
            display: flex;
            align-items: center;
            padding: 0.7rem 1rem;
            gap: 0.75rem;
        }

        .browser-buttons {
            display: flex;
            gap: 0.65rem;
        }

        .browser-buttons span {
            width: 12px;
            height: 12px;
            border-radius: 999px;
            display: block;
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.11);
        }

        .browser-buttons span:nth-child(1) { background: #ff5f57; }
        .browser-buttons span:nth-child(2) { background: #ffbd2e; }
        .browser-buttons span:nth-child(3) { background: #28ca41; }

        .browser-address {
            font-size: 0.95rem;
            color: rgba(255, 255, 255, 0.62);
            letter-spacing: 0.04em;
        }

        .login-layout {
            display: grid;
            grid-template-columns: 1fr 0.9fr;
            gap: 1rem;
            padding: 1rem;
        }

        .visual-panel,
        .form-panel {
            position: relative;
        }

        .visual-panel {
            display: grid;
            place-items: center;
            padding: 1.4rem;
            border-radius: 24px;
            background: radial-gradient(circle at top, rgba(134, 77, 255, 0.14), transparent 32%),
                        radial-gradient(circle at 70% 20%, rgba(79, 70, 229, 0.14), transparent 24%),
                        rgba(10, 6, 25, 0.75);
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.05);
            overflow: hidden;
        }

        .visual-panel::before {
            content: '';
            position: absolute;
            inset: -20% 0 0 0;
            background: radial-gradient(circle at 40% 15%, rgba(167, 85, 247, 0.28), transparent 22%);
            filter: blur(34px);
        }

        .mask-icon {
            position: relative;
            width: 88px;
            height: 88px;
            border-radius: 50%;
            background: radial-gradient(circle at 33% 25%, #ffffff, #a855f7 21%, #45237b 65%, #170a2c 100%);
            box-shadow: 0 0 30px rgba(124, 58, 237, 0.28), inset 0 0 18px rgba(255,255,255,0.14);
        }

        .mask-icon::after {
            content: '';
            position: absolute;
            inset: 12px 16px 16px;
            border-radius: 50% 50% 42% 42%;
            background: radial-gradient(circle at 50% 34%, rgba(255,255,255,0.48), transparent 55%);
            opacity: 0.92;
            pointer-events: none;
        }

        .mask-eyes {
            position: absolute;
            inset: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 36px 22px 0;
        }

        .mask-eyes span {
            width: 18px;
            height: 18px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.92);
            box-shadow: 0 0 18px rgba(255, 255, 255, 0.28);
        }

        .visual-title {
            margin-top: 1.4rem;
            text-align: center;
            z-index: 1;
        }

        .visual-title h1 {
            font-size: clamp(1.6rem, 3vw, 2.2rem);
            line-height: 1.08;
            letter-spacing: -0.02em;
            margin-bottom: 0.5rem;
        }

        .visual-title p {
            max-width: 20rem;
            margin: 0 auto;
            color: rgba(226, 226, 255, 0.78);
            line-height: 1.6;
            font-size: 0.92rem;
        }

        .form-panel {
            padding: 1.4rem;
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(12px);
            box-shadow: 0 18px 48px rgba(8, 4, 24, 0.35);
        }

        .heading-group {
            display: grid;
            gap: 0.6rem;
            margin-bottom: 1.2rem;
        }

        .heading-group span {
            display: inline-flex;
            padding: 0.45rem 1rem;
            border-radius: 999px;
            background: rgba(124, 58, 237, 0.16);
            color: #d8b4fe;
            font-size: 0.88rem;
            font-weight: 600;
            letter-spacing: 0.06em;
            width: fit-content;
        }

        .heading-group h2 {
            font-size: clamp(1.4rem, 2.4vw, 1.8rem);
            line-height: 1.08;
        }

        .heading-group p {
            color: rgba(226, 226, 255, 0.72);
            line-height: 1.8;
            max-width: 36rem;
        }

        .form-field {
            display: grid;
            gap: 0.65rem;
        }

        .form-field label {
            color: rgba(226, 226, 255, 0.76);
            font-size: 0.94rem;
            font-weight: 500;
        }

        .form-input {
            width: 100%;
            padding: 0.9rem 0.95rem;
            border-radius: 14px;
            border: 1px solid rgba(255, 255, 255, 0.10);
            background: rgba(255, 255, 255, 0.04);
            color: #f8f5ff;
            font-size: 0.98rem;
            transition: border-color 0.22s ease, box-shadow 0.22s ease, background 0.22s ease;
        }

        .form-input::placeholder {
            color: rgba(226, 226, 255, 0.42);
        }

        .form-input:focus {
            outline: none;
            border-color: rgba(167, 85, 247, 0.85);
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 0 6px rgba(124, 58, 237, 0.12);
        }

        .submit-button {
            width: 100%;
            padding: 0.95rem;
            border-radius: 999px;
            border: none;
            cursor: pointer;
            color: #fff;
            font-weight: 700;
            font-size: 0.98rem;
            letter-spacing: 0.02em;
            background: linear-gradient(135deg, #b072ff 0%, #7c3aed 100%);
            box-shadow: 0 14px 36px rgba(124, 58, 237, 0.28);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .submit-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 22px 62px rgba(124, 58, 237, 0.42);
        }

        .hint-row {
            display: grid;
            gap: 0.5rem;
            margin: 0.9rem 0 1rem;
            color: rgba(226, 226, 255, 0.72);
            font-size: 0.92rem;
        }

        .hint-left {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            color: rgba(226, 226, 255, 0.78);
        }

        .hint-left input {
            accent-color: #a855f7;
            width: 18px;
            height: 18px;
            border-radius: 6px;
        }

        .hint-link {
            display: inline-flex;
            justify-content: center;
            width: fit-content;
            margin: 0 auto;
            color: #c084fc;
            text-decoration: none;
            font-weight: 600;
        }

        .hint-link:hover {
            text-decoration: underline;
        }

        .bottom-note {
            margin-top: 1.75rem;
            color: rgba(226, 226, 255, 0.62);
            font-size: 0.95rem;
            text-align: center;
            line-height: 1.8;
        }

        .bottom-note a {
            color: #d8b4fe;
            text-decoration: none;
        }

        .register-link {
            display: inline-flex;
            justify-content: center;
            width: 100%;
            margin-top: 1rem;
            padding: 1rem 1.2rem;
            border-radius: 999px;
            border: 1px solid rgba(167, 139, 250, 0.35);
            color: #d8b4fe;
            background: rgba(118, 75, 221, 0.08);
            text-decoration: none;
            font-weight: 600;
            transition: background 0.25s ease, transform 0.25s ease;
        }

        .register-link:hover {
            transform: translateY(-1px);
            background: rgba(124, 58, 237, 0.14);
        }

        .panel-fill {
            position: absolute;
            inset: 0;
            opacity: 0.08;
            pointer-events: none;
            background: radial-gradient(circle at 20% 45%, rgba(167, 139, 250, 0.32), transparent 20%),
                        radial-gradient(circle at 85% 18%, rgba(79, 70, 229, 0.24), transparent 18%);
        }

        @media (max-width: 960px) {
            .login-layout {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 680px) {
            .browser-frame {
                border-radius: 24px;
            }

            .browser-top,
            .login-layout,
            .form-panel,
            .visual-panel {
                padding: 1.4rem;
            }

            .login-layout {
                gap: 1.25rem;
            }

            .visual-panel {
                min-height: 320px;
            }
        }
    </style>
</head>
<body>
    <div class="particles-container">
        <?php for($i = 0; $i < 40; $i++): ?>
            <div class="particle" style="left: <?php echo e(rand(0, 100)); ?>%; top: <?php echo e(rand(-20, 120)); ?>vh; animation-delay: <?php echo e(rand(0, 20) / 10); ?>s; animation-duration: <?php echo e(rand(16, 30)); ?>s;"></div>
        <?php endfor; ?>
    </div>

    <div class="page-shell">
        <div class="browser-frame">
            <div class="browser-top">
                <div class="browser-buttons">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="browser-address">mood-sync.edu/masuk</div>
                <div class="desktop-tag">Desktop</div>
            </div>

            <div class="login-layout">
                <section class="visual-panel">
                    <div class="mask-icon">
                        <div class="mask-eyes">
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <div class="visual-title">
                        <h1>Mood-Sync</h1>
                        <p>Sistem Pembelajaran Interaktif dengan pengalaman visual yang elegan dan imersif.</p>
                    </div>
                </section>

                <section class="form-panel">
                    <div class="heading-group">
                        <span>Gerbang Utama</span>
                        <h2>Selamat Datang di Mood-Sync</h2>
                    </div>

                    <?php if(isset($errors) && $errors->any()): ?>
                        <div style="padding:1rem; border-radius:20px; background: rgba(248, 113, 113, 0.14); border:1px solid rgba(248, 113, 113, 0.3); color:#fee2e2; margin-bottom:1rem;">
                            <strong style="display:block; margin-bottom:.5rem;">Terjadi Kesalahan:</strong>
                            <ul style="margin-left:1rem; line-height:1.7; font-size:.95rem;">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>• <?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="/login" class="space-y-5">
                        <?php echo csrf_field(); ?>
                        <div class="form-field">
                            <label for="email">Email</label>
                            <input id="email" name="email" type="email" value="<?php echo e(old('email')); ?>" placeholder="nama@email.com" class="form-input" required>
                        </div>

                        <div class="form-field">
                            <label for="password">Password</label>
                            <input id="password" name="password" type="password" placeholder="••••••••" class="form-input" required>
                        </div>

                        <div class="hint-row">
                        <label class="hint-left">
                            <input type="checkbox" name="remember" id="remember">
                            <span>Ingat saya</span>
                        </label>
                        <a class="hint-link" href="#">Lupa password?</a>
                    </div>

                        <button type="submit" class="submit-button">Masuk</button>
                    </form>

                    <p class="bottom-note">Belum punya akun? <a href="/register">Daftar sekarang</a> untuk mulai memilih mood dan menikmati pembelajaran yang disesuaikan.</p>
                </section>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\kuliah\WEMVI\Semester 4\Multimedia Pembelajaran Interaktif\Project\mood-sync\resources\views/login.blade.php ENDPATH**/ ?>