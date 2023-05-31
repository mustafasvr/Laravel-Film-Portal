
<div class="film-portal-sidebar">

    <div class="sidebar-item">
        <div class="sidebar-container">
            <div class="sidebar-header">
                    <h2>En çok ziyaret edilenler</h2>
            </div>
            <div class="sidebar-body">
                @foreach ($filmVisitors as $item)
                <a href="{{ route('film.index',['name' => $item->film->film_url,'id' => $item->film->film_id]) }}">
                <div class="item">
                <div class="film-status">{{ $loop->iteration   }}</div>
                <div class="film-imdb">{{ $item->film->vote }}</div>
                <img src="{{ $item->filmimages->backdrops }}" alt="{{ $item->film->title }}">
                <div class="film-title">{{ $item->film->title }}</div>
                </div>
                 </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
