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
            Create FAQ
        </h5>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('portal.admin.faq.store') }}" method="POST">
                            @csrf


                            <div class="form-group">
                                <label class="control-label col-sm2" for="name">Your Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="John Doe" required>
                                    </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm2" for="title">Question</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="title" name="title" placeholder="What is Carbon Footprint?" required>
                                    </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm2" for="body">Answer</label>
                                    <div class="col-sm-12">
                                        <textarea rows="4" cols="20" class="form-control" id="body" name="body" placeholder="Answer here..." required></textarea>
                                    </div>
                            </div>

                            <button class="btn btn-success" type="submit" id="create_button" >
                            CREATE
                            </button>
                        <a href="{{ route('portal.admin.faq.index') }}" class="btn btn-warning">
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















