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
        <div class="header-box">
            <img src="https://lh3.googleusercontent.com/a/AGNmyxaCSPLT0gdZ2RwQjAkvzDk9Mzs69Y5EG_HfYZan=s288-mo" alt="">
        </div>
        </div>
        </header>


    <main>
        @yield('main')
    </main>


</body>

</html>
