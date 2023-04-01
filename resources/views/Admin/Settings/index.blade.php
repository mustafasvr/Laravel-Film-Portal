@extends('Admin.layout')

@section('adminmain')

<section class="content-header">
    <div class="ch-right">
        <a href="{{ route('admin.settings.index') }}" class="button button--primary"><i class="fas fa-arrow-left"></i> Geri dön</a>
        <a href="{{ route('admin.settings.create',['group' => $groups->group_url ]) }}" class="button">Ayar Ekle</a>
    </div>
</section>




<section class="content-body">
    <div class="formRow">
        <div class="formRow-header">
            <h1>{{ $groups->group_name }}</h1>
        </div>
    <form action="{{ route('admin.settings.update',['group' => $groups->group_url ]) }}">
        @csrf
        <div class="formRow-body">
        @foreach ($settings as $item)
            <dl>
                <dt>{{ $item->settings_name }} </dt>
                <dd>
                    @if ($item->settings_type == 'text')
                    <input type="text"   name="{{ $item->settings_name }}"   value="{{ $item->settings_value }}">
                    @elseif($item->settings_type == 'color')
                    <input type="color" name="{{ $item->settings_name }}"   value="{{ $item->settings_value }}">
                    @elseif($item->settings_type == 'file')
                    <img src="{{ $item->settings_value }}" alt="{{ $item->settings_name }}">
                    <input type="file" name="{{ $item->settings_name }}"   value="{{ $item->settings_value }}">
                    @elseif($item->settings_type == 'textarea')
                    <textarea name="{{ $item->settings_name }}" cols="60" rows="2">{{ $item->settings_value }}</textarea>
                    @endif
                    </dd>
            </dl>
            @endforeach
    </div>
    <div class="formRow-footer">
        <button  class="button--primary" type="submit">Kaydet</button>
    </div>
    </form>
    </div>


</section>

@endsection
