<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <style>
    body {
  padding-top: 60px;
  padding-bottom: 40px;
}

.sidebar-nav {
  padding: 9px 0;
}

.dropdown-menu .sub-menu {
  left: 100%;
  position: absolute;
  top: 0;
  visibility: hidden;
  margin-top: -1px;
}

.dropdown-menu li:hover .sub-menu {
  visibility: visible;
}

.dropdown:hover .dropdown-menu {
  display: block;
}

.nav-tabs .dropdown-menu, .nav-pills .dropdown-menu, .navbar .dropdown-menu {
  margin-top: 0;
}

.navbar .sub-menu:before {
  border-bottom: 7px solid transparent;
  border-left: none;
  border-right: 7px solid rgba(0, 0, 0, 0.2);
  border-top: 7px solid transparent;
  left: -7px;
  top: 10px;
}
.navbar .sub-menu:after {
  border-top: 6px solid transparent;
  border-left: none;
  border-right: 6px solid #fff;
  border-bottom: 6px solid transparent;
  left: 10px;
  top: 11px;
  left: -6px;
}
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->

                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">

                        <li>
                          <a href="/home">Accueil</a>
                        </li>
                        <li class="dropdown">
                          <a href="#" data-toggle="dropdown" class="dropdown-toggle" role="button">Ligues</a>
                            <ul class="dropdown-menu">
                              @foreach(\App\League::get() as $league)

                                        <li>
                                          <a href="#">{{$league->name}}</a>
                                            <ul class="dropdown-menu sub-menu" role="menu">
                                              @foreach($league->season as $season)
                                                <li>
                                                  <a href="/calendrier/{{$season->id}}">{{$season->name}}</a>
                                                </li>
                                              @endforeach
                                            </ul>
                                        </li>
                             @endforeach
                          </ul>
                      </li>

                        <li class="dropdown">
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Classement</a>
                            <ul class="dropdown-menu">
                              @foreach(\App\League::get() as $league)
                                      <li style="z-index:100000;"><a href="#">{{$league->name}}</a>
                                        <ul class="dropdown-menu sub-menu" role="menu">
                                          <li>
                                            <a href="/league/{{$league->id}}/players">Joueurs</a>
                                          </li>
                                          <li>
                                            <a href="/league/{{$league->id}}/teams">Equipes</a>
                                          </li>
                                        </ul>
                                      </li>
                              @endforeach
                            </ul>
                        </li>

                        <li>
                          <a href="#">À propos</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
