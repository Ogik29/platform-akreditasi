<template>
    <div class="platform-wrapper position-relative">
        <!-- Glowing background lights wrapper to prevent viewport overflow -->
        <div class="glow-container">
            <div class="glow-bg glow-top-left"></div>
            <div class="glow-bg glow-bottom-right"></div>
            <div class="glow-bg glow-center"></div>
        </div>

        <!-- Ambient Cybernetic Floating Particle Canvas -->
        <canvas
            id="ambientParticleCanvas"
            class="ambient-particle-canvas"
        ></canvas>

        <!-- Custom transition loader matching initial loading screen -->
        <transition name="loader-fade">
            <div class="vue-transition-loader" v-if="isTransitioning">
                <div class="text-center">
                    <div class="spinner-glow mb-3 mx-auto"></div>
                    <p
                        class="text-white fw-bold mb-0"
                        style="letter-spacing: 1px"
                    >
                        {{ transitionText }}
                    </p>
                </div>
            </div>
        </transition>

        <div class="container py-5">
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
                            <span class="text-gradient-silver">Teknologi</span>
                            &amp;
                            <span class="text-gradient-titanium">Inovasi</span>
                        </h1>
                        <p
                            class="lead text-secondary mx-auto mb-4 fade-in-up anim-delay-300"
                            style="max-width: 720px"
                        >
                            Selamat datang di Platform Showcase Tugas Akhir dan
                            Proyek Inovatif Mahasiswa Teknologi Informasi Telkom
                            University Surabaya. Kami menampilkan hasil karya
                            terbaik mahasiswa dari 3 platform berbeda dengan
                            raihan prestasi nasional dan internasional.
                        </p>

                        <!-- Animated Stats Counters Banner -->
                        <div
                            class="row justify-content-center g-2 g-sm-3 mt-4"
                            style="max-width: 980px; margin: 0 auto"
                        >
                            <div
                                class="col-6 col-sm-4 col-lg fade-in-up anim-delay-400"
                            >
                                <div
                                    class="glass-card stats-card-glow p-2 p-sm-3 text-center"
                                >
                                    <div class="fs-4 mb-1">🚀</div>
                                    <h3
                                        class="fw-bold text-info mb-1 stats-number"
                                    >
                                        {{
                                            animatedStats.projects ||
                                            projects.length
                                        }}
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
                                    class="glass-card stats-card-glow p-2 p-sm-3 text-center"
                                >
                                    <div class="fs-4 mb-1">🏆</div>
                                    <h3
                                        class="fw-bold mb-1 stats-number"
                                        style="color: #60a5fa"
                                    >
                                        {{
                                            animatedStats.nasional ||
                                            totalNasional
                                        }}
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
                                    class="glass-card stats-card-glow p-2 p-sm-3 text-center"
                                >
                                    <div class="fs-4 mb-1">🌐</div>
                                    <h3
                                        class="fw-bold mb-1 stats-number"
                                        style="color: #a78bfa"
                                    >
                                        {{
                                            animatedStats.internasional ||
                                            totalInternasional
                                        }}
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
                                    class="glass-card stats-card-glow p-2 p-sm-3 text-center"
                                >
                                    <div class="fs-4 mb-1">🤝</div>
                                    <h3
                                        class="fw-bold text-warning mb-1 stats-number"
                                    >
                                        {{ animatedStats.mitra || totalMitra }}
                                    </h3>
                                    <small
                                        class="text-secondary d-block stats-label"
                                        >Mitra Strategis</small
                                    >
                                </div>
                            </div>
                            <div
                                class="col-6 col-sm-4 col-lg fade-in-up anim-delay-500"
                            >
                                <div
                                    class="glass-card stats-card-glow p-2 p-sm-3 text-center"
                                >
                                    <div class="fs-4 mb-1">👨‍🏫</div>
                                    <h3
                                        class="fw-bold text-secondary mb-1 stats-number"
                                        style="color: #cbd5e1 !important"
                                    >
                                        {{ animatedStats.dosen || 5 }}
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
                                        MDB (Muhammad Adib Kamali, S.T., M.Eng)
                                    </option>
                                    <option value="FZK">
                                        FZK (Dr. Farah Zakiyah Rahmanti, S.ST.,
                                        M.T)
                                    </option>
                                    <option value="MUN">
                                        MUN (Mastuty Ayu Ningtyas, S.Kom.,
                                        M.MT.)
                                    </option>
                                    <option value="YOH">
                                        YOH (Yohanes Setiawan. S.Si., M.Kom.)
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
                                        selectedType === 'all' ? 'active' : '',
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
                                        selectedType === 'web' ? 'active' : '',
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
                        Tidak ditemukan proyek yang cocok dengan kriteria filter
                        Anda
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
                                v-if="project.logo && hasRealLogo(project.logo)"
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
                                                    hasRealLogo(project.logo)
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
                                                {{ project.supervisor }}</span
                                            >
                                        </div>
                                    </div>

                                    <!-- Partner Logo Placeholder / Image (Pojok Kanan Atas Card) -->
                                    <div
                                        class="partner-logo-container flex-shrink-0 ms-2 d-flex align-items-center gap-2"
                                        v-if="
                                            hasPartnerLogo(project) ||
                                            (project.partners &&
                                                project.partners.length > 0)
                                        "
                                    >
                                        <template
                                            v-if="hasPartnerLogo(project)"
                                        >
                                            <div
                                                v-for="(
                                                    pLogo, pIdx
                                                ) in getPartnerLogos(project)"
                                                :key="pIdx"
                                                class="partner-logo-frame bg-dark bg-opacity-60 border border-secondary border-opacity-30 rounded-3 p-1 d-flex align-items-center justify-content-center overflow-hidden"
                                                style="
                                                    width: 44px;
                                                    height: 44px;
                                                "
                                                :title="
                                                    'Mitra: ' +
                                                    getPartnerName(
                                                        project,
                                                        pIdx,
                                                    )
                                                "
                                            >
                                                <img
                                                    :src="pLogo"
                                                    alt="Logo Mitra"
                                                    style="
                                                        width: 100%;
                                                        height: 100%;
                                                        object-fit: contain;
                                                    "
                                                />
                                            </div>
                                        </template>
                                        <template v-else>
                                            <div
                                                class="partner-logo-frame partner-placeholder-frame bg-dark bg-opacity-40 border border-warning border-opacity-30 rounded-3 p-1 d-flex flex-column align-items-center justify-content-center text-center"
                                                style="
                                                    width: 44px;
                                                    height: 44px;
                                                "
                                                :title="
                                                    'Mitra: ' +
                                                    project.partners.join(', ')
                                                "
                                            >
                                                <span
                                                    style="
                                                        font-size: 0.85rem;
                                                        line-height: 1;
                                                    "
                                                    >🤝</span
                                                >
                                                <span
                                                    class="text-warning fw-extrabold"
                                                    style="
                                                        font-size: 0.55rem;
                                                        letter-spacing: 0.5px;
                                                    "
                                                    >MITRA</span
                                                >
                                            </div>
                                        </template>
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
                                                (project.tech_field || 'others')
                                                    .toLowerCase()
                                                    .replace(/[^a-z]/g, '-'),
                                        ]"
                                    >
                                        {{
                                            getTechFieldIcon(project.tech_field)
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
                                            >{{ project.prestasi_level }}</span
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
                                    class="lead text-light mb-0"
                                    style="
                                        font-size: 1.05rem;
                                        line-height: 1.6;
                                        color: #e2e8f0 !important;
                                    "
                                >
                                    {{ selectedProject.tagline }}
                                </p>
                            </div>
                        </div>
                        <div
                            class="col-md-4 d-flex flex-column align-items-center align-items-md-end justify-content-center gap-3"
                        >
                            <div
                                class="d-flex flex-wrap justify-content-center justify-content-md-end gap-2"
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

                            <!-- Partner Logo Frame in Hero Banner -->
                            <div
                                v-if="
                                    hasPartnerLogo(selectedProject) ||
                                    (selectedProject.partners &&
                                        selectedProject.partners.length > 0)
                                "
                                class="d-flex align-items-center gap-2 bg-dark bg-opacity-50 border border-secondary border-opacity-30 rounded-3 py-2 px-3"
                            >
                                <span
                                    class="text-white small fw-bold"
                                    style="color: #cbd5e1 !important"
                                    >Mitra:</span
                                >
                                <template
                                    v-if="hasPartnerLogo(selectedProject)"
                                >
                                    <div
                                        v-for="(pLogo, pIdx) in getPartnerLogos(
                                            selectedProject,
                                        )"
                                        :key="pIdx"
                                        class="partner-logo-frame bg-dark bg-opacity-60 border border-warning border-opacity-30 rounded-2 p-1 d-flex align-items-center justify-content-center overflow-hidden my-1"
                                        style="width: 36px; height: 36px"
                                        :title="
                                            getPartnerName(
                                                selectedProject,
                                                pIdx,
                                            )
                                        "
                                    >
                                        <img
                                            :src="pLogo"
                                            alt="Logo Mitra"
                                            style="
                                                width: 100%;
                                                height: 100%;
                                                object-fit: contain;
                                            "
                                        />
                                    </div>
                                </template>
                                <template v-else>
                                    <div
                                        class="partner-logo-frame partner-placeholder-frame bg-dark bg-opacity-40 border border-warning border-opacity-30 rounded-2 py-1 px-2 d-flex align-items-center justify-content-center gap-1"
                                        style="height: 36px"
                                    >
                                        <span>🤝</span>
                                        <span class="text-warning fw-bold small"
                                            >Mitra</span
                                        >
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Glassmorphic Tabbed Navigation Bar -->
                <div
                    class="glass-card p-2 mb-4 d-flex flex-wrap align-items-center justify-content-center justify-content-md-start gap-2 detail-tab-bar sticky-top-tab"
                >
                    <button
                        type="button"
                        @click="activeDetailTab = 'overview'"
                        :class="[
                            'btn btn-detail-tab',
                            activeDetailTab === 'overview' ? 'active' : '',
                        ]"
                    >
                        <span class="tab-icon">📌</span>
                        <span>Overview &amp; Pratinjau</span>
                    </button>

                    <button
                        type="button"
                        @click="activeDetailTab = 'gallery'"
                        :class="[
                            'btn btn-detail-tab',
                            activeDetailTab === 'gallery' ? 'active' : '',
                        ]"
                    >
                        <span class="tab-icon">📸</span>
                        <span>Dokumentasi</span>
                        <span
                            v-if="getMediaCount(selectedProject) > 0"
                            class="badge bg-info text-dark ms-1 rounded-pill"
                            style="font-size: 0.68rem"
                        >
                            {{ getMediaCount(selectedProject) }}
                        </span>
                    </button>

                    <button
                        type="button"
                        @click="activeDetailTab = 'prestasi'"
                        :class="[
                            'btn btn-detail-tab',
                            activeDetailTab === 'prestasi' ? 'active' : '',
                        ]"
                    >
                        <span class="tab-icon">🏆</span>
                        <span>Raihan Prestasi</span>
                        <span
                            v-if="
                                selectedProject.funding_awards &&
                                selectedProject.funding_awards.length > 0
                            "
                            class="badge bg-warning text-dark ms-1 rounded-pill"
                            style="font-size: 0.68rem"
                        >
                            {{ selectedProject.funding_awards.length }}
                        </span>
                    </button>

                    <button
                        type="button"
                        @click="activeDetailTab = 'team'"
                        :class="[
                            'btn btn-detail-tab',
                            activeDetailTab === 'team' ? 'active' : '',
                        ]"
                    >
                        <span class="tab-icon">👥</span>
                        <span>Tim &amp; Pembimbing</span>
                        <span
                            v-if="
                                selectedProject.team_members &&
                                selectedProject.team_members.length > 0
                            "
                            class="badge bg-secondary text-white ms-1 rounded-pill"
                            style="font-size: 0.68rem"
                        >
                            {{ selectedProject.team_members.length }}
                        </span>
                    </button>
                </div>

                <!-- Tab 1: Overview & Sandbox -->
                <div v-if="activeDetailTab === 'overview'" class="fade-in-fast">
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
                                    <span>🌐 Platform Web Live</span>
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
                                        class="text-light small mx-auto mb-4"
                                        style="
                                            max-width: 480px;
                                            color: #cbd5e1 !important;
                                        "
                                    >
                                        Proyek ini merupakan aplikasi berbasis
                                        web yang dihosting secara live. Klik
                                        tombol di bawah ini untuk membuka dan
                                        mencoba platform secara langsung pada
                                        tab baru.
                                    </p>
                                    <div
                                        v-if="getExternalUrls(selectedProject).length > 0"
                                        class="d-flex flex-wrap justify-content-center align-items-center gap-3"
                                    >
                                        <a
                                            v-for="(urlItem, uIdx) in getExternalUrls(selectedProject)"
                                            :key="uIdx"
                                            :href="formatUrl(urlItem)"
                                            target="_blank"
                                            class="btn btn-silver btn-web-launch py-2.5 px-4 d-inline-flex align-items-center gap-2"
                                            style="
                                                font-size: 0.95rem;
                                                font-weight: 600;
                                            "
                                        >
                                            <span>{{ getUrlLabel(urlItem, uIdx, getExternalUrls(selectedProject).length) }}</span>
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
                                    </div>
                                    <span
                                        v-else
                                        class="text-muted text-italic small d-block"
                                        style="color: #cbd5e1 !important"
                                        >URL Website tidak tersedia</span
                                    >
                                </div>
                            </div>

                            <!-- Mobile Screenshots Slider (Mobile-based) -->
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
                                            ) in selectedProject.screenshots.slice(
                                                0,
                                                4,
                                            )"
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
                                <div
                                    v-if="
                                        selectedProject.screenshots &&
                                        selectedProject.screenshots.length > 4
                                    "
                                    class="text-center mt-3"
                                >
                                    <button
                                        type="button"
                                        @click="activeDetailTab = 'gallery'"
                                        class="btn btn-sm btn-outline-info rounded-pill px-3 py-1.5"
                                        style="
                                            font-size: 0.82rem;
                                            border-color: rgba(
                                                56,
                                                189,
                                                248,
                                                0.4
                                            );
                                        "
                                    >
                                        <span
                                            >Lihat
                                            {{
                                                selectedProject.screenshots
                                                    .length - 4
                                            }}
                                            screenshot lainnya di tab
                                            Dokumentasi ➔</span
                                        >
                                    </button>
                                </div>
                                <div
                                    v-else-if="
                                        selectedProject.screenshots &&
                                        selectedProject.screenshots.length <= 4
                                    "
                                ></div>
                                <div v-else class="text-center py-5">
                                    <span class="fs-1 d-block mb-2">📱</span>
                                    <p class="text-secondary small mb-0">
                                        Screenshot Tidak Tersedia
                                    </p>
                                </div>
                            </div>

                            <!-- Video / Demonstration -->
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
                            <!--  
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
                            </div> -->

                            <!-- Description Card -->
                            <div class="glass-card p-4 p-md-5 mb-4">
                                <h4
                                    class="fw-bold text-white border-bottom border-secondary border-opacity-20 pb-3 mb-4"
                                >
                                    Deskripsi Proyek
                                </h4>
                                <p
                                    class="text-light leading-relaxed mb-0"
                                    style="
                                        font-size: 1.02rem;
                                        line-height: 1.8;
                                        color: #f1f5f9 !important;
                                    "
                                >
                                    {{ selectedProject.description }}
                                </p>
                            </div>
                        </div>

                        <!-- Right: Specifications Sidebar -->
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
                                            class="text-white d-block small mb-1 fw-bold"
                                            style="color: #cbd5e1 !important"
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
                                            class="text-white d-block small mb-1 fw-bold"
                                            style="color: #cbd5e1 !important"
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
                                            class="text-white d-block small mb-1 fw-bold"
                                            style="color: #cbd5e1 !important"
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
                                            class="text-white d-block small mb-2 fw-bold"
                                            style="color: #cbd5e1 !important"
                                            >Mitra Strategis</span
                                        >
                                        <div
                                            v-if="
                                                selectedProject.partners &&
                                                selectedProject.partners
                                                    .length > 0
                                            "
                                            class="d-flex flex-column gap-3 mt-2"
                                        >
                                            <div
                                                v-for="(
                                                    partner, idx
                                                ) in selectedProject.partners"
                                                :key="idx"
                                                class="d-flex align-items-center gap-3 bg-dark bg-opacity-40 border border-secondary border-opacity-30 p-3 px-3.5 rounded-3"
                                            >
                                                <div
                                                    class="partner-logo-frame bg-dark bg-opacity-60 border border-secondary border-opacity-30 rounded-2 p-1.5 flex-shrink-0 d-flex align-items-center justify-content-center overflow-hidden me-2"
                                                    style="
                                                        width: 40px;
                                                        height: 40px;
                                                    "
                                                >
                                                    <img
                                                        v-if="
                                                            getPartnerLogos(
                                                                selectedProject,
                                                            )[idx]
                                                        "
                                                        :src="
                                                            getPartnerLogos(
                                                                selectedProject,
                                                            )[idx]
                                                        "
                                                        alt="Logo Mitra"
                                                        style="
                                                            width: 100%;
                                                            height: 100%;
                                                            object-fit: contain;
                                                        "
                                                    />
                                                    <img
                                                        v-else-if="
                                                            getPartnerLogos(
                                                                selectedProject,
                                                            )[0]
                                                        "
                                                        :src="
                                                            getPartnerLogos(
                                                                selectedProject,
                                                            )[0]
                                                        "
                                                        alt="Logo Mitra"
                                                        style="
                                                            width: 100%;
                                                            height: 100%;
                                                            object-fit: contain;
                                                        "
                                                    />
                                                    <span
                                                        v-else
                                                        style="font-size: 1rem"
                                                        >🤝</span
                                                    >
                                                </div>
                                                <span
                                                    class="text-white small fw-semibold flex-grow-1 ms-1"
                                                    style="
                                                        line-height: 1.45;
                                                        font-size: 0.88rem;
                                                    "
                                                >
                                                    {{ partner }}</span
                                                >
                                            </div>
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
                                        class="d-flex align-items-start gap-2 text-white"
                                        style="color: #f1f5f9 !important"
                                    >
                                        <span
                                            class="text-info mt-1"
                                            style="font-size: 1rem"
                                            >✦</span
                                        >
                                        <span
                                            style="
                                                font-size: 0.93rem;
                                                line-height: 1.55;
                                                color: #e2e8f0 !important;
                                            "
                                            >{{ feature }}</span
                                        >
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab 2: Gallery & Documentation -->
                <div
                    v-else-if="activeDetailTab === 'gallery'"
                    class="fade-in-fast"
                >
                    <div class="glass-card p-4 p-md-5 mb-4">
                        <h4
                            class="fw-bold text-white mb-4 d-flex align-items-center gap-2"
                        >
                            <span>📸 Galeri Dokumentasi</span>
                        </h4>

                        <!-- Documentation Photos Grid -->
                        <div
                            v-if="
                                selectedProject.documentations &&
                                selectedProject.documentations.length > 0
                            "
                            class="mb-5"
                        >
                            <h6
                                class="text-secondary small fw-bold uppercase-tracking mb-3"
                            >
                                Foto Dokumentasi Kegiatan / Alat
                            </h6>
                            <div
                                class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3"
                            >
                                <div
                                    v-for="(
                                        doc, dIdx
                                    ) in selectedProject.documentations"
                                    :key="dIdx"
                                    class="col"
                                >
                                    <div
                                        class="screenshot-wrapper p-2 bg-dark bg-opacity-40 rounded-3 border border-secondary border-opacity-30 h-100 d-flex align-items-center justify-content-center"
                                    >
                                        <img
                                            :src="doc"
                                            alt="Dokumentasi"
                                            class="img-fluid rounded screenshot-static-img lightbox-trigger"
                                            style="
                                                max-height: 240px;
                                                width: 100%;
                                                object-fit: cover;
                                            "
                                            @click="openLightbox(doc)"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Screenshots Grid -->
                        <div
                            v-if="
                                selectedProject.screenshots &&
                                selectedProject.screenshots.length > 0
                            "
                        >
                            <h6
                                class="text-secondary small fw-bold uppercase-tracking mb-3"
                            >
                                Antarmuka Aplikasi
                            </h6>
                            <div
                                class="row row-cols-2 row-cols-sm-3 row-cols-md-4 g-3"
                            >
                                <div
                                    v-for="(
                                        scr, sIdx
                                    ) in selectedProject.screenshots"
                                    :key="sIdx"
                                    class="col"
                                >
                                    <div
                                        class="screenshot-wrapper p-2 bg-dark bg-opacity-40 rounded-3 border border-secondary border-opacity-30 h-100 d-flex align-items-center justify-content-center text-center"
                                    >
                                        <img
                                            :src="scr"
                                            alt="UI Screenshot"
                                            class="img-fluid rounded screenshot-static-img lightbox-trigger"
                                            style="
                                                max-height: 320px;
                                                object-fit: contain;
                                            "
                                            @click="openLightbox(scr)"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            v-if="getMediaCount(selectedProject) === 0"
                            class="text-center py-5"
                        >
                            <span class="fs-1 d-block mb-3">🖼️</span>
                            <h5 class="text-white fw-bold mb-2">N/A</h5>
                        </div>
                    </div>
                </div>

                <!-- Tab 3: Prestasi & Funding -->
                <div
                    v-else-if="activeDetailTab === 'prestasi'"
                    class="fade-in-fast"
                >
                    <div class="glass-card p-4 p-md-5 mb-4">
                        <h4
                            class="fw-bold text-white mb-4 d-flex align-items-center gap-2 border-bottom border-secondary border-opacity-20 pb-3"
                        >
                            <span style="color: #fbbf24">🏆</span>
                            <span>Prestasi &amp; Raihan Proyek</span>
                        </h4>

                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <div
                                    class="p-4 bg-dark bg-opacity-40 border border-secondary border-opacity-30 rounded-3 h-100"
                                >
                                    <span
                                        class="text-white small d-block mb-1 fw-bold"
                                        style="color: #cbd5e1 !important"
                                        >Tingkat Prestasi</span
                                    >
                                    <h3
                                        class="text-white fw-bold text-capitalize mb-2"
                                    >
                                        {{ selectedProject.prestasi_level }}
                                    </h3>
                                    <p
                                        class="text-light small mb-0"
                                        style="color: #e2e8f0 !important"
                                    >
                                        Karya proyek telah divalidasi dan diakui
                                        di tingkat
                                        {{ selectedProject.prestasi_level }}
                                        dalam pameran riset dan kompetisi
                                        inovasi.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div
                                    class="p-4 bg-dark bg-opacity-40 border border-warning border-opacity-30 rounded-3 h-100"
                                >
                                    <span
                                        class="text-warning small d-block mb-1 fw-bold"
                                        style="color: #fbbf24 !important"
                                        >Status Pendanaan / Penghargaan</span
                                    >
                                    <h3
                                        class="text-warning fw-bold mb-2"
                                        style="color: #fef08a !important"
                                    >
                                        {{
                                            selectedProject.funding_awards &&
                                            selectedProject.funding_awards
                                                .length
                                                ? selectedProject.funding_awards
                                                      .length +
                                                  " Awards / Grants"
                                                : "Penelitian Terdaftar"
                                        }}
                                    </h3>
                                    <p
                                        class="text-light small mb-0"
                                        style="color: #e2e8f0 !important"
                                    >
                                        Rincian raihan kompetisi oleh tim
                                        proyek.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Awards List -->
                        <div
                            v-if="
                                selectedProject.funding_awards &&
                                selectedProject.funding_awards.length > 0
                            "
                        >
                            <h6 class="text-white fw-bold mb-3">
                                Daftar Penghargaan &amp; Skema Pendanaan:
                            </h6>
                            <div class="d-flex flex-column gap-3">
                                <div
                                    v-for="(
                                        award, aIdx
                                    ) in selectedProject.funding_awards"
                                    :key="aIdx"
                                    class="d-flex align-items-start gap-3 p-3 bg-dark bg-opacity-50 border border-secondary border-opacity-30 rounded-3"
                                >
                                    <span class="fs-4 text-warning">🥇</span>
                                    <div>
                                        <h6 class="text-white fw-bold mb-1">
                                            {{ award }}
                                        </h6>
                                        <span class="text-secondary small"
                                            >Terverifikasi oleh Tim Penilai
                                            Akreditasi &amp; Pameran</span
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-else class="text-center py-5">
                            <span class="fs-1 d-block mb-2">📜</span>
                            <h5 class="text-white fw-bold mb-2">N/A</h5>
                            <p class="text-secondary small mb-0">
                                Proyek ini dikembangkan secara mandiri di bawah
                                bimbingan Dosen Pembimbing.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Tab 4: Team & Supervisor -->
                <div
                    v-else-if="activeDetailTab === 'team'"
                    class="fade-in-fast"
                >
                    <!-- Supervisor & Partner Spotlight -->
                    <div class="glass-card p-4 p-md-5 mb-5">
                        <div class="row g-4 align-items-center">
                            <div
                                class="col-md-6 border-end border-secondary border-opacity-20 pe-md-4"
                            >
                                <span
                                    class="text-white small uppercase-tracking fw-bold d-block mb-2"
                                    style="
                                        color: #cbd5e1 !important;
                                        letter-spacing: 0.05em;
                                    "
                                    >DOSEN PEMBIMBING PROYEK</span
                                >
                                <h4 class="text-white fw-bold mb-2">
                                    {{
                                        getSupervisorFullName(
                                            selectedProject.supervisor,
                                        )
                                    }}
                                </h4>
                                <span
                                    class="d-inline-flex align-items-center gap-1.5 px-3 py-1.5 rounded-pill"
                                    style="
                                        background: rgba(14, 165, 233, 0.18);
                                        border: 1px solid
                                            rgba(56, 189, 248, 0.4);
                                        font-size: 0.82rem;
                                    "
                                >
                                    <span
                                        style="color: #38bdf8; font-weight: 600"
                                        >Kode Dosen:</span
                                    >
                                    <strong
                                        class="text-white"
                                        style="font-weight: 700"
                                        >{{
                                            selectedProject.supervisor
                                        }}</strong
                                    >
                                </span>
                            </div>
                            <div class="col-md-6 ps-md-4">
                                <span
                                    class="text-white small uppercase-tracking fw-bold d-block mb-2"
                                    style="
                                        color: #cbd5e1 !important;
                                        letter-spacing: 0.05em;
                                    "
                                    >MITRA STRATEGIS / PENGGUNA SISTEM</span
                                >
                                <div
                                    v-if="
                                        selectedProject.partners &&
                                        selectedProject.partners.length > 0
                                    "
                                    class="d-flex flex-wrap gap-2"
                                >
                                    <span
                                        v-for="(
                                            pName, pI
                                        ) in selectedProject.partners"
                                        :key="pI"
                                        class="d-inline-flex align-items-center gap-2 py-2 px-3 rounded-3"
                                        style="
                                            background: rgba(
                                                245,
                                                158,
                                                11,
                                                0.18
                                            );
                                            border: 1px solid
                                                rgba(245, 158, 11, 0.4);
                                            font-size: 0.88rem;
                                        "
                                    >
                                        <span>🤝</span>
                                        <span
                                            class="text-white fw-semibold"
                                            style="color: #ffffff !important"
                                            >{{ pName }}</span
                                        >
                                    </span>
                                </div>
                                <span
                                    v-else
                                    class="text-muted text-italic small"
                                    style="color: #94a3b8 !important"
                                    >Proyek Riset Mandiri / Akademik</span
                                >
                            </div>
                        </div>
                    </div>

                    <!-- Team Members Cards -->
                    <div class="glass-card p-4 p-md-5">
                        <h3
                            class="fw-extrabold text-white text-center mb-2 text-gradient-silver"
                        >
                            Anggota Inovator
                        </h3>
                        <p
                            class="text-secondary text-center mx-auto mb-5"
                            style="max-width: 600px"
                        >
                            Sivitas di balik rancangan, implementasi, dan
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
                                    <div
                                        class="team-avatar-container mb-3 position-relative"
                                    >
                                        <div class="team-avatar-ring"></div>
                                        <img
                                            v-if="
                                                member.photo &&
                                                hasRealPhoto(member.photo)
                                            "
                                            :src="member.photo"
                                            :alt="member.nickname"
                                            class="team-avatar-img"
                                        />
                                        <div
                                            v-else
                                            class="team-avatar d-flex justify-content-center align-items-center text-white fw-bold fs-4"
                                        >
                                            {{
                                                member.nickname
                                                    ? member.nickname
                                                          .substring(0, 2)
                                                          .toUpperCase()
                                                    : "TM"
                                            }}
                                        </div>
                                    </div>
                                    <h5
                                        class="text-white fw-bold mb-1 text-truncate w-100"
                                    >
                                        {{ member.nickname }}
                                    </h5>
                                    <p
                                        class="text-white mb-2 small text-truncate w-100"
                                        style="color: #cbd5e1 !important"
                                    >
                                        {{ member.fullname }}
                                    </p>
                                    <span
                                        v-if="member.role"
                                        class="badge bg-dark border border-secondary text-light mb-4 w-100 text-truncate"
                                        style="
                                            font-size: 11px;
                                            padding: 6px 10px;
                                            color: #e2e8f0 !important;
                                        "
                                    >
                                        {{ member.role }}
                                    </span>

                                    <!-- Social Media Buttons -->
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
                                                    d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v4.717h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"
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
                                                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.298.088.851.222 1.433.42 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.088 1.433-.222 1.942-.42a3.917 3.917 0 0 0 1.417-.923 3.927 3.927 0 0 0 .923-1.417c.198-.509.333-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.088-.851-.222-1.433-.42-1.942a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"
                                                />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
            <button
                class="lightbox-close"
                @click="closeLightbox"
                aria-label="Tutup"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    fill="currentColor"
                    viewBox="0 0 16 16"
                >
                    <path
                        d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"
                    />
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
            transitionText: "Loading Om...",
            isLightboxOpen: false,
            lightboxImage: null,
            gridScrollPosition: 0,
            activeDetailTab: "overview",
            animatedStats: {
                projects: 0,
                nasional: 0,
                internasional: 0,
                mitra: 0,
                dosen: 0,
            },
        };
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
            const uniquePartners = new Set();
            this.projects.forEach((p) => {
                if (p.partners && Array.isArray(p.partners)) {
                    p.partners.forEach((partner) => {
                        if (partner && typeof partner === "string") {
                            const trimmed = partner.trim();
                            if (trimmed) {
                                uniquePartners.add(trimmed.toLowerCase());
                            }
                        }
                    });
                }
            });
            return uniquePartners.size;
        },
    },
    mounted() {
        if ("scrollRestoration" in window.history) {
            window.history.scrollRestoration = "manual";
        }
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
        this.animateCounters();
        this.$nextTick(() => {
            this.initParticleCanvas();
        });
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
            document.body.style.overflow = "hidden";
        },
        closeLightbox() {
            this.isLightboxOpen = false;
            this.lightboxImage = null;
            document.body.style.overflow = "";
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
            if (this.isTransitioning) return;
            if (this.currentView === "grid") {
                this.gridScrollPosition =
                    window.scrollY || window.pageYOffset || 0;
            }
            this.transitionText = "Loading Om...";
            this.isTransitioning = true;

            setTimeout(() => {
                this.selectedProject = project;
                this.activeDetailTab = "overview";
                this.currentView = "detail";
                window.history.pushState(
                    { view: "detail", projectId: project.id },
                    "",
                );
                this.$nextTick(() => {
                    window.scrollTo({ top: 0, behavior: "instant" });
                    setTimeout(() => {
                        this.isTransitioning = false;
                    }, 180);
                });
            }, 180);
        },
        backToGrid() {
            if (this.isTransitioning) return;
            this.transitionText = "Loading Om...";
            this.isTransitioning = true;

            setTimeout(() => {
                this.currentView = "grid";
                this.selectedProject = null;
                if (
                    window.history.state &&
                    window.history.state.view === "detail"
                ) {
                    window.history.back();
                }
                const targetScroll = this.gridScrollPosition || 0;
                this.$nextTick(() => {
                    window.scrollTo({ top: targetScroll, behavior: "instant" });
                    setTimeout(() => {
                        this.isTransitioning = false;
                    }, 180);
                });
            }, 180);
        },
        handlePopState(event) {
            if (this.isTransitioning) return;
            this.transitionText = "Loading Om...";
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
                        this.$nextTick(() => {
                            window.scrollTo({ top: 0, behavior: "instant" });
                        });
                    } else {
                        this.currentView = "grid";
                        this.selectedProject = null;
                        const targetScroll = this.gridScrollPosition || 0;
                        this.$nextTick(() => {
                            window.scrollTo({
                                top: targetScroll,
                                behavior: "instant",
                            });
                        });
                    }
                } else {
                    this.currentView = "grid";
                    this.selectedProject = null;
                    const targetScroll = this.gridScrollPosition || 0;
                    this.$nextTick(() => {
                        window.scrollTo({
                            top: targetScroll,
                            behavior: "instant",
                        });
                    });
                }
                setTimeout(() => {
                    this.isTransitioning = false;
                }, 180);
            }, 180);
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
            return (
                photo.startsWith("/") ||
                photo.includes("/") ||
                photo.includes("\\")
            );
        },
        hasPartnerLogo(project) {
            if (!project) return false;
            const logos = this.getPartnerLogos(project);
            return logos.length > 0;
        },
        getPartnerLogos(project) {
            if (!project) return [];
            const partnerLogos = project.logo_mitra || project.foto_mitra;
            if (Array.isArray(partnerLogos)) {
                return partnerLogos.filter(
                    (item) =>
                        item &&
                        typeof item === "string" &&
                        item.trim().length > 0,
                );
            }
            if (
                typeof partnerLogos === "string" &&
                partnerLogos.trim().length > 0
            ) {
                return [partnerLogos];
            }
            return [];
        },
        getPartnerName(project, index) {
            if (
                project &&
                project.partners &&
                Array.isArray(project.partners) &&
                project.partners[index]
            ) {
                return project.partners[index];
            }
            return project && project.partners && project.partners.length > 0
                ? project.partners.join(", ")
                : "Mitra Proyek";
        },
        animateCounters() {
            const duration = 1200;
            const startTime = performance.now();

            const targetProjects = this.projects.length;
            const targetNasional = this.totalNasional;
            const targetInternasional = this.totalInternasional;
            const targetMitra = this.totalMitra;
            const targetDosen = 5;

            const update = (now) => {
                const elapsed = now - startTime;
                const progress = Math.min(elapsed / duration, 1);
                const ease = 1 - Math.pow(1 - progress, 3);

                this.animatedStats = {
                    projects: Math.floor(targetProjects * ease),
                    nasional: Math.floor(targetNasional * ease),
                    internasional: Math.floor(targetInternasional * ease),
                    mitra: Math.floor(targetMitra * ease),
                    dosen: Math.floor(targetDosen * ease),
                };

                if (progress < 1) {
                    requestAnimationFrame(update);
                } else {
                    this.animatedStats = {
                        projects: targetProjects,
                        nasional: targetNasional,
                        internasional: targetInternasional,
                        mitra: targetMitra,
                        dosen: targetDosen,
                    };
                }
            };

            requestAnimationFrame(update);
        },
        getMediaCount(project) {
            if (!project) return 0;
            let count = 0;
            if (project.screenshots && Array.isArray(project.screenshots)) {
                count += project.screenshots.length;
            }
            if (
                project.documentations &&
                Array.isArray(project.documentations)
            ) {
                count += project.documentations.length;
            }
            return count;
        },
        initParticleCanvas() {
            const canvas = document.getElementById("ambientParticleCanvas");
            if (!canvas) return;
            const ctx = canvas.getContext("2d");
            if (!ctx) return;

            let width = (canvas.width = window.innerWidth);
            let height = (canvas.height = window.innerHeight);

            const particles = [];
            const particleCount = Math.min(
                Math.floor(window.innerWidth / 22),
                55,
            );

            const colors = [
                "rgba(56, 189, 248, ", // vibrant cyan
                "rgba(192, 132, 252, ", // bright purple
                "rgba(251, 191, 36, ", // glowing gold
                "rgba(129, 140, 248, ", // electric indigo
                "rgba(45, 212, 191, ", // bright emerald cyan
            ];

            for (let i = 0; i < particleCount; i++) {
                particles.push({
                    x: Math.random() * width,
                    y: Math.random() * height,
                    radius: Math.random() * 2.5 + 2.0,
                    colorPrefix:
                        colors[Math.floor(Math.random() * colors.length)],
                    vx: (Math.random() - 0.5) * 0.45,
                    vy: (Math.random() - 0.5) * 0.45,
                    alpha: Math.random() * 0.45 + 0.45,
                    alphaSpeed: Math.random() * 0.006 + 0.002,
                    alphaDirection: Math.random() > 0.5 ? 1 : -1,
                });
            }

            const onResize = () => {
                width = canvas.width = window.innerWidth;
                height = canvas.height = window.innerHeight;
            };

            window.addEventListener("resize", onResize, { passive: true });
            this._particleResizeHandler = onResize;

            const maxDistSq = 135 * 135;
            let isTabActive = true;

            const onVisibilityChange = () => {
                isTabActive = !document.hidden;
            };
            document.addEventListener("visibilitychange", onVisibilityChange);
            this._particleVisibilityHandler = onVisibilityChange;

            const render = () => {
                if (!isTabActive) {
                    this._particleAnimId = requestAnimationFrame(render);
                    return;
                }

                ctx.clearRect(0, 0, width, height);

                // Squared distance check to skip expensive Math.sqrt operations
                for (let i = 0; i < particles.length; i++) {
                    const pi = particles[i];
                    for (let j = i + 1; j < particles.length; j++) {
                        const pj = particles[j];
                        const dx = pi.x - pj.x;
                        const dy = pi.y - pj.y;
                        const distSq = dx * dx + dy * dy;

                        if (distSq < maxDistSq) {
                            const dist = Math.sqrt(distSq);
                            const lineAlpha = (1 - dist / 135) * 0.28;
                            ctx.beginPath();
                            ctx.moveTo(pi.x, pi.y);
                            ctx.lineTo(pj.x, pj.y);
                            ctx.strokeStyle = `rgba(148, 163, 184, ${lineAlpha})`;
                            ctx.lineWidth = 0.8;
                            ctx.stroke();
                        }
                    }
                }

                // Render floating particles with dual-arc radial glow (hardware accelerated)
                particles.forEach((p) => {
                    p.x += p.vx;
                    p.y += p.vy;

                    if (p.x < 0 || p.x > width) p.vx *= -1;
                    if (p.y < 0 || p.y > height) p.vy *= -1;

                    p.alpha += p.alphaSpeed * p.alphaDirection;
                    if (p.alpha > 0.92) {
                        p.alpha = 0.92;
                        p.alphaDirection = -1;
                    } else if (p.alpha < 0.35) {
                        p.alpha = 0.35;
                        p.alphaDirection = 1;
                    }

                    // Outer soft glow halo
                    ctx.beginPath();
                    ctx.arc(p.x, p.y, p.radius * 2.2, 0, Math.PI * 2);
                    ctx.fillStyle = `${p.colorPrefix}${p.alpha * 0.28})`;
                    ctx.fill();

                    // Inner bright core
                    ctx.beginPath();
                    ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
                    ctx.fillStyle = `${p.colorPrefix}${p.alpha})`;
                    ctx.fill();
                });

                this._particleAnimId = requestAnimationFrame(render);
            };

            render();
        },
        destroyParticleCanvas() {
            if (this._particleAnimId) {
                cancelAnimationFrame(this._particleAnimId);
            }
            if (this._particleResizeHandler) {
                window.removeEventListener(
                    "resize",
                    this._particleResizeHandler,
                );
            }
            if (this._particleVisibilityHandler) {
                document.removeEventListener(
                    "visibilitychange",
                    this._particleVisibilityHandler,
                );
            }
        },
        getExternalUrls(project) {
            if (!project || !project.external_url) return [];

            let urls = project.external_url;

            if (typeof urls === "string") {
                try {
                    const parsed = JSON.parse(urls);
                    if (Array.isArray(parsed)) {
                        urls = parsed;
                    } else {
                        urls = [urls];
                    }
                } catch (e) {
                    urls = [urls];
                }
            }

            if (!Array.isArray(urls)) {
                urls = [urls];
            }

            return urls.filter(
                (u) =>
                    u && (typeof u === "string" || typeof u === "object"),
            );
        },
        formatUrl(urlItem) {
            if (!urlItem) return "#";
            let raw =
                typeof urlItem === "object" && urlItem.url
                    ? urlItem.url
                    : urlItem;
            if (typeof raw !== "string") return "#";
            const trimmed = raw.trim();
            if (
                !trimmed.startsWith("http://") &&
                !trimmed.startsWith("https://")
            ) {
                return "https://" + trimmed;
            }
            return trimmed;
        },
        getUrlLabel(urlItem, index, total) {
            if (typeof urlItem === "object" && urlItem.name) {
                return urlItem.name;
            }
            if (total === 1) {
                return "Buka Aplikasi Web";
            }
            return `Buka Web App #${index + 1}`;
        },
    },
    beforeUnmount() {
        window.removeEventListener("popstate", this.handlePopState);
        this.destroyParticleCanvas();
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
