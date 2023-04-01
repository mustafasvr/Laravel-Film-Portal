@extends('Public.layout')

@section('main')

<header>
<div class="header-container">
<div class="header-logo">
<a href="{{ route('home')}}"> <h1>#LOGO</h1></a>
</div>
<div class="header-box">
    <img src="https://lh3.googleusercontent.com/a/AGNmyxaCSPLT0gdZ2RwQjAkvzDk9Mzs69Y5EG_HfYZan=s288-mo" alt="">
</div>
</div>
</header>


<section class="film-top">

    <div class="film-top-container">
        <div class="film-top-header">
            <h3>Trendler</h3>
        </div>
        <div class="film-top-body">

            @foreach ($film as $item)

            <img src="{{ $item->FilmImages->posters }}" alt="" height="230px">
        
            @endforeach


        </div>


    </div>

</section>

<section class="film-portal">

    <div class="film-portal-main">

        <section class="film-node">
            <div class="film-node-container">
                <div class="film-node-header">
                    <h2 class="node-head">Başkık</h2>
                    <div class="node-desc">Açıklama</div>
                </div>
                @foreach ($categories as $item)
                <div class="film-node-body">
                        <div class="node-icon">                @if ($item->category_icon)
                            <i class="{{ $item->category_icon }}"></i>
                            @else 
                            <i class="fas fa-ban"></i>
                            @endif</div>
                        <div class="node-main">
                            <div class="main-head"> <a href="#">{{ $item->category_name }}</a> </div>
                            <div class="main-body"> {{ $item->category_desc }}</div>
                        </div>
                        <div class="node-stats">
                            <div class="node-stats-item">
                                <div>Filmler</div>
                                <span>12</span>
                            </div>
                            <div class="node-stats-item">
                                <div>Mesajlar</div>
                                <span>2131</span>
                            </div>
                        </div>
                        <div class="node-extra">
                            <div class="extra-user">
                                <img src="https://lh3.googleusercontent.com/a/AGNmyxaCSPLT0gdZ2RwQjAkvzDk9Mzs69Y5EG_HfYZan=s288-mo" alt="">
                            </div>
                            <div class="extra-body">
                                <div class="extra-title">Bizden Geriye Kalanlar asdasd asd sad sad</div>
                                <div class="extra-last">
                                    28 Ağustos 2021 Root

                                </div>
                            </div>


                        </div>
                </div>
                @endforeach
            </div>
        </section>




    </div>

    <div class="film-portal-sidebar">

        sadasdasd
        
        
       </div>


</section>


@endsection
