<nav class="navbar navbar-expand-md bg-light shadow">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse container-fluid" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @guest
                    <li class="nav-item">
                        <a class="nav-link {{ activeLink('registration*') }}"
                           href="{{ route('registration.index') }}">
                            Регистрация
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ activeLink('login*') }}"
                           href="{{ route('login') }}">
                            Вход
                        </a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item">
                        <a class="nav-link {{ activeLink('tasks*') }}"
                           href="{{ route('tasks.index') }}">
                            Список задач
                        </a>
                    </li>
                @endauth
            </ul>
            @auth
                <ul class="nav nav-underline mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Выйти</a></li>
                        </ul>
                    </li>
                </ul>
            @endauth
        </div>
    </div>
</nav>
