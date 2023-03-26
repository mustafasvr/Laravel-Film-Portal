@extends('Public.layout')

@section('main')

<header>
<div class="header-container">
<div class="header-logo">
<a href="{{ route('home')}}"> <h1>#LOGO</h1></a>
</div>
<div class="header-box">
    <img src="data:image/jpg;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAIAAABt+uBvAAAAA3NCSVQICAjb4U/gAAAABmJLR0QAMwBpAB6iy7TlAAAFMUlEQVR4nO2cX0xTZxTAv962ULGC2AkyBAGLoiD/QRRQQdyAOXSb8oDGJROyLJFtD0u29z1sT1uyGZ1ZNGxubC5MNIPBnDKdZYAoAmsR9gdoAcMITjb5U2By91A8vbbAKdLe2zTnFx7O+S7n6+mP7363vW2QJb0Wyoj54aRuwN0hQQgkCIEEIZAgBBKEQIIQSBACCUIgQQgkCIEEIZAgBBKEQIIQSBACCUIgQQgkCIEEIZAgBBKEQIIQSBACCUIgQQgkCIEEIZAgBIWL5n2/+ERWfK5whGf8hxXvnrtatsSZj5eeTdmYbjP41qmS679eWeLMc+KqFSTn5DY/Ck6xJ2nvEqf1V2tiwhPsJ+dkrnoiop5iUSExoQHhS5nhaF6pWrXCWf04gqiCVF7Ljux5dSkzpG3KdFYzDiL2Jp1st304TnZ8XmhghBObcQSxBQVrQgq2FT5ZbcH2QtftNfMh9uPJZLK81P1PVhsbkeTcZhxBJEH/jv8D8eZ1cf5qzWJnOLbvbV8fP0hHRv92TmcYIglq774F8XKVujj/9cXOkB6TBfH0f1OdfQbndIYhkqCW35vMUxOQbo3KWFR52qYd4UGRkHb1dzDGO625BRFJEMdxBmMbpKGBETmJzzle/lLmIQVnfdFfd7tGIXfVewAbRBKkUqpqmy9aH1XGPb/toOPlceuTIR4aGfz8x08Uci9n9jc/IgnyUnpX6sr7h00wsiU80cHa4vw3Vq14CtJbvzUwxjxtBXkrVYyx5k4djPj6+JXuf8eR2h1bciCenJ786qczzPMEeSm8GGNll05OTI7DYHp01vwVs8RFJEcGR0Ha1afvMLYzxpQKzzrFLM9nYNhkMLbCYFiQdnv0roULC3e9LHRxuaXaEsg5ufO7nAtRBTHGqhq/5fnZK7SCU7yYUbRwYYI2FeLB+3fL607P1sqVLmhzDkQTNPt8qhor+oeNMC68PNlTlH00YOUaSG92/QKxp+1BSsFVuenOdYj91ZqS/Dfnq9qdmA+xedr8xZVPIRW+LHIpYq8gxtiZ2uNj5lFId8bmzFXBtMFRG0NiIO006f8Y6ITU01aQ8PkMjQzqe61btTY4Kn59in3JoexilVIFaW3zBeFRT9ukbV74VjVWWLdqufLgziP2JUkb0iC+e6+v4uezwqNyT1tBj//Ba25UmoZ6IE2M3Grz+y9kFD2tCYG0WbA9W+A8bAXZ03DnGsSr/QIP7y4RHn02uQBi89TEZ5dOitfZ40gm6PT3H4+aH0AqvGAFrFyzeV0spAZjm3C5iYxkgu6P3tP33IZ0w9po7aO3FK/kHvPxXg6HhLcBxEfKj54v1H89w89YYm+lN5xlqYLbaf3DpkpduQTNPUJKQZdbqk1/dUNquWzlpuwLWR0GgzcENwAkQeIvL9QbrkIctGrtgczDe9MOyGQyy8j45JiE27MFiQWdqvrggeADj2eSC2LC4iE19LYOCO6xSYLEgsYnx9p7WiBN0Kaql/laYp7nq5vOS9SXFem/H3Sx/tzDmYeWGE4uxlj/sLGqsUKipqxIL6iutcYo2KqBho5r9oPiI70gxphOb/vdpzHzaNkPJyRpxga3EPRR5XvCz6YZY/re1qGRQan6EeIWghhjbX/ehJjn+e8avpGwGSHuIui87kvYqo1D3dK+vRAio3/RtTDusoLcFhKEQIIQSBACCUIgQQgkCIEEIZAgBBKEQIIQSBACCUIgQQgkCIEEIZAgBBKEQIIQSBACCUIgQQgkCIEEIZAgBBKEQIIQSBDC/3VfPFbzNpQaAAAAAElFTkSuQmCC" alt="">
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
        @foreach ($categories as $row)
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
                    <div class="film-title">  {{ $row->title }}</div>
                    <div class="film-extra"></div>
                </article>
                
            </div>
        </section>

        @endforeach


    </div>

    <div class="film-portal-sidebar">

        sadasdasd
        
        
       </div>


</section>


@endsection
