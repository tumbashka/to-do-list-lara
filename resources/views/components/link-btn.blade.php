@props([
    'href' => '#',
    'size' => ''
])
<a href="{{ $href }}" class="d-grid link-underline link-underline-opacity-0">
    <button class="btn {{ $size }} btn-outline-secondary">
        {{ $slot }}
    </button>
</a>
