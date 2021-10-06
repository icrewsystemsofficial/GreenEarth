@extends('layouts.app')

@section('pagetitle')
@endsection

@section('css')
@endsection

@section('js')
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="container-fluid py-4">
        <div class="card">
                <div class="card-body">
                    <div class="text-center pt-3 text-lg">
                        <strong> {{ $announcements->title }} </strong>
                    </div>
                    <div class="text-center pb-2">
                        {{ $announcements->created_at->toDateString() }}, {{ $announcements->author }}
                    </div>
                    <hr>

                    <div class="justify-content ps-2 pt-3 pe-2 pb-2">
                    {!! $announcements->body !!}
                    </div>
                </div>

                <div class="card-footer text-center">
                    <a href="{{ url()->previous() }}" class="btn btn-success"> 
                        Back
                    </a> 
                </div>
        </div>
    </div>
</div>
@endsection
