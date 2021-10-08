@extends('layouts.app')

@section('pagetitle')
@endsection

@section('css')
@endsection

@section('js')
    <script>
        function change_create_button_text() {
            var send_email_checkbox = document.getElementById('send_email_checkbox');
            var create_button = document.getElementById('create_button');
            if(send_email_checkbox.checked) {
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
            Users Management
        </h5>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">

                        <div class="alert bg-info text-sm text-white" role="alert">
                            <strong>INFO</strong> You can only create a temporary account, the
                            user will be mailed with an activation link to activate their account.
                        </div>

                        <form action="{{ route('portal.admin.users.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label class="control-label col-sm2" for="name">Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="John Doe" required>
                                    </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm2" for="email">E-mail</label>
                                    <div class="col-sm-12">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="john.deo@icrewsystems.com" required/>
                                    </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-sm2" for="email">Organization</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="organization" placeholder="icrewsystems SE LLP" required />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm2" for="phone">Phone</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="phone" placeholder="9090909090"  required />
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="control-label col-sm2 text-danger" for="role">Role</label>
                                <div class="col-sm-12">
                                    <select class="form-control text-danger" name="role" required>
                                        @forelse ($roles as $role)
                                            <option value="{{ $role->name }}">
                                                {{ $role->name }}
                                            </option>
                                        @empty
                                            <option disabled selected value="null">No roles found</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>

                            <button class="btn btn-success" type="submit" id="create_button" onclick="loadingButton();">
                            <i class="fa fa-save"></i> CREATE
                            </button>
                        <a href="{{ route('portal.admin.users.index') }}" class="btn btn-warning">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">

                        <div class="form-check">
                            <input class="form-check-input" onchange="change_create_button_text();" type="checkbox" value="" id="send_email_checkbox" name="send_welcome_email" checked="">
                            <label class="custom-control-label" for="customCheck1">Send Welcome E-mail to this user</label>
                        </div>

                    </div>
                </div>
            </div>

            </form>
        </div>
    </div>
@endsection















