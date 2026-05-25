<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e(config('app.name', 'Mood-Sync')); ?></title>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    
    <!-- Lottie Animation -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    
    <!-- Bootstrap CSS (untuk backward compatibility) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom Mood Styles -->
    <link rel="stylesheet" href="<?php echo e(asset('css/mood-system.css')); ?>">
    
    <!-- Theme variables and mood classes are defined in public/css/mood-system.css to avoid duplication -->
    <?php $isDashboard = request()->routeIs('dashboard'); ?>
    <style>
        body { background: #1a2332 !important; color: #f1f5f9; }
        .mood-page__bg, .mood-picker-page { background: #1a2332 !important; }
        body.dashboard-page { background: #1a2332 !important; color: #f1f5f9; }
        body.dashboard-page .dashboard-wrapper { background: #1a2332; }
        input, textarea, [contenteditable="true"] {
            caret-color: transparent !important;
        }
        input:focus, textarea:focus, [contenteditable="true"]:focus {
            outline: none !important;
            box-shadow: none !important;
        }
    </style>
</head>
<body class="mood-<?php echo e(strtolower(session('user_mood', 'biasa'))); ?> <?php echo e($isDashboard ? 'dashboard-page' : ''); ?>">
    <!-- Debug badge removed: hidden in production UI -->
    <!-- Navigation Bar -->
    <nav class="sticky top-0 z-50 backdrop-blur-xl bg-slate-950/95 border-b border-slate-800/50 shadow-sm">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <a href="<?php echo e(route('dashboard')); ?>" class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-teal-600 bg-clip-text text-transparent">
                        🎭 Mood-Sync
                    </a>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="<?php echo e(route('materi.index')); ?>" class="px-3 py-2 rounded-md text-gray-700 hover:text-blue-600 transition">Materi</a>
                    <a href="<?php echo e(route('video.index')); ?>" class="px-3 py-2 rounded-md text-gray-700 hover:text-blue-600 transition">Video</a>
                    <a href="<?php echo e(route('ki-kd')); ?>" class="px-3 py-2 rounded-md text-gray-700 hover:text-blue-600 transition">CP & TP</a>
                    <a href="<?php echo e(route('kuis.index')); ?>" class="px-3 py-2 rounded-md text-gray-700 hover:text-blue-600 transition">Evaluasi</a>
                    <a href="<?php echo e(route('progress.index')); ?>" class="px-3 py-2 rounded-md text-gray-700 hover:text-blue-600 transition">Progress</a>
                    <a href="<?php echo e(route('bantuan')); ?>" class="px-3 py-2 rounded-md text-gray-700 hover:text-blue-600 transition">Bantuan</a>
                </div>
                
                <!-- Right side - Profile & Logout -->
                <div class="flex items-center space-x-4">
                    <a href="<?php echo e(route('profil.index')); ?>" class="flex items-center gap-3 rounded-full border border-slate-700 bg-slate-900/90 px-3 py-2 text-sm text-slate-100 shadow-sm hover:border-blue-500/30 hover:text-white transition">
                        <?php if(Auth::user()->profile_photo_path): ?>
                            <img src="<?php echo e(asset('storage/' . Auth::user()->profile_photo_path)); ?>" alt="Avatar" class="h-9 w-9 rounded-full object-cover border border-slate-700">
                        <?php else: ?>
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-blue-600 text-white font-semibold">
                                <?php echo e(strtoupper(substr(Auth::user()->name, 0, 1))); ?>

                            </span>
                        <?php endif; ?>
                        <span class="font-medium"><?php echo e(Auth::user()->name); ?></span>
                    </a>
                    <form method="POST" action="<?php echo e(route('logout')); ?>" class="inline">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="px-3 py-2 rounded-md text-red-600 hover:bg-red-50 transition text-sm">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <?php $isDashboard = request()->routeIs('dashboard'); ?>
    <main class="min-h-screen">
        <div class="<?php echo e($isDashboard ? 'w-full mx-auto px-4 sm:px-6 lg:px-8 py-0 app-container' : 'app-container py-8'); ?>">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </main>

    <!-- Footer -->
    <footer class="border-t border-gray-200 bg-gray-50 py-8 mt-16">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center text-gray-600 text-sm">
                <p>&copy; 2024 Mood-Sync - Platform Pembelajaran Interaktif dengan Mood Tracking</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(asset('js/mood-system.js')); ?>"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH C:\kuliah\WEMVI\Semester 4\Multimedia Pembelajaran Interaktif\Project\mood-sync\resources\views/layouts/app.blade.php ENDPATH**/ ?>