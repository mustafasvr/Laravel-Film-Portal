<!DOCTYPE html>
<html lang="en">

@php
    use Carbon\Carbon;
@endphp

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pub/main.css') }}">
    <link rel="icon" type="image/x-icon" href=" {{ asset('images/seo/'.config('settings.favicon')) }} ">



</head>

<body>


    <header>
        <div class="header-container">
        <div class="header-logo">
        <a href="{{ route('home')}}"> 
            @if (config('settings.logo-text') == 1)
            <h1>{{ config('settings.shortName') }}</h1>
                @else 
                <img src="{{  asset('images/seo/'.config('settings.logo')) }}" alt="{{ config('settings.shortName') }}">
            @endif
        
        </a>
        </div>
        @auth
        <div class="header-box">


            <div class="user-box">


                <div class="dropdown-menu">
                    <span tabindex="1"><img class="user-image" src="{{ asset('images/user/'.Auth::user()->picture) }}" alt="menu"></span>
                    <div class="dropdown-body user-body" tabindex="1">
                        <div class="dropdown-header">
                            <img src="{{ asset('images/user/'.Auth::user()->picture) }}" alt="">
                            <div class="user-card-container">
                                <div class="user-card-name">{{ Auth::user()->username }}</div>
                                <span class="user-card-mail">{{ Auth::user()->email }}</span>
                            </div>



                        </div>
                        <ul>
                            @if (Auth::user()->permission == 'admin')
                            <li><a href="{{ route('admin.index') }}"><i class="far fa-pen-to-square"></i>
                                Yönetici Panel</a></li>
                            @endif
                                      
                                                                            <li><a href="{{ route('profile.index') }}"><i class="far fa-user-circle"></i>
                                    Profil bilgileri</a></li>
                           

                            <li>
                

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                               <i class="fas fa-sign-out-alt"></i>   Çıkış yap
                             </a>

                             
         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        @endauth
        @guest
        <div>
            <a href="{{ route('register') }}" class="button ">    {{ __('Register') }}</a>
            <a href="{{ route('login') }}" class="button button--primary">    {{ __('Login') }}</a>

        </div>
        @endguest

        </div>
        </header>


    <main>
        @yield('main')
    </main>

    <footer>
        Copyright  <a href="{{ route('home')}}">   {{ config('settings.copyright') }} </a>© tüm hakları saklıdır.
    </footer>



</body>

</html>
