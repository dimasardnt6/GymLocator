@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">TAMBAH DATA GYM</h1>
    {{-- css --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>
    {{-- js --}}
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>
    <style>
        #mapMarker {height: 500px;}
        #mapPolygon {height: 500px;}
    </style>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
@stop

@section('content')
<form action="{{route('gymLocators.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="overflow: auto">
                    <div class="mb-3">
                        <label for="nama_gym" class="form-label">Nama Gym</label>
                        <input type="text" class="form-control" id="nama_gym" placeholder="Nama Gym" name="nama_gym">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat Gym</label>
                        <input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi_gym" class="form-label">Deskripsi Gym</label>
                        <textarea class="form-control" id="deskripsi_gym" rows="3" placeholder="Deskripsi Gym" name="deskripsi_gym"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="fasilitas_gym" class="form-label">Fasilitas Gym</label>
                        <input id="fasilitas_gym" type="hidden" name="fasilitas_gym">
                        <trix-editor input="fasilitas_gym"></trix-editor>
                    </div>
                    <div class="mb-3">
                        <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                        <input type="number" class="form-control" id="nomor_telepon" placeholder="Nomor Telepon" name="nomor_telepon">
                    </div>
                    <div class="mb-3">
                        <label for="harga_member" class="form-label">Harga Member</label>
                        <input type="number" class="form-control" id="harga_member" placeholder="Harga Member" name="harga_member">
                    </div>
                    <div class="mb-3">
                        <label for="harga_visit" class="form-label">Harga Visit</label>
                        <input type="number" class="form-control" id="harga_visit" placeholder="Harga Visit" name="harga_visit">
                    </div>
                    <div class="mb-3">
                        <label for="jam_operasional" class="form-label">Jam Operasional</label>
                        <input type="text" class="form-control" id="jam_operasional" placeholder="Jam Operasional" name="jam_operasional">
                    </div>
                    <div class="mb-3">
                        <label for="foto_gym" class="form-label">Foto Gym</label>
                        <input class="form-control" type="file" id="foto_gym" name="foto_gym" onchange="previewImage(event)">
                        <img id="preview" style="margin-top: 10px; max-width: 300px;">
                    </div>
                    <div class="mb-3">
                        <h4>Marker</h5>
                    </div>
                    <div class="mb-3">
                        <label for="latitudeMarker" class="form-label">Latitude</label>
                        <input type="text" class="form-control" id="latitudeMarker" placeholder="Latitude" name="latitudeMarker">
                    </div>
                    <div class="mb-3">
                        <label for="longitudeMarker" class="form-label">Longitude</label>
                        <input type="text" class="form-control" id="longitudeMarker" placeholder="Longitude" name="longitudeMarker">
                    </div>
                    <br>
                    <div class="mb-3">
                        <div id="mapMarker"></div>
                    </div> 
                    <div class="mb-3">
                        <h4>Polygon</h5>
                    </div>
                    <div class="mb-3">
                        <label for="latitude_polygon" class="form-label">Latitude</label>
                        <input type="text" class="form-control" id="latitude_polygon" placeholder="Latitude" name="latitude_polygon">
                    </div>
                    <div class="mb-3">
                        <label for="longitude_polygon" class="form-label">Longitude</label>
                        <input type="text" class="form-control" id="longitude_polygon" placeholder="Longitude" name="longitude_polygon">
                    </div>
                    <input type="hidden" name="dataArray" id="dataArray">
                    <div class="mb-3">
                        <div id="mapPolygon"></div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                    <a href="{{route('gymLocators.index')}}" class="btn btn-default mt-2">Batal</a>
                </div>
            </div>
        </div>
    </div>
</form>
@stop

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('preview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
<script>
var map = L.map('mapMarker').setView([-6.8931149, 107.6090784], 13);

L.tileLayer('https://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3'] 
}).addTo(map);

// Marker
var marker;

var gymIcon = L.icon({
        iconUrl: 'https://github.com/intern-monitoring/intern-monitoring.github.io/assets/94734096/0c1ece41-f5a3-40b9-b272-034c1ab62f97',
        iconSize: [50, 50],
        iconAnchor: [25, 50],
        popupAnchor: [0, -50]
    });

function onMapClick(e) {
    document.getElementById('latitudeMarker').value = e.latlng.lat;
    document.getElementById('longitudeMarker').value = e.latlng.lng;

    if (marker) {
        map.removeLayer(marker);
    }

    marker = L.marker(e.latlng, {icon: gymIcon}).addTo(map)
        .bindPopup("Koordinat: " + e.latlng.toString())
        .openPopup();

    marker.on('click', function(e) {
        map.removeLayer(marker);
        document.getElementById('latitudeMarker').value = null;
        document.getElementById('longitudeMarker').value = null;
    });
}
map.on('click', onMapClick);

// Get the latitudeMarker and longitudeMarker inputs
var latInput = document.getElementById('latitudeMarker');
var lngInput = document.getElementById('longitudeMarker');

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
    var mapPolygon = L.map('mapPolygon').setView([-6.8931149, 107.6090784], 13);

    L.tileLayer('https://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains:['mt0','mt1','mt2','mt3'] 
    }).addTo(mapPolygon);

    var markerPolygon;
    var linearray = [];
    var polygon;

    // Get the latitudeMarker and longitudeMarker inputs
    var latMarkerInput = document.getElementById('latitudeMarker');
    var lngMarkerInput = document.getElementById('longitudeMarker');

    // Function to update the map view
    function updatePolygonMapView() {
        var lat = latMarkerInput.value;
        var lng = lngMarkerInput.value;

        if (lat && lng) {
            var latlng = L.latLng(lat, lng);

            // If a marker already exists, remove it
            if (markerPolygon) {
                mapPolygon.removeLayer(markerPolygon);
            }

            // Create a new marker and add it to the map
            markerPolygon = L.marker(latlng).addTo(mapPolygon);

            // Set the map view to the marker location
            mapPolygon.setView(latlng, 20);
        }
    }

    function onMapClick(e) {
        document.getElementById('latitudeMarker').value = e.latlng.lat;
        document.getElementById('longitudeMarker').value = e.latlng.lng;

        if (marker) {
            map.removeLayer(marker);
        }

        marker = L.marker(e.latlng, {icon: gymIcon}).addTo(map)
            .bindPopup("Koordinat: " + e.latlng.toString())
            .openPopup();

        marker.on('click', function(e) {
            map.removeLayer(marker);
            document.getElementById('latitudeMarker').value = null;
            document.getElementById('longitudeMarker').value = null;
        });

        // Update the view of mapPolygon
        updatePolygonMapView();
    }

    map.on('click', onMapClick);

    mapPolygon.on('click', function(e) {
        var latPoly = e.latlng.lat;
        var lngPoly = e.latlng.lng;
        var coord = e.latlng.toString();
        markerPolygon = L.marker(e.latlng).addTo(mapPolygon)
            .bindPopup("Koordinat: " + coord)
            .openPopup();
        linearray.push([latPoly, lngPoly]);
        if (linearray.length > 1) {
            if (polygon) {
                mapPolygon.removeLayer(polygon);
            }
            polygon = L.polygon(linearray, {
                color: 'red'
            }).addTo(mapPolygon);
        }
        document.getElementById('latitude_polygon').value = latPoly;
        document.getElementById('longitude_polygon').value = lngPoly;
        var jsonData = JSON.stringify(linearray);

        document.getElementById('dataArray').value = jsonData;
        console.log(document.getElementById('dataArray').value);
    });
</script>     

@endpush
