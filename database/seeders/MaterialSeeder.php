<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Material;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kelas 12 - RPL - Hardware
        Material::updateOrCreate(
            ['slug' => 'kelas-12-rpl-hardware-komponen'],
            [
                'kelas' => '12',
                'jurusan' => 'RPL',
                'mata_pelajaran' => 'Hardware',
                'title' => 'Pengenalan Komponen Hardware',
                'ringkasan' => 'Pelajari komponen-komponen penting dalam sebuah komputer.',
                'video_url' => 'https://youtu.be/Kq1PqZHAJmY?si=0Z3LW9r4MJV-dt_l', // Ganti dengan URL video Hardware RPL
                'content_fokus' => '<h3>Pengenalan Komponen Hardware - Tingkat Lanjut</h3>
            <p><strong>Definisi Hardware:</strong> Hardware adalah perangkat keras yang membentuk komputer secara fisik. Hardware terdiri dari komponen elektronik, mekanik, dan elektromekanik yang saling terhubung untuk memproses data dan menjalankan program.</p>
            
            <h4>Komponen Utama CPU (Central Processing Unit):</h4>
            <ul>
                <li><strong>ALU (Arithmetic Logic Unit):</strong> Melakukan operasi aritmatika dan logika. ALU dapat menjalankan operasi seperti penjumlahan, pengurangan, perbandingan, dan operasi logika AND/OR/NOT.</li>
                <li><strong>Control Unit:</strong> Mengontrol alur data dan instruksi. Control Unit mengambil instruksi dari memori, mendekodekannya, dan mengirim sinyal ke komponen lain untuk mengeksekusinya.</li>
                <li><strong>Register:</strong> Penyimpanan data cepat untuk proses. Register adalah memori internal CPU yang menyimpan data sementara selama eksekusi instruksi.</li>
                <li><strong>Cache Memory:</strong> Memori cepat yang menyimpan data yang sering diakses untuk mempercepat akses CPU.</li>
            </ul>
            
            <h4>Arsitektur dan Siklus Fetch-Execute:</h4>
            <p>CPU bekerja dengan siklus: Fetch → Decode → Execute → Store Result. Siklus ini berulang terus menerus dengan kecepatan clock CPU (dalam GHz).</p>
            <p><strong>Arsitektur Von Neumann:</strong> Model dasar komputer yang menyatukan unit pemrosesan, memori, dan I/O dalam satu sistem.</p>
            
            <h4>Jenis Memori:</h4>
            <ul>
                <li><strong>RAM (Random Access Memory):</strong> Volatile, kecepatan tinggi. Terdiri dari DRAM (untuk desktop) dan SRAM (untuk cache). Kapasitas RAM mempengaruhi multitasking.</li>
                <li><strong>ROM (Read Only Memory):</strong> Non-volatile, menyimpan BIOS dan firmware. BIOS adalah program pertama yang berjalan saat komputer dinyalakan.</li>
                <li><strong>Cache:</strong> Memori paling cepat, menyimpan data frequently accessed. Terdapat L1, L2, L3 cache dengan hierarki kecepatan.</li>
                <li><strong>Virtual Memory:</strong> Ekstensi RAM menggunakan hard disk space untuk menjalankan program yang membutuhkan memori lebih besar.</li>
            </ul>
            
            <h4>Komponen Pendukung Lain:</h4>
            <ul>
                <li><strong>Motherboard:</strong> Papan sirkuit utama yang menghubungkan semua komponen. Berisi chipset, slot ekspansi, dan konektor power.</li>
                <li><strong>GPU (Graphics Processing Unit):</strong> Spesialis untuk pemrosesan grafis. Modern GPU memiliki ribuan core untuk parallel processing.</li>
                <li><strong>Storage Devices:</strong> HDD (mekanik), SSD (flash memory), NVMe (ultra-fast SSD). RAID untuk redundancy dan performa.</li>
                <li><strong>Power Supply Unit (PSU):</strong> Mengkonversi AC ke DC dengan efisiensi 80+ rating. Modular PSU memudahkan kabel management.</li>
                <li><strong>Cooling System:</strong> Fan, heatsink, liquid cooling untuk mencegah overheating. Thermal paste meningkatkan konduksi panas.</li>
            </ul>
            
            <h4>Teknologi Terkini:</h4>
            <p>Multi-core processors (hingga 64 core), GPU computing dengan CUDA/OpenCL, NVMe storage dengan bandwidth hingga 7GB/s, DDR5 RAM dengan kecepatan 4800MHz+, dan PCIe 5.0 untuk koneksi ultra-cepat.</p>
            
            <h4>Troubleshooting Hardware:</h4>
            <p>Diagnosa masalah dengan POST beep codes, hardware monitoring tools, dan stress testing. Penting untuk ESD protection saat assembling.</p>',
                
                'content_biasa' => '<h3>Pengenalan Komponen Hardware</h3>
            <p>Hardware adalah perangkat keras yang membentuk komputer. Komponen utama meliputi CPU, memori, motherboard, storage, dan power supply.</p>
            
            <h4>Komponen Utama:</h4>
            <ul>
                <li><strong>CPU (Central Processing Unit):</strong> Otak komputer yang memproses semua perintah. Terdiri dari ALU, Control Unit, dan register.</li>
                <li><strong>Memori:</strong> RAM untuk penyimpanan sementara, ROM untuk firmware. Cache mempercepat akses data.</li>
                <li><strong>Motherboard:</strong> Papan utama yang menghubungkan semua komponen dengan slot dan konektor.</li>
                <li><strong>Storage:</strong> Hard Disk atau SSD untuk menyimpan file permanen. SSD lebih cepat dari HDD.</li>
                <li><strong>Power Supply:</strong> Memberikan daya ke semua komponen dengan efisiensi tinggi.</li>
                <li><strong>GPU:</strong> Untuk pemrosesan grafis dan gaming.</li>
            </ul>
            
            <h4>Fungsi Dasar:</h4>
            <p>Setiap komponen memiliki peran penting dalam membuat komputer berfungsi dengan baik dan efisien. Hardware modern mendukung multitasking dan aplikasi berat.</p>',
                
                'content_lelah' => '<h3>Hardware: Inti Utama</h3>
            <p>Hardware = bagian fisik komputer.</p>
            <ul>
                <li>CPU: Prosesor utama</li>
                <li>RAM: Memori sementara</li>
                <li>Storage: Tempat simpan file</li>
                <li>Motherboard: Papan penghubung</li>
                <li>Power Supply: Sumber daya</li>
            </ul>
            <p><em>Intinya: Komponen fisik yang membuat komputer bekerja.</em></p>',
            ]
        );

        // Kelas 11 - RPL - Pengenalan Pemrograman Dasar
        Material::updateOrCreate(
            ['slug' => 'kelas-11-rpl-pengenalan-pemrograman-dasar'],
            [
                'kelas' => '11',
                'jurusan' => 'RPL',
                'mata_pelajaran' => 'Pemrograman Dasar',
                'title' => 'Pengenalan Pemrograman Dasar',
                'ringkasan' => 'Pelajari dasar-dasar pemrograman untuk materi RPL kelas 11.',
                'video_url' => 'https://youtu.be/jGyYuQf-GeE?si=5GHncV4UlP3_K-lc', // Ganti dengan URL video Pemrograman Dasar
                'content_fokus' => '<h3>Pengenalan Pemrograman Dasar - Konsep Mendalam</h3>
            <p><strong>Definisi:</strong> Pemrograman adalah proses menulis instruksi agar komputer dapat melakukan tugas tertentu. Instruksi ditulis dalam bahasa pemrograman yang dapat dipahami manusia dan diterjemahkan ke bahasa mesin.</p>
            
            <h4>Konsep Utama:</h4>
            <ul>
                <li><strong>Variabel:</strong> Tempat menyimpan nilai. Tipe data: integer (bilangan bulat), float (desimal), string (teks), boolean (true/false), array (kumpulan data).</li>
                <li><strong>Tipe Data:</strong> String untuk teks, integer untuk bilangan, boolean untuk kondisi, array untuk kumpulan data. Type casting mengubah tipe data.</li>
                <li><strong>Kontrol Alur:</strong> If-else untuk percabangan, loop (for/while) untuk pengulangan, switch untuk multiple kondisi. Nested if untuk kondisi kompleks.</li>
                <li><strong>Fungsi:</strong> Kumpulan instruksi yang dapat dipanggil ulang. Parameter untuk input, return value untuk output. Modular programming dengan function decomposition.</li>
                <li><strong>Algoritma:</strong> Langkah-langkah logis untuk menyelesaikan masalah. Pseudocode sebagai representasi algoritma dalam bahasa natural.</li>
                <li><strong>Flowchart:</strong> Diagram visual algoritma dengan simbol start, process, decision, dan end.</li>
            </ul>
            
            <h4>Bahasa Pemrograman:</h4>
            <ul>
                <li><strong>Compiled:</strong> C++, Java - diterjemahkan ke machine code sebelum eksekusi.</li>
                <li><strong>Interpreted:</strong> Python, JavaScript - diterjemahkan baris per baris saat runtime.</li>
                <li><strong>High-level vs Low-level:</strong> High-level lebih mudah dibaca manusia, low-level lebih dekat dengan hardware.</li>
            </ul>
            
            <h4>Contoh Sederhana:</h4>
            <pre>// Python
nama = input("Masukkan nama: ")
nilai = int(input("Masukkan nilai: "))
if nilai >= 75:
    print(f"Selamat {nama}, kamu lulus!")
else:
    print(f"{nama}, coba lagi ya!")

# Fungsi
def hitung_rata_rata(daftar_nilai):
    total = sum(daftar_nilai)
    return total / len(daftar_nilai)</pre>
            
            <h4>Debugging dan Error Handling:</h4>
            <p>Syntax error (kesalahan penulisan), runtime error (kesalahan saat eksekusi), logical error (logika salah). Gunakan print statements, debugger, dan exception handling.</p>
            
            <p>Pelajari cara membuat program sederhana, membaca input, menampilkan output, dan mengorganisir kode dengan baik untuk maintainability.</p>',
                'content_biasa' => '<h3>Pengenalan Pemrograman Dasar</h3>
            <p>Pemrograman adalah cara memberi tahu komputer apa yang harus dilakukan melalui instruksi tertulis.</p>
            
            <h4>Hal-hal Penting:</h4>
            <ul>
                <li>Gunakan variabel untuk menyimpan data dengan tipe yang sesuai (string, number, boolean)</li>
                <li>Buat instruksi berulang dengan perulangan (for, while)</li>
                <li>Ambil keputusan dengan kondisi if-else</li>
                <li>Kelompokkan kode di dalam fungsi untuk reusability</li>
                <li>Buat algoritma dan flowchart sebelum coding</li>
            </ul>
            
            <h4>Bahasa Pemrograman:</h4>
            <p>Python mudah untuk pemula, C++ untuk performa tinggi, JavaScript untuk web development.</p>
            
            <p>Dengan pemrograman dasar, kamu bisa membuat program sederhana seperti kalkulator, kuis interaktif, atau pengelola data.</p>',
                'content_lelah' => '<h3>Pemrograman Dasar: Inti</h3>
            <p>Pemrograman = instruksi ke komputer.</p>
            <ul>
                <li>Variabel: Simpan data</li>
                <li>If: Keputusan</li>
                <li>Loop: Pengulangan</li>
                <li>Fungsi: Kode reusable</li>
            </ul>
            <p><em>Intinya: Tulis kode untuk mengontrol komputer.</em></p>',
            ]
        );

        // Kelas 11 - Multimedia - Grafika Komputer - Transformasi 2D
        Material::updateOrCreate(
            ['slug' => 'kelas-11-multimedia-grafika-transformasi-2d'],
            [
                'kelas' => '11',
                'jurusan' => 'Multimedia',
                'mata_pelajaran' => 'Grafika Komputer',
                'title' => 'Transformasi 2D',
                'ringkasan' => 'Belajar cara mengubah posisi, rotasi, dan ukuran objek 2D.',
                'video_url' => 'https://youtu.be/CJjHQtlIOkI?si=6BZoSWuHAH3p0n0P', // Ganti dengan URL video Transformasi 2D
            'content_fokus' => '<h3>Transformasi 2D - Penjelasan Komprehensif dan Matematis</h3>
            <p><strong>Definisi:</strong> Transformasi 2D adalah operasi matematika untuk mengubah posisi, orientasi, dan ukuran objek dalam ruang 2 dimensi. Transformasi ini fundamental dalam computer graphics, animasi, dan game development.</p>
            
            <h4>1. Translasi (Translation - Perpindahan)</h4>
            <p>Menggeser objek dari posisi awal ke posisi baru tanpa mengubah bentuk atau ukuran.</p>
            <p><strong>Rumus Matematis:</strong></p>
            <pre>x\' = x + tx
y\' = y + ty</pre>
            <p><strong>Matriks Transformasi:</strong></p>
            <pre>[1  0  tx] [x]   [x + tx]
[0  1  ty] [y] = [y + ty]
[0  0   1] [1]   [  1   ]</pre>
            <p><strong>Contoh:</strong> Geser titik (3,4) sejauh (2,5) → (5,9)</p>
            
            <h4>2. Rotasi (Rotation)</h4>
            <p>Memutar objek di sekitar titik pivot (biasanya origin atau center).</p>
            <p><strong>Rumus (berlawanan arah jarum jam):</strong></p>
            <pre>x\' = x cos(θ) - y sin(θ)
y\' = x sin(θ) + y cos(θ)</pre>
            <p><strong>Matriks:</strong></p>
            <pre>[cos(θ)  -sin(θ)  0] [x]   [x cosθ - y sinθ]
[sin(θ)   cos(θ)  0] [y] = [x sinθ + y cosθ]
[0        0       1] [1]   [      1       ]</pre>
            <p><strong>Contoh:</strong> Rotasi 90°: (1,0) → (0,1), (0,1) → (-1,0)</p>
            
            <h4>3. Scaling (Penskalaan)</h4>
            <p>Mengubah ukuran objek dengan faktor skala pada sumbu x dan y.</p>
            <p><strong>Rumus:</strong></p>
            <pre>x\' = x × sx
y\' = y × sy</pre>
            <p><strong>Matriks:</strong></p>
            <pre>[sx  0   0] [x]   [sx × x]
[0   sy  0] [y] = [sy × y]
[0   0   1] [1]   [  1   ]</pre>
            <p><strong>Uniform vs Non-uniform:</strong> sx = sy (uniform), sx ≠ sy (non-uniform)</p>
            
            <h4>4. Refleksi (Reflection)</h4>
            <p>Mencerminkan objek terhadap sumbu atau garis tertentu.</p>
            <p><strong>Terhadap sumbu X:</strong> y\' = -y, x\' = x</p>
            <p><strong>Terhadap sumbu Y:</strong> x\' = -x, y\' = y</p>
            <p><strong>Terhadap origin:</strong> x\' = -x, y\' = -y</p>
            
            <h4>5. Shearing</h4>
            <p>Menggeser bagian objek secara proporsional.</p>
            <p><strong>Shear X:</strong> x\' = x + shx × y, y\' = y</p>
            <p><strong>Shear Y:</strong> x\' = x, y\' = y + shy × x</p>
            
            <h4>6. Transformasi Kombinasi</h4>
            <p>Transformasi dapat digabungkan dengan mengalikan matriks-matriks transformasi secara berurutan.</p>
            <pre>T_kombinasi = T3 × T2 × T1</pre>
            <p><strong>Urutan penting:</strong> Translasi → Rotasi → Scaling menghasilkan hasil berbeda dari Scaling → Rotasi → Translasi.</p>
            
            <h4>Aplikasi Praktis:</h4>
            <ul>
                <li><strong>Grafika Komputer:</strong> Manipulasi objek dalam software seperti Photoshop, Illustrator</li>
                <li><strong>Game Development:</strong> Movement, rotation karakter dan objek</li>
                <li><strong>Animasi:</strong> Keyframe animation dengan transformasi</li>
                <li><strong>UI/UX:</strong> Hover effects, transitions</li>
            </ul>
            
            <h4>Implementasi dalam Kode:</h4>
            <p>Dalam bahasa pemrograman, transformasi diimplementasikan dengan matriks atau library seperti Canvas API, SVG transforms, atau game engines.</p>',
            
            'content_biasa' => '<h3>Transformasi 2D</h3>
            <p>Transformasi 2D adalah cara mengubah posisi, rotasi, dan ukuran objek dalam gambar 2 dimensi menggunakan matematika matriks.</p>
            
            <h4>Jenis-jenis Transformasi:</h4>
            <ul>
                <li><strong>Translasi:</strong> Menggeser objek dari satu posisi ke posisi lain dengan menambah koordinat</li>
                <li><strong>Rotasi:</strong> Memutar objek di sekitar titik pusat menggunakan trigonometri (cos, sin)</li>
                <li><strong>Scaling:</strong> Mengubah ukuran objek dengan faktor perbesaran pada sumbu x dan y</li>
                <li><strong>Refleksi:</strong> Mencerminkan objek terhadap sumbu x, y, atau origin</li>
                <li><strong>Shearing:</strong> Menggeser sebagian objek secara proporsional</li>
            </ul>
            
            <h4>Matriks Transformasi:</h4>
            <p>Setiap transformasi direpresentasikan dalam matriks 3x3 untuk kemudahan perhitungan dan kombinasi.</p>
            
            <h4>Penggunaan Praktis:</h4>
            <p>Transformasi 2D digunakan dalam desain grafis, animasi, game development, dan interface pengguna untuk manipulasi objek visual.</p>',
            
            'content_lelah' => '<h3>Transformasi 2D: Inti</h3>
            <p>Transformasi = ubah objek 2D.</p>
            <ul>
                <li>Translasi: Geser posisi</li>
                <li>Rotasi: Putar objek</li>
                <li>Scaling: Ubah ukuran</li>
                <li>Refleksi: Cerminkan</li>
            </ul>
            <p><em>Intinya: Matriks untuk mengubah gambar.</em></p>',
        ]);

        // Tambahan: Kelas 12 - Multimedia - Video Production - Editing Dasar
        Material::updateOrCreate(
            ['slug' => 'kelas-12-multimedia-video-editing-dasar'],
            [
                'kelas' => '12',
                'jurusan' => 'Multimedia',
                'mata_pelajaran' => 'Video Production',
                'title' => 'Dasar-Dasar Video Editing',
                'ringkasan' => 'Pelajari teknik dasar untuk mengedit video profesional.',
                'video_url' => 'https://youtu.be/MZZmJUYCsUk?si=hGPNFnv27jtOBKPh', // Ganti dengan URL video Video Editing
                'content_fokus' => '<h3>Video Editing - Teknik Profesional dan Workflow Komprehensif</h3>
            <p><strong>Definisi:</strong> Video editing adalah proses memanipulasi dan menyusun kembali footage video untuk menghasilkan produk final yang kohesif. Melibatkan teknik kreatif dan teknis untuk storytelling visual.</p>
            
            <h4>1. Pre-Production Planning:</h4>
            <ul>
                <li><strong>Storyboard:</strong> Visual planning urutan scene dan shot</li>
                <li><strong>Shot List:</strong> Daftar semua shot yang diperlukan</li>
                <li><strong>Script:</strong> Naskah dialog dan narasi</li>
                <li><strong>Logistics:</strong> Equipment, crew, location scouting</li>
            </ul>
            
            <h4>2. Teknik Editing Lanjutan:</h4>
            <ul>
                <li><strong>Timeline Editing:</strong> Penyusunan clip dalam urutan kronologis dengan multi-track layering</li>
                <li><strong>Cutting Techniques:</strong> Hard cut, J-cut, L-cut, match cut untuk transisi smooth</li>
                <li><strong>Pacing & Rhythm:</strong> Mengontrol tempo cerita melalui panjang shot dan transisi</li>
                <li><strong>Continuity Editing:</strong> Menjaga konsistensi aksi, posisi, dan waktu antar shot</li>
                <li><strong>Montage:</strong> Teknik penyuntingan cepat untuk menunjukkan waktu berlalu atau perubahan</li>
            </ul>
            
            <h4>3. Color Grading & Correction:</h4>
            <ul>
                <li><strong>Color Correction:</strong> Menyamakan exposure, white balance, dan color temperature</li>
                <li><strong>Color Grading:</strong> Stylistic color adjustment untuk mood dan aesthetic</li>
                <li><strong>LUTs (Look-Up Tables):</strong> Preset color grading untuk konsistensi</li>
                <li><strong>Scopes:</strong> Waveform, vectorscope, histogram untuk monitoring color</li>
            </ul>
            
            <h4>4. Visual Effects & Motion Graphics:</h4>
            <ul>
                <li><strong>Keying:</strong> Green screen removal dengan chroma key</li>
                <li><strong>Compositing:</strong> Menggabungkan multiple layers footage</li>
                <li><strong>Motion Graphics:</strong> Animasi teks, logo, dan shape dengan After Effects</li>
                <li><strong>Tracking:</strong> Motion tracking untuk efek yang mengikuti objek</li>
            </ul>
            
            <h4>5. Audio Mixing & Design:</h4>
            <ul>
                <li><strong>Audio Levels:</strong> Balancing dialog, music, SFX dengan fader dan automation</li>
                <li><strong>EQ & Filtering:</strong> Menyesuaikan frequency response</li>
                <li><strong>Compression:</strong> Mengontrol dynamic range audio</li>
                <li><strong>Reverb & Delay:</strong> Menambah depth dan space pada audio</li>
                <li><strong>ADR (Automated Dialog Replacement):</strong> Re-recording dialog untuk clarity</li>
            </ul>
            
            <h4>6. Format dan Codec:</h4>
            <ul>
                <li><strong>Production Codecs:</strong> ProRes (Apple), DNxHD (Avid) untuk editing</li>
                <li><strong>Delivery Codecs:</strong> H.264, H.265 untuk web; H.264 untuk broadcast</li>
                <li><strong>Container Formats:</strong> MP4, MOV, AVI, MKV</li>
                <li><strong>Resolution Standards:</strong> 1080p, 4K, 8K dengan frame rates 24fps, 30fps, 60fps</li>
            </ul>
            
            <h4>7. Software Tools:</h4>
            <ul>
                <li><strong>Adobe Premiere Pro:</strong> Industry standard untuk editing</li>
                <li><strong>DaVinci Resolve:</strong> Powerful color grading dan editing</li>
                <li><strong>Final Cut Pro:</strong> Mac-exclusive professional editor</li>
                <li><strong>Avid Media Composer:</strong> Hollywood standard</li>
                <li><strong>HitFilm Express:</strong> Free VFX software</li>
            </ul>
            
            <h4>8. Workflow Profesional:</h4>
            <ol>
                <li>Import dan organize footage dalam bins</li>
                <li>Rough cut untuk struktur dasar</li>
                <li>Fine cut dengan precision editing</li>
                <li>Add transitions dan effects</li>
                <li>Color correction dan grading</li>
                <li>Audio mixing dan sweetening</li>
                <li>Export dengan appropriate codec</li>
            </ol>
            
            <h4>9. Best Practices:</h4>
            <ul>
                <li>Backup project files regularly</li>
                <li>Use consistent naming conventions</li>
                <li>Maintain project organization</li>
                <li>Render proxies untuk smooth playback</li>
                <li>Color manage workflow dari acquisition hingga delivery</li>
            </ul>',
                
                'content_biasa' => '<h3>Dasar-Dasar Video Editing</h3>
            <p>Video editing adalah proses memotong, menyusun, dan menggabungkan video untuk membuat hasil akhir yang menarik.</p>
            
            <h4>Langkah-langkah Dasar:</h4>
            <ol>
                <li>Import footage ke software editor</li>
                <li>Organize clips dalam timeline</li>
                <li>Cut dan trim bagian yang tidak diperlukan</li>
                <li>Add transitions antar clip</li>
                <li>Adjust audio levels dan add music</li>
                <li>Color correction untuk konsistensi</li>
                <li>Export final video</li>
            </ol>
            
            <h4>Teknik Editing:</h4>
            <ul>
                <li>Cutting: Memotong footage</li>
                <li>Transitions: Fade, wipe, dissolve</li>
                <li>Color grading: Adjust warna untuk mood</li>
                <li>Audio mixing: Balance suara dan musik</li>
            </ul>
            
            <h4>Software Populer:</h4>
            <p>Adobe Premiere Pro, DaVinci Resolve, Final Cut Pro, atau iMovie untuk pemula.</p>',
                
                'content_lelah' => '<h3>Video Editing: Inti</h3>
            <p>Editing = potong dan gabung video.</p>
            <ul>
                <li>Import video</li>
                <li>Cut bagian buruk</li>
                <li>Add transisi</li>
                <li>Fix audio</li>
                <li>Export</li>
            </ul>
            <p><em>Intinya: Buat video jadi lebih bagus.</em></p>',
            ]
        );
    }
}

