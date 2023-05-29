@extends('Public.layout')
@section('title',$film->title.' | '.config('settings.title'))
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
                <h1>Yorumlar ({{ $comment }})</h1>

                @guest

                <div class="alert alert-info">
                    Yorum yapabilmek için lütfen <a href="{{ route('login') }}"> giriş </a> yapınız.
                </div>

                @endguest

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                 </div>
                @endif



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


                @Auth
                <form action="{{ route('film.comment',['name' => $film->film_url,'id' => $film->film_id]) }}" method="post">
                    @csrf
                <textarea name="comment" placeholder="Lütfen spoiler vermeden film hakkındaki görüşlerinizi giriniz." id=""></textarea>
                <input type="hidden" name="user_id" value="{{ Auth::user()->token }}">
                <div>
                Filmi şimdi değerlendir.
            </div>

                <button>Yorum Gönder</button>
            </form>
            @endauth
            @guest

            @endguest

            <section class="film-comments">
                @foreach ($comments as $item)

                <section class="film-comments-box">
                  <div class="film-comments-box-image">
                    <img src="{{ asset('images/user/'.$item->User->picture) }}" alt="">
                  </div>
                  <div class="film-comments-box-body">
                    <div class="username">{{ $item->User->username }} </div>
                    <div class="desc">
                        {{ $item->comment_desc }}
                    </div>
                    
                  </div>
            </section>
                @endforeach
            </section>


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