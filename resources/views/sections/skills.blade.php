@if($globalSkills->isNotEmpty())
<section id="skills" class="section">
    <div class="container">
        <div class="reveal">
            <span class="section-eyebrow">Skills</span>
            <h2 class="section-title">Teknologi & Kemampuan</h2>
            <p class="section-subtitle">
                Tools dan teknologi yang saya gunakan dalam mengerjakan project.
            </p>
        </div>

        <div class="row g-4">
            @php
            $categoryIcons = [
            'Web Development' => 'bi-code-slash',
            'Database' => 'bi-database',
            'Tools' => 'bi-tools',
            'Machine Learning' => 'bi-cpu',
            ];
            @endphp
            @foreach($globalSkills as $category => $skills)
            <div class="col-md-6 col-lg-6 reveal">
                <div class="skill-card">
                    <div class="skill-card-head">
                        <span class="skill-icon">
                            <i class="bi {{ $categoryIcons[$category] ?? 'bi-lightning-charge' }}"></i>
                        </span>
                        <h3 class="skill-category-title">{{ $category }}</h3>
                    </div>
                    <div class="skill-chip-wrap">
                        @foreach($skills as $skill)
                        <span class="skill-chip">{{ $skill->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@push('head')
<style>
    .skill-card {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 1.5rem;
        height: 100%;
        transition: border-color .15s ease;
    }

    .skill-card:hover {
        border-color: color-mix(in srgb, var(--accent) 30%, var(--border));
    }

    .skill-card-head {
        display: flex;
        align-items: center;
        gap: .75rem;
        margin-bottom: 1.25rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid var(--border);
    }

    .skill-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 38px;
        height: 38px;
        border-radius: 10px;
        background: var(--accent-soft);
        color: var(--accent);
        font-size: 1.1rem;
        flex-shrink: 0;
    }

    .skill-category-title {
        font-size: 1rem;
        font-weight: 700;
        color: var(--text-1);
        margin: 0;
        letter-spacing: -0.01em;
    }

    .skill-chip-wrap {
        display: flex;
        flex-wrap: wrap;
        gap: .4rem;
    }
</style>
@endpush
@endif