<template>
    <div
        class="modal fade show d-block"
        tabindex="-1"
        style="background: rgba(15, 23, 42, 0.85); backdrop-filter: blur(14px); z-index: 1060;"
        @click.self="$emit('close')"
    >
        <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
            <div
                class="modal-content border-0 rounded-4 shadow-lg text-start overflow-hidden"
                style="background: rgba(30, 41, 59, 0.98); border: 1px solid rgba(255, 255, 255, 0.15) !important;"
            >
                <!-- Dashboard Header -->
                <div class="modal-header border-bottom border-secondary border-opacity-20 py-3.5 px-4 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-3">
                        <div
                            class="rounded-3 p-2.5 d-flex align-items-center justify-content-center"
                            style="background: linear-gradient(135deg, rgba(14, 165, 233, 0.2) 0%, rgba(56, 189, 248, 0.1) 100%); color: #38bdf8; width: 44px; height: 44px;"
                        >
                            <i class="bi bi-speedometer2 fs-4"></i>
                        </div>
                        <div>
                            <h5 class="modal-title text-white fw-extrabold mb-0" style="font-size: 1.25rem;">
                                Dashboard Admin Akreditasi
                            </h5>
                            <span class="text-secondary small">
                                Kelola pameran karya tugas akhir, media, laporan PDF, dan inovator
                            </span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center gap-2">
                        <button
                            type="button"
                            class="btn btn-outline-danger btn-sm rounded-pill px-3 py-1.5 d-flex align-items-center gap-1.5"
                            @click="handleLogout"
                        >
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Logout</span>
                        </button>
                        <button
                            type="button"
                            class="btn-close btn-close-white opacity-75 ms-2"
                            @click="$emit('close')"
                        ></button>
                    </div>
                </div>

                <!-- Dashboard Toolbar -->
                <div class="p-4 bg-dark bg-opacity-40 border-bottom border-secondary border-opacity-20 d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <!-- Search Field -->
                    <div class="input-group" style="max-width: 380px;">
                        <span class="input-group-text bg-dark border-secondary text-secondary">
                            <i class="bi bi-search"></i>
                        </span>
                        <input
                            type="text"
                            class="form-control bg-dark text-white border-secondary"
                            placeholder="Cari nama proyek, pembimbing, atau tipe..."
                            v-model="searchQuery"
                        />
                    </div>

                    <!-- Actions -->
                    <div class="d-flex align-items-center gap-2">
                        <button
                            type="button"
                            class="btn btn-primary rounded-3 px-3 py-2 fw-bold d-flex align-items-center gap-2 shadow-sm"
                            style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); border: none;"
                            @click="openAddModal"
                        >
                            <i class="bi bi-plus-lg fs-6"></i>
                            <span>Tambah Proyek Baru</span>
                        </button>
                    </div>
                </div>

                <!-- Dashboard Content / Table -->
                <div class="modal-body p-4 text-white">
                    <!-- Status Notification -->
                    <div
                        v-if="statusMessage"
                        class="alert alert-success border-0 rounded-3 d-flex align-items-center justify-content-between py-2.5 px-3 mb-3"
                        style="background: rgba(34, 197, 94, 0.2); color: #86efac; border: 1px solid rgba(34, 197, 94, 0.3) !important;"
                    >
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill fs-6"></i>
                            <div>{{ statusMessage }}</div>
                        </div>
                        <button type="button" class="btn-close btn-close-white btn-sm" @click="statusMessage = ''"></button>
                    </div>

                    <div v-if="loading" class="text-center py-5">
                        <div class="spinner-border text-info mb-2" role="status"></div>
                        <p class="text-secondary small">Memuat daftar proyek...</p>
                    </div>

                    <div v-else-if="filteredProjects.length === 0" class="text-center py-5">
                        <i class="bi bi-inbox fs-1 text-secondary d-block mb-2"></i>
                        <h6 class="text-white fw-bold">Tidak Ada Data Proyek</h6>
                        <p class="text-secondary small mb-3">Tidak ada proyek yang sesuai dengan kata kunci pencarian Anda.</p>
                        <button type="button" class="btn btn-sm btn-outline-info rounded-pill" @click="openAddModal">
                            + Tambah Proyek Pertama
                        </button>
                    </div>

                    <!-- Projects Table -->
                    <div v-else class="table-responsive rounded-3 border border-secondary border-opacity-30 overflow-hidden">
                        <table class="table table-dark table-hover align-middle mb-0" style="background: rgba(15, 23, 42, 0.5);">
                            <thead>
                                <tr class="text-secondary border-bottom border-secondary border-opacity-30 extra-small text-uppercase">
                                    <th style="width: 50px;">No</th>
                                    <th>Proyek & Tipe</th>
                                    <th>Pembimbing</th>
                                    <th>Teknologi / Field</th>
                                    <th>Tim</th>
                                    <th>Berkas PDF</th>
                                    <th class="text-end" style="width: 140px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(project, index) in filteredProjects" :key="project.id" class="border-bottom border-secondary border-opacity-10">
                                    <td class="text-secondary small font-monospace">{{ index + 1 }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2.5">
                                            <div
                                                class="rounded-3 overflow-hidden bg-dark border border-secondary d-flex align-items-center justify-content-center"
                                                style="width: 40px; height: 40px; min-width: 40px;"
                                            >
                                                <img v-if="project.logo" :src="project.logo" class="w-100 h-100 object-fit-contain" />
                                                <i v-else class="bi bi-box-seam text-secondary fs-5"></i>
                                            </div>
                                            <div>
                                                <div class="fw-bold text-white mb-0" style="font-size: 0.92rem;">
                                                    {{ project.name }}
                                                </div>
                                                <span
                                                    class="badge extra-small rounded-pill"
                                                    :class="{
                                                        'bg-info bg-opacity-20 text-info border border-info border-opacity-30': project.type === 'web',
                                                        'bg-purple bg-opacity-20 text-purple border border-purple border-opacity-30': project.type === 'mobile',
                                                        'bg-warning bg-opacity-20 text-warning border border-warning border-opacity-30': project.type === 'hardware',
                                                    }"
                                                >
                                                    {{ project.type === 'web' ? 'Web-Based' : (project.type === 'mobile' ? 'Mobile-Based' : 'Hardware') }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="small text-slate-300">{{ project.supervisor || '-' }}</span>
                                    </td>
                                    <td>
                                        <span class="small text-info-subtle">{{ project.tech_field || '-' }}</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-dark border border-secondary text-secondary extra-small">
                                            {{ project.team_members ? project.team_members.length : 0 }} Anggota
                                        </span>
                                    </td>
                                    <td>
                                        <span v-if="project.pdf_report" class="text-success small d-flex align-items-center gap-1">
                                            <i class="bi bi-file-earmark-pdf-fill"></i> Ada PDF
                                        </span>
                                        <span v-else class="text-secondary extra-small">Belum Ada</span>
                                    </td>
                                    <td class="text-end">
                                        <div class="d-flex align-items-center justify-content-end gap-1.5">
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-outline-warning p-1.5 px-2 rounded-2"
                                                title="Edit Proyek"
                                                @click="openEditModal(project)"
                                            >
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-outline-danger p-1.5 px-2 rounded-2"
                                                title="Hapus Proyek"
                                                @click="confirmDelete(project)"
                                            >
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Child Modal: Add / Edit Form -->
        <AdminProjectFormModal
            v-if="showFormModal"
            :project-data="selectedProjectForEdit"
            @close="showFormModal = false"
            @saved="handleProjectSaved"
        />

        <!-- Confirm Delete Modal -->
        <div
            v-if="projectToDelete"
            class="modal fade show d-block"
            tabindex="-1"
            style="background: rgba(0,0,0,0.7); z-index: 1080;"
        >
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content bg-dark text-white border-danger rounded-4 p-3 text-center">
                    <i class="bi bi-exclamation-triangle-fill text-danger fs-1 mb-2"></i>
                    <h6 class="fw-bold mb-2">Hapus Proyek Ini?</h6>
                    <p class="text-secondary small mb-3">
                        Apakah Anda yakin ingin menghapus <strong>{{ projectToDelete.name }}</strong>? Tindakan ini tidak dapat dibatalkan.
                    </p>
                    <div class="d-flex justify-content-center gap-2">
                        <button type="button" class="btn btn-sm btn-secondary rounded-pill px-3" @click="projectToDelete = null">
                            Batal
                        </button>
                        <button type="button" class="btn btn-sm btn-danger rounded-pill px-3" @click="executeDelete">
                            Hapus Sekarang
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import AdminProjectFormModal from './AdminProjectFormModal.vue';

export default {
    name: 'AdminDashboardModal',
    components: {
        AdminProjectFormModal,
    },
    props: {
        projects: {
            type: Array,
            default: () => [],
        },
    },
    emits: ['close', 'logout', 'refresh-projects'],
    data() {
        return {
            searchQuery: '',
            loading: false,
            statusMessage: '',
            showFormModal: false,
            selectedProjectForEdit: null,
            projectToDelete: null,
            internalProjects: [...this.projects],
        };
    },
    computed: {
        filteredProjects() {
            if (!this.searchQuery.trim()) {
                return this.internalProjects;
            }
            const query = this.searchQuery.toLowerCase();
            return this.internalProjects.filter((p) => {
                return (
                    (p.name && p.name.toLowerCase().includes(query)) ||
                    (p.supervisor && p.supervisor.toLowerCase().includes(query)) ||
                    (p.type && p.type.toLowerCase().includes(query)) ||
                    (p.tech_field && p.tech_field.toLowerCase().includes(query))
                );
            });
        },
    },
    mounted() {
        this.fetchProjects();
    },
    methods: {
        async fetchProjects() {
            this.loading = true;
            try {
                const response = await axios.get('/api/admin/projects');
                this.internalProjects = response.data;
            } catch (error) {
                console.error('Error fetching admin projects:', error);
            } finally {
                this.loading = false;
            }
        },
        openAddModal() {
            this.selectedProjectForEdit = null;
            this.showFormModal = true;
        },
        openEditModal(project) {
            this.selectedProjectForEdit = project;
            this.showFormModal = true;
        },
        handleProjectSaved(savedProject) {
            this.showFormModal = false;
            this.statusMessage = `Proyek '${savedProject.name}' berhasil disimpan.`;
            this.fetchProjects();
            this.$emit('refresh-projects');
        },
        confirmDelete(project) {
            this.projectToDelete = project;
        },
        async executeDelete() {
            if (!this.projectToDelete) return;
            const deletedId = this.projectToDelete.id;
            const name = this.projectToDelete.name;

            try {
                await axios.delete(`/api/admin/projects/${deletedId}`);
                this.projectToDelete = null;
                this.statusMessage = `Proyek '${name}' berhasil dihapus.`;
                this.fetchProjects();
                this.$emit('refresh-projects');
            } catch (error) {
                console.error('Error deleting project:', error);
                alert('Gagal menghapus proyek.');
            }
        },
        async handleLogout() {
            try {
                await axios.post('/api/admin/logout');
            } catch (error) {
                console.error('Logout error:', error);
            } finally {
                this.$emit('logout');
            }
        },
    },
};
</script>

<style scoped>
.extra-small {
    font-size: 0.72rem;
}
.bg-purple {
    background-color: #a855f7 !important;
}
.text-purple {
    color: #c084fc !important;
}
</style>
