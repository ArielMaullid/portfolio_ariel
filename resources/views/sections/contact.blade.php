<section id="contact" class="section" style="padding-bottom: 2rem;">
    <div class="container">

        <div class="contact-header reveal">
            <span class="section-eyebrow">Contact</span>
            <h2 class="section-title mb-3">Let's Work Together</h2>
            <p class="section-subtitle mb-5">
                Terbuka untuk peluang kerja, magang, maupun proyek profesional. Silakan hubungi saya melalui kanal berikut.
            </p>
        </div>

        @if($globalSocialLinks->isNotEmpty())
            <div class="row g-4 reveal">
                @foreach($globalSocialLinks as $link)
                    @php
                        $isExternal = str_starts_with($link->url, 'http');
                        $subtitle = match($link->platform) {
                            'whatsapp'  => 'Chat langsung',
                            'email'     => preg_match('/^mailto:(.+)$/', $link->url, $m) ? $m[1] : 'Kirim email',
                            'github'    => 'Lihat repositori',
                            'linkedin'  => 'Terhubung profesional',
                            'instagram' => 'Ikuti Instagram',
                            default     => 'Hubungi via ' . $link->label,
                        };
                        $accentColor = match($link->platform) {
                            'whatsapp'  => '#25D366',
                            'github'    => '#333333',
                            'linkedin'  => '#0A66C2',
                            'instagram' => '#E1306C',
                            default     => 'var(--accent)',
                        };
                    @endphp

                    <div class="col-md-6 col-lg-4">
                        <a href="{{ $link->url }}"
                           @if($isExternal) target="_blank" rel="noopener" @endif
                           class="contact-card-anim"
                           style="--card-accent: {{ $accentColor }};">

                            <span class="contact-icon-anim">
                                <i class="bi {{ $link->icon }}"></i>
                            </span>

                            <span class="contact-text-anim">
                                <span class="contact-label-anim">{{ $link->label }}</span>
                                <span class="contact-sub-anim">{{ $subtitle }}</span>
                            </span>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="card-surface p-5 text-center reveal">
                <p class="text-muted-2 mb-0">Kanal kontak akan segera tersedia.</p>
            </div>
        @endif

    </div>
</section>

@push('head')
<style>
    /* ============================================================
       CONTACT CARD — Animated
       ============================================================ */
    .contact-card-anim {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1.35rem 1.5rem;
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        text-decoration: none;
        position: relative;
        overflow: hidden;
        height: 100%;
        transition:
            transform .35s cubic-bezier(0.34, 1.56, 0.64, 1),
            box-shadow .35s var(--ease),
            border-color .35s var(--ease),
            background-color .35s var(--ease);
    }

    /* Background gradient glow muncul saat hover */
    .contact-card-anim::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(
            135deg,
            color-mix(in srgb, var(--card-accent) 12%, transparent) 0%,
            transparent 60%
        );
        opacity: 0;
        transition: opacity .4s var(--ease);
        pointer-events: none;
    }

    /* Accent line tipis di kiri */
    .contact-card-anim::after {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 3px;
        height: 0;
        background: var(--card-accent);
        border-radius: 0 3px 3px 0;
        transition: height .4s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    /* Hover state */
    .contact-card-anim:hover {
        transform: translateY(-5px);
        border-color: color-mix(in srgb, var(--card-accent) 40%, var(--border));
        box-shadow:
            0 10px 30px -8px color-mix(in srgb, var(--card-accent) 30%, transparent),
            0 4px 12px rgba(0, 0, 0, 0.08);
        background: color-mix(in srgb, var(--surface) 96%, var(--card-accent));
    }

    .contact-card-anim:hover::before {
        opacity: 1;
    }

    .contact-card-anim:hover::after {
        height: 60%;
    }

    /* Icon wrapper */
    .contact-icon-anim {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: color-mix(in srgb, var(--card-accent) 12%, transparent);
        color: var(--card-accent);
        font-size: 1.35rem;
        flex-shrink: 0;
        position: relative;
        z-index: 1;
        transition:
            transform .4s cubic-bezier(0.34, 1.56, 0.64, 1),
            background-color .3s var(--ease),
            color .3s var(--ease);
    }

    .contact-card-anim:hover .contact-icon-anim {
        transform: scale(1.1) rotate(-6deg);
        background: var(--card-accent);
        color: #ffffff;
    }

    /* Text */
    .contact-text-anim {
        display: flex;
        flex-direction: column;
        gap: .25rem;
        min-width: 0;
        position: relative;
        z-index: 1;
    }

    .contact-label-anim {
        font-size: 1rem;
        font-weight: 700;
        color: var(--text-1);
        letter-spacing: -0.01em;
        line-height: 1.2;
        transition: color .3s var(--ease);
    }

    .contact-card-anim:hover .contact-label-anim {
        color: var(--card-accent);
    }

    .contact-sub-anim {
        font-size: .85rem;
        color: var(--text-2);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 1.2;
    }

    /* Dark mode tweak */
    [data-bs-theme="dark"] .contact-card-anim:hover {
        box-shadow:
            0 12px 32px -8px color-mix(in srgb, var(--card-accent) 40%, transparent),
            0 4px 12px rgba(0, 0, 0, 0.3);
    }

    [data-bs-theme="dark"] .contact-card-anim[style*="--card-accent: #333333"] .contact-icon-anim {
        background: rgba(255, 255, 255, 0.08);
        color: #ffffff;
    }

    [data-bs-theme="dark"] .contact-card-anim[style*="--card-accent: #333333"]:hover .contact-icon-anim {
        background: #ffffff;
        color: #0B1220;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .contact-card-anim {
            padding: 1.15rem 1.25rem;
        }
        .contact-icon-anim {
            width: 44px;
            height: 44px;
            font-size: 1.2rem;
        }
    }

    /* Respect reduced motion */
    @media (prefers-reduced-motion: reduce) {
        .contact-card-anim,
        .contact-card-anim::before,
        .contact-card-anim::after,
        .contact-icon-anim,
        .contact-label-anim {
            transition-duration: 0.01ms !important;
        }
    }
</style>
@endpush