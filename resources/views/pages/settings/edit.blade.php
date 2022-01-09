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
        Settings Management
    </h5>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">

                    <div>
                        <ul>
                            <li>{{--<x:notify-messages />--}}</li>
                            {{-- @notifyJs--}}
                        </ul>
                    </div>

                    <form action="{{ route('portal.admin.settings.update', $settings->id) }}" method="POST">

                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label class="control-label col-sm2" for="key">Key</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="key" name="key" placeholder="{{ $settings->key }}" value="{{ $settings->key }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm2" for="value">Value</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="value" name="value" placeholder="{{ $settings->value }}" value="{{ $settings->value }}">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">
                            <span id="submit" class=""><i class="fa fa-save"></i> UPDATE</span>
                        </button>


                        <a href="{{ route('portal.admin.settings.index') }}" class="btn btn-warning">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>

                    </form>
                    <div>
                        <form action="{{ route('portal.admin.settings.destroy', $settings->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fa fa-ban" aria-hidden="true"></i> Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection