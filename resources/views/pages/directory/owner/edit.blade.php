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
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('portal.owner.update', $business->id) }}" method="POST">

                        @csrf
                        {{ method_field('PUT') }}
                        {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT"> --}}

                        <div class="form-group">
                            <label class="control-label col-sm2" for="business_name">Business Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="business_name" value="{{ $business->business_name }}" required />
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
                            <label>Business Logo</label>
                            <div>
                                <input type="file" id="logo" name="logo" />
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success" data-dismiss="modal">
                            <span id="footer_action_button"><i class="fa fa-save"></i> UPDATE</span>
                        </button>


                        <a href="{{ route('portal.owner.index', $business->id) }}" class="btn btn-warning">
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
                    </form>

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

                </div>
            </div>
        </div>
    </div>
</div>
@endsection