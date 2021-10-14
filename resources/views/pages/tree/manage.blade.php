@extends('layouts.app')

@section('pagetitle')
@endsection

@section('css')
@endsection

@section('js')
@endsection

@section('content')

<div class="container-fluid py-4">

    <h3 class=" text-muted mb-3">Manage Tree</h3>
    <br>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">

                    <div class="alert alert-info text-white" role="alert">
                        <i class="fa fa-lightbulb-o"></i> &nbsp;<strong>ProTip</strong>
                        <p class="text-white text-sm">
                            Be cautious while updating the details of the tree. Changes once done cannot be revoked !
                        </p>
                    </div>

                    <form method="post" name="trees-create-form" id="trees-create-form" enctype="multipart/form-data" action="{{route('portal.admin.tree.manage',$trees->id)}}" {{--  class="ckeditor dropzone"  --}}>
                        {{ method_field('PUT') }}
                             @csrf
                             <input type="hidden" class="treeid" name="treeid" id="treeid" value="">
                             <div class="form-group">
                                 <label> Forest id </label>
                                 <input type="text" name="forest_id" class="form-control text-sm"/ value="{{ $trees->forest_id}}">
                             </div>

                             <div class="form-group">
                                 <label> Species id </label>
                                 <input type="text" name="species_id" class="form-control text-sm"/ value="{{ $trees->species_id}}">
                             </div>

                             <div class="form-group">
                                <label> Mission id </label>
                                <input type="text" name="mission_id" class="form-control text-sm"/ value="{{ $trees->mission_id}}">
                            </div>

                             <div class="form-group text-sm">
                                <label for="health" class="pe-4"> Health </label>
                                <select name="health" id="health" value="{{ $trees->health}}">
                                    <option {{ $trees->health == 'Healthy' ? 'selected':'' }}> Healthy </option>
                                    <option {{ $trees->health == 'Not So Healthy' ? 'selected':'' }}> Not So Healthy </option>
                                    <option {{ $trees->health == 'Needs Immediate Attention' ? 'selected':'' }}> Needs Immediate Attention </option>

                                </select>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label> Latitude </label>
                                        <input type="text" name="lat" class="form-control text-sm bg-white-600"/ value="{{ $trees->lat}}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label> Longitude </label>
                                        <input type="text" name="long" class="form-control text-sm bg-white-600"/value="{{ $trees->long}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group pb-2">
                                <label class="control-label " for="planted_by">Planted by</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" placeholder="{{ auth()->user()->name }}" disabled>
                                    <input type="hidden" name="planted_by" value="{{ auth()->user()->id }}">
                                </div>
                            </div>

                            <button class="btn bg-gradient-success" type="submit" id="create_button" >
                                <i class="fa fa-save"></i> UPDATE TREE
                            </button>

                            <a href="{{ route('portal.admin.tree.index') }}" class="btn bg-gradient-warning">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>



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
                              <p class="text-sm mb-0 text-capitalize font-weight-bold">PLANTED </p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ $trees->created_at->diffForHumans() }}
                                </h5>
                                <small class="text-muted text-xs">
                                    ({{ $trees->created_at->format('d/m/Y') }})
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
                                    {{ $trees->updated_at->diffForHumans() }}
                                </h5>
                                <small class="text-muted text-xs">
                                    ({{ $trees->updated_at->format('d/m/Y') }})
                                </small>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

            </div>




            <div class="row pt-2">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('portal.admin.tree.add_maintenance',$trees->id) }}" class="btn btn-sm block bg-gradient-secondary">
                            Add Maintenance
                        </a>

                        <a href="#" class="btn btn-sm block bg-gradient-secondary">
                            View Linked Forest
                        </a>

                        <a href="#" class="btn btn-sm block bg-gradient-secondary">
                            View Linked Plant Species
                        </a>

                        <a href="#" class="btn btn-sm block bg-gradient-secondary">
                            View Linked Mission
                        </a>

                        <a data-bs-toggle="modal" data-bs-target="#deleteTreeModal" class="btn bg-gradient-danger block btn-sm">
                            Delete Tree
                        </a>




                        <!-- Modal -->
                        <div class="modal fade" id="deleteTreeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            Are you sure?
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        You are about to delete the tree of id : {{ $trees->id }}. Deleting this tree will be irrevokable. Do this only if you are sure.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <a href="{{route('portal.admin.tree.delete', $trees->id )}}" class="btn btn-danger ">
                                            Delete
                                       </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

        </div>
        </div>

    </form>


    </div>

</div>
@endsection
