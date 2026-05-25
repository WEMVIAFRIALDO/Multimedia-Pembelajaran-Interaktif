<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kuis;
use App\Models\Progress;
use Illuminate\Support\Facades\Auth;

class KuisController extends Controller
{
    /**
     * Tampilkan daftar kuis
     */
    public function index()
    {
        $kuis = Kuis::with('material')->get();

        return view('kuis.index', compact('kuis'));
    }

    /**
     * Tampilkan kuis tertentu
     */
    public function show($id)
    {
        $kuis = Kuis::findOrFail($id);

        return view('kuis.show', compact('kuis'));
    }

    /**
     * Submit jawaban kuis
     */
    public function submit(Request $request, $id)
    {
        $kuis = Kuis::findOrFail($id);
        $user = Auth::user();

        $jawaban = $request->input('jawaban', []);
        $benar = $kuis->jawaban_benar;

        $score = 0;
        $answerDetails = [];

        foreach ($kuis->pertanyaan as $index => $pertanyaan) {
            $selectedIndex = $jawaban[$index] ?? null;
            $correctIndex = $benar[$index] ?? null;

            $selectedLabel = is_numeric($selectedIndex) && isset($pertanyaan['pilihan'][$selectedIndex])
                ? $pertanyaan['pilihan'][$selectedIndex]
                : 'Tidak dipilih';

            $correctLabel = is_numeric($correctIndex) && isset($pertanyaan['pilihan'][$correctIndex])
                ? $pertanyaan['pilihan'][$correctIndex]
                : 'Tidak tersedia';

            $isCorrect = $selectedIndex !== null && $selectedIndex == $correctIndex;

            if ($isCorrect) {
                $score++;
            }

            $answerDetails[] = [
                'pertanyaan' => $pertanyaan['pertanyaan'] ?? '',
                'selected_index' => $selectedIndex,
                'selected_label' => $selectedLabel,
                'correct_index' => $correctIndex,
                'correct_label' => $correctLabel,
                'is_correct' => $isCorrect,
                'options' => $pertanyaan['pilihan'] ?? [],
            ];
        }

        // Simpan progress
        Progress::updateOrCreate(
            ['user_id' => $user->id, 'kuis_id' => $id],
            ['status' => 'completed', 'score' => $score]
        );

        return view('kuis.result', compact('kuis', 'score', 'jawaban', 'answerDetails'));
    }
}