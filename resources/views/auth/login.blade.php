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
                                <h3 class="font-weight-bolder text-success text-gradient">Login</h3>
                                <p class="mb-0">
                                    Login to your {{ config('app.name') }} account to access the dashboard.
                                </p>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <a href="{{ route('login') }}" type="button" class="btn btn-info btn-icon w-100">
                                        <span class="btn-inner--icon"><i class="fab fa-google"></i></span>
                                        <span class="btn-inner--text">Login with Google</span>
                                    </a>
                                </div>

                                <div class="text-center mb-4">
                                    <hr>
                                </div>

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <label>Email</label>
                                    <div class="mb-3">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <label>Password</label>
                                    <div class="mb-3">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">Remember me</label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-success w-100 mt-4 mb-0">Login</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                @if (Route::has('register'))
                                    <p class="mb-4 text-sm mx-auto">
                                        Don't have an account?
                                        <a href="{{ route('register') }}" class="text-success font-weight-bold">Register</a>
                                    </p>
                                @endif
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-success" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
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
    </section>
</main>
@endsection
