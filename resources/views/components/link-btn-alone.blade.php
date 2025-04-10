@props([
    'href' => '',
])
<div class="shadow d-grid bg-light bg-gradient rounded-2 border mb-3 ">
    <a class="d-grid text-decoration-none mx-3 my-2" href="{{ $href }}">
        <button {{ $attributes->class(['btn btn-outline-secondary']) }}>
            {{ $slot }}
        </button>
    </a>
</div>


