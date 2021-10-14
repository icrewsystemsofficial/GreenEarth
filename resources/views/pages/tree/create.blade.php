@extends('layouts.app')

@section('pagetitle')
@endsection

@section('css')
@endsection

@section('js')
@endsection

@section('content')

<div class="container-fluid py-4">

    <h3 class="h5 text-muted">Add new Tree</h3>
    <br>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">

                    <div class="alert alert-info text-white" role="alert">
                        <i class="fa fa-lightbulb-o"></i> &nbsp;<strong>ProTip</strong>
                        <p class="text-white text-sm">
                            Be careful while adding the details of the tree. Adopt maximum precision in the location.
                        </p>
                    </div>

                    <form method="post" name="trees-create-form" id="trees-create-form" enctype="multipart/form-data" action="{{ route('portal.admin.tree.store') }}" {{--  class="ckeditor dropzone"  --}}>
                        {{ method_field('POST') }}
                             @csrf
                             <input type="hidden" class="treeid" name="treeid" id="treeid" value="">
                             <div class="form-group">
                                 <label> Forest id </label>
                                 <input type="text" name="forest_id" class="form-control text-sm" required / >
                             </div>

                             <div class="form-group">
                                 <label> Species id </label>
                                 <input type="text" name="species_id" class="form-control text-sm" required/>
                             </div>

                             <div class="form-group">
                                <label> Mission id </label>
                                <input type="text" name="mission_id" class="form-control text-sm" required/>
                            </div>

                             <div class="form-group text-sm">
                                <label for="health" class="pe-4"> Health </label>
                                <select name="health" id="health">
                                    <option value="Healthy"> Healthy </option>
                                    <option value="Not So Healthy"> Not So Healthy </option>
                                    <option value="Needs Immediate Attention"> Needs Immediate Attention </option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group " >
                                        <label> Latitude </label>
                                        <input type="text" name="lat" class="form-control text-sm bg-white-600"/>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label> Longitude </label>
                                        <input type="text" name="long" class="form-control text-sm bg-white-600"/>
                                    </div>
                                </div>
                            </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group pb-2">
                        <label class="control-label " for="planted_by">Planted by</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="{{ auth()->user()->name }}" disabled>
                            <input type="hidden" name="planted_by" value="{{ auth()->user()->id }}">
                        </div>
                    </div>

                    <button class="btn bg-gradient-success" type="submit" id="create_button" >
                        <i class="fa fa-save"></i> ADD TREE
                    </button>

                    <a href="{{ route('portal.admin.tree.index') }}" class="btn bg-gradient-warning">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>

                </div>
            </div>
        </div>

    </form>

    </div>

</div>

@endsection
