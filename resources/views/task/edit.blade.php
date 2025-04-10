@extends('layouts.base')

@section('title', $title)

@section('content')
    <x-container>
        <x-link-btn-alone :href="route('tasks.show', $task)">
            <h2 class="h6 mb-0">
                К просмотру задачи
                <i class="fa-solid fa-circle-left"></i>
            </h2>
        </x-link-btn-alone>
        <x-card.card>
            <form action="{{ route('tasks.update', $task) }}" method="post">
                @method('PUT')
                @csrf
                <x-card.header>
                    {{ $title }}
                </x-card.header>
                <x-card.body>
                    <x-task.form
                        :name="$task->name"
                        :deadline="$task->deadline ? $task->deadline->format('Y-m-d') : null"
                        :description="$task->description"
                    />
                </x-card.body>
                <x-card.footer>
                    <button class="btn btn-outline-secondary" type="submit">
                        Сохранить
                    </button>
                </x-card.footer>
            </form>
        </x-card.card>
    </x-container>
@endsection








