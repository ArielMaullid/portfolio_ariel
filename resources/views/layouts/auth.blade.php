<!DOCTYPE html>
<html lang="id" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">

    <title>@yield('title', 'Admin') — {{ config('portfolio.name') }}</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <script>
        (function () {
            const stored = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            const theme = stored || (prefersDark ? 'dark' : 'light');
            document.documentElement.setAttribute('data-bs-theme', theme);
        })();
    </script>

    <style>
        :root {
            --bg:        #FAFAFA;
            --surface:   #FFFFFF;
            --text-1:    #111827;
            --text-2:    #4B5563;
            --border:    #E5E7EB;
            --accent:    #2563EB;
            --accent-h:  #1D4ED8;
            --accent-soft: rgba(37, 99, 235, 0.08);
            --shadow-md: 0 4px 12px rgba(0,0,0,0.06);
            --radius:    12px;
        }
        [data-bs-theme="dark"] {
            --bg:        #0F172A;
            --surface:   #1E293B;
            --text-1:    #F1F5F9;
            --text-2:    #94A3B8;
            --border:    #334155;
            --accent:    #60A5FA;
            --accent-h:  #3B82F6;
            --accent-soft: rgba(96, 165, 250, 0.12);
            --shadow-md: 0 4px 12px rgba(0,0,0,0.4);
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background: var(--bg);
            color: var(--text-1);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            -webkit-font-smoothing: antialiased;
            transition: background-color .2s ease, color .2s ease;
        }

        /* Akses dekoratif: gradien halus di background */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background:
                radial-gradient(circle at 15% 20%, var(--accent-soft) 0%, transparent 40%),
                radial-gradient(circle at 85% 80%, var(--accent-soft) 0%, transparent 40%);
            pointer-events: none;
            z-index: 0;
        }

        .auth-wrap {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 420px;
        }

        .auth-brand {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .5rem;
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--text-1);
            margin-bottom: 1.5rem;
            text-decoration: none;
        }
        .auth-brand:hover { color: var(--accent); }
        .auth-brand .brand-dot { color: var(--accent); }

        .auth-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow-md);
            padding: 2rem;
        }

        .auth-title {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: .35rem;
            letter-spacing: -0.02em;
        }
        .auth-subtitle {
            color: var(--text-2);
            font-size: .9rem;
            margin-bottom: 1.75rem;
        }

        .form-label {
            font-weight: 500;
            font-size: .9rem;
            color: var(--text-1);
            margin-bottom: .35rem;
        }

        .form-control, .form-select {
            background: var(--bg);
            border: 1px solid var(--border);
            color: var(--text-1);
            padding: .6rem .85rem;
            border-radius: 8px;
            font-size: .95rem;
            transition: border-color .15s ease, box-shadow .15s ease;
        }
        .form-control:focus, .form-select:focus {
            background: var(--bg);
            border-color: var(--accent);
            color: var(--text-1);
            box-shadow: 0 0 0 3px var(--accent-soft);
        }
        .form-control::placeholder { color: var(--text-2); opacity: .7; }

        .form-check-input {
            background-color: var(--bg);
            border-color: var(--border);
        }
        .form-check-input:checked {
            background-color: var(--accent);
            border-color: var(--accent);
        }
        .form-check-label {
            font-size: .9rem;
            color: var(--text-2);
        }

        .btn { font-weight: 500; border-radius: 8px; transition: all .15s ease; }
        .btn-primary {
            background: var(--accent);
            border-color: var(--accent);
            padding: .6rem 1rem;
        }
        .btn-primary:hover {
            background: var(--accent-h);
            border-color: var(--accent-h);
        }

        .auth-footer {
            text-align: center;
            color: var(--text-2);
            font-size: .85rem;
            margin-top: 1.5rem;
        }
        .auth-footer a { color: var(--accent); text-decoration: none; }
        .auth-footer a:hover { text-decoration: underline; }

        /* Alert override */
        .alert {
            border-radius: 10px;
            border: 1px solid transparent;
            font-size: .9rem;
            padding: .75rem 1rem;
        }
        .alert-danger {
            background: rgba(239, 68, 68, 0.08);
            border-color: rgba(239, 68, 68, 0.25);
            color: #DC2626;
        }
        [data-bs-theme="dark"] .alert-danger { color: #FCA5A5; }

        .alert-success {
            background: rgba(16, 185, 129, 0.08);
            border-color: rgba(16, 185, 129, 0.25);
            color: #059669;
        }
        [data-bs-theme="dark"] .alert-success { color: #6EE7B7; }
    </style>
</head>
<body>

    <div class="auth-wrap">
        <a href="{{ route('home') }}" class="auth-brand">
            {{ config('portfolio.name') }}<span class="brand-dot">.</span>
        </a>

        <div class="auth-card">
            @yield('content')
        </div>

        <div class="auth-footer">
            &copy; {{ date('Y') }} {{ config('portfolio.name') }}
            &middot;
            <a href="{{ route('home') }}">Kembali ke Portfolio</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>