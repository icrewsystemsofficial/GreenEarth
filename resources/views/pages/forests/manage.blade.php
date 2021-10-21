@extends('layouts.app')

@section('pagetitle')
@endsection

@section('css')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
@endsection

@section('js')


    @php
        $coords = '['.$forest->lat.','.$forest->long.']';
    @endphp

    <script src="{{ asset('js/alpine.js') }}" defer></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script>
        var mapCenter = {{ $coords }};
        var map = L.map('map', {
            center : mapCenter,
            zoom : 14
        });

        var marker = new L.marker({{ $coords }})
        .bindTooltip('{{ $forest->name }}\'s reference coordinates')
        .addTo(map);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: 'OpenStreetMap, {{ config('app.name') }}',
            noWrap : true
        }).addTo(map);

        var geojsonFeature = {
            "type": "Feature",
            "geometry": {!! $forest->geojson_path !!}
        };

        L.geoJSON(geojsonFeature).bindTooltip('{{ $forest->area }} <sup>2</sup>m').addTo(map);
    </script>
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            @if ($errors->any())
            <div class="p-3">
                <div class="alert alert-danger text-white" role="alert">
                    <h3 class="h5 text-white">
                        Error!
                    </h3>

                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            </div>
            @endif

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted">
                            Forest # {{ $forest->id }}
                        </h5>
                        <h2 class="h3">
                            {{ $forest->name }}
                        </h2>
                        <div id="map" style="height: 500px; width: auto; border-radius: 5px;">
                        </div>

                        <hr class="mt-3">

                        <p class="mt-3">
                            [WIP] Trees in this forest
                            @php
                                //TODO Link this with the trees module.
                            @endphp
                        </p>

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="h5 text-muted mb-4">
                            Edit forest details
                        </h3>
                        <form action="{{ route('portal.admin.forests.update', $forest->id) }}" class="form" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <span class="h6 text-muted">
                                    Identification Details
                                </span>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">
                                            Name
                                        </label>
                                        <input type="text" class="form-control mb-2" name="name" value="{{ $forest->name }}" placeholder="name">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">
                                            Description
                                        </label>
                                        <textarea class="form-control" name="description" id="description" cols="30" rows="5" placeholder="{{ $forest->description }}">{{ $forest->description }}</textarea>
                                    </div>

                                    <div class="col-md-12">

                                        <label for="">
                                            Address
                                        </label>

                                        <textarea name="location" class="form-control" id="" rows="1">{{ $forest->location }}</textarea>

                                        <label for="">
                                            Country
                                        </label>

                                        <input type="text" class="form-control mb-2" name="country" value="{{ $forest->country }}" placeholder="country">
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group">
                                <span class="h6 text-muted">
                                    Geo-spatial Data of the frest
                                </span>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">
                                            Latitude
                                        </label>
                                        <input type="text" class="form-control mb-2" name="lat" value="{{ $forest->lat }}" placeholder="{{ $forest->lat }}" >
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">
                                            Longitude
                                        </label>
                                        <input type="text" class="form-control mb-2" name="long" value="{{ $forest->long }}" placeholder="{{ $forest->lang }}" >
                                    </div>

                                    <div class="col-md-12">

                                        <label for="">
                                            GeoJSON
                                        </label>
                                        <input type="text" class="form-control mb-2" name="geojson_path" value="{{ $forest->geojson_path }}" placeholder="geojson_path" disabled>

                                        <label for="">
                                            Area
                                        </label>
                                        <input type="text" class="form-control mb-2" name="area" value="{{ $forest->area }}" placeholder="area" disabled>
                                    </div>

                                    <div class="col-md-12">
                                        <a href="{{ route('portal.admin.forests.polygon', $forest->id) }}" class="btn btn-success btn-sm block">
                                            Edit Polygon
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <hr class="text-muted mb-2">


                            <div class="form-group">

                                <span class="h6 text-muted">
                                    Other details
                                </span>

                                <div class="row">
                                    <div class="col-md-12">

                                        <label for="">
                                            Voulnteer Incharge of this forest
                                        </label>

                                        <select name="user_incharge" class="form-control" id="">
                                            @forelse ($volunteers as $volunteer )
                                                <option value="{{ $volunteer->id }}">
                                                    {{ $volunteer->name }}
                                                </option>
                                            @empty
                                                <option value="null">
                                                    No Volunteers found
                                                </option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <input type="text" class="form-control mb-2" name="irrigation_type" value="{{ $forest->irrigation_type }}" placeholder="irrigation_type">
                            <input type="text" class="form-control mb-2" name="soil_type" value="{{ $forest->soil_type }}" placeholder="soil_type">



                            <div class="form-check form-switch" x-data="forestStatus();" x-init="initSwitch('{{ $forest->status }}');">
                                <input class="form-check-input" type="checkbox" id="forestStatus" x-bind:checked="forestChecked" @click="changeStatus();">
                                <label class="form-check-label" for="forestStatus">Forest is <span x-text="forestStatusText"></span></label>
                                <input type="hidden" name="status" x-bind:value="forestStatus">
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">

                                        <button type="submit" class="btn btn-warning block mt-2">
                                            UPDATE FOREST <i class="fa fa-file text-white ml-2"></i>
                                        </button>

                                        <button type="button" class="btn btn-danger block mt-2" onclick="document.getElementById('deleteForm').submit();">
                                            DELETE FOREST <i class="fa fa-trash text-white ml-2"></i>
                                        </button>
                                        <p class="mt-2">
                                            [SHOULD NOT BE ABLE TO DELETE IF TREES ARE THERE IN THIS FOREST]
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <script>
                                function forestStatus() {
                                    return {
                                        forestStatus: '',
                                        forestStatusText: '--',
                                        forestChecked: false,

                                        initSwitch(value) {
                                            if(value == 1) {
                                                this.forestStatus = 1;
                                                this.forestStatusText = 'enabled';
                                                this.forestChecked = 'checked';
                                            } else {
                                                this.forestStatus = 0;
                                                this.forestStatusText = 'disabled';
                                                this.forestChecked = false;
                                            }
                                        },

                                        changeStatus() {
                                            if(this.forestStatus == 1) {
                                                this.forestStatus = 0;
                                                this.forestStatusText = 'disabled';
                                                this.forestChecked = '';
                                            } else {
                                                this.forestStatus = 1;
                                                this.forestStatusText = 'enabled';
                                                this.forestChecked = 'checked';
                                            }
                                        }
                                    }
                                }
                            </script>


                        </form>

                        <form id="deleteForm" action="{{ route('portal.admin.forests.destroy', $forest->id) }}" method="POST">
                            @csrf
                            @method('DELETE');
                        </form>
                    </div>

                </div>
            </div>


        </div>
    </div>
@endsection
