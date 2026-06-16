# Mood-Sync: Sistem Pembelajaran Interaktif

Website Laravel untuk sistem pembelajaran interaktif yang menyesuaikan dengan mood pengguna.

## Fitur Utama

- **Autentikasi**: Login dan register pengguna
- **Pemilihan Mood**: Pilih mood (senang, santai, fokus, lelah) untuk menyesuaikan UI dan rekomendasi materi
- **Materi**: Daftar dan detail materi berdasarkan KD 3.4 - 3.8
- **Video Pembelajaran**: Halaman untuk video edukasi
- **KI & KD**: Informasi kompetensi inti dan dasar
- **Evaluasi**: Kuis pilihan ganda dengan feedback langsung
- **Progress**: Tracking hasil belajar pengguna
- **Profil**: Kelola informasi akun

## Instalasi

1. Clone repository ini
2. Jalankan `composer install`
3. Copy `.env.example` ke `.env` dan konfigurasi database
4. Jalankan `php artisan key:generate`
5. Jalankan `php artisan migrate`
6. Jalankan `php artisan db:seed`
7. Jalankan `php artisan serve`

## Struktur Database

- **users**: Tabel pengguna (dari Laravel auth)
- **moods**: Mood yang dipilih pengguna
- **materis**: Data materi pembelajaran
- **kuis**: Data kuis evaluasi
- **progresses**: Progress belajar pengguna

## Teknologi

- Laravel 10
- Blade Template
- Bootstrap 5
- MySQL

## Penggunaan

1. Register akun baru
2. Pilih mood untuk pengalaman personal
3. Jelajahi materi dan ikuti kuis
4. Lihat progress di dashboard

# Mood-Sync

Mood-Sync adalah platform multimedia pembelajaran interaktif berbasis web yang dirancang untuk memberikan pengalaman belajar yang adaptif dan personal. Sistem ini memiliki pendekatan unik dengan menyesuaikan penyajian konten edukasi berdasarkan kondisi emosional siswa.

Proyek ini dikembangkan sebagai bagian dari pemenuhan tugas mata kuliah Multimedia Pembelajaran Interaktif.

## Fitur Utama
- **Emotion-Based Content Adaptation:** Sistem merespons kondisi emosional siswa untuk memberikan materi dengan cara yang paling efektif saat itu.
- **Interactive & Modern UI:** Antarmuka pengguna dirancang secara dinamis untuk memaksimalkan keterlibatan siswa selama proses pembelajaran.

## Pengembang
**Wemvi Afrialdo**