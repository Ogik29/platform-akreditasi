<template>
    <div class="container py-5 position-relative">
        <!-- Glowing background lights -->
        <div class="glow-bg glow-top-left"></div>
        <div class="glow-bg glow-bottom-right"></div>
        <div class="glow-bg glow-center"></div>

        <!-- Header / Hero Section -->
        <header class="text-center mb-5 mt-4 fade-in-up">
            <div class="float-animation">
                <div
                    class="d-inline-block px-3 py-1 mb-3 rounded-pill bg-dark bg-opacity-50 border border-secondary text-secondary fw-bold fade-in-up anim-delay-100"
                    style="
                        font-size: 0.85rem;
                        letter-spacing: 1px;
                        border-color: rgba(255, 255, 255, 0.2) !important;
                        color: #cbd5e1 !important;
                    "
                >
                    ★ PAMERAN PRODI TEKNOLOGI INFORMASI ★
                </div>
                <h1
                    class="display-3 fw-extrabold text-white mb-3 fade-in-up anim-delay-200"
                >
                    Pameran
                    <span class="text-gradient-silver">Teknologi</span> &amp;
                    <span class="text-gradient-titanium">Inovasi</span>
                </h1>
                <p
                    class="lead text-secondary mx-auto mb-4 fade-in-up anim-delay-300"
                    style="max-width: 720px"
                >
                    Selamat datang di Platform Showcase Tugas Akhir dan Proyek
                    Inovatif Mahasiswa Teknologi Informasi Telkom University
                    Surabaya. Kami menampilkan hasil karya mahasiswa dengan
                    Tingkat Kesiapan Teknologi (TKT) minimal Level 5 dari 3
                    platform berbeda.
                </p>

                <!-- Stats Counters -->
                <div
                    class="row justify-content-center g-3 mt-4"
                    style="max-width: 800px; margin: 0 auto"
                >
                    <div class="col-6 col-md-3 fade-in-up anim-delay-400">
                        <div class="glass-card p-3 text-center">
                            <h3 class="fw-bold text-info mb-1">13</h3>
                            <small class="text-secondary d-block"
                                >Total Proyek</small
                            >
                        </div>
                    </div>
                    <div class="col-6 col-md-3 fade-in-up anim-delay-500">
                        <div class="glass-card p-3 text-center">
                            <h3 class="fw-bold text-warning mb-1">Min 5</h3>
                            <small class="text-secondary d-block"
                                >TKT Level</small
                            >
                        </div>
                    </div>
                    <div class="col-6 col-md-3 fade-in-up anim-delay-500">
                        <div class="glass-card p-3 text-center">
                            <h3
                                class="fw-bold text-secondary mb-1"
                                style="color: #cbd5e1 !important"
                            >
                                5
                            </h3>
                            <small class="text-secondary d-block"
                                >Dosen Pembimbing</small
                            >
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Search & Filters Row -->
        <section class="mb-5 fade-in-up anim-delay-500">
            <div class="glass-card p-4">
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
                            <option value="all">Semua Dosen Pembimbing</option>
                            <option value="MDB">
                                MDB (Muhammad Adib Kamali, S.T., M.Eng)
                            </option>
                            <option value="FZK">
                                FZK (Dr. Farah Zakiyah Rahmanti, S.ST., M.T)
                            </option>
                            <option value="MUN">
                                MUN (Mastuty Ayu Ningtyas, S.Kom., M.MT.)
                            </option>
                            <option value="YOH">
                                YOH (Yohanes Setiawan. S.Si., M.Kom.)
                            </option>
                            <option value="CAP">
                                CAP (Dr. Helmy Widyantara, S.Kom., M.Eng.)
                            </option>
                        </select>
                    </div>
                </div>

                <!-- Category Buttons Row -->
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
                            <span class="btn-filter-icon">🌐</span> Semua
                            Kategori
                        </button>
                        <button
                            type="button"
                            @click="selectedType = 'web'"
                            :class="[
                                'btn-filter',
                                selectedType === 'web' ? 'active' : '',
                            ]"
                        >
                            <span class="btn-filter-icon">💻</span> Web-Based
                        </button>
                        <button
                            type="button"
                            @click="selectedType = 'mobile'"
                            :class="[
                                'btn-filter',
                                selectedType === 'mobile' ? 'active' : '',
                            ]"
                        >
                            <span class="btn-filter-icon">📱</span> Mobile-Based
                        </button>
                        <button
                            type="button"
                            @click="selectedType = 'hardware'"
                            :class="[
                                'btn-filter',
                                selectedType === 'hardware' ? 'active' : '',
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
                Tidak ditemukan proyek yang cocok dengan kriteria filter Anda
            </h5>
            <button class="btn btn-silver" @click="resetFilters">
                Reset Filter
            </button>
        </div>

        <!-- Standard 3-Column Project Grid -->
        <transition-group v-else name="project-list" tag="div" class="row g-4">
            <div
                v-for="project in filteredProjects"
                :key="project.id"
                class="col-12 col-md-6 col-lg-4"
            >
                <div
                    class="glass-card h-100 p-4 d-flex flex-column justify-content-between"
                >
                    <div>
                        <!-- Card Header -->
                        <div
                            class="d-flex justify-content-between align-items-start mb-3"
                        >
                            <div class="d-flex align-items-center">
                                <!-- Initials logo frame -->
                                <div
                                    class="logo-frame bg-dark bg-opacity-50 border border-secondary rounded-3 d-flex justify-content-center align-items-center me-3"
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
                                    <span class="fs-4 fw-extrabold text-info">{{
                                        project.name
                                            .substring(0, 2)
                                            .toUpperCase()
                                    }}</span>
                                </div>
                                <div>
                                    <h5
                                        class="fw-bold text-white mb-0 text-truncate"
                                        style="max-width: 140px"
                                        :title="project.name"
                                    >
                                        {{ project.name }}
                                    </h5>
                                    <span
                                        class="text-secondary"
                                        style="font-size: 0.75rem"
                                        >Dosen: {{ project.supervisor }}</span
                                    >
                                </div>
                            </div>
                            <span class="badge badge-premium badge-tkt"
                                >TKT {{ project.tkt }}</span
                            >
                        </div>

                        <!-- Tagline -->
                        <h6 class="small fw-bold text-light opacity-75 mb-2">
                            {{ project.tagline }}
                        </h6>
                        <!-- Description -->
                        <p
                            class="small text-secondary mb-4"
                            style="line-height: 1.6"
                        >
                            {{
                                project.description.length > 120
                                    ? project.description.substring(0, 120) +
                                      "..."
                                    : project.description
                            }}
                        </p>
                    </div>

                    <!-- Card Footer Buttons -->
                    <div>
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
                                Demo:
                                <span
                                    class="text-capitalize fw-bold text-white"
                                    >{{ project.demo_level }}</span
                                >
                            </span>
                        </div>
                        <div class="d-flex gap-2">
                            <button
                                @click="showDetail(project)"
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

        <!-- Details View Modal Component -->
        <project-detail-modal :project="selectedProject"></project-detail-modal>

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
                        <h6
                            class="modal-title fw-bold text-white d-flex align-items-center gap-2"
                            id="mobileEmulatorModalLabel"
                        >
                            <span>📱</span> Demo Aplikasi Mobile
                        </h6>
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
                                            {{ activeMobileProject.name }}</span
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
                                            >Silakan datangi stand pameran untuk
                                            menguji model ini pada perangkat
                                            smartphone uji coba kami.</small
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
                                Aplikasi mobile ini siap dicoba. Datang ke stand
                                pembimbing
                                <strong>{{
                                    activeMobileProject.supervisor
                                }}</strong>
                                untuk mendemonstrasikan sistem pada HP uji coba
                                kami.
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
                                :src="activeHardwareProject.video_url"
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
                            <h6
                                class="alert-heading fw-bold mb-1"
                                style="
                                    font-size: 0.88rem;
                                    color: var(--accent-silver) !important;
                                "
                            >
                                🛠 Coba Prototipe di Stand Pameran!
                            </h6>
                            <p
                                class="small mb-0"
                                style="
                                    line-height: 1.4;
                                    font-size: 0.8rem;
                                    color: var(--text-secondary) !important;
                                "
                            >
                                Alat fisik ini telah dipasang dan dikonfigurasi
                                di stand pembimbing
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
            selectedSupervisor: "all",
            selectedProject: null,
            activeMobileProject: null,
            activeHardwareProject: null,
            detailModalInstance: null,
            mobileModalInstance: null,
            videoModalInstance: null,
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

                return matchesSearch && matchesType && matchesSupervisor;
            });
        },
    },
    methods: {
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
            this.selectedSupervisor = "all";
        },
    },
};
</script>
