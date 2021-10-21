@extends('layouts.app')

@section('pagetitle')
@endsection

@section('css')
    <link rel="stylesheet" href="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/css/soft-design-system-pro.min.css?v=1.0.0" type="text/css">
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css"/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-draw@0.4.1/dist/leaflet.draw.css" />
    <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-draw@0.4.1/dist/leaflet.draw.js"></script>
@endsection

@section('js')

    <script src="{{ asset('js/alpine.js') }}" defer></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    {{-- <script src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/js/plugins/choices.min.js" type="text/javascript"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> --}}




    {{-- <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script> --}}
    <script>
        // FilePond.registerPlugin(
        //     FilePondPluginImagePreview,
        //     FilePondPluginFileValidateType,
        //     FilePondPluginFileValidateSize,
        // );
        // const inputElement = document.querySelector('input[id="logo"]');
        // const pond = FilePond.create(inputElement, {
        //     labelIdle: `Drag & Drop your picture or <span class="filepond--label-action">Browse</span>`,
        //     imagePreviewHeight: 200,
        //     imageCropAspectRatio: '3:2',
        //     imageResizeTargetWidth: 300,
        //     imageResizeTargetHeight: 200,
        //     stylePanelLayout: 'compact',
        //     styleLoadIndicatorPosition: 'center bottom',
        //     styleProgressIndicatorPosition: 'right bottom',
        //     styleButtonRemoveItemPosition: 'left bottom',
        //     styleButtonProcessItemPosition: 'right bottom',
        //     acceptedFileTypes: ['image/png', 'image/jpeg'],
        //     labelFileTypeNotAllowed: '.JPG or .PNG files only',
        //     maxFileSize: '5MB',
        // });
        // FilePond.setOptions({
        //     server: {
        //         url: '/portal/upload-logo',
        //         headers: {
        //             'X-CSRF-TOKEN': '{{ csrf_token() }}'
        //         }
        //     }
        // });
    </script>
    <script>
        function change_create_button_text() {
            var send_email_checkbox = document.getElementById('send_email_checkbox');
            var create_button = document.getElementById('create_button');
            if (send_email_checkbox.checked) {
                create_button.innerHTML = '<i class="fa fa-save"></i> CREATE & SEND WELCOME EMAIL';
            } else {
                create_button.innerHTML = '<i class="fa fa-save"></i> CREATE';
            }
        }

        function loadingButton() {
            var create_button = document.getElementById('create_button');
            create_button.innerHTML = '<i class=\'fa fa-spinner fa-spin\'></i> Please wait';
        }

    </script>

    <script>
        var mapCenter = [17,82.5];
        var map = L.map('map_step_one', {
            center : mapCenter,
            zoom : 4
        });
        var marker = new L.marker([12.9593547, 80.144319]).addTo(map);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: 'OpenStreetMap, {{ config('app.name') }}',
            noWrap : true
        }).addTo(map);
    </script>
@endsection

@section('content')
    <div class="container-fluid py-4">

        <h5 class="text-muted mb-3">
            Add a new forest to our ecosystem
            <br>
            <small class="text-sm">
                Make sure you have the acquired an NOC from the owner of the
                land / area before carrying out work.
            </small>
        </h5>

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


            <form action="{{ route('portal.admin.forests.store') }}" method="POST">
                @csrf
            <div class="col-md-12 mb-2">


                <div class="card">
                    <div class="card-body">
                        <div class="mt-2">

                            <div class="form-group">

                                <div x-data="stepOne()">

                                    <p>
                                        <strong>STEP 1</strong>: Locating the forest

                                        <span x-html="stepOneStatus">
                                            <i class="fa fa-exclamation-triangle text-danger"></i>
                                        </span>
                                        <br>
                                        <span x-show="stepOneLastError" x-html="stepOneLastError" class="text-danger mt-1"></span>
                                    </p>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" id="lat" x-model="lat" name="lat" class="form-control mb-1" placeholder="Enter lattitude" @click="stepOneCheck();" value="{{ old('lat') }}">
                                            <input type="text" id="long" x-model="long" name="long" class="form-control mb-1" placeholder="Enter longitude" @click="stepOneCheck();" value="{{ old('long') }}">
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" x-model="address" name="location" value="{{ old('location') }}" class="form-control mb-1" placeholder="[ADDRESS]" @click="stepOneCheck();" />
                                            <input type="text" x-model="country" name="country" value="{{ old('country') }}" class="form-control mb-1" placeholder="[COUNTRY]" @click="stepOneCheck();" />
                                        </div>
                                    </div>

                                    <span class="text-muted text-sm" x-html="statusText"></span>
                                    <br>

                                    <div>
                                        <button id="buttonText" x-show="showUpdateButton" type="button" class="btn btn-sm btn-warning mt-2" @click="updateMap();" x-text="buttonText">
                                        </button>

                                        <button type="button" x-show="showChangeButton" class="btn btn-sm btn-success mt-2" @click="toggleButtons();">
                                            Open Map
                                        </button>
                                    </div>

                                    <div class="mt-2">
                                        <div x-show="showMap" id="map_step_one" style="height: 500px; border-radius: 5px; " @click="updateMapData();"></div>
                                    </div>
                                </div>

                                <script>
                                    function stepOne() {
                                        return {
                                            lat: '0',
                                            long: '0',
                                            country: '',
                                            address: '',
                                            results: [],
                                            totalresults: 0,
                                            buttonText: 'Update',
                                            statusText: 'Click the button to open map',
                                            stepOneStatus: '<i class="fa fa-exclamation-triangle text-warning"></i>',
                                            stepOneLastError: false,
                                            showMap: false,
                                            showUpdateButton: false,
                                            showChangeButton: true,
                                            findButtonDisabled: false,
                                            showAddress: false,


                                            stepOneCheck() {
                                                this.statusText = 'Checking StepOne...';

                                                var error = 0;
                                                if(!this.lat) {
                                                    error++;
                                                    this.stepOneLastError = 'Latitude is empty';
                                                }

                                                if(!this.long) {
                                                    error++;
                                                    this.stepOneLastError = 'Longitude is empty';
                                                }

                                                if(!this.country) {
                                                    error++;
                                                    this.stepOneLastError = 'Country is empty';
                                                }

                                                if(!this.address) {
                                                    error++;
                                                    this.stepOneLastError = 'Address is empty';
                                                }

                                                if(error == 0) {
                                                    this.stepOneStatus = '<i class="fa fa-check text-success"></i>';
                                                    this.statusText = '';
                                                    this.stepOneLastError = false;
                                                } else {
                                                    this.stepOneStatus = '<i class="fa fa-exclamation-triangle text-danger"></i>';
                                                    this.statusText = 'There are some errors in step 1';
                                                }
                                            },

                                            toggleButtons() {
                                                this.showUpdateButton = !this.showUpdateButton;
                                                this.showChangeButton = !this.showChangeButton;
                                                this.showMap = !this.showMap;
                                                this.statusText = 'Locate the forest on the map..';
                                            },

                                            onMapClick(e) {
                                                marker.setLatLng(e.latlng);
                                                console.log('updated map position');
                                                document.getElementById('lat').value = e.latlng.lat;
                                                document.getElementById('long').value = e.latlng.lng;
                                            },

                                            updateMapUnconventionally() {
                                                this.lat = document.getElementById('lat').value;
                                                this.long = document.getElementById('long').value;
                                            },

                                            updateMapData() {
                                                map.on('click', this.onMapClick);
                                                this.statusText = '<i class="fa fa-spinner fa-spin"></i> Updating forest coordinates...';

                                                this.fetchAddress();
                                                setTimeout(() => {
                                                    this.statusText = '<i class="fa fa-check text-success"></i> Coordinates updated, you can close the map';
                                                }, 1000);

                                                this.buttonText = 'Close Map';

                                            },

                                            fetchAddress() {

                                                this.updateMapUnconventionally();
                                                this.statusText = '<i class="fa fa-spinner fa-spin"></i> Updating the map...';


                                                axios.get('{{ route("api.v1.forests.geocode") }}/' + this.lat + ',' + this.long)
                                                .then((response) => {

                                                    this.showAddress = false;
                                                    this.results = [];
                                                    this.totalresults = 0;

                                                    if(response.data.code == 200) {
                                                        this.results = response.data.data;
                                                        this.showAddress = true;
                                                        this.totalresults = response.data.data.length;

                                                        if(this.totalresults > 0) {
                                                            this.country = this.results[0].components.country;
                                                            this.address = '(' + this.results[0].formatted + ') ' + this.results[0].components.county + ', ' + this.results[0].components.state_district + ', ' + this.results[0].components.state;
                                                            this.statusText = '<i class="fa fa-spinner fa-spin"></i> Updating address ...';
                                                        }

                                                        // console.log(this.results);
                                                    } else if(response.data.code == 404) {
                                                        this.showAddress = true;
                                                        this.totalresults = response.data.data.length;
                                                        this.results = [];
                                                    } else {
                                                        alert('API Error: Please check console');
                                                        console.log('Unknown error occured');
                                                    }
                                                })
                                                .then(() => {
                                                    this.stepOneCheck();
                                                });


                                            },

                                            updateMap() {
                                                // console.log('Adding marker to the map');
                                                marker.setLatLng([this.lat, this.long]);
                                                map.panTo([this.lat, this.long]);
                                                // marker.addTo(map);
                                                // this.buttonText = 'Location updated';
                                                this.showMap = false;
                                                this.showUpdateButton = !this.showUpdateButton;
                                                this.showChangeButton = !this.showChangeButton;
                                                if(this.country != 'undefined') {
                                                    this.statusText = '<i class="fa fa-check text-success"></i> Location details updated';
                                                } else {
                                                    this.statusText = '<i class="fa fa-warning-triangle text-warning"></i> Location details insufficient';
                                                }

                                                this.stepOneCheck();
                                            }
                                        }
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-body">

                            <strong>STEP 2</strong>: Forest Details

                            <div class="form-group">
                                <label class="control-label col-sm2" for="name">Forest Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="forest_name" name="name" value="{{ old('name') }}" placeholder="Nanmangalam Forest" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm2" for="description">Description</label>
                                <div class="col-sm-12">
                                    <textarea name="description" value="{{ old('description') }}" id="" cols="3" rows="2" class="form-control" placeholder="In the backyard of Leonard's house"></textarea>
                                </div>
                            </div>

                            <div class="form-check form-switch" x-data="forestStatus();">
                                <input class="form-check-input" type="checkbox" id="forestStatus" checked="" @click="changeStatus();">
                                <label class="form-check-label" for="forestStatus">Forest status</label>
                                <input type="hidden" name="status" x-bind:value="forestStatus">
                            </div>

                            <script>
                                function forestStatus() {
                                    return {
                                        forestStatus: '1',
                                        changeStatus() {
                                            if(this.forestStatus == 1) {
                                                this.forestStatus = 0;
                                            } else {
                                                this.forestStatus = 1;
                                            }
                                        }
                                    }
                                }
                            </script>



                            <button class="btn btn-success" type="submit" id="create_button" onclick="loadingButton();">
                                <i class="fa fa-save"></i> CREATE
                            </button>
                            <a href="{{ route('portal.admin.forests.index') }}" class="btn btn-warning">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">

                        <div class="alert bg-info text-sm text-white" role="alert">
                            <strong>INFO</strong> You can only create a temporary account, the
                            user will be mailed with an activation link to activate their account.
                        </div>

                        </div>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
