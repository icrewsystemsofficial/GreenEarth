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
            <form action="{{ route('portal.admin.announcements.edit', $announcements->id) }}" enctype="multipart/form-data" method="post">
                @csrf
                @method('PUT')
                <div class="card-body text-sm">
                    <div class="form-group">
                    <label for="role" class="ps-2 pe-4">Role </label>
                        <select name="role" id="role">
                            @foreach($roles as $role)
                                <option {{ ($announcements->role == $role) ? 'selected':'' }} value="{{$role}}"> {{$role}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group ps-2">
                        <label> Title </label>
                        <input type="text" name="title" placeholder="Announcement Title" class="form-control" value="{{ $announcements->title }}"/>
                    </div>  
                    <div class="form-group pb-5 ps-2">
                        <label> Body </label>
                        <textarea class="ckeditor form-control" name="body"> {{ $announcements->body }} </textarea>
                    </div>
                </div>
                <div class="card-footer ms-2">
                    <button type="submit" class="btn btn-success">Update Announcement</button>
                    <a href="{{ url()->previous() }}" class="btn btn-danger"> 
                        Back
                    </a> 
                </div>                        
            </form>            
        </div>
    </div>
</div>

@endsection



