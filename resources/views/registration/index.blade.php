@extends('layouts.base')

@section('title', $title)

@section('content')
    <x-container>
        <x-card.card>
            <form action="{{ route('registration.store') }}" method="post">
                @csrf
                <x-card.header>
                    {{ $title }}
                </x-card.header>
                <x-card.body>
                    <div class="row  p-sm-4">
                        <x-form.input-float
                            :icon="'fas fa-user fa-lg me-3 fa-fw'"
                            :text="'Имя'"
                            :name="'name'"/>
                        <x-form.input-float
                            :icon="'fas fa-at fa-lg me-3 fa-fw'"
                            :type="'email'"
                            :text="'Email'"
                            :name="'email'"/>
                        <x-form.input-float
                            :icon="'fas fa-lock fa-lg me-3 fa-fw'"
                            :type="'password'"
                            :text="'Пароль'"
                            :name="'password'"/>
                        <x-form.input-float
                            :icon="'fas fa-key fa-lg me-3 fa-fw'"
                            :type="'password'"
                            :text="'Подтвердите пароль'"
                            :name="'password_confirmation'"/>
                        <div class="d-flex justify-content-end">
                            <a class="link-underline link-underline-opacity-75-hover link-underline-opacity-0 text-end"
                               href="{{ route('login') }}">Уже зарегистрированы?</a>
                        </div>
                    </div>
                </x-card.body>
                <x-card.footer>
                    <button type="submit" class="btn btn-outline-secondary">
                        Зарегистрироваться
                    </button>
                </x-card.footer>
            </form>
        </x-card.card>
    </x-container>
@endsection








