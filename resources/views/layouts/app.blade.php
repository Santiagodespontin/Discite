<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/main.css')}}" />
</head>
<body>
    <header>
        <nav>
            <ul>
                <div>
                    <li class="header-i"><i class="fas fa-graduation-cap"></i></li>
                    <li><a class="nav-a" href="/">Discite</a></li>
                </div>
                <div>
                    @guest
                    <li id="registro">
                        <a class="nav-a" href="{{ route('register') }}">Register</a>
                    </li>
                    <p>|</p>
                    <li id="registro">
                        <a class="nav-a" href="{{ route('login') }}">Login</a>
                    </li>
                    @else
                <li><a class="nav-a" href="{{url('profile')}}">{{Auth::user()->name}}</a></li>
                    <li id="registro">
                        <a class="nav-a" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @endguest
                </div>
            </ul>
        </nav>
    </header>
    <main>
        @yield('content')
</main>
<footer>
    <ul>
        <li><a href="">Terminos y condiciones</a></li>
        <li><a href="faq">FAQ</a></li>
        <li>
            <ul class="redes">
                <li class="iconoF"><a href="https://www.facebook.com/"><i class="fab fa-facebook-square" ></i></a></li>
                <li class="iconoF"><a href="https://www.twitter.com/"><i class="fab fa-twitter-square" ></i></a></li>
            </ul>
        </li>
    </ul>
</footer>
</body>
</html>
