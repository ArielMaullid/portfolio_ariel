@php
$photoPath = $globalProfile->photo ?? config('portfolio.profile_photo');
$photoFull = public_path($photoPath);
$photoUrl = file_exists($photoFull)
? asset($photoPath)
: 'https://ui-avatars.com/api/?name=' . urlencode($globalProfile->full_name) . '&size=400&background=2563EB&color=fff&bold=true';

$cvPath = $globalProfile->cv_file ?? config('portfolio.cv_path');
$cvFull = public_path($cvPath);
$cvExists = file_exists($cvFull);
$cvUpdated = config('portfolio.cv_last_updated');
@endphp

<section id="home" class="section section-loose" style="padding-bottom: 60px;">
    <div class="container">
        <div class="row align-items-center g-5">

            {{-- Kiri: Teks & CTA --}}
            <div class="col-lg-7">
                <span class="hero-badge">
                    <span class="pulse-dot"></span>
                    Open to Opportunities
                </span>
                <h1 class="hero-title">
                    {{ $globalProfile->full_name }}
                </h1>

                <p class="hero-subtitle">{{ $globalProfile->headline }}</p>

                @if($globalProfile->short_bio)
                <p class="hero-bio">{{ $globalProfile->short_bio }}</p>
                @endif

                <div class="hero-actions">
                    <a href="#projects" class="btn btn-primary btn-lg">
                        <i class="bi bi-collection me-1"></i> View My Projects
                    </a>
                    <a href="#contact" class="btn btn-outline-secondary btn-lg">
                        <i class="bi bi-chat-dots me-1"></i> Let's Talk
                    </a>
                </div>

                {{-- CV Block --}}
                @if($cvExists)
                <div class="hero-cv">
                    <a href="{{ asset($cvPath) }}" download class="btn btn-link">
                        <i class="bi bi-download me-1"></i> Download CV
                    </a>
                    <span class="hero-cv-sep">·</span>
                    <a href="{{ asset($cvPath) }}" target="_blank" rel="noopener" class="btn btn-link">
                        <i class="bi bi-eye me-1"></i> View CV
                    </a>
                    @if($cvUpdated)
                    <span class="hero-cv-date">Last updated {{ $cvUpdated }}</span>
                    @endif
                </div>
                @else
                <div class="hero-cv">
                    <span class="hero-cv-pending">
                        <i class="bi bi-file-earmark-text me-1"></i>
                        CV will be available soon
                    </span>
                </div>
                @endif

                {{-- Social Links --}}
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

            {{-- Kanan: Foto Profil --}}
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