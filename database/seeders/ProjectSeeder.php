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
                'name' => 'LOGINT',
                'supervisor' => '-',
                'type' => 'web',
                'logo' => 'aksd.svg',
                'tagline' => 'Platform Smart Coding Lab & Logic Intelligence yang mendukung pembelajaran pemrograman',
                'description' => 'LOGINT adalah platform Smart Coding Lab & Logic Intelligence yang membantu kampus menjalankan praktikum pemrograman secara lebih sederhana, terukur, dan berbasis data. Platform ini menyediakan environment coding berbasis browser, modul praktikum terstruktur, bantuan belajar kontekstual, serta dashboard untuk dosen dan program studi. LOGINT ditujukan sebagai solusi awal untuk mata kuliah Algoritma Pemrograman dan praktikum coding dasar di Telkom University Surabaya. Setelah tervalidasi, LOGINT dapat diperluas ke mata kuliah Struktur Data, Basis Data, Web Programming, Machine Learning, Data Analytics, serta kampus lain yang membutuhkan platform praktikum digital dan learning analytics.',
                'features' => [
                    'Web-based Coding Environment',
                    'Modul praktikum yang terorganisir sesuai materi dan capaian pembelajaran.',
                    'Dashboard untuk memantau progres, performa, dan aktivitas mahasiswa',
                    'Melacak perkembangan belajar mahasiswa secara real-time selama praktikum',
                    'Memudahkan dosen mengelola praktikum, memonitor mahasiswa, dan mengevaluasi pembelajaran'
                ],
                'funding_awards' => [],
                'tech_field' => 'AI',
                'prestasi_level' => 'internasional',
                'partners' => ['Lab Core Programming Telkom'],
                'logo_mitra' => ['img/logo tel-u.jpeg'],
                'team_members' => [
                    [
                        'nickname' => null,
                        'fullname' => 'Muhammad Adib Kamali, S.T., M.Eng',
                        'role' => null,
                        'photo' => '/img/LOGINT/foto_tim/pak adib kamali.png',
                        'social_media' => null,
                        'linkedin' => 'https://www.linkedin.com/in/adib-kamali-001357192/'
                    ],
                    [
                        'nickname' => null,
                        'fullname' => 'Daud Muhajir, S.Kom., M.Kom.',
                        'role' => null,
                        'photo' => '/img/LOGINT/foto_tim/pak daud muhajir.png',
                        'social_media' => null,
                        'linkedin' => 'https://www.linkedin.com/in/hans-gg/'
                    ]
                ],
                'external_url' => [
                    'https://logint.it-showcase.tusbind.ac.id',
                    'https://logint-ai.it-showcase.tusbind.ac.id'
                ],
                'video_url' => null,
                'screenshots' => null
            ],
            [
                'name' => 'IoT-based Hydroponic Farming and Solar Energy Integration for Sustainable Agriculture',
                'supervisor' => '-',
                'type' => 'hardware',
                'logo' => 'reynanda.svg',
                'tagline' => ' ',
                'description' => 'IoT-based Hydroponic Farming and Solar Energy Integration for Sustainable Agriculture merupakan proyek pengembangan sistem pertanian hidroponik pintar yang mengintegrasikan teknologi Internet of Things (IoT) dengan energi surya untuk meningkatkan efisiensi produksi pertanian secara berkelanjutan. Sistem ini memungkinkan pemantauan kondisi tanaman secara real-time melalui sensor pH, TDS, suhu, serta otomatisasi pompa dan nutrisi, sekaligus memanfaatkan panel surya sebagai sumber energi utama untuk mengurangi biaya operasional. Selain meningkatkan produktivitas pertanian, proyek ini juga berfokus pada pemberdayaan masyarakat melalui pelatihan teknologi, peningkatan kapasitas petani, dan model bisnis yang berkelanjutan',
                'features' => [
                    'Monitoring pH, TDS, suhu, dan kondisi lingkungan secara real-time',
                    'Solar Energy Integration Panel surya sebagai sumber energi untuk seluruh sistem hidroponik',
                    'Dashboard mobile untuk memantau kondisi tanaman dari mana saja',
                    'Otomatisasi pompa air dan pemberian nutrisi berdasarkan data sensor. ',
                    'Monitoring Penyimpanan data pada cloud untuk monitoring dan analisis',
                    'Smart Alert System Notifikasi ketika parameter tanaman berada di luar batas normal',
                    ' Pelatihan masyarakat mengenai IoT, hidroponik, dan pemanfaatan energi terbarukan. ',
                    'Sistem dirancang agar mampu membiayai operasional secara mandiri melalui hasil penjualan sayuran'
                ],
                'funding_awards' => ['IEEE Tech4Good 2025 (Proposal untuk program pendanaan IEEE Tech4Good)'],
                'tech_field' => 'IoT',
                'prestasi_level' => 'internasional',
                'partners' => ['GR Farm', 'Yayasan Pendidikan Gowa Raya'],
                'logo_mitra' => ['img/salikneta/logo gr farm.png', 'img/salikneta/logo yayasan pendidikan gowa rayaa.png'],
                'team_members' => [
                    [
                        'nickname' => null,
                        'fullname' => 'Hilal Hudan Nuha, Ph.D.',
                        'role' => null,
                        'photo' => null,
                        'social_media' => null,
                        'linkedin' => null
                    ],
                    [
                        'nickname' => null,
                        'fullname' => 'Hassan Rizky Putra Sailellah',
                        'role' => null,
                        'photo' => null,
                        'social_media' => null,
                        'linkedin' => null
                    ],
                    [
                        'nickname' => null,
                        'fullname' => 'Muhammad Irsan, Ph.D.',
                        'role' => null,
                        'photo' => null,
                        'social_media' => null,
                        'linkedin' => null
                    ],
                    [
                        'nickname' => null,
                        'fullname' => 'Muhammad Faris Fathoni, Ph.D',
                        'role' => null,
                        'photo' => null,
                        'social_media' => null,
                        'linkedin' => null
                    ],
                    [
                        'nickname' => null,
                        'fullname' => 'Dr. Aji Gautama Putrada',
                        'role' => null,
                        'photo' => null,
                        'social_media' => null,
                        'linkedin' => null
                    ]
                ],
                'external_url' => null,
                'video_url' => null,
                'screenshots' => null,
                'documentations' => [],
                'pdf_report' => 'docs/IoT-based Hydroponic Farming and Solar Energy Integration for Sustainable Agriculture/IOT-BASED HYDROPONIC FARMING AND SOLAR ENERGY INTEGRATION FOR SUSTAINABLE AGRICULTURE (25-COMT4G-51).pdf'
            ],
            [
                'name' => 'Smart Mobile Inclusive Learning (SMILE)',
                'supervisor' => '-',
                'type' => 'hardware',
                'logo' => 'reynanda.svg',
                'tagline' => '',
                'description' => 'Smart Mobile Inclusive Learning (SMILE) merupakan platform terapi berbasis Artificial Intelligence (AI) yang dirancang untuk membantu anak berkebutuhan khusus, khususnya anak dengan gangguan psikomotor dan kognitif, menjalani proses terapi secara lebih interaktif dan menyenangkan. Sistem ini menggabungkan teknologi computer vision, hand pose detection, gamifikasi, dan animasi 3D untuk mendukung terapi fisik sekaligus pembelajaran kognitif. Selama sesi terapi, gerakan tangan anak dideteksi secara real-time menggunakan kamera dan teknologi MediaPipe untuk mengendalikan permainan terapi. Hasil terapi kemudian tersimpan pada cloud sehingga dapat dipantau oleh terapis dan orang tua melalui dashboard web. Proyek ini berhasil diimplementasikan di YPAC Surabaya dan memberikan alternatif terapi yang lebih menarik sehingga meningkatkan motivasi anak dalam mengikuti sesi terapi secara rutin.',
                'features' => [
                    'Menggunakan MediaPipe untuk mendeteksi gerakan tangan secara real-time sebagai media terapi psikmotor.',
                    'Terapi dikemas dalam bentuk permainan interaktif sehingga anak lebih termotivasi mengikuti terapi.'
                ],
                'funding_awards' => ['EPICS in IEEE Grant 2024'],
                'tech_field' => 'AI',
                'prestasi_level' => 'internasional',
                'partners' => ['YPAC Surabaya'],
                'logo_mitra' => ['img/ismart/ypac.png'],
                'team_members' => [
                    [
                        'nickname' => null,
                        'fullname' => 'Endah Suryawati Ningrum',
                        'role' => null,
                        'photo' => null,
                        'social_media' => null,
                        'linkedin' => null
                    ],
                    [
                        'nickname' => null,
                        'fullname' => 'Gede Aditra Pradnyana',
                        'role' => null,
                        'photo' => null,
                        'social_media' => null,
                        'linkedin' => null
                    ],
                    [
                        'nickname' => null,
                        'fullname' => 'Fayruz Rahma',
                        'role' => null,
                        'photo' => null,
                        'social_media' => null,
                        'linkedin' => null
                    ],
                    [
                        'nickname' => null,
                        'fullname' => 'Moch. Iskandar Riansyah',
                        'role' => null,
                        'photo' => null,
                        'social_media' => null,
                        'linkedin' => null
                    ],
                    [
                        'nickname' => null,
                        'fullname' => 'Farah Zakiyah Rahmanti',
                        'role' => null,
                        'photo' => null,
                        'social_media' => null,
                        'linkedin' => null
                    ]
                ],
                'external_url' => null,
                'video_url' => null,
                'screenshots' => null,
                'documentations' => null,
                'pdf_report' => '/docs/smilee/Smart Mobile Inclusive Learning (SMILE) - final report.pdf'
            ],
            [
                'name' => 'IMPLEMENTATION OF IOT-BASED FRUIT FLY TRAP DEVICES AT SALIKNETA FARM PHILIPPINES',
                'supervisor' => '-',
                'type' => 'hardware',
                'logo' => 'reynanda.svg',
                'tagline' => ' ',
                'description' => 'Implementation of IoT-Based Fruit Fly Trap Devices at Salikneta Farm, Philippines merupakan program Pengabdian kepada Masyarakat (PkM) Kolaborasi Luar Negeri Telkom University 2025 yang bertujuan membantu Salikneta Farm, Filipina, mengatasi permasalahan serangan lalat buah menggunakan teknologi Internet of Things (IoT). Solusi yang dikembangkan berupa smart fruit fly trap yang mampu memonitor populasi lalat buah secara otomatis melalui sensor, kamera inframerah, dan komunikasi nirkabel. Data hasil tangkapan dikirim ke server cloud untuk dianalisis dan divisualisasikan melalui dashboard sehingga petani dapat mengetahui pola aktivitas hama secara real-time serta menentukan waktu pengendalian yang lebih tepat. Selain implementasi teknologi, program ini juga mencakup pelatihan kepada petani agar mampu mengoperasikan sistem secara mandiri serta mendukung transformasi',
                'features' => [
                    'Smart Fruit Fly Trap',
                    'Infrared Camera Monitoring',
                    'Cloud-based Dashboard'
                ],
                'funding_awards' => ['Pendanaan Rp 32.000.000'],
                'tech_field' => 'IoT',
                'prestasi_level' => 'internasional',
                'partners' => ['De La Salle Araneta University', 'Salikneta Farm'],
                'logo_mitra' => ['img/salikneta/universitas de laa.png', 'img/salikneta/logo salikneta farm.png'],
                'team_members' => [
                    [
                        'nickname' => null,
                        'fullname' => 'Dr. Bayu Rima Aditya, S.T., M.T.',
                        'role' => null,
                        'photo' => null,
                        'social_media' => null,
                        'linkedin' => null
                    ],
                    [
                        'nickname' => null,
                        'fullname' => 'HRD. Rohmat Saedudin, S.T., M.T., Ph.D.',
                        'role' => null,
                        'photo' => null,
                        'social_media' => null,
                        'linkedin' => null
                    ],
                    [
                        'nickname' => null,
                        'fullname' => 'Dr. Helmy Widyantara, S.Kom., M.Eng.',
                        'role' => null,
                        'photo' => null,
                        'social_media' => null,
                        'linkedin' => null
                    ]
                ],
                'external_url' => null,
                'video_url' => null,
                'screenshots' => null,
                'documentations' => [],
                'pdf_report' => '/docs/salikneta/IMPLEMENTATION OF IOT-BASED FRUIT FLY TRAP DEVICES AT SALIKNETA FARM PHILIPPINES.pdf'
            ],
            [
                'name' => 'K-Means Project',
                'supervisor' => '-',
                'type' => 'web',
                'logo' => 'reynanda.svg',
                'tagline' => 'Predict Smarter, Discover Better Insights',
                'description' => 'Machine Learning Prediction & Recommendation System adalah aplikasi berbasis web yang mengimplementasikan model Machine Learning hasil pelatihan dari Google Colab ke dalam framework Flask. Sistem ini memungkinkan pengguna melakukan prediksi terhadap data yang dimasukkan, mengelompokkan hasil prediksi ke dalam cluster tertentu, serta memberikan rekomendasi yang sesuai berdasarkan karakteristik setiap cluster. Dengan antarmuka yang sederhana, proses analisis data menjadi lebih mudah diakses tanpa perlu menjalankan model secara langsung melalui notebook Machine Learning.',
                'features' => [
                    'Input Data Produksi Multi-Komoditas',
                    'K-Means Clustering untuk Klasifikasi Data',
                    'Rekomendasi Otomatis Berdasarkan Hasil Cluster',
                    'Deployment Model Machine Learning Berbasis Web'
                ],
                'funding_awards' => [],
                'tech_field' => 'AI',
                'prestasi_level' => 'nasional',
                'partners' => ['Telkom University'],
                'logo_mitra' => ['img/logo tel-u.jpeg'],
                'team_members' => [
                    [
                        'nickname' => null,
                        'fullname' => 'Muhammad Adib Kamali, S.T., M.Eng',
                        'role' => null,
                        'photo' => null,
                        'social_media' => null,
                        'linkedin' => 'https://www.linkedin.com/in/adib-kamali-001357192/'
                    ],
                ],
                'external_url' => 'https://kmeans-riska.it-showcase.tusbind.ac.id',
                'video_url' => null,
                'screenshots' => null,
                'pdf_report' => null
            ],
            [
                'name' => 'SIGAP',
                'supervisor' => 'MDB',
                'type' => 'web',
                'logo' => '/img/sigap/icon_sigap.png',
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
                'partners' => ['Teknologi Informasi Telkom University Surabaya'],
                'logo_mitra' => ['img/logo.png'],
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
                'external_url' => 'https://sigap.it-showcase.tusbind.ac.id',
                'video_url' => null,
                'screenshots' => null,
                'pdf_report' => null
            ],
            [
                'name' => 'Smart CCTV Monitoring & Face Recognition System',
                'supervisor' => 'MDB',
                'type' => 'web',
                'logo' => 'peres.svg',
                'tagline' => 'Secure Every Moment with Intelligent Monitoring',
                'description' => 'Smart CCTV Monitoring & Face Recognition System adalah platform berbasis web yang dirancang untuk membantu pengelolaan dan pengawasan area secara real-time. Sistem ini mengintegrasikan live monitoring CCTV, teknologi Face Recognition, serta pencatatan aktivitas otomatis dalam satu dashboard yang mudah digunakan. Dengan tampilan yang intuitif, administrator dapat memantau kondisi lokasi, mengelola kamera, melihat riwayat aktivitas, serta mengenali identitas individu yang terdeteksi oleh sistem secara cepat dan efisien.',
                'features' => [
                    'Dashboard Monitoring CCTV Real-Time Berbasis Web',
                    'AI Face Recognition untuk Deteksi & Identifikasi Wajah',
                    'Sistem Manajemen Kamera dan Pengguna Terintegrasi',
                    'Pencatatan Aktivitas Otomatis dengan Monitoring Terpusat'
                ],
                'funding_awards' => [],
                'tech_field' => 'AI',
                'prestasi_level' => 'nasional',
                'partners' => [
                    'Panti Asuhan Agape Surabaya'
                ],
                'logo_mitra' => ['img/ta-peres/logoagape.png'],
                'team_members' => [
                    [
                        'nickname' => 'Peres',
                        'fullname' => 'Peres Hendri Setyawan',
                        'role' => null,
                        'photo' => 'img/ta-peres/fotoperes.png',
                        'social_media' => ['instagram' => 'https://www.instagram.com/peresshendri'],
                        'linkedin' => 'https://www.linkedin.com/in/peresshendrii'
                    ]
                ],
                'external_url' => 'https://ta-peres.it-showcase.tusbind.ac.id',
                'video_url' => null,
                'screenshots' => ['img/ta-peres/dokumentasi/IMG_20260520_121128.jpg'],
                'pdf_report' => '/docs/ta-peres/Proposal Magang Telkomsel area Jawa Bali.pdf'
            ],
            [
                'name' => 'NYAWANG',
                'supervisor' => 'MDB',
                'type' => 'web',
                'logo' => 'img/ta-rizal/logo_ta-rizal.jpg',
                'tagline' => 'Implementasi Algoritma YOLOv8 dan FaceNet Berdasarkan Cosine Similarity untuk Sistem Monitoring Alat Pelindung Diri (APD) berbasis IoT',
                'description' => 'APD Violation Monitoring System adalah sistem berbasis Artificial Intelligence yang dirancang untuk memantau kepatuhan penggunaan Alat Pelindung Diri (APD) secara otomatis melalui kamera pengawas (CCTV). Sistem memanfaatkan model YOLOv8 untuk mendeteksi keberadaan dan kelengkapan APD yang digunakan oleh pekerja atau pelanggan, kemudian menggunakan FaceNet untuk mengenali identitas individu yang melakukan pelanggaran.
 Ketika sistem mendeteksi seseorang yang tidak menggunakan APD sesuai ketentuan, wajah individu tersebut akan dikenali dan informasi pelanggaran akan dicatat secara otomatis. Sistem ini membantu perusahaan melakukan pengawasan keselamatan kerja secara real-time, mengurangi proses monitoring manual, serta meningkatkan kepatuhan terhadap standar K3 (Keselamatan dan Kesehatan Kerja).',
                'features' => [
                    'Mendeteksi penggunaan APD secara otomatis menggunakan model YOLOv8',
                    'Mencocokkan wajah yang terdeteksi dengan database karyawan atau pelanggan',
                    'Menandai individu sebagai pelanggar secara otomatis'
                ],
                'funding_awards' => [],
                'tech_field' => 'AI',
                'prestasi_level' => 'nasional',
                'partners' => [
                    'Badan Usaha Milik Negara (BUMN)'
                ],
                'logo_mitra' => ['img/ta-rizal/logo-mitra/logo bumn.png'],
                'team_members' => [
                    [
                        'nickname' => 'Rizal',
                        'fullname' => 'Rizal Zidan',
                        'role' => null,
                        'photo' => '/img/ta-rizal/foto_tim/foto rizal.png',
                        'social_media' => ['instagram' => 'https://www.instagram.com/rizalzidans_/'],
                        'linkedin' => 'https://www.linkedin.com/in/rizal-zidan-2729a1329/'
                    ]
                ],
                'external_url' => 'https://ta-rizal.it-showcase.tusbind.ac.id',
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
                'partners' => ['Teknologi Informasi Telkom University Surabaya'],
                'logo_mitra' => ['img/logo.png'],
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
                    'WAROENG INKLUSI MALANG',
                    'Lembaga Pendidikan Inklusi Al-Fasyah Kepanjen'
                ],
                'logo_mitra' => ['img/vroom/WAROENG INKLUSI.png', 'img/vroom/alfasyah.png'],
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
                        'photo' => '/img/vroom/elsaak.png',
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
                'logo_mitra' => ['img/ta-rafli/logo mitra.png'],
                'team_members' => [
                    [
                        'nickname' => 'Rafli',
                        'fullname' => 'Rafli Haidar Nashif',
                        'role' => 'Lead Developer & Blockchain Engineer',
                        'photo' => 'img/ta-rafli/foto_rafli.png',
                        'social_media' => ['instagram' => 'https://www.instagram.com/rafli_haidarn/'],
                        'linkedin' => 'https://www.linkedin.com/in/rafli-haidar-nashif/'
                    ]
                ],
                'external_url' => 'https://ta-rafli.it-showcase.tusbind.ac.id',
                'video_url' => null,
                'screenshots' => null
            ],
            [
                'name' => 'EdgeTani',
                'supervisor' => 'MDB',
                'type' => 'hardware',
                'logo' => '/img/ta-cisa/logo_edgetani.png',
                'tagline' => 'Smart Fertigation System for Melon Cultivation',
                'description' => 'Edge Tani adalah sistem fertigasi presisi berbasis Industrial IoT yang membantu proses penyiraman, pencampuran nutrisi, monitoring sensor, dan kontrol aktuator secara otomatis melalui satu perangkat edge berbasis Raspberry Pi.
Project ini dikembangkan untuk budidaya melon pada media tanam substrat dengan konsep: Measure. Mix. Water. Grow.',
                'features' => [
                    'Mikrodosing Nutrisi NPK berdasarkan HST',
                    'Smart Watering berdasarkan kelembapan media tanam',
                    'Pengelolaan sisa fertigasi',
                    'Edge-based control menggunakan Raspberry Pi',
                    'Integrasi Industrial'
                ],
                'funding_awards' => [],
                'tech_field' => 'IoT',
                'prestasi_level' => 'nasional',
                'partners' => [
                    'Rooftop Telkom University Surabaya'
                ],
                'logo_mitra' => ['img/ta-cisa/logo rooftop.png'],
                'team_members' => [
                    [
                        'nickname' => 'Cisa',
                        'fullname' => 'Cisa Valentino Cahya Ramadhani',
                        'role' => null,
                        'photo' => '/img/ta-cisa/Cisa Foto Anggota Edge Tani.jpg',
                        'social_media' => ['instagram' => 'https://www.instagram.com/vaallencisa/'],
                        'linkedin' => 'https://www.linkedin.com/in/cisavalentino/'
                    ]
                ],
                'external_url' => null,
                'video_url' => null,
                'documentations' => [
                    '/img/ta-cisa/dokumentasi_alat/foto_alat.png',
                    '/img/ta-cisa/dokumentasi_alat/foto_alat_2.png',
                    '/img/ta-cisa/dokumentasi_alat/foto_alat_3.jpeg'
                ]
            ],
            [
                'name' => 'EcoSortix',
                'supervisor' => 'FZK',
                'type' => 'mobile',
                'logo' => '/img/pcd-adis/logo ecosortix bg.png',
                'tagline' => 'EcoSortix: Aplikasi Pemilah Sampah Cerdas Berbasis AI Klasifikasi Citra',
                'description' => 'EcoSortix adalah aplikasi mobile cerdas berbasis klasifikasi citra AI untuk mengidentifikasi dan memilah sampah organik serta anorganik secara instan. Terintegrasi dengan fitur peta TPS/TPA, pelaporan sampah, edukasi lingkungan, serta gamifikasi tantangan berhadiah reward menarik.',
                'features' => [
                    'AI Waste Classification sebagai Deteksi sampah organik dan anorganik berbasis citra secara presisi dengan preprocessing citra',
                    'Smart Waste Management Ecosystem meliputi Edukasi pemilahan sampah, pelaporan tumpukan sampah, dan peta lokasi TPS/TPA/Bank Sampah',
                    'Reward & Eco Challenge yaitu Gamifikasi tantangan kelestarian lingkungan dan sistem penukaran poin reward'
                ],
                'funding_awards' => [],
                'tech_field' => 'AI',
                'prestasi_level' => 'nasional',
                'partners' => ['Teknologi Informasi Telkom University Surabaya'],
                'logo_mitra' => ['img/logo.png'],
                'team_members' => [
                    [
                        'nickname' => 'Adis',
                        'fullname' => 'Adistya Rahayu',
                        'role' => null,
                        'photo' => '/img/pcd-adis/foto_tim/adistya.jpg',
                        'social_media' => ['instagram' => 'https://www.instagram.com/adistyarh/'],
                        'linkedin' => 'https://www.linkedin.com/in/adistyarahayu/'
                    ],
                    [
                        'nickname' => 'Zahra',
                        'fullname' => 'Ahadiyah Dyna Azzahra',
                        'role' => null,
                        'photo' => '/img/pcd-adis/foto_tim/zahra.jpg',
                        'social_media' => ['instagram' => 'https://www.instagram.com/dynaazahra/'],
                        'linkedin' => null
                    ],
                    [
                        'nickname' => 'Nayo',
                        'fullname' => 'Nayodya Fairuz Sadina A.',
                        'role' => null,
                        'photo' => '/img/pcd-adis/foto_tim/nayyo.png',
                        'social_media' => ['instagram' => 'https://www.instagram.com/nayodyaviera/'],
                        'linkedin' => 'https://www.linkedin.com/in/nayodya-fairuz-819904295/'
                    ],
                    [
                        'nickname' => 'Firman',
                        'fullname' => 'Reza Eka Firmansyah',
                        'role' => null,
                        'photo' => '/img/pcd-adis/foto_tim/firman.JPG',
                        'social_media' => ['instagram' => 'https://www.instagram.com/refirmnnn/'],
                        'linkedin' => null
                    ]
                ],
                'external_url' => 'sampahdetector.my.id',
                'video_url' => null,
                'screenshots' => [
                    '/img/pcd-adis/UI_UX/Beranda.jpg',
                    '/img/pcd-adis/UI_UX/Edukasi Lingkungan_.jpg',
                    '/img/pcd-adis/UI_UX/Fitur Deteksi Sampah.jpg',
                    '/img/pcd-adis/UI_UX/Hasil Klasifikasi_.jpg',
                    '/img/pcd-adis/UI_UX/Laporan Lingkungan_.jpg',
                    '/img/pcd-adis/UI_UX/Menu Utama.jpg',
                    '/img/pcd-adis/UI_UX/Panduan Pemilahan Sampah.jpg',
                    '/img/pcd-adis/UI_UX/Peta Lokasi TPA_TPS_Bank Sampah.jpg',
                    '/img/pcd-adis/UI_UX/Reward & Poin.jpg',
                    '/img/pcd-adis/UI_UX/Riwayat.jpg',
                    '/img/pcd-adis/UI_UX/Tahapan Preprocessing.jpg',
                    '/img/pcd-adis/UI_UX/Tantangan Eco.jpg'
                ]
            ],
            [
                'name' => 'Kora',
                'supervisor' => 'MUN',
                'type' => 'mobile',
                'logo' => '/img/mobile-reza/logo mobile dwiki.PNG',
                'tagline' => 'Aplikasi Workout Tracker & Monitoring Kesehatan Kebugaran Terintegrasi',
                'description' => 'Kora adalah aplikasi kebugaran berbasis mobile terintegrasi yang dirancang untuk membantu melacak dan memantau aktivitas olahraga pengguna secara mandiri, lengkap dengan Running Tracker berbasis GPS, pencatatan nutrisi harian, hingga pengukuran berkala tubuh.',
                'features' => [
                    'Workout Tracker untuk melacak dan merekam rutinitas latihan fisik harian',
                    'Running GPS Tracker untuk memantau rute dan jarak lari secara real-time berbasis koordinat GPS',
                    'Nutrition Tracker untuk mencatat dan menganalisis asupan nutrisi harian',
                    'Body Measurement Tracker untuk mencatat progres ukuran dan metrik tubuh berkala',
                    'Workout Schedule untuk menjadwalkan latihan fisik harian secara personal'
                ],
                'funding_awards' => [],
                'tech_field' => 'AI',
                'prestasi_level' => 'nasional',
                'partners' => ['Teknologi Informasi Telkom University Surabaya'],
                'logo_mitra' => ['img/logo.png'],
                'team_members' => [
                    [
                        'nickname' => 'Reza',
                        'fullname' => 'Muhammad Dwiky Yanuarezza',
                        'role' => null,
                        'photo' => '/img/mobile-reza/foto_tim/reza.png',
                        'social_media' => ['instagram' => 'https://www.instagram.com/Mrezza18/'],
                        'linkedin' => 'https://www.linkedin.com/in/muhammad-dwiky-yanuarezza-825993292/'
                    ],
                    [
                        'nickname' => 'Davin',
                        'fullname' => 'Davin Syah Putra Antoro',
                        'role' => null,
                        'photo' => '/img/mobile-reza/foto_tim/davin.png',
                        'social_media' => ['instagram' => 'https://instagram.com/'],
                        'linkedin' => null
                    ],
                    [
                        'nickname' => 'Mael',
                        'fullname' => 'Teuku Ismail Syuhada',
                        'role' => null,
                        'photo' => '/img/mobile-reza/foto_tim/mael.png',
                        'social_media' => ['instagram' => 'https://instagram.com/'],
                        'linkedin' => null
                    ],
                    [
                        'nickname' => 'Fajar',
                        'fullname' => 'Muhammad Fajar shodiq',
                        'role' => null,
                        'photo' => '/img/mobile-reza/foto_tim/fajar.png',
                        'social_media' => ['instagram' => 'https://instagram.com/'],
                        'linkedin' => null
                    ]
                ],
                'external_url' => null,
                'video_url' => null,
                'screenshots' => [
                    '/img/mobile-reza/uiux/1.jpg',
                    '/img/mobile-reza/uiux/2.jpg',
                    '/img/mobile-reza/uiux/3.jpg',
                    '/img/mobile-reza/uiux/4.jpg',
                    '/img/mobile-reza/uiux/5.jpg',
                    '/img/mobile-reza/uiux/6.jpg',
                    '/img/mobile-reza/uiux/7.jpg',
                    '/img/mobile-reza/uiux/8.jpg',
                    '/img/mobile-reza/uiux/9.jpg',
                    '/img/mobile-reza/uiux/10.jpg',
                    '/img/mobile-reza/uiux/11.jpg',
                    '/img/mobile-reza/uiux/12.jpg',
                    '/img/mobile-reza/uiux/13.jpg'
                ]
            ],
            [
                'name' => 'FreshNet',
                'supervisor' => 'FZK',
                'type' => 'mobile',
                'logo' => '/img/pcd-yuliana/logo/Logo_FreshNet.png',
                'tagline' => 'Aplikasi Deteksi Kesegaran Ikan Praktis & Objektif Berbasis AI CNN',
                'description' => 'FreshNet menghadirkan solusi praktis untuk mendeteksi kesegaran ikan secara cepat, objektif, dan mudah. Dengan dukungan teknologi AI berbasis Convolutional Neural Network (CNN), aplikasi ini menganalisis citra mata atau insang ikan untuk memberikan hasil berupa tingkat kesegaran, nilai confidence, serta rekomendasi kelayakan konsumsi.',
                'features' => [
                    'Deteksi kesegaran ikan berbasis AI (CNN) melalui analisis citra mata atau insang',
                    'Pengambilan foto ikan secara langsung dengan kamera smartphone atau unggah dari galeri',
                    'Hasil deteksi instan berupa tingkat kesegaran, nilai confidence, dan rekomendasi konsumsi',
                    'Riwayat pemeriksaan kesegaran ikan terintegrasi',
                    'Panduan edukatif interaktif mengenai ciri-ciri ikan segar dan tips pemilihan'
                ],
                'funding_awards' => [],
                'tech_field' => 'AI',
                'prestasi_level' => 'nasional',
                'partners' => ['Teknologi Informasi Telkom University Surabaya'],
                'logo_mitra' => ['img/logo.png'],
                'team_members' => [
                    [
                        'nickname' => 'Lia',
                        'fullname' => 'Yuliana Nur Hanifah',
                        'role' => 'Team Lead & AI Engineer',
                        'photo' => '/img/pcd-yuliana/foto_tim/Yuliana Nur Hannifah.jpg',
                        'social_media' => ['instagram' => 'https://instagram.com/'],
                        'linkedin' => 'https://www.linkedin.com/in/yuliananurhanifah/'
                    ],
                    [
                        'nickname' => 'Meisya',
                        'fullname' => 'Meisya Ma’rifa Nur',
                        'role' => 'Android Developer',
                        'photo' => '/img/pcd-yuliana/foto_tim/Meisya Marifa Nur.jpeg',
                        'social_media' => ['instagram' => 'https://instagram.com/'],
                        'linkedin' => 'https://www.linkedin.com/in/meisyamarifanur/'
                    ],
                    [
                        'nickname' => 'Sita',
                        'fullname' => 'Masita Nurjanah',
                        'role' => 'UI/UX Designer',
                        'photo' => '/img/pcd-yuliana/foto_tim/Masita Nurjanah.jpeg',
                        'social_media' => ['instagram' => 'https://instagram.com/'],
                        'linkedin' => 'https://www.linkedin.com/in/masitanurjanah/'
                    ],
                    [
                        'nickname' => 'Lely',
                        'fullname' => 'Lely Sylva Jemima Tarigan',
                        'role' => 'Quality Assurance & Data Collector',
                        'photo' => '/img/pcd-yuliana/foto_tim/Lely Sylva Jemima Tarigan.jpeg',
                        'social_media' => ['instagram' => 'https://instagram.com/'],
                        'linkedin' => 'https://www.linkedin.com/in/lely-sylva-jemima-tarigan-b63020296/'
                    ]
                ],
                'external_url' => null,
                'video_url' => null,
                'screenshots' => [
                    '/img/pcd-yuliana/uiux/Dashboard.png',
                    '/img/pcd-yuliana/uiux/Hasil Deteksi.png',
                    '/img/pcd-yuliana/uiux/History.png',
                    '/img/pcd-yuliana/uiux/Panduan.png',
                    '/img/pcd-yuliana/uiux/Profil.png',
                    '/img/pcd-yuliana/uiux/Scan.png'
                ]
            ],
            [
                'name' => 'FrutoSense',
                'supervisor' => 'FZK',
                'type' => 'mobile',
                'logo' => '/img/pcd-gandi/Logo FrutoSense.png',
                'tagline' => 'Deteksi Jenis, Kematangan, dan Kesegaran Buah Real-Time Berbasis AI Multi-Model MobileNetV2',
                'description' => 'FrutoSense adalah aplikasi mobile inovatif yang dikembangkan untuk membantu pengguna mengidentifikasi jenis, tingkat kematangan, dan tingkat kesegaran buah secara real-time langsung melalui kamera smartphone. Aplikasi ini mengintegrasikan 3 model AI MobileNetV2 yang berjalan secara paralel di backend FastAPI, terhubung dengan REST API Laravel 11 dan database PostgreSQL.',
                'features' => [
                    'Klasifikasi 3 Jenis Buah (Variety Model) — Apple, Banana, Orange (Akurasi 97.48%)',
                    'Deteksi Tingkat Kematangan (Ripeness Model) — Unripe, Ripe, Overripe (Akurasi 92.67%)',
                    'Penilaian Tingkat Kesegaran (Freshness Model) — Fresh, Unfresh (Akurasi 97.92%)',
                    'Inferensi AI Real-Time Paralel dengan FastAPI & TensorFlow 2.18 Engine',
                    'Sistem REST API Backend Menggunakan Laravel 11 dengan Autentikasi Sanctum',
                    'Antarmuka Pengguna Mobile yang Responsif & Interaktif Berbasis Flutter 3.11+ & Dart 3'
                ],
                'funding_awards' => null,
                'tech_field' => 'AI',
                'prestasi_level' => 'nasional',
                'partners' => ['Teknologi Informasi Telkom University Surabaya'],
                'logo_mitra' => ['img/logo.png'],
                'team_members' => [
                    [
                        'nickname' => 'Gandi',
                        'fullname' => 'Gandhi Suastika',
                        'role' => null,
                        'photo' => '/img/pcd-gandi/foto_tim/gandi.png',
                        'social_media' => ['instagram' => 'https://instagram.com/gandiwahyuu'],
                        'linkedin' => 'https://www.linkedin.com/in/gandhi-suastika-418218280/'
                    ],
                    [
                        'nickname' => 'Risky',
                        'fullname' => 'Rahmadinata Rizki Setiawan',
                        'role' => null,
                        'photo' => '/img/pcd-gandi/foto_tim/risky.png',
                        'social_media' => ['instagram' => 'https://instagram.com/rrzks_'],
                        'linkedin' => 'https://www.linkedin.com/in/rahmadinata-rizki-setiawan-57a661190'
                    ],
                    [
                        'nickname' => 'Celia',
                        'fullname' => 'Celia Jovita Carmel',
                        'role' => null,
                        'photo' => '/img/pcd-gandi/foto_tim/celia.png',
                        'social_media' => ['instagram' => 'https://instagram.com/celiaacarmel'],
                        'linkedin' => 'https://www.linkedin.com/in/celia-jovita-carmel-599112296'
                    ],
                    [
                        'nickname' => 'Aura',
                        'fullname' => 'Aura Salsabilla Hestyastuti',
                        'role' => null,
                        'photo' => '/img/pcd-gandi/foto_tim/aura.png',
                        'social_media' => ['instagram' => 'https://instagram.com/aurahestyy_'],
                        'linkedin' => 'https://www.linkedin.com/in/aura-salsabilla-hestyastuti-a62439295/'
                    ]
                ],
                'external_url' => null,
                'video_url' => null,
                'screenshots' => [
                    '/img/pcd-gandi/uiux/upload.png',
                    '/img/pcd-gandi/uiux/Screenshot 2026-06-09 at 10.09.28.png',
                    '/img/pcd-gandi/uiux/Screenshot 2026-06-09 at 10.09.36.png',
                    '/img/pcd-gandi/uiux/Screenshot 2026-06-09 at 10.12.07.png',
                    '/img/pcd-gandi/uiux/Screenshot 2026-06-09 at 10.12.30.png',
                    '/img/pcd-gandi/uiux/Screenshot 2026-06-09 at 10.12.57.png',
                    '/img/pcd-gandi/uiux/Screenshot 2026-06-24 at 20.44.39.png',
                    '/img/pcd-gandi/uiux/Screenshot 2026-06-24 at 20.52.50.png'
                ]
            ],
            [
                'name' => 'VoxSight AI',
                'supervisor' => 'YOH',
                'type' => 'hardware',
                'logo' => '/img/VoxSight AI/logo_voxsightAI.png',
                'tagline' => 'VoxSight AI: Kacamata Pintar Pemandu Tunanetra Berbasis AI',
                'description' => 'VoxSight AI adalah alat bantu mobilitas berupa kacamata pintar berbasis Artificial Intelligence (AI) untuk penyandang disabilitas netra. Dilengkapi dengan analisis lingkungan visual, identifikasi mata uang, identifikasi literatur melalui OCR, serta sistem umpan balik audio untuk mendukung kemandirian aktivitas sehari-hari.',
                'features' => [
                    'Analisis lingkungan visual untuk mendeteksi halangan',
                    'Identifikasi mata uang secara cepat',
                    'Identifikasi literatur dengan Text-to-Speech',
                    'Sistem umpan balik audio yang intuitif'
                ],
                'funding_awards' => [
                    'Pendanaan Innovilage sebesar Rp. 21.440.000'
                ],
                'tech_field' => 'AI',
                'prestasi_level' => 'nasional',
                'partners' => [
                    'SLB A Yayasan Pendidikan Anak Buta Surabaya'
                ],
                'logo_mitra' => ['img/VoxSight AI/logo mitra voxsight.png'],
                'team_members' => [
                    [
                        'nickname' => 'Fikri',
                        'fullname' => 'Muhammad Fikri Al Fathoni',
                        'role' => null,
                        'photo' => '/img/VoxSight AI/foto_tim/Muhammad Fikri Al Fathoni.jpg',
                        'social_media' => null,
                        'linkedin' => 'https://www.linkedin.com/in/muhammad-fikri-al-fathoni-6ab0b529a/'
                    ],
                    [
                        'nickname' => 'Floren',
                        'fullname' => 'Floren Fransiska Elisabet Sihite',
                        'role' => null,
                        'photo' => '/img/VoxSight AI/foto_tim/Floren Fransiska Elisabet Sihite.jpg',
                        'social_media' => null,
                        'linkedin' => 'https://www.linkedin.com/in/floren-fransiska-elisabet-sihite-9576a0278/'
                    ],
                    [
                        'nickname' => 'Laura',
                        'fullname' => 'Laura Djasmine Putri Tandiawan',
                        'role' => null,
                        'photo' => '/img/VoxSight AI/foto_tim/Laura Djasmine Putri Tandiawan.jpeg',
                        'social_media' => null,
                        'linkedin' => 'https://www.linkedin.com/in/laura-djasmine-putri-tandiawan-625bb1328/'
                    ],
                    [
                        'nickname' => 'Hans',
                        'fullname' => 'Hans Harold Barus',
                        'role' => null,
                        'photo' => '/img/VoxSight AI/foto_tim/Hans Harold Barus.jpg',
                        'social_media' => null,
                        'linkedin' => 'https://www.linkedin.com/in/hans-gg/'
                    ],
                    [
                        'nickname' => 'Krisna',
                        'fullname' => 'Krisna Maulana Rahman',
                        'role' => null,
                        'photo' => '/img/VoxSight AI/foto_tim/Krisna_Maulana_Rahman.jpeg',
                        'social_media' => null,
                        'linkedin' => 'https://www.linkedin.com/in/krsnmlna/'
                    ]
                ],
                'external_url' => null,
                'video_url' => 'https://youtu.be/xcR5Ts6rcRo',
                'screenshots' => null,
                'documentations' => [
                    '/img/VoxSight AI/dokumentasi/dokumentasi_1.jpg',
                    '/img/VoxSight AI/dokumentasi/dokumentasi_2.jpg',
                    '/img/VoxSight AI/dokumentasi/dokumentasi_3.jpeg'
                ]
            ],
            [
                'name' => 'Automatic Weather Station',
                'supervisor' => 'CAP',
                'type' => 'hardware',
                'logo' => 'reynanda.svg',
                'tagline' => 'Smart Irrigation for Sustainable Urban Farming',
                'description' => 'Smart Longan Irrigation System adalah aplikasi monitoring dan kontrol irigasi berbasis Internet of Things (IoT) dan Machine Learning yang dirancang untuk mendukung budidaya kelengkeng di lingkungan urban seperti rooftop farming. Sistem ini mampu memantau kondisi lingkungan secara real-time menggunakan berbagai sensor, kemudian memanfaatkan model Artificial Intelligence berbasis Random Forest untuk memprediksi kondisi cuaca serta menentukan durasi penyiraman yang paling optimal.
Melalui dashboard monitoring, pengguna dapat melihat data kelembaban tanah, suhu, kelembaban udara, curah hujan, hingga kecepatan angin secara langsung. Seluruh data tersebut diproses secara otomatis sehingga sistem dapat mengaktifkan pompa air dengan durasi yang sesuai tanpa intervensi manual. Pendekatan ini membantu mengurangi pemborosan air, meningkatkan efisiensi irigasi, serta menjaga kondisi tanaman tetap optimal.',
                'features' => [
                    'Real-Time Environmental Monitoring Berbasis IoT',
                    'AI Weather Prediction Menggunakan Random Forest',
                    'Machine Learning-Based Smart Irrigation Control',
                    'Remote Dashboard untuk Monitoring & Kontrol Pompa'
                ],
                'funding_awards' => [],
                'tech_field' => 'IoT',
                'prestasi_level' => 'nasional',
                'partners' => ['Telkom University'],
                'logo_mitra' => ['img/logo tel-u.jpeg'],
                'team_members' => [
                    [
                        'nickname' => 'Reynanda',
                        'fullname' => 'Reynanda Shaquille Purwanto',
                        'role' => null,
                        'photo' => 'avatar1.png',
                        'social_media' => ['instagram' => 'https://instagram.com/'],
                        'linkedin' => ['https://linkedin.com/in/']
                    ]
                ],
                'external_url' => null,
                'video_url' => null,
                'screenshots' => [
                    '/img/aws/tampilan mobile 1.png',
                    '/img/aws/tampilan mobile 2.png'
                ],
                'documentations' => [
                    '/img/aws/alat aws.png'
                ]
            ]
        ];

        foreach ($projects as $proj) {
            Project::create($proj);
        }
    }
}
