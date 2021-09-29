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
        Directory Management
    </h5>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('portal.admin.directory.update', $business->id) }}" method="POST">

                        @csrf
                        {{ method_field('PUT') }}
                        {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT"> --}}

                        <div class="form-group">
                            <label class="control-label col-sm2" for="business_name">Business Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="business_name" value="{{ $business->business_name }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm2" for="business_owner">Business Owner</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="business_owner" value="{{ $business->business_owner }}" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm2" for="brand_name">Brand Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="brand_name" value="{{ $business->brand_name }}" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm2" for="business_about">Business Description</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="business_about" value="{{ $business->business_about }}" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm2" for="location">Location</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="location" value="{{ $business->location }}" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm2" for="business_founding_date">Employee Count</label>
                            <div class="col-sm-12">
                                <input type="number" name="employee_count" value="{{ $business->employee_count }}" class="p-2">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm2" for="business_founding_date">Business Founding Date</label>
                            <div class="col-sm-12">
                                <input type="date" class="form-control" name="business_founding_date" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Business Logo (This does not work)</label>
                            <div id="dropzoneDragArea" class="dz-default dz-message dropzoneDragArea ms-6 me-6 mt-2 me-2 ">
                                <span>
                                    Drop files here to upload
                                </span>
                            </div>
                            <div class="dropzone-previews">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success" data-dismiss="modal">
                            <span id="footer_action_button" class=""><i class="fa fa-save"></i> UPDATE</span>
                        </button>


                        <a href="{{ route('portal.admin.directory.index') }}" class="btn btn-warning">
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
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">JOINED</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            {{ $business->created_at->diffForHumans() }}
                                        </h5>
                                        <small class="text-muted text-xs">
                                            ({{ $business->created_at->format('d/m/Y') }})
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
                                            {{ $business->updated_at->diffForHumans() }}
                                        </h5>
                                        <small class="text-muted text-xs">
                                            ({{ $business->updated_at->format('d/m/Y') }})
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

                    <div class="form-group">
                        <label class="control-label col-sm2" for="facebook_link">Facebook Link</label>
                        <div class="col-sm-12">
                            <input type="url" class="form-control" name="facebook_link" value="{{ $business->facebook_link }}" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm2" for="instagram_link">Instagran Link</label>
                        <div class="col-sm-12">
                            <input type="url" class="form-control" name="instagram_link" value="{{ $business->instagram_link }}" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm2" for="linkedin_link">LinkedIn Link</label>
                        <div class="col-sm-12">
                            <input type="url" class="form-control" name="linkedin_link" value="{{ $business->linkedin_link }}" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm2" for="website_link">Website Link</label>
                        <div class="col-sm-12">
                            <input type="url" class="form-control" name="website_link" value="{{ $business->website_link }}" />
                        </div>
                    </div>

                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body">
                    <a href="#" class="btn btn-sm block btn-info">
                        View Contributions
                    </a>

                    <a href="#" class="btn btn-sm block btn-success">
                        View Linked Trees
                    </a>

                    <a href="#" class="btn btn-sm block btn-info">
                        E-mail Business
                    </a>

                    <a data-bs-toggle="modal" data-bs-target="#deleteUserModal" class="btn btn-danger block btn-sm">
                        Remove Business
                    </a>


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
                                    You are about to delete the account of {{ $business->business_name }}. Deleting this business is irrevocable. Do this only if you are sure.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <form action="{{ route('portal.admin.directory.delete', $business->id) }}" method="POST">
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