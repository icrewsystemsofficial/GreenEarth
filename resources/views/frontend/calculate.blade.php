@extends('layouts.frontend')

@section('css')

@endsection

@section('js')
<script src="{{ asset('js/alpine.js') }}" defer></script>
<script src="{{ asset('js/axios.js') }}"></script>
@endsection

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

            <button type="button" id="staticBackdrop_button" class="btn btn-sm btn-success w-100 mb-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                How does it work?
            </button>

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



        <!-- Modal -->
        <div class="modal show fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title h4" id="staticBackdropLabel">
                    How does this work?
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    To calculate the Carbon Footprint of your website, {{ config('app.name') }} uses a
                    complex algorithm, which relies on WHOIS data (publically available information). In
                    the rare case that your website's WHOIS server is not listed with {{ config('app.name') }}'s TLD database,
                    you'd have to enter the following data manually.
                    <br>
                    <br>
                    <div class="ml-4">
                        <li>
                            Your website's age
                        </li>
                        <li>
                            Your website's hosting provider
                        </li>
                        <li>
                            Your hosting provider's data-center location
                        </li>
                        <li>
                            Your monthly average traffic
                        </li>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Understood</button>
                </div>
            </div>
            </div>
        </div>


        <div class="col-lg-9">
          <div class="card shadow-lg mb-5">
            <div class="card-header bg-dark p-5 position-relative">

              <h3 class="text-white mb-0 h3">
                  {{ $domain->domain }}
              </h3>

                {{-- <p class="text-white opacity-8 mb-4">
                  Carbon Footprint: Calculating...
                </p> --}}

                <span class="flex mb-4">
                    <div class="mt-1 opacity-6">
                        <img src="https://c.tenor.com/I6kN-6X7nhAAAAAj/loading-buffering.gif" alt="" style="width: 25px; height: auto;">
                    </div>
                    <div class="ml-2 py-1 lead-4 text-white opacity-6">
                        Processing...
                    </div>
                </span>
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

                    <p>
                        <span class="h3">
                            USER FLOW
                        </span>


                        <ol>
                            <li class="mb-2">
                                When the page loads, it should show a loading animation. Which should be statefully controlled
                                by Alpine.
                            </li>
                            <li class="mb-2">
                                This page should be loaded with the website from GET variable: website, (without the URI scheme: http - https).
                            </li>
                            <li class="mb-2">
                                Should check for WHOIS records and website ping via API, if either or one returns error,
                                then tell the user about the problem and ask them to enter the details.
                            </li>
                            <li class="mb-2">
                                They can proceed for NO WHOIS data, but if the site cannot resolve, they shouldn't be able to proceed.
                                Instead, they should be encouraged to buy a separate forest.
                            </li>
                            <li class="mb-2">
                                Based on WHOIS API data, we should have
                                1. Website age.
                                <br>
                                2. Server location (along with it's CO2 factor / kWh), should show a leaflet map widget based on the country coordinates (provided in WHOIS API Response)
                                <br>
                                3. Server - DELL 640 will be our fallback one. (for this, we need to compare with our database based on the <code>cloud_provider, data_center & country</code> from WHOIS API response values)
                                <br>
                                4. Server Energy - Again, for this, we'll need to manually verify from our database. Only for customers who's WHOIS:cloud_provider = "", (which means they're using an in-house server) the
                                energy should be editable. Rest for all, we assume the highest consuming factor.
                                <br>
                                5. Analytics. We should ask them to enter their average users. OR, we should ask them to upload Google Analytics report CSV, should
                                show a guide on a popup, guiding them on how to get it done.
                                <br>
                                6. We should show and explain the significance of each information by HIGH, MED and LOW. We should also include good UI animations
                                to make the app look smooth.
                            </li>
                        </ol>
                    </p>

                    <p class="mt-2 mb-2" x-data="alpine_validateurl()" x-init="validateUrl()">
                        <span x-html="icon" x-transition.delay.500ms></span>
                        <span x-html="text" x-transition.delay.500ms></span>
                        <script>

                            function alpine_validateurl() {
                                return {
                                    icon: '<i class="fa fa-spinner fa-spin text-warning"></i>',
                                    text: 'Trying to check if {{ $domain->domain }} is valid ....',
                                    validateUrl() {

                                        setTimeout(() => {
                                            this.icon = '<i class="fa fa-check-circle text-success"></i>';
                                            this.text = 'Valid URL';
                                        }, 1000)
                                    }
                                }
                            }
                        </script>
                    </p>

                    <p class="mt-2 mb-2">
                        @if($domain->code == 200) <i class="fa fa-check-circle text-success"></i> @else <i class="fa fa-times-circle text-danger"></i> @endif
                        {{ $domain->message }} {{ $domain->source }}.
                    </p>

                    <p class="mt-2 mb-2" x-data="alpine_pingserver()" x-init="pingServer()">
                        <span x-html="icon" x-transition.delay.500ms></span>
                        <span x-html="ping" x-transition.delay.500ms></span>
                        <script>

                            function alpine_pingserver() {
                                return {
                                    icon: '<i class="fa fa-spinner fa-spin text-warning"></i>',
                                    ping: 'Trying to check if {{ $domain->domain }} is valid ....',
                                    pingServer() {
                                        setTimeout(() => axios.get('{{ route('api.v1.calculate.ping', $domain->domain) }}')
                                        .then((result) => {
                                            if(result.data.code == 200) {
                                                this.icon = '<i class="fa fa-check-circle text-success"></i>';
                                            } else {
                                                this.icon = '<i class="fa fa-times-circle text-danger"></i>';
                                            }
                                            this.ping = result.data.message;
                                        })
                                        .catch((error) => {
                                            alert('Whoops! There was an error while getting the latency from {{ route("api.v1.calculate.ping", $domain->domain) }}')
                                            console.log(error);
                                        }), 5000)
                                    }
                                }
                            }
                        </script>
                    </p>


                    <div x-data="alpine_websiteage()">
                        <label for="website_age" class="form-label h4">How old is your website?</label>
                        <p class="ml-2 mb-2">

                            @php
                                $created_date = \Carbon\Carbon::parse($domain->data_filtered['creation_date']);
                            @endphp

                            As per records, your domain was
                            created <strong>{{ $created_date->diffForHumans() }}, on {{ $created_date->format('dS F, Y')}}</strong>
                        </p>

                        @php
                            $age = $created_date->age;
                        @endphp


                        <input id="website_age" type="text" class="form-control" x-show="textfield" x-bind:value="age" disabled>

                        <select name="website_age" x-model="age" class="form-control" x-show="selector">
                            <option value="0">Less than 1 years old</option>
                            @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" @if($i == $age) selected @endif>{{ $i }} years old</option>
                            @endfor
                            <option value="6">More than 5+ years</option>
                            <option value="NOT_SURE">I'm not sure</option>
                        </select>


                        <button class="mt-2 btn btn-sm btn-info" @click="toggleChange" x-html="buttonText">
                            Change
                        </button>

                        <div class="form-text ml-2">
                            <small>
                                This will help us calculate your lifetime carbon footprint
                            </small>
                        </div>

                        <script>
                            function alpine_websiteage() {
                                return {
                                    age: '{{ $created_date->age }}',
                                    selector: false,
                                    textfield: true,
                                    buttonText: "Change",
                                    toggleChange() {
                                        this.selector = !this.selector;
                                        this.textfield = !this.textfield;

                                        if(this.textfield == true) {
                                            this.buttonText = "Change";
                                            this.age = selector.value;
                                        } else {
                                            this.buttonText = "Update";
                                        }
                                    },
                                }
                            }
                        </script>

                    <div class="mt-5">
                        <label for="website_host" class="form-label h4">Where is your website hosted?</label>
                        <p class="ml-2 mb-2">
                            As per WHOIS, your website is hosted in <strong>{{ $domain->country }}</strong>
                        </p>
                        <select name="website_host" id="website_country" class="form-control">
                            <?php
                            $countries = App\Models\Country::all();
                            ?>

                            @foreach ($countries as $country)
                                <option value="{{ $country->code }}" @if($country->name == $domain->country) selected @endif>{{ $country->name }}</option>
                            @endforeach
                            {{-- <option value="{{ $domain['domain_country'] }}">{{ $domain['domain_country'] }}</option> --}}
                        </select>

                        <div class="form-text ml-2">
                            <small>
                                Each country has a different CO2e rating. This will help us calculate
                                a more accurate footprint.
                            </small>
                        </div>
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
                            How much traffic does your site have? (per month)
                        </label>

                        <input type="number" class="form-control" name="website_traffic" placeholder="1000" value="10000">
                    </div>

                    <div class="mt-5">
                        <label for="website_host" class="form-label h4">
                            Is your host whitelisted?
                        </label>

                        <select name="website_provider" id="" class="form-control">

                            @php
                                $providers = \App\Helpers\CO2Helper::whitelisted_hosting_providers();
                            @endphp

                            <option value="not_whitelisted">I use a custom solution</option>
                            @foreach ($providers as $provider)
                                <option value="{{ $provider['name'] }}">
                                    {{ $provider['name'] }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    {{-- <div class="mt-5">
                        <label for="website_host" class="form-label h4">
                            Are you on Shared Hosting / VPS / Self Hosted Server?
                        </label>
                    </div> --}}



                    <div x-data="start_calculating" x-init="fetchFromAPI">
                        <div class="mt-5">
                            <h1 class="h2">
                                <span class="text-danger text-gradient">
                                     <span x-text="kgco2e">--</span>
                                     Kg CO2e
                                </span>/Year
                            </h1>


                            <p>
                                In your website's lifetime, you would have produced
                                <span class="text-muted" x-text="lifetime_consumptions">LIFETIME_CONSUMPTIONS</span> kg of CO<sub>2</sub>
                            </p>
                            <h1 class="h2">
                                <span class="h4">It will take <span class="text-info text-gradient"> <span x-text="trees_required"></span> trees</span> </span>
                                <br>
                                to produce <span class="text-gradient text-success"><span x-text="oxygen"></span> KgO<sub>2</sub></span>
                            </h1>
                            <p>
                                to offset your CO<sub>2</sub>e.
                            </p>

                            {{-- <button class="btn btn-sm btn-success" @click="fetchFromAPI">
                                Fetch
                            </button> --}}
                        </div>

                        <div class="mt-4">
                            <a href="#" class="btn bg-dark text-white">
                                Get detailed report
                            </a>

                            <a href="#" class="btn bg-gradient-success">
                                Offset your CO<sub>2</sub>e
                            </a>
                        </div>

                        <input type="hidden" id="website_server" name="website_server" value="2019_R640_Dell_Server" >
                        <input type="hidden" id="website_server_type" name="website_server_type" value="cloud_nongreen" >
                        <input type="hidden" id="website_traffic" name="website_traffic" value="1000" >
                        <script>
                            function start_calculating() {
                                return {
                                    kgco2e: '0',
                                    lifetime_consumptions: '0',
                                    trees_required: '0',
                                    website_age: null,
                                    oxygen: '0',
                                    age:  null,
                                    country: null,
                                    server: null,
                                    server_type: null,
                                    traffic: null,



                                    fetchFromAPI() {
                                        this.age = document.getElementById('website_age').value;
                                        this.country = document.getElementById('website_country').value;
                                        this.server = document.getElementById('website_server').value;
                                        this.server_type = document.getElementById('website_server_type').value;
                                        this.traffic = document.getElementById('website_traffic').value;

                                        axios.post("{{ route('api.v1.calulcate.offset') }}", {
                                            age: this.age,
                                            country: this.country,
                                            server: this.server,
                                            server_type: this.server_type,
                                            traffic: this.traffic,
                                        }).then((response => {
                                            console.log(response.data);
                                            this.kgco2e = response.data.specific_consumption_per_year;
                                            this.lifetime_consumptions = response.data.lifetime_consumptions;
                                            this.trees_required = response.data.trees_required;
                                            this.oxygen = response.data.oxygen;
                                        }))
                                        .catch((error) => {
                                            alert('Whoops! API error while trying to calculate.');
                                            console.log(error);
                                        })
                                    }
                                }
                            }
                        </script>
                    </div>
                </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
