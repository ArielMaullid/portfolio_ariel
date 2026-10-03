<header class="admin-topbar">

    <button type="button" class="topbar-toggle" id="sidebarToggle" aria-label="Toggle sidebar">
        <i class="bi bi-list fs-5"></i>
    </button>

    <div class="d-none d-md-block">
        <h1 class="topbar-title">@yield('page_title', 'Dashboard')</h1>
        @hasSection('page_subtitle')
            <p class="topbar-subtitle">@yield('page_subtitle')</p>
        @endif
    </div>

    <div class="topbar-actions">
        <a href="{{ route('home') }}" target="_blank" rel="noopener"
           class="topbar-btn" title="Lihat portfolio"
           aria-label="Lihat portfolio">
            <i class="bi bi-box-arrow-up-right"></i>
        </a>

        <button type="button" class="topbar-btn" id="themeToggleAdmin" aria-label="Toggle tema">
            <i class="bi bi-moon-stars icon-light"></i>
            <i class="bi bi-sun icon-dark"></i>
        </button>
    </div>

</header>