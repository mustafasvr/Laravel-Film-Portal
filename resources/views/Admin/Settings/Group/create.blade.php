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

        <form action="{{ route('admin.settings.group.store') }}" method="POST" class="form">
            @csrf
            <div class="form-group">
                <label for="group_name">Group adı</label>
                <input id="group_name" name="group_name" type="text" placeholder="group adı giriniz.">
            </div>

            <div class="form-group">
                <label for="group_icon">Group iconu</label>
                <input id="group_icon" name="group_icon" type="text" placeholder="group için icon giriniz.">
            </div>

            <div class="form-group">
                <label for="group_desc">Group açıklama</label>
                <input id="group_desc" name="group_desc" type="text" placeholder="group için icon giriniz.">
            </div>

            <div class="form-group">
                <label for="group_order">Group sırası</label>
                <input id="group_order" name="group_order" type="number" placeholder="group için icon giriniz.">
            </div>
        
            <button type="submit">Kaydet</button>
        </form>

    </section>
@endsection
