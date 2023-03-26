@extends('Admin.layout')

@section('adminmain')





    @foreach ($film as $row)

    <section class="film" style="--resim: url({{ $row->FilmImages->backdrops }})">
        <div class="film-container">
            <div class="film-img">
                @if (isset($row->FilmImages->posters))
                <img src="{{ $row->FilmImages->posters }}"  alt="{{ $row->title }}">
                @else
                <img src="{{ $row->FilmImages->backdrops }}"  alt="{{ $row->title }}">
                @endif
            </div>

            <article class="film-body">
                <div class="film-title">   {{ $row->title }}</div>
                <div class="film-extra"></div>
            </article>
            
        </div>
    </section>

    @endforeach





@endsection
