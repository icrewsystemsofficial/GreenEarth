@extends('layouts.frontend')

@section('content')
<section class="my-7">
    <div class="container">
        <div class="row">
            <div class="col-md-8 my-auto">
                <h2 class="display-1 text-gradient text-success">
                    {{$business->business_name}}
                </h2>
                <p class="lead ml-2 mt-3">
                    We're still working on that page.
                    You can help us boost the development by
                    sponsoring us or directly contributing on Github.
                </p>
            </div>
            <div class="col-lg-4 my-auto position-relative">
                <img class="w-100 position-relative" src="https://i.pinimg.com/originals/a9/82/96/a9829622e6a46338bf3fdf3e76872772.jpg" alt="404-error">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Today's Money</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        $53,000
                                        <span class="text-success text-sm font-weight-bolder">+55%</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
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
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Today's Users</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        2,300
                                        <span class="text-success text-sm font-weight-bolder">+3%</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
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
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">New Clients</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        +3,462
                                        <span class="text-danger text-sm font-weight-bolder">-2%</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
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
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Sales</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        $103,430
                                        <span class="text-success text-sm font-weight-bolder">+5%</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">

                        <h2>Business Details</h2>

                        <br>

                        dgfdgdgdfg



                    </div>
                </div>
            </div>

            <div class="col-md-6">

                <div class="card">
                    <div class="card-body">

                        Quick Access

                        <a href="#" class="btn btn-sm block btn-info mt-3">
                            View Contributions
                        </a>

                        <a href="#" class="btn btn-sm block btn-success">
                            View Linked Trees
                        </a>

                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">

                        Past/Upcoming Invoices

                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">

                        Trees & Groves Planted

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection