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

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>   

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
            url: "{{ route('api.v1.upload_tree_updates') }}",
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
            Trees Management
        </h5>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('portal.admin.tree.store_updates', $tree->id) }}" method="POST">
                        {{ method_field('POST') }}
                            @csrf
                            <div class="form-group">
                                <label class="control-label col-sm2" for="logo"> Image of the tree </label>
                                <div class="col-sm-12">
                                    <input type="file" class="form-control" id="logo" name="logo">
                                </div>
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
                            <div class="form-group">
                                <label class="control-label col-sm2"> Remarks </label>
                                <div class="col-sm-12">
                                    <textarea class="ckeditor form-control" name="remarks"> </textarea>
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
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">PLANTED BY</p>
                                            <h5 class="font-weight-bolder mb-0">
                                                Name
                                            </h5>
                                            <small class="text-muted text-xs">
                                                {{ $tree->location }}
                                            </small>
                                        </div>
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