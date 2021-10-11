@extends('layouts.embed')

@section('css')
<style>
    .ge-preheader {
        font-size: 0.75rem;
        font-weight: bold;
        opacity: 75%;
    }

    .ge-header {
        font-size: 2.5rem;
        font-weight: bold;
    }

    .ge-subtitle {
        font-size: 1rem;
        font-weight: thin;
        opacity: 85%;
    }
</style>
@endsection

@section('js')
<script>
    window.onload = function() {

        var ctx2 = document.getElementById("chart-line").getContext("2d");
    
    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);
    
    gradientStroke1.addColorStop(1, 'rgba(23, 173, 56,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(152, 236, 45,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(152, 236, 45,0)'); //purple colors
    
    new Chart(ctx2, {
      type: "line",
      data: {
        labels: [ "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Page Visitors",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#98ec2d",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            fill: true,
            data: [50, 40, 300, 250, 400, 230, 500],
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
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#b2b9bf',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#b2b9bf',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
    };
</script>
@endsection

@section('content')
<section>
    <div class="bg-gradient-success w-screen" style="height: 18rem;">
        <div class="container h-100 d-flex flex-column justify-content-center">
            <h4 class="text-white text-uppercase ge-preheader">Carbon Neutral &bull; Since 12 days ago</h4>
            <h1 class="text-white ge-header">icrewsystems.com</h1>
            <p class="text-white ge-subtitle">The site has earned the following certifications</p>
        </div>
    </div>
    <div class="container px-2" style="margin-top: -2rem;">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-header pb-0">
                        <h6 class="fw-bold">Site load</h6>
                        <p class="text-sm">
                            <i class="fa fa-arrow-up text-success"></i>
                            <span class="font-weight-bold">4% more</span> than yesterday
                        </p>
                    </div>
                    <div class="card-body p-3">
                        <div class="chart">
                            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header pb-0">
                        <h6 class="fw-bold">Statistics</h6>
                    </div>
                    <div class="card-body p-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis aperiam consequuntur aliquam, at facere corrupti dolor veritatis nihil possimus autem dolores hic veniam adipisci error neque, voluptatum quas iure. At obcaecati aperiam ab excepturi doloribus amet, quae dolorem sapiente, saepe inventore beatae ullam animi libero ut exercitationem quidem quibusdam quasi.
                    </div>
                </div>

            </div>
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="card-title fw-bold">
                                About GreenEarth
                            </div>
                        </div>
                        <div class="card-body pt-4">
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ab quisquam ipsa, facilis omnis sint ad alias eius est ducimus aspernatur!</p>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="card-title fw-bold">
                                Lorem Ipsum
                            </div>
                        </div>
                        <div class="card-body pt-4">
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ab quisquam ipsa, facilis omnis sint ad alias eius est ducimus aspernatur!</p>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="card-title fw-bold">
                                Lorem Ipsum
                            </div>
                        </div>
                        <div class="card-body pt-4">
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ab quisquam ipsa, facilis omnis sint ad alias eius est ducimus aspernatur!</p>
                        </div>
                    </div>
                </div>

            </div>
            
        </div>
    </div>
</section>
@endsection