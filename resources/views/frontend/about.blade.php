@extends('layouts.frontend')

@section('css')
<link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />

  <style>
      .swiper {
        width: 100%;
        height: 100%;
        background: #000;
        border-radius: 10px;
      }

      .swiper-slide {
        font-size: 18px;
        color: #fff;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        padding: 40px 60px;
      }

      .parallax-bg {
        position: absolute;
        left: 0;
        top: 0;
        width: 130%;
        height: 100%;
        -webkit-background-size: cover;
        background-size: cover;
        background-position: center;
      }

      .swiper-slide .title {
        font-size: 41px;
        font-weight: 300;
      }

      .swiper-slide .subtitle {
        font-size: 21px;
      }

      .swiper-slide .text {
        font-size: 14px;
        max-width: 400px;
        line-height: 1.3;
      }
  </style>
@endsection

@section('js')

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    // slidesPerView: 1,
    // spaceBetween: 30,
    // loop: true,
    speed: 700,
    parallax: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
</script>


<script>
  // Set the date we're counting down to
  var countDownDate = new Date("Jan 1, 2050 00:00:00").getTime();

  // Update the count down every 1 second
  var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
    document.getElementById("2050_counter").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";

    // If the count down is finished, write some text
    if (distance < 0) {
      clearInterval(x);
      document.getElementById("2050_counter").innerHTML = "EXPIRED";
    }
  }, 1000);
</script>
@endsection

@section('content')
<header class="bg-gradient-success">
  <div class="page-header min-vh-75">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center mx-auto my-auto">
          <h1 class="h2 mt--3">
            <span class="text-white">GreenEarth</span>
          </h1>
            <p class="mb-4 text-white opacity-8">
                our mission, as mere strands in the web of life, is to use the web of computing to weave the earth into a greener place for posterity
            </p>


          {{-- With the <span class="text-success text-gradient font-weight-bold"> GreenEarth </span>
            initiative, our mission, as mere strands in the web of life, is to use the web of computing to weave the earth into a greener place for posterity. </p>
          <a href="{{ route('register') }}" type="submit" class="btn bg-white text-dark"> Sign Up </a> --}}
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
      <div class="col-lg-12">
        {{-- <div class="row justify-content-start">
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
        </div> --}}

        <h3 class="h1">
            <strong>The Internet</strong> is a <span class="text-muted fst-italic">
                <u>silent contirbutor</u></span> in the <span class="text-gradient text-danger">climate crisis</span>.
        </h3>

        <p>
            About 6% of the global CO<sub>2</sub> emissions come from
            the Internet. As of 2021, the global CO<sub>2</sub> emission
            is 31.5 Giga-Tonnes. <a href="http://www.indiaenvironmentportal.org.in/files/file/global%20energy%20review%202021.pdf" class="" download>Read Report <i class="fa fa-external-link"></i></a>

            <span class="h4">
                <br><br>
                That's <span class="text-danger"><strong>{{ number_format(1890000000, '0', '.', ',')}} kgCO2</strong></span>, per year.
            </span>
        </p>

      </div>

      {{-- <div class="row mt-4">
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
      </div> --}}


      <div class="col-lg-12 ms-auto mt-lg-0">
        <div class="card shadow-lg mt-4">
            <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
              <h3 class="h4 text-center mt-5 text-gradient text-success">
                "So, do we all just stop using the internet?"
              </h3>
            </div>
            <div class="card-body">

                <p>
                    While we know that it's not possible for us to ask
                    people to just stop using the internet.
                    But, we can offset the carbon that's produced by the internet when people use it.
                    How? It's very simple & natural. PLANT TREES! {{ config('app.name') }} is a one stop
                    solution, where you can calculate, offset and certify yourself as a carbon-neutral
                    individual / business.

                    <br><br>

                    In a nutshell, that's exactly what {{ config('app.name') }} is about.
                </p>

                {{-- <h1 id="2050_counter" class="h1 text-muted text-center mt-2"></h1> --}}


            </div>
          </div>
      </div>


      <div class="col-md-8 mx-auto mt-4">
        <div class="swiper mySwiper shadow-lg">
          <div class="swiper-wrapper">

            <div
            style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
            class="swiper mySwiper"
          >
            <div
              class="parallax-bg"
              style="
                background-image: url('https://images.unsplash.com/photo-1586581277029-5769487f3881?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTR8fGFsaXNoYW58ZW58MHx8MHx8&ixlib=rb-1.2.1&w=1000&q=80');
              "
              data-swiper-parallax="-23%"
            ></div>
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="title" data-swiper-parallax="-300">
                  24T of O2 produced
                </div>
                <div class="subtitle" data-swiper-parallax="-200">Subtitle</div>
                <div class="text" data-swiper-parallax="-100">
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam
                    dictum mattis velit, sit amet faucibus felis iaculis nec. Nulla
                    laoreet justo vitae porttitor porttitor. Suspendisse in sem justo.
                    Integer laoreet magna nec elit suscipit, ac laoreet nibh euismod.
                    Aliquam hendrerit lorem at elit facilisis rutrum. Ut at
                    ullamcorper velit. Nulla ligula nisi, imperdiet ut lacinia nec,
                    tincidunt ut libero. Aenean feugiat non eros quis feugiat.
                  </p>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="title" data-swiper-parallax="-300">Slide 2</div>
                <div class="subtitle" data-swiper-parallax="-200">Subtitle</div>
                <div class="text" data-swiper-parallax="-100">
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam
                    dictum mattis velit, sit amet faucibus felis iaculis nec. Nulla
                    laoreet justo vitae porttitor porttitor. Suspendisse in sem justo.
                    Integer laoreet magna nec elit suscipit, ac laoreet nibh euismod.
                    Aliquam hendrerit lorem at elit facilisis rutrum. Ut at
                    ullamcorper velit. Nulla ligula nisi, imperdiet ut lacinia nec,
                    tincidunt ut libero. Aenean feugiat non eros quis feugiat.
                  </p>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="title" data-swiper-parallax="-300">Slide 3</div>
                <div class="subtitle" data-swiper-parallax="-200">Subtitle</div>
                <div class="text" data-swiper-parallax="-100">
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam
                    dictum mattis velit, sit amet faucibus felis iaculis nec. Nulla
                    laoreet justo vitae porttitor porttitor. Suspendisse in sem justo.
                    Integer laoreet magna nec elit suscipit, ac laoreet nibh euismod.
                    Aliquam hendrerit lorem at elit facilisis rutrum. Ut at
                    ullamcorper velit. Nulla ligula nisi, imperdiet ut lacinia nec,
                    tincidunt ut libero. Aenean feugiat non eros quis feugiat.
                  </p>
                </div>
              </div>
            </div>



            {{-- <div class="swiper-slide">
              <img src="https://www.inbar.int/wp-content/uploads/2017/01/bamboo-grove-750x552.jpg" />
            </div>
            <div class="swiper-slide">Slide 2</div>
            <div class="swiper-slide">Slide 3</div>
            <div class="swiper-slide">Slide 4</div>
            <div class="swiper-slide">Slide 5</div>
            <div class="swiper-slide">Slide 6</div>
            <div class="swiper-slide">Slide 7</div>
            <div class="swiper-slide">Slide 8</div>
            <div class="swiper-slide">Slide 9</div> --}}
          </div>
          <div class="swiper-button-next text-white"></div>
          <div class="swiper-button-prev text-white"></div>
          <div class="swiper-pagination text-white"></div>
        </div>
      </div>

    </div>
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
