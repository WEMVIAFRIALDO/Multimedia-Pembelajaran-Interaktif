<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Mood-Sync</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 50%, #0c0a1a 100%);
            overflow-x: hidden;
        }

        .particles-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
            z-index: 0;
        }

        .particle {
            position: absolute;
            border-radius: 50%;
            opacity: 0.4;
        }

        .particle:nth-child(odd) {
            background: rgba(255, 255, 255, 0.3);
            width: 4px;
            height: 4px;
        }

        .particle:nth-child(even) {
            background: rgba(255, 255, 255, 0.2);
            width: 6px;
            height: 6px;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(100vh) translateX(0) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 0.4;
            }
            90% {
                opacity: 0.4;
            }
            100% {
                opacity: 0;
            }
        }

        .particle {
            animation: float linear infinite;
        }

        .content {
            position: relative;
            z-index: 10;
        }

        .glass-morphism {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        .input-field {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            transition: all 0.3s ease;
        }

        .input-field:focus {
            background: rgba(255, 255, 255, 0.12);
            border-color: rgba(251, 146, 60, 0.5);
            box-shadow: 0 0 20px rgba(251, 146, 60, 0.1);
        }

        .btn-primary {
            background: linear-gradient(135deg, #fb923c 0%, #f97316 100%);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(249, 115, 22, 0.3);
        }

        .password-strength {
            height: 4px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 2px;
            margin-top: 8px;
            overflow: hidden;
        }

        .password-strength-bar {
            height: 100%;
            width: 0%;
            background: linear-gradient(90deg, #ef4444, #f97316, #16a34a);
            transition: width 0.3s ease;
        }

        @media (max-width: 640px) {
            .container {
                padding: 1.5rem !important;
            }
        }
    </style>
</head>
<body>
    <!-- Particle Background -->
    <div class="particles-container">
        <?php for($i = 0; $i < 30; $i++): ?>
            <div class="particle" style="left: <?php echo e(rand(0, 100)); ?>%; top: -10px; animation-delay: <?php echo e(rand(0, 8) / 10); ?>s; animation-duration: <?php echo e(rand(15, 25)); ?>s;"></div>
        <?php endfor; ?>
    </div>

    <!-- Main Content -->
    <div class="content min-h-screen flex items-center justify-center px-4 py-8">
        <div class="w-full max-w-md">
            <!-- Logo/Header -->
            <div class="text-center mb-8 md:mb-12">
                <h1 class="text-5xl md:text-6xl font-black bg-gradient-to-r from-amber-300 via-orange-300 to-red-400 bg-clip-text text-transparent mb-2">
                    🎭
                </h1>
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-2">Mood-Sync</h2>
                <p class="text-gray-400">Mulai Perjalanan Belajar Anda</p>
            </div>

            <!-- Register Card -->
            <div class="glass-morphism rounded-2xl md:rounded-3xl p-8 md:p-10 mb-6 shadow-2xl">
                <!-- Title -->
                <h3 class="text-2xl font-bold text-white mb-6">Buat Akun Baru</h3>

                <!-- Error Messages -->
                <?php if($errors->any()): ?>
                    <div class="mb-6 bg-red-500/15 border border-red-500/30 rounded-xl p-4">
                        <p class="text-red-200 text-sm font-semibold mb-2">Terjadi Kesalahan:</p>
                        <ul class="space-y-1">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="text-red-300 text-sm flex items-start">
                                    <span class="mr-2">✗</span>
                                    <span><?php echo e($error); ?></span>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form method="POST" action="/register" class="space-y-4" id="register-form">
                    <?php echo csrf_field(); ?>

                    <!-- Nama Lengkap -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-200 mb-3">
                            👤 Nama Lengkap
                        </label>
                        <input 
                            type="text" 
                            name="name" 
                            value="<?php echo e(old('name')); ?>"
                            placeholder="Masukkan nama lengkap Anda"
                            class="input-field w-full px-4 py-3 rounded-xl text-white placeholder-gray-500 focus:outline-none"
                            required>
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-200 mb-3">
                            📧 Email
                        </label>
                        <input 
                            type="email" 
                            name="email" 
                            value="<?php echo e(old('email')); ?>"
                            placeholder="nama@email.com"
                            class="input-field w-full px-4 py-3 rounded-xl text-white placeholder-gray-500 focus:outline-none"
                            required>
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-200 mb-3">
                            🔒 Password
                        </label>
                        <input 
                            type="password" 
                            name="password"
                            id="password"
                            placeholder="Minimal 8 karakter"
                            class="input-field w-full px-4 py-3 rounded-xl text-white placeholder-gray-500 focus:outline-none"
                            onchange="updatePasswordStrength()"
                            oninput="updatePasswordStrength()"
                            required>
                        <div class="password-strength">
                            <div class="password-strength-bar" id="strength-bar"></div>
                        </div>
                        <p class="text-xs text-gray-400 mt-2" id="strength-text">Kuat: huruf besar, angka, dan karakter spesial</p>
                    </div>

                    <!-- Konfirmasi Password -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-200 mb-3">
                            🔐 Konfirmasi Password
                        </label>
                        <input 
                            type="password" 
                            name="password_confirmation"
                            placeholder="Ulangi password Anda"
                            class="input-field w-full px-4 py-3 rounded-xl text-white placeholder-gray-500 focus:outline-none"
                            required>
                    </div>

                    <!-- Terms Agreement -->
                    <div class="flex items-start">
                        <input type="checkbox" name="agree" id="agree" class="w-4 h-4 rounded border-gray-600 mt-1" required>
                        <label for="agree" class="ml-3 text-sm text-gray-300">
                            Saya setuju dengan <a href="#" class="text-amber-400 hover:underline">Syarat Layanan</a> dan 
                            <a href="#" class="text-amber-400 hover:underline">Kebijakan Privasi</a>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button 
                        type="submit"
                        class="btn-primary w-full py-3 rounded-xl text-slate-900 font-bold text-lg mt-6 transition-all">
                        Daftar Sekarang
                    </button>
                </form>
            </div>

            <!-- Divider -->
            <div class="relative mb-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-600"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-4 bg-gradient-to-b from-slate-900 to-slate-800 text-gray-400">atau</span>
                </div>
            </div>

            <!-- Login Link Card -->
            <div class="glass-morphism rounded-2xl md:rounded-3xl p-6 md:p-8 text-center">
                <p class="text-gray-300 mb-4">
                    Sudah punya akun?
                </p>
                <a 
                    href="/login"
                    class="inline-block w-full px-6 py-3 rounded-xl border-2 border-amber-400/50 text-amber-300 font-bold hover:bg-amber-400/10 transition-all">
                    Masuk ke Akun
                </a>
            </div>

            <!-- Footer -->
            <p class="text-center text-gray-500 text-sm mt-8">
                Daftar gratis dan mulai belajar dengan Mood-Sync hari ini!
            </p>
        </div>
    </div>

    <script>
        function updatePasswordStrength() {
            const password = document.getElementById('password').value;
            const strengthBar = document.getElementById('strength-bar');
            const strengthText = document.getElementById('strength-text');
            
            let strength = 0;
            
            if (password.length >= 8) strength += 25;
            if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength += 25;
            if (password.match(/[0-9]/)) strength += 25;
            if (password.match(/[^a-zA-Z0-9]/)) strength += 25;
            
            strengthBar.style.width = strength + '%';
            
            if (strength < 50) {
                strengthText.textContent = '⚠️ Lemah: tambahkan huruf besar, angka, dan karakter spesial';
                strengthBar.style.background = 'linear-gradient(90deg, #ef4444, #f87171)';
            } else if (strength < 75) {
                strengthText.textContent = '⚡ Sedang: coba tambahkan lebih banyak variasi karakter';
                strengthBar.style.background = 'linear-gradient(90deg, #f97316, #fb923c)';
            } else {
                strengthText.textContent = '✓ Kuat: password Anda aman!';
                strengthBar.style.background = 'linear-gradient(90deg, #16a34a, #22c55e)';
            }
        }
    </script>
</body>
</html>
<?php /**PATH C:\kuliah\WEMVI\Semester 4\Multimedia Pembelajaran Interaktif\Project\mood-sync\resources\views/register.blade.php ENDPATH**/ ?>