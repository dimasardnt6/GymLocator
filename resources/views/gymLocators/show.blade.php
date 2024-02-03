@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h4 class="m-0 text-dark">Detail Gym</h4>
        {{-- css --}}
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin=""/>
        {{-- js --}}
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>
        <style>
            #map,
            #polygonMap {
                height: 500px;
            }
        </style>
        <!-- Template Main CSS File -->
        {{-- <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet"> --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="container">
                        <div class="position-relative h-100">
                            <div class="slides-1 portfolio-details-slider swiper">
                              <div class="swiper-wrapper align-items-center">
                                <div class="swiper-slide">
                                    <img src="{{ $gym->foto_gym ? asset('storage/' . $gym->foto_gym) : asset('assets/img/portfolio/portfolio-1.jpg') }}" alt="" style="width: 100%; height: 400px; object-fit: fill;">
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
                   {{-- Marker map --}}
                    <h4>Marker</h4>
                    <div id="map" class="mt-2"></div>
                    <h4 class="mt-5">Polygon</h4>
                    <div id="polygonMap" class="mt-2"></div>
                   {{-- Polygon Map --}}
                    <br>
                    <a href="{{ route('gymLocators.index') }}" class="btn btn-outline-dark mt-2">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@push('js')
{{-- Marker --}}
<script>
    var map = L.map('map').setView([{{ $gym->latitude }}, {{ $gym->longitude }}], 19);

    var gymIcon = L.icon({
        iconUrl: 'https://github.com/intern-monitoring/intern-monitoring.github.io/assets/94734096/0c1ece41-f5a3-40b9-b272-034c1ab62f97',
        iconSize: [50, 50],
        iconAnchor: [25, 50],
        popupAnchor: [0, -50]
    });

    L.tileLayer('https://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains:['mt0','mt1','mt2','mt3'] 
    }).addTo(map);

    // create marker from id
    var marker = L.marker([{{ $gym->latitude }}, {{ $gym->longitude }}],{icon: gymIcon}).addTo(map);    
</script>

<script>
    var dots = JSON.parse(document.getElementById('dataArray').value);
    
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
    var map = L.map('polygonMap').setView([latitude,longitude], 20);

    // var marker = L.marker([latitude,longitude]).addTo(map);

    L.polygon(linearray, {
        color: 'red'
    }).addTo(map);

    L.tileLayer('https://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 25,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    }).addTo(map);
</script>

@endpush