<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Tal-On') }}</title>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->    
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/filterDoctors.js') }}"></script>
    <script src="{{ asset('js/getDoctorAppointment.js') }}"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <img class="navbar-brand ico" src="/images/medical-symbol_1988521.png">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ __('Tal-On') }}
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a href="{{ url('/polyclinics') }}" class="nav-link">Polyclinics</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/doctors') }}" class="nav-link">Doctors</a>
                        </li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <!-- <li class="nav-item">
                                <a href="{{ url('/account') }}" class="nav-link">Account</a>
                            </li> -->

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-content dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/account') }}" class="nav-link">Account</a>
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
        <img class="home-banner" src="/images/doctor-hands-in-green-latex-gloves-hold-phone.jpg">
    </div>
    <footer>
        <p>Разработала: Мисюченко И.С.</p>
        <p>Группа: BE107</p>
        <p>Почта: <a href="mailto:xenoproxy@yandex.by">xenoproxy@yandex.by</a></p>
        <p id="year"><?php echo(date('Y')) ?></p>
    </footer>
</body>
</html>
