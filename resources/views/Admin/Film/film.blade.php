@extends('Admin.layout')

@section('adminmain')


<section class="content-header">
    <div class="ch-left">
        <h1>Filmler</h1>
    </div>
    <div class="ch-right">
        <a href="{{ route('admin.film.cek') }}" class="button">Filmleri Çek</a>
    </div>
</section>


<section class="content-body">

    <div class="film-wrapper">

    @foreach ($film as $row)

    <a href="{{ Route('admin.film.edit',['name' => $row->film_url,'id' => $row->film_id]) }}">
    <section class="film" style="--resim: url({{ $row->FilmImages->backdrops }})">
        <div class="film-container">
            <div class="film-img">
                <img src="{{ $row->FilmImages->posters }}"  alt="{{ $row->title }}">
            </div>            
        </div>
    </section>
    </a>
    @endforeach

</div>

</section>





@endsection
