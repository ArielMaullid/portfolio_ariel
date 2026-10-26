<section id="looking-for" class="section-tight lf-section">
    <div class="container">
        <div class="lf-card reveal">

            <div class="lf-header">
                <div>
                    <span class="lf-eyebrow">Currently Looking For</span>
                    <h2 class="lf-title">Open to Entry-Level IT Opportunities</h2>
                </div>
                <div class="lf-status">
                    <span class="lf-dot"></span>
                    Available now
                </div>
            </div>

            <div class="lf-grid" style="grid-template-columns: repeat(3, 1fr);">
                {{-- PRIORITAS --}}
                <div class="lf-block">
                    <div class="lf-head" style="color: var(--accent);">
                        <i class="bi bi-star-fill lf-icon" style="color: var(--accent);"></i>
                        <span class="lf-label" style="color: var(--accent);">Prioritas Utama</span>
                    </div>
                    <ul class="lf-list">
                        <li>Web Developer</li>
                        <li>Laravel Developer</li>
                        <li>Junior Software Developer</li>
                    </ul>
                </div>

                {{-- ALTERNATIF --}}
                <div class="lf-block">
                    <div class="lf-head">
                        <i class="bi bi-briefcase lf-icon"></i>
                        <span class="lf-label">Alternatif</span>
                    </div>
                    <ul class="lf-list">
                        <li>IT Staff</li>
                        <li>IT Support</li>
                        <li>QA Tester</li>
                    </ul>
                </div>

                {{-- TAMBAHAN --}}
                <div class="lf-block">
                    <div class="lf-head">
                        <i class="bi bi-plus-circle lf-icon"></i>
                        <span class="lf-label">Pilihan Tambahan</span>
                    </div>
                    <ul class="lf-list">
                        <li>Junior DBA</li>
                        <li>Junior SysAdmin</li>
                        <li class="text-muted" style="font-size: 0.8rem; margin-top: 0.5rem; font-weight: 400; line-height: 1.4;">
                            <em>*Bersedia mempelajari dasar keterampilan yang relevan.</em>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="mt-4 pt-3 border-top" style="border-color: var(--border) !important; display: flex; gap: 2rem; flex-wrap: wrap;">
                <div><small class="text-muted"><strong>Jenis:</strong> Full-time (Utama), Contract, Internship</small></div>
                <div><small class="text-muted"><strong>Lokasi:</strong> On-site, Hybrid, Remote (Sukabumi, Jabodetabek, Lainnya)</small></div>
            </div>

        </div>
    </div>
</section>

@push('head')
<style>
    .lf-section { padding-top: 1rem; padding-bottom: 2rem; }
    .lf-card { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-lg); padding: 1.5rem 2rem; }
    .lf-header { display: flex; flex-wrap: wrap; justify-content: space-between; align-items: flex-end; gap: 1rem; margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 1px solid var(--border); }
    .lf-eyebrow { display: inline-block; font-size: .7rem; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; color: var(--accent); margin-bottom: .35rem; }
    .lf-title { font-size: clamp(1.1rem, 2vw, 1.3rem); font-weight: 700; color: var(--text-1); margin: 0; letter-spacing: -0.01em; }
    .lf-status { display: inline-flex; align-items: center; gap: .4rem; font-size: .8rem; font-weight: 500; color: var(--text-2); }
    .lf-dot { width: 7px; height: 7px; border-radius: 50%; background: #10B981; box-shadow: 0 0 0 0 rgba(16, 185, 129, .5); animation: qvPulse 2.5s infinite; }
    .lf-grid { display: grid; gap: 1.5rem; }
    .lf-block { min-width: 0; }
    .lf-head { display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.75rem; }
    .lf-icon { color: var(--text-3); font-size: 0.9rem; }
    .lf-label { font-size: .75rem; font-weight: 700; letter-spacing: .05em; text-transform: uppercase; color: var(--text-1); }
    .lf-list { list-style: none; padding: 0; margin: 0; display: grid; gap: .4rem; }
    .lf-list li { font-size: .9rem; color: var(--text-2); font-weight: 500; }
    
    @media (max-width: 768px) {
        .lf-grid { grid-template-columns: 1fr !important; gap: 1.5rem; }
        .lf-card { padding: 1.25rem; }
    }
</style>
@endpush