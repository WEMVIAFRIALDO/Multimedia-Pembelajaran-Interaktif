<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserMood;
use Illuminate\Support\Facades\Auth;

class MoodSelectionController extends Controller
{
    protected function normalizeMood(string $mood): ?string
    {
        $mood = strtolower(trim($mood));

        $map = [
            'fokus' => 'fokus',
            'focus' => 'fokus',
            'santai' => 'santai',
            'relax' => 'santai',
            'relaxed' => 'santai',
            'lelah' => 'lelah',
            'tired' => 'lelah',
        ];

        return $map[$mood] ?? null;
    }

    public function index()
    {
        return view('mood_selection');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'mood' => 'required|string|max:50',
        ]);

        $normalizedMood = $this->normalizeMood($data['mood']);
        \Log::info('MoodSelection store called', ['input' => $data['mood'], 'normalized' => $normalizedMood, 'user_id' => Auth::id()]);
        if (!$normalizedMood) {
            return response()->json([
                'status' => 'error',
                'message' => 'Pilihan mood tidak valid.',
            ], 422);
        }

        $mood = UserMood::create([
            'user_id' => Auth::id(),
            'mood' => $normalizedMood,
            'ip' => $request->ip(),
        ]);

        // store selected mood in session so other parts of app can adapt
        $request->session()->put('user_mood', $normalizedMood);
        $request->session()->put('selected_mood', ucfirst($normalizedMood));

        // return JSON with redirect URL so frontend can navigate
        return response()->json([
            'status' => 'ok',
            'id' => $mood->id,
            'redirect' => route('dashboard'),
        ]);
    }
}
