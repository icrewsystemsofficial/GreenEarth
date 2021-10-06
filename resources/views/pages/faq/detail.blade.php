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
            {{-- Heading here --}}
        </h5>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <strong> {{$faq->title}} </strong>
                        <br><br>
                        <p>{{$faq->body}}</p>
                        <br><br>
                        <p>Answered by {{$faq->created_by}}</p>
                    </div>
                </div>
            </div>
        </div>
@endsection















