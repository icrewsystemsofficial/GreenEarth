@extends('layouts.app')

@section('pagetitle')
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<meta name="csrf-token" content="{{ csrf_token() }}" />

<style>
    .dropzoneDragArea{
        background-color: #fbfdff;
        border: 1px dashed #c0ccda;
        border-radius: 6px;
        padding: 60px;
        text-align: center;
        margin-bottom: 15px;
        pointer: cursor;
    }

    .dropzone{
        border: none;
    }
</style>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js" integrity="sha512-VQQXLthlZQO00P+uEu4mJ4G4OAgqTtKG1hri56kQY1DtdLeIqhKUp9W/lllDDu3uN3SnUNawpW7lBda8+dSi7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>

<script>
    Dropzone.autoDiscover = false;

    let token = $('meta[name="csrf-token"]').attr('content');

    $(function(){
        var myDropzone = new Dropzone("div#dropzoneDragArea", {
            paramName: "file",
            url: "{{ route('portal.admin.tree.storeimage') }}",
            previewsContainer: 'div.dropzone-previews',
            addRemoveLinks: true,
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 10,
            acceptedFiles: ".jpeg,.jpg,.png",
            params: {
                _token: token,
            },

            init: function(){
                var myDropzone = this;

                $("form[name='trees-create-form']").submit(function(event) {
                    event.preventDefault();

                    URL = $("#trees-create-form").attr('action');

                    CKEDITOR.instances.description.updateElement();
                    formData = $("#trees-create-form").serialize();

                    $.ajax({
                        type: 'POST',
                        url: URL,
                        data: formData,
                        success: function(result){
                            if (result.status == "success"){
                                var treeid = result.tree_id;
						        $("#treeid").val(treeid);
                                myDropzone.processQueue();

                                window.location.href = "{{ route('portal.admin.tree.index') }}";
                            }
                            else{
                                console.log("error");
                            }
                        }
                    });

                });

                this.on('sending', function(file, xhr, formData){
	                let treeid = document.getElementById('treeid').value;
		            formData.append('treeid', treeid);
                });

                this.on("success", function(file, response){

                });

                this.on("queuecomplete", function(){

                });

                this.on("sendingmultiple", function(files, response){

                });

                this.on("errormultiple", function(files, response){

                });
            }
        });
    });
</script>

@endsection

@section('content')
    <div class="container-fluid p-4">
        <!-- Add Content Here -->
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-body text-sm">
                        <form method="post" name="trees-create-form" id="trees-create-form" enctype="multipart/form-data" action="{{ route('portal.admin.tree.store') }}" class="ckeditor dropzone">
                       {{ method_field('POST') }}
                            @csrf
                            <input type="hidden" class="treeid" name="treeid" id="treeid" value="">
                            <div class="form-group ps-3 pe-3">
                                <label> Name </label>
                                <input type="text" name="name" class="form-control text-sm"/>
                            </div>
                            <div class="form-group pb-2 ps-3 pe-3">
                                <label><strong> Description </strong></label>
                                <textarea type="text" class="ckeditor form-control text-sm" id="description" name="description"></textarea>
                            </div>

                            <div class="form-group ps-3 pe-3 text-sm">
                                <label for="health" class="pe-4"> Health </label>
                                <select name="health" id="health">
                                @foreach($treeHealth as $health)
                                    <option value="{{$health}}"> {{$health}} </option>
                                @endforeach
                                </select>
                            </div>

                            <div class="form-group ps-3 pe-3">
                                <label> Location </label>
                                <input type="text" name="location" class="form-control text-sm bg-white-600"/>
                            </div>

                            <div class="form-group ps-3 pb-4 pe-5">
                                <label> Photo </label>
                                    <div id="dropzoneDragArea" class="dz-default dz-message dropzoneDragArea ms-6 me-6 mt-2 me-2 ">
                                        <span>
                                            Drop files here to upload
                                        </span>
                                    </div>
                                    <div class="dropzone-previews">
                                    </div>
                            </div>

                            <div class="card-footer p-3">
                                <button type="submit" class="btn btn-sm btn-success"> Save </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
