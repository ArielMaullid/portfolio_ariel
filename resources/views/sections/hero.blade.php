@php
    $photoPath = $globalProfile->photo ?? config('portfolio.profile_photo');
    $photoFull = public_path($photoPath);
    $photoUrl = file_exists($photoFull)
        ? asset($photoPath)
        : 'https://ui-avatars.com/api/?name=' . urlencode($globalProfile->full_name) . '&size=400&background=2563EB&color=fff&bold=true';

    $cvPath = $globalProfile->cv_file ?? config('portfolio.cv_path');
    $cvFull = public_path($cvPath);
    $cvExists = file_exists($cvFull);
@endphp

<section id="home" class="section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <span class="hero-badge">
                    <span class="pulse-dot"></span>
                    Open to opportunities
                </span>

                <h1 class="hero-title">
                    Hello, I'm <span class="text-accent">{{ $globalProfile->full_name }}</span>
                </h1>

                <p class="hero-subtitle">{{ $globalProfile->headline }}</p>

                @if($globalProfile->short_bio)
                    <p class="hero-bio">{{ $globalProfile->short_bio }}</p>
                @endif

                <div class="hero-actions">
                    <a href="#projects" class="btn btn-primary btn-lg">
                        <i class="bi bi-collection me-1"></i> View My Projects
                    </a>

                    @if($cvExists)
                        <a href="{{ asset($cvPath) }}"
                           class="btn btn-outline-secondary btn-lg"
                           download
                           target="_blank"
                           rel="noopener">
                            <i class="bi bi-download me-1"></i> Download CV
                        </a>
                    @else
                        <button class="btn btn-outline-secondary btn-lg" disabled
                                title="CV belum tersedia">
                            <i class="bi bi-download me-1"></i> Download CV
                        </button>
                    @endif

                    <a href="#contact" class="btn btn-link btn-lg text-decoration-none">
                        Contact Me <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

                @if($globalSocialLinks->isNotEmpty())
                    <div class="hero-social">
                        @foreach($globalSocialLinks as $link)
                            <a href="{{ $link->url }}"
                               class="social-icon"
                               target="_blank"
                               rel="noopener"
                               aria-label="{{ $link->label }}">
                                <i class="bi {{ $link->icon }}"></i>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="col-lg-5">
                <div class="profile-photo-wrap reveal">
                    <img src="{{ $photoUrl }}"
                         alt="Foto {{ $globalProfile->full_name }}"
                         class="profile-photo">
                </div>
            </div>
        </div>
    </div>
</section>