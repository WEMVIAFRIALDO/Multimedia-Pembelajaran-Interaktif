# Mood Illustration Images

Folder ini berisi gambar-gambar ilustrasi untuk setiap mood di halaman pemilihan mood.

## File yang Diperlukan

Silakan upload gambar dengan nama dan format berikut:

### 1. fokus.png
- **Deskripsi**: Ilustrasi untuk mood Fokus (Buku & Lampu Edison)
- **Ukuran Rekomendasi**: 340x200px
- **Format**: PNG dengan transparency atau JPG
- **Path**: `public/images/mood/fokus.png`

### 2. santai.png
- **Deskripsi**: Ilustrasi untuk mood Santai (Taman Zen & Air)
- **Ukuran Rekomendasi**: 340x200px
- **Format**: PNG dengan transparency atau JPG
- **Path**: `public/images/mood/santai.png`

### 3. lelah.png
- **Deskripsi**: Ilustrasi untuk mood Lelah (Sofa & Kristal Zz)
- **Ukuran Rekomendasi**: 340x200px
- **Format**: PNG dengan transparency atau JPG
- **Path**: `public/images/mood/lelah.png`

## Cara Upload

1. Persiapkan 3 gambar ilustrasi sesuai mood (Fokus, Santai, Lelah)
2. Rename gambar dengan nama yang sesuai: `fokus.png`, `santai.png`, `lelah.png`
3. Letakkan ketiga file di folder ini: `public/images/mood/`
4. Refresh browser untuk melihat perubahan

## Fallback

Jika file gambar tidak ditemukan:
- Sistem akan otomatis menampilkan ilustrasi default berbasis CSS art
- Anda tidak perlu khawatir tentang gambar yang hilang, halaman tetap berfungsi

## Catatan Teknis

- File akan diakses dari URL: `http://localhost:8000/images/mood/fokus.png`
- Gambar harus terlihat baik dengan ukuran 340x200px (rasio 1.7:1)
- Format PNG dengan transparency lebih disarankan untuk hasil yang lebih baik
- Gunakan object-fit: cover dalam CSS untuk memastikan gambar mengisi container
