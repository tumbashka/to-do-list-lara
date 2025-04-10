@props([
    'action' => '',
    'text_head' => 'Подтвердите удаление',
    'text_body' => 'Удалить задачу?',
    'title' => 'Удалить',
    'id' => '',
])
<button type="button" {{ $attributes->class(['btn']) }} data-bs-toggle="modal"
        data-bs-target="#deleteModal{{ $id }}" title="{{ $title }}">
    {{ $slot }}
</button>

<div class="modal fade" id="deleteModal{{ $id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">{{ $text_head }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                {!!   $text_body !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                <form action="{{ $action }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary">Удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>
