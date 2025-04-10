@extends('layouts.base')

@section('title', $title)

@section('content')
    <x-container>
        <x-link-btn-alone :href="route('tasks.index')">
            <h2 class="h6 mb-0">
                К списку задач
                <i class="fa-solid fa-circle-left"></i>
            </h2>
        </x-link-btn-alone>
        <x-card.card>
            <x-card.header>
                {{ $title }}
                <x-delete-modal-button class="position-absolute top-0 end-0 p-0 m-2"
                                       :action="route('tasks.destroy', $task)"
                                       :id="$task->id">
                    <i class="fa-solid text-danger fa-trash-can fa-2x"></i>
                </x-delete-modal-button>

            </x-card.header>
            <x-card.body>
                <x-task.show-form :$task/>
            </x-card.body>
            <x-card.footer>
                <div class="row">
                    <div class="col d-grid pe-sm-2 mb-2 mb-sm-0">
                        <x-link-btn :href="route('tasks.edit', $task)">
                            Редактировать
                        </x-link-btn>
                    </div>
                    <div class="col d-grid ps-sm-2 mb-2 mb-sm-0">
                        <x-link-btn :href="route('tasks.change-status', $task)">
                            Отметить выполнение
                        </x-link-btn>
                    </div>
                </div>
            </x-card.footer>
        </x-card.card>
    </x-container>
@endsection








