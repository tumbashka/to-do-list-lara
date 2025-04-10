@props([
    'task' => null,
])
<h5 class="text-center mb-0">
    {{ $task->name }}
</h5>
<p class="text-center text-muted fw-light">
    Создано {{ \Illuminate\Support\Carbon::create($task->created_at)->translatedFormat('d F Yг. в H:i') }}
</p>
@if($task->description)
    <h6>Описание</h6>
    <hr class="mt-0 mb-1">
    <div class="row pt-1">
        <p class="text-muted text-start">
            {{ $task->description }}
        </p>
    </div>
@endif

<hr class="mt-0 mb-2">

<div class="row pt-1">
    <div class="col-md-6 text-center">
        <h6>
            <i class="fa-solid fa-stopwatch fa-lg"></i>
            @if($task->deadline)
                {{ \Illuminate\Support\Carbon::create($task->deadline)->translatedFormat('d F Yг.') }}
            @else
                Бессрочно
            @endif
        </h6>
    </div>
    <div class="col-md-6 text-center">
        @if($task->completed_at)
            <h6>
                <i class="fa-solid text-success fa-calendar-check fa-lg"></i>
                {{ \Illuminate\Support\Carbon::createFromTimestamp($task->completed_at)->translatedFormat('d F Yг. в H:i') }}
            </h6>
        @else
            <h6>
                <i class="fa-solid text-danger fa-calendar-xmark fa-lg"></i>
                Не выполнено
            </h6>
        @endif
    </div>
</div>
