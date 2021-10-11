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
    <div class="container-fluid py-4">
        <div class="card">
            <form method="post" action="{{ route('portal.admin.tree.store_updates', $id) }}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="card-body text-sm">
                    <div class="form-group ms-3">
                        <label> Image of the tree </label>
                        <div class="m-2">
                            <input type="file" id="logo" name="logo"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="health" class="ms-3 me-3"> Health </label>
                        <select name="health" id="health" class="bg-white">
                            @foreach($treeHealth as $health)
                                <option value="{{$health}}"> {{$health}} </option>
                            @endforeach
                        </select>
                    </div> 
                    <div class="form-group mb-3 ms-3">
                        <label> Remarks </label>
                        <textarea class="ckeditor form-control" name="remarks"> </textarea>
                    </div>
                </div>
                <div class="card-footer ms-3">
                    <button type="submit" class="btn btn-success btn-sm" > Update </button>
                    <a href="{{ url()->previous() }}" class="btn btn-warning btn-sm"> 
                        Back
                    </a> 
                </div>                        
            </form>            
        </div>
    </div>
</div>

@endsection