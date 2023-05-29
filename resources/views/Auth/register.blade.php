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
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <dl>
                        <input id="username" placeholder="Kullacını adı giriniz." type="text" class="form-control @error('name') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                    </dl>
                   <dl>
                    <input id="email" placeholder="Mail adresinizi giriniz." type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                 </dl>
                 <dl>

                    <input id="password"  placeholder="Şifrenizi giriniz." type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">


                 </dl>

                 <dl>
                    <input placeholder="Şifrenizi tekrar giriniz." id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                           
                 </dl>


                 <button type="submit" class="button">
                    {{ __('Register') }}
                </button>

                </form>


          

            </div>
            <a href="{{ route('login') }}">Üyeliğinize giriş yapmak için tıklayın.</a>
        </div>


    </div>
</div>

@endsection
