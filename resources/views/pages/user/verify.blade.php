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
                                <h5 class="font-weight-bolder ">
                                    <span class="text-success text-gradient">Hey {{ $user->name }}</span> 👋
                                </h5>
                                <p class="mb-0">
                                    Just a few steps away, fill out your details and you're good to go
                                </p>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('portal.admin.users.process', $user->id) }}">
                                    @csrf
                                    <label>Password <span class="text-danger">*</span></label>
                                    <div class="mb-3">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <label>Confirm Password <span class="text-danger">*</span></label>
                                    <div class="mb-3">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>


                                    <label>Organization</label>
                                    <div class="mb-3">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="organization" value="{{ $user->organization }}" required autocomplete="organization">

                                        @error('organization')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <label>Phone</label>
                                    <div class="mb-3">
                                        <input id="phone" type="name" class="form-control @error('phone') is-invalid @enderror" name="email" value="{{ $user->phone }}" required autocomplete="phone">

                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-success w-100 mt-4 mb-0">Finish</button>
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
