@extends('layouts.frontend')

@section('content')
<section class="my-10">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 my-auto">
            <h1 class="display-1 text-bolder text-gradient text-danger">
              Work in progress
            </h1>
            <p class="lead ml-3">
                We're still working on that page.
                You can help us boost the development by
                sponsoring us or directly contributing on Github.

            </p>
            <a href="{{ route('home.index') }}" class="btn bg-gradient-dark mt-4">
                Go home
            </a>
        </div>
        <div class="col-lg-6 my-auto position-relative">
          <img class="w-100 position-relative" src="https://i.pinimg.com/originals/a9/82/96/a9829622e6a46338bf3fdf3e76872772.jpg" alt="404-error">
        </div>
      </div>
    </div>
  </section>
@endsection
