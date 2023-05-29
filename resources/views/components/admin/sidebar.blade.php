<aside id="sidebar">
<div class="sidebar-container">
    <div class="sidebar-header">
        <h1><a href="{{ route('admin.index') }}"> {{ config('settings.shortName') }} Admin Panel</a></h1>
    </div>
    <div class="sidebar-body">
        <ul>
            <a href="/" target="_blank"><li>
                <i class="fas fa-compass"></i>
                Siteyi Görüntüle</li></a>
            <a href="{{ route('admin.index') }}"><li>
                <i class="fas fa-home"></i>
                Dashborad</li></a>
             <a href="{{ route('admin.film.index') }}"><li>
                <i class="fas fa-clapperboard"></i>
              Filmler</li></a>

              <a href="{{ route('admin.categories.index') }}"><li>
                <i class="fas fa-chess"></i>
              Kategoriler</li></a>

              <a href="{{ route('admin.user.index') }}"><li>
                <i class="fas fa-users"></i>
              Kullanıcılar</li></a>

              <a href="{{ route('admin.settings.index') }}"><li>
                <i class="fas fa-cog"></i>
              Ayarlar</li></a>

        </ul>
    </div>


</div>
</aside>