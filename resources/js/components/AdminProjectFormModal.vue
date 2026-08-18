<template>
    <div
        class="modal fade show d-block"
        tabindex="-1"
        style="background: rgba(15, 23, 42, 0.90); z-index: 1070;"
        @click.self="$emit('close')"
    >
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
            <div
                class="modal-content border-0 rounded-4 shadow-lg text-start overflow-hidden"
                style="background: rgba(30, 41, 59, 0.98); border: 1px solid rgba(255, 255, 255, 0.15) !important;"
            >
                <!-- Modal Header -->
                <div class="modal-header border-bottom border-secondary border-opacity-20 py-3 px-4 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-2">
                        <div
                            class="rounded-3 p-2 d-flex align-items-center justify-content-center"
                            :style="{ background: isEdit ? 'rgba(234, 179, 8, 0.15)' : 'rgba(34, 197, 94, 0.15)', color: isEdit ? '#eab308' : '#22c55e', width: '38px', height: '38px' }"
                        >
                            <i :class="isEdit ? 'bi bi-pencil-square fs-5' : 'bi bi-folder-plus fs-5'"></i>
                        </div>
                        <div>
                            <h5 class="modal-title text-white fw-bold mb-0" style="font-size: 1.15rem;">
                                {{ isEdit ? 'Edit Data Proyek' : 'Tambah Proyek Baru' }}
                            </h5>
                            <span class="text-slate-300 small">
                                {{ isEdit ? 'Perbarui informasi dan dokumen proyek akreditasi' : 'Isi formulir untuk menambahkan proyek inovasi baru' }}
                            </span>
                        </div>
                    </div>
                    <button
                        type="button"
                        class="btn-close btn-close-white opacity-75"
                        @click="$emit('close')"
                    ></button>
                </div>

                <!-- Tab Navigation -->
                <div class="px-4 pt-3 bg-dark bg-opacity-40 border-bottom border-secondary border-opacity-20">
                    <ul class="nav nav-tabs border-0 flex-nowrap overflow-auto" id="projectFormTabs">
                        <li class="nav-item">
                            <button
                                class="nav-link border-0 text-white pb-2 fw-medium me-2"
                                :class="{ active: activeTab === 'basic' }"
                                @click="activeTab = 'basic'"
                            >
                                <i class="bi bi-info-circle me-1"></i> Utama & Detail
                            </button>
                        </li>
                        <li class="nav-item">
                            <button
                                class="nav-link border-0 text-white pb-2 fw-medium me-2"
                                :class="{ active: activeTab === 'media' }"
                                @click="activeTab = 'media'"
                            >
                                <i class="bi bi-file-earmark-arrow-up me-1"></i> Berkas & Media
                            </button>
                        </li>
                        <li class="nav-item">
                            <button
                                class="nav-link border-0 text-white pb-2 fw-medium me-2"
                                :class="{ active: activeTab === 'features_team' }"
                                @click="activeTab = 'features_team'"
                            >
                                <i class="bi bi-people me-1"></i> Fitur & Tim Inovator
                            </button>
                        </li>
                        <li class="nav-item">
                            <button
                                class="nav-link border-0 text-white pb-2 fw-medium me-2"
                                :class="{ active: activeTab === 'partners' }"
                                @click="activeTab = 'partners'"
                            >
                                <i class="bi bi-award me-1"></i> Pendanaan & Mitra
                            </button>
                        </li>
                    </ul>
                </div>

                <!-- Modal Body -->
                <div class="modal-body p-4 text-white">
                    <!-- Error Notification -->
                    <div
                        v-if="errorMessage"
                        class="alert alert-danger border-0 rounded-3 d-flex align-items-center gap-2 small py-2.5 px-3 mb-3"
                        style="background: rgba(239, 68, 68, 0.2); color: #fca5a5; border: 1px solid rgba(239, 68, 68, 0.3) !important;"
                    >
                        <i class="bi bi-exclamation-triangle-fill fs-6"></i>
                        <div>{{ errorMessage }}</div>
                    </div>

                    <form @submit.prevent="handleSubmit" id="projectForm">
                        <!-- TAB 1: INFORMASI UTAMA -->
                        <div v-show="activeTab === 'basic'">
                            <div class="row g-3">
                                <div class="col-md-8">
                                    <label class="form-label text-slate-300 small fw-semibold mb-1">Nama Proyek *</label>
                                    <input
                                        type="text"
                                        class="form-control bg-dark text-white border-secondary"
                                        placeholder="Contoh: SIGAP"
                                        v-model="form.name"
                                        required
                                    />
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label text-slate-300 small fw-semibold mb-1">Tipe Proyek *</label>
                                    <select class="form-select bg-dark text-white border-secondary" v-model="form.type" required>
                                        <option value="web">Web-Based</option>
                                        <option value="mobile">Mobile-Based</option>
                                        <option value="hardware">Hardware-Based</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-slate-300 small fw-semibold mb-1">Dosen Pembimbing (Supervisor)</label>
                                    <input
                                        type="text"
                                        class="form-control bg-dark text-white border-secondary"
                                        placeholder="Contoh: MDB / Dra. Yuli, M.Kom"
                                        v-model="form.supervisor"
                                    />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-slate-300 small fw-semibold mb-1">Bidang Teknologi (Tech Field)</label>
                                    <input
                                        type="text"
                                        class="form-control bg-dark text-white border-secondary"
                                        placeholder="Contoh: Machine Learning, Artificial Intelligence"
                                        v-model="form.tech_field"
                                    />
                                </div>
                                <div class="col-12">
                                    <label class="form-label text-slate-300 small fw-semibold mb-1">Tagline Ringkas</label>
                                    <input
                                        type="text"
                                        class="form-control bg-dark text-white border-secondary"
                                        placeholder="Sistem Perlindungan Darurat & Pelaporan Kekerasan Seksual Berbasis AI"
                                        v-model="form.tagline"
                                    />
                                </div>
                                <div class="col-12">
                                    <label class="form-label text-slate-300 small fw-semibold mb-1">Deskripsi Lengkap Proyek</label>
                                    <textarea
                                        class="form-control bg-dark text-white border-secondary"
                                        rows="4"
                                        placeholder="Jelaskan secara rinci tentang latar belakang, solusi, dan dampak dari proyek ini..."
                                        v-model="form.description"
                                    ></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label text-slate-300 small fw-semibold mb-1">Level Prestasi / TKT</label>
                                    <input
                                        type="text"
                                        class="form-control bg-dark text-white border-secondary"
                                        placeholder="Contoh: TKT Level 6 / Juara 1 Gemastik"
                                        v-model="form.prestasi_level"
                                    />
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label text-slate-300 small fw-semibold mb-1">Link Demo Live / Web (URL)</label>
                                    <input
                                        type="url"
                                        class="form-control bg-dark text-white border-secondary"
                                        placeholder="https://sigap-app.id"
                                        v-model="form.external_url"
                                    />
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label text-slate-300 small fw-semibold mb-1">Link Video Demo (YouTube URL)</label>
                                    <input
                                        type="url"
                                        class="form-control bg-dark text-white border-secondary"
                                        placeholder="https://youtube.com/watch?v=..."
                                        v-model="form.video_url"
                                    />
                                </div>
                            </div>
                        </div>

                        <!-- TAB 2: BERKAS & MEDIA -->
                        <div v-show="activeTab === 'media'">
                            <div class="row g-3">
                                <!-- Logo Section -->
                                <div class="col-md-6">
                                    <div class="p-3 bg-dark bg-opacity-50 rounded-3 border border-secondary border-opacity-30">
                                        <label class="form-label text-white fw-semibold small mb-2 d-flex align-items-center gap-1">
                                            <i class="bi bi-image text-info"></i> Upload Logo Proyek (Max 10MB)
                                        </label>
                                        <input
                                            type="file"
                                            class="form-control bg-dark text-white border-secondary mb-2"
                                            accept="image/*"
                                            @change="handleLogoChange"
                                        />
                                        <div v-if="form.logo || logoPreview" class="d-flex align-items-center gap-2 mt-2">
                                            <img
                                                :src="logoPreview || form.logo"
                                                alt="Logo Preview"
                                                class="rounded border border-secondary"
                                                style="width: 48px; height: 48px; object-fit: contain; background: #111;"
                                            />
                                            <span class="text-secondary extra-small">Preview Logo saat ini</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- PDF Report Section -->
                                <div class="col-md-6">
                                    <div class="p-3 bg-dark bg-opacity-50 rounded-3 border border-secondary border-opacity-30">
                                        <label class="form-label text-white fw-semibold small mb-2 d-flex align-items-center gap-1">
                                            <i class="bi bi-file-earmark-pdf text-danger"></i> Upload Laporan PDF (Max 30MB)
                                        </label>
                                        <input
                                            type="file"
                                            class="form-control bg-dark text-white border-secondary mb-2"
                                            accept="application/pdf"
                                            @change="handlePdfChange"
                                        />
                                        <div v-if="form.pdf_report" class="text-truncate small text-info mt-1">
                                            <i class="bi bi-paperclip"></i> {{ form.pdf_report }}
                                        </div>
                                    </div>
                                </div>

                                <!-- Screenshots Section -->
                                <div class="col-12">
                                    <div class="p-3 bg-dark bg-opacity-50 rounded-3 border border-secondary border-opacity-30">
                                        <label class="form-label text-white fw-semibold small mb-2 d-flex align-items-center gap-1">
                                            <i class="bi bi-grid-3x3-gap text-warning"></i> Upload Foto Screenshot Galeri
                                        </label>
                                        <input
                                            type="file"
                                            class="form-control bg-dark text-white border-secondary mb-2"
                                            accept="image/*"
                                            multiple
                                            @change="handleScreenshotsChange"
                                        />
                                        <div class="text-secondary extra-small">
                                            Dapat memilih beberapa berkas sekaligus.
                                        </div>
                                        <div v-if="form.screenshots && form.screenshots.length > 0" class="d-flex flex-wrap gap-2 mt-3">
                                            <div
                                                v-for="(sc, idx) in form.screenshots"
                                                :key="idx"
                                                class="position-relative rounded overflow-hidden border border-secondary"
                                                style="width: 80px; height: 50px;"
                                            >
                                                <img :src="sc" class="w-100 h-100 object-fit-cover" />
                                                <button
                                                    type="button"
                                                    class="btn btn-danger btn-sm p-0 position-absolute top-0 end-0 rounded-0"
                                                    style="width: 18px; height: 18px; line-height: 1;"
                                                    @click="removeExistingScreenshot(idx)"
                                                >
                                                    &times;
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TAB 3: FITUR UTAMA & TIM INOVATOR -->
                        <div v-show="activeTab === 'features_team'">
                            <!-- Fitur Utama -->
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <label class="form-label text-white fw-semibold small mb-0">Daftar Fitur Utama</label>
                                    <button
                                        type="button"
                                        class="btn btn-sm btn-outline-info rounded-pill py-1 px-2.5 extra-small"
                                        @click="addFeature"
                                    >
                                        <i class="bi bi-plus-lg"></i> Tambah Fitur
                                    </button>
                                </div>
                                <div v-if="form.features.length === 0" class="text-secondary small italic text-center py-2 border border-dashed border-secondary rounded-3">
                                    Belum ada fitur ditambahkan.
                                </div>
                                <div v-for="(feat, idx) in form.features" :key="idx" class="input-group mb-2">
                                    <span class="input-group-text bg-dark border-secondary text-secondary small">{{ idx + 1 }}</span>
                                    <input
                                        type="text"
                                        class="form-control bg-dark text-white border-secondary"
                                        placeholder="Contoh: Fitur Darurat SOS dengan perekaman audio real-time"
                                        v-model="form.features[idx]"
                                    />
                                    <button
                                        type="button"
                                        class="btn btn-outline-danger border-secondary"
                                        @click="removeFeature(idx)"
                                    >
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Tim Inovator -->
                            <div class="border-top border-secondary border-opacity-30 pt-3">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <label class="form-label text-white fw-semibold small mb-0">Anggota Tim Inovator</label>
                                    <button
                                        type="button"
                                        class="btn btn-sm btn-outline-success rounded-pill py-1 px-2.5 extra-small"
                                        @click="addTeamMember"
                                    >
                                        <i class="bi bi-person-plus"></i> Tambah Anggota
                                    </button>
                                </div>
                                <div v-if="form.team_members.length === 0" class="text-secondary small italic text-center py-2 border border-dashed border-secondary rounded-3">
                                    Belum ada anggota tim ditambahkan.
                                </div>
                                <div
                                    v-for="(member, idx) in form.team_members"
                                    :key="idx"
                                    class="p-3 bg-dark bg-opacity-40 rounded-3 border border-secondary border-opacity-30 mb-3"
                                >
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="badge bg-secondary">Anggota #{{ idx + 1 }}</span>
                                        <button
                                            type="button"
                                            class="btn btn-sm btn-link text-danger text-decoration-none p-0 extra-small"
                                            @click="removeTeamMember(idx)"
                                        >
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-md-5">
                                            <input
                                                type="text"
                                                class="form-control form-control-sm bg-dark text-white border-secondary"
                                                placeholder="Nama Lengkap"
                                                v-model="member.name"
                                            />
                                        </div>
                                        <div class="col-md-3">
                                            <input
                                                type="text"
                                                class="form-control form-control-sm bg-dark text-white border-secondary"
                                                placeholder="Nickname / Panggilan"
                                                v-model="member.nickname"
                                            />
                                        </div>
                                        <div class="col-md-4">
                                            <input
                                                type="text"
                                                class="form-control form-control-sm bg-dark text-white border-secondary"
                                                placeholder="Peran (Hustler/Hipster/Hacker)"
                                                v-model="member.role"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TAB 4: PENDANAAN & MITRA -->
                        <div v-show="activeTab === 'partners'">
                            <!-- Pendanaan & Penghargaan -->
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <label class="form-label text-white fw-semibold small mb-0">Pendanaan & Penghargaan</label>
                                    <button
                                        type="button"
                                        class="btn btn-sm btn-outline-warning rounded-pill py-1 px-2.5 extra-small"
                                        @click="addFunding"
                                    >
                                        <i class="bi bi-plus-lg"></i> Tambah Penghargaan
                                    </button>
                                </div>
                                <div v-if="form.funding_awards.length === 0" class="text-secondary small italic text-center py-2 border border-dashed border-secondary rounded-3">
                                    Belum ada pendanaan / penghargaan.
                                </div>
                                <div v-for="(fund, idx) in form.funding_awards" :key="idx" class="input-group mb-2">
                                    <input
                                        type="text"
                                        class="form-control bg-dark text-white border-secondary"
                                        placeholder="Contoh: Pendanaan PKM-KC 2024 Kemendikbudristek"
                                        v-model="form.funding_awards[idx]"
                                    />
                                    <button
                                        type="button"
                                        class="btn btn-outline-danger border-secondary"
                                        @click="removeFunding(idx)"
                                    >
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Mitra / Partner -->
                            <div class="border-top border-secondary border-opacity-30 pt-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <label class="form-label text-white fw-semibold small mb-0">Mitra & Partner Kerjasama</label>
                                    <button
                                        type="button"
                                        class="btn btn-sm btn-outline-primary rounded-pill py-1 px-2.5 extra-small"
                                        @click="addPartner"
                                    >
                                        <i class="bi bi-plus-lg"></i> Tambah Mitra
                                    </button>
                                </div>
                                <div v-if="form.partners.length === 0" class="text-secondary small italic text-center py-2 border border-dashed border-secondary rounded-3">
                                    Belum ada mitra ditambahkan.
                                </div>
                                <div v-for="(partner, idx) in form.partners" :key="idx" class="input-group mb-2">
                                    <input
                                        type="text"
                                        class="form-control bg-dark text-white border-secondary"
                                        placeholder="Nama Instansi / Perusahaan Partner"
                                        v-model="form.partners[idx]"
                                    />
                                    <button
                                        type="button"
                                        class="btn btn-outline-danger border-secondary"
                                        @click="removePartner(idx)"
                                    >
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer border-top border-secondary border-opacity-20 py-3 px-4 d-flex justify-content-between">
                    <button
                        type="button"
                        class="btn btn-outline-secondary px-4 py-2 rounded-3 text-white"
                        @click="$emit('close')"
                        :disabled="loading"
                    >
                        Batal
                    </button>

                    <button
                        type="submit"
                        form="projectForm"
                        class="btn px-4 py-2 rounded-3 fw-bold d-flex align-items-center gap-2"
                        :class="isEdit ? 'btn-warning text-dark' : 'btn-success text-white'"
                        :disabled="loading"
                    >
                        <span v-if="loading" class="spinner-border spinner-border-sm" role="status"></span>
                        <i v-else :class="isEdit ? 'bi bi-check-circle-fill' : 'bi bi-plus-circle-fill'"></i>
                        <span>{{ loading ? 'Saving...' : (isEdit ? 'Simpan Perubahan' : 'Tambah Proyek') }}</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'AdminProjectFormModal',
    props: {
        projectData: {
            type: Object,
            default: null,
        },
    },
    emits: ['close', 'saved'],
    data() {
        return {
            activeTab: 'basic',
            loading: false,
            errorMessage: '',
            logoFile: null,
            logoPreview: null,
            pdfFile: null,
            screenshotFiles: [],
            form: {
                name: '',
                type: 'web',
                supervisor: '',
                tagline: '',
                description: '',
                tech_field: '',
                prestasi_level: '',
                external_url: '',
                video_url: '',
                logo: '',
                pdf_report: '',
                features: [],
                team_members: [],
                funding_awards: [],
                partners: [],
                screenshots: [],
            },
        };
    },
    computed: {
        isEdit() {
            return !!(this.projectData && this.projectData.id);
        },
    },
    mounted() {
        if (this.isEdit) {
            this.populateForm(this.projectData);
        }
    },
    methods: {
        populateForm(data) {
            this.form = {
                id: data.id,
                name: data.name || '',
                type: data.type || 'web',
                supervisor: data.supervisor || '',
                tagline: data.tagline || '',
                description: data.description || '',
                tech_field: data.tech_field || '',
                prestasi_level: data.prestasi_level || '',
                external_url: data.external_url || '',
                video_url: data.video_url || '',
                logo: data.logo || '',
                pdf_report: data.pdf_report || '',
                features: Array.isArray(data.features) ? [...data.features] : [],
                team_members: Array.isArray(data.team_members) ? JSON.parse(JSON.stringify(data.team_members)) : [],
                funding_awards: Array.isArray(data.funding_awards) ? [...data.funding_awards] : [],
                partners: Array.isArray(data.partners) ? [...data.partners] : [],
                screenshots: Array.isArray(data.screenshots) ? [...data.screenshots] : [],
            };
        },
        handleLogoChange(event) {
            const file = event.target.files[0];
            if (file) {
                this.logoFile = file;
                this.logoPreview = URL.createObjectURL(file);
            }
        },
        handlePdfChange(event) {
            const file = event.target.files[0];
            if (file) {
                this.pdfFile = file;
                this.form.pdf_report = file.name;
            }
        },
        handleScreenshotsChange(event) {
            this.screenshotFiles = Array.from(event.target.files);
        },
        addFeature() {
            this.form.features.push('');
        },
        removeFeature(index) {
            this.form.features.splice(index, 1);
        },
        addTeamMember() {
            this.form.team_members.push({
                name: '',
                nickname: '',
                role: '',
            });
        },
        removeTeamMember(index) {
            this.form.team_members.splice(index, 1);
        },
        addFunding() {
            this.form.funding_awards.push('');
        },
        removeFunding(index) {
            this.form.funding_awards.splice(index, 1);
        },
        addPartner() {
            this.form.partners.push('');
        },
        removePartner(index) {
            this.form.partners.splice(index, 1);
        },
        removeExistingScreenshot(index) {
            this.form.screenshots.splice(index, 1);
        },
        async handleSubmit() {
            this.loading = true;
            this.errorMessage = '';

            try {
                const formData = new FormData();
                formData.append('name', this.form.name);
                formData.append('type', this.form.type);
                formData.append('supervisor', this.form.supervisor || '');
                formData.append('tagline', this.form.tagline || '');
                formData.append('description', this.form.description || '');
                formData.append('tech_field', this.form.tech_field || '');
                formData.append('prestasi_level', this.form.prestasi_level || '');
                formData.append('external_url', this.form.external_url || '');
                formData.append('video_url', this.form.video_url || '');
                formData.append('logo', this.form.logo || '');
                formData.append('pdf_report', this.form.pdf_report || '');

                if (this.logoFile) {
                    formData.append('logo_file', this.logoFile);
                }

                if (this.pdfFile) {
                    formData.append('pdf_report_file', this.pdfFile);
                }

                if (this.screenshotFiles && this.screenshotFiles.length > 0) {
                    this.screenshotFiles.forEach((file) => {
                        formData.append('screenshot_files[]', file);
                    });
                }

                // JSON Arrays
                formData.append('features', JSON.stringify(this.form.features.filter(f => f.trim() !== '')));
                formData.append('team_members', JSON.stringify(this.form.team_members.filter(m => m.name && m.name.trim() !== '')));
                formData.append('funding_awards', JSON.stringify(this.form.funding_awards.filter(fa => fa.trim() !== '')));
                formData.append('partners', JSON.stringify(this.form.partners.filter(p => typeof p === 'string' ? p.trim() !== '' : !!p)));
                formData.append('screenshots', JSON.stringify(this.form.screenshots));

                let url = '/api/admin/projects';
                if (this.isEdit) {
                    url = `/api/admin/projects/${this.form.id}`;
                }

                const response = await axios.post(url, formData, {
                    headers: { 'Content-Type': 'multipart/form-data' },
                });

                this.$emit('saved', response.data.project);
            } catch (error) {
                if (error.response && error.response.data && error.response.data.message) {
                    this.errorMessage = error.response.data.message;
                } else {
                    this.errorMessage = 'Gagal menyimpan data proyek. Pastikan seluruh input valid.';
                }
            } finally {
                this.loading = false;
            }
        },
    },
};
</script>

<style scoped>
.nav-tabs .nav-link {
    border-bottom: 2px solid transparent !important;
    opacity: 0.7;
    transition: all 0.2s ease;
}
.nav-tabs .nav-link.active {
    background: transparent !important;
    color: #38bdf8 !important;
    border-bottom: 2px solid #38bdf8 !important;
    opacity: 1;
}
.extra-small {
    font-size: 0.75rem;
}
</style>
