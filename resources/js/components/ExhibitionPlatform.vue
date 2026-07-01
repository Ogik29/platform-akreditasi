<template>
    <div class="platform-wrapper position-relative">
        <!-- Glowing background lights wrapper to prevent viewport overflow -->
        <div class="glow-container">
            <div class="glow-bg glow-top-left"></div>
            <div class="glow-bg glow-bottom-right"></div>
            <div class="glow-bg glow-center"></div>
        </div>

        <!-- Custom transition loader matching initial loading screen -->
        <transition name="loader-fade">
            <div class="vue-transition-loader" v-if="isTransitioning">
                <div class="text-center">
                    <div class="spinner-glow mb-3 mx-auto"></div>
                    <p
                        class="text-white fw-bold mb-0"
                        style="letter-spacing: 1px"
                    >
                        Loading Om...
                    </p>
                </div>
            </div>
        </transition>

        <div class="container py-5">
            <transition name="fade" mode="out-in">
                <!-- Grid View -->
                <div v-if="currentView === 'grid'" key="grid">
                    <!-- Header / Hero Section -->
                    <header class="text-center mb-5 mt-4 fade-in-up">
                        <div class="float-animation">
                            <div
                                class="d-inline-block px-3 py-1 mb-3 rounded-pill bg-dark bg-opacity-50 border border-secondary text-secondary fw-bold fade-in-up anim-delay-100"
                                style="
                                    font-size: 0.85rem;
                                    letter-spacing: 1px;
                                    border-color: rgba(
                                        255,
                                        255,
                                        255,
                                        0.2
                                    ) !important;
                                    color: #cbd5e1 !important;
                                "
                            >
                                ★ PAMERAN PRODI TEKNOLOGI INFORMASI ★
                            </div>
                            <h1
                                class="display-3 fw-extrabold text-white mb-3 fade-in-up anim-delay-200"
                            >
                                Pameran
                                <span class="text-gradient-silver"
                                    >Teknologi</span
                                >
                                &amp;
                                <span class="text-gradient-titanium"
                                    >Inovasi</span
                                >
                            </h1>
                            <p
                                class="lead text-secondary mx-auto mb-4 fade-in-up anim-delay-300"
                                style="max-width: 720px"
                            >
                                Selamat datang di Platform Showcase Tugas Akhir
                                dan Proyek Inovatif Mahasiswa Teknologi
                                Informasi Telkom University Surabaya. Kami
                                menampilkan hasil karya terbaik mahasiswa dari 3
                                platform berbeda dengan raihan prestasi nasional
                                dan internasional.
                            </p>

                            <!-- Stats Counters -->
                            <div
                                class="row justify-content-center g-2 g-sm-3 mt-4"
                                style="max-width: 960px; margin: 0 auto"
                            >
                                <div
                                    class="col-6 col-sm-4 col-lg fade-in-up anim-delay-400"
                                >
                                    <div
                                        class="glass-card p-2 p-sm-3 text-center"
                                    >
                                        <h3
                                            class="fw-bold text-info mb-1 stats-number"
                                        >
                                            {{ projects.length }}
                                        </h3>
                                        <small
                                            class="text-secondary d-block stats-label"
                                            >Total Proyek</small
                                        >
                                    </div>
                                </div>
                                <div
                                    class="col-6 col-sm-4 col-lg fade-in-up anim-delay-500"
                                >
                                    <div
                                        class="glass-card p-2 p-sm-3 text-center"
                                    >
                                        <h3
                                            class="fw-bold mb-1 stats-number"
                                            style="color: #60a5fa"
                                        >
                                            {{ totalNasional }}
                                        </h3>
                                        <small
                                            class="text-secondary d-block stats-label"
                                            >Prestasi Nasional</small
                                        >
                                    </div>
                                </div>
                                <div
                                    class="col-6 col-sm-4 col-lg fade-in-up anim-delay-500"
                                >
                                    <div
                                        class="glass-card p-2 p-sm-3 text-center"
                                    >
                                        <h3
                                            class="fw-bold mb-1 stats-number"
                                            style="color: #a78bfa"
                                        >
                                            {{ totalInternasional }}
                                        </h3>
                                        <small
                                            class="text-secondary d-block stats-label"
                                            >Prestasi Internasional</small
                                        >
                                    </div>
                                </div>
                                <div
                                    class="col-6 col-sm-4 col-lg fade-in-up anim-delay-500"
                                >
                                    <div
                                        class="glass-card p-2 p-sm-3 text-center"
                                    >
                                        <h3
                                            class="fw-bold text-warning mb-1 stats-number"
                                        >
                                            {{ totalMitra }}
                                        </h3>
                                        <small
                                            class="text-secondary d-block stats-label"
                                            >Total Mitra</small
                                        >
                                    </div>
                                </div>
                                <div
                                    class="col-6 col-sm-4 col-lg fade-in-up anim-delay-500"
                                >
                                    <div
                                        class="glass-card p-2 p-sm-3 text-center"
                                    >
                                        <h3
                                            class="fw-bold text-secondary mb-1 stats-number"
                                            style="color: #cbd5e1 !important"
                                        >
                                            5
                                        </h3>
                                        <small
                                            class="text-secondary d-block stats-label"
                                            >Dosen Pembimbing</small
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>

                    <!-- Search & Filters Row -->
                    <section class="mb-5 fade-in-up anim-delay-500">
                        <div class="glass-card p-3 p-sm-4">
                            <div class="row g-4 align-items-center">
                                <!-- Search input -->
                                <div class="col-lg-6">
                                    <label
                                        class="text-secondary small fw-bold mb-2 uppercase-tracking d-block"
                                        >Cari Proyek</label
                                    >
                                    <input
                                        type="text"
                                        v-model="searchQuery"
                                        class="form-control form-control-custom w-100"
                                        placeholder="Cari nama, tagline, fitur, atau mitra..."
                                    />
                                </div>

                                <!-- Supervisor filter -->
                                <div class="col-lg-6">
                                    <label
                                        class="text-secondary small fw-bold mb-2 uppercase-tracking d-block"
                                        >Dosen Pembimbing</label
                                    >
                                    <select
                                        v-model="selectedSupervisor"
                                        class="form-select form-select-custom w-100"
                                    >
                                        <option value="all">
                                            Semua Dosen Pembimbing
                                        </option>
                                        <option value="MDB">
                                            MDB (Muhammad Adib Kamali, S.T.,
                                            M.Eng)
                                        </option>
                                        <option value="FZK">
                                            FZK (Dr. Farah Zakiyah Rahmanti,
                                            S.ST., M.T)
                                        </option>
                                        <option value="MUN">
                                            MUN (Mastuty Ayu Ningtyas, S.Kom.,
                                            M.MT.)
                                        </option>
                                        <option value="YOH">
                                            YOH (Yohanes Setiawan. S.Si.,
                                            M.Kom.)
                                        </option>
                                        <option value="CAP">
                                            CAP (Dr. Helmy Widyantara, S.Kom.,
                                            M.Eng.)
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <!-- Bidang Teknologi Filter -->
                            <div
                                class="mt-4 pt-3 border-top border-secondary border-opacity-10"
                            >
                                <label
                                    class="text-secondary small fw-bold mb-3 d-block uppercase-tracking"
                                    >Bidang Teknologi</label
                                >
                                <div class="d-flex flex-wrap gap-2">
                                    <button
                                        type="button"
                                        @click="selectedTechField = 'all'"
                                        :class="[
                                            'btn-filter',
                                            selectedTechField === 'all'
                                                ? 'active'
                                                : '',
                                        ]"
                                    >
                                        <span class="btn-filter-icon">✨</span>
                                        Semua Bidang
                                    </button>
                                    <button
                                        type="button"
                                        @click="selectedTechField = 'AI'"
                                        :class="[
                                            'btn-filter btn-filter-ai',
                                            selectedTechField === 'AI'
                                                ? 'active'
                                                : '',
                                        ]"
                                    >
                                        <span class="btn-filter-icon">🤖</span>
                                        AI
                                    </button>
                                    <button
                                        type="button"
                                        @click="selectedTechField = 'IoT'"
                                        :class="[
                                            'btn-filter btn-filter-iot',
                                            selectedTechField === 'IoT'
                                                ? 'active'
                                                : '',
                                        ]"
                                    >
                                        <span class="btn-filter-icon">📡</span>
                                        IoT
                                    </button>
                                    <button
                                        type="button"
                                        @click="selectedTechField = 'VR/AR'"
                                        :class="[
                                            'btn-filter btn-filter-vrar',
                                            selectedTechField === 'VR/AR'
                                                ? 'active'
                                                : '',
                                        ]"
                                    >
                                        <span class="btn-filter-icon">🥽</span>
                                        VR/AR
                                    </button>
                                    <button
                                        type="button"
                                        @click="
                                            selectedTechField =
                                                'Networking & Cyber Security'
                                        "
                                        :class="[
                                            'btn-filter btn-filter-ncs',
                                            selectedTechField ===
                                            'Networking & Cyber Security'
                                                ? 'active'
                                                : '',
                                        ]"
                                    >
                                        <span class="btn-filter-icon">🔐</span>
                                        Networking &amp; Cyber Security
                                    </button>
                                    <button
                                        type="button"
                                        @click="selectedTechField = 'Others'"
                                        :class="[
                                            'btn-filter btn-filter-others',
                                            selectedTechField === 'Others'
                                                ? 'active'
                                                : '',
                                        ]"
                                    >
                                        <span class="btn-filter-icon">🔬</span>
                                        Others
                                    </button>
                                </div>
                            </div>

                            <!-- Jenis Platform Filter -->
                            <div
                                class="mt-4 pt-3 border-top border-secondary border-opacity-10"
                            >
                                <label
                                    class="text-secondary small fw-bold mb-3 d-block uppercase-tracking"
                                    >Jenis Platform</label
                                >
                                <div class="d-flex flex-wrap gap-2">
                                    <button
                                        type="button"
                                        @click="selectedType = 'all'"
                                        :class="[
                                            'btn-filter',
                                            selectedType === 'all'
                                                ? 'active'
                                                : '',
                                        ]"
                                    >
                                        <span class="btn-filter-icon">🌐</span>
                                        Semua Kategori
                                    </button>
                                    <button
                                        type="button"
                                        @click="selectedType = 'web'"
                                        :class="[
                                            'btn-filter',
                                            selectedType === 'web'
                                                ? 'active'
                                                : '',
                                        ]"
                                    >
                                        <span class="btn-filter-icon">💻</span>
                                        Web-Based
                                    </button>
                                    <button
                                        type="button"
                                        @click="selectedType = 'mobile'"
                                        :class="[
                                            'btn-filter',
                                            selectedType === 'mobile'
                                                ? 'active'
                                                : '',
                                        ]"
                                    >
                                        <span class="btn-filter-icon">📱</span>
                                        Mobile-Based
                                    </button>
                                    <button
                                        type="button"
                                        @click="selectedType = 'hardware'"
                                        :class="[
                                            'btn-filter',
                                            selectedType === 'hardware'
                                                ? 'active'
                                                : '',
                                        ]"
                                    >
                                        <span class="btn-filter-icon">⚡</span>
                                        Hardware-Based
                                    </button>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Empty State -->
                    <div
                        v-if="filteredProjects.length === 0"
                        class="text-center py-5 glass-card fade-in-up"
                    >
                        <div class="fs-1 mb-2">📂</div>
                        <h5 class="text-secondary mb-3">
                            Tidak ditemukan proyek yang cocok dengan kriteria
                            filter Anda
                        </h5>
                        <button class="btn btn-silver" @click="resetFilters">
                            Reset Filter
                        </button>
                    </div>

                    <!-- Standard 3-Column Project Grid -->
                    <transition-group
                        v-else
                        name="project-list"
                        tag="div"
                        class="row g-4"
                    >
                        <div
                            v-for="project in filteredProjects"
                            :key="project.id"
                            class="col-12 col-md-6 col-lg-4"
                        >
                            <div
                                class="glass-card h-100 p-3 p-sm-4 d-flex flex-column justify-content-between"
                            >
                                <!-- Dynamic background logo watermark -->
                                <div
                                    class="card-bg-logo"
                                    v-if="
                                        project.logo &&
                                        hasRealLogo(project.logo)
                                    "
                                >
                                    <img
                                        :src="project.logo"
                                        alt="Background Logo"
                                    />
                                </div>

                                <div>
                                    <!-- Card Header -->
                                    <div
                                        class="d-flex justify-content-between align-items-start mb-3 gap-2"
                                    >
                                        <div
                                            class="d-flex align-items-center"
                                            style="min-width: 0; flex: 1"
                                        >
                                            <!-- Initials or logo image frame -->
                                            <div
                                                class="logo-frame bg-dark bg-opacity-50 border border-secondary rounded-3 d-flex justify-content-center align-items-center me-3 flex-shrink-0 overflow-hidden"
                                                style="
                                                    width: 50px;
                                                    height: 50px;
                                                    border-color: rgba(
                                                        255,
                                                        255,
                                                        255,
                                                        0.15
                                                    ) !important;
                                                "
                                            >
                                                <img
                                                    v-if="
                                                        project.logo &&
                                                        hasRealLogo(
                                                            project.logo,
                                                        )
                                                    "
                                                    :src="project.logo"
                                                    alt="Logo"
                                                    style="
                                                        width: 100%;
                                                        height: 100%;
                                                        object-fit: cover;
                                                    "
                                                />
                                                <span
                                                    v-else
                                                    class="fs-4 fw-extrabold text-info"
                                                    >{{
                                                        project.name
                                                            .substring(0, 2)
                                                            .toUpperCase()
                                                    }}</span
                                                >
                                            </div>
                                            <div style="min-width: 0; flex: 1">
                                                <h5
                                                    class="fw-bold text-white mb-0 text-truncate"
                                                    :title="project.name"
                                                >
                                                    {{ project.name }}
                                                </h5>
                                                <span
                                                    class="text-secondary text-truncate d-block"
                                                    style="font-size: 0.75rem"
                                                    >Dosen:
                                                    {{
                                                        project.supervisor
                                                    }}</span
                                                >
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tagline -->
                                    <h6
                                        class="project-card-tagline fw-bold text-light opacity-75 mb-2"
                                    >
                                        {{ project.tagline }}
                                    </h6>
                                    <!-- Description -->
                                    <!-- <p
                            class="small text-secondary mb-4"
                            style="line-height: 1.6"
                        >
                            {{
                                project.description.length > 120
                                    ? project.description.substring(0, 120) +
                                      "..."
                                    : project.description
                            }}
                        </p> -->
                                </div>

                                <!-- Card Footer Buttons -->
                                <div>
                                    <!-- Tech field badge -->
                                    <div class="mb-2">
                                        <span
                                            :class="[
                                                'badge badge-tech-field',
                                                'badge-tech-' +
                                                    (
                                                        project.tech_field ||
                                                        'others'
                                                    )
                                                        .toLowerCase()
                                                        .replace(
                                                            /[^a-z]/g,
                                                            '-',
                                                        ),
                                            ]"
                                        >
                                            {{
                                                getTechFieldIcon(
                                                    project.tech_field,
                                                )
                                            }}
                                            {{ project.tech_field || "Others" }}
                                        </span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-between align-items-center border-top border-secondary border-opacity-20 pt-3 mb-3"
                                    >
                                        <span
                                            :class="[
                                                'badge badge-premium',
                                                getTypeBadgeClass(project.type),
                                            ]"
                                        >
                                            {{ formatType(project.type) }}
                                        </span>
                                        <span class="text-secondary small">
                                            Prestasi:
                                            <span
                                                class="text-capitalize fw-bold text-white"
                                                >{{
                                                    project.prestasi_level
                                                }}</span
                                            >
                                        </span>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <button
                                            @click="handleShowcase(project)"
                                            class="btn btn-outline-silver flex-grow-1 text-nowrap py-2"
                                            style="font-size: 0.85rem"
                                        >
                                            Showcase
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </transition-group>
                </div>
                <!-- Closes currentView === 'grid' -->

                <!-- Project Detail Showcase View -->
                <div
                    v-else-if="currentView === 'detail' && selectedProject"
                    key="detail"
                    class="project-detail-view pb-5 fade-in-up"
                >
                    <!-- Back Button -->
                    <div class="mb-4">
                        <button
                            @click="backToGrid"
                            class="btn btn-outline-silver btn-back py-2 px-4 d-inline-flex align-items-center gap-2"
                            style="font-size: 0.9rem"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                fill="currentColor"
                                class="bi bi-arrow-left"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"
                                />
                            </svg>
                            Kembali ke Galeri
                        </button>
                    </div>

                    <!-- Hero / Title Header Banner -->
                    <div class="glass-card p-4 p-md-5 mb-5">
                        <div class="row align-items-center g-4">
                            <div
                                class="col-md-8 d-flex align-items-center flex-column flex-sm-row text-center text-sm-start gap-4"
                            >
                                <!-- Initials or logo image frame -->
                                <div
                                    class="logo-frame bg-dark bg-opacity-50 border border-secondary rounded-4 d-flex justify-content-center align-items-center flex-shrink-0 overflow-hidden"
                                    style="
                                        width: 80px;
                                        height: 80px;
                                        border-color: rgba(
                                            255,
                                            255,
                                            255,
                                            0.15
                                        ) !important;
                                    "
                                >
                                    <img
                                        v-if="
                                            selectedProject.logo &&
                                            hasRealLogo(selectedProject.logo)
                                        "
                                        :src="selectedProject.logo"
                                        alt="Logo"
                                        style="
                                            width: 100%;
                                            height: 100%;
                                            object-fit: cover;
                                        "
                                    />
                                    <span
                                        v-else
                                        class="fs-2 fw-extrabold text-info"
                                        >{{
                                            selectedProject.name
                                                .substring(0, 2)
                                                .toUpperCase()
                                        }}</span
                                    >
                                </div>
                                <div>
                                    <h1
                                        class="display-6 fw-extrabold text-white mb-2"
                                    >
                                        {{ selectedProject.name }}
                                    </h1>
                                    <p
                                        class="lead text-secondary mb-0"
                                        style="
                                            font-size: 1rem;
                                            line-height: 1.5;
                                        "
                                    >
                                        {{ selectedProject.tagline }}
                                    </p>
                                </div>
                            </div>
                            <div
                                class="col-md-4 d-flex flex-wrap justify-content-center justify-content-md-end gap-2"
                            >
                                <span
                                    :class="[
                                        'badge badge-premium py-2 px-3',
                                        getTypeBadgeClass(selectedProject.type),
                                    ]"
                                >
                                    {{ formatType(selectedProject.type) }}
                                </span>
                                <span
                                    class="badge bg-secondary bg-opacity-20 border border-secondary border-opacity-35 text-white py-2 px-3 text-capitalize"
                                    style="font-size: 0.75rem"
                                    >Prestasi:
                                    {{ selectedProject.prestasi_level }}</span
                                >
                            </div>
                        </div>
                    </div>

                    <!-- Content Sections -->
                    <div class="row g-4">
                        <!-- Left: Interactive Sandbox & Description -->
                        <div class="col-lg-8">
                            <!-- Web Application Preview (Web-based) -->
                            <div
                                v-if="selectedProject.type === 'web'"
                                class="glass-card p-4 mb-4"
                            >
                                <h4
                                    class="fw-bold text-white mb-4 d-flex align-items-center gap-2"
                                >
                                    <span>🌐 Platform Web</span>
                                </h4>
                                <div
                                    class="web-redirect-container text-center py-5 animate-pulse-subtle"
                                    style="
                                        background: rgba(15, 23, 42, 0.3);
                                        border: 1px dashed
                                            rgba(255, 255, 255, 0.15);
                                        border-radius: 16px;
                                    "
                                >
                                    <span class="fs-1 d-block mb-3">💻</span>
                                    <h5 class="text-white fw-bold mb-2">
                                        Platform Web Siap Diakses
                                    </h5>
                                    <p
                                        class="text-secondary small mx-auto mb-4"
                                        style="max-width: 480px"
                                    >
                                        Proyek ini merupakan aplikasi berbasis
                                        web yang dihosting secara live. Klik
                                        tombol di bawah ini untuk membuka dan
                                        mencoba platform secara langsung pada
                                        tab baru.
                                    </p>
                                    <a
                                        v-if="selectedProject.external_url"
                                        :href="selectedProject.external_url"
                                        target="_blank"
                                        class="btn btn-silver btn-web-launch py-2.5 px-4 d-inline-flex align-items-center gap-2"
                                        style="
                                            font-size: 0.95rem;
                                            font-weight: 600;
                                        "
                                    >
                                        <span>Buka Aplikasi Web</span>
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                            fill="currentColor"
                                            class="bi bi-box-arrow-up-right"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z"
                                            />
                                            <path
                                                fill-rule="evenodd"
                                                d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z"
                                            />
                                        </svg>
                                    </a>
                                    <span
                                        v-else
                                        class="text-muted text-italic small"
                                        >URL Website tidak tersedia</span
                                    >
                                </div>
                            </div>

                            <!-- Screenshots Grid (Mobile-based) -->
                            <div
                                v-if="selectedProject.type === 'mobile'"
                                class="glass-card p-4 mb-4"
                            >
                                <h4
                                    class="fw-bold text-white mb-4 d-flex align-items-center gap-2"
                                >
                                    <span>📱 Pratinjau Antarmuka Aplikasi</span>
                                </h4>
                                <div
                                    v-if="
                                        selectedProject.screenshots &&
                                        selectedProject.screenshots.length > 0
                                    "
                                    class="screenshots-slider-wrapper"
                                >
                                    <!-- Left scroll button -->
                                    <button
                                        v-if="
                                            selectedProject.screenshots.length >
                                            3
                                        "
                                        @click="
                                            scrollCarousel(
                                                'left',
                                                'mobileCarousel',
                                            )
                                        "
                                        class="btn-carousel-nav btn-carousel-nav-left"
                                        aria-label="Scroll Left"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="20"
                                            height="20"
                                            fill="currentColor"
                                            class="bi bi-chevron-left"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"
                                            />
                                        </svg>
                                    </button>

                                    <!-- Scroller container -->
                                    <div
                                        ref="mobileCarousel"
                                        class="screenshots-carousel-container"
                                        :class="{
                                            'justify-content-center':
                                                selectedProject.screenshots
                                                    .length <= 3,
                                        }"
                                    >
                                        <div
                                            v-for="(
                                                scr, idx
                                            ) in selectedProject.screenshots"
                                            :key="idx"
                                            class="screenshot-carousel-item mobile-item text-center"
                                        >
                                            <div
                                                class="screenshot-wrapper p-2 bg-dark bg-opacity-25 rounded border border-secondary border-opacity-30"
                                            >
                                                <img
                                                    :src="scr"
                                                    class="img-fluid rounded shadow-sm screenshot-static-img lightbox-trigger"
                                                    alt="Screenshot"
                                                    @click="openLightbox(scr)"
                                                />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Right scroll button -->
                                    <button
                                        v-if="
                                            selectedProject.screenshots.length >
                                            3
                                        "
                                        @click="
                                            scrollCarousel(
                                                'right',
                                                'mobileCarousel',
                                            )
                                        "
                                        class="btn-carousel-nav btn-carousel-nav-right"
                                        aria-label="Scroll Right"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="20"
                                            height="20"
                                            fill="currentColor"
                                            class="bi bi-chevron-right"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"
                                            />
                                        </svg>
                                    </button>
                                </div>
                                <div v-else class="text-center py-5">
                                    <span class="fs-1 d-block mb-2">📱</span>
                                    <p class="text-secondary small mb-0">
                                        Screenshot Tidak Tersedia
                                    </p>
                                </div>
                            </div>

                            <!-- Video / Demonstration (Show if video_url is present, regardless of type) -->
                            <div
                                v-if="selectedProject.video_url"
                                class="glass-card p-4 mb-4"
                            >
                                <h4
                                    class="fw-bold text-white mb-4 d-flex align-items-center gap-2"
                                >
                                    <span>🎬 Video Dokumentasi &amp; Demo</span>
                                </h4>
                                <div class="video-container">
                                    <iframe
                                        :src="
                                            getEmbedUrl(
                                                selectedProject.video_url,
                                            )
                                        "
                                        frameborder="0"
                                        allow="
                                            accelerometer;
                                            autoplay;
                                            clipboard-write;
                                            encrypted-media;
                                            gyroscope;
                                            picture-in-picture;
                                        "
                                        allowfullscreen
                                    ></iframe>
                                </div>
                            </div>
                            <!-- Fallback for Hardware-based projects without video_url -->
                            <div
                                v-else-if="selectedProject.type === 'hardware'"
                                class="glass-card p-4 mb-4"
                            >
                                <h4
                                    class="fw-bold text-white mb-4 d-flex align-items-center gap-2"
                                >
                                    <span>🎬 Video Dokumentasi Alat</span>
                                </h4>
                                <div class="text-center py-5">
                                    <span class="fs-1 d-block mb-3">🛠️</span>
                                    <h5 class="text-white fw-bold">
                                        Prototipe Fisik &amp; Integrasi
                                    </h5>
                                    <p
                                        class="text-secondary small mx-auto mb-0"
                                        style="max-width: 480px"
                                    >
                                        Hubungkan daya alat dan jalankan
                                        demonstrasi hardware secara real-time di
                                        stand pameran. Anggota tim kami siap
                                        membantu Anda mengoperasikan modul
                                        fisik.
                                    </p>
                                </div>
                            </div>

                            <!-- Documentation Photos (Any project type with documentations) -->
                            <div
                                v-if="
                                    selectedProject.documentations &&
                                    selectedProject.documentations.length > 0
                                "
                                class="glass-card p-4 mb-4"
                            >
                                <h4
                                    class="fw-bold text-white mb-4 d-flex align-items-center gap-2"
                                >
                                    <span>📸 Foto Dokumentasi Proyek</span>
                                </h4>
                                <div class="screenshots-slider-wrapper">
                                    <!-- Left scroll button -->
                                    <button
                                        v-if="
                                            selectedProject.documentations.length >
                                            3
                                        "
                                        @click="
                                            scrollCarousel(
                                                'left',
                                                'documentationCarousel',
                                            )
                                        "
                                        class="btn-carousel-nav btn-carousel-nav-left"
                                        aria-label="Scroll Left"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="20"
                                            height="20"
                                            fill="currentColor"
                                            class="bi bi-chevron-left"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"
                                            />
                                        </svg>
                                    </button>

                                    <!-- Scroller container -->
                                    <div
                                        ref="documentationCarousel"
                                        class="screenshots-carousel-container"
                                        :class="{
                                            'justify-content-center':
                                                selectedProject.documentations
                                                    .length <= 3,
                                        }"
                                    >
                                        <div
                                            v-for="(
                                                scr, idx
                                            ) in selectedProject.documentations"
                                            :key="idx"
                                            class="screenshot-carousel-item hardware-item text-center"
                                        >
                                            <div
                                                class="screenshot-wrapper p-2 bg-dark bg-opacity-25 rounded border border-secondary border-opacity-30"
                                            >
                                                <img
                                                    :src="scr"
                                                    class="img-fluid rounded shadow-sm screenshot-static-img lightbox-trigger"
                                                    alt="Dokumentasi"
                                                    @click="openLightbox(scr)"
                                                />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Right scroll button -->
                                    <button
                                        v-if="
                                            selectedProject.documentations.length >
                                            3
                                        "
                                        @click="
                                            scrollCarousel(
                                                'right',
                                                'documentationCarousel',
                                            )
                                        "
                                        class="btn-carousel-nav btn-carousel-nav-right"
                                        aria-label="Scroll Right"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="20"
                                            height="20"
                                            fill="currentColor"
                                            class="bi bi-chevron-right"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"
                                            />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <!-- Landscape Screenshots (Web or Hardware with screenshots) -->
                            <div
                                v-if="
                                    selectedProject.type !== 'mobile' &&
                                    selectedProject.screenshots &&
                                    selectedProject.screenshots.length > 0
                                "
                                class="glass-card p-4 mb-4"
                            >
                                <h4
                                    class="fw-bold text-white mb-4 d-flex align-items-center gap-2"
                                >
                                    <span>📸 Pratinjau Antarmuka Platform</span>
                                </h4>
                                <div class="screenshots-slider-wrapper">
                                    <!-- Left scroll button -->
                                    <button
                                        v-if="
                                            selectedProject.screenshots.length >
                                            3
                                        "
                                        @click="
                                            scrollCarousel(
                                                'left',
                                                'landscapeScreenshotsCarousel',
                                            )
                                        "
                                        class="btn-carousel-nav btn-carousel-nav-left"
                                        aria-label="Scroll Left"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="20"
                                            height="20"
                                            fill="currentColor"
                                            class="bi bi-chevron-left"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"
                                            />
                                        </svg>
                                    </button>

                                    <!-- Scroller container -->
                                    <div
                                        ref="landscapeScreenshotsCarousel"
                                        class="screenshots-carousel-container"
                                        :class="{
                                            'justify-content-center':
                                                selectedProject.screenshots
                                                    .length <= 3,
                                        }"
                                    >
                                        <div
                                            v-for="(
                                                scr, idx
                                            ) in selectedProject.screenshots"
                                            :key="idx"
                                            class="screenshot-carousel-item hardware-item text-center"
                                        >
                                            <div
                                                class="screenshot-wrapper p-2 bg-dark bg-opacity-25 rounded border border-secondary border-opacity-30"
                                            >
                                                <img
                                                    :src="scr"
                                                    class="img-fluid rounded shadow-sm screenshot-static-img lightbox-trigger"
                                                    alt="Pratinjau"
                                                    @click="openLightbox(scr)"
                                                />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Right scroll button -->
                                    <button
                                        v-if="
                                            selectedProject.screenshots.length >
                                            3
                                        "
                                        @click="
                                            scrollCarousel(
                                                'right',
                                                'landscapeScreenshotsCarousel',
                                            )
                                        "
                                        class="btn-carousel-nav btn-carousel-nav-right"
                                        aria-label="Scroll Right"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="20"
                                            height="20"
                                            fill="currentColor"
                                            class="bi bi-chevron-right"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"
                                            />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <!-- Description Card -->
                            <div class="glass-card p-4 p-md-5 mb-4">
                                <h4
                                    class="fw-bold text-white border-bottom border-secondary border-opacity-20 pb-3 mb-4"
                                >
                                    Deskripsi Proyek
                                </h4>
                                <p
                                    class="text-secondary leading-relaxed mb-0"
                                    style="font-size: 1rem; line-height: 1.75"
                                >
                                    {{ selectedProject.description }}
                                </p>
                            </div>
                        </div>

                        <!-- Right: Specifications & Achievements -->
                        <div class="col-lg-4">
                            <!-- Specifications Details Card -->
                            <div class="glass-card p-4 mb-4">
                                <h4
                                    class="fw-bold text-white border-bottom border-secondary border-opacity-20 pb-3 mb-4"
                                >
                                    Detail Spesifikasi
                                </h4>
                                <div class="d-flex flex-column gap-3">
                                    <div>
                                        <span
                                            class="text-secondary d-block small mb-1"
                                            >Dosen Pembimbing</span
                                        >
                                        <span
                                            class="text-white fw-bold d-block"
                                            >{{
                                                getSupervisorFullName(
                                                    selectedProject.supervisor,
                                                )
                                            }}</span
                                        >
                                    </div>
                                    <div>
                                        <span
                                            class="text-secondary d-block small mb-1"
                                            >Bidang Teknologi</span
                                        >
                                        <span
                                            :class="[
                                                'badge badge-tech-field mt-1',
                                                'badge-tech-' +
                                                    (
                                                        selectedProject.tech_field ||
                                                        'others'
                                                    )
                                                        .toLowerCase()
                                                        .replace(
                                                            /[^a-z]/g,
                                                            '-',
                                                        ),
                                            ]"
                                        >
                                            {{
                                                getTechFieldIcon(
                                                    selectedProject.tech_field,
                                                )
                                            }}
                                            {{
                                                selectedProject.tech_field ||
                                                "Others"
                                            }}
                                        </span>
                                    </div>
                                    <hr
                                        class="my-2 border-secondary border-opacity-10"
                                    />
                                    <div>
                                        <span
                                            class="text-secondary d-block small mb-1"
                                            >Prestasi</span
                                        >
                                        <span
                                            class="text-white fw-bold text-capitalize"
                                            >{{
                                                selectedProject.prestasi_level
                                            }}</span
                                        >
                                    </div>
                                    <hr
                                        class="my-2 border-secondary border-opacity-10"
                                    />
                                    <div>
                                        <span
                                            class="text-secondary d-block small mb-2"
                                            >Mitra</span
                                        >
                                        <div
                                            v-if="
                                                selectedProject.partners &&
                                                selectedProject.partners
                                                    .length > 0
                                            "
                                            class="d-flex flex-wrap gap-2"
                                        >
                                            <span
                                                v-for="(
                                                    partner, idx
                                                ) in selectedProject.partners"
                                                :key="idx"
                                                class="badge bg-dark bg-opacity-40 border border-secondary text-secondary py-1.5 px-3 rounded"
                                                style="font-size: 0.75rem"
                                            >
                                                🤝 {{ partner }}
                                            </span>
                                        </div>
                                        <span
                                            v-else
                                            class="text-muted text-italic small"
                                            >Tidak ada mitra spesifik</span
                                        >
                                    </div>
                                </div>
                            </div>

                            <!-- Features & Advantages List -->
                            <div class="glass-card p-4 mb-4">
                                <h4
                                    class="fw-bold text-white border-bottom border-secondary border-opacity-20 pb-3 mb-4"
                                >
                                    Fitur Unggulan
                                </h4>
                                <ul
                                    class="list-unstyled mb-0 d-flex flex-column gap-3"
                                >
                                    <li
                                        v-for="(
                                            feature, idx
                                        ) in selectedProject.features"
                                        :key="idx"
                                        class="d-flex align-items-start gap-2 text-secondary"
                                    >
                                        <span
                                            class="text-info mt-1"
                                            style="font-size: 1rem"
                                            >✦</span
                                        >
                                        <span
                                            style="
                                                font-size: 0.9rem;
                                                line-height: 1.5;
                                            "
                                            >{{ feature }}</span
                                        >
                                    </li>
                                </ul>
                            </div>

                            <!-- Awards and Funding -->
                            <div
                                class="glass-card p-4"
                                v-if="
                                    selectedProject.funding_awards &&
                                    selectedProject.funding_awards.length > 0
                                "
                            >
                                <h4
                                    class="fw-bold text-white border-bottom border-secondary border-opacity-20 pb-3 mb-4 d-flex align-items-center gap-2"
                                >
                                    <span style="color: #fbbf24">🏆</span>
                                    Pendanaan &amp; Prestasi
                                </h4>
                                <ul
                                    class="list-unstyled mb-0 d-flex flex-column gap-3"
                                >
                                    <li
                                        v-for="(
                                            award, idx
                                        ) in selectedProject.funding_awards"
                                        :key="idx"
                                        class="d-flex align-items-start gap-2 text-secondary"
                                    >
                                        <span
                                            class="text-warning mt-1"
                                            style="font-size: 1rem"
                                            >★</span
                                        >
                                        <span
                                            style="
                                                font-size: 0.9rem;
                                                line-height: 1.5;
                                            "
                                            >{{ award }}</span
                                        >
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Team Grid Section -->
                    <div class="mt-5 pt-4">
                        <h3
                            class="fw-extrabold text-white text-center mb-4 text-gradient-silver"
                        >
                            Tim Inovator
                        </h3>
                        <p
                            class="text-secondary text-center mx-auto mb-5"
                            style="max-width: 600px"
                        >
                            Mahasiswa di balik rancangan, implementasi, dan
                            pengujian sistem.
                        </p>

                        <div
                            class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 justify-content-center"
                        >
                            <div
                                class="col"
                                v-for="(
                                    member, idx
                                ) in selectedProject.team_members"
                                :key="idx"
                            >
                                <div
                                    class="team-member-card h-100 d-flex flex-column align-items-center text-center"
                                >
                                    <!-- Photo/Avatar Container -->
                                    <div class="team-avatar-container mb-3 position-relative">
                                        <div class="team-avatar-ring"></div>
                                        <img
                                            v-if="member.photo && hasRealPhoto(member.photo)"
                                            :src="member.photo"
                                            :alt="member.nickname"
                                            class="team-avatar-img"
                                        />
                                        <!-- Custom Initials Avatar -->
                                        <div
                                            v-else
                                            class="team-avatar d-flex justify-content-center align-items-center text-white fw-bold fs-4"
                                        >
                                            {{
                                                member.nickname
                                                    .substring(0, 2)
                                                    .toUpperCase()
                                            }}
                                        </div>
                                    </div>
                                    <h5
                                        class="text-white fw-bold mb-1 text-truncate w-100"
                                    >
                                        {{ member.nickname }}
                                    </h5>
                                    <p
                                        class="text-secondary mb-2 small text-truncate w-100"
                                    >
                                        {{ member.fullname }}
                                    </p>
                                    <span
                                        v-if="member.role"
                                        class="badge bg-dark border border-secondary text-secondary mb-4 w-100 text-truncate"
                                        style="
                                            font-size: 11px;
                                            padding: 6px 10px;
                                        "
                                    >
                                        {{ member.role }}
                                    </span>

                                    <!-- Social Media Links -->
                                    <div class="d-flex gap-3 mt-auto">
                                        <a
                                            v-if="member.linkedin"
                                            :href="member.linkedin"
                                            target="_blank"
                                            class="social-icon-btn"
                                            title="LinkedIn"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="16"
                                                height="16"
                                                fill="currentColor"
                                                class="bi bi-linkedin"
                                                viewBox="0 0 16 16"
                                            >
                                                <path
                                                    d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"
                                                />
                                            </svg>
                                        </a>
                                        <a
                                            v-if="
                                                member.social_media &&
                                                member.social_media.instagram
                                            "
                                            :href="
                                                member.social_media.instagram
                                            "
                                            target="_blank"
                                            class="social-icon-btn"
                                            title="Instagram"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="16"
                                                height="16"
                                                fill="currentColor"
                                                class="bi bi-instagram"
                                                viewBox="0 0 16 16"
                                            >
                                                <path
                                                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"
                                                />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </transition>

            <!-- Details View Modal Component -->
            <project-detail-modal
                :project="selectedProject"
            ></project-detail-modal>

            <!-- Mobile Emulator Frame Modal -->
            <div
                class="modal fade"
                id="mobileEmulatorModal"
                tabindex="-1"
                aria-labelledby="mobileEmulatorModalLabel"
                aria-hidden="true"
            >
                <div class="modal-dialog modal-dialog-centered">
                    <div
                        class="modal-content modal-content-glass"
                        v-if="activeMobileProject"
                        style="max-width: 400px; margin: 0 auto"
                    >
                        <div class="modal-header border-0 pb-0">
                            <button
                                type="button"
                                class="btn-close btn-close-white"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            ></button>
                        </div>
                        <div class="modal-body py-4 text-center">
                            <h4 class="text-white fw-bold mb-1">
                                {{ activeMobileProject.name }}
                            </h4>
                            <p class="text-secondary small mb-3">
                                {{ activeMobileProject.tagline }}
                            </p>

                            <div class="phone-emulator-container mb-4">
                                <div class="phone-emulator">
                                    <div class="phone-speaker"></div>
                                    <div class="phone-screen text-start">
                                        <div
                                            class="d-flex justify-content-between align-items-center border-bottom border-secondary pb-2 mb-3"
                                        >
                                            <span class="fw-bold text-light"
                                                >★
                                                {{
                                                    activeMobileProject.name
                                                }}</span
                                            >
                                            <small class="text-muted"
                                                >100% 🔋</small
                                            >
                                        </div>
                                        <div
                                            class="bg-dark bg-opacity-25 rounded p-2.5 mb-3 border border-secondary"
                                            style="
                                                border-color: rgba(
                                                    255,
                                                    255,
                                                    255,
                                                    0.08
                                                ) !important;
                                            "
                                        >
                                            <h6
                                                class="fw-bold text-white mb-1"
                                                style="font-size: 11px"
                                            >
                                                Fitur Aplikasi:
                                            </h6>
                                            <ul
                                                class="list-unstyled mb-0 text-secondary"
                                                style="
                                                    font-size: 10px;
                                                    line-height: 1.45;
                                                "
                                            >
                                                <li
                                                    v-for="(
                                                        feat, i
                                                    ) in activeMobileProject.features"
                                                    :key="i"
                                                    class="mb-1"
                                                >
                                                    • {{ feat }}
                                                </li>
                                            </ul>
                                        </div>

                                        <!-- Screenshots -->
                                        <div
                                            class="row g-2 mb-3"
                                            v-if="
                                                activeMobileProject.screenshots &&
                                                activeMobileProject.screenshots
                                                    .length > 0
                                            "
                                        >
                                            <div
                                                class="col-6"
                                                v-for="(
                                                    scr, idx
                                                ) in activeMobileProject.screenshots"
                                                :key="idx"
                                            >
                                                <img
                                                    :src="scr"
                                                    class="img-fluid rounded border border-secondary"
                                                    alt="Mock Screen"
                                                    style="
                                                        border-color: rgba(
                                                            255,
                                                            255,
                                                            255,
                                                            0.1
                                                        ) !important;
                                                    "
                                                />
                                            </div>
                                        </div>

                                        <div
                                            class="bg-secondary bg-opacity-10 border border-secondary rounded p-2.5 text-center"
                                            style="
                                                border-color: rgba(
                                                    255,
                                                    255,
                                                    255,
                                                    0.08
                                                ) !important;
                                            "
                                        >
                                            <span
                                                class="text-light fw-bold d-block mb-1"
                                                style="font-size: 11px"
                                                >Uji Fungsionalitas</span
                                            >
                                            <small
                                                class="text-muted"
                                                style="font-size: 9.5px"
                                                >Silakan datangi stand pameran
                                                untuk menguji model ini pada
                                                perangkat smartphone uji coba
                                                kami.</small
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="alert alert-secondary border border-secondary bg-dark bg-opacity-50 text-light text-start mb-0"
                                style="
                                    border-color: rgba(
                                        255,
                                        255,
                                        255,
                                        0.1
                                    ) !important;
                                "
                            >
                                <h6
                                    class="alert-heading fw-bold mb-1"
                                    style="
                                        font-size: 0.85rem;
                                        color: var(--accent-silver) !important;
                                    "
                                >
                                    👋 Silakan Coba Langsung di Stand!
                                </h6>
                                <p
                                    class="small mb-0"
                                    style="
                                        font-size: 0.78rem;
                                        line-height: 1.4;
                                        color: var(--text-secondary) !important;
                                    "
                                >
                                    Aplikasi mobile ini siap dicoba. Datang ke
                                    stand pembimbing
                                    <strong>{{
                                        activeMobileProject.supervisor
                                    }}</strong>
                                    untuk mendemonstrasikan sistem pada HP uji
                                    coba kami.
                                </p>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button
                                type="button"
                                class="btn btn-secondary w-100 py-2.5"
                                data-bs-dismiss="modal"
                                style="
                                    background: rgba(255, 255, 255, 0.08);
                                    border-color: rgba(255, 255, 255, 0.1);
                                    color: white;
                                    border-radius: 12px;
                                "
                            >
                                Tutup
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Video Player Modal -->
            <div
                class="modal fade"
                id="videoPlayerModal"
                tabindex="-1"
                aria-labelledby="videoPlayerModalLabel"
                aria-hidden="true"
            >
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div
                        class="modal-content modal-content-glass"
                        v-if="activeHardwareProject"
                    >
                        <div class="modal-header border-0 pb-0">
                            <h5
                                class="modal-title fw-bold text-white d-flex align-items-center gap-2"
                                id="videoPlayerModalLabel"
                            >
                                <span>🎬</span> Video Dokumentasi Alat
                            </h5>
                            <button
                                type="button"
                                class="btn-close btn-close-white"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            ></button>
                        </div>
                        <div class="modal-body py-4">
                            <h4 class="text-white fw-bold mb-1">
                                {{ activeHardwareProject.name }}
                            </h4>
                            <p class="text-secondary small mb-4">
                                {{ activeHardwareProject.tagline }}
                            </p>

                            <div
                                class="video-container mb-4"
                                v-if="activeHardwareProject.video_url"
                            >
                                <iframe
                                    :src="
                                        getEmbedUrl(
                                            activeHardwareProject.video_url,
                                        )
                                    "
                                    frameborder="0"
                                    allow="
                                        accelerometer;
                                        autoplay;
                                        clipboard-write;
                                        encrypted-media;
                                        gyroscope;
                                        picture-in-picture;
                                    "
                                    allowfullscreen
                                ></iframe>
                            </div>

                            <div
                                class="p-3 bg-dark bg-opacity-25 rounded border border-secondary mb-4"
                                style="
                                    border-color: rgba(
                                        255,
                                        255,
                                        255,
                                        0.08
                                    ) !important;
                                "
                            >
                                <h6
                                    class="fw-bold text-white mb-2"
                                    style="font-family: Outfit"
                                >
                                    Integrasi &amp; Komponen Hardware:
                                </h6>
                                <ul
                                    class="list-unstyled mb-0 text-secondary small"
                                    style="line-height: 1.6"
                                >
                                    <li
                                        v-for="(
                                            feat, i
                                        ) in activeHardwareProject.features"
                                        :key="i"
                                        class="mb-1"
                                    >
                                        ⚡ {{ feat }}
                                    </li>
                                </ul>
                            </div>

                            <div
                                class="alert alert-secondary border border-secondary bg-dark bg-opacity-50 text-light mb-0"
                                style="
                                    border-color: rgba(
                                        255,
                                        255,
                                        255,
                                        0.1
                                    ) !important;
                                "
                            >
                                <p
                                    class="small mb-0"
                                    style="
                                        line-height: 1.4;
                                        font-size: 0.8rem;
                                        color: var(--text-secondary) !important;
                                    "
                                >
                                    Alat fisik ini telah dipasang dan
                                    dikonfigurasi di stand pembimbing
                                    <strong>{{
                                        activeHardwareProject.supervisor
                                    }}</strong
                                    >. Silakan kunjungi stand kami untuk mencoba
                                    mengoperasikan prototipe secara langsung.
                                </p>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button
                                type="button"
                                class="btn btn-secondary py-2.5 px-4"
                                data-bs-dismiss="modal"
                                style="
                                    background: rgba(255, 255, 255, 0.08);
                                    border-color: rgba(255, 255, 255, 0.1);
                                    color: white;
                                    border-radius: 12px;
                                "
                            >
                                Tutup
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Lightbox Overlay -->
    <Transition name="lightbox">
        <div
            v-if="isLightboxOpen"
            class="lightbox-overlay"
            @click.self="closeLightbox"
            @keydown.esc="closeLightbox"
            tabindex="0"
            ref="lightboxOverlay"
        >
            <button class="lightbox-close" @click="closeLightbox" aria-label="Tutup">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                </svg>
            </button>
            <img
                :src="lightboxImage"
                class="lightbox-img"
                alt="Preview"
                @click.stop
            />
        </div>
    </Transition>
</template>

<script>
import ProjectDetailModal from "./ProjectDetailModal.vue";

export default {
    name: "ExhibitionPlatform",
    components: {
        ProjectDetailModal,
    },
    props: {
        initialProjects: {
            type: Array,
            required: true,
        },
    },
    data() {
        return {
            projects: this.initialProjects,
            searchQuery: "",
            selectedType: "all",
            selectedTechField: "all",
            selectedSupervisor: "all",
            selectedProject: null,
            activeMobileProject: null,
            activeHardwareProject: null,
            detailModalInstance: null,
            mobileModalInstance: null,
            videoModalInstance: null,
            currentView: "grid",
            isTransitioning: false,
            isLightboxOpen: false,
            lightboxImage: null,
        };
    },
    mounted() {
        if (window.history.state && window.history.state.view === "detail") {
            const projectId = window.history.state.projectId;
            const project = this.projects.find((p) => p.id === projectId);
            if (project) {
                this.selectedProject = project;
                this.currentView = "detail";
            } else {
                window.history.replaceState({ view: "grid" }, "");
            }
        } else if (window.history.state === null) {
            window.history.replaceState({ view: "grid" }, "");
        }
        window.addEventListener("popstate", this.handlePopState);
    },
    beforeUnmount() {
        window.removeEventListener("popstate", this.handlePopState);
    },
    computed: {
        filteredProjects() {
            return this.projects.filter((project) => {
                const matchesSearch =
                    project.name
                        .toLowerCase()
                        .includes(this.searchQuery.toLowerCase()) ||
                    project.tagline
                        .toLowerCase()
                        .includes(this.searchQuery.toLowerCase()) ||
                    project.description
                        .toLowerCase()
                        .includes(this.searchQuery.toLowerCase()) ||
                    project.supervisor
                        .toLowerCase()
                        .includes(this.searchQuery.toLowerCase()) ||
                    (project.partners &&
                        project.partners.some((p) =>
                            p
                                .toLowerCase()
                                .includes(this.searchQuery.toLowerCase()),
                        )) ||
                    (project.features &&
                        project.features.some((f) =>
                            f
                                .toLowerCase()
                                .includes(this.searchQuery.toLowerCase()),
                        ));

                const matchesType =
                    this.selectedType === "all" ||
                    project.type === this.selectedType;
                const matchesSupervisor =
                    this.selectedSupervisor === "all" ||
                    project.supervisor === this.selectedSupervisor;
                const matchesTechField =
                    this.selectedTechField === "all" ||
                    project.tech_field === this.selectedTechField;

                return (
                    matchesSearch &&
                    matchesType &&
                    matchesSupervisor &&
                    matchesTechField
                );
            });
        },
        totalNasional() {
            return this.projects.filter((p) => p.prestasi_level === "nasional")
                .length;
        },
        totalInternasional() {
            return this.projects.filter(
                (p) => p.prestasi_level === "internasional",
            ).length;
        },
        totalMitra() {
            return this.projects.reduce(
                (sum, p) => sum + (p.partners ? p.partners.length : 0),
                0,
            );
        },
    },
    methods: {
        openLightbox(imageSrc) {
            this.lightboxImage = imageSrc;
            this.isLightboxOpen = true;
            this.$nextTick(() => {
                if (this.$refs.lightboxOverlay) {
                    this.$refs.lightboxOverlay.focus();
                }
            });
            document.body.style.overflow = 'hidden';
        },
        closeLightbox() {
            this.isLightboxOpen = false;
            this.lightboxImage = null;
            document.body.style.overflow = '';
        },
        getTypeBadgeClass(type) {
            if (type === "web") return "badge-web";
            if (type === "mobile") return "badge-mobile";
            if (type === "hardware") return "badge-hardware";
            return "bg-secondary";
        },
        formatType(type) {
            if (type === "web") return "Web-Based";
            if (type === "mobile") return "Mobile-Based";
            if (type === "hardware") return "Hardware-Based";
            return type;
        },
        handleShowcase(project) {
            this.viewProjectDetail(project);
        },
        viewProjectDetail(project) {
            this.isTransitioning = true;
            setTimeout(() => {
                this.selectedProject = project;
                this.currentView = "detail";
                window.history.pushState(
                    { view: "detail", projectId: project.id },
                    "",
                );
                this.$nextTick(() => {
                    window.scrollTo({ top: 0, behavior: "instant" });
                    setTimeout(() => {
                        this.isTransitioning = false;
                    }, 350);
                });
            }, 300);
        },
        backToGrid() {
            if (
                window.history.state &&
                window.history.state.view === "detail"
            ) {
                window.history.back();
            } else {
                this.isTransitioning = true;
                setTimeout(() => {
                    this.currentView = "grid";
                    this.selectedProject = null;
                    this.$nextTick(() => {
                        window.scrollTo({ top: 0, behavior: "instant" });
                        setTimeout(() => {
                            this.isTransitioning = false;
                        }, 350);
                    });
                }, 300);
            }
        },
        handlePopState(event) {
            this.isTransitioning = true;
            setTimeout(() => {
                if (event.state && event.state.view === "detail") {
                    const projectId = event.state.projectId;
                    const project = this.projects.find(
                        (p) => p.id === projectId,
                    );
                    if (project) {
                        this.selectedProject = project;
                        this.currentView = "detail";
                    } else {
                        this.currentView = "grid";
                        this.selectedProject = null;
                    }
                } else {
                    this.currentView = "grid";
                    this.selectedProject = null;
                }
                this.$nextTick(() => {
                    window.scrollTo({ top: 0, behavior: "instant" });
                    setTimeout(() => {
                        this.isTransitioning = false;
                    }, 350);
                });
            }, 300);
        },
        getSupervisorFullName(code) {
            const supervisors = {
                MDB: "Muhammad Adib Kamali, S.T., M.Eng",
                FZK: "Dr. Farah Zakiyah Rahmanti, S.ST., M.T",
                MUN: "Mastuty Ayu Ningtyas, S.Kom., M.MT.",
                YOH: "Yohanes Setiawan. S.Si., M.Kom.",
                CAP: "Dr. Helmy Widyantara, S.Kom., M.Eng.",
            };
            return supervisors[code] || code;
        },
        getEmbedUrl(url) {
            if (!url) return "";

            // Regexp to extract video ID from YouTube share, watch, or embed URLs
            const regExp =
                /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
            const match = url.match(regExp);

            if (match && match[2].length === 11) {
                const videoId = match[2];
                return `https://www.youtube.com/embed/${videoId}`;
            }

            return url;
        },
        scrollCarousel(direction, refName) {
            const container = this.$refs[refName];
            if (container) {
                const scrollAmount = direction === "left" ? -320 : 320;
                container.scrollBy({ left: scrollAmount, behavior: "smooth" });
            }
        },
        hasRealLogo(logo) {
            if (!logo) return false;
            return logo.startsWith("/") || logo.includes("/");
        },
        showDetail(project) {
            this.selectedProject = project;
            this.$nextTick(() => {
                if (!this.detailModalInstance) {
                    this.detailModalInstance = new bootstrap.Modal(
                        document.getElementById("projectDetailModal"),
                    );
                }
                this.detailModalInstance.show();
            });
        },
        openMobileEmulator(project) {
            this.activeMobileProject = project;
            this.$nextTick(() => {
                if (!this.mobileModalInstance) {
                    this.mobileModalInstance = new bootstrap.Modal(
                        document.getElementById("mobileEmulatorModal"),
                    );
                }
                this.mobileModalInstance.show();
            });
        },
        openVideoPlayer(project) {
            this.activeHardwareProject = project;
            this.$nextTick(() => {
                if (!this.videoModalInstance) {
                    this.videoModalInstance = new bootstrap.Modal(
                        document.getElementById("videoPlayerModal"),
                    );
                }
                this.videoModalInstance.show();
            });
        },
        resetFilters() {
            this.searchQuery = "";
            this.selectedType = "all";
            this.selectedTechField = "all";
            this.selectedSupervisor = "all";
        },
        getTechFieldIcon(field) {
            const icons = {
                AI: "🤖",
                IoT: "📡",
                "VR/AR": "🥽",
                "Networking & Cyber Security": "🔐",
                Others: "🔬",
            };
            return icons[field] || "🔬";
        },
        hasRealPhoto(photo) {
            if (!photo) return false;
            return photo.startsWith("/") || photo.includes("/") || photo.includes("\\");
        },
    },
};
</script>

<style scoped>
.project-card-tagline {
    font-size: 1.05rem;
    line-height: 1.5;
    color: rgba(248, 250, 252, 0.92) !important;
    min-height: 3.15rem;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
