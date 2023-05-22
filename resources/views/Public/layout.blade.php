<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anasayfa</title>

    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pub/main.css') }}">


</head>

<body>


    <header>
        <div class="header-container">
        <div class="header-logo">
        <a href="{{ route('home')}}"> <h1>#{{ config('settings.shortName') }}</h1></a>
        </div>
        @auth
        <div class="header-box">


            {{ Auth::user()->username }}

            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
              <img src="https://lh3.googleusercontent.com/a/AGNmyxaCSPLT0gdZ2RwQjAkvzDk9Mzs69Y5EG_HfYZan=s288-mo" alt="">
         </a>

         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
         </form>

        </div>
        @endauth
        @guest
        <div>
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        </div>
        @endguest

        </div>
        </header>


    <main>
        @yield('main')
    </main>

    <footer>
        BURASI FOOTER
    </footer>



</body>

</html>
