@extends('layouts.app')

@section('pagetitle')
@endsection

@section('css')
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
    <div class="container-fluid py-4">
        <div class="card">
            <form method="post" action="{{ route('portal.admin.announcements.store') }}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="card-body text-sm">
                    <div class="form-group">
                        <label for="role" class="ms-3 me-4"> Role </label>
                        <select name="role" id="role" class="bg-white" required>
                            @foreach($roles as $role)
                                <option value="{{$role}}"> {{$role}} </option>
                            @endforeach
                        </select>

                        <label for="status" class="ms-6 me-4"> Status </label>
                        <select name="status" id="status" class="bg-white" required>
                            <option value="0"> Inactive </option>
                            <option value="1"> Active </option>
                        </select>
                    </div>
                    <div class="form-group ms-3">
                        <label> Title </label>
                        <input type="text" name="title" placeholder="Announcement Title" class="form-control" required/>
                    </div>  
                    <div class="form-group mb-5 ms-3">
                        <label> Body </label>
                        <textarea class="ckeditor form-control" name="body" required> </textarea>
                    </div>
                </div>
                <div class="card-footer ms-3">
                    <button type="submit" class="btn btn-success" >Save Announcement </button>
                    <a href="{{ url()->previous() }}" class="btn btn-danger"> 
                        Back
                    </a> 
                </div>                        
            </form>            
        </div>
    </div>
</div>

@endsection