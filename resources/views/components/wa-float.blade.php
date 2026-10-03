@php
    $waNumber = config('portfolio.whatsapp');
    $waMessage = urlencode(config('portfolio.whatsapp_message'));
    $waUrl = $waNumber ? "https://wa.me/{$waNumber}?text={$waMessage}" : null;
@endphp

@if($waUrl)
    <a href="{{ $waUrl }}"
       class="wa-float"
       target="_blank"
       rel="noopener"
       aria-label="Chat on WhatsApp"
       title="Chat on WhatsApp">
        <i class="bi bi-whatsapp"></i>
    </a>
@endif