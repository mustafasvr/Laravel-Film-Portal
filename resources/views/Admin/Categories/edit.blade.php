@extends('Admin.layout')

@section('adminmain')

<section class="content-header">
    <div class="ch-left">
        <h1>{{ $category->category_name }} kategorisini düzenle</h1>
    </div>
    <div class="ch-right">
        <a href="{{ route('admin.categories.index') }}" class="button">Geri Dön</a>
    </div>
</section>




<section class="content-body content-row">

    <form action="{{route('admin.categories.edit.update',['id' => $category->category_id ])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputuser">Kategori</label>
                <input type="text" class="form-control"  name="category_name" value="{{ $category->category_name }}">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Kategori Açıklama</label>
                <textarea name="category_desc" id="summernote">{{ $category->category_desc }}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Kategori İcon <i class="{{ $category->category_icon }}"></i></label>
                <input type="text" class="form-control"  name="category_icon" value="{{ $category->category_icon }}">

            </div>

            <select name="category_status" class="form-control">
                <option value="0">Pasif</option>
                <option value="1">Aktif</option>
            </select>
        </div>


        <div class="card-footer">
            <div class="float-right">                <button type="submit" class="btn btn-warning text-white">Kaydet</button></div>

        </div>
    </form>


</section>
@endsection