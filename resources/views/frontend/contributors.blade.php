@extends('layouts.frontend')

@section('content')
<header class="bg-gradient-dark">
    <div class="page-header min-vh-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 mx-auto my-auto">
                    <h3 class="h3 text-success text-gradient">
                        GreenEarth
                    </h3>
                    <h5 class="h5 text-white">
                        Carbon-neutral IT infrastructure is not a luxury but a necessity!
                    </h5>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="slice pt-0">
    <div class="container position-relative zindex-100">
        <div class="row">
            <div class="col-lg-6 mx-auto col-sm-12 mt-n5">
                <div class="card shadow move-on-hover">
                    <div class="card-body justify-content-start">
                        <div class="p-3 d-flex">
                            <span class="me-4">
                                <i class="fas fa-check-circle fa-2x text-success"></i>
                            </span>
                            <div>
                                <h6 class="h6">
                                    100% Open Source Software
                                </h6>
                                <p class="text-sm">
                                    We have kept the app OSS so that anoyone has the liberty to take part in the development.
                                </p>
                            </div>            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="slice py-6" id="sct-next">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="card shadow-lg">
                    <div class="px-5 py-2">
                        <h2 class="h3 lh-180 text-danger font-weight-bold mt-3 mb-2">
                            Problem Statement
                        </h2>
                        <p class="mb-2">
                        Planting is essential to help sequester carbon emissions. It is hard for people to do so because of their busy lifestyles. 
                        So they turn to organizations to plant trees on their behalf through funding. But, since there is no face-to-face interaction 
                        involved in online donation, the trust factor goes down significantly.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-sm-12">
                <div class="card shadow-lg">
                    <div class="px-5 py-2">
                        <h2 class="h3 lh-180 text-success font-weight-bold mt-3 mb-2">
                            Solution
                        </h2>
                        <p class="mb-2">
                        Transparency! What if the user can track their tree and its health and receive badges for their contribution? 
                        It will not only give the user a sense of trust, but it will also give a sense of happiness for being a part 
                        of a carbon-neutral society. It would also encourage them to contribute more. More information on the 
                        <span class="text-success"> <a href="https://greenearth.icrewsystems.com/" target="_blank">official website</a> </span>
                        </p>
                    </div>
                </div>
            </div>


            <div class="col-lg-12 col-sm-12 py-3">
                <div class="row">
                    <div class="col-sm-6 text-center">
                        <div class="card shadow-lg rounded-lg border-0 mb-sm-0">
                            <div class="p-4 text-center text-sm-left">
                                <h3 class="h4 mb-0">
                                    <span class="counter h2 font-weight-bolder" data-from="0" data-to="{{ $stars }}" data-speed="3000" data-refresh-interval="200"></span>
                                    {{ $stars }}
                                </h3>
                                <p class="text-muted mb-0">
                                    Stars
                                </p>
                            </div>
                        </div>

                        <a id="repo-button" href="https://github.com/icrewsystemsofficial/GreenEarth" class="mt-2 btn btn-block btn-dark" target="_blank">
                            Go to Github Repository
                        </a>

                    </div>
                    <div class="col-sm-6 text-center">
                        <div class="card shadow-lg rounded-lg border-0 mb-sm-0">
                            <div class="p-4 text-center text-sm-left">
                                <h3 class="h4 mb-0">
                                    <span class="counter h2 font-weight-bolder" data-from="0" data-to="{{ $commits }}" data-speed="3000" data-refresh-interval="200"></span>
                                    {{ $commits }}
                                </h3>
                                <p class="text-muted mb-0">
                                    Commits
                                </p>
                            </div>
                        </div>

                        <a href="" data-fancybox="group" data-caption="Donation page" class="mt-2 btn btn-block btn-info">
                            View development previews
                        </a>

                    </div>
                </div>


                <div class="card mt-3">
                    <!-- Title -->
                    <div class="card-header">
                        <h4 class="mb-0 h4">Contributions & Commits
                            <br>
                            <p>
                                This data is directly and periodically streamed from Github API.
                            </p>
                        </h4>
                    </div>

                    <!-- List group -->
                    <ul class="list-unstyled" style="height:450px; overflow-y:scroll;">
                        @php
                            $commit_count = 0;
                            $contributors = array();
                        @endphp
                        @foreach ($commits_all as $commit)
                            
                            @php

                                if($commit_count > 15) {
                                    continue;
                                }


                            @endphp
                           <li>
                                <a href="{{$commit['html_url']}}" class="list-group-item list-group-item-action" target="_blank">
                                    @php
                                        if($commit['author']) {
                                            $avatar = $commit['author']['avatar_url'];
                                        } else {
                                            $avatar = 'https://ui-avatars.com/api/?background=fafafa&color=1989b5&name=' . $commit['commit']['committer']['name'];
                                        }

                                        $commit_date = \carbon\Carbon::parse($commit['commit']['committer']['date']);
                                        $commit_count++;

                                        $contributors[$commit['commit']['committer']['name']] = array(
                                            'avatar' => $avatar,
                                            'name' => $commit['commit']['committer']['name'],
                                        );
                                    @endphp
                                    <div class="d-flex justify-content-between" data-toggle="tooltip" data-placement="top" data-title="{{ $commit_date->diffForHumans() }}">
                                        <div>
                                            <img alt="Image placeholder" src="{{ $avatar }}" class="avatar rounded-circle" />
                                        </div>
                                        <div class="flex-fill ml-3">
                                            <div class="h6 text-sm mb-0">
                                                {{ $commit['commit']['committer']['name'] }}
                                                <small class="text-muted text-end" style="float:right;">
                                                    {{ $commit_date->format('d-m-Y') }}
                                                </small>
                                            </div>
                                            <p class="text-sm lh-140 mb-0">
                                                {{ $commit['commit']['message'] }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                           </li> 
                           @endforeach
                    <!-- Card footer -->
                    <div class="card-footer py-3 text-center border-0 position-relative">
                        <a href="https://github.com/icrewsystemsofficial/GreenEarth" type=" btn btn-block btn-dark" data-scroll-to data-scroll-to-offset="85" class="text-xs ls-1 text-uppercase font-weight-bold stretched-link">
                            See all commits on Github Repository
                        </a>
                    </div>
                </div>

                <div class="mb-4">
                    <!-- Avatars -->
                    <div class="row mx-auto p-3">

                        @foreach ($contributors as $user)
                            <div class="col-auto text-center mb-3 px-2">
                                <img alt="Image placeholder" src="{{ $user['avatar'] }}" class="avatar  rounded-circle">
                                <a href="#" class="d-block text-xs mt-1 stretched-link text-muted">
                                    {{ $user['name'] }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


            </div>
        </div>
    </div>
</section>

@endsection
