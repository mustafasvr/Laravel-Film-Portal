@extends('Admin.layout')

@section('adminmain')

<section class="content-header">
    <div class="ch-left">
        <h1></h1>
    </div>
    <div class="ch-right">
        <a href="{{ route('admin.film.index') }}" class="button">Geri Dön</a>
    </div>
</section>


<section class="content-body">


    <div class="formRow">
        <form action="{{route('admin.film.edit.update',['name'=> $film->film_url, 'id' => $film->film_id ])}}" method="POST"
            enctype="multipart/form-data">
        @csrf
        <div class="formRow-body">

            <dl>
                <dt><label>Film Posters</label></dt>
                <dd>
                    <img src="{{  $film->FilmImages->posters }}" alt="{{ $film->title }}"  width="128px">
                </dd>
            </dl>

            <dl>
                <dt><label>Film title</label></dt>
                <dd><input type="text" class="form-control"  name="title" value="{{ $film->title }}"></dd>
            </dl>
            <dl>
                <dt><label>Film açıklama</label></dt>
                <dd><textarea rows="5" name="content" id="summernote">{{ $film->content }}</textarea></dd>
            </dl>
            <dl>
                <dt><label>Film url</label></dt>
                <dd> <input type="text" class="form-control"  name="film_url" value="{{ $film->film_url }}"></dd>
            </dl>
            <dl>
                <dt><label>Film adult</label></dt>
                <dd><select name="adult" class="form-control">
                    <option value="0">Pasif</option>
                    <option value="1">Aktif</option>
                </select></dd>
            </dl>


    </div>
    <div class="formRow-footer">
        <button  class="button--primary" type="submit">Kaydet</button>
    </div>
    </form>
    </div>


</section>





</section>
@endsection