@extends('layouts.app')

@section('pagetitle')
    Add Tree Maintenance Record
@endsection

@section('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<style>
    .btn{
        text-transform: unset !important;
    }
</style>
@endsection

@section('js')
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
       //ClassicEditor.create(document.querySelector('#description')), {
        //placeholder: 'Type the content here!'
    //}
    });
</script>
<script>
    var extraField = document.getElementById("extraField");
    document.getElementById("health").onchange = changeListener;

    function changeListener(){
        var value = this.value
        //console.log(value);
        
        if (value == "Critical" || value == "Unhealthy"){
        //alert("it works!");
        //document.body.style.background = "red";.      
        extraField.style.display = "block";

        }
        else if (value == "Healthy"){
        //document.body.style.background = "blue";
        extraField.style.display = "none";
        }
    }

</script>

@endsection

@section('content')
<div class="container-fluid py-4">
        <!-- Add Content Here -->
        <div class="row">
            <div class="col-12">
                <div class="card mb-6 text-sm">
                    <div class="card-header pb-3" style="background-color:#fff;">
                        <div class="text-lg font-weight-bolder"> Add Tree Maintenance Record </div>
                        <div class="text-secondary text-sm " id="subheading">{{$tree->name}} planted at {{$tree->location}} on {{$tree->created_at}}</div>
                    </div>
                    <div class="card-body mt-0 mb-4">
                    <div>
                        <div>
                            <form method="post" action="/tree/{{$tree->id}}/add-maintenance" enctype="multipart/form-data">
                                {{ method_field('POST') }}
                                @csrf
                                <div class="form-group ps-2">
                                    <label><strong>Title</strong></label>
                                    <input type="text" name="title" placeholder="Maintenance Title" class="form-control"/>
                                </div>  
                                <div class="form-group pb-2 ps-2">
                                    <label><strong>Description</strong></label>
                                    <textarea id="description" class="ckeditor form-control" name="description"></textarea>
                                </div>
                                <div class="form-group ps-2">
                                    <label for="health" class="">Tree Health Status </label>
                                        <select name="health" id="health">
                                        <option value="Unhealthy">Not So Healthy</option>
                                        <option value="Critical">Reqires Immediate Attention</option>
                                        <option value="Healthy">Healthy</option>    
                                    </select>
                                </div>
                                <div id="extraField" class="ps-2">
                                    <label><strong>What can be done to save the tree?</strong></label>
                                    <textarea class="ckeditor form-control" name="suggestions" placeholder="some value"></textarea>
                                </div>
                                <input type="hidden" name="tree_id" value="{{$tree->id}}">
                                <div class="card-footer p-2 my-5 ps-2">
                                    <button type="submit" class="btn text-white bg-green-600 btn-sm ps-3 pe-3 pt-2 pb-2">Add Maintenance Record</button>
                                    <a href="{{ url()->previous() }}" class="btn text-white bg-red-600 btn-sm ps-3 pe-3 pt-2 pb-2"> 
                                        Cancel
                                    </a> 
                                </div>                    
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
</div>




@endsection