@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-slate-950 py-10">
    <div class="container max-w-3xl mx-auto px-4">
        <div class="bg-slate-900/95 border border-slate-800 rounded-3xl shadow-2xl p-8">
            <div class="grid gap-8 lg:grid-cols-[320px_1fr] mb-8">
                <div class="space-y-6">
                    <div class="rounded-3xl bg-slate-950/80 border border-slate-800 p-6 shadow-lg shadow-slate-900/50">
                        <div class="mx-auto h-28 w-28 rounded-3xl overflow-hidden bg-slate-800 flex items-center justify-center mb-5">
                            @if($user->profile_photo_path)
                                <button id="profilePhotoPreviewTrigger" type="button" class="h-full w-full overflow-hidden focus:outline-none" aria-label="Lihat foto profil">
                                    <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="Foto Profil" class="h-full w-full object-cover transition-transform duration-200 hover:scale-105 cursor-pointer">
                                </button>
                            @else
                                <span class="text-4xl text-slate-200">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                            @endif
                        </div>
                        <div class="text-center">
                            <h2 class="text-2xl font-bold text-white">{{ $user->name }}</h2>
                            <p class="mt-2 text-sm text-slate-400 break-all">{{ $user->email }}</p>
                        </div>
                        <div class="mt-6 rounded-3xl bg-slate-900/90 border border-slate-800 p-4 text-sm text-slate-300">
                            <p class="font-semibold text-slate-100 mb-2">Profil Anda</p>
                            <p class="leading-relaxed">Foto profil akan berubah setelah Anda memilih file dan klik tombol Update Profil. Gunakan email aktif agar semua notifikasi bisa terkirim.</p>
                        </div>
                    </div>

                    <div class="rounded-3xl bg-slate-950/80 border border-slate-800 p-6 shadow-lg shadow-slate-900/50">
                        <h3 class="text-lg font-semibold text-white mb-4">Saran</h3>
                        <ul class="space-y-3 text-sm text-slate-400">
                            <li>1. Gunakan foto profil yang jelas dan mudah dikenali.</li>
                            <li>2. Pastikan email terdaftar aktif untuk menerima informasi akun.</li>
                            <li>3. Kosongkan password jika tidak ingin mengganti kata sandi.</li>
                        </ul>
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between gap-4 mb-6">
                        <div>
                            <h2 class="text-2xl font-bold text-white">Profil Pengguna</h2>
                            <p class="text-slate-400">Perbarui informasi akun dan foto profil Anda di halaman ini.</p>
                        </div>
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 px-4 py-3 rounded-2xl bg-slate-800 border border-slate-700 text-slate-100 hover:bg-slate-700 transition">
                            ← Kembali ke Dashboard
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-200 p-4 mb-6">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('profil.update') }}" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <div class="grid gap-6">
                            <div>
                                <label for="photo" class="block text-sm font-semibold text-slate-200 mb-2">Foto Profil</label>
                                <input type="file" id="photo" name="photo" accept="image/png, image/jpeg, image/webp" class="w-full rounded-2xl border border-slate-700 bg-slate-950 px-4 py-3 text-slate-100 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30" />
                                @error('photo')<p class="mt-2 text-sm text-rose-400">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label for="name" class="block text-sm font-semibold text-slate-200 mb-2">Nama</label>
                                <input type="text" class="w-full rounded-2xl border border-slate-700 bg-slate-950 px-4 py-3 text-slate-100 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                                @error('name')<p class="mt-2 text-sm text-rose-400">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-semibold text-slate-200 mb-2">Email</label>
                                <input type="email" class="w-full rounded-2xl border border-slate-700 bg-slate-950 px-4 py-3 text-slate-100 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                                @error('email')<p class="mt-2 text-sm text-rose-400">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <button type="submit" class="inline-flex items-center justify-center w-full rounded-2xl bg-gradient-to-r from-blue-500 to-cyan-500 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-cyan-500/20 hover:opacity-95 transition">
                            Update Profil
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if($user->profile_photo_path)
        <div id="photoPreviewModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/80 p-4">
            <div class="relative max-w-4xl w-full rounded-3xl overflow-hidden bg-slate-900 shadow-2xl border border-slate-800">
                <button id="photoPreviewClose" type="button" class="absolute right-4 top-4 z-10 rounded-full bg-slate-950/90 px-3 py-2 text-sm font-semibold text-white border border-slate-700 hover:bg-slate-900 transition">Tutup</button>
                <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="Preview Foto Profil" class="max-h-[80vh] w-full object-contain bg-slate-950">
            </div>
        </div>
    @endif
</div>

@if($user->profile_photo_path)
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var trigger = document.getElementById('profilePhotoPreviewTrigger');
            var modal = document.getElementById('photoPreviewModal');
            var closeButton = document.getElementById('photoPreviewClose');

            if (!trigger || !modal || !closeButton) {
                return;
            }

            trigger.addEventListener('click', function () {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            });

            closeButton.addEventListener('click', function () {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            });

            modal.addEventListener('click', function (event) {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                }
            });
        });
    </script>
@endif
@endsection
