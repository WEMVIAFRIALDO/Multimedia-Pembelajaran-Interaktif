<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;

    protected $table = 'progresses';

    protected $fillable = [
        'user_id',
        'materi_id',
        'kuis_id',
        'status', // completed, in_progress
        'score', // untuk kuis
    ];

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan Materi (Material)
    public function materi()
    {
        return $this->belongsTo(Material::class, 'materi_id');
    }

    // Relasi dengan Kuis
    public function kuis()
    {
        return $this->belongsTo(Kuis::class);
    }
}