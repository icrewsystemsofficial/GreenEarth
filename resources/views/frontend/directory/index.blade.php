@extends('layouts.frontend')

@section('content')
<section class="my-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 my-auto">
                <h1 class="display-1 text-bolder text-gradient text-success">
                    Carbon-neutral Business Directory
                </h1>
                <p class="lead ml-2 mt-3">
                    We're still working on that page.
                    You can help us boost the development by
                    sponsoring us or directly contributing on Github.
                </p>
            </div>
            <!--div class="col-lg-6 my-auto position-absolute">
                <img class="w-50 position-absolute" src="https://i.pinimg.com/originals/a9/82/96/a9829622e6a46338bf3fdf3e76872772.jpg" alt="404-error">
            </div-->
        </div>

        <div class="row my-10">
            <div class="col-lg-12 z-index-2 border-radius-xl mx-auto mt-n5 py-3 bg-white shadow-blur">

                <div class="row">
                    <div class="col-md-12">
                        <div class="p-3 text-center">
                            <h1 class="h4">
                                Champions of a greener Earth
                            </h1>
                        </div>
                    </div>
                </div>

                @foreach ($directory as $business)
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="/screenshots/env_file.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$business->business_name}}</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                <div class="col-md-3 position-relative">
                                    <form action="{{ route('home.directory.show', $business_name_slugs[$business->business_name]) }}" method="get">
                                        <button type="submit" class="btn btn-dark text-success btn-gradient block">
                                            Explore <?php echo $business_name_slugs[$business->business_name] ?>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
@endsection