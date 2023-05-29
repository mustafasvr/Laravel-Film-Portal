@extends('Public.layout')

@section('main')


<div class="auth-container">
    <div class="auth-wrapper">
            

        <div class="auth-box">
            <a href="{{ route('home')}}"> 
                @if (config('settings.logo-text') == 1)
                <h1>{{ config('settings.shortName') }}</h1>
                    @else 
                    <img src="{{  asset('images/seo/'.config('settings.logo')) }}" alt="{{ config('settings.shortName') }}">
                @endif
            
            </a>

            @if ($errors->any())
            <div class="alert alert-error">
                <div class="alert-icon">
                    <i class="fas fa-danger"></i>
                </div>
                <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
                </ul>
           </div>
            @endif

            <div class="auth-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                   <dl>
                    <input id="email" placeholder="Mail adresinizi giriniz." type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                 </dl>
                 <dl>

                    <input id="password"  placeholder="Şifrenizi giriniz." type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">


                 </dl>
                 <button type="submit" class="button">
                    {{ __('Login') }}
                </button>

                </form>


          

            </div>
            <a href="{{ route('register') }}">Üyelik oluşturmak için tıklayınız</a>
        </div>


    </div>
</div>

@endsection
