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
    // $(document).ready(function() {
    //    $('.ckeditor').ckeditor()
       ClassicEditor.create(document.querySelector('#description')), {
        placeholder: '{{ $comment }}'
    }
</script>

@endsection

@section('content')
<div class="container-fluid py-4">
        <!-- Add Content Here -->
        <div class="row">
            <div class="col-12">
                <div class="card mb-6 text-sm">
                    <div class="card-body mt-0 mb-4">
                    <div>
                        <div>
                            <form method="post" action="{{ route('portal.admin.payments.update',$id) }}">
                                @csrf
                                <div class="form-group pb-2 ps-2">
                                    <label><strong>Description</strong></label>
                                    <textarea id="description" class="ckeditor form-control" placeholder="{!! $comment !!}" name="description"></textarea>
                                </div>
                                <input type="hidden" name="tree_id" value="0">
                                <div class="card-footer p-2 my-5 ps-2">
                                    <button type="submit" class="btn text-white bg-green-600 btn-sm ps-3 pe-3 pt-2 pb-2">Add Comment</button>
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
