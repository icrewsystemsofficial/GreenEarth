@extends('layouts.app')

@section('pagetitle')
@endsection

@section('css')
@endsection

@section('js')
<script>
  let clname = document.getElementById("dashboard-active-tag");
  clname.className += " active";
</script>

<script>
  var ctx2 = document.getElementById("chart-line").getContext("2d");

  var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

  gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
  gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
  gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

  var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

  gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
  gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
  gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors


  new Chart(ctx2, {
    type: "line",
    data: {
      labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      datasets: [{
          label: "Trees Planted",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#cb0c9f",
          borderWidth: 3,
          backgroundColor: gradientStroke1,
          data: [{{$data1}}],
          maxBarThickness: 6

        },
        {
          label: "Your Contribution",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#3A416F",
          borderWidth: 3,
          backgroundColor: gradientStroke2,
          data: [{{$data2}}],
          maxBarThickness: 6

        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false,
        },
      },
      tooltips: {
        enabled: true,
        mode: 'index',
        intersect: false,
      },
      hover: {
        mode: 'index',
        intersect: false,
      },
      scales: {
        yAxes: [{
          gridLines: {
            borderDash: [2],
            borderDashOffset: [2],
            color: '#dee2e6',
            zeroLineColor: '#dee2e6',
            zeroLineWidth: 1,
            zeroLineBorderDash: [2],
            drawBorder: false,
          },
          ticks: {
            suggestedMin: 0,
            suggestedMax: 500,
            beginAtZero: true,
            padding: 10,
            fontSize: 11,
            fontColor: '#adb5bd',
            lineHeight: 3,
            fontStyle: 'normal',
            fontFamily: "Open Sans",
          },
        }, ],
        xAxes: [{
          gridLines: {
            zeroLineColor: 'rgba(0,0,0,0)',
            display: false,
          },
          ticks: {
            padding: 10,
            fontSize: 11,
            fontColor: '#adb5bd',
            lineHeight: 3,
            fontStyle: 'normal',
            fontFamily: "Open Sans",
          },
        }, ],
      },
    },
  });
</script>
@endsection

@section('content')
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Trees Planted</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ $total_trees }}
                </h5>
              </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                  <i class="fas fa-tree text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Oxygen Produced</p>
                  <h5 class="font-weight-bolder mb-0">
                    200
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                  <i class="fas fa-globe-asia text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Trees Planted By You</p>
                  <h5 class="font-weight-bolder mb-0">
                      {{ $users_trees }}
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                  <i class="fas fa-seedling text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Oxygen Produced</p>
                  <h5 class="font-weight-bolder mb-0">
                    30
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                  <i class="fas fa-hand-holding-heart text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>  
    
  <div class="row mt-4 px-4">
    <div class="col-lg-5 mb-lg-0">
      <div class="card shadow-lg z-index-2">
        <div class="card-body p-1">
          <div class=" border-radius-lg py-2">
            <div class="text-center">
              <div class="h6 pt-3">
                Welcome back, {{$user}}!
              </div>
              <div style="text-align:center;padding:0.36em 0;">                     
                <!--a style="text-decoration:none;" href="https://www.zeitverschiebung.net/en/country/in"> </a--> 
                <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=en&size=medium&timezone=Asia%2FKolkata&show=hour_minute" width="100%" height="115" frameborder="0" seamless></iframe> 
              </div>                  
            </div>
          </div>                            
        </div>
      </div>
    </div>
    <div class="col-lg-7">
      <div class="card shadow-lg z-index-2" >
        <div class="card-body">
          <div class="border-radius-lg py-5">
            <div class="text-center h5">
              <div>
                &#8220;He who plants a <strong><span class="text-success">tree</span></strong>, plants a <strong><span class="text-success">hope</span></strong>.&#8221;
              </div>
              <div class="text-sm">
                - Lucy Larcom
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>       
  </div> 
  <div class="row mt-4 px-4">       
    <div class="col-lg-5">
      <div class="card shadow-lg">
        <div class="card-header p-0 mx-3 mt-3 position-relative z-index-2">
          <div class="d-block blur-shadow-image">
            <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1013&q=80" alt="img-blur-shadow" class="img-fluid shadow rounded-3">
          </div>         
        </div>
        <div class="card-body text-center">                                    
          <h6 class="h6">
            You have helped us make an incredible difference!
          </h6>
        </div>
      </div>
    </div>
    <div class="col-lg-7">
      <div class="card shadow-lg border-radius-lg  z-index-2">
        <div class="card-header pb-0 text-center">
          <h6>Trees Overview</h6>              
        </div>
        <div class="card-body p-3">
          <div class="chart">
            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
