@extends('layouts.app')

@section('pagetitle')
@endsection

@section('css')
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>


<script>
    FilePond.registerPlugin(
        FilePondPluginImagePreview,
        FilePondPluginFileValidateType,
        FilePondPluginFileValidateSize,
    );
    const inputElement = document.querySelector('input[id="logo"]');
    const pond = FilePond.create(inputElement, {
        labelIdle: `Drag & Drop your picture or <span class="filepond--label-action">Browse</span>`,
        imagePreviewHeight: 200,
        imageCropAspectRatio: '3:2',
        imageResizeTargetWidth: 300,
        imageResizeTargetHeight: 200,
        stylePanelLayout: 'compact',
        styleLoadIndicatorPosition: 'center bottom',
        styleProgressIndicatorPosition: 'right bottom',
        styleButtonRemoveItemPosition: 'left bottom',
        styleButtonProcessItemPosition: 'right bottom',
        acceptedFileTypes: ['image/png', 'image/jpeg'],
        labelFileTypeNotAllowed: '.JPG or .PNG files only',
        maxFileSize: '5MB',
    });
    FilePond.setOptions({
        server: {
            url: '/portal/upload-logo',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }
    });
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
                                <input type="number" name="employee_count" value=0 class="p-2">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm2" for="business_founding_date">Business Founding Date</label>
                            <div class="col-sm-12">
                                <input type="date" class="form-control" name="business_founding_date" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Business Logo</label>
                            <div>
                                <input type="file" id="logo" name="logo" />
                            </div>
                        </div>

                        <button class="btn btn-success" type="submit" id="create_button">
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
                            <input type="url" class="form-control" name="facebook_link" placeholder="https://facebook.com/icrewsystems/" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm2" for="instagram_link">Instagran Link</label>
                        <div class="col-sm-12">
                            <input type="url" class="form-control" name="instagram_link" placeholder="https://instagram.com/icrewsystemsofficial/" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm2" for="linkedin_link">LinkedIn Link</label>
                        <div class="col-sm-12">
                            <input type="url" class="form-control" name="linkedin_link" placeholder="https://linkedin.com/company/icrewsystems/" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm2" for="website_link">Website Link</label>
                        <div class="col-sm-12">
                            <input type="url" class="form-control" name="website_link" placeholder="https://icrewsystems.com/en/" />
                        </div>
                    </div>

                </div>
            </div>
        </div>

        </form>
    </div>
</div>
@endsection