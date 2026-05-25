<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kuis;
use App\Models\Material;

class KuisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hardware = Material::where('slug', 'kelas-12-rpl-hardware-komponen')->first();
        $pemrograman = Material::where('slug', 'kelas-11-rpl-pengenalan-pemrograman-dasar')->first();
        $transformasi = Material::where('slug', 'kelas-11-multimedia-grafika-transformasi-2d')->first();
        $videoEditing = Material::where('slug', 'kelas-12-multimedia-video-editing-dasar')->first();

        if (!$hardware || !$pemrograman || !$transformasi || !$videoEditing) {
            return;
        }

        Kuis::updateOrCreate(
            ['judul' => 'Kuis Pengenalan Komponen Hardware'],
            [
                'pertanyaan' => [
                    [
                        'pertanyaan' => 'Komponen mana yang berfungsi sebagai otak komputer?',
                        'pilihan' => [
                            'RAM',
                            'CPU',
                            'GPU',
                            'Storage',
                            'PSU',
                        ],
                    ],
                    [
                        'pertanyaan' => 'Fungsi utama RAM adalah...',
                        'pilihan' => [
                            'Menyimpan data permanen',
                            'Menjalankan sistem operasi',
                            'Menyimpan data sementara saat program berjalan',
                            'Menghubungkan komputer ke internet',
                            'Mengatur suhu CPU',
                        ],
                    ],
                    [
                        'pertanyaan' => 'Perangkat apa yang menyuplai daya ke semua komponen?',
                        'pilihan' => [
                            'Motherboard',
                            'Power Supply Unit',
                            'Hard Disk',
                            'Monitor',
                            'Keyboard',
                        ],
                    ],
                    [
                        'pertanyaan' => 'Media penyimpanan tercepat di bawah ini adalah...',
                        'pilihan' => [
                            'HDD',
                            'SSD SATA',
                            'NVMe',
                            'DVD',
                            'Flashdisk',
                        ],
                    ],
                    [
                        'pertanyaan' => 'Komponen manakah yang bertanggung jawab untuk memproses grafis?',
                        'pilihan' => [
                            'CPU',
                            'RAM',
                            'GPU',
                            'Motherboard',
                            'PSU',
                        ],
                    ],
                ],
                'jawaban_benar' => [1, 2, 1, 2, 2],
                'material_id' => $hardware->id,
            ]
        );

        Kuis::updateOrCreate(
            ['judul' => 'Kuis Pengenalan Pemrograman Dasar'],
            [
                'pertanyaan' => [
                    [
                        'pertanyaan' => 'Bahasa pemrograman yang digunakan untuk menulis logika disebut...',
                        'pilihan' => [
                            'Markup',
                            'Algoritma',
                            'Bahasa pemrograman',
                            'Framework',
                            'Database',
                        ],
                    ],
                    [
                        'pertanyaan' => 'Pernyataan yang umum digunakan untuk menampilkan teks di layar adalah...',
                        'pilihan' => [
                            'print()',
                            'listen()',
                            'mouseClick()',
                            'load()',
                            'save()',
                        ],
                    ],
                    [
                        'pertanyaan' => 'Struktur kontrol yang menerima keputusan disebut...',
                        'pilihan' => [
                            'Variabel',
                            'Loop',
                            'Kondisi (if/else)',
                            'Fungsi',
                            'Komentar',
                        ],
                    ],
                    [
                        'pertanyaan' => 'Jenis data yang biasanya menyimpan teks disebut...',
                        'pilihan' => [
                            'Integer',
                            'Boolean',
                            'String',
                            'Float',
                            'Array',
                        ],
                    ],
                    [
                        'pertanyaan' => 'Fungsi dalam pemrograman dibuat untuk...',
                        'pilihan' => [
                            'Menyimpan data secara permanen',
                            'Menjalankan kode berulang kali dari satu nama',
                            'Membuat desain halaman web',
                            'Menjaga keamanan jaringan',
                            'Mengganti variabel',
                        ],
                    ],
                ],
                'jawaban_benar' => [2, 0, 2, 2, 1],
                'material_id' => $pemrograman->id,
            ]
        );

        Kuis::updateOrCreate(
            ['judul' => 'Kuis Transformasi 2D'],
            [
                'pertanyaan' => [
                    [
                        'pertanyaan' => 'Transformasi 2D dalam grafika komputer meliputi...',
                        'pilihan' => [
                            'Rotasi, translasi, dan skala',
                            'Render 3D dan tekstur',
                            'Akses database',
                            'Komposisi audio',
                            'Pencetakan dokumen',
                        ],
                    ],
                    [
                        'pertanyaan' => 'Jika sebuah objek digeser ke kanan, jenis transformasinya adalah...',
                        'pilihan' => [
                            'Skala',
                            'Rotasi',
                            'Translasi',
                            'Refleksi',
                            'Shear',
                        ],
                    ],
                    [
                        'pertanyaan' => 'Transformasi yang mengubah ukuran objek disebut...',
                        'pilihan' => [
                            'Translasi',
                            'Skala',
                            'Rotasi',
                            'Refleksi',
                            'Warping',
                        ],
                    ],
                    [
                        'pertanyaan' => 'Rotasi objek dua dimensi biasanya dilakukan di sekitar...',
                        'pilihan' => [
                            'Sumbu Z',
                            'Sumbu X',
                            'Titik asal (origin)',
                            'Sumbu Y',
                            'Sumbu W',
                        ],
                    ],
                    [
                        'pertanyaan' => 'Transformasi yang menghasilkan bayangan cermin disebut...',
                        'pilihan' => [
                            'Skala',
                            'Translasi',
                            'Rotasi',
                            'Refleksi',
                            'Shear',
                        ],
                    ],
                ],
                'jawaban_benar' => [0, 2, 1, 2, 3],
                'material_id' => $transformasi->id,
            ]
        );

        Kuis::updateOrCreate(
            ['judul' => 'Kuis Dasar-Dasar Video Editing'],
            [
                'pertanyaan' => [
                    [
                        'pertanyaan' => 'Fungsi utama pemotongan (cut) dalam video editing adalah...',
                        'pilihan' => [
                            'Menambah durasi video',
                            'Menghapus bagian yang tidak dibutuhkan',
                            'Mengubah resolusi video',
                            'Menambahkan suara latar',
                            'Mencetak frame',
                        ],
                    ],
                    [
                        'pertanyaan' => 'Transisi video digunakan untuk...',
                        'pilihan' => [
                            'Membuat file lebih berat',
                            'Menjaga kualitas audio',
                            'Menghubungkan dua klip secara halus',
                            'Mengganti warna latar',
                            'Mempercepat render',
                        ],
                    ],
                    [
                        'pertanyaan' => 'Timeline pada perangkat lunak editing berfungsi untuk...',
                        'pilihan' => [
                            'Menampilkan teks saja',
                            'Mengatur urutan dan durasi klip',
                            'Membuat musik',
                            'Memfilter gambar',
                            'Mengirim file ke printer',
                        ],
                    ],
                    [
                        'pertanyaan' => 'Penggunaan audio di timeline biasanya bertujuan untuk...',
                        'pilihan' => [
                            'Menghancurkan kualitas suara',
                            'Mengatur volume dan durasi suara',
                            'Menambah subtitle secara otomatis',
                            'Membuat video lebih cepat',
                            'Mengganti codec video',
                        ],
                    ],
                    [
                        'pertanyaan' => 'Salah satu prinsip dasar editing video yang baik adalah...',
                        'pilihan' => [
                            'Menggabungkan klip tanpa memikirkan alur',
                            'Membuat transisi kasar sebanyak mungkin',
                            'Menjaga kontinuitas dan alur cerita',
                            'Menggunakan warna acak di setiap klip',
                            'Membuat semua klip berdurasi sama',
                        ],
                    ],
                ],
                'jawaban_benar' => [1, 2, 1, 1, 2],
                'material_id' => $videoEditing->id,
            ]
        );
    }
}