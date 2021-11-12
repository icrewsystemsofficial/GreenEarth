@extends('layouts.frontend')
@section('content')
<section class="header-2">
    {{--  <div class="page-header min-vh-75" style="background-image: url('{{ asset('softui-design-system/assets/img/curved-images/curved.jpg') }}')">  --}}
        <div class="page-header min-vh-75" style="background-image: url('{{ asset('/img/curved-images/curved_temp.jpg') }}')">
        <div class="container">
        <div class="row">
            <div class="col-lg-8 text-center mx-auto">
                {{-- <h1 class="text-white pt-3 mt-n5 h2">
                    We produced <span class="text-success text-gradient">59* Litres</span> of O<sup>2</sup> today

                    <br>
                    <small class="text-sm">
                        to compensate for the CO<sup>2</sup> produced by websites all over the world.
                    </small>
                </h1> --}}

                <h1 class="text-white pt-3 mt-n5 h1">
                    Carbon neutrality is a <span class="text-success text-gradient">necessity</span>
                    <br>
                    <small class="text-sm">
                        If you have a website, you are an unconscious contributor
                        for Global CO<sub>2</sub> emission
                    </small>
                </h1>
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
            <use xlink:href="#gentle-wave" x="48" y="16" fill="rgba(255,255,255, 1)" />
          </g>
        </svg>
      </div>
    </div>
  </section>
  <section class="pt-3 pb-4" id="count-stats">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 z-index-2 border-radius-xl mt-n10 mx-auto py-3 bg-white shadow-blur">

          <div class="row">
              <div class="col-md-12">
                <div class="p-3 text-center">
                    <h1 class="mt-3 h4">
                        Don't worry, you can go carbon-neutral in just <br> <span class="h1 text-success text-gradient font-weight-bolder">3 steps</span>
                    </h1>
                    <p class="text-sm">
                        We analyze your carbon footprint, calculate the required
                        correction, plant trees on your behalf & certify you.
                    </p>
                </div>

                <div class="px-6 py-3">
                    <form action="{{ route('home.calculate') }}" class="form" method="GET">
                        <div class="row">
                            <div class="col-md-9">

                                @if(session('errors'))
                                    <div class="alert alert-danger text-white" role="alert">
                                        <strong>Whoops</strong> {{ session('errors') }}
                                    </div>
                                @endif

                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="website" placeholder="www.google.com" id="website_inputarea" onfocus="append_https();" />
                                    </div>
                                    <p class="mt-1 text-muted text-sm" id="url_suggestion" style="display: none;">
                                        <i class="fa fa-exclamation-triangle"></i> Make sure to include <strong>https:// or http://</strong> along with your URL.
                                    </p>


                                    <script>
                                        function append_https() {
                                            var website_input = document.getElementById('website_input');
                                            var url_suggestion = document.getElementById('url_suggestion');

                                            url_suggestion.style.display = 'block';
                                        }
                                    </script>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-dark text-success btn-gradient block">
                                    Calculate
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <p class="text-sm p-3 text-center">
                    Don't let your company or customers be a part of an unconscious crime against mother earth.
                </p>

              </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="py-7">
    <div class="container">
      <div class="row">
        <div class="col-md-12 ms-auto me-auto text-center">
          <div class="p-3 info-hover-warning">
            <div class="icon icon-shape bg-gradient-success shadow icon-shape-circle text-success">
              <i class="fa fa-cogs" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="text-gradient text-success mb-0 mt-4 h1">
            How do we calculate?
          </h3>
          <h3>How To Handle Them</h3>
          <p>We’re constantly trying to express ourselves and actualize our dreams. Don't stop.</p>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-md-4 ms-auto my-auto">
          <div class="cursor-pointer">
            <div class="card card-background tilt" data-tilt="" style="will-change: transform; transform: perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1);">
              <div class="full-background" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/team-working.jpg')"></div>
              <div class="card-body pt-7 text-center">
                <div class="icon icon-lg up mb-3">
                  <svg width="40px" height="40px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <title>chart-pie-35</title>
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <g transform="translate(-1720.000000, -742.000000)" fill="#FFFFFF" fill-rule="nonzero">
                        <g transform="translate(1716.000000, 291.000000)">
                          <g transform="translate(4.000000, 451.000000)">
                            <path d="M21.6666667,18.3333333 L39.915,18.3333333 C39.11,8.635 31.365,0.89 21.6666667,0.085 L21.6666667,18.3333333 Z" opacity="0.602864583"></path>
                            <path d="M20.69,21.6666667 L7.09833333,35.2583333 C10.585,38.21 15.085,40 20,40 C30.465,40 39.0633333,31.915 39.915,21.6666667 L20.69,21.6666667 Z"></path>
                            <path d="M18.3333333,19.31 L18.3333333,0.085 C8.085,0.936666667 0,9.535 0,20 C0,24.915 1.79,29.415 4.74166667,32.9016667 L18.3333333,19.31 Z"></path>
                          </g>
                        </g>
                      </g>
                    </g>
                  </svg>
                </div>
                <h1 class="text-white up mb-0">Search and Discover!</h1>
                <p class="lead up">Website visitors</p>
                <button type="button" class="btn btn-white btn-lg mt-3 up">Get Started</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-5 me-auto my-auto ms-md-5">
          <div class="p-3 info-horizontal d-flex">
            <div>
              <h5>1. Listen to Social Conversations</h5>
              <p>
                Gain access to the demographics, psychographics, and location of unique people who are interested and talk about your brand.
              </p>
            </div>
          </div>
          <div class="p-3 info-horizontal d-flex">
            <div>
              <h5>2. Performance Analyze</h5>
              <p>
                Unify data from Facebook, Instagram, Twitter, LinkedIn, and Youtube to gain rich insights from easy-to-use reports.
              </p>
            </div>
          </div>
          <div class="p-3 info-horizontal d-flex">
            <div>
              <h5>3. Social Conversions</h5>
              <p>
                Track actions taken on your website that originated from social, and understand the impact on your bottom line.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-8 mx-auto text-center">
          <h6 class="opacity-5">
              You're in good company, over 2,000 companies are carbon-neutral
              <br>
              (LOGOS FOR REPRESENTATION PURPOSES ONLY, WILL BE SWAPPED SOON)
          </h6>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-2 col-md-4 col-6 mb-4">
          <img class="w-100 opacity-9" src="{{ asset('/img/logos/visa.png') }}" alt="logo">
        </div>
        <div class="col-lg-2 col-md-4 col-6 mb-4">
          <img class="w-100 opacity-9" src="{{ asset('/img/logos/nasa.png') }}" alt="logo">
        </div>
        <div class="col-lg-2 col-md-4 col-6 mb-4">
          <img class="w-100 opacity-9" src="{{ asset('/img/logos/netflix.png') }}" alt="logo">
        </div>
        <div class="col-lg-2 col-md-4 col-6 mb-4">
          <img class="w-100 opacity-9" src="{{ asset('/img/logos/spotify.png') }}" alt="logo">
        </div>
        <div class="col-lg-2 col-md-4 col-6 mb-4">
          <img class="w-100 opacity-9" src="{{ asset('/img/logos/mastercard.png') }}" alt="logo">
        </div>
        <div class="col-lg-2 col-md-4 col-6 mb-4">
          <img class="w-100 opacity-9" src="{{ asset('/img/logos/vodafone.png') }}" alt="logo">
        </div>
      </div>
    </div>
  </div>




  <section class="py-7 bg-gradient-dark position-relative overflow-hidden">
    {{-- <div class="position-absolute w-100 z-inde-1 top-0 mt-n3">
      <svg width="100%" viewBox="0 -2 1920 157" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <title>wave-down</title>
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g fill="#FFFFFF" fill-rule="nonzero">
            <g>
              <path d="M0,60.8320331 C299.333333,115.127115 618.333333,111.165365 959,47.8320321 C1299.66667,-15.5013009 1620.66667,-15.2062179 1920,47.8320331 L1920,156.389409 L0,156.389409 L0,60.8320331 Z" transform="translate(960.000000, 78.416017) rotate(180.000000) translate(-960.000000, -78.416017) "></path>
            </g>
          </g>
        </g>
      </svg>
    </div> --}}
    <img src="{{ asset('/img/curved-images/white_waves.png') }}" class="position-absolute opacity-6 h-100 top-0 d-md-block d-none" alt="avatar">
    <div class="container pt-6 pb-5 position-relative z-index-3">
      <div class="row">
        <div class="col-md-6 mx-auto text-center">
          <span class="badge badge-white text-dark mb-2">Testimonials</span>
          <h2 class="text-white mb-3">Some thoughts from our clients</h2>
          <h5 class="text-white font-weight-light">
            If you’re selected for them you’ll also get three tickets, opportunity to access Investor Office Hours and Mentor Hours and much more all for free.
          </h5>
        </div>
      </div>
      <div class="row mt-8">
        <div class="col-md-4 mb-md-0 mb-7">
          <div class="card">
            <div class="text-center mt-n5 z-index-1">
              <div class="position-relative">
                <div class="blur-shadow-avatar">
                  <img class="avatar avatar-xxl shadow-lg" src="{{ asset('/img/avatar/avatar1.png') }}" alt="avatar">
                </div>
              <div class="colored-shadow start-0 end-0 mx-auto avatar-xxl" style="background-image: url(&quot;../assets/img/team-2.jpg&quot;);"></div></div>
            </div>
            <div class="card-body text-center pb-0">
              <h4 class="mb-0">Olivia Harper</h4>
              <p>@oliviaharper</p>
              <p class="mt-2">
                The connections you make at Web Summit are unparalleled, we met users all over the world.
              </p>
            </div>
            <div class="card-footer text-center pt-2">
              <div class="mx-auto">
                <svg class="opacity-2" width="60px" height="60px" viewBox="0 0 270 270" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <title>quote-down</title>
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <path d="M107.000381,49.033238 C111.792099,48.01429 115.761022,48.6892564 116.625294,50.9407629 C117.72393,53.8028077 113.174473,58.3219079 107.017635,60.982801 C107.011653,60.9853863 107.00567,60.9879683 106.999688,60.990547 C106.939902,61.0219589 106.879913,61.0439426 106.820031,61.0659514 C106.355389,61.2618887 105.888177,61.4371549 105.421944,61.5929594 C88.3985192,68.1467602 80.3242628,76.9161885 70.3525495,90.6906738 C60.0774843,104.884196 54.9399518,119.643717 54.9399518,134.969238 C54.9399518,138.278158 55.4624127,140.716309 56.5073346,142.283691 C57.2039492,143.328613 57.9876406,143.851074 58.8584088,143.851074 C59.7291771,143.851074 61.0353294,143.241536 62.7768659,142.022461 C68.3497825,138.016927 75.4030052,136.01416 83.9365338,136.01416 C93.8632916,136.01416 102.658051,140.063232 110.320811,148.161377 C117.983572,156.259521 121.814952,165.88151 121.814952,177.027344 C121.814952,188.695638 117.417572,198.970703 108.622813,207.852539 C99.828054,216.734375 89.1611432,221.175293 76.6220807,221.175293 C61.9931745,221.175293 49.3670351,215.166992 38.7436627,203.150391 C28.1202903,191.133789 22.8086041,175.024577 22.8086041,154.822754 C22.8086041,131.312012 30.0359804,110.239421 44.490733,91.6049805 C58.2196377,73.906272 74.3541002,59.8074126 102.443135,50.4450748 C102.615406,50.3748509 102.790055,50.3058192 102.966282,50.2381719 C104.199241,49.7648833 105.420135,49.3936487 106.596148,49.1227802 L107,49 Z M233.000381,49.033238 C237.792099,48.01429 241.761022,48.6892564 242.625294,50.9407629 C243.72393,53.8028077 239.174473,58.3219079 233.017635,60.982801 C233.011653,60.9853863 233.00567,60.9879683 232.999688,60.990547 C232.939902,61.0219589 232.879913,61.0439426 232.820031,61.0659514 C232.355389,61.2618887 231.888177,61.4371549 231.421944,61.5929594 C214.398519,68.1467602 206.324263,76.9161885 196.352549,90.6906738 C186.077484,104.884196 180.939952,119.643717 180.939952,134.969238 C180.939952,138.278158 181.462413,140.716309 182.507335,142.283691 C183.203949,143.328613 183.987641,143.851074 184.858409,143.851074 C185.729177,143.851074 187.035329,143.241536 188.776866,142.022461 C194.349783,138.016927 201.403005,136.01416 209.936534,136.01416 C219.863292,136.01416 228.658051,140.063232 236.320811,148.161377 C243.983572,156.259521 247.814952,165.88151 247.814952,177.027344 C247.814952,188.695638 243.417572,198.970703 234.622813,207.852539 C225.828054,216.734375 215.161143,221.175293 202.622081,221.175293 C187.993174,221.175293 175.367035,215.166992 164.743663,203.150391 C154.12029,191.133789 148.808604,175.024577 148.808604,154.822754 C148.808604,131.312012 156.03598,110.239421 170.490733,91.6049805 C184.219638,73.906272 200.3541,59.8074126 228.443135,50.4450748 C228.615406,50.3748509 228.790055,50.3058192 228.966282,50.2381719 C230.199241,49.7648833 231.420135,49.3936487 232.596148,49.1227802 L233,49 Z" fill="#48484A" fill-rule="nonzero" transform="translate(135.311778, 134.872794) scale(-1, -1) translate(-135.311778, -134.872794) "></path>
                  </g>
                </svg>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-md-0 mb-7">
          <div class="card">
            <div class="text-center mt-n5 z-index-1">
              <div class="position-relative">
                <div class="blur-shadow-avatar">
                  <img class="avatar avatar-xxl shadow-lg" src="{{ asset('/img/avatar/avatar2.png') }}" alt="avatar">
                </div>
              <div class="colored-shadow start-0 end-0 mx-auto avatar-xxl" style="background-image: url(&quot;../assets/img/team-3.jpg&quot;);"></div></div>
            </div>
            <div class="card-body text-center pb-0">
              <h4 class="mb-0">Simon Lauren</h4>
              <p>@simonlaurent</p>
              <p class="mt-2">
                The networking at Web Summit is like no other European tech conference. Everything is amazing.
              </p>
            </div>
            <div class="card-footer text-center pt-2">
              <div class="mx-auto">
                <svg class="opacity-2" width="60px" height="60px" viewBox="0 0 270 270" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <title>quote-down</title>
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <path d="M107.000381,49.033238 C111.792099,48.01429 115.761022,48.6892564 116.625294,50.9407629 C117.72393,53.8028077 113.174473,58.3219079 107.017635,60.982801 C107.011653,60.9853863 107.00567,60.9879683 106.999688,60.990547 C106.939902,61.0219589 106.879913,61.0439426 106.820031,61.0659514 C106.355389,61.2618887 105.888177,61.4371549 105.421944,61.5929594 C88.3985192,68.1467602 80.3242628,76.9161885 70.3525495,90.6906738 C60.0774843,104.884196 54.9399518,119.643717 54.9399518,134.969238 C54.9399518,138.278158 55.4624127,140.716309 56.5073346,142.283691 C57.2039492,143.328613 57.9876406,143.851074 58.8584088,143.851074 C59.7291771,143.851074 61.0353294,143.241536 62.7768659,142.022461 C68.3497825,138.016927 75.4030052,136.01416 83.9365338,136.01416 C93.8632916,136.01416 102.658051,140.063232 110.320811,148.161377 C117.983572,156.259521 121.814952,165.88151 121.814952,177.027344 C121.814952,188.695638 117.417572,198.970703 108.622813,207.852539 C99.828054,216.734375 89.1611432,221.175293 76.6220807,221.175293 C61.9931745,221.175293 49.3670351,215.166992 38.7436627,203.150391 C28.1202903,191.133789 22.8086041,175.024577 22.8086041,154.822754 C22.8086041,131.312012 30.0359804,110.239421 44.490733,91.6049805 C58.2196377,73.906272 74.3541002,59.8074126 102.443135,50.4450748 C102.615406,50.3748509 102.790055,50.3058192 102.966282,50.2381719 C104.199241,49.7648833 105.420135,49.3936487 106.596148,49.1227802 L107,49 Z M233.000381,49.033238 C237.792099,48.01429 241.761022,48.6892564 242.625294,50.9407629 C243.72393,53.8028077 239.174473,58.3219079 233.017635,60.982801 C233.011653,60.9853863 233.00567,60.9879683 232.999688,60.990547 C232.939902,61.0219589 232.879913,61.0439426 232.820031,61.0659514 C232.355389,61.2618887 231.888177,61.4371549 231.421944,61.5929594 C214.398519,68.1467602 206.324263,76.9161885 196.352549,90.6906738 C186.077484,104.884196 180.939952,119.643717 180.939952,134.969238 C180.939952,138.278158 181.462413,140.716309 182.507335,142.283691 C183.203949,143.328613 183.987641,143.851074 184.858409,143.851074 C185.729177,143.851074 187.035329,143.241536 188.776866,142.022461 C194.349783,138.016927 201.403005,136.01416 209.936534,136.01416 C219.863292,136.01416 228.658051,140.063232 236.320811,148.161377 C243.983572,156.259521 247.814952,165.88151 247.814952,177.027344 C247.814952,188.695638 243.417572,198.970703 234.622813,207.852539 C225.828054,216.734375 215.161143,221.175293 202.622081,221.175293 C187.993174,221.175293 175.367035,215.166992 164.743663,203.150391 C154.12029,191.133789 148.808604,175.024577 148.808604,154.822754 C148.808604,131.312012 156.03598,110.239421 170.490733,91.6049805 C184.219638,73.906272 200.3541,59.8074126 228.443135,50.4450748 C228.615406,50.3748509 228.790055,50.3058192 228.966282,50.2381719 C230.199241,49.7648833 231.420135,49.3936487 232.596148,49.1227802 L233,49 Z" fill="#48484A" fill-rule="nonzero" transform="translate(135.311778, 134.872794) scale(-1, -1) translate(-135.311778, -134.872794) "></path>
                  </g>
                </svg>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-md-0 mb-7">
          <div class="card">
            <div class="text-center mt-n5 z-index-1">
              <div class="position-relative">
                <div class="blur-shadow-avatar">
                  <img class="avatar avatar-xxl shadow-lg" src="{{ asset('/img/avatar/avatar3.png') }}" alt="avatar">
                </div>
              <div class="colored-shadow start-0 end-0 mx-auto avatar-xxl" style="background-image: url(&quot;../assets/img/team-4.jpg&quot;);"></div></div>
            </div>
            <div class="card-body text-center pb-0">
              <h4 class="mb-0">Lucian Eurel</h4>
              <p>@luciaeurel</p>
              <p class="mt-2">
                Web Summit will increase your appetite, your inspiration, your motivation and your network.
              </p>
            </div>
            <div class="card-footer text-center pt-2">
              <div class="mx-auto">
                <svg class="opacity-2" width="60px" height="60px" viewBox="0 0 270 270" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <title>quote-down</title>
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <path d="M107.000381,49.033238 C111.792099,48.01429 115.761022,48.6892564 116.625294,50.9407629 C117.72393,53.8028077 113.174473,58.3219079 107.017635,60.982801 C107.011653,60.9853863 107.00567,60.9879683 106.999688,60.990547 C106.939902,61.0219589 106.879913,61.0439426 106.820031,61.0659514 C106.355389,61.2618887 105.888177,61.4371549 105.421944,61.5929594 C88.3985192,68.1467602 80.3242628,76.9161885 70.3525495,90.6906738 C60.0774843,104.884196 54.9399518,119.643717 54.9399518,134.969238 C54.9399518,138.278158 55.4624127,140.716309 56.5073346,142.283691 C57.2039492,143.328613 57.9876406,143.851074 58.8584088,143.851074 C59.7291771,143.851074 61.0353294,143.241536 62.7768659,142.022461 C68.3497825,138.016927 75.4030052,136.01416 83.9365338,136.01416 C93.8632916,136.01416 102.658051,140.063232 110.320811,148.161377 C117.983572,156.259521 121.814952,165.88151 121.814952,177.027344 C121.814952,188.695638 117.417572,198.970703 108.622813,207.852539 C99.828054,216.734375 89.1611432,221.175293 76.6220807,221.175293 C61.9931745,221.175293 49.3670351,215.166992 38.7436627,203.150391 C28.1202903,191.133789 22.8086041,175.024577 22.8086041,154.822754 C22.8086041,131.312012 30.0359804,110.239421 44.490733,91.6049805 C58.2196377,73.906272 74.3541002,59.8074126 102.443135,50.4450748 C102.615406,50.3748509 102.790055,50.3058192 102.966282,50.2381719 C104.199241,49.7648833 105.420135,49.3936487 106.596148,49.1227802 L107,49 Z M233.000381,49.033238 C237.792099,48.01429 241.761022,48.6892564 242.625294,50.9407629 C243.72393,53.8028077 239.174473,58.3219079 233.017635,60.982801 C233.011653,60.9853863 233.00567,60.9879683 232.999688,60.990547 C232.939902,61.0219589 232.879913,61.0439426 232.820031,61.0659514 C232.355389,61.2618887 231.888177,61.4371549 231.421944,61.5929594 C214.398519,68.1467602 206.324263,76.9161885 196.352549,90.6906738 C186.077484,104.884196 180.939952,119.643717 180.939952,134.969238 C180.939952,138.278158 181.462413,140.716309 182.507335,142.283691 C183.203949,143.328613 183.987641,143.851074 184.858409,143.851074 C185.729177,143.851074 187.035329,143.241536 188.776866,142.022461 C194.349783,138.016927 201.403005,136.01416 209.936534,136.01416 C219.863292,136.01416 228.658051,140.063232 236.320811,148.161377 C243.983572,156.259521 247.814952,165.88151 247.814952,177.027344 C247.814952,188.695638 243.417572,198.970703 234.622813,207.852539 C225.828054,216.734375 215.161143,221.175293 202.622081,221.175293 C187.993174,221.175293 175.367035,215.166992 164.743663,203.150391 C154.12029,191.133789 148.808604,175.024577 148.808604,154.822754 C148.808604,131.312012 156.03598,110.239421 170.490733,91.6049805 C184.219638,73.906272 200.3541,59.8074126 228.443135,50.4450748 C228.615406,50.3748509 228.790055,50.3058192 228.966282,50.2381719 C230.199241,49.7648833 231.420135,49.3936487 232.596148,49.1227802 L233,49 Z" fill="#48484A" fill-rule="nonzero" transform="translate(135.311778, 134.872794) scale(-1, -1) translate(-135.311778, -134.872794) "></path>
                  </g>
                </svg>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="position-absolute w-100 bottom-0">
      <svg width="100%" viewBox="0 -1 1920 166" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <title>wave-up</title>
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g transform="translate(0.000000, 5.000000)" fill="#FFFFFF" fill-rule="nonzero">
            <g transform="translate(0.000000, -5.000000)">
              <path d="M0,70 C298.666667,105.333333 618.666667,95 960,39 C1301.33333,-17 1621.33333,-11.3333333 1920,56 L1920,165 L0,165 L0,70 Z"></path>
            </g>
          </g>
        </g>
      </svg>
    </div>
  </section>

  <section class="pt-3 pb-5 bg-gray-100">
    <div class="container">
      <div class="row my-5">
        <div class="col-md-6 mx-auto text-center">
          <h3>Frequently Asked Questions</h3>
        </div>
      </div>

      <div class="accordion accordion-flush" id="accordionFlushExample">
        @php ($i = 1)
        @foreach ($faqs as $faq)
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-heading{{ $i }}">
            <button class="accordion-button collapsed p-3" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $i }}" aria-expanded="false" aria-controls="flush-collapse{{ $i }}">
                {{$faq->title}}
            </button>
          </h2>
          <div id="flush-collapse{{ $i }}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{ $i }}" data-bs-parent="#accordionFlushExample">
            <div class="p-4">
                {{$faq->body}}
            </div>
          </div>
        </div>
        @php ($i+=1)
        @endforeach
      </div>
    </div>
  </section>



  <div class="pt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 ms-auto">

            <p class="h5 text-muted">
                <span class="text-gradient text-success"> <span id="state2" countTo="2093">0</span>+ websites </span> certified,
                <span class="text-success"><span id="state3" countTo="2093"></span> Litres</span> of Oxygen produced.
            </p>

          <h4 class="mb-1">Thank you for your support!</h4>
          <p class="lead mb-0">We deliver the best web products</p>
        </div>
        <div class="col-lg-5 me-lg-auto my-lg-auto text-lg-right mt-5">
          <a href="https://twitter.com/intent/tweet?text=Check%20Soft%20UI%20Design%20System%20made%20by%20%40CreativeTim%20%23webdesign%20%23designsystem%20%23bootstrap5&url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-design-system" class="btn btn-info mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/soft-ui-design-system" class="btn btn-success mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1"></i> Share
          </a>
          <a href="https://www.pinterest.com/pin/create/button/?url=https://www.creative-tim.com/product/soft-ui-design-system" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-pinterest me-1"></i> Pin it
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection
