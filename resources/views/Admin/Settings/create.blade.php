@extends('admin.layout')
@section('adminmain')
    <section class="content-body content-row">

    @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

        <form action="{{ route('admin.settings.store') }}" method="POST" class="form">
            @csrf
            <div class="form-group">
                <label for="settings_name">Ayar Adı</label>
                <input id="settings_name" name="settings_name" type="text" placeholder="ayar adı giriniz.">
            </div>
            
            <input type="hidden" name="group_id" value="{{ $group->group_id }}">

            <select name="settings_type">
                <option value="text">text</option>
                <option value="color">color</option>
                <option value="file">file</option>
                <option value="textarea">textarea</option>
            </select>

            <button type="submit">Kaydet</button>
        </form>

    </section>
@endsection
