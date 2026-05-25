<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Materi;

class MateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Materi untuk KD 3.4 - 3.8
        Materi::create([
            'judul' => 'Pengenalan Multimedia',
            'konten' => 'Multimedia adalah kombinasi teks, gambar, audio, video, dan animasi...',
            'kd' => '3.4',
            'mood_rekomendasi' => 'fokus',
        ]);

        Materi::create([
            'judul' => 'Elemen Multimedia',
            'konten' => 'Elemen-elemen dasar multimedia meliputi teks, gambar, audio...',
            'kd' => '3.5',
            'mood_rekomendasi' => 'senang',
        ]);

        Materi::create([
            'judul' => 'Pembelajaran Interaktif',
            'konten' => 'Pembelajaran interaktif menggunakan multimedia untuk meningkatkan engagement...',
            'kd' => '3.6',
            'mood_rekomendasi' => 'santai',
        ]);

        Materi::create([
            'judul' => 'Desain Multimedia',
            'konten' => 'Prinsip desain dalam multimedia: keseimbangan, kontras, alignment...',
            'kd' => '3.7',
            'mood_rekomendasi' => 'fokus',
        ]);

        Materi::create([
            'judul' => 'Evaluasi Multimedia',
            'konten' => 'Cara mengevaluasi efektivitas multimedia dalam pembelajaran...',
            'kd' => '3.8',
            'mood_rekomendasi' => 'lelah',
        ]);
    }
}