<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Mood-Sync') }}</title>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
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
    <link rel="stylesheet" href="{{ asset('css/mood-system.css') }}">
    
    <!-- Theme variables and mood classes are defined in public/css/mood-system.css to avoid duplication -->
    @php $isDashboard = request()->routeIs('dashboard'); @endphp
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
<body class="mood-{{ strtolower(session('user_mood', 'biasa')) }} {{ $isDashboard ? 'dashboard-page' : '' }}">
    <!-- Debug badge removed: hidden in production UI -->
    <!-- Navigation Bar -->
    <nav class="sticky top-0 z-50 backdrop-blur-xl bg-slate-950/95 border-b border-slate-800/50 shadow-sm">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <a href="{{ route('dashboard') }}" class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-teal-600 bg-clip-text text-transparent">
                        🎭 Mood-Sync
                    </a>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="{{ route('materi.index') }}" class="px-3 py-2 rounded-md text-gray-700 hover:text-blue-600 transition">Materi</a>
                    <a href="{{ route('video.index') }}" class="px-3 py-2 rounded-md text-gray-700 hover:text-blue-600 transition">Video</a>
                    <a href="{{ route('ki-kd') }}" class="px-3 py-2 rounded-md text-gray-700 hover:text-blue-600 transition">CP & TP</a>
                    <a href="{{ route('kuis.index') }}" class="px-3 py-2 rounded-md text-gray-700 hover:text-blue-600 transition">Evaluasi</a>
                    <a href="{{ route('progress.index') }}" class="px-3 py-2 rounded-md text-gray-700 hover:text-blue-600 transition">Progress</a>
                    <a href="{{ route('bantuan') }}" class="px-3 py-2 rounded-md text-gray-700 hover:text-blue-600 transition">Bantuan</a>
                </div>
                
                <!-- Right side - Profile & Logout -->
                <div class="flex items-center space-x-4">
                    <a href="{{ route('profil.index') }}" class="flex items-center gap-3 rounded-full border border-slate-700 bg-slate-900/90 px-3 py-2 text-sm text-slate-100 shadow-sm hover:border-blue-500/30 hover:text-white transition">
                        @if(Auth::user()->profile_photo_path)
                            <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="Avatar" class="h-9 w-9 rounded-full object-cover border border-slate-700">
                        @else
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-blue-600 text-white font-semibold">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </span>
                        @endif
                        <span class="font-medium">{{ Auth::user()->name }}</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="px-3 py-2 rounded-md text-red-600 hover:bg-red-50 transition text-sm">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    @php $isDashboard = request()->routeIs('dashboard'); @endphp
    <main class="min-h-screen">
        <div class="{{ $isDashboard ? 'w-full mx-auto px-4 sm:px-6 lg:px-8 py-0 app-container' : 'app-container py-8' }}">
            @yield('content')
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
    <script src="{{ asset('js/mood-system.js') }}"></script>
    @stack('scripts')
</body>
</html>