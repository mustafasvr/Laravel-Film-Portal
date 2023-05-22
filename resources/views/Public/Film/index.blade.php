@extends('Public.layout')

@section('main')




<section class="film-container">
    <div class="film-inner">

    <div class="film-head" style="--resim: url('{{ $film->FilmImages->w1920 }}')">
        <h1 class="film-title">{{ $film->title }}</h1>
    </div>

    <section class="film-body">
        <div class="film-main">
            <p>
                
            @if(empty($film->content))

            Film hakkında henüz açıklama eklenmemiştir.

            @else

            {{ $film->content }}

            @endif


            </p>


            <div class="film-comment">
                <h1>Yorumlar (0)</h1>
                <textarea name="" placeholder="Lütfen spoiler vermeden film hakkındaki görüşlerinizi giriniz." id=""></textarea>
                <button>Yorum Gönder</button>
            </div>

        </div>
        <div class="film-sidebar">

        <dl class="imdb">
            <dt>IMDB Puanı</dt>
            <dd>{{ $film->vote}}</dd>
        </dl>


        <dl>
            <dt>Değerlendirme</dt>
            <dd>{{ $film->popularity }}</dd>
        </dl>



        <dl>
            <dt>Yayınlanma tarihi</dt>
               <dd>{{ date('d.m.Y', strtotime($film->release_date)) }}</dd>
            </dl>


        <dl>
            <dt>Türler</dt>
            <dd>@foreach ($categories as $item)

                <a href="{{ route('categories.index',['group' => $item->category_url]) }}">{{ $item->category_name }}</a>
            @endforeach</dd>
        </dl>

        </div>
    </section>
</div>
</section>





@endsection