<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'name' => 'SIGAP',
                'supervisor' => 'MDB',
                'type' => 'web',
                'logo' => null,
                'tagline' => 'Sistem Perlindungan Darurat & Pelaporan Kekerasan Seksual Berbasis AI',
                'description' => 'SIGAP adalah aplikasi mobile darurat yang dirancang untuk melindungi korban kekerasan seksual. Dilengkapi tombol SOS satu sentuh dengan perekaman audio real-time, pelacak GPS berkala, chatbot AI pendamping, dan portal admin & psikolog untuk manajemen laporan secara menyeluruh.',
                'features' => [
                    'Pelaporan kekerasan seksual dengan kode pelacak unik (tracking code)',
                    'Fitur Darurat SOS — tombol satu sentuh dengan perekaman audio otomatis real-time & notifikasi instan ke admin',
                    'Pembaruan lokasi GPS korban secara periodik saat mode darurat aktif',
                    'Mode Pantau — sesi pemantauan dengan check-in GPS berkala (heartbeat)',
                    'Portal Admin & Psikolog — manajemen siklus laporan terintegrasi',
                    'Chatbot AI pendamping untuk dukungan awal korban'
                ],
                'funding_awards' => [
                    'Juara 2 — Essay and Business Plan Competition in Edutalk Fair Competition 2026, Universitas Diponegoro',
                    'Gold Medal — Essay and Business Plan Competition in Edutalk Fair Competition 2026, Universitas Diponegoro',
                    'Best Idea — Essay and Business Plan Competition in Edutalk Fair Competition 2026, Universitas Diponegoro',
                    'Juara 1 — National Essay Competition (NEC) 2026, Paguyuban Karya Salemba Empat Universitas Hasanuddin',
                    'Juara 2 — Hackathon ExplorAItion Batch 5 Jagoanhosting Garudaspark'
                ],
                'tech_field' => 'AI',
                'prestasi_level' => 'nasional',
                'partners' => [],
                'team_members' => [
                    [
                        'nickname' => 'Sulthonika',
                        'fullname' => 'Sulthonika Mahfudz Al Mujahidin',
                        'role' => 'Team Lead & Mobile Developer',
                        'photo' => '/img/sigap/sulthon.jpg',
                        'social_media' => ['instagram' => 'https://www.instagram.com/sulthonika_/'],
                        'linkedin' => null
                    ],
                    [
                        'nickname' => 'Alifia',
                        'fullname' => 'Nur Alifia Rustan',
                        'role' => 'UI/UX Designer & Frontend Developer',
                        'photo' => '/img/sigap/alifia.jpg',
                        'social_media' => ['instagram' => 'https://www.instagram.com/nralifial/'],
                        'linkedin' => null
                    ],
                    [
                        'nickname' => 'Michael',
                        'fullname' => 'Michael Angello Qadosy Riyadi',
                        'role' => 'Backend Developer & AI Integration',
                        'photo' => '/img/sigap/michael.jpg',
                        'social_media' => ['instagram' => 'https://www.instagram.com/nnichael.angello/'],
                        'linkedin' => 'https://www.linkedin.com/in/michaelangelloqr?utm_source=ig&utm_medium=social&utm_content=link_in_bio&fbclid=PAZXh0bgNhZW0CMTEAc3J0YwZhcHBfaWQPOTM2NjE5NzQzMzkyNDU5AAGn8BjhOy-gZMw4fxRy3TE-vSXRN6n1XywWWlhfk2MNC_h4YUow9K0ZPmqowNw_aem_ul7gB8QS9dWqQ8-bBmmtuA'
                    ]
                ],
                'external_url' => 'http://sigap.it-showcase.tusbind.ac.id',
                'video_url' => null,
                'screenshots' => null
            ],
            [
                'name' => 'TA Peres',
                'supervisor' => 'MDB',
                'type' => 'web',
                'logo' => 'peres.svg',
                'tagline' => 'Platform Analisis & Prediksi Kelayakan Kredit Mikro',
                'description' => 'Platform cerdas berbasis web untuk membantu Koperasi dan Lembaga Keuangan Mikro menilai kelayakan kredit calon debitur menggunakan algoritma Machine Learning XGBoost secara akurat.',
                'features' => [
                    'Prediksi Credit Scoring Instan dengan Input Parameter Keuangan',
                    'Visualisasi Grafik Risiko & Rasio Rasio Keuangan Debitur',
                    'Generator Laporan Kelayakan Kredit PDF Otomatis',
                    'Sistem Manajemen Data Debitur Terpusat'
                ],
                'funding_awards' => [
                    'Pendanaan Skema Tugas Akhir Unggulan Universitas 2025',
                    'Sertifikasi Hak Cipta Program Komputer Kementerian Hukum & HAM'
                ],
                'tech_field' => 'AI',
                'prestasi_level' => 'nasional',
                'partners' => [
                    'Koperasi Simpan Pinjam Mitra Mandiri Sidoarjo',
                    'Bank Pembangunan Daerah Jawa Timur (Bank Jatim)'
                ],
                'team_members' => [
                    [
                        'nickname' => 'Peres',
                        'fullname' => 'Peres Prasetyo',
                        'role' => 'Lead AI Engineer',
                        'photo' => 'avatar4.png',
                        'social_media' => ['instagram' => 'https://instagram.com/'],
                        'linkedin' => 'https://linkedin.com/in/'
                    ],
                    [
                        'nickname' => 'Danu',
                        'fullname' => 'Danu Wijaya',
                        'role' => 'Fullstack Developer',
                        'photo' => 'avatar1.png',
                        'social_media' => ['instagram' => 'https://instagram.com/'],
                        'linkedin' => 'https://linkedin.com/in/'
                    ]
                ],
                'external_url' => 'https://creditscore-peres.test',
                'video_url' => null,
                'screenshots' => null
            ],
            [
                'name' => 'TA Rizal',
                'supervisor' => 'MDB',
                'type' => 'web',
                'logo' => 'rizal.svg',
                'tagline' => 'Web Dashboard Monitoring Kualitas Air Tambak Pintar Berbasis IoT',
                'description' => 'Dashboard web interaktif untuk memonitor parameter kualitas air tambak udang (pH, salinitas, suhu, dan kadar oksigen terlarut) secara real-time yang terhubung dengan sensor IoT di lapangan.',
                'features' => [
                    'Grafik Live Chart Sensor Air Interaktif',
                    'Kontrol Saklar Aerator Jarak Jauh (Remote Aeration Control)',
                    'Sistem Notifikasi Bahaya Kualitas Air via WhatsApp API',
                    'Penyimpanan Riwayat Sensor & Ekspor Laporan Excel'
                ],
                'funding_awards' => [
                    'Juara 2 Kompetisi Inovasi Teknologi Tepat Guna Tingkat Regional',
                    'Pendanaan Hibah Inovasi Tugas Akhir Vokasi'
                ],
                'tech_field' => 'IoT',
                'prestasi_level' => 'nasional',
                'partners' => [
                    'Kelompok Petani Tambak Udang Windu Sidoarjo',
                    'Dinas Perikanan dan Kelautan Kabupaten Sidoarjo'
                ],
                'team_members' => [
                    [
                        'nickname' => 'Rizal',
                        'fullname' => 'Rizal Hidayat',
                        'role' => 'IoT Hardware & Embed Programmer',
                        'photo' => 'avatar2.png',
                        'social_media' => ['instagram' => 'https://instagram.com/'],
                        'linkedin' => 'https://linkedin.com/in/'
                    ],
                    [
                        'nickname' => 'Eko',
                        'fullname' => 'Eko Prasetya',
                        'role' => 'Web App Developer',
                        'photo' => 'avatar1.png',
                        'social_media' => ['instagram' => 'https://instagram.com/'],
                        'linkedin' => 'https://linkedin.com/in/'
                    ]
                ],
                'external_url' => 'https://tambakmonitoring-rizal.test',
                'video_url' => null,
                'screenshots' => null
            ],
            [
                'name' => 'Wongponik',
                'supervisor' => 'MDB',
                'type' => 'mobile',
                'logo' => '/img/ta-steven/logo_wongponik.png',
                'tagline' => 'Sistem Monitoring & Deteksi Anomali Sensor Hidroponik',
                'description' => 'Wongponik adalah platform monitoring budidaya tanaman hidroponik berbasis mobile terintegrasi IoT untuk melakukan deteksi anomali pada sensor secara real-time. Dengan pendeteksian dini terhadap ketidakwajaran data sensor (suhu, pH, nutrisi), petani dapat mencegah kegagalan panen dan menjaga kualitas tanaman secara optimal.',
                'features' => [
                    'Anomaly Detection pada data sensor secara real-time berbasis IoT',
                    'Monitoring parameter penting hidroponik (suhu air, pH, dan kepekatan nutrisi/TDS)',
                    'Notifikasi peringatan dini otomatis ketika mendeteksi pembacaan sensor yang tidak wajar'
                ],
                'funding_awards' => [],
                'tech_field' => 'IoT',
                'prestasi_level' => 'nasional',
                'partners' => [],
                'team_members' => [
                    [
                        'nickname' => 'Steven',
                        'fullname' => 'Steven Andre Gonassis',
                        'role' => 'Mobile App & Backend Developer',
                        'photo' => '/img/ta-steven/anggota/Steven.jpeg',
                        'social_media' => ['instagram' => 'https://www.instagram.com/stevenandre._/'],
                        'linkedin' => 'https://linkedin.com/in/stevenandregonassis/'
                    ],
                    [
                        'nickname' => 'Aldi',
                        'fullname' => 'Reinaldi Battung',
                        'role' => 'IoT Engineer',
                        'photo' => '/img/ta-steven/anggota/Aldi.jpeg',
                        'social_media' => ['instagram' => 'https://www.instagram.com/reinaldibattung49_/'],
                        'linkedin' => null
                    ]
                ],
                'external_url' => null,
                'video_url' => 'https://youtu.be/oPESmDoLzIM',
                'screenshots' => [
                    '/img/ta-steven/ui-app/iPhone 16 Pro Max - 1.png',
                    '/img/ta-steven/ui-app/iPhone 16 Pro Max - 2.png',
                    '/img/ta-steven/ui-app/iPhone 16 Pro Max - 3.png',
                    '/img/ta-steven/ui-app/iPhone 16 Pro Max - 4.png',
                    '/img/ta-steven/ui-app/Aplikasi WongPonik.png'
                ],
                'documentations' => [
                    '/img/ta-steven/dokumentasi/arsitektur final.jpeg'
                ]
            ],
            [
                'name' => 'VROOM',
                'supervisor' => 'MDB',
                'type' => 'hardware',
                'logo' => '/img/vroom/logo_vroom.jpeg',
                'tagline' => 'Media Pembelajaran Membaca Berbasis VR untuk Anak Disleksia',
                'description' => 'Media pembelajaran berbasis Virtual Reality (VR) yang dirancang untuk membantu anak penyandang disleksia meningkatkan kemampuan membaca melalui pengalaman belajar yang interaktif dan menyenangkan. Dengan menggabungkan teknologi VR dan gamifikasi, VROOM menghadirkan aktivitas belajar yang lebih menarik, meningkatkan fokus, motivasi, serta membantu anak mengenali huruf dan kata dengan lebih efektif.',
                'features' => [
                    'Simulasi Virtual Reality (VR) Interaktif untuk Belajar Membaca',
                    'Metode Gamifikasi untuk Meningkatkan Motivasi dan Fokus Belajar',
                    'Aktivitas Pengenalan Huruf dan Kata yang Dirancang Khusus untuk Anak Disleksia',
                    'Visualisasi 3D yang Menarik untuk Mempermudah Pemahaman'
                ],
                'funding_awards' => [
                    'Pendanaan Innovillage 2024 sebesar Rp 14.127.223'
                ],
                'tech_field' => 'VR/AR',
                'prestasi_level' => 'nasional',
                'partners' => [
                    'INNOVILLAGE 2024'
                ],
                'team_members' => [
                    [
                        'nickname' => 'Ary',
                        'fullname' => 'I Made Ary Widnyana',
                        'photo' => '/img/vroom/ary.png',
                        'social_media' => ['instagram' => 'https://www.instagram.com/arywidn/'],
                        'linkedin' => null
                    ],
                    [
                        'nickname' => 'Elsa',
                        'fullname' => 'Elsa Ajeng Pratiwi',
                        'photo' => '/img/vroom/elsa.png',
                        'social_media' => ['instagram' => 'https://www.instagram.com/elsajengg/'],
                        'linkedin' => null
                    ],
                    [
                        'nickname' => 'Ogik',
                        'fullname' => 'Dimas Ogi Putra P.',
                        'photo' => '/img/vroom/ogik.jpeg',
                        'social_media' => ['instagram' => 'https://www.instagram.com/ogikbfyre/'],
                        'linkedin' => null
                    ]
                ],
                'external_url' => null,
                'video_url' => 'https://youtu.be/6Fzz_Gu5S3I?si=Sr2b1ZftxNO6934T',
                'screenshots' => null,
                'documentations' => [
                    '/img/vroom/dokumentasi_vroom1.jpg',
                    '/img/vroom/dokumentasi_vroom2.jpg',
                    '/img/vroom/dokumentasi_vroom3.jpeg'
                ]
            ],
            [
                'name' => 'Jejak Tanahku',
                'supervisor' => 'MDB',
                'type' => 'web',
                'logo' => '/img/ta-rafli/logo_jejak_tanahku.png',
                'tagline' => 'Sistem Pencatatan dan Validasi Riwayat Sertifikat Tanah Terintegrasi Blockchain',
                'description' => 'Jejak Tanahku adalah platform inovatif berbasis web terintegrasi blockchain yang dirancang untuk meningkatkan keamanan, transparansi, dan efisiensi dalam pencatatan hak atas tanah. Platform ini mengurangi ketergantungan pada pihak ketiga dan bekerjasama langsung dengan Kantor Pertanahan Kota Surabaya II.',
                'features' => [
                    'Integrasi Blockchain untuk validasi dan pencatatan riwayat tanah secara terdesentralisasi',
                    'Mengurangi Ketergantungan pada Pihak Ketiga dengan proses verifikasi mandiri yang aman',
                    'Keamanan Lebih Baik dengan enkripsi tingkat tinggi untuk perlindungan data kepemilikan'
                ],
                'funding_awards' => [],
                'tech_field' => 'Networking & Cyber Security',
                'prestasi_level' => 'nasional',
                'partners' => [
                    'Kantor Pertanahan Kota Surabaya II'
                ],
                'team_members' => [
                    [
                        'nickname' => 'Rafli',
                        'fullname' => 'Rafli Haidar Nashif',
                        'role' => 'Lead Developer & Blockchain Engineer',
                        'photo' => null,
                        'social_media' => ['instagram' => 'https://www.instagram.com/rafli_haidarn/'],
                        'linkedin' => 'https://www.linkedin.com/in/rafli-haidar-nashif/'
                    ]
                ],
                'external_url' => 'http://ta-rafli.it-showcase.tusbind.ac.id',
                'video_url' => null,
                'screenshots' => null
            ],
            [
                'name' => 'TA Cisa',
                'supervisor' => 'MDB',
                'type' => 'hardware',
                'logo' => 'cisa.svg',
                'tagline' => 'Smart Wheelchair: Kursi Roda Elektrik dengan Kontrol Head-Gesture',
                'description' => 'Kursi roda elektrik modular yang dikendalikan melalui sensor kemiringan kepala (IMU) yang ditempatkan di kepala pengguna, dirancang khusus untuk penderita kelumpuhan motorik seluruh tubuh.',
                'features' => [
                    'Kontrol Gerak Maju, Mundur, Belok Berbasis Akselerometer Kepala',
                    'Sistem Deteksi Halangan Otomatis Menggunakan Sensor Ultrasonik',
                    'Sistem Pengereman Darurat Ketika Mendeteksi Turunan Tajam',
                    'Indikator Kapasitas Baterai & Status Kursi Roda Melalui Buzzer & LCD'
                ],
                'funding_awards' => [
                    'Medali Perunggu Pekan Ilmiah Mahasiswa Nasional (PIMNAS) 2025 Bidang Karsa Cipta',
                    'Pendanaan Prototipe Tugas Akhir Vokasi'
                ],
                'tech_field' => 'IoT',
                'prestasi_level' => 'nasional',
                'partners' => [
                    'Yayasan Disabilitas Fisik Mandiri Surabaya',
                    'Laboratorium Sensor & Instrumentasi Universitas'
                ],
                'team_members' => [
                    [
                        'nickname' => 'Cisa',
                        'fullname' => 'Cisa Lestari',
                        'role' => 'Hardware Design & Mechanical Engineer',
                        'photo' => 'avatar3.png',
                        'social_media' => ['instagram' => 'https://instagram.com/'],
                        'linkedin' => 'https://linkedin.com/in/'
                    ],
                    [
                        'nickname' => 'Jono',
                        'fullname' => 'Jono Suharjo',
                        'role' => 'Firmware & Embedded Systems Dev',
                        'photo' => 'avatar2.png',
                        'social_media' => ['instagram' => 'https://instagram.com/'],
                        'linkedin' => 'https://linkedin.com/in/'
                    ]
                ],
                'external_url' => null,
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'screenshots' => null
            ],
            [
                'name' => 'PCD Adis',
                'supervisor' => 'FZK',
                'type' => 'mobile',
                'logo' => 'adis.svg',
                'tagline' => 'Deteksi Kematangan Buah Naga Merah Melalui Analisis Warna HSL',
                'description' => 'Aplikasi berbasis Android untuk membantu petani menentukan waktu panen buah naga merah secara presisi dengan memproses spektrum warna kulit buah menggunakan algoritma pengolahan citra HSL.',
                'features' => [
                    'Analisis Nilai HSL (Hue, Saturation, Lightness) Kulit Buah Naga',
                    'Klasifikasi Kematangan Menjadi 3 Fase: Belum Matang, Matang, Terlalu Matang',
                    'Rekomendasi Waktu Penyimpanan & Daya Tahan Buah Pasca Panen',
                    'Pencatatan Sejarah Pemindaian Berbasis Lokasi GPS'
                ],
                'funding_awards' => [
                    'Pendanaan PKM Karya Cipta (PKM-KC) Kemendikbudristek 2025',
                    'Sertifikat Paten Sederhana Metode Analisis Warna Buah'
                ],
                'tech_field' => 'AI',
                'prestasi_level' => 'nasional',
                'partners' => [
                    'Perkebunan Buah Naga Subur Makmur Pasuruan',
                    'Asosiasi Hortikultura Jawa Timur'
                ],
                'team_members' => [
                    [
                        'nickname' => 'Adis',
                        'fullname' => 'Adis Setyawan',
                        'role' => 'Lead Image Processing Developer',
                        'photo' => 'avatar4.png',
                        'social_media' => ['instagram' => 'https://instagram.com/'],
                        'linkedin' => 'https://linkedin.com/in/'
                    ],
                    [
                        'nickname' => 'Kezia',
                        'fullname' => 'Kezia Amanda',
                        'role' => 'Android Developer',
                        'photo' => 'avatar3.png',
                        'social_media' => ['instagram' => 'https://instagram.com/'],
                        'linkedin' => 'https://linkedin.com/in/'
                    ]
                ],
                'external_url' => null,
                'video_url' => null,
                'screenshots' => [
                    'https://placehold.co/360x640/0f3460/ffffff?text=Adis+UI+1',
                    'https://placehold.co/360x640/16213e/ffffff?text=Adis+UI+2'
                ]
            ],
            [
                'name' => 'Mobile Dwiki',
                'supervisor' => 'MUN',
                'type' => 'mobile',
                'logo' => 'dwiki.svg',
                'tagline' => 'Aplikasi Monitoring Kesehatan Lansia & Deteksi Jatuh Berbasis IoT Smartband',
                'description' => 'Aplikasi monitoring kesehatan terintegrasi yang terhubung dengan smartband untuk memantau detak jantung, pola tidur, dan secara instan mendeteksi jika terjadi jatuh (fall detection) pada lansia.',
                'features' => [
                    'sinkronisasi Detak Jantung dan Langkah Kaki via Bluetooth Smartband',
                    'Algoritma Deteksi Jatuh Berbasis Akselerometer di Smartphone/Smartband',
                    'Pengiriman SMS Darurat & Koordinat GPS Langsung ke Keluarga',
                    'Laporan Kebugaran Mingguan Lansia dalam Grafik Interaktif'
                ],
                'funding_awards' => [
                    'Juara 3 Lomba Karya Tulis Ilmiah Nasional (LKTIN) Inovasi Teknologi 2025',
                    'Pendanaan Akselerasi Inkubasi Bisnis Mahasiswa Universitas'
                ],
                'tech_field' => 'IoT',
                'prestasi_level' => 'nasional',
                'partners' => [
                    'Puskesmas Kecamatan Sukolilo Surabaya',
                    'Yayasan Griya Lansia Wreda Surabaya'
                ],
                'team_members' => [
                    [
                        'nickname' => 'Dwiki',
                        'fullname' => 'Dwiki Saputra',
                        'role' => 'Mobile App Lead & Bluetooth Architect',
                        'photo' => 'avatar1.png',
                        'social_media' => ['instagram' => 'https://instagram.com/'],
                        'linkedin' => 'https://linkedin.com/in/'
                    ],
                    [
                        'nickname' => 'Lutfi',
                        'fullname' => 'Lutfi Hakim',
                        'role' => 'Backend & Cloud Integration Dev',
                        'photo' => 'avatar2.png',
                        'social_media' => ['instagram' => 'https://instagram.com/'],
                        'linkedin' => 'https://linkedin.com/in/'
                    ]
                ],
                'external_url' => null,
                'video_url' => null,
                'screenshots' => [
                    'https://placehold.co/360x640/111827/ffffff?text=Dwiki+UI+1',
                    'https://placehold.co/360x640/1f2937/ffffff?text=Dwiki+UI+2',
                    'https://placehold.co/360x640/374151/ffffff?text=Dwiki+UI+3'
                ]
            ],
            [
                'name' => 'PCD Yuliana',
                'supervisor' => 'FZK',
                'type' => 'mobile',
                'logo' => 'yuliana.svg',
                'tagline' => 'Aplikasi Klasifikasi Jenis Rempah Dapur Menggunakan Deep Learning MobileNetV2',
                'description' => 'Aplikasi edukasi yang memanfaatkan kamera smartphone untuk mendeteksi, mengenali, dan menjelaskan berbagai jenis rempah-rempah dapur khas Indonesia (seperti lengkuas, jahe, kunyit, kencur) secara real-time.',
                'features' => [
                    'Klasifikasi Rempah Real-Time dari Kamera dengan convolutional Neural Network (CNN)',
                    'Informasi Profil Lengkap Rempah (Khasiat, Takaran, Resep Masakan)',
                    'Model AI Terkompresi Ringan Berjalan 100% Offline Tanpa Kuota Internet',
                    'Kuis Interaktif Tebak Rempah untuk Edukasi Anak Sekolah'
                ],
                'funding_awards' => [
                    'Hibah Penelitian Kolaborasi Dosen-Mahasiswa Fakultas Ilmu Komputer 2025',
                    'Juara Harapan 2 Lomba Aplikasi Edukasi Kreatif Nasional'
                ],
                'tech_field' => 'AI',
                'prestasi_level' => 'nasional',
                'partners' => [
                    'Komunitas Ibu Cerdas Karsa Wanita Sidoarjo',
                    'Pedagang Rempah Tradisional Pasar Wonokromo'
                ],
                'team_members' => [
                    [
                        'nickname' => 'Yuliana',
                        'fullname' => 'Yuliana Sari',
                        'role' => 'AI model Training & Data Scientist',
                        'photo' => 'avatar3.png',
                        'social_media' => ['instagram' => 'https://instagram.com/'],
                        'linkedin' => 'https://linkedin.com/in/'
                    ],
                    [
                        'nickname' => 'Mia',
                        'fullname' => 'Mia Audina',
                        'role' => 'Android Frontend & UI Developer',
                        'photo' => 'avatar3.png',
                        'social_media' => ['instagram' => 'https://instagram.com/'],
                        'linkedin' => 'https://linkedin.com/in/'
                    ]
                ],
                'external_url' => null,
                'video_url' => null,
                'screenshots' => [
                    'https://placehold.co/360x640/31108f/ffffff?text=Yuliana+UI+1',
                    'https://placehold.co/360x640/250d6c/ffffff?text=Yuliana+UI+2'
                ]
            ],
            [
                'name' => 'PCD Gandi',
                'supervisor' => 'FZK',
                'type' => 'mobile',
                'logo' => 'gandi.svg',
                'tagline' => 'Deteksi Dini Kerusakan Aspal Jalan Menggunakan Pemrosesan Citra Digital',
                'description' => 'Aplikasi Android untuk mendeteksi retakan dan lubang pada jalan raya saat berkendara. Berfungsi membantu pemetaan jalan rusak bagi instansi pekerjaan umum daerah secara otomatis.',
                'features' => [
                    'Pemindaian Retakan Jalan menggunakan Edge Detection & Sobel Filter',
                    'Log Koordinat GPS Lokasi Lubang Jalan Secara Otomatis',
                    'Unggah Data Kerusakan Jalan ke Cloud Server BPJN',
                    'Peta Distribusi Kerusakan Jalan Raya dalam Wilayah Kota'
                ],
                'funding_awards' => [
                    'Pendanaan Hibah PKM Penerapan Iptek (PKM-PI) 2025',
                    'Peringkat 5 Nasional Mahasiswa Berprestasi Bidang Inovasi Infrastruktur'
                ],
                'tech_field' => 'AI',
                'prestasi_level' => 'nasional',
                'partners' => [
                    'Dinas Pekerjaan Umum, Bina Marga, dan Pengairan Kabupaten Sidoarjo',
                    'Balai Besar Pelaksanaan Jalan Nasional (BBPJN) Jawa Timur'
                ],
                'team_members' => [
                    [
                        'nickname' => 'Gandi',
                        'fullname' => 'Gandi Prakoso',
                        'role' => 'Digital Image Processing Engineer',
                        'photo' => 'avatar4.png',
                        'social_media' => ['instagram' => 'https://instagram.com/'],
                        'linkedin' => 'https://linkedin.com/in/'
                    ],
                    [
                        'nickname' => 'Naufal',
                        'fullname' => 'Naufal Rizqi',
                        'role' => 'Android Systems Developer',
                        'photo' => 'avatar1.png',
                        'social_media' => ['instagram' => 'https://instagram.com/'],
                        'linkedin' => 'https://linkedin.com/in/'
                    ]
                ],
                'external_url' => null,
                'video_url' => null,
                'screenshots' => [
                    'https://placehold.co/360x640/1f4068/ffffff?text=Gandi+UI+1',
                    'https://placehold.co/360x640/162447/ffffff?text=Gandi+UI+2'
                ]
            ],
            [
                'name' => 'Kacamata Innovilage',
                'supervisor' => 'YOH',
                'type' => 'hardware',
                'logo' => 'kacamata.svg',
                'tagline' => 'Smart Glass: Kacamata Pintar Pemandu Tunanetra Berbasis IoT',
                'description' => 'Alat bantu mobilitas berupa kacamata pintar yang dilengkapi sensor jarak LiDAR, Text-to-Speech OCR, dan asisten suara cerdas untuk membantu kemandirian berjalan penyandang disabilitas netra.',
                'features' => [
                    'Pengukuran Jarak Halangan Depan dengan Sensor LiDAR presisi tinggi',
                    'Konversi Teks Gambar Menjadi Suara (OCR Text Reader) untuk Membaca Buku/Papan Nama',
                    'Konektivitas Bluetooth ke Earphone Bone-Conduction Pengguna',
                    'Pengiriman Notifikasi Posisi Darurat GPS via WhatsApp ke Wali'
                ],
                'funding_awards' => [
                    'Pendanaan Terpilih Social Project Nasional Innovilage Telkom 2025 (Kategori Top 10)',
                    'Juara 1 Lomba Cipta Teknologi Nasional untuk Disabilitas 2025'
                ],
                'tech_field' => 'IoT',
                'prestasi_level' => 'internasional',
                'partners' => [
                    'PT Telkom Indonesia (Persero) Tbk',
                    'DPC Persatuan Tunanetra Indonesia (PERTUNI) Surabaya'
                ],
                'team_members' => [
                    [
                        'nickname' => 'Yohanes',
                        'fullname' => 'Yohanes Christian',
                        'role' => 'Project Lead & Firmware Programmer',
                        'photo' => 'avatar2.png',
                        'social_media' => ['instagram' => 'https://instagram.com/'],
                        'linkedin' => 'https://linkedin.com/in/'
                    ],
                    [
                        'nickname' => 'Olivia',
                        'fullname' => 'Olivia Putri',
                        'role' => 'Product Designer & IoT Engineer',
                        'photo' => 'avatar3.png',
                        'social_media' => ['instagram' => 'https://instagram.com/'],
                        'linkedin' => 'https://linkedin.com/in/'
                    ]
                ],
                'external_url' => null,
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'screenshots' => null
            ],
            [
                'name' => 'AWS Reynanda',
                'supervisor' => 'CAP',
                'type' => 'mobile',
                'logo' => 'reynanda.svg',
                'tagline' => 'Smart Home Control System Berbasis Serverless Cloud AWS',
                'description' => 'Aplikasi mobile untuk mengontrol dan menjadwalkan peralatan rumah pintar secara dinamis, menggunakan arsitektur serverless AWS IoT Core dan AWS Lambda untuk efisiensi latensi rendah.',
                'features' => [
                    'Komunikasi IoT Broker Latensi Rendah dengan AWS IoT Core',
                    'Fungsi Serverless Pendukung (AWS Lambda) Berbiaya Rendah',
                    'Autentikasi Aman User & Perangkat Menggunakan AWS Cognito',
                    'Analisis Konsumsi Daya Listrik Rumah Berbasis AWS DynamoDB'
                ],
                'funding_awards' => [
                    'Penghargaan AWS Student Builder Award Nasional 2025',
                    'Publikasi Penelitian Jurnal Internasional Bereputasi Scopus Q4'
                ],
                'tech_field' => 'Networking & Cyber Security',
                'prestasi_level' => 'nasional',
                'partners' => [
                    'Amazon Web Services (AWS) Indonesia',
                    'Laboratorium Jaringan & Komputasi Awan'
                ],
                'team_members' => [
                    [
                        'nickname' => 'Reynanda',
                        'fullname' => 'Reynanda Putra',
                        'role' => 'Lead Cloud Infrastructure Architect',
                        'photo' => 'avatar1.png',
                        'social_media' => ['instagram' => 'https://instagram.com/'],
                        'linkedin' => 'https://linkedin.com/in/'
                    ],
                    [
                        'nickname' => 'Qori',
                        'fullname' => 'Qori Aulia',
                        'role' => 'Android App developer',
                        'photo' => 'avatar2.png',
                        'social_media' => ['instagram' => 'https://instagram.com/'],
                        'linkedin' => 'https://linkedin.com/in/'
                    ]
                ],
                'external_url' => null,
                'video_url' => null,
                'screenshots' => [
                    'https://placehold.co/360x640/0d1b2a/ffffff?text=AWS+Reynanda+1',
                    'https://placehold.co/360x640/1b263b/ffffff?text=AWS+Reynanda+2'
                ]
            ]
        ];

        foreach ($projects as $proj) {
            Project::create($proj);
        }
    }
}
