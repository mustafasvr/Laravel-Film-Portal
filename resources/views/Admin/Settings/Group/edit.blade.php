@extends('Admin.layout')

@section('adminmain')
    <section class="content-header">
        <div class="ch-left">
            <h1>{{ $group->group_name }} düzenle</h1>
        </div>
        <div class="ch-right">
            <a href="{{ route('admin.settings.index') }}" class="button">Geri Dön</a>
        </div>
    </section>





    <section class="content-body">


        <div class="formRow">
            <form action="{{ route('admin.settings.group.edit.update', ['id' => $group->group_id]) }}" method="POST"
                enctype="multipart/form-data">
            @csrf
            <div class="formRow-body">

                <dl>
                    <dt><label>Group</label></dt>
                    <dd><input type="text" class="form-control" name="group_name" value="{{ $group->group_name }}"></dd>
                </dl>
                <dl>
                    <dt><label>Group url</label></dt>
                    <dd><input name="group_url" value="{{ $group->group_url }}"></dd>
                </dl>
                <dl>
                    <dt><label>Group İcon <i class="{{ $group->group_icon }}"></i></label></dt>
                    <dd><input type="text" class="form-control" name="group_icon" value="{{ $group->group_icon }}"></dd>
                </dl>
                <dl>
                    <dt><label>Group Açıklama</label></dt>
                    <dd>  <textarea name="group_desc" id="summernote">{{ $group->group_desc }}</textarea></dd>
                </dl>


        </div>
        <div class="formRow-footer">
            <button  class="button--primary" type="submit">Kaydet</button>
        </div>
        </form>
        </div>




    </section>
@endsection
