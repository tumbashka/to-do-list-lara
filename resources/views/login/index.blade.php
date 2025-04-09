@extends('layouts.base')

@section('title', $title)

@section('content')
    <x-container>
        <x-card.card>
            <x-card.header>
                {{ $title }}
            </x-card.header>
            <form action="{{ route('login.store') }}" method="post">
                @csrf
                <x-card.body>
                    <div class="row  p-sm-4">
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
                        <x-form.checkbox class="mb-0"
                                         :icon="'fas fa-regular fa-bookmark fa-lg me-3 fa-fw'"
                                         :text="'Запомнить меня'"
                                         :name="'remember'"
                        />
                        <div class="d-flex justify-content-end">
                            <a class="link-underline link-underline-opacity-75-hover link-underline-opacity-0 text-end"
                               href="{{ route('registration.index') }}">Ещё не зарегистрированы?</a>
                        </div>
                    </div>
                </x-card.body>
                <x-card.footer>
                    <button type="submit" class="btn btn-outline-secondary">
                        Войти
                    </button>
                </x-card.footer>
            </form>
        </x-card.card>
    </x-container>
@endsection








