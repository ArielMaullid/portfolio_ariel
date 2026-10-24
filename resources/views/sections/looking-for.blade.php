<section id="looking-for" class="section-tight lf-section">
    <div class="container">
        <div class="lf-card reveal">

            <div class="lf-header">
                <div>
                    <span class="lf-eyebrow">Currently Looking For</span>
                    <h2 class="lf-title">Open to Entry-Level Opportunities</h2>
                </div>
                <div class="lf-status">
                    <span class="lf-dot"></span>
                    Available now
                </div>
            </div>

            <div class="lf-grid">
                <div class="lf-block">
                    <span class="lf-icon"><i class="bi bi-briefcase"></i></span>
                    <span class="lf-label">Position</span>
                    <ul class="lf-list">
                        <li>Web Developer</li>
                        <li>Laravel Developer</li>
                        <li>Junior Software Developer</li>
                        <li>IT Staff</li>
                    </ul>
                </div>

                <div class="lf-block">
                    <span class="lf-icon"><i class="bi bi-clock-history"></i></span>
                    <span class="lf-label">Type</span>
                    <ul class="lf-list">
                        <li>Full-time <span class="lf-tag">priority</span></li>
                        <li>Contract</li>
                        <li>Internship</li>
                    </ul>
                </div>

                <div class="lf-block">
                    <span class="lf-icon"><i class="bi bi-geo-alt"></i></span>
                    <span class="lf-label">Location</span>
                    <ul class="lf-list">
                        <li>Remote</li>
                        <li>On-site</li>
                        <li>Hybrid</li>
                    </ul>
                </div>

                <div class="lf-block">
                    <span class="lf-icon"><i class="bi bi-map"></i></span>
                    <span class="lf-label">Area</span>
                    <ul class="lf-list">
                        <li>Sukabumi</li>
                        <li>Jakarta</li>
                        <li>Area lainnya</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

@push('head')
<style>
    .lf-section {
        padding-top: 0;
    }

    .lf-card {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        box-shadow: var(--shadow-sm);
        padding: 2.5rem 2rem;
    }

    .lf-header {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: flex-end;
        gap: 1rem;
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid var(--border);
    }

    .lf-eyebrow {
        display: inline-block;
        font-size: .72rem;
        font-weight: 700;
        letter-spacing: .1em;
        text-transform: uppercase;
        color: var(--accent);
        margin-bottom: .5rem;
    }

    .lf-title {
        font-size: clamp(1.35rem, 2.5vw, 1.65rem);
        font-weight: 700;
        color: var(--text-1);
        margin: 0;
        letter-spacing: -0.02em;
    }

    .lf-status {
        display: inline-flex;
        align-items: center;
        gap: .5rem;
        font-size: .85rem;
        font-weight: 500;
        color: var(--text-2);
    }

    .lf-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #10B981;
        box-shadow: 0 0 0 0 rgba(16, 185, 129, .5);
        animation: qvPulse 2.5s infinite;
    }

    .lf-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 2rem;
    }

    .lf-block {
        min-width: 0;
    }

    .lf-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 34px;
        height: 34px;
        border-radius: 8px;
        background: var(--accent-soft);
        color: var(--accent);
        font-size: 1rem;
        margin-bottom: .85rem;
    }

    .lf-label {
        display: block;
        font-size: .72rem;
        font-weight: 700;
        letter-spacing: .08em;
        text-transform: uppercase;
        color: var(--text-2);
        margin-bottom: .75rem;
    }

    .lf-list {
        list-style: none;
        padding: 0;
        margin: 0;
        display: grid;
        gap: .5rem;
    }

    .lf-list li {
        font-size: .95rem;
        color: var(--text-1);
        font-weight: 500;
    }

    .lf-tag {
        display: inline-block;
        font-size: .65rem;
        font-weight: 700;
        letter-spacing: .05em;
        text-transform: uppercase;
        color: var(--accent);
        background: var(--accent-soft);
        padding: .1rem .45rem;
        border-radius: 4px;
        margin-left: .35rem;
        vertical-align: middle;
    }

    @media (max-width: 991px) {
        .lf-card {
            padding: 1.75rem 1.5rem;
        }

        .lf-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 1.75rem;
        }
    }

    @media (max-width: 576px) {
        .lf-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .lf-header {
            align-items: flex-start;
        }
    }
</style>
@endpush