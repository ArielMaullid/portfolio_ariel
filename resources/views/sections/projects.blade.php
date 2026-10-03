<section id="projects" class="section" style="background: color-mix(in srgb, var(--surface) 50%, var(--bg));">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4 reveal">
            <div>
                <span class="section-eyebrow">Portfolio</span>
                <h2 class="section-title mb-1">Featured Projects</h2>
                <p class="section-subtitle mb-0">
                    Beberapa project yang pernah saya kerjakan.
                </p>
            </div>
            <a href="{{ route('projects.index') }}" class="btn btn-outline-secondary">
                Lihat Semua <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        @if($featuredProjects->isEmpty())
            <div class="card-surface p-5 text-center">
                <i class="bi bi-inbox fs-1 text-muted-2"></i>
                <p class="text-muted-2 mb-0 mt-2">Belum ada project featured.</p>
            </div>
        @else
            <div class="row g-4">
                @foreach($featuredProjects as $project)
                    <div class="col-md-6 col-lg-4">
                        <x-project-card :project="$project" />
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>