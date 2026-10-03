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
            @foreach($globalSkills as $category => $skills)
                <div class="col-md-6 col-lg-4 reveal">
                    <div class="card-surface p-4 h-100">
                        <h3 class="skill-category-title">{{ $category }}</h3>
                        <div>
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
@endif