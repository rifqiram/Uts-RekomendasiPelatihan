@extends('admin.Layout.layout')

@section('content')
<style>
    .user-dashboard-card {
        width: 100%;
        max-width: 780px;
        padding: 32px;
        background: var(--color-surface);
        border: 1px solid var(--color-border);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-md);
    }
    .user-dashboard-card h2 {
        margin-top: 0;
    }
    .user-dashboard-grid {
        display: grid;
        gap: 18px;
        margin-top: 24px;
    }
    .user-dashboard-item {
        padding: 18px;
        border-radius: var(--radius-sm);
        border: 1px solid var(--color-border);
        background: var(--color-bg);
    }
</style>

<div class="login-container">
    <div class="user-dashboard-card">
        <h2>Dashboard Pengguna</h2>
        <p class="subtitle">Selamat datang di panel pengguna. Halaman ini dibuat khusus untuk role <strong>user</strong>.</p>

        <div class="user-dashboard-grid">
            <div class="user-dashboard-item">
                <h3>Informasi Akun</h3>
                <p>Nama: <strong id="currentUserName">-</strong></p>
                <p>Email: <strong id="currentUserEmail">-</strong></p>
                <p>Role: <strong id="currentUserRole">-</strong></p>
            </div>

            <div class="user-dashboard-item">
                <h3>Aksi</h3>
                <p>Untuk melihat pelatihan yang tersedia, buka halaman pelatihan di aplikasi Anda atau gunakan API <code>GET /api/pelatihan</code>.</p>
                <button id="logoutBtn" class="login-submit-btn">Keluar</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const user = getApiUser();
    const token = getApiToken();

    if (!token) {
        window.location.href = '/admin/login';
    }

    if (!user || !user.role) {
        window.location.href = '/admin/login';
    }

    if (user.role !== 'user') {
        window.location.href = '/admin/dashboard';
    }

    document.getElementById('currentUserName').textContent = user.name;
    document.getElementById('currentUserEmail').textContent = user.email;
    document.getElementById('currentUserRole').textContent = user.role;

    document.getElementById('logoutBtn').addEventListener('click', async function () {
        await fetch(window.apiBase + '/logout', {
            method: 'POST',
            headers: {
                'Authorization': 'Bearer ' + token,
                'Accept': 'application/json',
            },
        });
        clearApiToken();
        window.location.href = '/admin/login';
    });
</script>
@endpush
