<section id="about" class="section" style="padding-top: 2rem; padding-bottom: 3rem;">
    <div class="container">
        <div class="row g-5">
            
            {{-- Kolom Kiri: Judul + Deskripsi --}}
            <div class="col-lg-7 reveal">
                <div class="mb-4">
                    <span class="section-eyebrow">About Me</span>
                    <h2 class="section-title mb-2">Tentang Saya</h2>
                </div>

                <div class="about-block">
                    <ul class="about-list">
                        <li>
                            <strong>Latar Belakang:</strong> Lulusan S1 Teknik Informatika Universitas Muhammadiyah Sukabumi dengan fondasi kuat pada teknologi informasi, pengembangan perangkat lunak, dan pengelolaan basis data.
                        </li>
                        <li>
                            <strong>Pengalaman Proyek:</strong> Selama masa perkuliahan, saya telah membangun aplikasi presensi pegawai berbasis web menggunakan Laravel, serta mengembangkan sistem klasifikasi Tuberculosis (TBC) menggunakan model machine learning.
                        </li>
                        <li>
                            <strong>Arah Karier:</strong> Berfokus pada pengembangan solusi digital, saya bertujuan untuk terus mengasah kemampuan teknis dan berkontribusi secara nyata pada industri teknologi informasi.
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Kolom Kanan: Card Quick Info --}}
            <div class="col-lg-5 reveal">
                <div class="card-surface p-4">
                    <h3 class="h6 mb-3 text-uppercase text-muted-2" style="letter-spacing:0.08em; font-weight: 700;">
                        Quick Info
                    </h3>
                    <ul class="info-list mb-0">
                        @if($globalProfile->full_name)
                        <li>
                            <i class="bi bi-person"></i>
                            <div>
                                <strong>{{ $globalProfile->full_name }}</strong><br>
                                <small>{{ $globalProfile->headline }}</small>
                            </div>
                        </li>
                        @endif
                        @if($globalProfile->location)
                        <li>
                            <i class="bi bi-geo-alt"></i>
                            <span>{{ $globalProfile->location }}</span>
                        </li>
                        @endif
                        @if($globalProfile->university)
                        <li>
                            <i class="bi bi-mortarboard"></i>
                            <div>
                                <strong>{{ $globalProfile->university }}</strong><br>
                                <small>{{ $globalProfile->major ?? '' }}</small>
                            </div>
                        </li>
                        @endif
                        @if($globalProfile->graduation_status)
                        <li>
                            <i class="bi bi-patch-check"></i>
                            <span>{{ $globalProfile->graduation_status }}</span>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@push('head')
<style>
    .about-list { padding-left: 1.2rem; margin: 0; }
    .about-list li { color: var(--text-2); line-height: 1.7; font-size: 0.95rem; margin-bottom: 1rem; }
    .about-list li:last-child { margin-bottom: 0; }
    .about-list li::marker { color: var(--accent); }
    .about-list strong { color: var(--text-1); display: block; margin-bottom: 0.2rem; }
    .info-list { list-style: none; padding: 0; margin: 0; }
    .info-list li { display: flex; gap: .75rem; padding: .85rem 0; border-bottom: 1px solid var(--border); color: var(--text-2); }
    .info-list li:last-child { border-bottom: none; padding-bottom: 0; }
    .info-list i { color: var(--accent); font-size: 1.1rem; flex-shrink: 0; margin-top: .15rem; }
</style>
@endpush