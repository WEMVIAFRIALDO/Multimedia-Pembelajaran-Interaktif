<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Mood;
use App\Models\Progress;
use Illuminate\Support\Facades\Auth;

class MateriController extends Controller
{
    /**
     * Tampilkan daftar Kelas
     */
    private function getRawMood(): string
    {
        return strtolower(session('user_mood', 'biasa'));
    }

    private function getMoodLabel(string $mood): string
    {
        return $mood === 'biasa' ? 'Biasa' : ucfirst($mood);
    }

    public function index()
    {
        $userMood = $this->getRawMood();
        $selectedMood = $this->getMoodLabel($userMood);
        $currentMood = Mood::where('user_id', Auth::id())->latest()->first();
        
        // Get unique kelas
        $kelas = Material::select('kelas')->distinct()->orderBy('kelas', 'desc')->get();

        return view('materi.index', compact('kelas', 'selectedMood', 'currentMood'));
    }

    /**
     * Tampilkan Jurusan berdasarkan Kelas
     */
    public function jurusan($kelas)
    {
        $userMood = $this->getRawMood();
        $selectedMood = $this->getMoodLabel($userMood);
        $currentMood = Mood::where('user_id', Auth::id())->latest()->first();
        
        // Get unique jurusan for this kelas
        $jurusans = Material::where('kelas', $kelas)
            ->select('jurusan')
            ->distinct()
            ->get();

        return view('materi.jurusan', compact('kelas', 'jurusans', 'selectedMood', 'currentMood'));
    }

    /**
     * Tampilkan Mata Pelajaran berdasarkan Kelas dan Jurusan
     */
    public function mataPelajaran($kelas, $jurusan)
    {
        $userMood = $this->getRawMood();
        $selectedMood = $this->getMoodLabel($userMood);
        $currentMood = Mood::where('user_id', Auth::id())->latest()->first();
        
        // Get unique mata pelajaran
        $mataPelajarans = Material::where('kelas', $kelas)
            ->where('jurusan', $jurusan)
            ->select('mata_pelajaran')
            ->distinct()
            ->get();

        return view('materi.mata_pelajaran', compact('kelas', 'jurusan', 'mataPelajarans', 'selectedMood', 'currentMood'));
    }

    /**
     * Tampilkan Materi berdasarkan Kelas, Jurusan, dan Mata Pelajaran
     */
    public function materi($kelas, $jurusan, $mataPelajaran)
    {
        $userMood = $this->getRawMood();
        $selectedMood = $this->getMoodLabel($userMood);
        $currentMood = Mood::where('user_id', Auth::id())->latest()->first();
        
        // Get materials
        $materis = Material::where('kelas', $kelas)
            ->where('jurusan', $jurusan)
            ->where('mata_pelajaran', $mataPelajaran)
            ->get();

        return view('materi.materi', compact('kelas', 'jurusan', 'mataPelajaran', 'materis', 'selectedMood', 'currentMood'));
    }

    /**
     * Tampilkan detail Materi dengan content berdasarkan mood
     */
    public function show($id)
    {
        $material = Material::findOrFail($id);
        $userMood = $this->getRawMood();
        $selectedMood = $this->getMoodLabel($userMood);

        // Tentukan content berdasarkan mood
        if ($userMood === 'fokus') {
            $content = $material->content_fokus;
        } elseif ($userMood === 'lelah') {
            $content = $material->content_lelah;
        } else {
            $content = $material->content_biasa;
        }

        return view('materi.show', compact('material', 'selectedMood', 'content'));
    }

    /**
     * Mark materi as completed
     */
    public function markCompleted($id)
    {
        $userId = Auth::id();
        $material = Material::findOrFail($id);

        // Create or update progress
        Progress::updateOrCreate(
            ['user_id' => $userId, 'materi_id' => $id],
            ['status' => 'completed']
        );

        return redirect()->back()->with('success', 'Materi ditandai selesai!');
    }
}