@extends('Public.layout')
@section('title',$user->username.' | '.config('settings.title'))
@section('main')

<div class="profile-container">
    <div class="profile-body">
        <div class="profile-image">
            <img src="{{ asset('images/user/'.Auth::user()->picture) }}" alt="{{ Auth::user()->username }}">
        </div>
        <div class="profile-info">
            <div class="profile-info-body">
                <div class="user-info">
                    <span> <i class="fas fa-user"></i> {{ Auth::user()->username }}</span>
                    <span> <i class="fas fa-envelope"></i> {{ Auth::user()->email }}</span>
                </div>
                <div class="user-reaction">
                <dl>
                    <dt>Mesaj</dt>
                    <dd>{{ $comment }}</dd>
                </dl>
                <dl>
                    <dt>Değerlendirme</dt>
                    <dd>{{ $vote }} </dd>
                </dl>
            </div>
            <div class="user-avatar">
                <form action="{{route('profile.edit.update',['name'=> $user->username,'id' => $user->user_id ])}}" method="POST"
                    enctype="multipart/form-data">
                @csrf
                    <input type="file" name="avatar"> <button type="submit" class="button">Kaydet</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>

@endsection