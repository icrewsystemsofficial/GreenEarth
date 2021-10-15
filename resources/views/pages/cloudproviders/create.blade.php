@extends('layouts.app')

@section('pagetitle')
@endsection

@section('css')
@notifyCss
@endsection

@section('js')
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

                    <div>
                        <ul>
                            <ul>
                                <li><x:notify-messages /></li>
                                @notifyJs
                            </ul>
                    </div>

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

                        <div class="form-group">
                            <label class="control-label col-sm2" for="enabled">Enabled? (1 = true, 0 = false)</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="enabled" name="enabled" placeholder="1/0" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm2" for="whitelisted">Whitelisted? (1 = true, 0 = false)</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="whitelisted" name="whitelisted" placeholder="1/0" required>
                            </div>
                        </div>

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