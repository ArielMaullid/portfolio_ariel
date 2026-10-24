<button type="button"
    class="back-to-top"
    id="backToTop"
    aria-label="Back to top">
    <i class="bi bi-arrow-up"></i>
</button>

@push('scripts')
<script>
    (function() {
        const btn = document.getElementById('backToTop');
        if (!btn) return;

        const toggle = () => {
            if (window.scrollY > 400) {
                btn.classList.add('visible');
            } else {
                btn.classList.remove('visible');
            }
        };

        window.addEventListener('scroll', toggle, {
            passive: true
        });
        btn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        toggle();
    })();
</script>
@endpush