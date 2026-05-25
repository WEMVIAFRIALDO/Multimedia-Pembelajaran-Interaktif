<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'konten',
        'kd', // KD 3.4 - 3.8
        'mood_rekomendasi', // mood yang direkomendasikan
    ];

    // Relasi dengan Progress
    public function progresses()
    {
        return $this->hasMany(Progress::class);
    }
}