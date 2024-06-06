<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Gym Locator Bandung</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="https://github.com/dimasardnt6/GymLocator/assets/94734096/90f01c17-1182-48c2-b833-b08293661b47" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  {{-- css --}}
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
  integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
  crossorigin=""/>
  {{-- js --}}
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
  integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
  crossorigin=""></script>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/style2.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container-fluid">

      <div class="row justify-content-center">
        <div class="col-xl-9 d-flex align-items-center justify-content-lg-between">
          <h1 class="logo me-auto me-lg-0"><a href="index.html">GymLocator</a></h1>

          <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
              <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
              <li><a class="nav-link scrollto" href="#about">About</a></li>
              <li><a class="nav-link scrollto" href="#find">Find Gym</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->
          {{-- <a href="{{ url('/findGym') }}" class="get-started-btn scrollto">Cari Gym</a> --}}
        </div>
      </div>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-8">
          <h1>Temukan dan Jelajahi Gym di Bandung dengan mudah</h1>
          <h2>Gym Locator memberikan informasi lokasi dan fasilitas gym di Bandung, serta mendukung perjalanan kebugaran anda.</h2>
          <a href="#about" class="get-started-btn scrollto">Mulai Sekarang</a>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

     <!-- ======= About Section ======= -->
     <section id="about" class="features">
        <div class="container">
          <div class="section-title">
            <h2>Tentang Kami</h2>
            <p>Kami adalah pendukung gaya hidup sehat, berkomitmen untuk membantu Anda menemukan gym yang sempurna di Bandung. Misi kami adalah menjadikan kebugaran mudah diakses dan menyenangkan, memberikan informasi terperinci tentang lokasi gym, fasilitas, dan pengalaman kebugaran yang dipersonalisasi. Bergabunglah dengan kami dalam perjalanan Anda menuju diri Anda yang lebih sehat dan bahagia!</p>
          </div>
          <div class="row">
            <div class="col-lg-6 order-2 order-lg-1">
              <div class="icon-box mt-5 mt-lg-0">
                <i class="bx bx-receipt"></i>
                <h4>Misi Kami:</h4>
                <p>Memberdayakan perjalanan kebugaran dengan menyediakan informasi gym yang komprehensif di Bandung.</p>
              </div>
              <div class="icon-box mt-5">
                <i class="bx bx-shield"></i>
                <h4>Komitmen terhadap Kesehatan:</h4>
                <p>Mendukung gaya hidup yang lebih sehat melalui sumber daya kebugaran yang dapat diakses.</p>
              </div>
              <div class="icon-box mt-5">
                <i class="bx bx-images"></i>
                <h4>Wawasan Mendetail:</h4>
                <p>Menawarkan detail mendalam tentang lokasi gym, fasilitas, dan pengalaman kebugaran yang dipersonalisasi.</p>
              </div>
              <div class="icon-box mt-5">
                <i class="bx bx-cube-alt"></i>
                <h4>Mitra Kebugaran Anda:</h4>
                <p>Mendukung Anda dalam mencapai diri yang lebih sehat dan bahagia melalui pilihan dan bimbingan yang tepat.</p>
              </div>
            </div>
            <div class="image col-lg-6 order-1 order-lg-2" style='background-image: url("assets/img/about.jpg");'></div>
          </div>
  
        </div>
      </section><!-- End About Section -->

       <!-- ======= Find Gym Section ======= -->
      <section id="find" class="features">
        <div class="container-find">
          <div class="section-title-find" style="text-align: center;">
            <h2>Find Gym</h2>
            <p>Disini anda bisa mencari lokasi dan juga informasi tentang Gym yang ada di Bandung</p>
          </div>
          <div class="row">
            {{-- Column List --}}
          <div class="col-lg-4 order-2 order-lg-1">
            <div class="" style="margin-bottom: 10px">
              <form id="search-form" action="{{ route('search_gym') }}" method="get">
                  <div class="input-group">
                      <span id="search-icon" class="input-group-text text-body">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                          </svg>
                      </span>
                      <input id="search-input" type="text" class="form-control" placeholder="Search" name="query">
                      <span id="clear-icon" class="input-group-text text-body" style="cursor: pointer;">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                              <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                          </svg>
                      </span>
                  </div>
              </form>
            </div>
            <div class="card-list" id="card-list">
              @foreach($gymLocators as $gym)
                <div class="card" data-gym-id="{{ $gym->id }}" style="cursor: pointer">
                  <div class="card-content">
                    <div class="card-left">
                      <img src="{{ $gym->foto_gym ? asset('storage/' . $gym->foto_gym) : asset('assets/img/portfolio/portfolio-1.jpg') }}" alt="gambar">
                    </div>
                    <div class="card-right">
                      <h3>{{ $gym->nama_gym }}</h3>
                      <p>{{ $gym->alamat }}</p>
                      <a id="buttonDetail" href="{{ route('detailGym', $gym->id) }}" class="btn-detail btn-detail-rounded">
                          Detail
                      </a>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
            </div>
            {{-- Column List --}}
            {{-- Column Map --}}
            <div class="image col-lg-8 order-1 order-lg-2">
              <div id="map" style="border:0; width: 100%; height: 100%; position: relative;">
                <div id="info" style="border-radius: 10px; position: absolute; z-index: 1000; background: white; padding: 10px; right: 10px; top: 10px; display: none; font-size: 12px;">
                  <button id="close" style="position: absolute; right: 0; border: none; background: none;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                      <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                      <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                    </svg>
                  </button>
                  <div id="info-content"></div>
                </div>
              </div>
            </div>
            {{-- Column Map --}}
          </div>
        </div>
      </section>
      <!-- End Find Gym Section -->


  
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>GymLocator</h3>
      <p>Temukan dan Jelajahi Gym di Bandung dengan mudah.</p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>GymLocator</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
      // Fungsi untuk menampilkan lokasi pengguna saat ini
      function showCurrentLocation() {
        // Cek apakah geolocation tersedia di browser
        if (navigator.geolocation) {
          // Jika ya, dapatkan posisi saat ini
          navigator.geolocation.getCurrentPosition(
            function (position) {
              // Dapatkan koordinat lokasi saat ini
              var currentLocation = [position.coords.latitude, position.coords.longitude];
              // Atur peta untuk menampilkan lokasi saat ini dengan zoom level 12
              map.setView(currentLocation, 12);

              // Buat marker untuk lokasi saat ini dan tambahkan ke peta
              var currentLocationMarker = L.marker(currentLocation)
                .bindPopup(`<strong>MY LOCATION</strong><br>Latitude: ${position.coords.latitude}<br>Longitude: ${position.coords.longitude}`)
                .addTo(map);
            },
            function (error) {
              // Jika terjadi error saat mendapatkan lokasi, tampilkan pesan error
              console.error("Error getting current location:", error);
              alert("Error getting current location. Please make sure location services are enabled.");
            }
          );
        } else {
          // Jika geolocation tidak tersedia, tampilkan pesan error
          alert("Geolocation is not supported by your browser");
        }
      }

      // Koordinat awal untuk peta
      let coordinates = [-6.91437121499875, 107.61609709275542];
      // Membuat peta dan mengatur tampilan awal
      var map = L.map('map').setView(coordinates, 12);
      // Array untuk menyimpan semua marker
      var markers = [];

      // Menambahkan tile layer ke peta (dalam hal ini menggunakan Google Maps)
      L.tileLayer('https://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
      }).addTo(map);

      // Membuat ikon untuk gym
      var gymIcon = L.icon({
        iconUrl: 'https://github.com/intern-monitoring/intern-monitoring.github.io/assets/94734096/0c1ece41-f5a3-40b9-b272-034c1ab62f97',
        iconSize: [50, 50],
        iconAnchor: [25, 50],
        popupAnchor: [0, -50]
      });

      // Menampilkan lokasi pengguna saat ini
      showCurrentLocation();

      // Menambahkan event listener untuk tombol close
      document.getElementById('close').addEventListener('click', function() {
        // Menyembunyikan info ketika tombol close diklik
        document.getElementById('info').style.display = 'none';
      });

      // Looping melalui semua gym dan menambahkan marker ke peta
      @foreach($gymLocators as $gym)
        var marker = L.marker([{{ $gym->latitude }}, {{ $gym->longitude }}], {icon: gymIcon})
          .on('click', function() {
            document.getElementById('info-content').innerHTML = '<b>{{ $gym->nama_gym }}</b><br>{{ $gym->alamat }}</br><br><strong>Jam Operasional:</strong> {{ $gym->jam_operasional }}</b><br><strong>Nomor Telepon:</strong> {{ $gym->nomor_telepon }}<br><a href="{{ route('detailGym', $gym->id) }}">More Details</a>';
            document.getElementById('info').style.display = 'block';
          });
        // Menambahkan marker ke array markers
        markers.push(marker);
        // Menambahkan marker ke peta
        marker.addTo(map);
      @endforeach

      // Fungsi untuk menghapus semua marker dari peta
      function clearMarkers() {
        markers.forEach(function (marker) {
          marker.remove();
        });
        // Mengosongkan array markers
        markers = [];
      }
  </script>

  {{-- Search --}}
 
  <script>
      // Menunggu hingga dokumen selesai dimuat
      $(document).ready(function(){
        $('#search-form').on('submit', function(e){
          e.preventDefault();
          performSearch();
        });

        // Menambahkan event listener untuk klik icon search
        $('#search-icon').on('click', function(e){
          e.preventDefault();
          performSearch();
        });

        // Menambahkan event listener untuk klik icon clear
        $('#clear-icon').on('click', function(e){
          e.preventDefault();
          $('#search-input').val('');
          performSearch();
        });

        // Fungsi untuk melakukan pencarian
        function performSearch() {
          // Mengambil query dari input search
          var query = $('#search-input').val();

          // Melakukan request AJAX ke endpoint pencarian gym
          $.ajax({
            url: "{{ route('search_gym') }}",
            data: {query: query},
            dataType: 'json',
            success: function (data) {
              // Menghapus semua marker dari peta
              clearMarkers();
              // Mengosongkan list card
              $('#card-list').empty();

              // Looping melalui semua data gym yang diterima
              data.forEach(function (gym) {
                // Membuat card untuk gym
                var card = `
                  <div class="card" data-gym-id="{{ $gym->id }}" style="cursor: pointer">
                    <div class="card-content">
                      <div class="card-left">
                        <img src="${gym.foto_gym ? 'storage/' + gym.foto_gym : 'assets/img/portfolio/portfolio-1.jpg'}" alt="gambar">
                      </div>
                      <div class="card-right">
                        <h3>${gym.nama_gym}</h3>
                        <p>${gym.alamat}</p>
                        <a id="buttonDetail" href="/detailGym/${gym.id}" class="btn-detail btn-detail-rounded">
                          Detail
                        </a>
                      </div>
                    </div>
                  </div>
                `;

                // Menambahkan card ke list card
                $('#card-list').append(card);

                // Membuat marker untuk gym dan menambahkannya ke peta
                var marker = L.marker([gym.latitude, gym.longitude], { icon: gymIcon })
                  .on('click', function () {
                    // Menampilkan info gym ketika marker diklik
                    document.getElementById('info-content').innerHTML = `<b>${gym.nama_gym}</b><br>${gym.alamat}</b><br><strong>Jam Operasional:</strong> ${gym.jam_operasional}</b><br><strong>Nomor Telepon:</strong> ${gym.nomor_telepon}<br><a href="{{ route('detailGym', $gym->id) }}">More Details</a>`;
                    document.getElementById('info').style.display = 'block';
                  });
                markers.push(marker);
                marker.addTo(map);
              });
            }
          });
        }
      });
  </script>
  
  
 
</body>

</html>