<section id="about" class="section section-loose">
    <div class="container">
        <div class="reveal">
            <span class="section-eyebrow">About Me</span>
            <h2 class="section-title">Tentang Saya</h2>
            <p class="section-subtitle">
                Latar belakang, minat, dan fokus pengembangan saya.
            </p>
        </div>

        <div class="row g-5">
            <div class="col-lg-7 reveal">
                @if($globalProfile->about_me)
                @foreach(explode("\n\n", $globalProfile->about_me) as $paragraph)
                @if(trim($paragraph))
                <div class="about-block">
                    <p class="about-text">{{ trim($paragraph) }}</p>
                </div>
                @endif
                @endforeach
                @else
                <div class="about-block">
                    <p class="about-text">[DATA BELUM DIISI]</p>
                </div>
                @endif
            </div>

            <div class="col-lg-5 reveal">
                <div class="card-surface p-4">
                    <h3 class="h6 mb-3 text-uppercase text-muted-2" style="letter-spacing:0.08em;">
                        Quick Info
                    </h3>
                    <ul class="info-list">
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
    .about-block {
        margin-bottom: 1.75rem;
    }

    .about-block:last-child {
        margin-bottom: 0;
    }

    .about-heading {
        font-size: 1rem;
        font-weight: 700;
        color: var(--text-1);
        margin-bottom: .5rem;
        letter-spacing: -0.01em;
    }

    .about-text {
        color: var(--text-2);
        line-height: 1.75;
        margin: 0;
    }
</style>
@endpush