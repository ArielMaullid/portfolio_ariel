@php
    $unreadCount = \App\Models\ContactMessage::where('is_read', false)->count();
    $user = auth()->user();
    $initials = collect(explode(' ', $user->name ?? 'A'))->map(fn($w) => mb_substr($w, 0, 1))->take(2)->join('');
@endphp

<aside class="admin-sidebar" id="adminSidebar">

    {{-- Brand --}}
    <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
        <i class="bi bi-grid-1x2-fill" style="color: var(--accent);"></i>
        <span>{{ config('portfolio.name') }}<span class="brand-dot">.</span></span>
        <span class="sidebar-brand-badge">Admin</span>
    </a>

    {{-- Nav --}}
    <nav class="sidebar-nav">

        <div class="sidebar-nav-section">Utama</div>

        <a href="{{ route('admin.dashboard') }}"
           class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('home') }}" target="_blank" rel="noopener" class="sidebar-link">
            <i class="bi bi-box-arrow-up-right"></i>
            <span>Lihat Portfolio</span>
        </a>

        <div class="sidebar-nav-section">Konten</div>

        <a href="{{ route('admin.projects.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
            <i class="bi bi-collection"></i>
            <span>Projects</span>
        </a>

        <a href="{{ route('admin.skills.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.skills.*') ? 'active' : '' }}">
            <i class="bi bi-lightning-charge"></i>
            <span>Skills</span>
        </a>

        <a href="{{ route('admin.educations.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.educations.*') ? 'active' : '' }}">
            <i class="bi bi-mortarboard"></i>
            <span>Educations</span>
        </a>

        <a href="{{ route('admin.social-links.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.social-links.*') ? 'active' : '' }}">
            <i class="bi bi-link-45deg"></i>
            <span>Social Links</span>
        </a>

        <div class="sidebar-nav-section">Pengaturan</div>

        <a href="{{ route('admin.profile.edit') }}"
           class="sidebar-link {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}">
            <i class="bi bi-person-badge"></i>
            <span>Profile</span>
        </a>

        <a href="{{ route('admin.messages.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
            <i class="bi bi-envelope"></i>
            <span>Messages</span>
            @if($unreadCount > 0)
                <span class="sidebar-badge">{{ $unreadCount }}</span>
            @endif
        </a>

    </nav>

    {{-- Footer --}}
    <div class="sidebar-footer">
        <div class="sidebar-user">
            <span class="sidebar-user-avatar">{{ $initials }}</span>
            <div style="min-width:0; flex:1;">
                <div class="sidebar-user-name">{{ $user->name ?? 'Admin' }}</div>
                <div class="sidebar-user-email">{{ $user->email ?? '' }}</div>
            </div>
        </div>

        <a href="{{ route('password.edit') }}" class="sidebar-link">
            <i class="bi bi-key"></i>
            <span>Ganti Password</span>
        </a>

        <form method="POST" action="{{ route('logout') }}" class="mt-1">
            @csrf
            <button type="submit" class="sidebar-link w-100 border-0 text-start bg-transparent">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>

</aside>