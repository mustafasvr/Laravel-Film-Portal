@extends('Admin.layout')

@section('adminmain')

<section class="content-header">
    <div class="ch-left">
        <h1>{{ $user->username }} üyesini düzenle</h1>
    </div>
    <div class="ch-right">
        <a href="{{ route('admin.user.index') }}" class="button">Geri Dön</a>
    </div>
</section>



<section class="content-body">


    <div class="formRow">
        <form action="{{route('admin.user.edit.update',['name'=> $user->username,'id' => $user->user_id ])}}" method="POST"
            enctype="multipart/form-data">
        @csrf
        <div class="formRow-body">

            <dl>
                <dt><label>Avatar</label></dt>
                <dd>
                    <img src="{{  asset('images/user/'.$user->picture) }}" alt="{{ $user->username }}"  width="128px">
                    <input type="file" class="form-control" name="picture" >
                </dd>
            </dl>

            <dl>
                <dt><label>Kullanıcı</label></dt>
                <dd><input type="text" class="form-control" name="username" value="{{ $user->username }}"></dd>
            </dl>
            <dl>
                <dt><label>Email</label></dt>
                <dd><input name="email" value="{{ $user->email }}"></dd>
            </dl>
            <dl>
                <dt><label>Yetki<i class=""></i></label></dt>
                <dd>                
                    <select name="permission">
                        @if ($user->permission == 'user')
                        <option selected value="user">Kullanıcı</option>
                        <option value="admin">Admin</option>
                        <option  value="banned">Yasaklı</option>
                        @elseif($user->permission == 'admin')
                        <option  value="user">Kullanıcı</option>
                        <option selected value="admin">Admin</option>
                        <option  value="banned">Yasaklı</option>
                        @elseif($user->permission == 'banned')
                        <option  value="user">Kullanıcı</option>
                        <option value="admin">Admin</option>
                        <option selected value="banned">Yasaklı</option>
                        @endif
                    </select>
                
                </dd>
            </dl>
            <dl>
                <dt><label>Durum<i class=""></i></label></dt>
                <dd>                
                    <select name="user_state">
                        @if ($user->user_state == 'email_onay')
                        <option selected value="email_onay">Email Onay</option>
                        <option value="aktif">Aktif</option>
                        <option  value="pasif">Pasif</option>
                        @elseif($user->user_state == 'aktif')
                        <option value="email_onay">Email Onay</option>
                        <option selected value="aktif">Aktif</option>
                        <option  value="pasif">Pasif</option>
                        @elseif($user->user_state == 'pasif')
                        <option value="email_onay">Email Onay</option>
                        <option value="aktif">Aktif</option>
                        <option selected value="pasif">Pasif</option>
                        @endif
                    </select>
                
                </dd>
            </dl>


    </div>
    <div class="formRow-footer">
        <button  class="button--primary" type="submit">Kaydet</button>
    </div>
    </form>
    </div>




</section>

@endsection