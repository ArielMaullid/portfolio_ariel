@php
$year = date('Y');
$name = config('portfolio.name');
@endphp

<footer class="site-footer">
    <div class="container">

        <div class="footer-grid">

            {{-- Brand column --}}
            <div class="footer-brand-col">
                <a href="{{ route('home') }}" class="footer-brand">
                    {{ $name }}<span class="brand-dot">.</span>
                </a>
                <p class="footer-desc">
                    Fresh graduate S1 Teknik Informatika, membangun aplikasi web dengan Laravel, PHP, dan MySQL.
                </p>
            </div>

            {{-- Navigation --}}
            <div class="footer-col">
                <h4 class="footer-col-title">Navigation</h4>
                <ul class="footer-col-links">
                    <li><a href="{{ route('home') }}#home">Home</a></li>
                    <li><a href="{{ route('home') }}#about">About</a></li>
                    <li><a href="{{ route('home') }}#skills">Skills</a></li>
                    <li><a href="{{ route('projects.index') }}">Projects</a></li>
                </ul>
            </div>

            {{-- Explore --}}
            <div class="footer-col">
                <h4 class="footer-col-title">Explore</h4>
                <ul class="footer-col-links">
                    <li><a href="{{ route('home') }}#education">Education</a></li>
                    <li><a href="{{ route('home') }}#looking-for">Open To</a></li>
                    <li><a href="{{ route('home') }}#contact">Contact</a></li>
                </ul>
            </div>

            {{-- Connect --}}
            <div class="footer-col">
                <h4 class="footer-col-title">Connect</h4>
                <ul class="footer-col-links">
                    @if($globalSocialLinks->isNotEmpty())
                    @foreach($globalSocialLinks as $link)
                    <li>
                        <a href="{{ $link->url }}" target="_blank" rel="noopener"
                            aria-label="{{ $link->label }}">
                            <i class="bi {{ $link->icon }}"></i>
                            <span>{{ $link->label }}</span>
                        </a>
                    </li>
                    @endforeach
                    @else
                    <li><span class="footer-empty">—</span></li>
                    @endif
                </ul>
            </div>

        </div>

        <div class="footer-bottom">
            <span>&copy; {{ $year }} {{ $name }}. All rights reserved.</span>
        </div>

    </div>
</footer>