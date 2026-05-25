<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Progress;
use Illuminate\Support\Facades\Auth;

class KiKdController extends Controller
{
    /**
     * Tampilkan halaman KI & KD dengan Progress Tracking
     */
    public function index()
    {
        $selectedMood = session('selected_mood', 'Biasa');
        $userMood = strtolower(session('user_mood', 'biasa'));

        // Data KI & KD berdasarkan Mata Pelajaran
        $kiKdData = [
            'RPL' => [
                'mata_pelajaran' => 'Hardware',
                'kompetensi_inti' => [
                    'KI 3' => 'Memahami, menerapkan, dan menganalisis pengetahuan faktual, konseptual, prosedural, dan metakognitif berdasarkan rasa ingin tahunya tentang ilmu pengetahuan, teknologi, seni, budaya, dan humaniora dengan wawasan kemanusiaan, kebangsaan, kenegaraan, dan peradaban terkait penyebab fenomena dan kejadian, serta menerapkan pengetahuan prosedural pada bidang kajian yang spesifik sesuai dengan bakat dan minatnya untuk memecahkan masalah.',
                    'KI 4' => 'Mengolah, menalar, dan menyaji dalam ranah konkret dan ranah abstrak terkait dengan pengembangan dari yang dipelajarinya di sekolah secara mandiri, bertindak secara efektif dan kreatif, serta mampu menggunakan metode sesuai kaidah keilmuan.',
                ],
                'kompetensi_dasar' => [
                    [
                        'kode' => 'KD 3.4',
                        'deskripsi' => 'Menganalisis jaringan komputer',
                        'detail' => [
                            'Memahami topologi jaringan (star, ring, bus, mesh)',
                            'Menganalisis kelebihan dan kekurangan setiap topologi',
                            'Memahami OSI Model dan TCP/IP',
                            'Mengidentifikasi perangkat jaringan (router, switch, modem)',
                        ],
                        'slug' => 'kelas-12-rpl-hardware-komponen', // Untuk tracking progress
                    ],
                    [
                        'kode' => 'KD 3.5',
                        'deskripsi' => 'Menyusun algoritma',
                        'detail' => [
                            'Memahami dasar-dasar algoritma',
                            'Menerapkan struktur kontrol (if, loop, switch)',
                            'Menggunakan array dan struktur data',
                            'Menganalisis kompleksitas algoritma (Big O)',
                        ],
                        'slug' => 'kelas-11-rpl-pengenalan-pemrograman-dasar',
                    ],
                ],
            ],
            'Multimedia' => [
                'mata_pelajaran' => 'Grafika Komputer',
                'kompetensi_inti' => [
                    'KI 3' => 'Memahami, menerapkan, dan menganalisis pengetahuan faktual, konseptual, prosedural, dan metakognitif berdasarkan rasa ingin tahunya tentang ilmu pengetahuan, teknologi, seni, budaya, dan humaniora dengan wawasan kemanusiaan, kebangsaan, kenegaraan, dan peradaban terkait penyebab fenomena dan kejadian, serta menerapkan pengetahuan prosedural pada bidang kajian yang spesifik sesuai dengan bakat dan minatnya untuk memecahkan masalah.',
                    'KI 4' => 'Mengolah, menalar, dan menyaji dalam ranah konkret dan ranah abstrak terkait dengan pengembangan dari yang dipelajarinya di sekolah secara mandiri, bertindak secara efektif dan kreatif, serta mampu menggunakan metode sesuai kaidah keilmuan.',
                ],
                'kompetensi_dasar' => [
                    [
                        'kode' => 'KD 3.1',
                        'deskripsi' => 'Transformasi 2D (Translasi, Rotasi, Scaling)',
                        'detail' => [
                            'Memahami konsep transformasi geometri 2D',
                            'Menerapkan translasi (perpindahan objek)',
                            'Menerapkan rotasi (perputaran objek)',
                            'Menerapkan scaling (perubahan ukuran)',
                            'Mengombinasikan transformasi kompleks',
                        ],
                        'slug' => 'kelas-11-multimedia-grafika-transformasi-2d',
                    ],
                    [
                        'kode' => 'KD 3.2',
                        'deskripsi' => 'Teknik Rendering dan Lighting',
                        'detail' => [
                            'Memahami model pencahayaan (Phong, Lambert)',
                            'Mengaplikasikan shadow mapping',
                            'Menggunakan texture mapping',
                            'Optimasi rendering untuk performa optimal',
                        ],
                        'slug' => null, // Tidak ada materi terkait di sini
                    ],
                ],
            ],
        ];

        // Ambil progress user untuk semua materi
        $userProgress = [];
        if (Auth::check()) {
            // Cari progress berdasarkan slug materi
            foreach ($kiKdData as $jurusan => $data) {
                foreach ($data['kompetensi_dasar'] as $kd) {
                    if ($kd['slug']) {
                        // Cek apakah ada progress untuk materi ini
                        $progress = Progress::where('user_id', Auth::id())
                            ->where('status', 'completed')
                            ->whereHas('materi', function ($query) use ($kd) {
                                $query->where('slug', $kd['slug']);
                            })
                            ->first();

                        $userProgress[$kd['slug']] = $progress ? true : false;
                    }
                }
            }
        }

        return view('ki-kd', compact('kiKdData', 'userProgress', 'selectedMood', 'userMood'));
    }
}

