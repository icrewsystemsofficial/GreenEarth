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
                                <h3 class="font-weight-bolder text-info text-gradient">Welcome {{$data->name}}!</h3>
                                <p class="mb-0">Set up password to complete account initialisation</p>
                            </div>
                            <div class="card-body">
                                <form method="post" action="/users/setup/add_user">
                                    @csrf
                                    {{-- <label>Name</label> --}}
                                    <div class="mb-3">
                                        <input id="name" placeholder="" type="hidden" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $data->name }}" required autocomplete="name" autofocus >

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    {{-- <label>Email</label> --}}
                                    <div class="mb-3">
                                        <input id="email" type="hidden" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$data->email }}" required autocomplete="email" >

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <div class="mb-3">
                                        <input id="role" type="hidden" class="form-control @error('role') is-invalid @enderror" name="role" value="{{$data->role }}" required autocomplete="role" >

                                        @error('role')
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
                                    <label for="conf-password">Confirm Password</label>
                                    <div class="mb-3">
                                        <input id="password_confirmation" type="password" class="form-control @error('conf-password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-primary w-100 mt-4 mb-0">Setup my Account</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                @if (Route::has('login'))
                                <p class="mb-4 text-sm mx-auto">
                                    Already have an account?
                                    <a href="{{ route('login') }}" class="text-primary text-gradient font-weight-bold">Login</a>
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                            <?php $imgurl = asset('img/curved-images/curved6.jpg'); ?>
                            <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('{{$imgurl}}')"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
