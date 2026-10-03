<!DOCTYPE html>
<html lang="id" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- SEO --}}
    <title>@yield('title', config('portfolio.name') . ' — ' . config('portfolio.headline'))</title>
    <meta name="description" content="@yield('meta_description', 'Portfolio ' . config('portfolio.name') . ', ' . config('portfolio.headline') . '. Lihat project, skill, dan cara menghubungi.')">
    <meta name="keywords" content="portfolio, fresh graduate, teknik informatika, laravel, php, web developer, {{ config('portfolio.name') }}">
    <meta name="author" content="{{ config('portfolio.name') }}">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('og_title', config('portfolio.name') . ' — Portfolio')">
    <meta property="og:description" content="@yield('og_description', config('portfolio.headline'))">
    <meta property="og:image" content="{{ asset(config('portfolio.profile_photo')) }}">
    <meta property="og:url" content="{{ url()->current() }}">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">

    {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Bootstrap 5.3 + Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    {{-- Theme Init (sebelum render untuk hindari flicker) --}}
    <script>
        (function() {
            const stored = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            const theme = stored || (prefersDark ? 'dark' : 'light');
            document.documentElement.setAttribute('data-bs-theme', theme);
        })();
    </script>

    {{-- Custom CSS --}}
    <style>
        :root {
            --bg: #FAFAFA;
            --surface: #FFFFFF;
            --text-1: #111827;
            --text-2: #4B5563;
            --border: #E5E7EB;
            --accent: #2563EB;
            --accent-h: #1D4ED8;
            --accent-soft: rgba(37, 99, 235, 0.08);
            --shadow-sm: 0 1px 2px rgba(0, 0, 0, 0.04);
            --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.06);
            --radius: 12px;
        }

        [data-bs-theme="dark"] {
            --bg: #0F172A;
            --surface: #1E293B;
            --text-1: #F1F5F9;
            --text-2: #94A3B8;
            --border: #334155;
            --accent: #60A5FA;
            --accent-h: #3B82F6;
            --accent-soft: rgba(96, 165, 250, 0.12);
            --shadow-sm: 0 1px 2px rgba(0, 0, 0, 0.3);
            --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.4);
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 80px;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background: var(--bg);
            color: var(--text-1);
            line-height: 1.6;
            transition: background-color .2s ease, color .2s ease;
            -webkit-font-smoothing: antialiased;
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            font-weight: 700;
            color: var(--text-1);
            letter-spacing: -0.02em;
        }

        a {
            color: var(--accent);
            text-decoration: none;
            transition: color .15s ease;
        }

        a:hover {
            color: var(--accent-h);
        }

        /* Sections */
        .section {
            padding: 80px 0;
        }

        @media (max-width: 768px) {
            .section {
                padding: 56px 0;
            }
        }

        .section-title {
            font-size: 2rem;
            margin-bottom: .5rem;
        }

        .section-subtitle {
            color: var(--text-2);
            margin-bottom: 3rem;
            max-width: 600px;
        }

        .section-eyebrow {
            display: inline-block;
            font-size: .85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--accent);
            margin-bottom: .75rem;
        }

        /* Navbar */
        .navbar-portfolio {
            background: color-mix(in srgb, var(--bg) 85%, transparent);
            backdrop-filter: saturate(180%) blur(12px);
            -webkit-backdrop-filter: saturate(180%) blur(12px);
            border-bottom: 1px solid var(--border);
            transition: background-color .2s ease;
        }

        .navbar-portfolio .nav-link {
            color: var(--text-2);
            font-weight: 500;
            font-size: .95rem;
            padding: .5rem .9rem !important;
            transition: color .15s ease;
        }

        .navbar-portfolio .nav-link:hover,
        .navbar-portfolio .nav-link.active {
            color: var(--text-1);
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--text-1) !important;
            letter-spacing: -0.02em;
        }

        .navbar-brand .brand-dot {
            color: var(--accent);
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
        }

        .btn-outline-secondary:hover {
            background: var(--surface);
            color: var(--text-1);
            border-color: var(--text-2);
        }

        /* Cards */
        .card-surface {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow-sm);
            transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease;
        }

        .card-surface:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
            border-color: color-mix(in srgb, var(--accent) 30%, var(--border));
        }

        /* Hero */
        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            padding: .35rem .8rem;
            background: var(--accent-soft);
            color: var(--accent);
            border-radius: 999px;
            font-size: .85rem;
            font-weight: 500;
            margin-bottom: 1.25rem;
        }

        .pulse-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #10B981;
            box-shadow: 0 0 0 0 rgba(16, 185, 129, .7);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(16, 185, 129, .7);
            }

            70% {
                box-shadow: 0 0 0 8px rgba(16, 185, 129, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0);
            }
        }

        .hero-title {
            font-size: clamp(2rem, 5vw, 3.25rem);
            line-height: 1.15;
            margin-bottom: 1rem;
        }

        .text-accent {
            color: var(--accent);
        }

        .hero-subtitle {
            font-size: 1.15rem;
            color: var(--text-2);
            margin-bottom: 1rem;
            font-weight: 500;
        }

        .hero-bio {
            color: var(--text-2);
            margin-bottom: 2rem;
            max-width: 580px;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: .75rem;
            margin-bottom: 2rem;
        }

        .hero-social {
            display: flex;
            gap: .75rem;
        }

        .social-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 10px;
            border: 1px solid var(--border);
            background: var(--surface);
            color: var(--text-2);
            transition: all .15s ease;
        }

        .social-icon:hover {
            color: var(--accent);
            border-color: var(--accent);
            transform: translateY(-2px);
        }

        .profile-photo-wrap {
            position: relative;
            max-width: 380px;
            margin: 0 auto;
        }

        .profile-photo {
            width: 100%;
            aspect-ratio: 1 / 1;
            object-fit: cover;
            border-radius: 20px;
            border: 4px solid var(--surface);
            box-shadow: var(--shadow-md);
        }

        /* About */
        .info-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .info-list li {
            display: flex;
            gap: .75rem;
            padding: .65rem 0;
            border-bottom: 1px solid var(--border);
            color: var(--text-2);
        }

        .info-list li:last-child {
            border-bottom: none;
        }

        .info-list i {
            color: var(--accent);
            font-size: 1.1rem;
            flex-shrink: 0;
            margin-top: .15rem;
        }

        /* Timeline (Education) */
        .timeline {
            position: relative;
            padding-left: 32px;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 8px;
            top: 8px;
            bottom: 8px;
            width: 2px;
            background: var(--border);
        }

        .timeline-item {
            position: relative;
            padding-bottom: 2rem;
        }

        .timeline-item:last-child {
            padding-bottom: 0;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: -32px;
            top: 6px;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: var(--surface);
            border: 3px solid var(--accent);
            box-shadow: 0 0 0 4px var(--bg);
        }

        .timeline-period {
            display: inline-block;
            font-size: .85rem;
            color: var(--accent);
            font-weight: 600;
            margin-bottom: .25rem;
        }

        .timeline-title {
            font-size: 1.15rem;
            margin-bottom: .25rem;
        }

        .timeline-subtitle {
            color: var(--text-2);
            font-size: .95rem;
            margin-bottom: .5rem;
        }

        /* Skills */
        .skill-category-title {
            font-size: 1.05rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--text-1);
        }

        .skill-chip {
            display: inline-block;
            padding: .4rem .9rem;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 999px;
            font-size: .9rem;
            color: var(--text-2);
            font-weight: 500;
            margin: 0 .4rem .5rem 0;
            transition: all .15s ease;
        }

        .skill-chip:hover {
            border-color: var(--accent);
            color: var(--accent);
        }

        /* Project Card */
        .project-card {
            height: 100%;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .project-thumb {
            aspect-ratio: 16 / 10;
            width: 100%;
            object-fit: cover;
            background: var(--accent-soft);
        }

        .project-body {
            padding: 1.25rem;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .project-category {
            font-size: .78rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--accent);
            font-weight: 600;
            margin-bottom: .5rem;
        }

        .project-title {
            font-size: 1.1rem;
            margin-bottom: .5rem;
            color: var(--text-1);
        }

        .project-desc {
            color: var(--text-2);
            font-size: .9rem;
            margin-bottom: 1rem;
            flex: 1;
        }

        .project-tech {
            display: flex;
            flex-wrap: wrap;
            gap: .35rem;
        }

        .tech-tag {
            font-size: .75rem;
            padding: .2rem .55rem;
            background: var(--accent-soft);
            color: var(--accent);
            border-radius: 6px;
            font-weight: 500;
        }

        /* Contact */
        .contact-card {
            padding: 1.25rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .contact-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: var(--accent-soft);
            color: var(--accent);
            font-size: 1.4rem;
            flex-shrink: 0;
        }

        .contact-info strong {
            display: block;
            color: var(--text-1);
        }

        .contact-info small {
            color: var(--text-2);
        }

        /* Footer */
        .site-footer {
            border-top: 1px solid var(--border);
            padding: 2rem 0;
            color: var(--text-2);
            font-size: .9rem;
        }

        /* WA Float */
        .wa-float {
            position: fixed;
            right: 20px;
            bottom: 20px;
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: #25D366;
            color: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            box-shadow: 0 8px 24px rgba(37, 211, 102, 0.4);
            z-index: 1000;
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .wa-float:hover {
            transform: scale(1.06);
            color: #fff;
            box-shadow: 0 10px 28px rgba(37, 211, 102, 0.55);
        }

        @media (max-width: 480px) {
            .wa-float {
                width: 50px;
                height: 50px;
                font-size: 1.4rem;
                right: 16px;
                bottom: 16px;
            }
        }

        /* Theme toggle */
        .theme-toggle {
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

        .theme-toggle:hover {
            color: var(--accent);
            border-color: var(--accent);
        }

        .theme-toggle i {
            font-size: 1.05rem;
        }

        [data-bs-theme="light"] .theme-toggle .icon-dark {
            display: none;
        }

        [data-bs-theme="dark"] .theme-toggle .icon-light {
            display: none;
        }

        /* Reveal animation */
        .reveal {
            opacity: 0;
            transform: translateY(16px);
            transition: opacity .5s ease, transform .5s ease;
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Utility */
        .text-muted-2 {
            color: var(--text-2);
        }

        /* ------------------------------------------------------------------ */
        /* Fix overflow gutter Bootstrap di mobile                             */
        /* ------------------------------------------------------------------ */
        @media (max-width: 768px) {
            .row.g-5 {
                --bs-gutter-x: 1.5rem;
                --bs-gutter-y: 1.5rem;
            }

            .row.g-4 {
                --bs-gutter-x: 1rem;
                --bs-gutter-y: 1rem;
            }
        }

        html {
            overflow-x: clip;
        }

        body {
            overflow-x: clip;
            max-width: 100%;
        }
    </style>

    @stack('head')
</head>

<body>

    @include('components.navbar')

    <main>
        @yield('content')
    </main>

    @include('components.footer')
    @include('components.wa-float')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Theme toggle
        (function() {
            const btn = document.getElementById('themeToggle');
            if (!btn) return;
            btn.addEventListener('click', function() {
                const current = document.documentElement.getAttribute('data-bs-theme');
                const next = current === 'dark' ? 'light' : 'dark';
                document.documentElement.setAttribute('data-bs-theme', next);
                localStorage.setItem('theme', next);
            });
        })();

        // Active nav on scroll
        (function() {
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('.navbar-portfolio .nav-link[href^="#"]');
            if (!sections.length || !navLinks.length) return;

            const onScroll = () => {
                const scrollY = window.scrollY + 120;
                let current = '';
                sections.forEach(s => {
                    if (scrollY >= s.offsetTop) current = s.id;
                });
                navLinks.forEach(link => {
                    link.classList.toggle('active', link.getAttribute('href') === '#' + current);
                });
            };
            window.addEventListener('scroll', onScroll, {
                passive: true
            });
            onScroll();
        })();

        // Reveal on scroll
        (function() {
            const items = document.querySelectorAll('.reveal');
            if (!items.length || !('IntersectionObserver' in window)) {
                items.forEach(i => i.classList.add('visible'));
                return;
            }
            const io = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        io.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1
            });
            items.forEach(i => io.observe(i));
        })();

        // Close mobile nav after click
        (function() {
            const navCollapse = document.getElementById('navbarNav');
            if (!navCollapse) return;
            document.querySelectorAll('#navbarNav .nav-link').forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth < 992) {
                        const bsCollapse = bootstrap.Collapse.getInstance(navCollapse);
                        if (bsCollapse) bsCollapse.hide();
                    }
                });
            });
        })();
    </script>

    @stack('scripts')
</body>

</html>