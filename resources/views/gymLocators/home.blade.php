@extends('adminlte::page')

@section('title', 'GYM LOCATOR BANDUNG')

@section('content_header')
    <h4 class="m-0 text-dark">GYM LOCATOR BANDUNG</h4>
     {{-- css --}}
     <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
     {{-- js --}}
     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div id="info" style="position: absolute; z-index: 1000; background: white; padding: 10px; right: 0; top: 0; display: none; font-size: 12px;">
                        <button id="close" style="position: absolute; right: 0; border: none; background: none;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </button>
                        <div id="info-content"></div>
                    </div>
                    <div>
                        <select style="padding: 5px; border-radius: 5px;" id="pilihkabupaten">
                            <option value="" selected disabled>Pilih Kabupaten</option>
                            @if ($kabupatens)
                            @foreach ($kabupatens as $kabupaten)
                            <option value="{{$kabupaten['kabko']}}">{{$kabupaten['kabko']}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <br>
                    <div id="map" style="height: 500px;"></div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
<script>
    var Kabupaten = @json($kabupatens)

    let coordinates = [-6.91437121499875, 107.61609709275542];
    var map = L.map('map').setView(coordinates, 12);

    L.tileLayer('https://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains:['mt0','mt1','mt2','mt3'] 
    }).addTo(map);

    var gymIcon = L.icon({
        iconUrl: 'https://github.com/intern-monitoring/intern-monitoring.github.io/assets/94734096/0c1ece41-f5a3-40b9-b272-034c1ab62f97',
        iconSize: [50, 50],
        iconAnchor: [25, 50],
        popupAnchor: [0, -50]
    });

    document.getElementById('close').addEventListener('click', function() {
        document.getElementById('info').style.display = 'none';
    });

    let dataKabupaten = document.getElementById('pilihkabupaten');
    if (dataKabupaten) {
        dataKabupaten.addEventListener('change', function(item) {
           let selectedKabupaten = this.value;
           let kabupaten = Kabupaten.filter(function(item) {
               return item.kabko == selectedKabupaten;
           });  
           if (kabupaten.length > 0) {
              let coordinates = [kabupaten[0].lat, kabupaten[0].long];
              map.setView(coordinates, 17);
           }else{
               alert('Kabupaten tidak ditemukan');
           }
        });
    }

    @foreach($gymLocators as $gym)
        L.marker([{{ $gym->latitude }}, {{ $gym->longitude }}], {icon: gymIcon}).addTo(map)
        .on('click', function() {
            document.getElementById('info-content').innerHTML = '<b>{{ $gym->nama_gym }}</b><br>{{ $gym->alamat }}</b><br><strong>Jam Operasional:</strong> {{ $gym->jam_operasional }}</b><br><strong>Nomor Telepon:</strong> {{ $gym->nomor_telepon }}<br><a href="{{ route('gymLocators.show', $gym->id) }}">More Details</a>';
            document.getElementById('info').style.display = 'block';
        });
    @endforeach
</script>
@endpush
