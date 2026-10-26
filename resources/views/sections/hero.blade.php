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

<section id="home" class="section" style="padding-top: 5rem; padding-bottom: 3rem;">
    <div class="container">
        <div class="row align-items-center g-5">

            {{-- Kiri: Teks & CTA --}}
            <div class="col-lg-7">
                <span class="hero-badge">
                    <span class="pulse-dot"></span>
                    Open to IT Opportunities
                </span>

                <h1 class="hero-title">
                    {{ $globalProfile->full_name }}
                </h1>

                <p class="hero-subtitle">Fresh Graduate S1 Teknik Informatika</p>

                <p class="hero-bio">
                    Lulusan S1 Teknik Informatika Universitas Muhammadiyah Sukabumi dengan pengalaman mengerjakan proyek pengembangan aplikasi web, pengelolaan basis data, dan machine learning. Terbuka terhadap berbagai peluang karier di bidang IT serta siap belajar, berkembang, dan berkontribusi secara profesional.
                </p>

                <div class="hero-actions">
                    <a href="#projects" class="btn btn-primary btn-lg">
                        <i class="bi bi-collection me-1"></i> Lihat Proyek
                    </a>
                    <a href="#contact" class="btn btn-outline-secondary btn-lg">
                        <i class="bi bi-chat-dots me-1"></i> Hubungi Saya
                    </a>
                </div>

                {{-- CV Block --}}
                @if($cvExists)
                <div class="hero-cv">
                    <a href="{{ asset($cvPath) }}" download class="btn btn-link">
                        <i class="bi bi-download me-1"></i> Unduh CV
                    </a>
                    <span class="hero-cv-sep">·</span>
                    <a href="{{ asset($cvPath) }}" target="_blank" rel="noopener" class="btn btn-link">
                        <i class="bi bi-eye me-1"></i> Lihat CV
                    </a>
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

{{-- ============================================================ --}}
{{-- FASE 3: HERO MOBILE FIX (Rata tengah & perkecil foto di HP) --}}
{{-- ============================================================ --}}
@push('head')
<style>
    @media (max-width: 991px) {
        .profile-photo-wrap {
            max-width: 280px;
            /* Memperkecil ukuran foto di HP/Tablet */
            margin: 2rem auto 0 auto;
            /* Foto ke tengah */
        }

        .hero-title,
        .hero-subtitle,
        .hero-bio {
            text-align: center;
            /* Teks ke tengah */
        }

        .hero-bio {
            margin-left: auto;
            margin-right: auto;
        }

        .hero-actions,
        .hero-cv {
            justify-content: center;
            /* Tombol ke tengah */
        }
    }
</style>
@endpush