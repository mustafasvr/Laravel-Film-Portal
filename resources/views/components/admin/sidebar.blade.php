<aside id="sidebar">
<div class="sidebar-container">
    <div class="sidebar-header">
        <h1><a href="{{ route('admin') }}">Admin Panel</a></h1>
    </div>
    <div class="sidebar-body">
        <ul>
            <a href="{{ route('admin') }}"><li>
                <i class="fas fa-home"></i>
                Dashborad</li></a>
             <a href="{{ route('film') }}"><li>
                <i class="fas fa-clapperboard"></i>
              Filmler</li></a>

              <a href="{{ route('categories') }}"><li>
                <i class="fas fa-chess"></i>
              Kategoriler</li></a>

        </ul>
    </div>


</div>
</aside>