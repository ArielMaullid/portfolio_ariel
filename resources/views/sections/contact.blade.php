<section id="contact" class="section section-loose cta-section">
    <div class="container">

        <div class="cta-head reveal">
            <span class="section-eyebrow">Contact</span>
            <h2 class="cta-title">Have a project, opportunity, or idea?</h2>
            <p class="cta-subtitle">
                Let's talk. I'm open to entry-level roles, freelance projects, or collaboration opportunities.
            </p>
        </div>

        @if($globalSocialLinks->isNotEmpty())
        <div class="cta-cards reveal">
            @foreach($globalSocialLinks as $link)
            @php
            $isExternal = str_starts_with($link->url, 'http');
            $subtitle = match($link->platform) {
            'whatsapp' => 'Chat langsung',
            'email' => preg_match('/^mailto:(.+)$/', $link->url, $m) ? $m[1] : 'Kirim email',
            'github' => 'Lihat repository',
            'linkedin' => 'Terhubung profesional',
            'instagram' => 'Follow Instagram',
            default => 'Hubungi via ' . $link->label,
            };
            @endphp

            <a href="{{ $link->url }}"
                @if($isExternal) target="_blank" rel="noopener" @endif
                class="contact-card-link">
                <div class="contact-card">
                    <span class="contact-card-icon">
                        <i class="bi {{ $link->icon }}"></i>
                    </span>
                    <div class="contact-card-body">
                        <span class="contact-card-label">{{ $link->label }}</span>
                        <span class="contact-card-sub">{{ $subtitle }}</span>
                    </div>
                    <span class="contact-card-arrow">
                        <i class="bi bi-arrow-up-right"></i>
                    </span>
                </div>
            </a>
            @endforeach
        </div>
        @else
        <div class="cta-empty reveal">
            <p class="text-muted-2 mb-0">Contact channels will be available soon.</p>
        </div>
        @endif

    </div>
</section>

@push('head')
<style>
    .cta-head {
        text-align: center;
        max-width: 640px;
        margin: 0 auto 3rem;
    }

    .cta-title {
        font-size: clamp(1.65rem, 3.5vw, 2.4rem);
        font-weight: 700;
        color: var(--text-1);
        letter-spacing: -0.025em;
        line-height: 1.15;
        margin-bottom: .85rem;
    }

    .cta-subtitle {
        font-size: 1.05rem;
        color: var(--text-2);
        line-height: 1.65;
        margin: 0;
    }

    .cta-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 1rem;
        max-width: 900px;
        margin: 0 auto;
    }

    .contact-card-link {
        text-decoration: none;
        display: block;
    }

    .contact-card {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1.25rem 1.35rem;
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-sm);
        transition: transform .25s var(--ease),
            box-shadow .25s var(--ease),
            border-color .25s var(--ease);
        height: 100%;
    }

    .contact-card-link:hover .contact-card {
        transform: translateY(-3px);
        box-shadow: var(--shadow-lg);
        border-color: color-mix(in srgb, var(--accent) 30%, var(--border));
    }

    .contact-card-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: var(--accent-soft);
        color: var(--accent);
        font-size: 1.35rem;
        flex-shrink: 0;
        transition: transform .25s var(--ease);
    }

    .contact-card-link:hover .contact-card-icon {
        transform: scale(1.05);
    }

    .contact-card-body {
        display: flex;
        flex-direction: column;
        gap: .15rem;
        min-width: 0;
        flex: 1;
    }

    .contact-card-label {
        font-size: 1rem;
        font-weight: 700;
        color: var(--text-1);
        letter-spacing: -0.01em;
    }

    .contact-card-sub {
        font-size: .85rem;
        color: var(--text-2);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .contact-card-arrow {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border-radius: 8px;
        color: var(--text-3);
        font-size: .9rem;
        flex-shrink: 0;
        transition: color .25s var(--ease), transform .25s var(--ease);
    }

    .contact-card-link:hover .contact-card-arrow {
        color: var(--accent);
        transform: translate(2px, -2px);
    }

    .cta-empty {
        text-align: center;
        padding: 3rem 1rem;
        border: 1px dashed var(--border);
        border-radius: var(--radius-lg);
        max-width: 500px;
        margin: 0 auto;
    }

    @media (max-width: 576px) {
        .cta-cards {
            grid-template-columns: 1fr;
            gap: .75rem;
        }

        .contact-card {
            padding: 1.1rem 1.2rem;
        }

        .contact-card-icon {
            width: 42px;
            height: 42px;
            font-size: 1.2rem;
        }
    }
</style>
@endpush