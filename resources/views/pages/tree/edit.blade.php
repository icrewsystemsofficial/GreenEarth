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


    .gallery{
        width:200px;
        height:200px;
        object-fit:cover;
        border-radius:10px;
    }

    .container {
        position: relative;
    }

    .container img {
        display: block;
    }

    .container .fa-times-circle {
        position: absolute;
        top:0;
        right:0;
        font-size:20px;
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
                                myDropzone.processQueue();

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
                    $('.dropzone-previews').empty();
                    location.reload(true);
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
                        <form method="post" name="trees-create-form" id="trees-create-form" enctype="multipart/form-data" action="{{route('portal.admin.tree.edit',$trees->id)}}" class="ckeditor dropzone">
                       {{ method_field('PUT') }}
                            @csrf
                            <input type="hidden" class="treeid" name="treeid" id="treeid" value="{{ $trees->id}}">
                            <div class="form-group ps-3 pe-3">
                                <label> Name </label>
                                <input type="text" name="name" class="form-control text-sm" value="{{ $trees->name }}"/>
                            </div>
                            <div class="form-group pb-2 ps-3 pe-3">
                                <label><strong> Description </strong></label>
                                <textarea type="text" class="ckeditor form-control text-sm" id="description" name="description"> {{ $trees->description }} </textarea>
                            </div>

                            <div class="form-group ps-3 pe-3 text-sm">
                                <label for="health" class="pe-4"> Health </label>
                                <select name="health" id="health">
                                @foreach($treeHealth as $health)
                                    <option {{ ($trees->health == $health) ? 'selected':'' }} value="{{$health}}"> {{$health}} </option>
                                @endforeach
                                </select>
                            </div>

                            <div class="form-group ps-3 pe-3">
                                <label> Location </label>
                                <input type="text" name="location" class="form-control text-sm bg-white-600" value="{{ $trees->location }}"/>
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

                            <div class="form-group ps-3 pb-4">
                                <div class="row row-cols-lg-5 row-cols-md-3 g-2 ">
                                    @foreach($treeImages as $treeImage)
                                    <div class="col" style="column-gap: 0.25rem;">

                                        <div class="card container pe-0" style="width:200px; border:none;">
                                            <a onclick="return confirm('Are you sure?')" href="{{route('portal.admin.tree.deleteImage',['treeid'=>$trees->id,'id'=>$treeImage->id])}}">
                                                <i class="fas fa-times-circle pe-2 pt-1 text-white" style="float: right;"></i>
                                            </a>
                                            <img class="card-img-top gallery" src="{{ asset('uploads/images/') }}/{{ $treeImage->name }}" />
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="card-footer ps-3">
                                <button type="submit" class="btn btn-sm btn-success"> Update Tree </button>
                                <a href="{{ route('portal.admin.tree.index') }}" class="btn btn-sm btn-warning">
                                    Back
                               </a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
