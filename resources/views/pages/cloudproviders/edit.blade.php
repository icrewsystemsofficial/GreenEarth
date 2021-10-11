@extends('layouts.app')

@section('pagetitle')
@endsection

@section('css')
@endsection

@section('js')
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

                    @if($cloudProviders->whitelisted == 0)
                    <span class="badge bg-danger mb-3">
                        <i class="fa fa-check-circle"></i> Account Not Whitelisted
                    </span>
                    @else
                    <span class="badge bg-success mb-3">
                        <i class="fa fa-exclamation-circle"></i> Account Whitelisted
                    </span>
                    @endif

                    @if($cloudProviders->enabled == 0)
                    <span class="badge bg-danger mb-3">
                        <i class="fa fa-check-circle"></i> Account Not Enabled
                    </span>
                    @else
                    <span class="badge bg-success mb-3">
                        <i class="fa fa-exclamation-circle"></i> Account Enabled
                    </span>
                    @endif

                    <div>
                        <ul>
                            <li>{{--<x:notify-messages />--}}</li>
                            {{-- @notifyJs--}}
                        </ul>
                    </div>

                    <form action="{{ route('portal.admin.cloud-providers.update', $cloudProviders->id) }}" method="POST">

                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label class="control-label col-sm2" for="name">Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="name" name="name" placeholder="{{ $cloudProviders->name }}" value="{{ $cloudProviders->name }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm2" for="url">URL</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="url" placeholder="{{ $cloudProviders->url }}" value="{{ $cloudProviders->url }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm2" for="description">Description</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="description" placeholder="{{ $cloudProviders->description }}" value="{{ $cloudProviders->description }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm2" for="datacenters">Datacenters</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="datacenters" placeholder="{{ $cloudProviders->datacenters }}" value="{{ $cloudProviders->datacenters }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm2" for="enabled">Enabled? (1 = true, 0 = false)</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="enabled" placeholder="{{ $cloudProviders->enabled }}" value="{{ $cloudProviders->enabled }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm2" for="whitelisted">Whitelisted? (1 = true, 0 = false)</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="whitelisted" placeholder="{{ $cloudProviders->whitelisted }}" value="{{ $cloudProviders->whitelisted }}">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">
                            <span id="submit" class=""><i class="fa fa-save"></i> UPDATE</span>
                        </button>


                        <a href="{{ route('home.cloud-providers.index') }}" class="btn btn-warning">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection