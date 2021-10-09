@extends('layouts.frontend')

@section('content')
<header style="background-image: url('https://images.unsplash.com/photo-1586581277029-5769487f3881?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTR8fGFsaXNoYW58ZW58MHx8MHx8&ixlib=rb-1.2.1&w=1600&q=80'); object-fit:cover; background-repeat: no-repeat; opacity:90%;">
    <div class="page-header min-vh-75">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-8 mx-auto my-auto">
                    <h2 class="h2 text-white"> Announcements </h2>
                </div>
            </div>
        </div>
        <div class="position-absolute w-100 z-index-1 bottom-0">
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
          <defs>
            <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
          </defs>
          <g class="moving-waves">
            <use xlink:href="#gentle-wave" x="48" y="-1" fill="rgba(255,255,255,0.40)" />
            <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.35)" />
            <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.25)" />
            <use xlink:href="#gentle-wave" x="48" y="8" fill="rgba(255,255,255,0.20)" />
            <use xlink:href="#gentle-wave" x="48" y="13" fill="rgba(255,255,255,0.15)" />
            <use xlink:href="#gentle-wave" x="48" y="16" fill="rgba(255,255,255, 1)" />
          </g>
        </svg>
      </div>
    </div> 
</header>

<div class="slice py-7">
    <div class="container position-relative">
        <div class="card shadow-lg">
            <div class="card-body">
                <div class="h4 text-center mt-2">
                    {{ $announcements->title }} 
                </div>
                <div class="text-center mb-3">
                    <p> {{ $announcements->author }}, {{ $announcements->created_at->diffForHumans() }} </p>
                </div>
                <hr>
                <div class="justify-content-center m-2">
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