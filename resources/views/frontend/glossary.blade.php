@extends('layouts.frontend')

@section('content')

<header class="bg-gradient-dark">
    <div class="page-header min-vh-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center mx-auto my-auto">
                    <p class="lead mb-4 text-white opacity-9 font-lg">  
                        Glossary of Climate Terms
                    </p>
                </div>
            </div>
        </div>
        <div class="position-absolute w-100 z-index-1 bottom-0">
            <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                    <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="moving-waves">
                    <use xlink:href="#gentle-wave" x="48" y="-1" fill="rgba(255,255,255,0.40" />
                    <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.35)" />
                    <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.25)" />
                    <use xlink:href="#gentle-wave" x="48" y="8" fill="rgba(255,255,255,0.20)" />
                    <use xlink:href="#gentle-wave" x="48" y="13" fill="rgba(255,255,255,0.15)" />
                    <use xlink:href="#gentle-wave" x="48" y="16" fill="rgba(255,255,255,1" />
                </g>
            </svg>
        </div>
    </div>
</header>
<section class="py-6">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="row justify-content-start">
                    <div class="info">
                        <div class="icon icon-shape text-center">
                            <i class="fas fa-seedling fa-2x text-success text-gradient me-4"></i>
                        </div>
                        <h5 class="font-weight-bold"> Carbon Neutral </h5>
                        <p> Any CO<sub>2</sub> released into the atmosphere from a company’s activities is balanced by an equivalent amount being removed.  </p>
                    </div>  
                </div>
                <div class="row justify-content-start mt-4">
                    <div class="info">
                        <div class="icon icon-shape text-center">
                            <i class="fas fa-seedling fa-2x text-success text-gradient me-4"></i>
                        </div>
                        <h5 class="font-weight-bold"> Carbon Negative </h5>
                        <p> Activity that goes beyond achieving net-zero carbon emissions to create an environmental benefit by removing additional carbon dioxide from the atmosphere. It is also known as Climate Positive.</p>
                    </div>
                </div>
                <div class="row justify-content-start mt-4">
                    <div class="info">
                        <div class="icon icon-shape text-center">
                            <i class="fas fa-seedling fa-2x text-success text-gradient me-4"></i>
                        </div>
                        <h5 class="font-weight-bold"> Climate Neutral </h5>
                        <p> Reducing all GHG to the point of zero while eliminating all other negative environmental impacts that an organisation may cause. </p>
                    </div>
                </div>
                <div class="row justify-content-start mt-4">
                    <div class="info">
                        <div class="icon icon-shape text-center">
                            <i class="fas fa-seedling fa-2x text-success text-gradient me-4"></i>
                        </div>
                        <h5 class="font-weight-bold"> Net-Zero Carbon Emissions  </h5>
                        <p> An activity that releases net-zero carbon emissions into the atmosphere. </p>
                    </div>
                </div>
                <div class="row justify-content-start mt-4">
                    <div class="info">
                        <div class="icon icon-shape text-center">
                            <i class="fas fa-seedling fa-2x text-success text-gradient me-4"></i>
                        </div>
                        <h5 class="font-weight-bold"> Net-Zero Emissions </h5>
                        <p> It balances the whole amount of greenhouse gas (GHG) released and the amount removed from the atmosphere. </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 ms-auto mt-lg-0 mt-4">
                <div class="card shadow-lg">
                    <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                        <div class="d-block blur-shadow-image">
                            <img src="https://images.pexels.com/photos/1072824/pexels-photo-1072824.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="img-blur-shadow" class="img-fluid shadow rounded-3">
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="mt-0 text-success font-weight-bold">
                            #GoGreen
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

  

@endsection
