@extends('layouts.base')

@section('title', $title)

@section('content')
    <div class="row justify-content-center">
        <div class="shadow p-2 m-0 bg-light border rounded text-center col-12 col-md-6 col-lg-5 col-xl-4 col-xxl-3">
            <div class="row mb-2">
                <div class="col text-dark">
                    Список задач
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <x-link-btn :href="route('tasks.create')" :text="'Добавить задачу'"/>
                </div>
            </div>
        </div>
    </div>
    <x-container>
        @if($tasks->isEmpty())
            <p class="h3 text-center mt-5">Список задач пуст</p>
        @else
        123
        @endif
    </x-container>
@endsection








