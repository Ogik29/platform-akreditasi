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
                'tkt' => 6,
                'logo' => 'sigap.svg',
                'tagline' => 'Sistem Informasi Siaga & Tanggap Bencana Terintegrasi',
                'description' => 'SIGAP adalah platform koordinasi tanggap darurat yang menghubungkan masyarakat, tim penyelamat, dan pemerintah dalam memantau wilayah bencana serta mengoordinasikan logistik bantuan secara real-time.',
                'features' => [
                    'Peta Sebaran Bencana Real-Time dengan GIS',
                    'Manajemen Logistik & Bantuan Berbasis Status Pengiriman',
                    'Panic Button & Pelaporan Bencana oleh Warga',
                    'Notifikasi Evakuasi Cepat Berbasis SMS/Push Notification'
                ],
                'funding_awards' => [
                    'Pendanaan Hibah Program Kreativitas Mahasiswa (PKM-GF) Kemendikbudristek 2025',
                    'Peringkat 3 Inovasi Teknologi Penanggulangan Bencana Provinsi Jawa Timur'
                ],
                'demo_level' => 'nasional',
                'partners' => [
                    'BPBD Provinsi Jawa Timur',
                    'Badan SAR Nasional (BASARNAS) Surabaya'
                ],
                'team_members' => [
                    [
                        'nickname' => 'Ahmad',
                        'fullname' => 'Ahmad Ramadhan',
                        'role' => 'Project Lead & Backend Developer',
                        'photo' => 'avatar1.png',
                        'social_media' => ['instagram' => 'https://instagram.com/', 'twitter' => 'https://twitter.com/'],
                        'linkedin' => 'https://linkedin.com/in/'
                    ],
                    [
                        'nickname' => 'Budi',
                        'fullname' => 'Budi Santoso',
                        'role' => 'Frontend Developer',
                        'photo' => 'avatar2.png',
                        'social_media' => ['instagram' => 'https://instagram.com/'],
                        'linkedin' => 'https://linkedin.com/in/'
                    ],
                    [
                        'nickname' => 'Cici',
                        'fullname' => 'Cici Paramida',
                        'role' => 'UI/UX Designer',
                        'photo' => 'avatar3.png',
                        'social_media' => ['instagram' => 'https://instagram.com/'],
                        'linkedin' => 'https://linkedin.com/in/'
                    ]
                ],
                'external_url' => 'https://sigap-emergency.netlify.app',
                'video_url' => null,
                'screenshots' => null
            ],
            [
                'name' => 'TA Peres',
                'supervisor' => 'MDB',
                'type' => 'web',
                'tkt' => 5,
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
                'demo_level' => 'lokal',
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
                'tkt' => 5,
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
                'demo_level' => 'lokal',
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
                'name' => 'TA Steven',
                'supervisor' => 'MDB',
                'type' => 'web',
                'tkt' => 6,
                'logo' => 'steven.svg',
                'tagline' => 'Optimasi Rute Distribusi Logistik Menggunakan Genetic Algorithm',
                'description' => 'Sistem Informasi Geografis (SIG) berbasis web untuk merencanakan dan mengoptimalkan rute perjalanan armada logistik multi-kendaraan guna menghemat biaya operasional dan konsumsi bahan bakar.',
                'features' => [
                    'Penghitungan Rute Tercepat Menggunakan Algoritma Genetika & Google Maps API',
                    'Manajemen Kapasitas Muatan Kendaraan (Capacitated Vehicle Routing Problem)',
                    'Visualisasi Rute Terbaik Langsung Pada Peta Interaktif',
                    'Estimasi Biaya Bahan Bakar dan Estimasi Waktu Tiba (ETA)'
                ],
                'funding_awards' => [
                    'Pendanaan Riset Tugas Akhir Mandiri Unggulan 2025',
                    'Publikasi Jurnal Nasional Terakreditasi SINTA 3'
                ],
                'demo_level' => 'lokal',
                'partners' => [
                    'PT Logistik Trans Nusantara Express',
                    'Asosiasi Pengusaha Logistik Daerah Surabaya'
                ],
                'team_members' => [
                    [
                        'nickname' => 'Steven',
                        'fullname' => 'Steven Wijaya',
                        'role' => 'Algorithm & Optimization Specialist',
                        'photo' => 'avatar1.png',
                        'social_media' => ['instagram' => 'https://instagram.com/'],
                        'linkedin' => 'https://linkedin.com/in/'
                    ],
                    [
                        'nickname' => 'Fani',
                        'fullname' => 'Fani Rahmawati',
                        'role' => 'Web App Developer',
                        'photo' => 'avatar3.png',
                        'social_media' => ['instagram' => 'https://instagram.com/'],
                        'linkedin' => 'https://linkedin.com/in/'
                    ]
                ],
                'external_url' => 'https://logisticsroute-steven.test',
                'video_url' => null,
                'screenshots' => null
            ],
            [
                'name' => 'VROOM',
                'supervisor' => 'MDB',
                'type' => 'hardware',
                'tkt' => 5,
                'logo' => 'vroom.svg',
                'tagline' => 'Virtual Reality Driving Simulator dengan Force Feedback',
                'description' => 'VROOM adalah simulator mengemudi interaktif berbasis Virtual Reality untuk edukasi keselamatan berkendara (Safety Driving) dengan setir force-feedback fisik untuk sensasi nyata berkendara.',
                'features' => [
                    'Lingkungan Simulator 3D Berbasis Unity dengan Fisika Kendaraan Nyata',
                    'Integrasi Hardware Setir Fisik Logitech G29 Force-Feedback',
                    'Skenario Pelatihan Cuaca Ekstrim, Malam Hari, dan Mengemudi Defensif',
                    'Sistem Penilaian Otomatis Terhadap Pelanggaran Lalu Lintas'
                ],
                'funding_awards' => [
                    'Pendanaan Terpilih Program Mahasiswa Wirausaha (PMW) 2025',
                    'Gold Medal Award Pameran Rekayasa Teknologi Vokasi 2025'
                ],
                'demo_level' => 'lokal',
                'partners' => [
                    'Direktorat Lalu Lintas POLDA Jawa Timur',
                    'Lembaga Pelatihan Mengemudi (LPK) Lancar Jaya Surabaya'
                ],
                'team_members' => [
                    [
                        'nickname' => 'Genta',
                        'fullname' => 'Genta Wisesa',
                        'role' => 'Lead VR Developer',
                        'photo' => 'avatar4.png',
                        'social_media' => ['instagram' => 'https://instagram.com/'],
                        'linkedin' => 'https://linkedin.com/in/'
                    ],
                    [
                        'nickname' => 'Hendra',
                        'fullname' => 'Hendra Gunawan',
                        'role' => 'Embedded & Hardware Integrator',
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
                'name' => 'TA Rafli',
                'supervisor' => 'MDB',
                'type' => 'mobile',
                'tkt' => 5,
                'logo' => 'rafli.svg',
                'tagline' => 'Aplikasi Mobile Deteksi Penyakit Tanaman Padi Berbasis Computer Vision',
                'description' => 'Aplikasi Android portabel yang memungkinkan petani mengambil foto daun padi yang sakit dan langsung mendeteksi jenis penyakit (Hawar Daun, Blas, Tunro) secara offline menggunakan model Deep Learning.',
                'features' => [
                    'Pemindaian Daun Padi Instan Menggunakan Kamera Handphone',
                    'Klasifikasi Penyakit Daun Padi Offline dengan TensorFlow Lite',
                    'Rekomendasi Penanganan & Penggunaan Pestisida yang Sesuai',
                    'Forum Komunitas Petani & Berbagi Info Hama Regional'
                ],
                'funding_awards' => [
                    'Pendanaan Program Holistik Pembinaan dan Pemberdayaan Desa (PHP2D) 2025',
                    'Juara Harapan 1 Lomba Inovasi Tani Muda Nasional'
                ],
                'demo_level' => 'nasional',
                'partners' => [
                    'Dinas Pertanian Kabupaten Sidoarjo',
                    'Gabungan Kelompok Tani (Gapoktan) Makmur Sejahtera'
                ],
                'team_members' => [
                    [
                        'nickname' => 'Rafli',
                        'fullname' => 'Rafli Pratama',
                        'role' => 'Android Developer & CV Specialist',
                        'photo' => 'avatar1.png',
                        'social_media' => ['instagram' => 'https://instagram.com/'],
                        'linkedin' => 'https://linkedin.com/in/'
                    ],
                    [
                        'nickname' => 'Irma',
                        'fullname' => 'Irma Novita',
                        'role' => 'UI/UX Designer',
                        'photo' => 'avatar3.png',
                        'social_media' => ['instagram' => 'https://instagram.com/'],
                        'linkedin' => 'https://linkedin.com/in/'
                    ]
                ],
                'external_url' => null,
                'video_url' => null,
                'screenshots' => [
                    'https://placehold.co/360x640/1a1a2e/ffffff?text=Rafli+UI+1',
                    'https://placehold.co/360x640/162447/ffffff?text=Rafli+UI+2',
                    'https://placehold.co/360x640/1f4068/ffffff?text=Rafli+UI+3'
                ]
            ],
            [
                'name' => 'TA Cisa',
                'supervisor' => 'MDB',
                'type' => 'hardware',
                'tkt' => 5,
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
                'demo_level' => 'nasional',
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
                'tkt' => 5,
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
                'demo_level' => 'lokal',
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
                'tkt' => 5,
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
                'demo_level' => 'nasional',
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
                'tkt' => 5,
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
                'demo_level' => 'lokal',
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
                'tkt' => 5,
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
                'demo_level' => 'nasional',
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
                'tkt' => 6,
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
                'demo_level' => 'internasional',
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
                'tkt' => 5,
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
                'demo_level' => 'nasional',
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
