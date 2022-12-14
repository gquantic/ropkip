<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite([
        'resources/sass/app.scss',
        'resources/sass/styles.scss',
        'resources/js/app.js'
    ])
</head>
<body>
    <div id="app">
        <header class="top-header">
            <div class="container d-flex justify-content-between align-items-center">
                <a class="navbar-brand logo" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <div class="d-flex align-items-center contacts">
                    <a href="{{ route('courses.index') }}">
                        <button class="btn btn-primary">Наши курсы</button>
                    </a>

                    <div class="d-flex flex-column">
                        <a href="">8 (800) 777-95-78</a>
                        <a href="">info@obrcentr.com</a>
                    </div>
                </div>
            </div>
        </header>
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav d-flex justify-content-between w-100">
                        <li class="nav-item">
                            <a class="nav-link" href="">Направления</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="">О нас</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="">Возможности</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="">Документы</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="">Партнеры</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="">Отзывы</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="">Контакты</a>
                        </li>

                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Вход</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>
</html>
