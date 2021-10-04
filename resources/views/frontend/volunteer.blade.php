@extends('layouts.frontend')

@section('js')
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
              integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" 
              crossorigin="anonymous">
</script>
@endsection

@section('content')
<header class="bg-gradient-dark">
  <div class="page-header min-vh-75">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 mx-auto my-auto">
          <div class="card card-profile overflow-hidden">
            <div class="row">
              <div class="col-lg-4 col-md-6 col-12 pe-lg-0">
                <div class="p-3 pe-md-0">
                  <img class="w-100 border-radius-md" src="{{ asset('img/marie.jpg') }}" alt="image">
                </div>
              </div>
              <div class="col-lg-8 col-md-6 col-12 ps-lg-0 my-auto">
                <div class="card-body">
                  <h5 class="mb-1 mt-0 h5">Emma Thomas</h5>
                  <h6 class="text-info mb-4 h6">Mumbai, India</h6>
                  <p class="mb-3"> Until you dig a hole, you plant a tree, you water it and make it survive, you haven't done a thing. </p>
                  <h6 class="text-secondary"> Member #3030 </h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

<section class="pt-5 pb-6 bg-gray-100" id="count-stats">
  <div class="container">
    <div class="row justify-content-center text-center">
      <div class="col-md-3">
        <i class="fas fa-globe-americas fa-4x text-info text-gradient mb-3"></i>
        <h5 class="text-lg h5"> 12 months </h5>
        <p> climate positive </p>
      </div>
      <div class="col-md-3">
        <i class="fas fa-cloud fa-4x mb-3"></i>
        <h5 class="text-lg h5"> 105.2t</h5>
        <p> of carbon reduction </p>
      </div>
      <div class="col-md-3">
        <i class="fas fa-tree fa-4x text-success text-gradient mb-3"></i>
        <h5 class="text-lg h5"> 20 </h5>
        <p> trees planted </p>
      </div>
    </div>
  </div>
</section>

<section class="py-7">
  <div class="container">
    <div class="row mb-6">
      <p class="h2 text-center text-success text-gradient"> 20 trees planted </p>
    </div>
    <div class="row align-items-center mt-2">
      <div class="col">
        <div class="row justify-content-start">
          <div class="col-md-2">
            <div class="card card-profile shadow-lg overflow-hidden move-on-hover w-90 h-90">
              <a data-toggle="modal" data-target="#Modal">
                <img src="{{ asset('img/seedling.png') }}" alt="image">
              </a>
            </div>

            <!-- MODAL -->
            <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title h5" id="ModalLabel"> Tree #107 </h5>
                    <h6 class="modal-title h6"> Broken Clouds, 21°C</h6>
                  </div>
                <div class="modal-body">
                  <p class="p-3">
                    <strong> Funded by:  </strong> <br>
                    <strong> Species:  </strong> <br>
                    <strong> CO<sub>2</sub> Sequestered : </strong> <br>
                    <strong> Planted On:  </strong> <br>
                    <strong> Age:  </strong>  <br>
                    <strong> Location:  </strong> <br>
                 </p>
                </div>
              </div>
            </div>
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

  <div class="container mt-2">
    <div class="row">
      <h4 class="h4 text-center text-white">
        Emma Thomas's impact visualised
      </h4>
      <h5 class="h5 text-center text-info">
        105.2 tonnes of CO<sub>2</sub> is equivalent to one of the following
      </h5>
      <div class="row mt-5 justify-content-start">
        <div class="col-lg-4 mb-lg-0 mb-4">
          <a href="javascript:;">
            <div class="card card-background move-on-hover">
              <div class="full-background" style="background-image: url('https://images.pexels.com/photos/53389/iceberg-antarctica-polar-blue-53389.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940')"></div>
                <div class="card-body pt-12">
                  <span class="text-white h5"> 150  </span> metres<sup>2</sup> of sea ice saved 
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 mb-lg-0 mb-4">
            <a href="javascript:;">
              <div class="card card-background move-on-hover">
                <div class="full-background" style="background-image: url('https://images.pexels.com/photos/302718/pexels-photo-302718.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940')"></div>
                  <div class="card-body pt-12">
                    <span class="text-white h5"> 300  </span> miles driven in a car
                  </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4">
            <a href="javascript:;">
              <div class="card card-background move-on-hover">
                <div class="full-background" style="background-image: url('https://images.pexels.com/photos/46148/aircraft-jet-landing-cloud-46148.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940')"></div>
                  <div class="card-body pt-12">
                    <span class="text-white h5"> 20  </span> long haul flights
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="pt-5 pb-6 vh-75" id="count-stats">
  <div class="container">
    <div class="row justify-content-center text-center">
      Badges
    </div>
  </div>
</section>

@endsection
