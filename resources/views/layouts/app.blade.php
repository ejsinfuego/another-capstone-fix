<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="/build/css/main.css">
    <link rel="stylesheet" href="/build/css/dashboard.css">
    <link rel="stylesheet" href="/build/css/settings.css">
    <link rel="stylesheet" href="/build/icons/css/all.min.css">
    <script src="/build/jquery/dist/jquery.min.js"></script>
    <title>{{ Auth::user()->name }}</title>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a href="/" class="logoLink">
                    <img src="/assets/caramoanLogo.png" alt="Caramoan Logo" class="cLogo">
                    CCC
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navigation" style="margin:0; padding:0; padding-left:20px;">
                        <li class="navigation-items"><a href="{{route('dashboard')}}" class="links" style="{{($active=='dashboard') ? 'color: rgb(255, 139, 0);font-size: 1.30em;' : ''}}">Dashboard</a></li>
                        <li class="navigation-items"><a href="{{route('employee')}}" class="links" style="{{($active=='employee') ? 'color: rgb(255, 139, 0);font-size: 1.30em;' : ''}}">Manage Employee</a></li>
                        <li class="navigation-items"><a href="{{route('history')}}" class="links" style="{{($active=='history') ? 'color: rgb(255, 139, 0);font-size: 1.30em;' : ''}}">Transaction History</a></li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a href="{{route('settings')}}" class="dropdown-item">
                                        {{_('Settings')}}
                                    </a>
                                    <a href="{{route('settings')}}" class="dropdown-item">
                                        {{_('Edit Profile   ')}}
                                    </a>
                                    
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

        <main>
            @yield('content')
        </main>
    </div>
    <footer>
        <div class="footer">
            <div class="footerLogo">
                <img src="/assets/caramoanLogo.png" alt="">
            </div>
            <div class="footertext">
                <p class="footerTop">Caramoan Community College</p>
                <p class="footerBottom">Caramoan Camarines Sur</p>
            </div>
        </div>
    </footer>
    <script src="/build/js/main.js"></script>
</body>
</html>
