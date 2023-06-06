@extends('Admin.layout')

@section('adminmain')

<section class="content-header">
    <div class="ch-left">
        <h1>Dashboard</h1></div>
</section>



    <section class="content-body content-row">
        <p>
           <h1>Hoş Geldiniz!</h1> 
            Film Sitemiz Admin Paneline hoş geldiniz! Bu panel, film sitesinin yönetimini kolaylaştırmak ve içerikleri güncel tutmak için tasarlanmıştır. İşte bu panelde gerçekleştirebileceğiniz bazı temel işlevler:
          </p>
          
          <p>
            1. Film Ekleme ve Düzenleme: Yeni filmleri sisteme ekleyebilir veya mevcut filmlerin bilgilerini güncelleyebilirsiniz. Bu sayede kullanıcılarımıza her zaman en yeni ve ilgi çekici filmleri sunabilirsiniz.
          </p>
          
          <p>
            2. Kategori Yönetimi: Film sitemizde kullanıcıların filmleri keşfetmesini kolaylaştırmak için çeşitli kategoriler bulunmaktadır. Bu panel üzerinden film kategorilerini oluşturabilir, düzenleyebilir veya kaldırabilirsiniz.
          </p>
          
          <p>
            3. Kullanıcı Yönetimi: Kullanıcıların film sitemizde hesap oluşturarak daha fazla özellikten faydalanmasını sağlayabilirsiniz. Bu panelde kullanıcıları yönetebilir, hesapları etkinleştirebilir veya devre dışı bırakabilirsiniz.
          </p>
          
          <p>
            4. İstatistikler: Film sitemizin performansını ve kullanıcı etkileşimlerini takip etmek için istatistikleri inceleyebilirsiniz. Hangi filmlerin daha popüler olduğunu, hangi kategorilerin daha çok ilgi gördüğünü ve kullanıcı etkileşimlerini görebilirsiniz.
          </p>

          <p>
            Bu admin paneli, film sitesinin yönetimini kolaylaştırmak ve kullanıcı deneyimini geliştirmek için tasarlanmıştır.
        </p>
          
          

    </section>

    <section class="content-info">
        <div class="content-info-box">
            <i class="fas fa-clapperboard"></i>
            <div class="main">
                <h3>Filmler</h3>
            <span>{{ $film }}</span>
            </div>
        </div>
        <div class="content-info-box">
            <i class="fas fa-user"></i>
            <div class="main">
                <h3>Kullanıcılar</h3>
            <span>{{ $user }}</span>
            </div>
        </div>
        <div class="content-info-box">
            <i class="fas fa-comments"></i>
            <div class="main">
                <h3>Yorumlar</h3>
            <span>{{ $filmComment }}</span>
            </div>
        </div>
    </section>

@endsection
