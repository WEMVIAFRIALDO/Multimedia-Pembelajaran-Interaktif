<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Progress;
use App\Models\Material;
use Illuminate\Support\Facades\Auth;

class ProgressController extends Controller
{
    /**
     * Tampilkan progress user
     */
    public function index()
    {
        $user = Auth::user();
        $userMood = strtolower(session('user_mood', 'biasa'));

        $totalMateri = Material::count();
        $completedMateri = Progress::where('user_id', Auth::id())
            ->where('status', 'completed')
            ->distinct('materi_id')
            ->count('materi_id');

        $progressPercentage = $totalMateri > 0
            ? round(($completedMateri / $totalMateri) * 100)
            : 0;

        $averageQuizScore = Progress::where('user_id', Auth::id())
            ->whereNotNull('score')
            ->avg('score');

        $averageQuizScore = $averageQuizScore !== null
            ? round($averageQuizScore, 2)
            : null;

        $progresses = $user->progresses()->with(['materi', 'kuis'])->get();

        return view('progress.index', compact(
            'progresses',
            'userMood',
            'totalMateri',
            'completedMateri',
            'progressPercentage',
            'averageQuizScore'
        ));
    }

    /**
     * Simpan progress ketika user menandai materi/video selesai
     */
    public function store(Request $request)
    {
        $request->validate([
            'materi_id' => 'required|integer|exists:materials,id',
            'type' => 'nullable|string',
            'score' => 'nullable|numeric|min:0|max:100',
        ]);

        $userId = Auth::id();

        $progress = Progress::firstOrNew([
            'user_id' => $userId,
            'materi_id' => $request->materi_id,
        ]);

        $progress->status = 'completed';

        if ($request->filled('score')) {
            $progress->score = $request->score;
        }

        $progress->save();

        return back()->with('success', 'Progress berhasil disimpan.');
    }
}