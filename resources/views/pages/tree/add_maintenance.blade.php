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
    });
</script>
@endsection

@section('content')
<div>
    <div>Space for Tree name, etc. (anything that helps volunteer remember what tree theyre adding record for); will work on this later</div>
    <div>
        <form method="post" action="{{ route('announcement.store') }}" enctype="multipart/form-data">
            {{ method_field('POST') }}
            @csrf
            <div class="form-group ps-2">
                <label> Title </label>
                <input type="text" name="title" placeholder="Maintenance Title" class="form-control"/>
            </div>  
            <div class="form-group pb-5 ps-2">
                <label><strong>Description</strong></label>
                <textarea class="ckeditor form-control" name="body" VALUE="Maintenance Title"></textarea>
            </div>
            <div class="form-group ps-2">
                <label for="roles" class="">Tree Health Status </label>
                <select name="roles" id="roles">
                    <option value="all">Not So Healthy</option>
                    <option value="role">Healthy</option>
                    <option value="immediate">Reqires Immediate Attention</option>
                </select>
            </div>
            ill add a second input text field tomorrow if the user selects any option other than healthy
            
            
            
            <div class="card-footer p-1">
                <button type="submit" class="btn text-white bg-green-600 btn-sm ps-3 pe-3 pt-2 pb-2">Add Maintenance Record</button>
                <a href="{{ url()->previous() }}" class="btn text-white bg-red-600 btn-sm ps-3 pe-3 pt-2 pb-2"> 
                    Cancel
                </a> 
            </div>                    
        </form>
    </div>
</div>
@endsection