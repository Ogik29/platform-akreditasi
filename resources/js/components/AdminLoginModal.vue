<template>
    <div
        class="modal fade show d-block"
        tabindex="-1"
        style="background: rgba(15, 23, 42, 0.75); backdrop-filter: blur(12px); z-index: 1065;"
        @click.self="$emit('close')"
    >
        <div class="modal-dialog modal-dialog-centered" style="max-width: 440px;">
            <div
                class="modal-content border-0 rounded-4 shadow-lg text-start overflow-hidden"
                style="background: rgba(30, 41, 59, 0.95); border: 1px solid rgba(255, 255, 255, 0.15) !important;"
            >
                <!-- Modal Header -->
                <div class="modal-header border-0 pb-0 pt-4 px-4 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-2">
                        <div
                            class="rounded-3 p-2 d-flex align-items-center justify-content-center"
                            style="background: rgba(56, 189, 248, 0.15); color: #38bdf8; width: 40px; height: 40px;"
                        >
                            <i class="bi bi-shield-lock-fill fs-5"></i>
                        </div>
                        <div>
                            <h5 class="modal-title text-white fw-bold mb-0" style="font-size: 1.15rem;">Login Administrator</h5>
                            <span class="text-secondary small">Masuk untuk mengelola data proyek</span>
                        </div>
                    </div>
                    <button
                        type="button"
                        class="btn-close btn-close-white opacity-75"
                        @click="$emit('close')"
                        aria-label="Close"
                    ></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body p-4">
                    <!-- Error Alert -->
                    <div
                        v-if="errorMessage"
                        class="alert alert-danger border-0 rounded-3 d-flex align-items-center gap-2 small py-2 px-3 mb-3"
                        style="background: rgba(239, 68, 68, 0.2); color: #fca5a5; border: 1px solid rgba(239, 68, 68, 0.3) !important;"
                    >
                        <i class="bi bi-exclamation-triangle-fill fs-6"></i>
                        <div>{{ errorMessage }}</div>
                    </div>

                    <form @submit.prevent="handleLogin">
                        <!-- Email Input -->
                        <div class="mb-3">
                            <label class="form-label text-slate-300 small fw-semibold text-white mb-1">
                                Email Administrator
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark border-secondary text-secondary">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input
                                    type="email"
                                    class="form-control bg-dark text-white border-secondary"
                                    placeholder="admin@example.com"
                                    v-model="email"
                                    required
                                    :disabled="loading"
                                />
                            </div>
                        </div>

                        <!-- Password Input -->
                        <div class="mb-4">
                            <label class="form-label text-slate-300 small fw-semibold text-white mb-1">
                                Kata Sandi
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark border-secondary text-secondary">
                                    <i class="bi bi-key"></i>
                                </span>
                                <input
                                    type="password"
                                    class="form-control bg-dark text-white border-secondary"
                                    placeholder="••••••••"
                                    v-model="password"
                                    required
                                    :disabled="loading"
                                />
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button
                            type="submit"
                            class="btn w-100 py-2.5 rounded-3 fw-bold d-flex align-items-center justify-content-center gap-2 shadow"
                            style="background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%); color: white; border: none;"
                            :disabled="loading"
                        >
                            <span v-if="loading" class="spinner-border spinner-border-sm" role="status"></span>
                            <i v-else class="bi bi-box-arrow-in-right"></i>
                            <span>{{ loading ? 'Memproses...' : 'Masuk Ke Dashboard' }}</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'AdminLoginModal',
    emits: ['close', 'login-success'],
    data() {
        return {
            email: '',
            password: '',
            loading: false,
            errorMessage: '',
        };
    },
    methods: {
        async handleLogin() {
            this.loading = true;
            this.errorMessage = '';

            try {
                const response = await axios.post('/api/admin/login', {
                    email: this.email,
                    password: this.password,
                });

                if (response.data && response.data.user) {
                    this.$emit('login-success', response.data.user);
                } else {
                    this.errorMessage = 'Login berhasil, namun data pengguna tidak ditemukan.';
                }
            } catch (error) {
                if (error.response && error.response.data && error.response.data.message) {
                    this.errorMessage = error.response.data.message;
                } else {
                    this.errorMessage = 'Terjadi kesalahan saat menghubungkan ke server.';
                }
            } finally {
                this.loading = false;
            }
        },
    },
};
</script>
