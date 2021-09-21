@extends('layouts.app')

@section('pagetitle')
@endsection

@section('css')
@endsection

@section('js')
@endsection

@section('content')
    <div class="container-fluid py-4">

    <h1 class="h3 mb-4 text-gray-800">{{ __('Create User') }}</h1>

    <form action="create/new" method="POST">

    @csrf
    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_method" value="PUT"> --}}

    <div class="form-group">
        <label class="control-label col-sm2" for="name">Name</label>
        <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" >
        </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm2" for="email">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="email">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm2" for="status">Role</label>
            <div class="col-sm-10">
                <select class="form-control" name="role">
                    <option value="Admin"  selected>Admin</option>
                    <option value="Volunteer">Volunteer</option>

                </select>
            </div>
        </div>

     <button type="submit" class="btn btn-success" data-dismiss="modal">
         <span id="footer_action_button" class="glyphicon glyphicon">Create</span>
     </button>

    </form>




    </div>
@endsection















