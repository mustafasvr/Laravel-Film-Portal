@extends('admin.layout')
@section('adminmain')
    <section class="content-body ">

    @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif




        <div class="formRow">
            <form action="{{ route('admin.settings.store') }}" method="POST"
                enctype="multipart/form-data">
            @csrf
            <div class="formRow-body">

                <dl>
                    <dt><label>Ayar adı</label></dt>
                    <dd><input id="settings_name" name="settings_name" type="text" placeholder="ayar adı giriniz."></dd>
                </dl>
                <dl>
                    <dt><label>Ayar türü</label></dt>
                    <dd>
                        <select name="settings_type">
                            <option value="text">text</option>
                            <option value="color">color</option>
                            <option value="file">file</option>
                            <option value="textarea">textarea</option>
                            <option value="boolen">boolen</option>
                        </select></dd>
                </dl>
                <input type="hidden" name="group_id" value="{{ $group->group_id }}">


        </div>
        <div class="formRow-footer">
            <button  class="button--primary" type="submit">Kaydet</button>
        </div>
        </form>
        </div>



    </section>
@endsection
