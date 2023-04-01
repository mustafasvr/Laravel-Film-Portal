@extends('Admin.layout')

@section('adminmain')

<section class="content-header">
    <div class="ch-right">
        <a href="{{ route('admin.settings.group.create') }}" class="button">Group Ekle</a>
    </div>
</section>


<section class="content-body">

    <ul class="admin-table">
        @foreach ($group as $item)
        <li class="admin-table-tr">
            <div class="admin-table-icon">
                @if ($item->group_icon)
        <i class="fas fa-{{ $item->group_icon }}"></i>
        @else 
        <i class="fas fa-ban"></i>
        @endif
            </div>
            <div class="admin-table-title">
                <a href="{{ Route('admin.settings.group',['group'=> $item->group_url]) }}"><b>{{ $item->group_name }}</b></a>
            </div>
            <div class="admin-table-tool">
                @if($item->group_delete)
                <a href="{{ Route('admin.settings.group.edit',['id'=> $item->group_id,'group' => $item->group_url]) }}"><i class="fas fa-pencil"></i></a> 
         
                <a href="{{ Route('admin.settings.group.destroy',['id'=> $item->group_id]) }}"><i class="fas fa-trash"></i></a>
                @endif
           
            </div>
        </li>
        @endforeach
    </ul>

</section>

@endsection
