@extends('Admin.layout')

@section('adminmain')

<section class="content-header">
    <div class="ch-right">
        <a href="{{ route('admin.categories.insert') }}" class="button">Kategori Çek</a>
    </div>
</section>


<section class="content-body">

    <ul class="admin-table">
        @foreach ($users as $item)
        <li class="admin-table-tr">
            <div class="admin-table-icon">
                <img src="{{ asset('images/user/'.$item->picture) }}" alt="{{ $item->username }}">
            </div>
            <div class="admin-table-title">
                <a href="{{ Route('admin.user.edit',['name'=> $item->username,'id'=> $item->user_id]) }}"> {{ $item->username }}</a>
            </div>
             <div class="admin-table-tool">
                <a href="{{ Route('admin.user.edit',['name'=> $item->username,'id'=> $item->user_id]) }}"><i class="fas fa-pencil"></i></a> 
            </div>


        </li>
        @endforeach
    </ul>


</section>
@endsection