<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'kelas',
        'jurusan',
        'mata_pelajaran',
        'title',
        'slug',
        'content_fokus',
        'content_biasa',
        'content_lelah',
        'ringkasan',
        'video_url',
    ];

    /**
     * Get the route key for implicit route model binding
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Compatibility alias for old Materi-based views.
     */
    public function getJudulAttribute()
    {
        return $this->title;
    }

    /**
     * Get content based on user's current mood
     */
    public function getContentBasedOnMood()
    {
        $mood = strtolower(session('user_mood', 'biasa'));

        return match($mood) {
            'fokus' => $this->content_fokus,
            'biasa' => $this->content_biasa,
            'lelah' => $this->content_lelah,
            default => $this->content_biasa,
        };
    }

    /**
     * Get the progresses for this material
     */
    public function progresses()
    {
        return $this->hasMany(Progress::class, 'materi_id');
    }
}
