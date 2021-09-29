@extends('layouts.app')

@section('pagetitle')
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js" integrity="sha512-VQQXLthlZQO00P+uEu4mJ4G4OAgqTtKG1hri56kQY1DtdLeIqhKUp9W/lllDDu3uN3SnUNawpW7lBda8+dSi7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script>
    function loadingButton() {
        var create_button = document.getElementById('create_button');
        create_button.innerHTML = '<i class=\'fa fa-spinner fa-spin\'></i> Please wait';
    }
</script>
@endsection

@section('content')
<div class="container-fluid py-4">

    <h5 class="text-muted mb-3">
        Add New Carbon-Neutral Business
    </h5>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('portal.admin.directory.store') }}" method="post" enctype="multipart/form-data" name="add_business" id="add_business">

                        @csrf
                        {{ method_field('POST') }}

                        <div class="form-group">
                            <label class="control-label col-sm2" for="business_name">Business Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="business_name" placeholder="icrewsystems Software Engineering LLP" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm2" for="business_owner">Business Owner</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="business_owner" placeholder="John Appleseed" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm2" for="brand_name">Brand Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="brand_name" placeholder="icrewsystems" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm2" for="business_about">Business Description</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="business_about" placeholder="Reimagining the way web works." />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm2" for="location">Location</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="location" placeholder="Chennai, Tamil Nadu, India" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm2" for="business_founding_date">Employee Count</label>
                            <div class="col-sm-12">
                                <input type="number" name="employee_count" placeholder=0 class="p-2">
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

                        <input type="hidden" name="business_name_slug">

                        <button class="btn btn-success" type="submit" id="create_button" onclick="loadingButton();">
                            <i class="fa fa-save"></i> ADD
                        </button>
                        <a href="{{ route('portal.admin.directory.index') }}" class="btn btn-warning">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label class="control-label col-sm2" for="facebook_link">Facebook Link</label>
                        <div class="col-sm-12">
                            <input type="url" class="form-control" name="facebook_link" placeholder="https://www.facebook.com/icrewsystems/" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm2" for="instagram_link">Instagran Link</label>
                        <div class="col-sm-12">
                            <input type="url" class="form-control" name="instagram_link" placeholder="https://www.instagram.com/icrewsystemsofficial/" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm2" for="linkedin_link">LinkedIn Link</label>
                        <div class="col-sm-12">
                            <input type="url" class="form-control" name="linkedin_link" placeholder="https://www.linkedin.com/company/icrewsystems/" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm2" for="website_link">Website Link</label>
                        <div class="col-sm-12">
                            <input type="url" class="form-control" name="website_link" placeholder="https://www.icrewsystems.com/en/" />
                        </div>
                    </div>

                </div>
            </div>
        </div>

        </form>
    </div>
</div>
@endsection