@extends('layouts.app')

@section('pagetitle')
@endsection

@section('css')
@endsection

@section('js')
@endsection

@section('content')
    <div class="container-fluid py-4">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        
        
    </div>

@endsection