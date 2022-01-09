@extends('layouts.app')

@section('pagetitle')
@endsection

@section('css')
@endsection

@section('js')

@endsection

@section('content')
<div class="container-fluid py-4">

    <h3 class="h5 text-muted">Create a new setting</h3>
    <br>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('portal.admin.settings.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-sm2" for="key">Key</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="key" name="key" placeholder="Key" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm2" for="value">Value</label>
                            <div class="col-sm-12">
                                <textarea rows="4" cols="20" class="form-control" id="value" name="value" placeholder="Value" required></textarea>
                            </div>
                        </div>

                        <a href="{{ route('portal.admin.settings.index') }}" class="btn btn-warning">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>

                        <button class="btn btn-success" type="submit" id="create_button"><i class="fa fa-plus" aria-hidden="true"></i>
                            CREATE
                        </button>

                </div>
            </div>
        </div>

        </form>
    </div>
</div>
@endsection