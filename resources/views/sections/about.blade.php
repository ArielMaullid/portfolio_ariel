<section id="about" class="section">
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
                            <p class="text-muted-2">{{ trim($paragraph) }}</p>
                        @endif
                    @endforeach
                @else
                    <p class="text-muted-2">[DATA BELUM DIISI]</p>
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