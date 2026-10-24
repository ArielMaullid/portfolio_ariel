@php
$totalProjects = \App\Models\Project::count();
@endphp
@push('head')
<style>
    .qv-section {
        padding-bottom: 3rem;
    }

    .qv-card {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        box-shadow: var(--shadow-sm);
        padding: 2rem;
        display: grid;
        grid-template-columns: 1.2fr 2fr;
        gap: 2.5rem;
        align-items: center;
    }

    .qv-label {
        display: inline-block;
        font-size: .7rem;
        font-weight: 700;
        letter-spacing: .1em;
        color: var(--text-2);
        margin-bottom: .5rem;
    }

    .qv-focus-text {
        font-size: 1.05rem;
        font-weight: 600;
        color: var(--text-1);
        margin: 0;
        letter-spacing: -0.01em;
    }

    .qv-stats {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1.5rem;
        border-left: 1px solid var(--border);
        padding-left: 2.5rem;
    }

    .qv-stat {
        min-width: 0;
    }

    .qv-stat-value {
        font-size: 1.65rem;
        font-weight: 700;
        color: var(--text-1);
        line-height: 1.1;
        letter-spacing: -0.02em;
        margin-bottom: .35rem;
        display: flex;
        align-items: center;
        min-height: 1.85rem;
    }

    .qv-stat-label {
        font-size: .78rem;
        color: var(--text-2);
        text-transform: uppercase;
        letter-spacing: .05em;
        font-weight: 500;
    }

    .qv-dot {
        width: 14px;
        height: 14px;
        border-radius: 50%;
        background: #10B981;
        box-shadow: 0 0 0 0 rgba(16, 185, 129, .5);
        animation: qvPulse 2.5s infinite;
    }

    @keyframes qvPulse {
        0% {
            box-shadow: 0 0 0 0 rgba(16, 185, 129, .5);
        }

        70% {
            box-shadow: 0 0 0 10px rgba(16, 185, 129, 0);
        }

        100% {
            box-shadow: 0 0 0 0 rgba(16, 185, 129, 0);
        }
    }

    @media (max-width: 991px) {
        .qv-card {
            grid-template-columns: 1fr;
            gap: 1.5rem;
            padding: 1.5rem;
        }

        .qv-stats {
            border-left: none;
            border-top: 1px solid var(--border);
            padding-left: 0;
            padding-top: 1.5rem;
        }
    }

    @media (max-width: 576px) {
        .qv-stats {
            grid-template-columns: 1fr 1fr;
            gap: 1.25rem;
        }

        .qv-stat-value {
            font-size: 1.4rem;
        }
    }
</style>
@endpush