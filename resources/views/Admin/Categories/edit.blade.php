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


<section class="content-body">


    <div class="formRow">
        <form action="{{route('admin.categories.edit.update',['id' => $category->category_id ])}}" method="POST"
            enctype="multipart/form-data">
        @csrf
        <div class="formRow-body">

            <dl>
                <dt><label>Kategori</label></dt>
                <dd><input type="text" class="form-control"  name="category_name" value="{{ $category->category_name }}"></dd>
            </dl>
            <dl>
                <dt><label>Kategori Açıklama</label></dt>
                <dd><textarea rows="5" name="category_desc" id="summernote">{{ $category->category_desc }}</textarea></dd>
            </dl>
            <dl>
                <dt><label>Kategori İcon <i class="{{ $category->category_icon }}"></i></label></dt>
                <dd> <input type="text" class="form-control"  name="category_icon" value="{{ $category->category_icon }}"></dd>
            </dl>
            <dl>
                <dt><label>Kategori Durum</label></dt>
                <dd><select name="category_status" class="form-control">
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