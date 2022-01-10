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
        <h5 class=" text-muted mb-3">
            Events Management
        </h5>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-info text-white" role="alert">
                            <i class="fa fa-lightbulb-o"></i> &nbsp;<strong>ProTip</strong>
                            <p class="text-white text-sm">
                                Be cautious while updating the details of the event. Changes once done cannot be revoked!
                            </p>
                        </div>
                        <form action="{{ route('portal.events.update', $event->id) }}" method="POST">
                            {{ method_field('PUT') }}
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input class="form-control text-sm" type="date" value="{{ $event->date }}" id="date" name="date" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>Time</label>
                                        <input class="form-control text-sm" type="time" id="time" name="time" value="{{ $event->time }}" required />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label> Title</label>
                                <input type="text" name="title" class="form-control text-sm" value="{{ $event->title }}" required />
                            </div>                       
                            <div class="form-group">
                                <label> Description </label>
                                <textarea name="description" class="form-control text-sm" rows="5" required> {{ $event->description }} </textarea> 
                            </div>
                            <button class="btn btn-success" type="submit" id="create_button" >
                                <i class="fa fa-save pe-2"></i> Save
                            </button>                        
                            <a href="{{ route('portal.events.index') }}" class="btn btn-warning">
                                <i class="fa fa-arrow-left pe-2"></i> Back
                            </a>                                             
                            <a data-bs-toggle="modal" data-bs-target="#deleteEventModal" class="btn btn-danger">
                                <i class="fas fa-trash pe-2"></i> Delete 
                            </a>   
                        </form>  
                        <div class="modal fade" id="deleteEventModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            Are you sure?
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        You are about to delete {{ $event->title }}. Deleting this event will be irrevokable.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <a href="{{ route('portal.events.delete', $event->id) }}" class="btn btn-success">
                                            Yes, delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>                                                
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">CREATED ON</p>
                                            <h5 class="font-weight-bolder mb-0">
                                                {{ $event->created_at->diffForHumans() }}
                                            </h5>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">                                        
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">CREATED BY</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            {{ $created_by }}
                                        </h5>                                                                                  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                                                   
            </div>
        </div>
    </div> 
@endsection

