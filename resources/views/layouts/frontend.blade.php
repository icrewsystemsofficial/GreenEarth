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
 <!-- Navbar -->
    <div class="container position-sticky z-index-sticky top-0">
      <div class="row">
        <div class="col-12">
          <nav class="navbar navbar-expand-lg bg-white rounded-lg top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
            <div class="container-fluid">
              <a class="navbar-brand font-weight-bolder ms-sm-3 text-gradient text-success" href="{{ route('home.index') }}">
                {{ config('app.name') }}
              </a>
              <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon mt-2">
                  <span class="navbar-toggler-bar bar1"></span>
                  <span class="navbar-toggler-bar bar2"></span>
                  <span class="navbar-toggler-bar bar3"></span>
                </span>
              </button>
              <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
                <ul class="navbar-nav navbar-nav-hover w-100">
                    <li class="nav-item mx-2">
                        <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" id="dropdownMenuPages" data-bs-toggle="dropdown" aria-expanded="false">
                          About
                        </a>
                    </li>

                    <li class="nav-item mx-2">
                        <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" id="dropdownMenuPages" data-bs-toggle="dropdown" aria-expanded="false">
                          TrackMyTree
                        </a>
                    </li>

                    <li class="nav-item mx-2">
                        <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" id="dropdownMenuPages" data-bs-toggle="dropdown" aria-expanded="false">
                          Contact
                        </a>
                    </li>

                  <li class="nav-item dropdown dropdown-hover mx-2">
                    <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" id="dropdownMenuPages" data-bs-toggle="dropdown" aria-expanded="false">
                      About
                      <i class="fa fa-angle-down arrow ms-1"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-animation dropdown-md p-3 border-radius-lg mt-0 mt-lg-3" aria-labelledby="dropdownMenuPages">
                      <div class="d-none d-lg-block">
                        <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center px-0">
                          <div class="d-inline-block">
                            <div class="icon icon-shape icon-xs border-radius-md bg-gradient-success text-center me-2 d-flex align-items-center justify-content-center">
                              <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>shop </title>
                                <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                  <g id="Rounded-Icons" transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                      <g id="shop-" transform="translate(0.000000, 148.000000)">
                                        <path d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z" id="Path" opacity="0.598981585"></path>
                                        <path d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z" id="Path"></path>
                                      </g>
                                    </g>
                                  </g>
                                </g>
                              </svg>
                            </div>
                          </div>
                          Landing Pages
                        </h6>
                        <a href="./pages/about-us.html" class="dropdown-item border-radius-md">
                          <span class="ps-3">About Us</span>
                        </a>
                        <a href="./pages/contact-us.html" class="dropdown-item border-radius-md">
                          <span class="ps-3">Contact Us</span>
                        </a>
                        <a href="./pages/author.html" class="dropdown-item border-radius-md">
                          <span class="ps-3">Author</span>
                        </a>
                        <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center px-0 mt-3">
                          <div class="d-inline-block">
                            <div class="icon icon-shape icon-xs border-radius-md bg-gradient-success text-center me-2 d-flex align-items-center justify-content-center ps-0">
                              <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>office</title>
                                <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                  <g id="Rounded-Icons" transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                      <g id="office" transform="translate(153.000000, 2.000000)">
                                        <path d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z" id="Path" opacity="0.6"></path>
                                        <path d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z" id="Shape"></path>
                                      </g>
                                    </g>
                                  </g>
                                </g>
                              </svg>
                            </div>
                          </div>
                          Account
                        </h6>
                        <a href="./pages/sign-in.html" class="dropdown-item border-radius-md">
                          <span class="ps-3">Sign In</span>
                        </a>
                      </div>
                      <div class="d-lg-none">
                        <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center px-0">
                          <div class="d-inline-block">
                            <div class="icon icon-shape icon-xs border-radius-md bg-gradient-success text-center me-2 d-flex align-items-center justify-content-center">
                              <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>shop </title>
                                <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                  <g id="Rounded-Icons" transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                      <g id="shop-" transform="translate(0.000000, 148.000000)">
                                        <path d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z" id="Path" opacity="0.598981585"></path>
                                        <path d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z" id="Path"></path>
                                      </g>
                                    </g>
                                  </g>
                                </g>
                              </svg>
                            </div>
                          </div>
                          Landing Pages
                        </h6>
                        <a href="./pages/about-us.html" class="dropdown-item border-radius-md">
                          <span class="ps-3">About Us</span>
                        </a>
                        <a href="./pages/contact-us.html" class="dropdown-item border-radius-md">
                          <span class="ps-3">Contact Us</span>
                        </a>
                        <a href="./pages/author.html" class="dropdown-item border-radius-md">
                          <span class="ps-3">Author</span>
                        </a>
                        <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center px-0 mt-3">
                          <div class="d-inline-block">
                            <div class="icon icon-shape icon-xs border-radius-md bg-gradient-success text-center me-2 d-flex align-items-center justify-content-center ps-0">
                              <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>office</title>
                                <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                  <g id="Rounded-Icons" transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                      <g id="office" transform="translate(153.000000, 2.000000)">
                                        <path d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z" id="Path" opacity="0.6"></path>
                                        <path d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z" id="Shape"></path>
                                      </g>
                                    </g>
                                  </g>
                                </g>
                              </svg>
                            </div>
                          </div>
                          Account
                        </h6>
                        <a href="./pages/sign-in.html" class="dropdown-item border-radius-md">
                          <span class="ps-3">Sign In</span>
                        </a>
                      </div>
                    </div>
                  </li>
                  <li class="nav-item ms-lg-auto">
                    <a class="nav-link nav-link-icon me-2" href="https://github.com/icrewsystemsofficial/GreenEarth" target="_blank">
                      <i class="fa fa-github me-1"></i>
                      <p class="d-inline text-sm z-index-1 font-weight-bold" data-bs-toggle="tooltip" data-bs-placement="bottom" title="We're 100% open source">Contribute on Github</p>
                    </a>
                  </li>
                  <li class="nav-item my-auto ms-3 ms-lg-0">
                    <a href="{{ route('portal.index') }}" class="btn btn-sm  bg-gradient-success btn-round mb-0 me-1 mt-2 mt-md-0">
                        Login
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          <!-- End Navbar -->
        </div>
      </div>
    </div>
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
                  <a class="nav-link pe-1" href="https://www.facebook.com/CreativeTim/" target="_blank">
                    <i class="fab fa-facebook text-lg opacity-8"></i>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pe-1" href="https://twitter.com/creativetim" target="_blank">
                    <i class="fab fa-twitter text-lg opacity-8"></i>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pe-1" href="https://dribbble.com/creativetim" target="_blank">
                    <i class="fab fa-dribbble text-lg opacity-8"></i>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pe-1" href="https://github.com/creativetimofficial" target="_blank">
                    <i class="fab fa-github text-lg opacity-8"></i>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pe-1" href="https://www.youtube.com/channel/UCVyTG4sCw-rOvB9oHkzZD1w" target="_blank">
                    <i class="fab fa-youtube text-lg opacity-8"></i>
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
                    <a class="nav-link" href="{{ route('portal.index') }}" target="_blank">
                        About
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('portal.index') }}" target="_blank">
                      Partners
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('portal.index') }}" target="_blank">
                      Contributors
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('portal.index') }}" target="_blank">
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
                    <a class="nav-link" href="{{ route('portal.index') }}" target="_blank">
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
                  <a class="nav-link" href="https://www.creative-tim.com/terms" target="_blank">
                    Terms & Conditions
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="https://www.creative-tim.com/privacy" target="_blank">
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
                    by her <span class="font-weight-bolder">children</span>
                </span>
              </p>
            </div>
          </div>
        </div>
    </footer>
    <!--   Core JS Files   -->
    <script src="{{ asset('softui-design-system/assets/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('softui-design-system/assets/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('softui-design-system/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
    <script src="{{ asset('softui-design-system/assets/js/plugins/countup.min.js') }}"></script>
    <script src="{{ asset('softui-design-system/assets/js/plugins/choices.min.js') }}"></script>
    <script src="{{ asset('softui-design-system/assets/js/plugins/prism.min.js') }}"></script>
    {{-- <script src="{{ asset('softui-design-system/assets/js/plugins/highlight.min.js') }}"></script> --}}
    <!--  Plugin for Parallax, full documentation here: https://github.com/dixonandmoe/rellax -->
    <script src="{{ asset('softui-design-system/assets/js/plugins/rellax.min.js') }}"></script>
    <!--  Plugin for TiltJS, full documentation here: https://gijsroge.github.io/tilt.js/ -->
    <script src="{{ asset('softui-design-system/assets/js/plugins/tilt.min.js') }}"></script>
    <!--  Plugin for Selectpicker - ChoicesJS, full documentation here: https://github.com/jshjohnson/Choices -->
    <script src="{{ asset('softui-design-system/assets/js/plugins/choices.min.js') }}"></script>
    <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
    <script src="{{ asset('softui-design-system/assets/js/plugins/parallax.min.js') }}"></script>
    <!-- Control Center for Soft UI Kit: parallax effects, scripts for the example pages etc -->
    <!--  Google Maps Plugin    -->
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script> --}}
    <script src="{{ asset('softui-design-system/assets/js/soft-design-system.min.js') }}?v=1.0.5" type="text/javascript"></script>
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
<iframe style="width:100%;height:100%;position:absolute;bottom:0;right:0;z-index: 99999 !important;" src="{{ route('test') }}"></iframe>
  </body>

</html>
