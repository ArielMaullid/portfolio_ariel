@php
    // Warna & style per platform
    $platformStyles = [
        'whatsapp'  => ['bg' => 'rgba(37,211,102,0.12)',  'fg' => '#25D366'],
        'email'     => ['bg' => 'var(--accent-soft)',      'fg' => 'var(--accent)'],
        'github'    => ['bg' => 'rgba(120,120,120,0.12)', 'fg' => 'var(--text-1)'],
        'linkedin'  => ['bg' => 'rgba(10,102,194,0.12)',  'fg' => '#0A66C2'],
        'instagram' => ['bg' => 'rgba(225,48,108,0.12)',  'fg' => '#E1306C'],
        'twitter'   => ['bg' => 'rgba(29,161,242,0.12)',  'fg' => '#1DA1F2'],
        'facebook'  => ['bg' => 'rgba(24,119,242,0.12)',  'fg' => '#1877F2'],
        'youtube'   => ['bg' => 'rgba(255,0,0,0.12)',     'fg' => '#FF0000'],
    ];

    // Subtitle default per platform
    $platformSubtitles = [
        'whatsapp'  => 'Chat langsung',
        'github'    => 'Lihat repository',
        'linkedin'  => 'Terhubung profesional',
        'instagram' => 'Follow Instagram',
        'twitter'   => 'Follow Twitter',
        'facebook'  => 'Follow Facebook',
        'youtube'   => 'Lihat channel',
    ];
@endphp

<section id="contact" class="section">
    <div class="container">
        <div class="reveal">
            <span class="section-eyebrow">Contact</span>
            <h2 class="section-title">Let's Work Together</h2>
            <p class="section-subtitle">
                Terbuka untuk peluang kerja, magang, maupun project profesional. Silakan hubungi saya melalui channel berikut.
            </p>
        </div>

        @if($globalSocialLinks->isEmpty())
            <div class="card-surface p-5 text-center">
                <i class="bi bi-inbox fs-1 text-muted-2"></i>
                <p class="text-muted-2 mb-0 mt-2">Belum ada channel kontak yang tersedia.</p>
            </div>
        @else
            <div class="row g-4">
                @foreach($globalSocialLinks as $link)
                    @php
                        $style = $platformStyles[$link->platform] ?? [
                            'bg' => 'var(--accent-soft)',
                            'fg' => 'var(--accent)',
                        ];

                        // Subtitle: untuk email, extract alamatnya; untuk lain, pakai mapping
                        $subtitle = $platformSubtitles[$link->platform] ?? 'Hubungi via ' . $link->label;

                        if ($link->platform === 'email' && preg_match('/^mailto:(.+)$/', $link->url, $m)) {
                            $subtitle = $m[1];
                        }

                        $isExternal = str_starts_with($link->url, 'http');
                    @endphp

                    <div class="col-md-6 col-lg-3 reveal">
                        <a href="{{ $link->url }}"
                           @if($isExternal) target="_blank" rel="noopener" @endif
                           class="text-decoration-none">
                            <div class="card-surface contact-card h-100">
                                <div class="contact-icon" style="background: {{ $style['bg'] }}; color: {{ $style['fg'] }};">
                                    <i class="bi {{ $link->icon }}"></i>
                                </div>
                                <div class="contact-info">
                                    <strong>{{ $link->label }}</strong>
                                    <small class="text-truncate d-block" style="max-width:160px;">
                                        {{ $subtitle }}
                                    </small>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>