@extends('Public.layout')
@section('title',config('settings.title'))
@section('main')

<section class="film-top">

    <div class="film-top-container">
        <div class="film-top-header">
            <h3>Son Eklenenler</h3>
        </div>
        <div class="film-top-body">

            @foreach ($film as $item)



            
            <a href="{{ route('film.index',['name' => $item->film_url,'id' => $item->film_id]) }}"> <img src="{{ $item->FilmImages->posters }}" alt="" height="225px">
            </a>
            @endforeach


        </div>


    </div>

</section>


@php
    use Carbon\Carbon;
@endphp



<section class="film-portal">
    <div class="film-portal-main">

        <section class="film-node">
            <div class="film-node-container">
                <div class="film-node-header">
                    <h2 class="node-head">Film Dünyasında Kategorilerle Yolculuk</h2>
                    <div class="node-desc">MFPP, geniş film kategorileriyle donatılmıştır. Aksiyon, komedi, gerilim, romantik, bilim kurgu, animasyon ve daha pek çok kategori arasında kaybolun.</div>
                </div>



                @foreach ($kategori as $item)

  

                <div class="film-node-body">
                        <div class="node-icon">  @if ($item['category']->category_icon)
                            <i class="{{ $item['category']->category_icon }}"></i>
                            @else 
                            <i class="fas fa-ban"></i>
                            @endif</div>

              

                        <div class="node-main">
                            <div class="main-head"> <a href="{{ route('categories.index',['group' => $item['category']->category_url]) }}">{{ $item['category']->category_name }}</a> </div>
                            <div class="main-body"> {{ $item['category']->category_desc }}</div>
                        </div>
                        <div class="node-stats">
                            <div class="node-stats-item">
                                <div class="title">Filmler</div>
                                <span>{{ $item['count']['sayi']}}</span>
                            </div>
                        </div>
                        <div class="node-extra" style="--resim: url({{ $item['film'][0]->FilmImages->backdrops }})">

                            <div class="extra-user">
                                <img src="https://lh3.googleusercontent.com/a/AGNmyxaCSPLT0gdZ2RwQjAkvzDk9Mzs69Y5EG_HfYZan=s288-mo" alt="">
                            </div>
                            <div class="extra-body">
                                <div class="extra-title"><a href="{{ route('film.index',['name' => $item['film'][0]->film_url,'id' => $item['film'][0]->film_id]) }}">{{ $item['film'][0]->title }}</a></div>
                                <div class="extra-last">

                                    @php
                                    $dates = Carbon::parse($item['film'][0]->release_date);
                                    @endphp
                                    
                                   {{ $dates->diffForHumans() }} - Root

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
