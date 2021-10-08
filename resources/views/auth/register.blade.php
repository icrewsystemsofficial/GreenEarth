@extends('layouts.auth')

@section('content')
<main class="main-content  mt-0">
    <section>
        <div class="page-header min-vh-75">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                        <div class="card card-plain mt-8">
                            <div class="card-header pb-0 text-left bg-transparent">
                                <h3 class="font-weight-bolder text-success text-gradient">
                                    Register
                                </h3>
                                <p class="mb-0">
                                    Create a FREE account at {{ config('app.name') }} to access the portal
                                </p>
                            </div>

                            <div class="text-center">
                                <a href="{{ route('login') }}" type="button" class="btn btn-info btn-icon w-100">
                                    <span class="btn-inner--icon"><i class="fab fa-google"></i></span>
                                    <span class="btn-inner--text">Register with Google</span>
                                </a>
                            </div>

                            <div class="text-center mb-4">
                                <hr>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <label>Name</label>
                                    <div class="mb-3">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <label>Email</label>
                                    <div class="mb-3">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <label>Password</label>
                                    <div class="mb-3">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <label>Confirm Password</label>
                                    <div class="mb-3">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-success w-100 mt-4 mb-0">Register</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                @if (Route::has('login'))
                                <p class="mb-4 text-sm mx-auto">
                                    Already have an account?
                                    <a href="{{ route('login') }}" class="text-success text-gradient font-weight-bold">Login</a>
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                            <?php
                                // $imgurl = asset('img/curved-images/curved6.jpg');
                                $imgurl = 'https://images.unsplash.com/photo-1541855951501-fc42a85d86d3?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8ZGFyayUyMGdyZWVufGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1';
                            ?>
                            <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('{{$imgurl}}')"></div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
