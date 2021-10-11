<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">
    <!-- success Meta Tags -->
    <title>@yield('pageTitle', config('app.name')) - An initiative towards sustainable internet</title>
    <meta name="title" content="{{ config('app.name') }} - An initiative towards sustainable internet">
    <meta name="description" content="The internet is made up of servers that produce CO2 (carbon-dioxide), which is harmful for the atmosphere. For sustainable internet and to reduce YOUR carbon footprint, we plant the trees required to cover your entire CO2 emission. ">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ config('app.url') }}">
    <meta property="og:title" content="{{ config('app.name') }} - An initiative towards sustainable internet">
    <meta property="og:description" content="The internet is made up of servers that produce CO2 (carbon-dioxide), which is harmful for the atmosphere. For sustainable internet and to reduce YOUR carbon footprint, we plant the trees required to cover your entire CO2 emission. ">
    <meta property="og:image" content="{{ config('app.url') }}assets/meta-tags-16a33a6a8531e519cc0936fbba0ad904e52d35f34a46c97a2c9f6f7dd7d336f2.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ config('app.url') }}">
    <meta property="twitter:title" content="{{ config('app.name') }} - An initiative towards sustainable internet">
    <meta property="twitter:description" content="The internet is made up of servers that produce CO2 (carbon-dioxide), which is harmful for the atmosphere. For sustainable internet and to reduce YOUR carbon footprint, we plant the trees required to cover your entire CO2 emission. ">
    <meta property="twitter:image" content="{{ config('app.url') }}assets/meta-tags-16a33a6a8531e519cc0936fbba0ad904e52d35f34a46c97a2c9f6f7dd7d336f2.png">


    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{asset('css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="{{ asset('js/fontawesome.js') }}" crossorigin="anonymous"></script>
    <link href="{{asset('css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- CSS Files -->
    {{-- <link id="pagestyle" href="{{asset('css/soft-ui-dashboard.css')}}" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/css/soft-design-system-pro.min.css?v=1.0.8">
    @notifyCss
    @yield('css')
</head>

<body class="index-page">
   

    @yield('content')
    <!-- -------   END PRE-FOOTER 2 - simple social line w/ title & 3 buttons    -------- -->
    <footer class="footer pt-5 mt-5">
      <hr class="horizontal dark mb-5">
      <div class="container">
        <div class=" row">
          <div class="col-md-3 mb-4 ms-auto">
            <div>
              <h1 class="text-gradient text-success font-weight-bolder display-6">
                  {{ config('app.name') }}
              </h1>
            </div>
            <div>
              <h6 class="mt-3 mb-2 opacity-8">
                  Not able to contribute? We understand.
                  Atleast help us spread the word.
              </h6>
              <ul class="d-flex flex-row ms-n3 nav">
                <li class="nav-item">
                  <a class="nav-link pe-1" href="https://www.facebook.com/icrewsystems/" target="_blank">
                    <i class="fab fa-facebook text-lg opacity-8"></i>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pe-1" href="https://github.com/icrewsystemsofficial" target="_blank">
                    <i class="fab fa-github text-lg opacity-8"></i>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pe-1" href="https://www.instagram.com/icrewsystemsofficial/" target="_blank">
                    <i class="fab fa-instagram text-lg opacity-8"></i>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pe-1" href="https://www.linkedin.com/company/icrewsystems/" target="_blank">
                    <i class="fab fa-linkedin text-lg opacity-8"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-2 col-sm-6 col-6 mb-4">
            <div>
              <h6 class="text-gradient text-success text-sm mb-2">Company</h6>
              <ul class="flex-column ms-n3 nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.about') }}">
                        About
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.partners') }}">
                      Partners
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.contributors') }}">
                      Contributors
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.investors') }}">
                      Investors
                    </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-2 col-sm-6 col-6 mb-4">
            <div>
              <h6 class="text-gradient text-success text-sm">Resources</h6>
              <ul class="flex-column ms-n3 nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.announcements') }}" target="_blank">
                        Announcements
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('portal.index') }}" target="_blank">
                    TrackMyTree
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('portal.index') }}" target="_blank">
                    CarbonCalculator
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-2 col-sm-6 col-6 mb-4 me-auto">
            <div>
              <h6 class="text-gradient text-success text-sm">Legal</h6>
              <ul class="flex-column ms-n3 nav">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route ('home.terms-of-service') }}" target="_blank">
                    Terms Of Service
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route ('home.privacy-policy') }}" target="_blank">
                    Privacy Policy
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="https://www.creative-tim.com/license" target="_blank">
                    Licenses (EULA)
                  </a>
                </li>
              </ul>
            </div>
          </div>

          <div class="col-md-2 col-sm-6 col-6 mb-4 me-auto">
            <script type="text/javascript" src="//rf.revolvermaps.com/0/0/8.js?i=5s3ohnrfo80&amp;m=0c&amp;c=000000&amp;cr1=ffffff&amp;f=ubuntu&amp;l=49&amp;v0=10&amp;hi=30&amp;he=7&amp;hc=baff00&amp;cw=ffffff&amp;cb=baff00" async="async"></script>          </div>
          </div>

          <div class="col-12">
            <div class="text-center">
              <p class="my-4 text-sm">
                {{ config('app.name') }} &copy; {{ date('Y') }} | An Initiative by <a href="https://icrewsystems.com">icrewsystems</a>
                <br><br>
                <span class="text-lg">
                    Made with <i class="fas fa-heart text-danger text-gradient"></i> for <span class="text-success font-weight-bolder">Mother Earth</span>,
                    by her <a class="font-weight-bolder" href="{{ route('home.contributors') }}"><u>children</u></a>
                </span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <script src="{{asset('js/core/popper.min.js')}}"></script>
    <script src="{{asset('js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('js/plugins/smooth-scrollbar.min.js')}}"></script>
    <script src="{{asset('js/plugins/chartjs.min.js')}}"></script>
    <script type="text/javascript">
      if (document.getElementById('state1')) {
        const countUp = new CountUp('state1', document.getElementById("state1").getAttribute("countTo"));
        if (!countUp.error) {
          countUp.start();
        } else {
          console.error(countUp.error);
        }
      }
      if (document.getElementById('state2')) {
        const countUp1 = new CountUp('state2', document.getElementById("state2").getAttribute("countTo"));
        if (!countUp1.error) {
          countUp1.start();
        } else {
          console.error(countUp1.error);
        }
      }
      if (document.getElementById('state3')) {
        const countUp2 = new CountUp('state3', document.getElementById("state3").getAttribute("countTo"));
        if (!countUp2.error) {
          countUp2.start();
        } else {
          console.error(countUp2.error);
        };
      }
    </script>
    @yield('js')
  </body>

</html>
