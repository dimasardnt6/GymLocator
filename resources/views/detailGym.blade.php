<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Gym Locator Bandung</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
   {{-- css --}}
   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
   integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
   crossorigin=""/>
   {{-- js --}}
   <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
   integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
   crossorigin=""></script>

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
   <!-- ======= Header ======= -->
   <header id="header" class="fixed-top header-inner-pages">
    <div class="container-fluid">

      <div class="row justify-content-center">
        <div class="col-xl-9 d-flex align-items-center justify-content-lg-between">
          <h1 class="logo me-auto me-lg-0"><a href="index.html">GymLocator</a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

          <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
              <li><a class="nav-link scrollto" href="{{url('/')}}">Home</a></li>
              <li><a class="nav-link scrollto" href="{{url('/')}}">About</a></li>
              <li><a class="nav-link scrollto" href="{{url('/')}}">Find Gym</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->
          {{-- <a href="{{url('/findGym')}}" class="get-started-btn scrollto">Cari Gym</a> --}}
        </div>
      </div>

    </div>
  </header><!-- End Header -->

  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div id="breadcrumbs" class="breadcrumbs section-find">
      <div style="padding: 0px 80px 0px 80px">
        <ol>
          <li><a href="{{url('/')}}">Home</a></li>
          <li>Detail Gym</li>
        </ol>
        <h2>Detail</h2>
      </div>
    </div>
    <!-- End Breadcrumbs -->

    <div style="padding: 0px 80px 0px 80px">
      <div class="position-relative h-100">
        <div style="padding-top: 20px;">
          <a href="/" class="btn btn-outline-dark">Kembali</a>
        </div>
          <div class="slides-1 portfolio-details-slider swiper">
            <div class="swiper-wrapper align-items-center">
              <div style="width: 100%; height: 600px;padding-top: 20px" >
                  <img src="{{ $gym->foto_gym ? asset('storage/' . $gym->foto_gym) : asset('assets/img/portfolio/portfolio-1.jpg') }}" alt="" style="width: 100%; height: 600px; object-fit: cover;">
              </div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
      </div>
      <div class="row justify-content-between gy-4 mt-4">
          <div class="col-lg-8">
              <div class="portfolio-description">
                  <h2>{{ $gym->nama_gym }}</h2>
                  <p>{{ $gym->alamat }}</p>
                  <p>{{ $gym->deskripsi_gym }}</p>
                  <h5>Fasilitas Gym</h5>
                  <div>{!! $gym->fasilitas_gym !!}</div>
              </div>
          </div>
          <div class="col-lg-4">
              <div class="card">
                  <!-- Card image -->
                  <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                      <!-- List group -->
                      <ul class="list-group list-group-flush">
                          <li dataLatitude="{{$gym->latitude}}" class="list-group-item"><strong>Latitude</strong>: {{ $gym->latitude }}</li>
                          <li dataLongitude="{{$gym->longitude}}" class="list-group-item"><strong>Longitude</strong>: {{ $gym->longitude }}</li>
                          <li class="list-group-item"><strong>Nomor Telepon</strong>: {{ $gym->nomor_telepon }}</li>
                          <li class="list-group-item"><strong>Operasional</strong>: {{ $gym->jam_operasional }}</li>
                          <li class="list-group-item"><strong>Harga Member</strong>: {{ $gym->harga_member }}</li>
                          <li class="list-group-item"><strong>Harga Visit</strong>: {{ $gym->harga_visit }}</li>
                          <input type="hidden" name="dataArray" id="dataArray" value="{{$polygons}}">
                      </ul>
                  </div>
              </div>
          </div>
      </div>
    </div>
  <br>

 <div style="padding: 0px 80px 50px 80px">
  <h4>Lokasi Gym</h4>
   {{-- map --}}
  <div id="polygonMap" class="mt-2" style="height: 400px;"></div>
 </div>
  
  <br>
 
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
  <script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

  <script>
    var dots = JSON.parse(document.getElementById('dataArray').value);
    var gymIcon = L.icon({
          iconUrl: 'https://github.com/intern-monitoring/intern-monitoring.github.io/assets/94734096/0c1ece41-f5a3-40b9-b272-034c1ab62f97',
          iconSize: [50, 50],
          iconAnchor: [25, 50],
          popupAnchor: [0, -50]
      });
    
    console.log(dots);
    var linearray = []
    dots.forEach(element => {
        // console.log([element.latitude, element.longitude]);
        
        linearray.push([element.latitude_polygon, element.longitude_polygon]);
    });
    console.log(linearray);

    var latitude = document.querySelector('li[dataLatitude]').getAttribute('dataLatitude');
    var longitude = document.querySelector('li[dataLongitude]').getAttribute('dataLongitude');
    console.log(latitude, longitude);
    var map = L.map('polygonMap').setView([latitude,longitude], 21);

    var marker = L.marker([latitude,longitude],{icon: gymIcon}).addTo(map);

    L.polygon(linearray, {
        color: 'red'
    }).addTo(map);

    L.tileLayer('https://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 25,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    }).addTo(map);
  </script>

</body>

</html>