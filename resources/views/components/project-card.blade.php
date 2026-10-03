@props(['project'])

@php
    $imgPath = $project->image ? public_path($project->image) : null;
    $imgUrl = ($imgPath && file_exists($imgPath))
        ? asset($project->image)
        : 'https://placehold.co/640x400/2563EB/FFFFFF?text=' . urlencode($project->title);
@endphp

<a href="{{ route('projects.show', $project) }}" class="text-decoration-none">
    <article class="card-surface project-card reveal">
        <img src="{{ $imgUrl }}"
             alt="Thumbnail {{ $project->title }}"
             class="project-thumb"
             loading="lazy">

        <div class="project-body">
            <span class="project-category">{{ $project->category }}</span>
            <h3 class="project-title">{{ $project->title }}</h3>
            <p class="project-desc">{{ $project->short_desc }}</p>

            @if(!empty($project->technologies))
                <div class="project-tech">
                    @foreach(array_slice($project->technologies, 0, 4) as $tech)
                        <span class="tech-tag">{{ $tech }}</span>
                    @endforeach
                    @if(count($project->technologies) > 4)
                        <span class="tech-tag">+{{ count($project->technologies) - 4 }}</span>
                    @endif
                </div>
            @endif
        </div>
    </article>
</a>