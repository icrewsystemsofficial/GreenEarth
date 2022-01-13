@extends('layouts.app')

@section('content')

    <div class="container-fluid py-4">

        <h3 class="h5 text-muted">Edit role</h3>
        <br>
        <div class="container-fluid py-4">

            @if (session('status'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text"><strong></strong> {{ session('status') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <div class="alert alert-secondary text-white" role="alert">
                            <i class="fa fa-lightbulb-o"></i> &nbsp;<strong>Note</strong>
                            <p class="text-white text-sm">
                                Edit a existing role and its description.
                            </p>
                        </div>

                        <form action="{{ route('portal.admin.roles.update', $role->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="control-label col-sm2" for="role">Role name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="role" name="role" value="{{ $role->name }}" placeholder="Name of a new role" required>
                                    </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm2" for="description">Role description.</label>
                                    <div class="col-sm-12">
                                        <textarea rows="4" cols="20" class="form-control" id="description" name="description" placeholder="Answer here..." required></textarea>
                                    </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm2" for="created_by">Author's name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" placeholder="{{ auth()->user()->name }}" disabled>
                                    <input type="hidden" name="created_by" value="{{ auth()->user()->name }}">
                                </div>
                            </div>

                            <button class="btn btn-success" type="submit" id="create_button" >
                            UPDATE
                            </button>
                        <a href="{{ route('portal.admin.faq.index') }}" class="btn btn-warning">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
            </div>

            {{-- <div class="col-md-6">
                <div class="card">
                    <div class="card-body">

                        <div class="form-check form-switch">
                            <input class="form-check-input" value='1' name="status" type="checkbox" id="status" checked>
                            <label class="form-check-label" for="status">Display to Users</label>
                        </div>

                    </div>
                </div>
            </div> --}}

            </form>
        </div>
    </div>
@endsection