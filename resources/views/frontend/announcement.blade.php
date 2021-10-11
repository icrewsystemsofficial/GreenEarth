@extends('layouts.frontend')

@section('content')
<header style="background-image: url('https://images.unsplash.com/photo-1586581277029-5769487f3881?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTR8fGFsaXNoYW58ZW58MHx8MHx8&ixlib=rb-1.2.1&w=1600&q=80'); object-fit:cover; background-repeat: no-repeat; opacity:90%;">
    <div class="page-header min-vh-75">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-8 mx-auto my-auto">
                    <h2 class="h2 text-white"> Announcement Board </h2>
                    <h4 class="h6 text-white"> The important public information regarding GreenEarth will be posted in this space. The same will be updated on our social media too. </h4>
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

<section>
    <div class="slice py-6">
        <div class="container">
        @foreach($announcements as $announcement)
            <div class="card mb-2 shadow-lg move-on-hover">
                <div class="card-body d-flex align-items-center flex-wrap flex-lg-nowrap py-0">   
                    <div class="col-lg-2 col-8 pl-0 pl-md-2 pt-3 pt-lg-0">
                        <span class="h6 text-sm"> {{ $announcement->author }} </span>
                    </div>
                    <div class="col col-lg-1 text-right px-0 order-lg-4 pt-3 pt-lg-0">
                        <span class="text-muted text-sm"> {{ $announcement->created_at->diffForHumans()}} </span>
                    </div>
                    <div class="col-12 col-lg-8 d-flex align-items-center position-static pb-3 py-lg-3 px-0">
                        <div class="col col-lg-11 px-0">
                            <div class="d-flex flex-wrap  align-items-center">
                                <div class="col-12 col-lg-auto px-0 position-static">
                                    <a href="{{ route('home.announcements.view', $announcement->slug) }}"
                                        class="stretched-link h6 d-block mb-0 lh-140 text-sm font-weight-bold">
                                        {{ $announcement->title }}
                                    </a>
                                </div>
                                <div class="col-12 col-lg pl-0 pt-lg-3 text-limit text-sm text-muted d-sm-block pl-lg-2">
                                    <p><span> {!! Str::limit($announcement->body, 40) !!} </span></p>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>   
            </div>  
            @endforeach           
        </div>
    </div>
</section>



@endsection
