@props([
    'href' => '#',
    'text' => '',
])
<a href="{{ $href }}">
    <button class="btn btn-sm btn-outline-secondary">
        {{ $text }}
    </button>
</a>
