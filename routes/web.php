<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Mood;
use App\Models\User;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\KuisController;
use App\Http\Controllers\MoodController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\KiKdController;
use App\Http\Controllers\MoodSelectionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/test', function () {
    return 'Test OK - Server is running!';
});

Route::get('/', function () {
    return redirect()->route('login');
});

// Auth routes
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    try {
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect to mood selection first
            return redirect()->route('mood.selection');
        }
    } catch (\Exception $e) {
        return back()->withErrors([
            'email' => 'Tidak dapat terhubung ke basis data. Pastikan server database berjalan dan konfigurasi .env sudah benar.',
        ])->withInput();
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ])->withInput();
});

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', function (Request $request) {
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
    ]);

    try {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        Auth::login($user);
    } catch (\Exception $e) {
        return back()->withErrors([
            'email' => 'Tidak dapat menyimpan pengguna. Pastikan server database berjalan dan konfigurasi .env sudah benar.',
        ])->withInput();
    }

    // Always redirect to mood selection for new users
    return redirect()->route('mood.selection');
});

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout');

// Routes yang memerlukan autentikasi
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        $currentMood = Mood::where('user_id', Auth::id())->latest()->first();
        $userMood = strtolower(session('user_mood', 'biasa'));
        $selectedMood = $userMood === 'biasa' ? 'Biasa' : ucfirst($userMood);
        
        // Redirect to mood picker if no mood selected in session
        if (!$userMood || $userMood === 'biasa') {
            return redirect()->route('mood.selection');
        }
        
        // Ambil data progress
        $totalMateri = \App\Models\Materi::count();
        $completedMateri = \App\Models\Progress::where('user_id', Auth::id())
            ->where('status', 'completed')
            ->distinct('materi_id')
            ->count('materi_id');
        
        // Ambil detail progress per materi
        $progressDetails = \App\Models\Materi::withCount(['progresses' => function ($query) {
            $query->where('user_id', Auth::id())->where('status', 'completed');
        }])->get()->map(function ($materi) {
            return (object)[
                'name' => $materi->title,
                'description' => $materi->description,
                'progress' => $materi->progresses_count > 0 ? 100 : 0
            ];
        });
        
        return view('dashboard', compact('currentMood', 'selectedMood', 'totalMateri', 'completedMateri', 'progressDetails'));
    })->name('dashboard');

    // Mood Picker (new workflow)
    Route::get('/mood-picker', function () {
        return view('mood-picker');
    })->name('mood.picker');

    // Adaptive mood selection routes
    Route::get('/pilih-mood', [MoodController::class, 'pilihMood'])->name('mood.pilih');
    Route::post('/set-mood', [MoodController::class, 'setMood'])->name('mood.set');
    Route::post('/dashboard/update-mood', [MoodController::class, 'updateMoodDashboard'])->name('mood.updateDashboard');

    // Mood selection
    Route::get('/mood', [MoodController::class, 'index'])->name('mood.index');
    Route::post('/mood', [MoodController::class, 'store'])->name('mood.store');
    Route::post('/mood/update', [MoodController::class, 'updateMood'])->name('mood.update');
    Route::post('/mood-picker/update', [MoodController::class, 'updateMood'])->name('mood.picker.update');

    // New lightweight mood-selection page (modern UI)
    Route::get('/mood-select', [MoodSelectionController::class, 'index'])->name('mood.selection');
    Route::post('/mood-select', [MoodSelectionController::class, 'store'])->name('mood.selection.store');

    // Materi routes - Adaptive structure
    Route::get('/materi', [MateriController::class, 'index'])->name('materi.index');
    Route::get('/materi/jurusan/{kelas}', [MateriController::class, 'jurusan'])->name('materi.jurusan');
    Route::get('/materi/mata-pelajaran/{kelas}/{jurusan}', [MateriController::class, 'mataPelajaran'])->name('materi.mata_pelajaran');
    Route::get('/materi/materi/{kelas}/{jurusan}/{mataPelajaran}', [MateriController::class, 'materi'])->name('materi.materi');
    Route::get('/materi/{id}', [MateriController::class, 'show'])->name('materi.show');
    Route::post('/materi/{id}/completed', [MateriController::class, 'markCompleted'])->name('materi.completed');

    // Video routes - Adaptive structure
    Route::get('/video', [VideoController::class, 'index'])->name('video.index');
    Route::get('/video/jurusan/{kelas}', [VideoController::class, 'jurusan'])->name('video.jurusan');
    Route::get('/video/mata-pelajaran/{kelas}/{jurusan}', [VideoController::class, 'mataPelajaran'])->name('video.mataPelajaran');
    Route::get('/video/{kelas}/{jurusan}/{mataPelajaran}/{slug}', [VideoController::class, 'show'])->name('video.show');

    // KI & KD
    Route::get('/ki-kd', [KiKdController::class, 'index'])->name('ki-kd');

    // Evaluasi (Kuis)
    Route::get('/kuis', [KuisController::class, 'index'])->name('kuis.index');
    Route::get('/kuis/{id}', [KuisController::class, 'show'])->name('kuis.show');
    Route::post('/kuis/{id}/submit', [KuisController::class, 'submit'])->name('kuis.submit');

    // Progress
    Route::get('/progress', [ProgressController::class, 'index'])->name('progress.index');
    Route::post('/progress', [ProgressController::class, 'store'])->name('progress.store');

    // Bantuan
    Route::get('/bantuan', function () {
        return view('bantuan');
    })->name('bantuan');

    // Profil
    Route::get('/profil', [ProfileController::class, 'index'])->name('profil.index');
    Route::post('/profil', [ProfileController::class, 'update'])->name('profil.update');
});