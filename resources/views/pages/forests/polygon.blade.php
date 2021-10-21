@extends('layouts.app')

@section('pagetitle')
@endsection

@section('css')
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css"/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-draw@0.4.1/dist/leaflet.draw.css" />
    <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-draw@0.4.1/dist/leaflet.draw.js"></script>
@endsection

@section('js')

    @php
        $lat = $forest->lat;
        $long = $forest->long;
        $newCoords = "[$lat, $long]";
    @endphp
    <script src="{{ asset('js/alpine.js') }}" defer></script>
    <script src='https://unpkg.com/@turf/turf@6/turf.min.js'></script>
    <script>

        var mapCenter = {{ $newCoords }};

        var mapTwo = L.map('map_step_two', {
            center: mapCenter,
            zoom : 15
        });

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'OpenStreetMap, {{ config('app.name') }}',
            noWrap : true
        }).addTo(mapTwo);


        // Initialise the FeatureGroup to store editable layers
        var editableLayers = new L.FeatureGroup();
        mapTwo.addLayer(editableLayers);

        var drawPluginOptions = {
        position: 'topright',
        draw: {
        polygon: {
            allowIntersection: false, // Restricts shapes to simple polygons
            guidelineDistance: 10,
            showArea: true,
            metric: true,
            drawError: {
                color: '#e1e100', // Color the shape will turn when intersects
                message: '<strong>Error!<strong> This point exceeds the polygon' // Message that will show when intersect
            },
            shapeOptions: {
                color: '#97009c'
            }
        },
        // disable toolbar item by setting it to false
        polyline: false,
        circle: false, // Turns off this drawing tool
        rectangle: false,
        marker: false,
        },
        edit: {
            featureGroup: editableLayers, //REQUIRED!!
            remove: true
        }
        };

        // Initialise the draw control and pass it the FeatureGroup of editable layers
        var drawControl = new L.Control.Draw(drawPluginOptions);
        mapTwo.addControl(drawControl);

        var editableLayers = new L.FeatureGroup();
        mapTwo.addLayer(editableLayers);

        mapTwo.on('draw:created', function(e) {
        var type = e.layerType,
        layer = e.layer;

        layer.bindPopup('{{ $forest->name }}');
        console.log(layer.toGeoJSON());
        document.getElementById('data').innerHTML = JSON.stringify(layer.toGeoJSON().geometry);
        document.getElementById('area').innerHTML = turf.area(layer.toGeoJSON());
        document.getElementById('processMapButton').style.display = 'block';
        editableLayers.addLayer(layer);
        });


    </script>
@endsection

@section('content')
    <div class="container-fluid py-4" x-data="polygon();">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted mb-3">
                            <strong>STEP: 3</strong> <span x-html="stepThreeStatus"></span>
                        </h5>
                        <p class="mb-3">
                            Please plot the perimeter of the forest on the map for <strong>{{ $forest->name }}</strong>
                        </p>

                        <span class="text-muted mt-3 mb-3" x-show="stepThreeInformation" x-html="stepThreeInformation">
                        </span>

                        <br><br>


                        <div class="" id="map_step_two" style="height: 500px; border-radius: 5px;" @click="clickedOnMap();">

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        {{-- <textarea class="form-control" id="data" cols="30" rows="10" placeholder="DRAW A POLYGON ON THE MAP"></textarea> --}}
                        <div id="data" x-html="polygonData" x-show="false">
                        </div>

                        <div id="area" x-show="false"></div>

                        <form action="{{ route('portal.admin.forests.polygon.save', $forest->id) }}" x-show="showForm" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="area">Forest Area (in square meters)</label>
                                <input type="text" x-model="forestArea" name="area" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="area">Forest Polygon</label>
                                <textarea x-model="forestPolygon" name="geojson_path" id="" class="form-control"></textarea>
                            </div>

                            <button type="submit" class="btn btn-sm btn-success block" x-show="showSaveButton">
                                Save
                            </button>
                        </form>

                        <button id="processMapButton" class="btn btn-sm btn-success mt-3 block" x-show="showProcessButton" @click="processData();">
                            Process Map
                        </button>

                        <button class="btn btn-sm btn-danger block" @click="clearMap();">
                            Clear map
                        </button>
                    </div>
                </div>
            </div>

            </form>
        </div>
    </div>

    <script>
        function polygon() {
            return {
                stepThreeStatus: '<i class="fa fa-exclamation-triangle text-danger"></i>',
                stepThreeInformation: false,
                polygonData: 'EMPTY: Please plot area on the map first',
                forestArea: 0,
                forestPolygon: '[]',
                forestCoordinates: '[]',
                showProcessButton: false,
                showForm: false,
                showSaveButton: false,

                clickedOnMap() {
                    this.stepThreeInformation = '<i class="fa fa-spinner fa-spin"></i> Plotting forest area...';
                },

                clearMap() {
                    if(this.forestArea != 0) {
                        editableLayers.clearLayers();
                        this.stepThreeStatus = '<i class="fa fa-times text-danger"></i>';
                        this.stepThreeInformation = '<i class="fa fa-times"></i> Polygon removed';
                    } else {
                        this.stepThreeInformation = '<i class="fa fa-times"></i> Map is already cleared';
                    }

                    this.forestArea = 0;
                    this.forestPolygon = 'EMPTY: Please plot area on the map first';

                    this.showProcessButton = true;
                    this.showSaveButton = false;
                    this.showForm = false;
                },

                processData() {

                    this.stepThreeStatus = '<i class="fa fa-spinner text-warning fa-spin"></i>';
                    this.stepThreeInformation = '<i class="fa fa-spinner fa-spin"></i> Processing...';

                    this.forestArea = Math.round(document.getElementById('area').innerHTML);
                    this.forestPolygon = document.getElementById('data').innerHTML;
                    this.showProcessButton = false;
                    this.showSaveButton = true;
                    this.showForm = true;
                    setTimeout(() => {
                        this.stepThreeStatus = '<i class="fa fa-check text-success"></i>';
                        this.stepThreeInformation = false;
                    }, 2000);
                }
            }
        }
    </script>
@endsection
