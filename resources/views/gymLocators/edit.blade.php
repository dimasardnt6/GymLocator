@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h4 class="m-0 text-dark">Edit Gym</h4>
    {{-- Include Leaflet CSS and JS --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
          crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
            crossorigin=""></script>
    <style>
        #map {height: 500px;}
        #mapPolygon {height: 500px;}
    </style>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('gymLocators.update', $gym->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body" style="overflow: auto">
                            <div class="mb-3">
                                <label for="nama_gym" class="form-label">Nama Gym</label>
                                <input type="text" class="form-control" value="{{ $gym->nama_gym }}" placeholder="Nama Gym" name="nama_gym">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat Gym</label>
                                <input type="text" class="form-control" value="{{ $gym->alamat }}" placeholder="Alamat" name="alamat">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi_gym" class="form-label">Deskripsi Gym</label>
                                <textarea class="form-control" rows="3" placeholder="Deskripsi Gym" name="deskripsi_gym">{{ $gym->deskripsi_gym }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="fasilitas_gym" class="form-label">Fasilitas Gym</label>
                                <input id="fasilitas_gym" type="hidden" name="fasilitas_gym" value="{{ $gym->fasilitas_gym }}">
                                <trix-editor input="fasilitas_gym"></trix-editor>
                            </div>
                            <div class="mb-3">
                                <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                                <input type="number" class="form-control" value="{{ $gym->nomor_telepon }}" placeholder="Nomor Telepon" name="nomor_telepon">
                            </div>
                            <div class="mb-3">
                                <label for="harga_member" class="form-label">Harga Member</label>
                                <input type="number" class="form-control" value="{{ $gym->harga_member }}" placeholder="Harga Member" name="harga_member">
                            </div>
                            <div class="mb-3">
                                <label for="harga_visit" class="form-label">Harga Visit</label>
                                <input type="number" class="form-control" value="{{ $gym->harga_visit }}" placeholder="Harga Visit" name="harga_visit">
                            </div>
                            <div class="mb-3">
                                <label for="jam_operasional" class="form-label">Jam Operasional</label>
                                <input type="text" class="form-control" value="{{ $gym->jam_operasional }}" placeholder="Jam Operasional" name="jam_operasional">
                            </div>
                            <div class="mb-3">
                                <label for="foto_gym" class="form-label">Foto Gym</label>
                                <input class="form-control mb-3" type="file" id="foto_gym" name="foto_gym" onchange="previewImage(event)">
                                <img id="image-preview" class="img-fluid" style="display: none;">
                                @if($gym->foto_gym)
                                    <img src="{{ asset('storage/' . $gym->foto_gym) }}" alt="Foto Gym" class="img-fluid" id="existing-image">
                                @else
                                    No Image
                                @endif
                            </div>
                            <div class="mb-3">
                                <h4>Marker</h5>
                            </div>
                            <div class="mb-3">
                                <label for="latitude" class="form-label">Latitude</label>
                                <input type="text" class="form-control" value="{{ $gym->latitude }}" id="latitude" placeholder="Latitude" name="latitude">
                            </div>
                            <div class="mb-3">
                                <label for="longitude" class="form-label">Longitude</label>
                                <input type="text" class="form-control" value="{{ $gym->longitude }}" id="longitude" placeholder="Longitude" name="longitude">
                            </div>
                           
                            <div id="map" class="mt-2"></div>

                            <br>

                            <div class="mb-3 d-flex justify-content-between">
                                <h4>Polygon</h4>
                                <button type="button" class="btn btn-warning" id="clearPolygon">Clear Polygon</button>
                            </div>
                            <div class="mb-3">
                                <label for="latitude_polygon" class="form-label">Latitude</label>
                                <input type="text" class="form-control" value="{{ $gym->latitude }}" id="latitude_polygon" placeholder="Latitude" name="latitude_polygon">
                            </div>
                            <div class="mb-3">
                                <label for="longitude_polygon" class="form-label">Longitude</label>
                                <input type="text" class="form-control" value="{{ $gym->longitude }}" id="longitude_polygon" placeholder="Longitude" name="longitude_polygon">
                            </div>
                            <input type="hidden" name="dataArray" id="dataArray" value="{{$polygons}}">
                            <div id="mapPolygon" class="mt-2"></div>
                            <br>
                            <button type="submit" class="btn btn-primary mt-2">Update</button>
                            <a href="{{route('gymLocators.index')}}" class="btn btn-outline-dark mt-2">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var preview = document.getElementById('image-preview');
            var existingImage = document.getElementById('existing-image');
            if (existingImage) {
                existingImage.style.display = 'none';
            }
            preview.src = reader.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
{{-- Marker --}}
<script>
    var map = L.map('map').setView([{{ $gym->latitude }}, {{ $gym->longitude }}], 18);

    L.tileLayer('https://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 25,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    }).addTo(map);

    var gymIcon = L.icon({
        iconUrl: 'https://github.com/intern-monitoring/intern-monitoring.github.io/assets/94734096/0c1ece41-f5a3-40b9-b272-034c1ab62f97',
        iconSize: [50, 50],
        iconAnchor: [25, 50],
        popupAnchor: [0, -50]
    });

    // create marker from id
    var marker = L.marker([{{ $gym->latitude }}, {{ $gym->longitude }}], {icon: gymIcon}).addTo(map);

    function onMapClick(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;
        var coord = e.latlng.toString();

        // Update the marker position
        if (marker) {
            map.removeLayer(marker);
        }

        marker = L.marker(e.latlng, {icon: gymIcon}).addTo(map)
            .bindPopup("Koordinat: " + e.latlng.toString())
            .openPopup();

        // Remove previous markerPolygon
        mapPolygon.removeLayer(markerPolygon);

        // Update markerPolygon position
        markerPolygon = L.marker([lat, lng]).addTo(mapPolygon);

        // Update the view of the mapPolygon
        mapPolygon.setView(e.latlng);
        mapPolygon.removeLayer(polygon);
        markers.clearLayers();
        linearray = [];

        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lng;
    }
    map.on('click', onMapClick);

    // Get the latitude and longitude inputs
    var latInput = document.getElementById('latitude');
    var lngInput = document.getElementById('longitude');

    // Function to update the marker and set the map view
    function updateMarkerAndView() {
        var lat = latInput.value;
        var lng = lngInput.value;

        if (lat && lng) {
            var latlng = L.latLng(lat, lng);

            if (marker) {
                map.removeLayer(marker);
            }

            marker = L.marker(latlng, {icon: gymIcon}).addTo(map)
                .bindPopup("Koordinat: " + latlng.toString())
                .openPopup();

            // Set the map view to the marker location
            map.setView(latlng);
        }
    }

    // Add the event listeners
    latInput.addEventListener('change', updateMarkerAndView);
    lngInput.addEventListener('change', updateMarkerAndView);
</script>
{{-- Polygon --}}
<script> 
    var longitude = document.getElementById("longitude").value;
    var latitude = document.getElementById("latitude").value;
    
    var mapPolygon = L.map('mapPolygon').setView([latitude, longitude], 20);
    var clearPolygon = document.getElementById('clearPolygon');
    var linearray = [];

    var dots = JSON.parse(document.getElementById('dataArray').value);
    var markers = L.layerGroup().addTo(mapPolygon);
    dots.forEach(element => {
        var marker = L.marker([element.latitude_polygon,element.longitude_polygon]).addTo(markers);
        linearray.push([element.latitude_polygon, element.longitude_polygon]);
    });

    var markerPolygon = L.marker([latitude, longitude]).addTo(mapPolygon);

    var polygon = L.polygon(linearray, {
        color: 'red'
    }).addTo(mapPolygon);

    clearPolygon.addEventListener('click', function() {
        mapPolygon.removeLayer(polygon);
        markers.clearLayers();
        linearray = [];
    });
    
    L.tileLayer('https://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 25,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    }).addTo(mapPolygon);

    function onMapClick(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;
        var coord = e.latlng.toString();

        var marker = L.marker(e.latlng).addTo(markers);
        linearray.push([lat, lng]);

        if (linearray.length > 1) {
            if (polygon) {
                mapPolygon.removeLayer(polygon);
            }
            polygon = L.polygon(linearray, {
                color: 'red'
            }).addTo(mapPolygon);
        }

        document.getElementById('latitude_polygon').value = lat;
        document.getElementById('longitude_polygon').value = lng;

        var jsonData = JSON.stringify(linearray);
        document.getElementById('dataArray').value = jsonData;
        console.log(document.getElementById('dataArray').value);
    }

    mapPolygon.on('click', onMapClick);
</script>
@endpush
