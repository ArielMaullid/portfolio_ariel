<footer class="site-footer">
    <div class="container">
        <div class="row align-items-center gy-3">
            <div class="col-md-6 text-center text-md-start">
                &copy; {{ date('Y') }} {{ config('portfolio.name') }}. All rights reserved.
            </div>
            <div class="col-md-6">
                @if($globalSocialLinks->isNotEmpty())
                    <div class="d-flex justify-content-center justify-content-md-end gap-3">
                        @foreach($globalSocialLinks as $link)
                            <a href="{{ $link->url }}" target="_blank" rel="noopener"
                               aria-label="{{ $link->label }}"
                               class="text-muted-2">
                                <i class="bi {{ $link->icon }}"></i>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</footer>