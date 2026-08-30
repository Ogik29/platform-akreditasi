<template>
    <div
        class="modal fade show d-block"
        id="adminDashboardModal"
        tabindex="-1"
        aria-labelledby="adminDashboardModalLabel"
        style="background: rgba(0, 0, 0, 0.85); backdrop-filter: blur(12px)"
    >
        <div
            class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable"
        >
            <div
                class="modal-content bg-dark border border-secondary border-opacity-30 rounded-4 shadow-lg text-white overflow-hidden"
                style="max-height: 90vh"
            >
                <!-- Dashboard Header -->
                <div
                    class="modal-header border-bottom border-secondary border-opacity-20 px-4 py-3 bg-slate-900 d-flex align-items-center justify-content-between"
                >
                    <div class="d-flex align-items-center gap-3">
                        <div
                            class="bg-emerald-500 bg-opacity-20 p-2.5 rounded-3 border border-emerald-500 border-opacity-30 text-emerald-400 d-flex align-items-center justify-content-center"
                            style="width: 44px; height: 44px"
                        >
                            <i class="bi bi-speedometer2 fs-4"></i>
                        </div>
                        <div>
                            <h5
                                class="modal-title fw-bold text-white mb-0"
                                id="adminDashboardModalLabel"
                            >
                                Dashboard Admin Management
                            </h5>
                            <small class="text-slate-400">
                                Kelola Proyek Showcase & Data Master Platform
                                Akreditasi
                            </small>
                        </div>
                    </div>

                    <div class="d-flex align-items-center gap-2">
                        <button
                            type="button"
                            class="btn btn-outline-danger btn-sm rounded-pill px-3 py-1.5 d-flex align-items-center gap-1.5"
                            @click="handleLogout"
                        >
                            <span>Logout</span>
                        </button>
                        <button
                            type="button"
                            class="btn-close btn-close-white opacity-75 ms-2"
                            @click="$emit('close')"
                        ></button>
                    </div>
                </div>

                <!-- Admin Navigation Tabs -->
                <ul
                    class="nav nav-tabs border-secondary border-opacity-20 px-4 pt-3 bg-dark bg-opacity-60"
                >
                    <li class="nav-item">
                        <button
                            class="nav-link"
                            :class="{ active: currentTab === 'projects' }"
                            @click="switchTab('projects')"
                        >
                            <i class="bi bi-box-seam me-1.5"></i> Kelola Proyek
                            ({{ internalProjects.length }})
                        </button>
                    </li>
                    <li class="nav-item">
                        <button
                            class="nav-link"
                            :class="{ active: currentTab === 'supervisors' }"
                            @click="switchTab('supervisors')"
                        >
                            <i class="bi bi-person-badge me-1.5"></i> Master
                            Dosen Pembimbing ({{ supervisorsList.length }})
                        </button>
                    </li>
                    <li class="nav-item">
                        <button
                            class="nav-link"
                            :class="{ active: currentTab === 'types' }"
                            @click="switchTab('types')"
                        >
                            <i class="bi bi-layers me-1.5"></i> Master Tipe
                            Proyek ({{ projectTypesList.length }})
                        </button>
                    </li>
                    <li class="nav-item">
                        <button
                            class="nav-link"
                            :class="{ active: currentTab === 'fields' }"
                            @click="switchTab('fields')"
                        >
                            <i class="bi bi-cpu me-1.5"></i> Master Bidang
                            Teknologi ({{ techFieldsList.length }})
                        </button>
                    </li>
                </ul>

                <!-- Dashboard Toolbar -->
                <div
                    class="p-4 bg-dark bg-opacity-40 border-bottom border-secondary border-opacity-20 d-flex flex-wrap align-items-center justify-content-between gap-3"
                >
                    <!-- Search Field -->
                    <div class="input-group" style="max-width: 380px">
                        <span
                            class="input-group-text bg-dark border-secondary text-info"
                        >
                            <i class="bi bi-search"></i>
                        </span>
                        <input
                            type="text"
                            class="form-control bg-dark text-white border-secondary"
                            :placeholder="getSearchPlaceholder"
                            v-model="searchQuery"
                        />
                    </div>

                    <!-- Actions Button -->
                    <div class="d-flex align-items-center gap-2">
                        <button
                            v-if="currentTab === 'projects'"
                            type="button"
                            class="btn btn-primary rounded-3 px-3 py-2 fw-bold d-flex align-items-center gap-2 shadow-sm"
                            style="
                                background: linear-gradient(
                                    135deg,
                                    #10b981 0%,
                                    #059669 100%
                                );
                                border: none;
                            "
                            @click="openAddModal"
                        >
                            <i class="bi bi-plus-lg fs-6"></i>
                            <span>Tambah Proyek Baru</span>
                        </button>

                        <button
                            v-else-if="currentTab === 'supervisors'"
                            type="button"
                            class="btn btn-info text-dark rounded-3 px-3 py-2 fw-bold d-flex align-items-center gap-2 shadow-sm"
                            @click="openSupervisorModal()"
                        >
                            <i class="bi bi-plus-lg fs-6"></i>
                            <span>Tambah Dosen Pembimbing</span>
                        </button>

                        <button
                            v-else-if="currentTab === 'types'"
                            type="button"
                            class="btn btn-warning text-dark rounded-3 px-3 py-2 fw-bold d-flex align-items-center gap-2 shadow-sm"
                            @click="openTypeModal()"
                        >
                            <i class="bi bi-plus-lg fs-6"></i>
                            <span>Tambah Tipe Proyek</span>
                        </button>

                        <button
                            v-else-if="currentTab === 'fields'"
                            type="button"
                            class="btn btn-purple text-white rounded-3 px-3 py-2 fw-bold d-flex align-items-center gap-2 shadow-sm"
                            style="background: #a855f7; border: none"
                            @click="openFieldModal()"
                        >
                            <i class="bi bi-plus-lg fs-6"></i>
                            <span>Tambah Bidang Teknologi</span>
                        </button>
                    </div>
                </div>

                <!-- Dashboard Content Body -->
                <div class="modal-body p-4 text-white">
                    <!-- Status Notification -->
                    <div
                        v-if="statusMessage"
                        class="alert alert-success border-0 rounded-3 d-flex align-items-center justify-content-between py-2.5 px-3 mb-3"
                        style="
                            background: rgba(34, 197, 94, 0.2);
                            color: #86efac;
                            border: 1px solid rgba(34, 197, 94, 0.3) !important;
                        "
                    >
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill fs-6"></i>
                            <div>{{ statusMessage }}</div>
                        </div>
                        <button
                            type="button"
                            class="btn-close btn-close-white btn-sm"
                            @click="statusMessage = ''"
                        ></button>
                    </div>

                    <div v-if="loading" class="text-center py-5">
                        <div
                            class="spinner-border text-info mb-2"
                            role="status"
                        ></div>
                        <p class="text-slate-300 small">Memuat data...</p>
                    </div>

                    <!-- TAB 1: PROJECTS TABLE -->
                    <div v-else-if="currentTab === 'projects'">
                        <div
                            v-if="filteredProjects.length === 0"
                            class="text-center py-5"
                        >
                            <i
                                class="bi bi-inbox fs-1 text-slate-400 d-block mb-2"
                            ></i>
                            <h6 class="text-white fw-bold">
                                Tidak Ada Data Proyek
                            </h6>
                            <p class="text-slate-300 small mb-3">
                                Tidak ada proyek yang sesuai dengan kata kunci
                                pencarian Anda.
                            </p>
                            <button
                                type="button"
                                class="btn btn-sm btn-outline-info rounded-pill"
                                @click="openAddModal"
                            >
                                + Tambah Proyek Pertama
                            </button>
                        </div>

                        <div
                            v-else
                            class="table-responsive rounded-3 border border-secondary border-opacity-30 overflow-hidden"
                        >
                            <table
                                class="table table-dark table-hover align-middle mb-0"
                                style="background: rgba(15, 23, 42, 0.5)"
                            >
                                <thead>
                                    <tr
                                        class="text-slate-300 border-bottom border-secondary border-opacity-30 extra-small text-uppercase"
                                    >
                                        <th
                                            style="width: 60px"
                                            class="ps-4 py-3 text-center"
                                        >
                                            No
                                        </th>
                                        <th
                                            style="width: 38%"
                                            class="py-3 ps-2"
                                        >
                                            Proyek &amp; Bidang Field
                                        </th>
                                        <th style="width: 20%" class="py-3">
                                            Pembimbing
                                        </th>
                                        <th style="width: 14%" class="py-3">
                                            Anggota
                                        </th>
                                        <th style="width: 12%" class="py-3">
                                            Laporan PDF
                                        </th>
                                        <th
                                            style="width: 16%"
                                            class="text-center pe-4 py-3"
                                        >
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(
                                            project, index
                                        ) in paginatedProjects"
                                        :key="project.id"
                                        class="border-bottom border-secondary border-opacity-10"
                                    >
                                        <td
                                            class="text-slate-300 small font-monospace ps-4 py-3 text-center fw-bold"
                                        >
                                            {{
                                                (currentPage - 1) * perPage +
                                                index +
                                                1
                                            }}
                                        </td>
                                        <td class="py-3 ps-2">
                                            <div
                                                class="d-flex align-items-center gap-3"
                                            >
                                                <div
                                                    class="rounded-3 overflow-hidden bg-dark border border-secondary border-opacity-40 d-flex align-items-center justify-content-center shadow-sm"
                                                    style="
                                                        width: 44px;
                                                        height: 44px;
                                                        min-width: 44px;
                                                    "
                                                >
                                                    <img
                                                        v-if="project.logo"
                                                        :src="project.logo"
                                                        class="w-100 h-100 object-fit-contain p-1"
                                                    />
                                                    <i
                                                        v-else
                                                        class="bi bi-box-seam text-secondary fs-5"
                                                    ></i>
                                                </div>
                                                <div>
                                                    <div
                                                        class="fw-bold text-white mb-1"
                                                        style="
                                                            font-size: 0.95rem;
                                                            line-height: 1.3;
                                                        "
                                                    >
                                                        {{ project.name }}
                                                    </div>
                                                    <div
                                                        class="d-flex align-items-center gap-2"
                                                    >
                                                        <span
                                                            class="badge extra-small px-2 py-0.5 rounded-pill"
                                                            :style="
                                                                getTechFieldStyle(
                                                                    project.tech_field,
                                                                )
                                                            "
                                                        >
                                                            <i
                                                                class="bi bi-tag-fill me-1"
                                                                style="
                                                                    font-size: 0.65rem;
                                                                "
                                                            ></i>
                                                            {{
                                                                project.tech_field ||
                                                                "Others"
                                                            }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-3">
                                            <span
                                                class="fw-semibold text-slate-200 small"
                                                >{{
                                                    project.supervisor || "-"
                                                }}</span
                                            >
                                        </td>
                                        <td class="py-3">
                                            <span
                                                class="badge bg-dark bg-opacity-75 border border-secondary border-opacity-40 text-slate-200 extra-small px-2.5 py-1 rounded-pill"
                                            >
                                                <i
                                                    class="bi bi-people-fill me-1 text-info opacity-75"
                                                ></i>
                                                {{
                                                    project.team_members
                                                        ? project.team_members
                                                              .length
                                                        : 0
                                                }}
                                                Anggota
                                            </span>
                                        </td>
                                        <td class="py-3">
                                            <span
                                                v-if="project.pdf_report"
                                                class="badge bg-success bg-opacity-15 text-success border border-success border-opacity-30 extra-small px-2.5 py-1 rounded-pill d-inline-flex align-items-center gap-1"
                                            >
                                                <i
                                                    class="bi bi-file-earmark-pdf-fill"
                                                ></i>
                                                Ada PDF
                                            </span>
                                            <span
                                                v-else
                                                class="badge bg-secondary bg-opacity-15 text-slate-400 border border-secondary border-opacity-20 extra-small px-2.5 py-1 rounded-pill"
                                                >Tidak Ada</span
                                            >
                                        </td>
                                        <td class="text-center pe-4 py-3">
                                            <div
                                                class="d-flex align-items-center justify-content-center gap-2"
                                            >
                                                <button
                                                    type="button"
                                                    class="btn btn-sm btn-outline-warning px-2.5 py-1.5 rounded-3 d-inline-flex align-items-center gap-1"
                                                    title="Edit Proyek"
                                                    @click="
                                                        openEditModal(project)
                                                    "
                                                >
                                                    <i
                                                        class="bi bi-pencil-square"
                                                    ></i>
                                                    <span
                                                        class="extra-small fw-semibold"
                                                        >Edit</span
                                                    >
                                                </button>
                                                <button
                                                    type="button"
                                                    class="btn btn-sm btn-outline-danger px-2.5 py-1.5 rounded-3 d-inline-flex align-items-center gap-1"
                                                    title="Hapus Proyek"
                                                    @click="
                                                        confirmDelete(project)
                                                    "
                                                >
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Projects Pagination -->
                        <div
                            v-if="filteredProjects.length > perPage"
                            class="d-flex flex-column flex-sm-row justify-content-between align-items-center p-3 border-top border-secondary border-opacity-20 gap-3"
                        >
                            <div class="text-slate-300 small fw-medium">
                                {{ paginationInfo }}
                            </div>
                            <ul class="pagination pagination-custom mb-0">
                                <li
                                    class="page-item"
                                    :class="{ disabled: currentPage === 1 }"
                                >
                                    <button
                                        class="page-link"
                                        @click="goToPage(currentPage - 1)"
                                        :disabled="currentPage === 1"
                                    >
                                        Prev
                                    </button>
                                </li>
                                <li
                                    v-for="p in totalPages"
                                    :key="p"
                                    class="page-item"
                                    :class="{ active: currentPage === p }"
                                >
                                    <button
                                        class="page-link"
                                        @click="goToPage(p)"
                                    >
                                        {{ p }}
                                    </button>
                                </li>
                                <li
                                    class="page-item"
                                    :class="{
                                        disabled: currentPage === totalPages,
                                    }"
                                >
                                    <button
                                        class="page-link"
                                        @click="goToPage(currentPage + 1)"
                                        :disabled="currentPage === totalPages"
                                    >
                                        Next
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- TAB 2: SUPERVISORS TABLE -->
                    <div v-else-if="currentTab === 'supervisors'">
                        <div
                            v-if="supervisorsList.length === 0"
                            class="text-center py-5"
                        >
                            <h6 class="text-white fw-bold">
                                Belum Ada Data Dosen Pembimbing
                            </h6>
                            <button
                                type="button"
                                class="btn btn-sm btn-info rounded-pill mt-2"
                                @click="openSupervisorModal()"
                            >
                                + Tambah Dosen
                            </button>
                        </div>
                        <div
                            v-else
                            class="table-responsive rounded-3 border border-secondary border-opacity-30 overflow-hidden"
                        >
                            <table
                                class="table table-dark table-hover align-middle mb-0"
                            >
                                <thead>
                                    <tr
                                        class="text-slate-300 border-bottom border-secondary border-opacity-30 extra-small text-uppercase"
                                    >
                                        <th
                                            class="ps-4 py-3"
                                            style="width: 70px"
                                        >
                                            No
                                        </th>
                                        <th class="py-3" style="width: 140px">
                                            Kode (Inisial)
                                        </th>
                                        <th class="py-3">
                                            Nama Dosen &amp; Gelar
                                        </th>
                                        <th
                                            class="text-center pe-4 py-3"
                                            style="width: 160px"
                                        >
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(sup, idx) in supervisorsList"
                                        :key="sup.id"
                                        class="border-bottom border-secondary border-opacity-10"
                                    >
                                        <td
                                            class="ps-4 py-3 text-slate-400 font-monospace"
                                        >
                                            {{ idx + 1 }}
                                        </td>
                                        <td class="py-3">
                                            <span
                                                class="badge bg-info bg-opacity-20 text-dark font-monospace border border-info border-opacity-30 px-2.5 py-1"
                                                >{{ sup.code }}</span
                                            >
                                        </td>
                                        <td class="py-3 fw-bold text-white">
                                            {{ sup.name }}
                                        </td>
                                        <td class="text-center pe-4 py-3">
                                            <div
                                                class="d-flex align-items-center justify-content-center gap-2"
                                            >
                                                <button
                                                    type="button"
                                                    class="btn btn-sm btn-outline-warning px-2.5 py-1.5 rounded-3"
                                                    @click="
                                                        openSupervisorModal(sup)
                                                    "
                                                >
                                                    <i
                                                        class="bi bi-pencil-square"
                                                    ></i>
                                                    Edit
                                                </button>
                                                <button
                                                    type="button"
                                                    class="btn btn-sm btn-outline-danger px-2.5 py-1.5 rounded-3"
                                                    @click="
                                                        confirmDeleteSupervisor(
                                                            sup,
                                                        )
                                                    "
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

                    <!-- TAB 3: PROJECT TYPES TABLE -->
                    <div v-else-if="currentTab === 'types'">
                        <div
                            v-if="projectTypesList.length === 0"
                            class="text-center py-5"
                        >
                            <h6 class="text-white fw-bold">
                                Belum Ada Data Tipe Proyek
                            </h6>
                            <button
                                type="button"
                                class="btn btn-sm btn-warning rounded-pill mt-2"
                                @click="openTypeModal()"
                            >
                                + Tambah Tipe
                            </button>
                        </div>
                        <div
                            v-else
                            class="table-responsive rounded-3 border border-secondary border-opacity-30 overflow-hidden"
                        >
                            <table
                                class="table table-dark table-hover align-middle mb-0"
                            >
                                <thead>
                                    <tr
                                        class="text-slate-300 border-bottom border-secondary border-opacity-30 extra-small text-uppercase"
                                    >
                                        <th class="ps-4 py-3">ID</th>
                                        <th class="py-3">Nama Tipe Platform</th>
                                        <th class="text-center pe-4 py-3">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="t in projectTypesList"
                                        :key="t.id"
                                        class="border-bottom border-secondary border-opacity-10"
                                    >
                                        <td
                                            class="ps-4 py-3 text-slate-400 font-monospace"
                                        >
                                            {{ t.id }}
                                        </td>
                                        <td class="py-3 fw-bold text-white">
                                            {{ t.name }}
                                        </td>
                                        <td class="text-center pe-4 py-3">
                                            <div
                                                class="d-flex align-items-center justify-content-center gap-2"
                                            >
                                                <button
                                                    type="button"
                                                    class="btn btn-sm btn-outline-warning px-2.5 py-1.5 rounded-3"
                                                    @click="openTypeModal(t)"
                                                >
                                                    <i
                                                        class="bi bi-pencil-square"
                                                    ></i>
                                                    Edit
                                                </button>
                                                <button
                                                    type="button"
                                                    class="btn btn-sm btn-outline-danger px-2.5 py-1.5 rounded-3"
                                                    @click="
                                                        confirmDeleteType(t)
                                                    "
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

                    <!-- TAB 4: TECH FIELDS TABLE -->
                    <div v-else-if="currentTab === 'fields'">
                        <div
                            v-if="techFieldsList.length === 0"
                            class="text-center py-5"
                        >
                            <h6 class="text-white fw-bold">
                                Belum Ada Data Bidang Teknologi
                            </h6>
                            <button
                                type="button"
                                class="btn btn-sm btn-purple text-white rounded-pill mt-2"
                                @click="openFieldModal()"
                            >
                                + Tambah Bidang
                            </button>
                        </div>
                        <div
                            v-else
                            class="table-responsive rounded-3 border border-secondary border-opacity-30 overflow-hidden"
                        >
                            <table
                                class="table table-dark table-hover align-middle mb-0"
                            >
                                <thead>
                                    <tr
                                        class="text-slate-300 border-bottom border-secondary border-opacity-30 extra-small text-uppercase"
                                    >
                                        <th class="ps-4 py-3">ID</th>
                                        <th class="py-3">Slug</th>
                                        <th class="py-3">
                                            Nama Bidang Teknologi
                                        </th>
                                        <th class="py-3">
                                            Preview Badge Color
                                        </th>
                                        <th class="text-center pe-4 py-3">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="f in techFieldsList"
                                        :key="f.id"
                                        class="border-bottom border-secondary border-opacity-10"
                                    >
                                        <td
                                            class="ps-4 py-3 text-slate-400 font-monospace"
                                        >
                                            {{ f.id }}
                                        </td>
                                        <td class="py-3 fw-bold text-white">
                                            {{ f.name }}
                                        </td>
                                        <td class="py-3">
                                            <span
                                                class="badge px-3 py-1 rounded-pill"
                                                :style="
                                                    'background: transparent !important; border: 1px solid ' +
                                                    (f.color_code ||
                                                        '#38bdf8') +
                                                    ' !important; color: ' +
                                                    (f.color_code ||
                                                        '#38bdf8') +
                                                    ' !important;'
                                                "
                                            >
                                                {{ f.name }}
                                            </span>
                                        </td>
                                        <td class="text-center pe-4 py-3">
                                            <div
                                                class="d-flex align-items-center justify-content-center gap-2"
                                            >
                                                <button
                                                    type="button"
                                                    class="btn btn-sm btn-outline-warning px-2.5 py-1.5 rounded-3"
                                                    @click="openFieldModal(f)"
                                                >
                                                    <i
                                                        class="bi bi-pencil-square"
                                                    ></i>
                                                    Edit
                                                </button>
                                                <button
                                                    type="button"
                                                    class="btn btn-sm btn-outline-danger px-2.5 py-1.5 rounded-3"
                                                    @click="
                                                        confirmDeleteField(f)
                                                    "
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
        </div>

        <!-- Child Modal: Add / Edit Project Form -->
        <AdminProjectFormModal
            v-if="showFormModal"
            :project-data="selectedProjectForEdit"
            @close="showFormModal = false"
            @saved="handleProjectSaved"
        />

        <!-- Confirm Delete Project Modal -->
        <div
            v-if="projectToDelete"
            class="modal fade show d-block"
            tabindex="-1"
            style="background: rgba(0, 0, 0, 0.7); z-index: 1080"
        >
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div
                    class="modal-content bg-dark text-white border-danger rounded-4 p-3 text-center"
                >
                    <i
                        class="bi bi-exclamation-triangle-fill text-danger fs-1 mb-2"
                    ></i>
                    <h6 class="fw-bold mb-2">Hapus Proyek Ini?</h6>
                    <p class="text-secondary small mb-3">
                        Apakah Anda yakin ingin menghapus
                        <strong>{{ projectToDelete.name }}</strong
                        >?
                    </p>
                    <div class="d-flex justify-content-center gap-2">
                        <button
                            type="button"
                            class="btn btn-sm btn-secondary rounded-pill px-3"
                            @click="projectToDelete = null"
                        >
                            Batal
                        </button>
                        <button
                            type="button"
                            class="btn btn-sm btn-danger rounded-pill px-3"
                            @click="executeDelete"
                        >
                            Hapus Sekarang
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Form Supervisor -->
        <div
            v-if="showSupervisorModal"
            class="modal fade show d-block"
            tabindex="-1"
            style="background: rgba(0, 0, 0, 0.75); z-index: 1085"
        >
            <div class="modal-dialog modal-dialog-centered">
                <div
                    class="modal-content bg-dark text-white border border-info rounded-4 p-4"
                >
                    <div
                        class="d-flex justify-content-between align-items-center mb-3"
                    >
                        <h5 class="fw-bold mb-0 text-info">
                            {{
                                supervisorForm.id
                                    ? "Edit Dosen Pembimbing"
                                    : "Tambah Dosen Pembimbing"
                            }}
                        </h5>
                        <button
                            type="button"
                            class="btn-close btn-close-white"
                            @click="showSupervisorModal = false"
                        ></button>
                    </div>
                    <form @submit.prevent="saveSupervisor">
                        <div class="mb-3">
                            <label class="form-label small text-slate-300"
                                >Kode Singkat (Inisial)</label
                            >
                            <input
                                type="text"
                                class="form-control bg-dark text-white border-secondary"
                                placeholder="Contoh: MDB"
                                v-model="supervisorForm.code"
                                required
                            />
                        </div>
                        <div class="mb-4">
                            <label class="form-label small text-slate-300"
                                >Nama Lengkap &amp; Gelar</label
                            >
                            <input
                                type="text"
                                class="form-control bg-dark text-white border-secondary"
                                placeholder="Contoh: Muhammad Adib Kamali, S.T., M.Eng"
                                v-model="supervisorForm.name"
                                required
                            />
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <button
                                type="button"
                                class="btn btn-sm btn-secondary rounded-pill px-3"
                                @click="showSupervisorModal = false"
                            >
                                Batal
                            </button>
                            <button
                                type="submit"
                                class="btn btn-sm btn-info rounded-pill px-4 font-weight-bold"
                            >
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Form Project Type -->
        <div
            v-if="showTypeModal"
            class="modal fade show d-block"
            tabindex="-1"
            style="background: rgba(0, 0, 0, 0.75); z-index: 1085"
        >
            <div class="modal-dialog modal-dialog-centered">
                <div
                    class="modal-content bg-dark text-white border border-warning rounded-4 p-4"
                >
                    <div
                        class="d-flex justify-content-between align-items-center mb-3"
                    >
                        <h5 class="fw-bold mb-0 text-warning">
                            {{
                                typeForm.id
                                    ? "Edit Tipe Proyek"
                                    : "Tambah Tipe Proyek"
                            }}
                        </h5>
                        <button
                            type="button"
                            class="btn-close btn-close-white"
                            @click="showTypeModal = false"
                        ></button>
                    </div>
                    <form @submit.prevent="saveType">
                        <div class="mb-4">
                            <label class="form-label small text-slate-300"
                                >Nama Tipe Platform</label
                            >
                            <input
                                type="text"
                                class="form-control bg-dark text-white border-secondary"
                                placeholder="Contoh: Desktop-Based"
                                v-model="typeForm.name"
                                required
                            />
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <button
                                type="button"
                                class="btn btn-sm btn-secondary rounded-pill px-3"
                                @click="showTypeModal = false"
                            >
                                Batal
                            </button>
                            <button
                                type="submit"
                                class="btn btn-sm btn-warning rounded-pill px-4 font-weight-bold"
                            >
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Form Tech Field -->
        <div
            v-if="showFieldModal"
            class="modal fade show d-block"
            tabindex="-1"
            style="background: rgba(0, 0, 0, 0.75); z-index: 1085"
        >
            <div class="modal-dialog modal-dialog-centered">
                <div
                    class="modal-content bg-dark text-white border border-purple rounded-4 p-4"
                >
                    <div
                        class="d-flex justify-content-between align-items-center mb-3"
                    >
                        <h5 class="fw-bold mb-0 text-purple">
                            {{
                                fieldForm.id
                                    ? "Edit Bidang Teknologi"
                                    : "Tambah Bidang Teknologi"
                            }}
                        </h5>
                        <button
                            type="button"
                            class="btn-close btn-close-white"
                            @click="showFieldModal = false"
                        ></button>
                    </div>
                    <form @submit.prevent="saveField">
                        <div class="mb-3">
                            <label class="form-label small text-slate-300"
                                >Nama Bidang Teknologi</label
                            >
                            <input
                                type="text"
                                class="form-control bg-dark text-white border-secondary"
                                placeholder="Contoh: Cloud Computing & Big Data"
                                v-model="fieldForm.name"
                                required
                            />
                        </div>
                        <div class="mb-4">
                            <label class="form-label small text-slate-300"
                                >Warna Accent Neon / Hex Code</label
                            >
                            <div class="d-flex gap-2 align-items-center">
                                <input
                                    type="color"
                                    class="form-control form-control-color bg-dark border-secondary"
                                    v-model="fieldForm.color_code"
                                    style="width: 50px"
                                />
                                <input
                                    type="text"
                                    class="form-control bg-dark text-white border-secondary"
                                    placeholder="#38bdf8"
                                    v-model="fieldForm.color_code"
                                />
                            </div>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <button
                                type="button"
                                class="btn btn-sm btn-secondary rounded-pill px-3"
                                @click="showFieldModal = false"
                            >
                                Batal
                            </button>
                            <button
                                type="submit"
                                class="btn btn-sm btn-purple text-white rounded-pill px-4 font-weight-bold"
                                style="background: #a855f7"
                            >
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import AdminProjectFormModal from "./AdminProjectFormModal.vue";

export default {
    name: "AdminDashboardModal",
    components: {
        AdminProjectFormModal,
    },
    props: {
        projects: {
            type: Array,
            default: () => [],
        },
    },
    emits: ["close", "logout", "refresh-projects"],
    data() {
        return {
            currentTab: "projects", // 'projects' | 'supervisors' | 'types' | 'fields'
            searchQuery: "",
            loading: false,
            statusMessage: "",

            // Projects State
            showFormModal: false,
            selectedProjectForEdit: null,
            projectToDelete: null,
            internalProjects: [...this.projects],

            // Supervisors State
            supervisorsList: [],
            showSupervisorModal: false,
            supervisorForm: {
                id: null,
                code: "",
                name: "",
            },

            // Project Types State
            projectTypesList: [],
            showTypeModal: false,
            typeForm: { id: null, name: "" },

            // Tech Fields State
            techFieldsList: [],
            showFieldModal: false,
            fieldForm: { id: null, name: "", color_code: "#38bdf8" },

            currentPage: 1,
            perPage: 12,
        };
    },
    watch: {
        searchQuery() {
            this.currentPage = 1;
        },
    },
    computed: {
        getSearchPlaceholder() {
            if (this.currentTab === "projects")
                return "Cari nama proyek, pembimbing, atau tipe...";
            if (this.currentTab === "supervisors")
                return "Cari dosen pembimbing...";
            if (this.currentTab === "types") return "Cari tipe proyek...";
            return "Cari bidang teknologi...";
        },
        totalPages() {
            return Math.ceil(this.filteredProjects.length / this.perPage) || 1;
        },
        paginatedProjects() {
            const start = (this.currentPage - 1) * this.perPage;
            const end = start + this.perPage;
            return this.filteredProjects.slice(start, end);
        },
        paginationInfo() {
            if (this.filteredProjects.length === 0) return "Menampilkan 0 data";
            const start = (this.currentPage - 1) * this.perPage + 1;
            const end = Math.min(
                this.currentPage * this.perPage,
                this.filteredProjects.length,
            );
            return `Menampilkan ${start} - ${end} dari ${this.filteredProjects.length} proyek`;
        },
        filteredProjects() {
            if (!this.searchQuery.trim()) {
                return this.internalProjects;
            }
            const query = this.searchQuery.toLowerCase();
            return this.internalProjects.filter((p) => {
                return (
                    (p.name && p.name.toLowerCase().includes(query)) ||
                    (p.supervisor &&
                        p.supervisor.toLowerCase().includes(query)) ||
                    (p.type && p.type.toLowerCase().includes(query)) ||
                    (p.tech_field && p.tech_field.toLowerCase().includes(query))
                );
            });
        },
    },
    mounted() {
        this.fetchProjects();
        this.fetchSupervisors();
        this.fetchProjectTypes();
        this.fetchTechFields();
    },
    methods: {
        switchTab(tab) {
            this.currentTab = tab;
            this.searchQuery = "";
            this.currentPage = 1;
            this.statusMessage = "";
            if (tab === "supervisors") this.fetchSupervisors();
            if (tab === "types") this.fetchProjectTypes();
            if (tab === "fields") this.fetchTechFields();
        },
        goToPage(page) {
            if (page < 1 || page > this.totalPages) return;
            this.currentPage = page;
        },
        // --- PROJECTS METHODS ---
        async fetchProjects() {
            this.loading = true;
            try {
                const response = await axios.get("/api/admin/projects");
                this.internalProjects = response.data;
            } catch (error) {
                console.error("Error fetching admin projects:", error);
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
            this.$emit("refresh-projects");
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
                this.$emit("refresh-projects");
            } catch (error) {
                console.error("Error deleting project:", error);
                alert("Gagal menghapus proyek.");
            }
        },

        // --- SUPERVISORS CRUD ---
        async fetchSupervisors() {
            try {
                const response = await axios.get("/api/admin/supervisors");
                this.supervisorsList = response.data;
            } catch (error) {
                console.error("Error fetching supervisors:", error);
            }
        },
        openSupervisorModal(sup = null) {
            if (sup) {
                this.supervisorForm = { ...sup };
            } else {
                this.supervisorForm = {
                    id: null,
                    code: "",
                    name: "",
                };
            }
            this.showSupervisorModal = true;
        },
        async saveSupervisor() {
            try {
                if (this.supervisorForm.id) {
                    await axios.put(
                        `/api/admin/supervisors/${this.supervisorForm.id}`,
                        this.supervisorForm,
                    );
                    this.statusMessage = `Dosen '${this.supervisorForm.name}' berhasil diperbarui.`;
                } else {
                    await axios.post(
                        "/api/admin/supervisors",
                        this.supervisorForm,
                    );
                    this.statusMessage = `Dosen '${this.supervisorForm.name}' berhasil ditambahkan.`;
                }
                this.showSupervisorModal = false;
                this.fetchSupervisors();
            } catch (error) {
                console.error("Error saving supervisor:", error);
                alert(
                    error.response?.data?.message ||
                        "Gagal menyimpan Dosen Pembimbing.",
                );
            }
        },
        async confirmDeleteSupervisor(sup) {
            if (
                confirm(`Yakin ingin menghapus Dosen Pembimbing '${sup.name}'?`)
            ) {
                try {
                    await axios.delete(`/api/admin/supervisors/${sup.id}`);
                    this.statusMessage = `Dosen '${sup.name}' berhasil dihapus.`;
                    this.fetchSupervisors();
                } catch (error) {
                    console.error("Error deleting supervisor:", error);
                    alert("Gagal menghapus Dosen Pembimbing.");
                }
            }
        },

        // --- PROJECT TYPES CRUD ---
        async fetchProjectTypes() {
            try {
                const response = await axios.get("/api/admin/project-types");
                this.projectTypesList = response.data;
            } catch (error) {
                console.error("Error fetching project types:", error);
            }
        },
        openTypeModal(t = null) {
            if (t) {
                this.typeForm = { ...t };
            } else {
                this.typeForm = { id: null, name: "" };
            }
            this.showTypeModal = true;
        },
        async saveType() {
            try {
                if (this.typeForm.id) {
                    await axios.put(
                        `/api/admin/project-types/${this.typeForm.id}`,
                        this.typeForm,
                    );
                    this.statusMessage = `Tipe Proyek '${this.typeForm.name}' berhasil diperbarui.`;
                } else {
                    await axios.post("/api/admin/project-types", this.typeForm);
                    this.statusMessage = `Tipe Proyek '${this.typeForm.name}' berhasil ditambahkan.`;
                }
                this.showTypeModal = false;
                this.fetchProjectTypes();
            } catch (error) {
                console.error("Error saving project type:", error);
                alert(
                    error.response?.data?.message ||
                        "Gagal menyimpan Tipe Proyek.",
                );
            }
        },
        async confirmDeleteType(t) {
            if (confirm(`Yakin ingin menghapus Tipe Proyek '${t.name}'?`)) {
                try {
                    await axios.delete(`/api/admin/project-types/${t.id}`);
                    this.statusMessage = `Tipe Proyek '${t.name}' berhasil dihapus.`;
                    this.fetchProjectTypes();
                } catch (error) {
                    console.error("Error deleting project type:", error);
                    alert("Gagal menghapus Tipe Proyek.");
                }
            }
        },

        // --- TECH FIELDS CRUD ---
        async fetchTechFields() {
            try {
                const response = await axios.get("/api/admin/tech-fields");
                this.techFieldsList = response.data;
            } catch (error) {
                console.error("Error fetching tech fields:", error);
            }
        },
        openFieldModal(f = null) {
            if (f) {
                this.fieldForm = { ...f };
            } else {
                this.fieldForm = {
                    id: null,
                    name: "",
                    color_code: "#38bdf8",
                };
            }
            this.showFieldModal = true;
        },
        async saveField() {
            try {
                if (this.fieldForm.id) {
                    await axios.put(
                        `/api/admin/tech-fields/${this.fieldForm.id}`,
                        this.fieldForm,
                    );
                    this.statusMessage = `Bidang Teknologi '${this.fieldForm.name}' berhasil diperbarui.`;
                } else {
                    await axios.post("/api/admin/tech-fields", this.fieldForm);
                    this.statusMessage = `Bidang Teknologi '${this.fieldForm.name}' berhasil ditambahkan.`;
                }
                this.showFieldModal = false;
                this.fetchTechFields();
            } catch (error) {
                console.error("Error saving tech field:", error);
                alert(
                    error.response?.data?.message ||
                        "Gagal menyimpan Bidang Teknologi.",
                );
            }
        },
        async confirmDeleteField(f) {
            if (
                confirm(`Yakin ingin menghapus Bidang Teknologi '${f.name}'?`)
            ) {
                try {
                    await axios.delete(`/api/admin/tech-fields/${f.id}`);
                    this.statusMessage = `Bidang Teknologi '${f.name}' berhasil dihapus.`;
                    this.fetchTechFields();
                } catch (error) {
                    console.error("Error deleting tech field:", error);
                    alert("Gagal menghapus Bidang Teknologi.");
                }
            }
        },

        getTechFieldStyle(field) {
            switch (field) {
                case "AI":
                    return "background: transparent !important; border: 1px solid rgba(56, 189, 248, 0.5) !important; color: #38bdf8 !important;";
                case "IoT":
                    return "background: transparent !important; border: 1px solid rgba(52, 211, 153, 0.5) !important; color: #34d399 !important;";
                case "VR/AR":
                    return "background: transparent !important; border: 1px solid rgba(192, 132, 252, 0.5) !important; color: #c084fc !important;";
                case "Networking & Cyber Security":
                    return "background: transparent !important; border: 1px solid rgba(251, 191, 36, 0.5) !important; color: #fbbf24 !important;";
                default:
                    return "background: transparent !important; border: 1px solid rgba(203, 213, 225, 0.45) !important; color: #cbd5e1 !important;";
            }
        },
        async handleLogout() {
            try {
                await axios.post("/api/admin/logout");
            } catch (error) {
                console.error("Logout error:", error);
            } finally {
                this.$emit("logout");
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
