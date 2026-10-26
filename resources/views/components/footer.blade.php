@php
$year = date('Y');
$name = config('portfolio.name');
@endphp

<footer class="site-footer">
    <div class="container">
        <div class="footer-content text-center">
            <span class="footer-copy">
                &copy; {{ $year }} {{ $name }}. Hak cipta dilindungi.
            </span>
        </div>
    </div>
</footer>

@push('head')
<style>
    .site-footer {
        border-top: 1px solid var(--border);
        padding: 1.5rem 0;
        /* Padding atas dan bawah 1.5rem */
        /* margin-top: 4rem; <-- Pastikan baris ini TIDAK ADA */
        background-color: var(--bg);
    }

    .footer-copy {
        font-size: 0.85rem;
        color: var(--text-3);
        /* Warna abu-abu redup agar elegan */
        letter-spacing: 0.01em;
    }
</style>
@endpush