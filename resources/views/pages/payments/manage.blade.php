@extends('layouts.app')

@section('pagetitle')
@endsection

@section('css')
@endsection

@section('js')
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
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
                                    <label><strong> Comment </strong></label>
                                    <textarea id="description" class="ckeditor form-control" placeholder="{!! $comment !!}" name="description">{!! $comment !!}</textarea>
                                </div>
                                <input type="hidden" name="tree_id" value="0">
                                <div class="card-footer p-2 my-5 ps-2">
                                    <button type="submit" class="btn text-white bg-success btn-sm">Add Comment</button>
                                    <a href="{{ url()->previous() }}" class="btn text-white bg-warning btn-sm">
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
