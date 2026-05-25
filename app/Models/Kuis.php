<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuis extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'pertanyaan', // JSON untuk pertanyaan pilihan ganda
        'jawaban_benar', // JSON untuk jawaban benar
        'material_id', // relasi dengan material
    ];

    protected $casts = [
        'pertanyaan' => 'array',
        'jawaban_benar' => 'array',
    ];

    // Relasi dengan Material
    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id');
    }

    // Relasi dengan Progress
    public function progresses()
    {
        return $this->hasMany(Progress::class);
    }
}