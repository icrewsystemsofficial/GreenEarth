@extends('layouts.frontend')
@section('content')
<header class="position-relative">
    <div class="page-header min-vh-50" style="background-image: url('{{ asset('softui-design-system/assets/img/curved-images/curved14.jpg') }}">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8 mx-auto">
                <h1 class="text-success text-gradient h2 text-center">
                    {{ config('app.name') }} Carbon Calculator
                </h1>
            </div>
        </div>
      </div>
    </div>
    <div class="position-absolute w-100 z-index-1 bottom-0">
      <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
        <defs>
          <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
        </defs>
        <g class="moving-waves">
          <use xlink:href="#gentle-wave" x="48" y="-1" fill="rgba(255,255,255,0.40"></use>
          <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.35)"></use>
          <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.25)"></use>
          <use xlink:href="#gentle-wave" x="48" y="8" fill="rgba(255,255,255,0.20)"></use>
          <use xlink:href="#gentle-wave" x="48" y="13" fill="rgba(255,255,255,0.15)"></use>
          <use xlink:href="#gentle-wave" x="48" y="16" fill="rgba(255,255,255,0.95"></use>
        </g>
      </svg>
    </div>
  </header>


<section class="pt-3 pt-md-5 pb-md-5 pt-lg-7 bg-white">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 mb-lg-0 mb-3">
          <ul class="nav flex-column bg-gray-100 border-radius-lg p-3 position-sticky top-1">
            <li class="nav-item">
                <a class="nav-link text-dark" data-scroll="" href="#general-terms">
                  <div class="icon me-2">
                    <i class="fa fa-info-circle text-success"></i>
                  </div>
                  Overview
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark" data-scroll="" href="#cookies">
                  <div class="icon me-2">
                    <i class="fa fa-info-circle text-success"></i>
                  </div>
                  Metrics
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link text-dark" data-scroll="" href="#cookies">
                  <div class="icon me-2">
                    <i class="fa fa-info-circle text-success"></i>
                  </div>
                  Footprint
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link text-dark" data-scroll="" href="#cookies">
                  <div class="icon me-2">
                    <i class="fa fa-info-circle text-success"></i>
                  </div>
                  Go carbon neutral
                </a>
              </li>
          </ul>

        </div>
        <div class="col-lg-9">
          <div class="card shadow-lg mb-5">
            <div class="card-header {{ $color }} p-5 position-relative">
              <h3 class="text-white mb-0 h3">
                  {{ $url }}
              </h3>
                <p class="text-white opacity-8 mb-4">
                  Carbon Footprint HEAVY
                </p>
              <div class="position-absolute w-100 z-index-1 bottom-0 ms-n5">
                <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto" style="height:7vh;min-height:50px;">
                  <defs>
                    <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
                  </defs>
                  <g class="moving-waves">
                    <use xlink:href="#gentle-wave" x="48" y="-1" fill="rgba(255,255,255,0.40"></use>
                    <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.35)"></use>
                    <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.25)"></use>
                    <use xlink:href="#gentle-wave" x="48" y="8" fill="rgba(255,255,255,0.20)"></use>
                    <use xlink:href="#gentle-wave" x="48" y="13" fill="rgba(255,255,255,0.15)"></use>
                    <use xlink:href="#gentle-wave" x="48" y="16" fill="rgba(255,255,255,0.95"></use>
                  </g>
                </svg>
              </div>
            </div>
            <div class="card-body p-5">
                <p id="general-terms">

                    <label for="website_age" class="form-label h4">How old is your website?</label>
                    <p class="ml-2 mb-2">
                        Your domain is <strong>{{ strtolower($domain['domain_age']) }} old</strong>
                    </p>
                    <select name="website_age" id="website_age" class="form-control">
                        <option value="null" selected disabled>Choose your website age</option>
                        @for ($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}">{{ $i }} years old</option>
                        @endfor
                        <option value="6">5+ years old</option>
                        <option value="7">I'm not sure</option>
                    </select>

                    <div class="form-text ml-2">
                        <small>
                            This will help us calculate your lifetime carbon footprint
                        </small>
                    </div>


                    <div class="mt-5">
                        <label for="website_host" class="form-label h4">Where is your website hosted?</label>
                        <p class="ml-2 mb-2">
                            As per WHOIS, your website is hosted in <strong>{{ $domain['domain_country'] }}</strong>.
                        </p>
                        <select name="website_host" id="website_host" class="form-control">
                            <option value="null" selected disabled>WIP: Add list of all countries here</option>
                            <option value="{{ $domain['domain_country'] }}">{{ $domain['domain_country'] }}</option>
                        </select>

                        <div class="form-text ml-2">
                            <small>
                                Each country has a different CO2e rating. This will help us calculate
                                a more accurate footprint.
                            </small>
                        </div>
                    </div>


                    <div class="mt-5">
                        <label for="website_host" class="form-label h4">Do you have Google Analytics enabled on your website?</label>
                        <p class="ml-2 mb-2">
                            If yes, go to your Google Analytics dashboard > Aquisition > Overview > (Choose last month) > Export as CSV
                        </p>
                        <input type="file" class="form-control" accept="text/csv">

                        <div class="form-text ml-2">
                            <small>
                                Your report will help us analyze your website traffic
                            </small>
                        </div>
                    </div>


                    <div class="mt-5">
                        <label for="website_host" class="form-label h4">
                            How much traffic does your site have?
                        </label>
                    </div>

                    <div class="mt-5">
                        <label for="website_host" class="form-label h4">
                            Is your host whitelisted?
                        </label>
                    </div>

                    <div class="mt-5">
                        <label for="website_host" class="form-label h4">
                            Are you on Shared Hosting / VPS / Self Hosted Server?
                        </label>
                    </div>

                    <div class="mt-5">
                        <h1 class="h2">
                            <span class="text-danger text-gradient">924 Kg CO2e</span>/Year
                        </h1>
                        <p>
                            Your CO2e is HIGH, in 5 years, you've produced 4.5 Tn CO2e, and in the
                            coming years, you will be accelerating climate change by 2.3% globally :(
                        </p>
                    </div>

                    <div class="mt-4">
                        <a href="#" class="btn bg-dark text-white">
                            E-mail my report
                        </a>

                        <a href="#" class="btn bg-gradient-success">
                            Offset your Carbon emissions and get certified
                        </a>
                    </div>

                    <div class="mt-5">
                        (once user clicks on Offset Emissions, will show this)
                        <h1 class="h2">
                            <span class="h4">It will take <span class="text-info text-gradient">45 trees</span> </span>
                            <br>
                            to produce <span class="text-gradient text-success">~ 924L O<sub>2</sub></span>
                        </h1>
                        <p>
                            to offset your CO<sub>2</sub>e.
                        </p>
                    </div>

                    <div class="mt-4">
                        <a href="#" class="btn bg-gradient-success">
                            Pay { X } INR via RazoryPay
                        </a>
                    </div>





                </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
