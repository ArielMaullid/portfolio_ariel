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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

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
        /* ============================================================
       DESIGN TOKENS
       ============================================================ */
        :root {
            --bg: #FAFAFA;
            --surface: #FFFFFF;
            --surface-2: #F8FAFC;
            --text-1: #0F172A;
            --text-2: #64748B;
            --text-3: #94A3B8;
            --border: #E5E7EB;
            --border-2: #F1F5F9;
            --accent: #2563EB;
            --accent-h: #1D4ED8;
            --accent-soft: rgba(37, 99, 235, 0.08);
            --accent-glow: rgba(37, 99, 235, 0.15);

            --shadow-sm: 0 1px 2px rgba(15, 23, 42, 0.04), 0 1px 1px rgba(15, 23, 42, 0.03);
            --shadow-md: 0 4px 12px rgba(15, 23, 42, 0.06), 0 2px 4px rgba(15, 23, 42, 0.04);
            --shadow-lg: 0 12px 32px rgba(15, 23, 42, 0.08), 0 4px 8px rgba(15, 23, 42, 0.04);
            --shadow-xl: 0 24px 48px rgba(15, 23, 42, 0.10), 0 8px 16px rgba(15, 23, 42, 0.05);

            --radius-sm: 8px;
            --radius: 12px;
            --radius-lg: 16px;
            --radius-xl: 24px;

            --ease: cubic-bezier(0.4, 0, 0.2, 1);
            --ease-out: cubic-bezier(0.16, 1, 0.3, 1);
        }

        [data-bs-theme="dark"] {
            --bg: #0B1220;
            --surface: #0F172A;
            --surface-2: #1E293B;
            --text-1: #F1F5F9;
            --text-2: #94A3B8;
            --text-3: #64748B;
            --border: #1E293B;
            --border-2: #334155;
            --accent: #60A5FA;
            --accent-h: #3B82F6;
            --accent-soft: rgba(96, 165, 250, 0.12);
            --accent-glow: rgba(96, 165, 250, 0.20);

            --shadow-sm: 0 1px 2px rgba(0, 0, 0, 0.3), 0 1px 1px rgba(0, 0, 0, 0.2);
            --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.4), 0 2px 4px rgba(0, 0, 0, 0.3);
            --shadow-lg: 0 12px 32px rgba(0, 0, 0, 0.5), 0 4px 8px rgba(0, 0, 0, 0.3);
            --shadow-xl: 0 24px 48px rgba(0, 0, 0, 0.55), 0 8px 16px rgba(0, 0, 0, 0.35);
        }

        /* ============================================================
       BASE
       ============================================================ */
        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 80px;
            overflow-x: clip;
            scrollbar-width: thin;
            scrollbar-color: var(--border) transparent;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background: var(--bg);
            color: var(--text-1);
            line-height: 1.6;
            transition: background-color .2s ease, color .2s ease;
            -webkit-font-smoothing: antialiased;
            overflow-x: clip;
            max-width: 100%;
            font-feature-settings: 'ss01', 'cv11';
            text-rendering: optimizeLegibility;
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

        p {
            letter-spacing: -0.005em;
        }

        a {
            color: var(--accent);
            text-decoration: none;
            transition: color .15s ease;
        }

        a:hover {
            color: var(--accent-h);
        }

        hr {
            border-color: var(--border-2);
            opacity: 1;
        }

        /* Custom selection */
        ::selection {
            background: var(--accent);
            color: #ffffff;
        }

        [data-bs-theme="dark"] ::selection {
            background: var(--accent);
            color: #0B1220;
        }

        /* Custom scrollbar (Chrome/Safari/Edge) */
        ::-webkit-scrollbar {
            width: 10px;
            height: 10px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--border);
            border-radius: 10px;
            border: 2px solid var(--bg);
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--text-3);
        }

        /* Focus state */
        :focus-visible {
            outline: 2px solid var(--accent);
            outline-offset: 2px;
            border-radius: 6px;
        }

        button:focus-visible,
        a:focus-visible,
        input:focus-visible,
        textarea:focus-visible,
        select:focus-visible {
            outline: 2px solid var(--accent);
            outline-offset: 2px;
        }

        /* ============================================================
       SECTIONS
       ============================================================ */
        .section {
            padding: 100px 0;
        }

        .section-loose {
            padding: 120px 0;
        }

        .section-tight {
            padding: 60px 0;
        }

        @media (max-width: 768px) {
            .section {
                padding: 64px 0;
            }

            .section-loose {
                padding: 80px 0;
            }

            .section-tight {
                padding: 48px 0;
            }
        }

        .section-title {
            font-size: clamp(1.75rem, 3.5vw, 2.5rem);
            font-weight: 700;
            letter-spacing: -0.025em;
            line-height: 1.15;
            margin-bottom: .5rem;
        }

        .section-subtitle {
            color: var(--text-2);
            font-size: 1.02rem;
            line-height: 1.65;
            margin-bottom: 3rem;
            max-width: 600px;
        }

        .section-eyebrow {
            display: inline-block;
            font-size: .72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .12em;
            color: var(--accent);
            margin-bottom: .75rem;
        }

        /* ============================================================
       NAVBAR
       ============================================================ */
        .navbar-portfolio {
            background: color-mix(in srgb, var(--bg) 82%, transparent);
            backdrop-filter: saturate(180%) blur(12px);
            -webkit-backdrop-filter: saturate(180%) blur(12px);
            border-bottom: 1px solid var(--border-2);
            transition: background-color .2s ease;
        }

        @supports (backdrop-filter: blur(1px)) {
            .navbar-portfolio {
                backdrop-filter: saturate(200%) blur(16px);
                -webkit-backdrop-filter: saturate(200%) blur(16px);
            }
        }

        .navbar-portfolio .nav-link {
            position: relative;
            color: var(--text-2);
            font-weight: 500;
            font-size: .9rem;
            letter-spacing: -0.005em;
            padding: .5rem .9rem !important;
            transition: color .15s ease;
        }

        .navbar-portfolio .nav-link:hover,
        .navbar-portfolio .nav-link.active {
            color: var(--text-1);
        }

        .navbar-portfolio .nav-link.active::after {
            content: '';
            position: absolute;
            left: .9rem;
            right: .9rem;
            bottom: .25rem;
            height: 2px;
            background: var(--accent);
            border-radius: 2px;
        }

        @media (max-width: 991px) {
            .navbar-portfolio .nav-link.active::after {
                display: none;
            }

            .navbar-portfolio .nav-link.active {
                color: var(--accent);
            }
        }

        .navbar-brand {
            font-weight: 800;
            color: var(--text-1) !important;
            letter-spacing: -0.03em;
            font-size: 1.05rem;
        }

        .navbar-brand .brand-dot {
            color: var(--accent);
        }

        /* ============================================================
       BUTTONS
       ============================================================ */
        .btn {
            font-weight: 600;
            letter-spacing: -0.005em;
            border-radius: 10px;
            transition: all .22s var(--ease);
        }

        .btn-lg {
            padding: .72rem 1.4rem;
            font-size: .95rem;
            border-radius: 11px;
        }

        .btn-sm {
            padding: .35rem .85rem;
            font-size: .85rem;
        }

        .btn-primary {
            background: var(--accent);
            border-color: var(--accent);
            box-shadow: 0 1px 2px rgba(37, 99, 235, 0.15),
                inset 0 1px 0 rgba(255, 255, 255, 0.12);
        }

        .btn-primary:hover {
            background: var(--accent-h);
            border-color: var(--accent-h);
            box-shadow: 0 4px 14px var(--accent-glow),
                0 1px 2px rgba(37, 99, 235, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.15);
            transform: translateY(-1px);
        }

        .btn-primary:active {
            transform: translateY(0);
            box-shadow: 0 1px 2px rgba(37, 99, 235, 0.15);
        }

        [data-bs-theme="dark"] .btn-primary:hover {
            box-shadow: 0 4px 14px rgba(96, 165, 250, .3),
                0 1px 2px rgba(96, 165, 250, 0.2);
        }

        .btn-outline-secondary {
            background: var(--surface);
            border-color: var(--border);
            color: var(--text-1);
            box-shadow: var(--shadow-sm);
        }

        .btn-outline-secondary:hover {
            background: var(--surface);
            color: var(--text-1);
            border-color: var(--text-3);
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        .btn-link {
            padding: .5rem .25rem;
        }

        /* ============================================================
       CARDS
       ============================================================ */
        .card-surface {
            background: var(--surface);
            border: 1px solid var(--border-2);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            transition: transform .3s var(--ease),
                box-shadow .3s var(--ease),
                border-color .3s var(--ease);
        }

        .card-surface:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
            border-color: color-mix(in srgb, var(--accent) 25%, var(--border-2));
        }

        @media (max-width: 576px) {
            .card-surface:hover {
                transform: translateY(-2px);
                box-shadow: var(--shadow-md);
            }
        }

        /* ============================================================
       HERO
       ============================================================ */
        .hero-eyebrow {
            display: inline-block;
            font-size: .72rem;
            font-weight: 700;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: var(--text-2);
            margin-bottom: .85rem;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            padding: .38rem .8rem;
            background: var(--accent-soft);
            color: var(--accent);
            border-radius: 999px;
            font-size: .78rem;
            font-weight: 500;
            letter-spacing: -0.005em;
            border: 1px solid color-mix(in srgb, var(--accent) 20%, transparent);
            margin-bottom: 1.5rem;
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
            font-size: clamp(2.5rem, 6vw, 4rem);
            font-weight: 800;
            line-height: 1.05;
            letter-spacing: -0.035em;
            margin-bottom: 1rem;
        }

        .hero-title .text-accent {
            display: block;
        }

        .text-accent {
            color: var(--accent);
        }

        .hero-subtitle {
            font-size: 1.2rem;
            font-weight: 500;
            color: var(--text-2);
            margin-bottom: 1rem;
            max-width: 540px;
        }

        .hero-bio {
            font-size: 1rem;
            line-height: 1.7;
            color: var(--text-2);
            margin-bottom: 2rem;
            max-width: 540px;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: .75rem;
            margin-bottom: 1.5rem;
        }

        /* Hero CV block */
        .hero-cv {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: .65rem;
            margin-bottom: 1.75rem;
            font-size: .92rem;
        }

        .hero-cv .btn-link {
            color: var(--accent);
            font-weight: 500;
            text-decoration: none;
            padding: 0;
        }

        .hero-cv .btn-link:hover {
            text-decoration: underline;
            color: var(--accent-h);
        }

        .hero-cv-sep {
            color: var(--text-2);
            opacity: .4;
        }

        .hero-cv-date {
            font-size: .82rem;
            color: var(--text-2);
            opacity: .85;
            margin-left: .25rem;
        }

        .hero-cv-pending {
            color: var(--text-2);
            font-size: .9rem;
            font-style: italic;
        }

        @media (max-width: 576px) {
            .hero-cv {
                flex-direction: column;
                align-items: flex-start;
                gap: .4rem;
            }

            .hero-cv-sep {
                display: none;
            }

            .hero-cv-date {
                margin-left: 0;
            }
        }

        .hero-social {
            display: flex;
            gap: .75rem;
        }

        .social-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            border-radius: 10px;
            border: 1px solid var(--border-2);
            background: var(--surface);
            color: var(--text-2);
            transition: all .22s var(--ease);
        }

        .social-icon:hover {
            color: var(--accent);
            border-color: var(--accent);
            background: var(--accent-soft);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px var(--accent-glow);
        }

        .profile-photo-wrap {
            position: relative;
            max-width: 380px;
            margin: 0 auto;
            isolation: isolate;
        }

        .profile-photo-wrap::before {
            content: '';
            position: absolute;
            inset: -20px;
            border-radius: 30px;
            background: radial-gradient(circle at 30% 30%,
                    color-mix(in srgb, var(--accent) 22%, transparent),
                    transparent 65%);
            filter: blur(24px);
            z-index: 0;
            opacity: .65;
            pointer-events: none;
        }

        .profile-photo {
            position: relative;
            z-index: 1;
            width: 100%;
            aspect-ratio: 1 / 1;
            object-fit: cover;
            border-radius: 20px;
            border: 3px solid var(--surface);
            box-shadow: var(--shadow-md);
        }

        /* ============================================================
       ABOUT
       ============================================================ */
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

        /* ============================================================
       TIMELINE (Education)
       ============================================================ */
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

        /* ============================================================
       SKILLS
       ============================================================ */
        .skill-category-title {
            font-size: 1.05rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--text-1);
        }

        .skill-chip {
            display: inline-block;
            padding: .38rem .85rem;
            font-size: .875rem;
            font-weight: 500;
            border-radius: 8px;
            border: 1px solid var(--border-2);
            background: var(--surface-2);
            color: var(--text-1);
            margin: 0 .4rem .5rem 0;
            transition: all .2s var(--ease);
            cursor: default;
        }

        .skill-chip:hover {
            border-color: var(--accent);
            color: var(--accent);
            background: var(--accent-soft);
            transform: translateY(-1px);
        }

        /* ============================================================
       PROJECT CARD
       ============================================================ */
        .project-card-link {
            display: block;
            height: 100%;
            color: inherit;
        }

        .project-card-link:hover {
            color: inherit;
        }

        .project-card {
            height: 100%;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .project-thumb-wrap {
            overflow: hidden;
            border-top-left-radius: var(--radius-lg);
            border-top-right-radius: var(--radius-lg);
        }

        .project-thumb {
            aspect-ratio: 16 / 10;
            width: 100%;
            object-fit: cover;
            background: var(--accent-soft);
            transition: transform .5s var(--ease);
        }

        .project-card-link:hover .project-thumb {
            transform: scale(1.03);
        }

        .project-body {
            padding: 1.25rem;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .project-meta {
            display: flex;
            align-items: center;
            gap: .35rem;
            margin-bottom: .5rem;
        }

        .project-category {
            font-size: .78rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--accent);
            font-weight: 600;
            margin-bottom: .5rem;
        }

        .project-meta .project-category {
            margin-bottom: 0;
        }

        .project-year {
            font-size: .78rem;
            color: var(--text-2);
            font-weight: 500;
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

        .project-highlights {
            list-style: none;
            padding: 0;
            margin: 0 0 1rem 0;
            flex: 1;
            display: grid;
            align-content: start;
            gap: .35rem;
        }

        .project-highlights li {
            position: relative;
            padding-left: 1rem;
            font-size: .85rem;
            color: var(--text-2);
            line-height: 1.5;
        }

        .project-highlights li::before {
            content: '';
            position: absolute;
            left: 0;
            top: .55rem;
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: var(--accent);
        }

        .project-tech {
            display: flex;
            flex-wrap: wrap;
            gap: .35rem;
        }

        .tech-tag {
            padding: .25rem .6rem;
            font-size: .72rem;
            font-weight: 600;
            letter-spacing: .01em;
            border-radius: 6px;
            background: var(--accent-soft);
            color: var(--accent);
            border: 1px solid color-mix(in srgb, var(--accent) 12%, transparent);
        }

        .project-card-cta {
            display: inline-flex;
            align-items: center;
            gap: .35rem;
            font-size: .85rem;
            font-weight: 600;
            color: var(--accent);
            margin-top: auto;
            padding-top: 1rem;
            border-top: 1px solid var(--border);
            transition: gap .15s ease;
        }

        .project-card-link:hover .project-card-cta {
            gap: .6rem;
        }

        .project-card-link:hover .project-card-cta i {
            transform: translateX(0);
        }

        .project-card-cta i {
            transition: transform .15s ease;
        }

        /* ============================================================
       CASE STUDY — Hero
       ============================================================ */
        .case-hero {
            padding: 3rem 0 2rem;
        }

        .case-breadcrumb {
            margin-bottom: 2rem;
        }

        .case-breadcrumb .breadcrumb {
            --bs-breadcrumb-divider-color: var(--text-2);
            --bs-breadcrumb-item-active-color: var(--text-2);
            font-size: .85rem;
        }

        .case-breadcrumb .breadcrumb a {
            color: var(--text-2);
        }

        .case-breadcrumb .breadcrumb a:hover {
            color: var(--accent);
        }

        .case-hero-meta {
            display: flex;
            align-items: center;
            gap: .5rem;
            margin-bottom: 1rem;
        }

        .case-cat {
            font-size: .78rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .06em;
            color: var(--accent);
        }

        .case-dot {
            color: var(--text-2);
        }

        .case-year {
            font-size: .85rem;
            color: var(--text-2);
            font-weight: 500;
        }

        .case-title {
            font-size: clamp(1.75rem, 4vw, 2.6rem);
            line-height: 1.15;
            letter-spacing: -0.02em;
            margin-bottom: 1rem;
            color: var(--text-1);
        }

        .case-lead {
            font-size: 1.1rem;
            color: var(--text-2);
            max-width: 680px;
            margin-bottom: 1.75rem;
        }

        .case-meta-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 1.75rem;
            margin-bottom: 1.75rem;
            padding-bottom: 1.75rem;
            border-bottom: 1px solid var(--border);
        }

        .case-meta-item {
            display: flex;
            flex-direction: column;
            gap: .2rem;
        }

        .case-meta-label {
            font-size: .72rem;
            text-transform: uppercase;
            letter-spacing: .06em;
            color: var(--text-2);
            font-weight: 600;
        }

        .case-meta-value {
            font-size: .95rem;
            color: var(--text-1);
            font-weight: 600;
        }

        .case-actions {
            display: flex;
            flex-wrap: wrap;
            gap: .65rem;
            margin-bottom: 2.5rem;
        }

        .case-cover {
            border-radius: var(--radius);
            overflow: hidden;
            border: 1px solid var(--border);
            box-shadow: var(--shadow-md);
            background: var(--accent-soft);
        }

        .case-cover img {
            width: 100%;
            height: auto;
            display: block;
            aspect-ratio: 16 / 9;
            object-fit: cover;
        }

        /* ============================================================
       CASE STUDY — Content
       ============================================================ */
        .case-content {
            padding: 3rem 0 5rem;
        }

        .case-block {
            margin-bottom: 3rem;
        }

        .case-block:last-child {
            margin-bottom: 0;
        }

        .case-heading {
            font-size: 1.35rem;
            font-weight: 700;
            color: var(--text-1);
            margin-bottom: 1rem;
            position: relative;
            padding-bottom: .55rem;
            letter-spacing: -0.01em;
        }

        .case-heading::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 36px;
            height: 3px;
            background: var(--accent);
            border-radius: 2px;
        }

        .case-body {
            font-size: 1rem;
            line-height: 1.75;
            color: var(--text-2);
        }

        .case-features {
            list-style: none;
            padding: 0;
            margin: 0;
            display: grid;
            gap: .6rem;
        }

        .case-features li {
            display: flex;
            align-items: flex-start;
            gap: .75rem;
            padding: .75rem 1rem;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 10px;
            font-size: .95rem;
            color: var(--text-1);
        }

        .case-features li i {
            color: #10B981;
            flex-shrink: 0;
            margin-top: .15rem;
        }

        /* ============================================================
       CASE STUDY — Sidebar
       ============================================================ */
        .case-sidebar {
            position: sticky;
            top: 88px;
        }

        .sidebar-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 1.25rem;
            margin-bottom: 1rem;
        }

        .sidebar-card:last-child {
            margin-bottom: 0;
        }

        .sidebar-title {
            font-size: .82rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .06em;
            color: var(--text-2);
            margin-bottom: 1rem;
        }

        .sidebar-card .info-list li {
            padding: .55rem 0;
        }

        .sidebar-card .info-list li:last-child {
            padding-bottom: 0;
        }

        .sidebar-card .info-list li:first-child {
            padding-top: 0;
        }

        .sidebar-card .info-list i {
            font-size: 1.05rem;
            margin-top: .1rem;
        }

        .sidebar-card .info-list strong {
            font-size: .82rem;
            color: var(--text-1);
            font-weight: 600;
        }

        .sidebar-card .info-list small {
            font-size: .85rem;
            color: var(--text-2);
        }

        /* ============================================================
       CASE STUDY — Related & CTA
       ============================================================ */
        .case-related {
            margin-top: 4rem;
            padding-top: 3rem;
            border-top: 1px solid var(--border);
        }

        .case-related-header {
            margin-bottom: 2rem;
        }

        .case-related-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-1);
            margin: 0;
            letter-spacing: -0.01em;
        }

        .case-cta {
            margin-top: 4rem;
            padding: 3rem 2rem;
            text-align: center;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
        }

        .case-cta-title {
            font-size: 1.35rem;
            font-weight: 700;
            color: var(--text-1);
            margin-bottom: .5rem;
        }

        .case-cta-text {
            color: var(--text-2);
            margin-bottom: 1.5rem;
        }

        @media (max-width: 991px) {
            .case-sidebar {
                position: static;
            }
        }

        @media (max-width: 576px) {
            .case-hero {
                padding: 2rem 0 1.5rem;
            }

            .case-meta-grid {
                gap: 1.25rem;
            }

            .case-actions {
                flex-direction: column;
            }

            .case-actions .btn {
                width: 100%;
            }

            .case-cta {
                padding: 2rem 1.25rem;
            }
        }

        /* ============================================================
       CONTACT
       ============================================================ */
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

        /* ============================================================
       FOOTER
       ============================================================ */
        .site-footer {
            border-top: 1px solid var(--border);
            padding: 3.5rem 0 2rem;
            color: var(--text-2);
            font-size: .9rem;
            margin-top: 4rem;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr 1fr;
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-brand {
            font-size: 1.15rem;
            font-weight: 800;
            color: var(--text-1);
            text-decoration: none;
            letter-spacing: -0.03em;
            display: inline-block;
            margin-bottom: .75rem;
        }

        .footer-brand .brand-dot {
            color: var(--accent);
        }

        .footer-desc {
            font-size: .9rem;
            line-height: 1.65;
            color: var(--text-2);
            max-width: 320px;
            margin: 0;
        }

        .footer-col-title {
            font-size: .68rem;
            font-weight: 700;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: var(--text-1);
            margin-bottom: 1rem;
        }

        .footer-col-links {
            list-style: none;
            padding: 0;
            margin: 0;
            display: grid;
            gap: .6rem;
        }

        .footer-col-links a {
            color: var(--text-2);
            font-size: .9rem;
            text-decoration: none;
            transition: color .15s ease;
            display: inline-flex;
            align-items: center;
            gap: .5rem;
        }

        .footer-col-links a:hover {
            color: var(--accent);
        }

        .footer-empty {
            color: var(--text-2);
            font-size: .85rem;
        }

        .footer-built {
            color: var(--text-2);
            font-size: .82rem;
        }

        .footer-bottom {
            border-top: 1px solid var(--border);
            padding-top: 2rem;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            font-size: .85rem;
        }

        @media (max-width: 991px) {
            .footer-grid {
                grid-template-columns: 1fr 1fr;
                gap: 2rem;
            }
        }

        @media (max-width: 576px) {
            .footer-grid {
                grid-template-columns: 1fr;
                gap: 1.75rem;
            }

            .site-footer {
                padding: 2.5rem 0 1.5rem;
            }
        }

        /* ============================================================
       WHATSAPP FLOAT
       ============================================================ */
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

        /* ============================================================
       BACK TO TOP
       ============================================================ */
        .back-to-top {
            position: fixed;
            bottom: 90px;
            right: 20px;
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: var(--surface);
            border: 1px solid var(--border);
            color: var(--text-2);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--shadow-md);
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: all .25s var(--ease);
            z-index: 999;
            cursor: pointer;
            padding: 0;
        }

        .back-to-top.visible {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .back-to-top:hover {
            color: var(--accent);
            border-color: var(--accent);
            transform: translateY(-2px);
        }

        @media (max-width: 480px) {
            .back-to-top {
                bottom: 80px;
                right: 16px;
                width: 38px;
                height: 38px;
            }
        }

        /* ============================================================
       THEME TOGGLE
       ============================================================ */
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

        /* ============================================================
       REVEAL ANIMATION
       ============================================================ */
        .reveal {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity .7s var(--ease-out), transform .7s var(--ease-out);
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ============================================================
       UTILITIES
       ============================================================ */
        .text-muted-2 {
            color: var(--text-2);
        }

        a.text-link {
            color: var(--accent);
            text-decoration: none;
            position: relative;
        }

        a.text-link::after {
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            bottom: -2px;
            height: 1px;
            background: var(--accent);
            opacity: .3;
            transition: opacity .2s var(--ease);
        }

        a.text-link:hover::after {
            opacity: 1;
        }

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

        /* ============================================================
       PREFERS-REDUCED-MOTION
       ============================================================ */
        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }

            .reveal {
                opacity: 1 !important;
                transform: none !important;
            }

            .pulse-dot,
            .qv-dot {
                animation: none !important;
            }
        }

        /* ============================================================
       PRINT
       ============================================================ */
        @media print {

            .navbar-portfolio,
            .wa-float,
            .back-to-top,
            .site-footer {
                display: none !important;
            }
        }

        /* ============================================================
   PHASE 3 — GLOBAL POLISH & RESPONSIVE FIX
   ============================================================ */
        html,
        body {
            overflow-x: hidden;
            /* Mencegah layar geser ke kanan di HP */
            width: 100%;
        }

        /* Jarak antar section yang lebih konsisten */
        .section {
            padding: 5rem 0;
        }

        .section-loose {
            padding: 7rem 0 5rem 0;
        }

        .section-tight {
            padding: 3rem 0;
        }

        @media (max-width: 768px) {
            .section {
                padding: 3.5rem 0;
            }

            .section-loose {
                padding: 5rem 0 3rem 0;
            }

            .section-tight {
                padding: 2rem 0;
            }
        }

        /* Memastikan gambar dan konten tidak melebar melewati layar */
        img,
        svg,
        video,
        canvas,
        audio,
        iframe,
        embed,
        object {
            max-width: 100%;
            height: auto;
        }

        /* Tipografi responsif */
        @media (max-width: 576px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .section-title {
                font-size: 1.75rem;
            }

            .hero-actions .btn {
                width: 100%;
                margin-bottom: 0.5rem;
            }
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
    @include('components.back-to-top')

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