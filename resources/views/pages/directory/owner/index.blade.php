@extends('layouts.app')

@section('pagetitle')
@endsection

@section('css')
@endsection

@section('js')
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
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Trees</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{$business->total_trees_in_grove}}
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
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Carbon Emissions</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{$business->total_carbon_emission}}
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
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Carbon Offset</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{$business->total_carbon_offset}}
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
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Went Carbon Neutral</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{$business->carbon_neutral_since->diffForHumans()}}
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

                    <h2 class="text-lg font-weight-bolder mb-0">Your Business</h2>

                    <br>

                    <div class="row">
                        <div class="col-sm-6">
                            <img src=<?php echo $logo = '/uploads/logos/' . $business->logo; ?> alt="Business logo" class="img-thumbnail rounded float-left max-width:50%">
                        </div>
                    </div>

                    <br>

                    <p class="text-md mb-0 text-capitalize"><span class="font-weight-bolder">Business Name: </span>{{$business->business_name}}</p>
                    <p class="text-md mb-0 text-capitalize"><span class="font-weight-bolder">Business Owner: </span>{{$business->business_owner}}</p>
                    <p class="text-md mb-0 text-capitalize"><span class="font-weight-bolder">Brand Name: </span>{{$business->brand_name}}</p>
                    <p class="text-md mb-0 text-capitalize"><span class="font-weight-bolder">Business Description: </span>{{$business->business_about}}</p>
                    <p class="text-md mb-0 text-capitalize"><span class="font-weight-bolder">Business HQ: </span>{{$business->location}}</p>
                    <p class="text-md mb-0 text-capitalize"><span class="font-weight-bolder">Employee Count: </span>{{$business->employee_count}}</p>
                    <p class="text-md mb-0 text-capitalize"><span class="font-weight-bolder">Business Founding Date: </span>{{$business->business_founding_date}}</p>
                    <br>
                    <p class="text-md mb-0"><span class="font-weight-bolder">Website Link: </span>{{$business->website_link}}</p>
                    <p class="text-md mb-0"><span class="font-weight-bolder">Facebook Profile: </span>{{$business->facebook_link}}</p>
                    <p class="text-md mb-0"><span class="font-weight-bolder">Instagram Profile: </span>{{$business->instagram_link}}</p>
                    <p class="text-md mb-0"><span class="font-weight-bolder">LinkedIn Profile: </span>{{$business->linkedin_link}}</p>

                    <form action="{{ route('portal.owner.edit', $business->id) }}" method="GET">

                        @csrf
                        {{ method_field('GET') }}
                        {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT"> --}}

                        <button type="submit" class="btn btn-sm block btn-success mt-3">
                            <span id="footer_action_button" class=""><i class="fa fa-save"></i> UPDATE</span>
                        </button>

                    </form>

                </div>
            </div>
        </div>

        <div class="col-md-6">

            <div class="card">
                <div class="card-body">

                    <h2 class="text-lg font-weight-bolder mb-0">Quick Access</h2>

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

                    <h2 class="text-lg font-weight-bolder mb-0">Past/Upcoming Invoices</h2>

                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body">

                    <h2 class="text-lg font-weight-bolder mb-0">Trees & Groves Planted</h2>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection