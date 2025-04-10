@extends('layouts.base')

@section('title', $title)

@section('content')
    <div class="row justify-content-center mb-3">
        <div class="shadow p-2 m-0 bg-light border rounded text-center col-12 col-md-6 col-lg-5 col-xl-4 col-xxl-3">
            <div class="row mb-2">
                <div class="col text-dark">
                    <h5 class="mb-0">
                        Список задач
                    </h5>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    <x-link-btn :href="route('tasks.create')" :size="'btn-sm'">
                        Добавить задачу
                        <i class="fa-solid fa-circle-plus"></i>
                    </x-link-btn>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="dropdown-center d-grid">
                        <button class="btn btn-sm dropdown-toggle btn-outline-secondary" data-bs-toggle="dropdown">
                            Фильтр
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('tasks.index', ['filter' => 'completed']) }}">
                                    Выполненные
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                   href="{{ route('tasks.index', ['filter' => 'not_completed']) }}">
                                    Не выполненные
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('tasks.index') }}">
                                    Все задачи
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-container>
        @if(!$tasks->count())
            <p class="h3 text-center mt-5">Список задач пуст</p>
        @else
            <x-card.card>
                <x-card.header>
                    {{ $header }}
                </x-card.header>
                <x-card.body>
                    @foreach($tasks as $task)
                        <div class="row align-items-center">
                            <div class="col-8">
                                <a href="{{ route('tasks.show', $task) }}"
                                   class="text-dark link-underline-dark link-underline-opacity-0 link-underline-opacity-100-hover ">
                                    <p class="{{ $task->completed_at != null ? 'text-decoration-line-through' : '' }} ">
                                        {{ $task->name }}
                                    </p>
                                </a>
                            </div>
                            <div class="col-3">
                                {{ getDeadlineForHuman($task->deadline) }}
                            </div>
                            <div class="col-1">
                                @if($task->completed_at)
                                    <i class="fa-solid text-success fa-circle-check fa-lg"></i>
                                @else
                                    <i class="fa-solid text-danger fa-circle-xmark fa-lg"></i>
                                @endif
                            </div>
                        </div>
                        @if(!$loop->last)
                            <hr>
                        @endif
                    @endforeach
                </x-card.body>
                <x-card.footer>
                    {{ $tasks->links() }}
                </x-card.footer>
            </x-card.card>
        @endif
    </x-container>
@endsection








