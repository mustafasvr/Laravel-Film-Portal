@extends('Admin.layout')

@section('adminmain')

<section class="content-header">
    <div class="ch-right">
        <a href="{{ route('admin.categories.insert') }}" class="button">Kategori Çek</a>
    </div>
</section>


<section class="content-body">

    <ul class="admin-table">
        @foreach ($categories as $item)
        <li class="admin-table-tr">
            <div class="admin-table-icon">
                @if ($item->category_icon)
        <i class="{{ $item->category_icon }}"></i>
        @else 
        <i class="fas fa-ban"></i>
        @endif
            </div>
            <div class="admin-table-title">
                <a href="{{ Route('admin.categories.edit',['id'=> $item->category_id]) }}"> {{ $item->category_name }}</a>
            </div>
            <div class="admin-table-tool">
                <a href="{{ Route('admin.categories.edit',['id'=> $item->category_id]) }}"><i class="fas fa-pencil"></i></a>
            </div>
        </li>
        @endforeach
    </ul>


</section>
@endsection