<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mood;
use Illuminate\Support\Facades\Auth;

class MoodController extends Controller
{
    /**
     * Normalize mood values so the app can accept English and Indonesian synonyms.
     */
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

    /**
     * Tampilkan halaman pilih mood
     */
    public function pilihMood()
    {
        return view('mood.pilih');
    }

    /**
     * Simpan mood yang dipilih ke session
     */
    public function setMood(Request $request)
    {
        $request->validate([
            'mood' => 'required|string',
        ]);

        $moodValue = $this->normalizeMood($request->input('mood'));
        \Log::info('setMood called', ['input' => $request->input('mood'), 'normalized' => $moodValue, 'user_id' => Auth::id()]);
        if (!$moodValue) {
            return back()->withErrors(['mood' => 'Pilihan mood tidak valid.']);
        }

        session(['user_mood' => $moodValue]);
        session(['selected_mood' => ucfirst($moodValue)]);

        return redirect()->route('dashboard');
    }

    /**
     * Update mood dari dashboard (via AJAX)
     */
    public function updateMoodDashboard(Request $request)
    {
        $request->validate([
            'mood' => 'required|string',
        ]);

        $moodValue = $this->normalizeMood($request->input('mood'));
        if (!$moodValue) {
            return response()->json([
                'success' => false,
                'message' => 'Pilihan mood tidak valid.',
            ], 422);
        }

        session(['user_mood' => $moodValue]);
        session(['selected_mood' => ucfirst($moodValue)]);

        return response()->json([
            'success' => true,
            'message' => 'Mood berhasil diperbarui',
            'mood' => $moodValue
        ], 200);
    }

    /**
     * Tampilkan form pemilihan mood
     */
    public function index()
    {
        $user = Auth::user();
        $currentMood = Mood::where('user_id', $user->id)->latest()->first();

        return view('mood.index', compact('currentMood'));
    }

    /**
     * Simpan mood yang dipilih (dari form)
     */
    public function store(Request $request)
    {
        $request->validate([
            'mood' => 'required|string',
        ]);

        $moodValue = $this->normalizeMood($request->mood);
        \Log::info('store mood called', ['input' => $request->mood, 'normalized' => $moodValue, 'user_id' => Auth::id()]);
        if (!$moodValue) {
            return back()->withErrors(['mood' => 'Pilihan mood tidak valid.']);
        }

        session(['user_mood' => $moodValue]);
        session(['selected_mood' => ucfirst($moodValue)]);

        Mood::create([
            'user_id' => Auth::id(),
            'mood' => $moodValue,
        ]);

        return redirect()->route('dashboard')->with('success', 'Mood berhasil disimpan!');
    }

    /**
     * Update mood via AJAX (API) - for mood picker (requires auth)
     */
    public function updateMood(Request $request)
    {
        \Log::info('Mood update request received', [
            'user_id' => Auth::id(),
            'user' => Auth::user(),
            'mood' => $request->mood,
            'is_authenticated' => Auth::check()
        ]);

        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'User not authenticated'
            ], 401);
        }

        $request->validate([
            'mood' => 'required|string',
        ]);

        $moodValue = $this->normalizeMood($request->mood);
        if (!$moodValue) {
            return response()->json([
                'success' => false,
                'message' => 'Pilihan mood tidak valid.'
            ], 422);
        }

        try {
            // Hapus mood lama
            Mood::where('user_id', Auth::id())->delete();

            // Buat mood baru
            Mood::create([
                'user_id' => Auth::id(),
                'mood' => $moodValue,
            ]);

            session(['user_mood' => $moodValue]);
            session(['selected_mood' => ucfirst($moodValue)]);

            return response()->json([
                'success' => true,
                'message' => 'Mood berhasil diperbarui',
                'mood' => $moodValue
            ], 200);
        } catch (\Exception $e) {
            \Log::error('Mood update error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui mood: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get current mood (API)
     */
    public function getCurrentMood()
    {
        try {
            $mood = Mood::where('user_id', Auth::id())
                ->latest()
                ->first();

            return response()->json([
                'success' => true,
                'mood' => $mood?->mood ?? null,
                'data' => $mood
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil mood: ' . $e->getMessage()
            ], 500);
        }
    }
}