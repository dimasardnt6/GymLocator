@extends('adminlte::page')

@section('title', 'GYM LOCATOR BANDUNG')

@section('content_header')
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
<div class="card border shadow-xs mb-4">
    <div class="card-header border-bottom pb-2">
        <div class="d-sm-flex align-items-center justify-content-between">
            <div>
                <h6 class="font-weight-semibold text-lg mb-0">Gym List</h6>
                <p class="text-sm">See information about Gym data in Bandung</p>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <a href="{{ route('gymLocators.create') }}" type="button" class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2">
                    <span class="btn-inner--icon d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                        </svg>
                    </span>
                    <span class="btn-inner--text d-flex align-items-center">Tambah Data</span>
                </a>
            </div>
        </div>
    </div>
    <div class="card-body px-0 py-0">
        @if (session('success_message'))
            <div class="alert alert-success">
                {{ session('success_message') }}
            </div>
        @endif
        <div class="border-bottom py-3 px-3 d-sm-flex align-items-center">
            <form id="search-form" action="{{ route('search') }}" method="get">
                <div class="input-group w-sm-25 ms-auto">
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
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
            <thead class="bg-gray-100">
                <tr>
                <th class="text-secondary text-xs font-weight-semibold opacity-7">Nama Gym</th>
                <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Alamat</th>
                <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Latitude</th>
                <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Longitude</th>
                <th class="text-secondary opacity-7"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($gymLocators as $key => $gym)
                <tr>
                    <td class="align-middle">
                        <p class="text-sm text-dark font-weight-semibold mb-0">{{$gym->nama_gym}}</p>
                    </td>
                    <td>
                        <p class="text-sm text-dark font-weight-semibold mb-0">{{$gym->alamat}}</p>
                    </td>
                    <td class="align-middle text-center">
                        <p class="text-sm text-dark font-weight-semibold mb-0">{{$gym->latitude}}</p>
                    </td>
                    <td class="align-middle text-center">
                        <p class="text-sm text-dark font-weight-semibold mb-0">{{$gym->longitude}}</p>
                    </td>
                    <td class="align-middle">
                        <div class="d-flex align-items-center">
                            <a href="{{ route('gymLocators.show', $gym->id) }}" class="btn btn-outline-info mr-2 px-2">
                                View
                            </a>
                            <a href="{{ route('gymLocators.edit', $gym->id) }}" class="btn btn-outline-success mr-2 px-2">
                                Edit
                            </a>
                            <form action="{{ route('gymLocators.destroy', $gym->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger px-2">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        <div class="border-top py-3 px-3 d-flex align-items-center">
            <p class="font-weight-semibold mb-0 text-dark text-sm">
                Page {{ $gymLocators->currentPage() }} of {{ $gymLocators->lastPage() }}
            </p>
            <div class="ms-auto">
                @if ($gymLocators->currentPage() > 1)
                    <a href="{{ $gymLocators->previousPageUrl() }}" class="btn btn-sm btn-outline-dark mb-0">Previous</a>
                @endif
                @if ($gymLocators->hasMorePages())
                    <a href="{{ $gymLocators->nextPageUrl() }}" class="btn btn-sm btn-outline-dark mb-0">Next</a>
                @endif
            </div>
        </div>        
    </div>
</div>
{{-- <div class="card border">
    <div class="py-3 px-3">
        <div id="map" style="height: 450px;"></div>
    </div>
</div> --}}

@stop

@push('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#search-form').on('submit', function(e){
            e.preventDefault();
            performSearch();
        });
    
        $('#search-icon').on('click', function(e){
            e.preventDefault();
            performSearch();
        });

        $('#clear-icon').on('click', function(e){
            e.preventDefault();
            $('#search-input').val('');
            performSearch();
        });
    
        function performSearch(){
            var query = $('#search-input').val();
    
            $.ajax({
                url: "{{ route('search') }}",
                data: {query: query},
                dataType: 'json',
                success: function(data){
                    var tableBody = $('.table tbody');
                    tableBody.empty();
    
                    // Ambil 5 data pertama
                    data = data.slice(0, 5);
    
                    data.forEach(function(gym){
                        var row = '<tr>';
                        row += '<td class="align-middle"><p class="text-sm text-dark font-weight-semibold mb-0">' + gym.nama_gym + '</p></td>';
                        row += '<td><p class="text-sm text-dark font-weight-semibold mb-0">' + gym.alamat + '</p></td>';
                        row += '<td class="align-middle text-center"><p class="text-sm text-dark font-weight-semibold mb-0">' + gym.latitude + '</p></td>';
                        row += '<td class="align-middle text-center"><p class="text-sm text-dark font-weight-semibold mb-0">' + gym.longitude + '</p></td>';
                        row += '<td class="align-middle"><div class="d-flex align-items-center">';
                        row += '<a href="' + "{{ route('gymLocators.show', 'id') }}".replace('id', gym.id) + '" class="btn btn-outline-info mr-2 px-2">View</a>';
                        row += '<a href="' + "{{ route('gymLocators.edit', 'id') }}".replace('id', gym.id) + '" class="btn btn-outline-success mr-2 px-2">Edit</a>';
                        row += '<form action="' + "{{ route('gymLocators.destroy', 'id') }}".replace('id', gym.id) + '" method="POST" style="display: inline;">';
                        row += '@csrf';
                        row += '@method("DELETE")';
                        row += '<button type="submit" class="btn btn-outline-danger px-2">Delete</button>';
                        row += '</form></div></td>';
                        row += '</tr>';
    
                        tableBody.append(row);
                    });
                }
            });
        }
    });
</script>
@endpush
