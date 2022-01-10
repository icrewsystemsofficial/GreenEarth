@extends('layouts.app')

@section('pagetitle')
@endsection

@section('css')
@endsection

@section('js')
<script>
        let clname = document.getElementById("events-active-tag");
        clname.className += " active";
        document.getElementById("events-icon").classList.remove('text-dark');
        document.getElementById("events-icon").classList.add('text-white');
    </script>
@endsection

@section('breadcrumb')
<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Events</li>
</ol>
<h6 class="font-weight-bolder mb-0">Events</h6>
@endsection

@section('content')
<div class="container-fluid py-4">
    <h5 class="h5"> Add An Event </h5>
    <br>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-info text-white" role="alert">
                        <i class="fa fa-lightbulb-o"></i> &nbsp;<strong>Pro Tip</strong>
                        <p class="text-white text-sm">
                            Be careful while adding the details of the event. Consider a suitable title and description.
                        </p>
                    </div>
                    <form method="post" enctype="multipart/form-data" action="{{ route('portal.events.store') }}">
                        {{ method_field('POST') }}
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input class="form-control text-sm" type="date" value="{{  now()->toDateString('Y-m-d') }}" id="date" name="date" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Time</label>
                                    <input class="form-control text-sm" type="time" id="time" name="time" required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label> Title</label>
                            <input type="text" name="title" class="form-control text-sm" required />
                        </div>                       
                        <div class="form-group">
                            <label> Description </label>
                            <textarea name="description" class="form-control text-sm" rows="5" required> </textarea> 
                        </div>                       
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group pb-2">
                            <label class="control-label">Created by</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" placeholder="{{ auth()->user()->name }}" disabled>
                                <input type="hidden" name="created_by" value="{{ auth()->user()->id }}">
                            </div>
                        </div>
                        <button class="btn bg-gradient-success" type="submit" id="create_button" >
                            <i class="fa fa-save"></i> Add Event
                        </button>
                        <a href="{{ route('portal.events.index') }}" class="btn bg-gradient-warning">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
