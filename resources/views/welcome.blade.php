<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- SEO Optimization Meta Tags -->
    <title>Exhibition Platform - Pameran Teknologi Inovasi Tugas Akhir</title>
    <meta name="description" content="Platform Showcase Tugas Akhir dan Proyek Inovatif mahasiswa dengan TKT minimal Level 5. Temukan inovasi berbasis web, mobile, dan hardware.">
    <meta name="keywords" content="tugas akhir, pameran teknologi, pcd, web-based, mobile-based, hardware-based, TKT, inovasi">
    <meta name="author" content="Platform Akreditasi Inovasi">
    
    <!-- Website Favicon -->
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/png">
    
    <!-- Open Graph Tags (Social Media Link Previews) -->
    <meta property="og:title" content="Platform Pameran Teknologi & Tugas Akhir Inovatif">
    <meta property="og:description" content="Showcase karya inovatif mahasiswa berbasis Web, Mobile, dan Hardware dengan kesiapan teknologi level tinggi.">
    <meta property="og:type" content="website">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Vite Styles and Scripts (Vue + Bootstrap + Sass) -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Inline loading styles for better UX -->
    <style>
        .loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 50% 50%, #202430 0%, #0d0e12 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease-out, visibility 0.5s ease-out;
        }
        .spinner-glow {
            width: 50px;
            height: 50px;
            border: 3px solid rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            border-top-color: #cbd5e1;
            animation: spin 1s linear infinite;
            box-shadow: 0 0 15px rgba(148, 163, 184, 0.15);
        }
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="antialiased">
    <!-- Initial Loading Screen (dismissed by Vue mounting) -->
    <div id="loading" class="loading-screen">
        <div class="text-center">
            <div class="spinner-glow mb-3 mx-auto"></div>
            <p class="text-white fw-bold mb-0" style="letter-spacing: 1px;">Loading Om...</p>
        </div>
    </div>

    <!-- Main Vue App Mount Point -->
    <div id="app">
        @if(isset($projects) && count($projects) > 0)
            <exhibition-platform :initial-projects="{{ $projects->toJson() }}"></exhibition-platform>
        @else
            <!-- Fallback design if database is empty/not seeded yet -->
            <div class="container py-5 text-center min-h-screen d-flex align-items-center justify-content-center">
                <div class="p-5 rounded-4 border border-secondary" style="background: rgba(17, 23, 41, 0.6); max-width: 600px; backdrop-filter: blur(10px);">
                    <h2 class="text-white fw-bold mb-3">Pameran Belum Siap</h2>
                    <p class="text-secondary mb-4">
                        Database belum berhasil dimigrasi atau di-seed dengan data proyek. Pastikan file konfigurasi database di <code>.env</code> sudah benar, lalu jalankan perintah migrasi.
                    </p>
                    <div class="p-3 bg-dark rounded border border-secondary text-start mb-4">
                        <code class="text-info d-block"># Jalankan perintah ini di terminal:</code>
                        <code class="text-white d-block">php artisan migrate:fresh --seed</code>
                    </div>
                    <p class="text-warning small mb-0">
                        ⚠ Jika Anda mengalami masalah otentikasi MySQL, pastikan kredensial database sudah dikonfigurasi dengan benar.
                    </p>
                </div>
            </div>
        @endif
    </div>

    <!-- Bootstrap Bundle from CDN as fallback or compiled assets. 
         Laravel UI includes Bootstrap JS compiled in resources/js/bootstrap.js.
         We define window.bootstrap so our Vue components can open modals. -->
    <script>
        // Dismiss loading screen when document is loaded or Vue mounts
        function hideLoader() {
            const loader = document.getElementById('loading');
            if (loader && loader.style.display !== 'none') {
                loader.style.opacity = 0;
                loader.style.visibility = 'hidden';
                loader.style.pointerEvents = 'none';
                setTimeout(() => {
                    loader.style.display = 'none';
                }, 500);
            }
        }

        if (document.readyState === 'loading') {
            window.addEventListener('DOMContentLoaded', hideLoader);
        } else {
            hideLoader();
        }
    </script>
</body>
</html>
