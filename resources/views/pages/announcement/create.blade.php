@extends('layouts.app')

@section('pagetitle')
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
    <div class="container-fluid py-4">
        
    <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-body text-sm">
                        <form method="post" action="{{ route('announcement.store') }}" enctype="multipart/form-data">
                       {{ method_field('POST') }}
                            @csrf
                            <div class="form-group ps-2">
                                <label for="roles" class="pe-4">Role </label>
                                <select name="roles" id="roles">
                                    <option value="all"> All </option>
                                    <option value="role"> Role </option>
                                </select>
                            </div>
                            <div class="form-group ps-2">
                                <label> Title </label>
                                <input type="text" name="title" placeholder="Announcement Title" class="form-control text-sm"/>
                            </div>  
                            <div class="form-group pb-5 ps-2">
                                <label><strong> Body </strong></label>
                                <textarea class="ckeditor form-control" name="body"></textarea>
                            </div>
                            <div class="card-footer p-2">
                                <button type="submit" class="btn text-white bg-green-600 btn-sm ps-3 pe-3 pt-2 pb-2">Save Announcement</button>
                               <a href="{{ url()->previous() }}" class="btn text-white bg-red-600 btn-sm ps-3 pe-3 pt-2 pb-2"> 
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