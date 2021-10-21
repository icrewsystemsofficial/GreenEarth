@extends('layouts.app')

@section('pagetitle')
@endsection

@section('css')
@notifyCss
@endsection

@section('js')
@php
    //TODO Swap this out with the local version of alpine js that's stored in the public folder. - Leonard
@endphp
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection

@section('content')
<div class="container-fluid py-4">

    <h5 class="text-muted mb-3">
        Cloud Providers Management
    </h5>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('portal.admin.cloud-providers.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label class="control-label col-sm2" for="name">Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="name" name="name" placeholder="John Doe" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm2" for="url">URL</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="url" name="url" placeholder="www.example.com" required />
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-sm2" for="description">Description</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="description" placeholder="describe the provider..." required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm2" for="datacenters">Datacenters</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="datacenters" placeholder="how many datacenters..." required />
                            </div>
                        </div>

                        <div class="" x-data="switchButtonsAlpineFunction();">
                            <label for="">Enable the datacenter?</label>
                            <div class="form-check form-switch">
                                {{-- Alpine works in small componenets.
                                    You can actually have multiple instances of alpine
                                    working on the same page effortlessly.
                                    The carbon calculate page has about 3-4
                                    instances working simultaneously.
                                --}}
                                <input class="form-check-input" type="checkbox" checked @click="toggleEnabled();">
                                <label class="form-check-label" for="enabled" x-html="enabledHelperText">
                                    As soon as switchButton... fn is loaded, I'm replaced by the value of
                                    `enabledHelperText`
                                </label>


                                {{--
                                    Where the Alpine Magic happens, only this is passed from the form
                                    to the controller for the "status".
                                    To see how it works, try changing type from hidden to text.
                                --}}
                                <input type="hidden" name="enabled" x-bind:value="enabledValue">
                            </div>


                            <label for="">
                                Whitelist the datacenter?
                            </label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" checked @click="toggleWhitelisted();">
                                <label class="form-check-label" for="enabled" x-html="whitelistedHelperText"></label>
                                <input type="hidden" name="whitelisted" x-bind:value="whitelistedValue">
                            </div>

                        </div>

                        <script>
                            function switchButtonsAlpineFunction() {

                                return {
                                    enabledValue: '1',
                                    enabledHelperText: 'Enabled',

                                    whitelistedValue: '1',
                                    whitelistedHelperText: 'Whitelist',

                                    // Methods

                                    toggleEnabled() {
                                        // When this function is toggled,
                                        // just see what the initalized value of
                                        // enabledValue is, and act accordingly. 1
                                        if(this.enabledValue == 1) {
                                            this.enabledValue = 0;
                                            this.enabledHelperText = 'Disabled';
                                        } else {
                                            this.enabledValue = 1;
                                            this.enabledHelperText = 'Enabled';
                                        }
                                    },

                                    toggleWhitelisted() {
                                        if(this.whitelistedValue == 1) {
                                            this.whitelistedValue = 0;
                                            this.whitelistedHelperText = 'Don\'t whitelist';
                                        } else {
                                            this.whitelistedValue = 1;
                                            this.whitelistedHelperText = 'Whitelist';
                                        }
                                    }
                                }
                            }
                        </script>

                        <button class="btn btn-success" type="submit" id="create_button" onclick="loadingButton();">
                            <i class="fa fa-save"></i> CREATE
                        </button>
                        <a href="{{ route('portal.admin.cloud-providers.store') }}" class="btn btn-warning">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                </div>
            </div>
        </div>

        </form>
    </div>
</div>
@endsection
