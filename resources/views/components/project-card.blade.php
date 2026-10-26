@props(['project'])

@php
    $imgPath = $project->image ? public_path($project->image) : null;
    $imgUrl = ($imgPath && file_exists($imgPath))
        ? asset($project->image)
        : 'https://placehold.co/640x400/2563EB/FFFFFF?text=' . urlencode($project->title);

    $highlights = is_array($project->features) ? array_slice($project->features, 0, 3) : [];
    $techs = is_array($project->technologies) ? array_slice($project->technologies, 0, 3) : [];
    $techCount = is_array($project->technologies) ? count($project->technologies) : 0;
@endphp

<a href="{{ route('projects.show', $project) }}" class="project-card-link text-decoration-none">
    <article class="card-surface project-card reveal d-flex flex-column">
        
        {{-- Thumbnail --}}
        <div class="project-thumb-wrap">
            <img src="{{ $imgUrl }}"
                 alt="Thumbnail {{ $project->title }}"
                 class="project-thumb"
                 loading="lazy">
        </div>

        {{-- Body (Flex Grow agar seragam) --}}
        <div class="project-body d-flex flex-column flex-grow-1">
            <div class="project-meta">
                <span class="project-category">{{ $project->category }}</span>
                @if($project->year)
                    <span class="project-year">· {{ $project->year }}</span>
                @endif
            </div>

            <h3 class="project-title">{{ $project->title }}</h3>

            @if(!empty($highlights))
                <ul class="project-highlights mb-4">
                    @foreach($highlights as $h)
                        <li>{{ $h }}</li>
                    @endforeach
                </ul>
            @else
                <p class="project-desc">{{ $project->short_desc }}</p>
            @endif

            {{-- Tech Tags --}}
            @if(!empty($techs))
                <div class="project-tech mb-3 mt-auto">
                    @foreach($techs as $tech)
                        <span class="tech-tag">{{ $tech }}</span>
                    @endforeach
                    @if($techCount > 3)
                        <span class="tech-tag">+{{ $techCount - 3 }}</span>
                    @endif
                </div>
            @endif

            {{-- CTA Button --}}
            <span class="project-card-cta mt-2">
                View Case Study <i class="bi bi-arrow-right"></i>
            </span>
        </div>
    </article>
</a>

@push('head')
<style>
    .project-card {
        height: 100%;
        overflow: hidden;
        transition: transform 0.3s var(--ease), box-shadow 0.3s var(--ease);
    }
    .project-thumb-wrap {
        aspect-ratio: 16 / 10;
        width: 100%;
        overflow: hidden;
        background: var(--accent-soft);
    }
    .project-thumb {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s var(--ease);
    }
    .project-card-link:hover .project-thumb {
        transform: scale(1.05);
    }
    .project-card-link:hover .project-card {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
    }
</style>
@endpush