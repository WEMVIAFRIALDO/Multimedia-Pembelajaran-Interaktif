<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    /**
     * Tampilkan daftar Kelas untuk Video
     */
    public function index()
    {
        $selectedMood = session('selected_mood', 'Biasa');
        $currentMood = \App\Models\Mood::where('user_id', Auth::id())->latest()->first();

        // Get unique kelas yang memiliki video hanya untuk kelas 11 dan 12
        $kelas = Material::select('kelas')
            ->whereIn('kelas', ['11', '12'])
            ->whereNotNull('video_url')
            ->distinct()
            ->orderBy('kelas', 'asc')
            ->get();

        return view('video.index', compact('kelas', 'selectedMood', 'currentMood'));
    }

    /**
     * Tampilkan Jurusan berdasarkan Kelas untuk Video
     */
    public function jurusan($kelas)
    {
        $selectedMood = session('selected_mood', 'Biasa');
        $currentMood = \App\Models\Mood::where('user_id', Auth::id())->latest()->first();

        // Get unique jurusan RPL dan Multimedia untuk kelas ini
        $jurusans = Material::where('kelas', $kelas)
            ->whereIn('jurusan', ['RPL', 'Multimedia'])
            ->whereNotNull('video_url')
            ->select('jurusan')
            ->distinct()
            ->get();

        return view('video.jurusan', compact('kelas', 'jurusans', 'selectedMood', 'currentMood'));
    }

    /**
     * Tampilkan video yang tersedia berdasarkan Kelas dan Jurusan
     */
    public function mataPelajaran($kelas, $jurusan)
    {
        $selectedMood = session('selected_mood', 'Biasa');
        $currentMood = \App\Models\Mood::where('user_id', Auth::id())->latest()->first();

        $videos = Material::where('kelas', $kelas)
            ->where('jurusan', $jurusan)
            ->whereNotNull('video_url')
            ->get();

        return view('video.mata_pelajaran', compact('kelas', 'jurusan', 'videos', 'selectedMood', 'currentMood'));
    }

    public function show($kelas, $jurusan, $mataPelajaran, $slug)
    {
        $selectedMood = session('selected_mood', 'Biasa');
        $currentMood = \App\Models\Mood::where('user_id', Auth::id())->latest()->first();

        $material = Material::where('slug', $slug)
            ->where('kelas', $kelas)
            ->where('jurusan', $jurusan)
            ->where('mata_pelajaran', $mataPelajaran)
            ->whereNotNull('video_url')
            ->firstOrFail();

        $materials = Material::where('kelas', $kelas)
            ->where('jurusan', $jurusan)
            ->where('mata_pelajaran', $mataPelajaran)
            ->whereNotNull('video_url')
            ->orderBy('id')
            ->get();

        $currentIndex = $materials->search(fn ($item) => $item->id === $material->id);
        $previousMaterial = $currentIndex > 0 ? $materials[$currentIndex - 1] : null;
        $nextMaterial = $currentIndex < $materials->count() - 1 ? $materials[$currentIndex + 1] : null;

        return view('video.video', compact(
            'kelas',
            'jurusan',
            'mataPelajaran',
            'material',
            'selectedMood',
            'currentMood',
            'previousMaterial',
            'nextMaterial'
        ));
    }
}