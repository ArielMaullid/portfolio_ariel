@if($globalEducations->isNotEmpty())
<section id="education" class="section" style="background: color-mix(in srgb, var(--surface) 50%, var(--bg));">
    <div class="container">
        <div class="reveal">
            <span class="section-eyebrow">Education</span>
            <h2 class="section-title">Pendidikan</h2>
            <p class="section-subtitle">
                Riwayat pendidikan formal.
            </p>
        </div>

        <div class="timeline reveal">
            @foreach($globalEducations as $edu)
                <div class="timeline-item">
                    @if($edu->period)
                        <span class="timeline-period">{{ $edu->period }}</span>
                    @endif
                    <h3 class="timeline-title">{{ $edu->institution }}</h3>
                    <p class="timeline-subtitle">
                        @if($edu->degree){{ $edu->degree }} @endif
                        @if($edu->major){{ $edu->major }} @endif
                        @if($edu->status)
                            <span class="badge text-bg-light ms-2">{{ $edu->status }}</span>
                        @endif
                    </p>
                    @if($edu->description)
                        <p class="text-muted-2 mb-0">{{ $edu->description }}</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif