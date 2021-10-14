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
            Trees Management
        </h5>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-info text-white" role="alert">
                            <i class="fa fa-lightbulb-o"></i> &nbsp;<strong>ProTip</strong>
                            <p class="text-white text-sm">
                                Be cautious while updating the details of the tree. Changes once done cannot be revoked!
                            </p>
                        </div>
                        <form action="{{ route('portal.admin.tree.update', $tree->id) }}" method="POST">
                            {{ method_field('PUT') }}
                            @csrf
                            <input type="hidden" class="treeid" name="treeid" id="treeid" value="">
                            <div class="form-group">
                                <label> Forest ID </label>
                                <input type="text" name="forest_id" class="form-control text-sm" value="{{ $tree->forest_id}}">
                            </div>
                            <div class="form-group">
                                <label> Species ID </label>
                                <input type="text" name="species_id" class="form-control text-sm" value="{{ $tree->species_id}}">
                            </div>
                            <div class="form-group">
                                <label> Mission ID </label>
                                <input type="text" name="mission_id" class="form-control text-sm" value="{{ $tree->mission_id}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm2" for="health"> Health </label>
                                <div class="col-sm-12">
                                    <select class="form-control" name="health" id="health">
                                    @foreach($treeHealth as $health)
                                        <option {{ ($tree->health == $health) ? 'selected':'' }} value="{{$health}}"> {{$health}} </option>
                                    @endforeach
                                    </select>                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label> Latitude </label>
                                        <input type="text" name="lat" class="form-control text-sm bg-white-600" value="{{ $tree->lat}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label> Longitude </label>
                                        <input type="text" name="long" class="form-control text-sm bg-white-600" value="{{ $tree->long}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group pb-2">
                                <label class="control-label" for="planted_by">Planted by</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" placeholder="{{ $planted_by }}" disabled>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">
                                 <span id="footer_action_button" class=""><i class="fa fa-save"></i> UPDATE </span>
                            </button>
                            <a href="{{ route('portal.admin.tree.index') }}" class="btn btn-warning">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                        </form>
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
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">PLANTED ON</p>
                                            <h5 class="font-weight-bolder mb-0">
                                                {{ $tree->created_at->diffForHumans() }}
                                            </h5>
                                            <small class="text-muted text-xs">
                                                ({{ $tree->created_at->format('d/m/Y') }})
                                            </small>
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
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">LAST UPDATED</p>
                                            <h5 class="font-weight-bolder mb-0">
                                                {{ \Carbon\Carbon::parse($tree->updated_at)->diffForHumans() }}
                                            </h5>
                                            <small class="text-muted text-xs">
                                                ({{ \Carbon\Carbon::parse($tree->updated_at)->format('d/m/Y') }})
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('portal.admin.tree.add_updates', $tree->id )}}" class="btn btn-info block btn-sm">
                            Add Updates
                        </a>
                        <a href="{{route('portal.admin.tree.history_maintenance', $tree->id )}}" class="btn btn-secondary block btn-sm">
                            History
                        </a>
                        <a href="#" class="btn btn-sm block btn-success">
                            View Linked Forest
                        </a>
                        <a href="#" class="btn btn-sm block btn-secondary">
                            View Linked Plant Species
                        </a>
                        <a href="#" class="btn btn-sm block btn-info">
                            View Linked Mission
                        </a>
                        @if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin') || \Illuminate\Support\Facades\Auth::user()->hasRole('superadmin'))
                        <a data-bs-toggle="modal" data-bs-target="#deleteUserModal" class="btn btn-danger block btn-sm">
                            Delete 
                        </a>
                        @endif

                        <!-- Modal -->
                        <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            Are you sure?
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        You are about to delete a tree of id : {{ $tree->id }}. Deleting this tree will be irrevokable. Do this only if you are sure.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <form action="{{ route('portal.admin.tree.delete', $tree->id) }}" method="GET">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Yes, delete</button>
                                        </form>
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

