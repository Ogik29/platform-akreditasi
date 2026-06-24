<template>
  <div class="modal fade" id="projectDetailModal" tabindex="-1" aria-labelledby="projectDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content modal-content-glass" v-if="project">
        <!-- Modal Header -->
        <div class="modal-header border-0 pb-0">
          <div class="d-flex align-items-center">
            <div class="me-3 bg-dark rounded-circle p-2 d-flex justify-content-center align-items-center" style="width: 50px; height: 50px;">
              <span class="fs-4 fw-bold text-info">{{ project.name.substring(0, 2).toUpperCase() }}</span>
            </div>
            <div>
              <h4 class="modal-title fw-bold text-white mb-0" id="projectDetailModalLabel">{{ project.name }}</h4>
              <small class="text-info">{{ project.tagline }}</small>
            </div>
          </div>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!-- Modal Body -->
        <div class="modal-body py-4">
          <!-- Badges Section -->
          <div class="d-flex flex-wrap gap-2 mb-4">
            <span class="badge badge-supervisor">Dosen: {{ project.supervisor }}</span>
            <span :class="['badge', getTypeBadgeClass(project.type)]">
              {{ formatType(project.type) }}
            </span>
            <span class="badge badge-tkt">TKT Level: {{ project.tkt }}</span>
            <span class="badge bg-secondary text-light text-capitalize">Demo: {{ project.demo_level }}</span>
          </div>

          <!-- Description -->
          <div class="mb-4">
            <h5 class="fw-semibold text-white border-bottom border-secondary pb-2">Deskripsi Proyek</h5>
            <p class="text-secondary leading-relaxed mb-0">{{ project.description }}</p>
          </div>

          <div class="row">
            <!-- Features (Fitur Unggulan) -->
            <div class="col-md-6 mb-4">
              <h5 class="fw-semibold text-white border-bottom border-secondary pb-2">Fitur Unggulan</h5>
              <ul class="list-unstyled mb-0">
                <li v-for="(feature, idx) in project.features" :key="idx" class="d-flex align-items-start mb-2 text-secondary">
                  <span class="text-info me-2">✦</span>
                  <span>{{ feature }}</span>
                </li>
              </ul>
            </div>

            <!-- Funding & Awards (Pendanaan & Kompetisi) -->
            <div class="col-md-6 mb-4">
              <h5 class="fw-semibold text-white border-bottom border-secondary pb-2">Pendanaan & Prestasi</h5>
              <ul class="list-unstyled mb-0">
                <li v-for="(award, idx) in project.funding_awards" :key="idx" class="d-flex align-items-start mb-2 text-secondary">
                  <span class="text-warning me-2">★</span>
                  <span>{{ award }}</span>
                </li>
              </ul>
            </div>
          </div>

          <div class="row">
            <!-- Partners (Mitra) -->
            <div class="col-md-12 mb-4">
              <h5 class="fw-semibold text-white border-bottom border-secondary pb-2">Mitra Kerjasama</h5>
              <div class="d-flex flex-wrap gap-3">
                <div v-for="(partner, idx) in project.partners" :key="idx" class="px-3 py-2 bg-dark rounded border border-secondary text-secondary">
                  🤝 {{ partner }}
                </div>
              </div>
            </div>
          </div>

          <!-- Team Members (Anggota Tim) -->
          <div class="mb-2">
            <h5 class="fw-semibold text-white border-bottom border-secondary pb-2 mb-3">Anggota Tim</h5>
            <div class="row row-cols-2 row-cols-md-4 g-3">
              <div class="col" v-for="(member, idx) in project.team_members" :key="idx">
                <div class="team-member-card h-100 d-flex flex-column align-items-center">
                  <!-- Custom Initials Avatar -->
                  <div class="team-avatar d-flex justify-content-center align-items-center text-white fw-bold fs-5 mb-2">
                    {{ member.nickname.substring(0, 2).toUpperCase() }}
                  </div>
                  <h6 class="text-white fw-bold mb-0 text-truncate w-100">{{ member.nickname }}</h6>
                  <small class="text-secondary mb-2 text-truncate w-100" style="font-size: 11px;">{{ member.fullname }}</small>
                  <span v-if="member.role" class="badge bg-dark border border-secondary text-secondary mb-3 w-100 text-truncate" style="font-size: 10px;">
                    {{ member.role }}
                  </span>
                  
                  <!-- Social Media Links -->
                  <div class="d-flex gap-2 mt-auto">
                    <a v-if="member.linkedin" :href="member.linkedin" target="_blank" class="text-info" title="LinkedIn">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                        <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
                      </svg>
                    </a>
                    <a v-if="member.social_media && member.social_media.instagram" :href="member.social_media.instagram" target="_blank" class="text-danger" title="Instagram">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer border-0">
          <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'ProjectDetailModal',
  props: {
    project: {
      type: Object,
      default: null
    }
  },
  methods: {
    getTypeBadgeClass(type) {
      if (type === 'web') return 'badge-web';
      if (type === 'mobile') return 'badge-mobile';
      if (type === 'hardware') return 'badge-hardware';
      return 'bg-secondary';
    },
    formatType(type) {
      if (type === 'web') return 'Web-Based';
      if (type === 'mobile') return 'Mobile-Based';
      if (type === 'hardware') return 'Hardware-Based';
      return type;
    }
  }
}
</script>
