<nav class="navbar navbar-expand-lg navbar-portfolio sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            {{ config('portfolio.name') }}<span class="brand-dot">.</span>
        </a>

        <div class="d-flex align-items-center gap-2 order-lg-3">
            <button type="button" class="theme-toggle" id="themeToggle" aria-label="Toggle tema">
                <i class="bi bi-moon-stars icon-light"></i>
                <i class="bi bi-sun icon-dark"></i>
            </button>
            <button class="navbar-toggler border-0 p-1" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list fs-4"></i>
            </button>
        </div>

        <div class="collapse navbar-collapse order-lg-2" id="navbarNav">
            <ul class="navbar-nav ms-auto me-lg-3">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#education">Education</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#skills">Skills</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('projects.index') }}">Projects</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#contact">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>