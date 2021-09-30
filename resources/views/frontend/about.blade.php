@extends('layouts.frontend')

@section('content')
<header class="bg-gradient-dark">
  <div class="page-header min-vh-75">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center mx-auto my-auto">
          <p class="lead mb-4 text-white opacity-8"> With the <span class="text-success text-gradient font-weight-bold"> GreenEarth </span> 
            initiative, our mission, as mere strands in the web of life, is to use the web of computing to weave the earth into a greener place for posterity. </p>
          <a href="{{ route('register') }}" type="submit" class="btn bg-white text-dark"> Sign Up </a>
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

<section class="py-7">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="row justify-content-start">
          <div class="col-md-6">
            <div class="info">
              <div class="icon icon-shape text-center">
                <i class="fas fa-seedling fa-2x text-success text-gradient me-4"></i>
              </div>
              <h5 class="font-weight-bold"> Climate </h5>
              <p> Trees act as a carbon sink, making cities a healthier, safer place to live.  </p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info">
              <div class="icon icon-shape text-center">
                <i class="fas fa-seedling fa-2x text-success text-gradient me-4"></i>
              </div>
              <h5 class="font-weight-bold"> Health </h5>
              <p> Trees help reduce stress and anxiety and allow us to reconnect with nature. </p>
            </div>
          </div>
        </div>
        <div class="row justify-content-start mt-4">
          <div class="col-md-6">
            <div class="info">
              <div class="icon icon-shape text-center">
                <i class="fas fa-seedling fa-2x text-success text-gradient me-4"></i>
              </div>
              <h5 class="font-weight-bold"> Biodiversity </h5>
              <p> Without trees, forest creatures would have nowhere to call home. </p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info">
              <div class="icon icon-shape text-center">
                <i class="fas fa-seedling fa-2x text-success text-gradient me-4"></i>
              </div>
              <h5 class="font-weight-bold"> Land </h5>
              <p> Trees prevent flooding, erosion, and landslides.  </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 ms-auto mt-lg-0 mt-4">
        <div class="card shadow-lg">
          <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
            <div class="d-block blur-shadow-image">
              <img src="https://curlytales.com/wp-content/uploads/2019/06/shutterstock_604290230-min-1280x720.jpg" alt="img-blur-shadow" class="img-fluid shadow rounded-3">
            </div>
          </div>
          <div class="card-body">
            <h5 class="mt-2 text-success font-weight-bold">
              GreenEarth
            </h5>
            <p>
              You’ve helped us make an incredible difference!
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="pt-sm-8 pb-5 position-relative bg-gradient-dark">
  <div class="position-absolute w-100 z-inde-1 top-0 mt-n3">
    <svg width="100%" viewBox="0 -2 1920 157" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <title>wave-down</title>
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g fill="#FFFFFF" fill-rule="nonzero">
          <g id="wave-down">
            <path d="M0,60.8320331 C299.333333,115.127115 618.333333,111.165365 959,47.8320321 C1299.66667,-15.5013009 1620.66667,-15.2062179 1920,47.8320331 L1920,156.389409 L0,156.389409 L0,60.8320331 Z" id="Path-Copy-2" transform="translate(960.000000, 78.416017) rotate(180.000000) translate(-960.000000, -78.416017) "></path>
          </g>
        </g>
      </g>
    </svg>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-8 text-start mb-5 mt-4">
        <h3 class="text-white z-index-1 position-relative text-lg font-weight-bold"> DID YOU KNOW? </h3>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 col-12">
        <div class="card card-profile overflow-hidden">
          <div class="row">
            <div class="col-lg-4 col-md-6 col-12 pe-lg-0">
                <div class="p-3 pe-md-0">
                  <img class="w-100 border-radius-md" src="https://images.pexels.com/photos/1029757/pexels-photo-1029757.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="image">
                </div>
            </div>
            <div class="col-lg-8 col-md-6 col-12 ps-lg-0 my-auto">
              <div class="card-body">
                <p class="mb-0"> The average website produces 1.76 grams of CO<sub>2</sub> per page view.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-12">
        <div class="card card-profile mt-lg-0 mt-5 overflow-hidden">
          <div class="row">
            <div class="col-lg-4 col-md-6 col-12 pe-lg-0">
                <div class="p-3 pe-md-0">
                  <img class="w-100 border-radius-md" src="https://images.pexels.com/photos/1714341/pexels-photo-1714341.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="image">
                </div>
            </div>
            <div class="col-lg-8 col-md-6 col-12 ps-lg-0 my-auto">
              <div class="card-body">
                <p> Extending the time you use a single computer and monitors from four to six years could avoid the equivalent of 190kg of carbon emissions. </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-lg-6 col-12">
        <div class="card card-profile overflow-hidden z-index-2">
          <div class="row">
            <div class="col-lg-4 col-md-6 col-12 pe-lg-0">
                <div class="p-3 pe-md-0">
                  <img class="w-100 border-radius-md" src="https://images.pexels.com/photos/67112/pexels-photo-67112.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="image">
                </div>
            </div>
            <div class="col-lg-8 col-md-6 col-12 ps-lg-0 my-auto">
              <div class="card-body">
                <p> Every time we use a search engine, there is an output of CHG gases because every search engine requires multiple servers. </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-12">
        <div class="card card-profile mt-lg-0 mt-5 overflow-hidden z-index-2">
          <div class="row">
            <div class="col-lg-4 col-md-6 col-12 pe-lg-0">
                <div class="p-3 pe-md-0">
                  <img class="w-100 border-radius-md" src="https://images.pexels.com/photos/5605061/pexels-photo-5605061.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="image">
                </div>
            </div>
            <div class="col-lg-8 col-md-6 col-12 ps-lg-0 my-auto">
              <div class="card-body">
                <p> An e-mail has an estimated carbon footprint of 4 grams of CO<sub>2</sub>, and a large attachment could have a footprint of 50 grams. </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="position-absolute w-100 bottom-0 mn-n1">
    <svg width="100%" viewBox="0 -1 1920 166" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <title>wave-up</title>
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g transform="translate(0.000000, 5.000000)" fill="#FFFFFF" fill-rule="nonzero">
          <g id="wave-up" transform="translate(0.000000, -5.000000)">
            <path d="M0,70 C298.666667,105.333333 618.666667,95 960,39 C1301.33333,-17 1621.33333,-11.3333333 1920,56 L1920,165 L0,165 L0,70 Z" fill="#f8f9fa"></path>
          </g>
        </g>
      </g>
    </svg>
  </div>
</section>

<section class="my-5 pt-5">
  <div class="container">
    <div class="row">
      <div class="col-md-6 m-auto">
        <h4 class="text-dark font-weight-bold text-lg">
          <span class="text-success text-gradient">GreenEarth</span>, 
          an initiative by icrewsystems 
        </h4>
        <p class="mb-4">
          A global web development company with the vision to make the world a better and a greener place.
          It is located in Chennai, India.
        </p>
      </div>
      <div class="col-md-5 ms-auto">
        <div class="position-relative">
          <img class="max-width-50 w-50 position-relative z-index-2" src="https://media.discordapp.net/attachments/861662752174506035/888037915492483102/icrewsystems_logo_highres.png" alt="image">
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
