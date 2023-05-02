@extends('Public.layout')

@section('main')


<section class="film-portal">

    <div class="film-portal-main">

        <section class="film-node">
            <div class="film-node-container">
                <div class="film-node-header">
                    <h2 class="node-head">{{ $kategori->category_name }}</h2>
                    <div class="node-desc">{{ $kategori->category_desc }}</div>
                </div>

                <section class="film-portal-categories">
                @foreach ($film as $item)


                <a href="{{ route('film.index',['name' => $item['film']->film_url,'id' => $item['film']->film_id]) }}">
                <div class="film-categories-body" style="--resim: url({{ $item['film']->FilmImages->posters }})">

                        <div class="film-score">
                            {{ $item['film']->vote }}
                        </div>

                </div>
            </a>
                @endforeach

            </section>

            </div>
        </section>




    </div>

    <div class="film-portal-sidebar">

        sadasdasd
        
        
       </div>


</section>



@endsection