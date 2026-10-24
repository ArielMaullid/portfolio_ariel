@props(['project'])

@php
$imgPath = $project->image ? public_path($project->image) : null;
$imgUrl = ($imgPath && file_exists($imgPath))
? asset($project->image)
: 'https://placehold.co/640x400/2563EB/FFFFFF?text=' . urlencode($project->title);

$highlights = is_array($project->features) ? array_slice($project->features, 0, 3) : [];

$allTechs = is_array($project->technologies) ? $project->technologies : [];
$techs = array_slice($allTechs, 0, 3);
$techCount = count($allTechs);
@endphp

<a href="{{ route('projects.show', $project) }}" class="project-card-link text-decoration-none">
    <article class="card-surface project-card reveal">
        <div class="project-thumb-wrap">
            <img src="{{ $imgUrl }}"
                alt="Thumbnail {{ $project->title }}"
                class="project-thumb"
                loading="lazy">
        </div>

        <div class="project-body">
            <div class="project-meta">
                <span class="project-category">{{ $project->category }}</span>
                @if($project->year)
                <span class="project-year">· {{ $project->year }}</span>
                @endif
            </div>

            <h3 class="project-title">{{ $project->title }}</h3>

            @if(!empty($highlights))
            <ul class="project-highlights">
                @foreach($highlights as $h)
                <li>{{ $h }}</li>
                @endforeach
            </ul>
            @else
            <p class="project-desc">{{ $project->short_desc }}</p>
            @endif

            @if(!empty($techs))
            <div class="project-tech">
                @foreach($techs as $tech)
                <span class="tech-tag">{{ $tech }}</span>
                @endforeach
                @if($techCount > 3)
                <span class="tech-tag">+{{ $techCount - 3 }}</span>
                @endif
            </div>
            @endif

            <span class="project-card-cta">
                View Case Study <i class="bi bi-arrow-right"></i>
            </span>
        </div>
    </article>
</a>