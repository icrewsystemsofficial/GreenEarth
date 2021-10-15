@extends('layouts.app')

@section('pagetitle')
@endsection

@section('css')
@endsection

@section('js')

@endsection

@section('content')
    <div class="container-fluid py-4">

        <h3 class="h5 text-muted">Contact Request </h3>
        <p class="h4 pb-4">#{{ $contact_requests->id }}</p>


        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('portal.admin.contact-requests.update',$contact_requests->id )}}" method="POST">
                            @csrf



                            <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="id" name="id" value="{{$contact_requests->id}}" hidden required>
                                    </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm2" for="email">Email</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" placeholder="{{ $contact_requests->email }}" disabled>
                                        <input type="hidden" class="form-control" id="email" name="email" placeholder="John Doe" value="{{$contact_requests->created_by}}" required>
                                    </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm2" for="title">Type</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="type" name="type"  placeholder="{{$contact_requests->type}}" disabled>
                                    </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm2" for="body">Message</label>
                                    <div class="col-sm-12">
                                        <textarea rows="4" cols="20" class="form-control" id="body" name="body" placeholder="{{$contact_requests->body}}" disabled></textarea>
                                    </div>
                            </div>

                            <?php
                                $types = array('1'=>'Support', '2' => 'Enquiry', '3' => 'Partnership', '4' => 'Other');
                            ?>

                            <div class="form-group">
                                <label class="control-label col-sm2" for="type">Query Type</label>
                                <div class="col-sm-12">
                                    <select class="form-control" name="type" disabled>
                                        @foreach ($types as $type )
                                            <option value="{{$type}}"  selected>{{$type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>




                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label class="control-label col-sm2" for="status">Status</label>
                            <div class="col-sm-12">
                                <select class="form-control" name="status" required>

                                    <option value="0" @if($contact_requests->status == 0) selected @endif >New</option>
                                    <option value="1" @if($contact_requests->status == 1) selected @endif >Contacted</option>
                                    <option value="2" @if($contact_requests->status == 2) selected @endif >Resolved</option>
                                    <option value="3" @if($contact_requests->status == 3) selected @endif >Spam</option>

                                </select>
                            </div>
                        </div>

                        <button onclick="return confirm('Are you sure?')" class="btn bg-gradient-success" type="submit" id="create_button" >
                            UPDATE
                            </button>
                        <a href="{{ route('portal.admin.contact-requests.index') }}" class="btn bg-gradient-warning">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>

                    </div>
                </div>
            </div>

            </form>
        </div>
    </div>
@endsection















