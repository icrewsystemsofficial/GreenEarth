@extends('layouts.app')

@section('pagetitle')
@endsection

@section('css')
@endsection

@section('js')
    
@endsection

@section('content')
    <div class="container-fluid py-4">

        <h5 class="text-muted mb-3">
            Edit FAQ
        </h5>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                       
                        <form action="{{ route('portal.faq.updateval',$faq->id )}}" method="POST">
                            @csrf

                            <div class="form-group">
                                {{-- <label class="control-label col-sm2" for="id">FAQ ID</label> --}}
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="id" name="id" placeholder="John Doe" value="{{$faq->id}}" hidden required>
                                    </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm2" for="name">Your Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="John Doe" value="{{$faq->created_by}}" required>
                                    </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm2" for="title">Question</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="title" name="title" placeholder="What is Carbon Footprint?" value="{{$faq->title}}" required>
                                    </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm2" for="body">Answer</label>
                                    <div class="col-sm-12">
                                        <textarea rows="4" cols="20" class="form-control" id="body" name="body" placeholder="Answer here..." required>{{$faq->body}}</textarea>
                                    </div>
                            </div>

                            <button onclick="return confirm('Are you sure?')" class="btn btn-success" type="submit" id="create_button" >
                            UPDATE
                            </button>
                        <a href="{{ route('portal.faq.update') }}" class="btn btn-warning">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">

                        <div class="form-check form-switch">
                            <input class="form-check-input" value='1' name="status" type="checkbox" id="status" checked>
                            <label class="form-check-label" for="status">Display to Users</label>
                        </div>

                    </div>
                </div>
            </div>

            </form>
        </div>
    </div>
@endsection















