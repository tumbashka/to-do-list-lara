@extends('layouts.base')

@section('title', $title)

@section('content')
    <x-container>
        <x-card>
            <form action="{{ route('tasks.store') }}" method="post">
                @csrf
                <x-card.header>
                    {{ $title }}
                </x-card.header>
                <x-card.body>
                    <x-task-form/>
                </x-card.body>
                <x-card.footer>
                    <button class="btn btn-outline-secondary" type="submit">
                        Сохранить
                    </button>
                </x-card.footer>
            </form>
        </x-card>
    </x-container>
@endsection








