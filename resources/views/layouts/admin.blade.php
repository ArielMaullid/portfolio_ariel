<!DOCTYPE html>
<html lang="id" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">

    <title>@yield('title', 'Dashboard') — Admin {{ config('portfolio.name') }}</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <script>
        (function() {
            const stored = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            const theme = stored || (prefersDark ? 'dark' : 'light');
            document.documentElement.setAttribute('data-bs-theme', theme);
        })();
    </script>

    <style>
        :root {
            --bg: #F8FAFC;
            --surface: #FFFFFF;
            --surface-2: #F1F5F9;
            --text-1: #111827;
            --text-2: #64748B;
            --border: #E2E8F0;
            --accent: #2563EB;
            --accent-h: #1D4ED8;
            --accent-soft: rgba(37, 99, 235, 0.08);
            --danger: #DC2626;
            --success: #059669;
            --shadow-sm: 0 1px 2px rgba(0, 0, 0, 0.04);
            --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.06);
            --radius: 10px;
            --sidebar-w: 250px;
        }

        [data-bs-theme="dark"] {
            --bg: #0B1220;
            --surface: #0F172A;
            --surface-2: #1E293B;
            --text-1: #F1F5F9;
            --text-2: #94A3B8;
            --border: #1E293B;
            --accent: #60A5FA;
            --accent-h: #3B82F6;
            --accent-soft: rgba(96, 165, 250, 0.12);
            --danger: #F87171;
            --success: #34D399;
            --shadow-sm: 0 1px 2px rgba(0, 0, 0, 0.3);
            --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.5);
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background: var(--bg);
            color: var(--text-1);
            -webkit-font-smoothing: antialiased;
            transition: background-color .2s ease, color .2s ease;
        }

        a {
            color: var(--accent);
            text-decoration: none;
        }

        a:hover {
            color: var(--accent-h);
        }

        /* Layout */
        .admin-shell {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .admin-sidebar {
            width: var(--sidebar-w);
            background: var(--surface);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 1040;
            transition: transform .25s ease;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: .5rem;
            padding: 1.25rem 1.25rem;
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--text-1);
            border-bottom: 1px solid var(--border);
            letter-spacing: -0.02em;
        }

        .sidebar-brand .brand-dot {
            color: var(--accent);
        }

        .sidebar-brand-badge {
            font-size: .7rem;
            font-weight: 600;
            padding: .15rem .5rem;
            background: var(--accent-soft);
            color: var(--accent);
            border-radius: 6px;
            margin-left: auto;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .sidebar-nav {
            flex: 1;
            overflow-y: auto;
            padding: 1rem .75rem;
        }

        .sidebar-nav-section {
            font-size: .7rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--text-2);
            font-weight: 600;
            padding: .75rem .75rem .35rem;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: .75rem;
            padding: .6rem .75rem;
            border-radius: 8px;
            color: var(--text-2);
            font-size: .92rem;
            font-weight: 500;
            margin-bottom: .15rem;
            transition: all .15s ease;
        }

        .sidebar-link i {
            font-size: 1.05rem;
            width: 20px;
            text-align: center;
        }

        .sidebar-link:hover {
            background: var(--surface-2);
            color: var(--text-1);
        }

        .sidebar-link.active {
            background: var(--accent-soft);
            color: var(--accent);
        }

        .sidebar-link.active i {
            color: var(--accent);
        }

        .sidebar-badge {
            margin-left: auto;
            background: var(--danger);
            color: #fff;
            font-size: .7rem;
            font-weight: 600;
            padding: .15rem .5rem;
            border-radius: 999px;
            min-width: 20px;
            text-align: center;
        }

        .sidebar-footer {
            border-top: 1px solid var(--border);
            padding: 1rem .75rem;
        }

        .sidebar-user {
            display: flex;
            align-items: center;
            gap: .65rem;
            padding: .6rem .75rem;
            border-radius: 8px;
            margin-bottom: .5rem;
            background: var(--surface-2);
        }

        .sidebar-user-avatar {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: var(--accent);
            color: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: .85rem;
            flex-shrink: 0;
        }

        .sidebar-user-name {
            font-size: .85rem;
            font-weight: 600;
            color: var(--text-1);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .sidebar-user-email {
            font-size: .72rem;
            color: var(--text-2);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Main content */
        .admin-main {
            flex: 1;
            margin-left: var(--sidebar-w);
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        /* Topbar */
        .admin-topbar {
            background: color-mix(in srgb, var(--surface) 92%, transparent);
            backdrop-filter: saturate(180%) blur(12px);
            -webkit-backdrop-filter: saturate(180%) blur(12px);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 1030;
            padding: .85rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .topbar-toggle {
            display: none;
            width: 38px;
            height: 38px;
            border-radius: 8px;
            border: 1px solid var(--border);
            background: var(--surface);
            color: var(--text-1);
            align-items: center;
            justify-content: center;
        }

        .topbar-title {
            font-size: 1.1rem;
            font-weight: 700;
            margin: 0;
            color: var(--text-1);
            letter-spacing: -0.02em;
        }

        .topbar-subtitle {
            font-size: .82rem;
            color: var(--text-2);
            margin: 0;
        }

        .topbar-actions {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: .5rem;
        }

        .topbar-btn {
            width: 38px;
            height: 38px;
            border-radius: 8px;
            border: 1px solid var(--border);
            background: var(--surface);
            color: var(--text-2);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all .15s ease;
        }

        .topbar-btn:hover {
            color: var(--accent);
            border-color: var(--accent);
        }

        [data-bs-theme="light"] .topbar-btn .icon-dark {
            display: none;
        }

        [data-bs-theme="dark"] .topbar-btn .icon-light {
            display: none;
        }

        /* Content */
        .admin-content {
            padding: 1.5rem;
            flex: 1;
        }

        @media (min-width: 992px) {
            .admin-content {
                padding: 2rem 2rem;
            }
        }

        /* Card surface */
        .card-surface {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow-sm);
        }

        .card-surface .card-header {
            background: transparent;
            border-bottom: 1px solid var(--border);
            padding: 1rem 1.25rem;
            font-weight: 600;
            color: var(--text-1);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-surface .card-body {
            padding: 1.25rem;
        }

        /* Stats */
        .stat-card {
            padding: 1.25rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        .stat-value {
            font-size: 1.6rem;
            font-weight: 700;
            line-height: 1.1;
            color: var(--text-1);
        }

        .stat-label {
            font-size: .82rem;
            color: var(--text-2);
            text-transform: uppercase;
            letter-spacing: 0.04em;
            font-weight: 500;
        }

        /* Tables */
        .table {
            --bs-table-bg: transparent;
            --bs-table-color: var(--text-1);
            --bs-table-border-color: var(--border);
            color: var(--text-1);
            margin: 0;
        }

        .table thead th {
            border-bottom: 1px solid var(--border);
            color: var(--text-2);
            font-weight: 600;
            font-size: .82rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            padding: .75rem 1rem;
            background: var(--surface-2);
        }

        .table tbody td {
            padding: .85rem 1rem;
            vertical-align: middle;
            border-color: var(--border);
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        /* Table: beri min-width supaya scroll horizontal di mobile */
        .table {
            min-width: 800px;
        }

        /* Kolom judul utama di table: beri ruang cukup */
        .table td:nth-child(2),
        .table th:nth-child(2) {
            min-width: 240px;
        }

        /* Kolom kategori: jangan sampai terlalu sempit */
        .table td:nth-child(3),
        .table th:nth-child(3) {
            min-width: 120px;
        }

        .table-responsive {
            -webkit-overflow-scrolling: touch;
            scrollbar-width: thin;
        }

        .table-responsive::-webkit-scrollbar {
            height: 6px;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background: var(--border);
            border-radius: 3px;
        }

        /* Card header: wrap di mobile supaya judul & tombol tidak tumpang tindih */
        .card-surface .card-header {
            flex-wrap: wrap;
            gap: .5rem;
        }

        @media (max-width: 576px) {
            .card-surface .card-header {
                padding: .85rem 1rem;
                font-size: .9rem;
            }

            .card-surface .card-body {
                padding: 1rem;
            }
        }

        /* Badges */
        .badge-soft {
            font-size: .72rem;
            font-weight: 600;
            padding: .3rem .6rem;
            border-radius: 6px;
            letter-spacing: 0.02em;
        }

        .badge-soft-primary {
            background: var(--accent-soft);
            color: var(--accent);
        }

        .badge-soft-success {
            background: rgba(16, 185, 129, .12);
            color: var(--success);
        }

        .badge-soft-warning {
            background: rgba(245, 158, 11, .15);
            color: #D97706;
        }

        .badge-soft-secondary {
            background: var(--surface-2);
            color: var(--text-2);
        }

        .badge-soft-danger {
            background: rgba(239, 68, 68, .12);
            color: var(--danger);
        }

        /* Buttons */
        .btn {
            font-weight: 500;
            border-radius: 8px;
            transition: all .15s ease;
        }

        .btn-primary {
            background: var(--accent);
            border-color: var(--accent);
        }

        .btn-primary:hover {
            background: var(--accent-h);
            border-color: var(--accent-h);
        }

        .btn-outline-secondary {
            color: var(--text-1);
            border-color: var(--border);
            background: var(--surface);
        }

        .btn-outline-secondary:hover {
            background: var(--surface-2);
            color: var(--text-1);
            border-color: var(--text-2);
        }

        .btn-outline-danger {
            color: var(--danger);
            border-color: var(--border);
            background: var(--surface);
        }

        .btn-outline-danger:hover {
            background: var(--danger);
            color: #fff;
            border-color: var(--danger);
        }

        .btn-icon {
            width: 34px;
            height: 34px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-sm {
            font-size: .85rem;
            padding: .4rem .8rem;
        }

        /* Form */
        .form-label {
            font-weight: 500;
            font-size: .9rem;
            margin-bottom: .35rem;
            color: var(--text-1);
        }

        .form-control,
        .form-select,
        .form-control:focus,
        .form-select:focus {
            background: var(--surface);
            border: 1px solid var(--border);
            color: var(--text-1);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px var(--accent-soft);
        }

        .form-control::placeholder {
            color: var(--text-2);
            opacity: .6;
        }

        /* Alert */
        .alert {
            border-radius: 10px;
            border: 1px solid transparent;
            font-size: .92rem;
        }

        .alert-danger {
            background: rgba(239, 68, 68, .08);
            border-color: rgba(239, 68, 68, .25);
            color: var(--danger);
        }

        .alert-success {
            background: rgba(16, 185, 129, .08);
            border-color: rgba(16, 185, 129, .25);
            color: var(--success);
        }

        /* Backdrop */
        .sidebar-backdrop {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .5);
            z-index: 1035;
        }

        .sidebar-backdrop.show {
            display: block;
        }

        /* Mobile */
        @media (max-width: 991px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }

            .admin-sidebar.show {
                transform: translateX(0);
            }

            .admin-main {
                margin-left: 0;
            }

            .topbar-toggle {
                display: inline-flex;
            }

            .admin-topbar {
                padding: .75rem 1rem;
            }

            .admin-content {
                padding: 1rem;
            }
        }
    </style>

    @stack('head')
</head>

<body>

    <div class="admin-shell">

        @include('components.admin-sidebar')

        <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

        <div class="admin-main">

            @include('components.admin-topbar')

            <main class="admin-content">
                @yield('content')
            </main>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Theme toggle
        (function() {
            const btn = document.getElementById('themeToggleAdmin');
            if (!btn) return;
            btn.addEventListener('click', function() {
                const current = document.documentElement.getAttribute('data-bs-theme');
                const next = current === 'dark' ? 'light' : 'dark';
                document.documentElement.setAttribute('data-bs-theme', next);
                localStorage.setItem('theme', next);
            });
        })();

        // Sidebar toggle (mobile)
        (function() {
            const toggle = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('adminSidebar');
            const backdrop = document.getElementById('sidebarBackdrop');
            if (!toggle || !sidebar) return;

            const close = () => {
                sidebar.classList.remove('show');
                backdrop.classList.remove('show');
            };

            toggle.addEventListener('click', () => {
                sidebar.classList.toggle('show');
                backdrop.classList.toggle('show');
            });
            backdrop.addEventListener('click', close);

            // Close on link click (mobile)
            sidebar.querySelectorAll('.sidebar-link').forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth < 992) close();
                });
            });
        })();

        // Auto-hide alerts after 4s
        (function() {
            document.querySelectorAll('[data-auto-dismiss]').forEach(el => {
                setTimeout(() => {
                    el.style.transition = 'opacity .3s ease';
                    el.style.opacity = '0';
                    setTimeout(() => el.remove(), 300);
                }, 4000);
            });
        })();
    </script>

    @stack('scripts')
</body>

</html>