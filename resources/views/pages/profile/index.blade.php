@extends('layouts.app')

@section('css')
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
@endsection
@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>


    <script>
        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginFileValidateType,
            FilePondPluginFileValidateSize,
            FilePondPluginImagePreview,
            FilePondPluginImageResize,
        );
        const inputElement = document.querySelector('input[id="avatar"]');
        const pond = FilePond.create(inputElement, {
            labelIdle: `Drag & Drop your picture or <span class="filepond--label-action">Browse</span>`,
            imagePreviewHeight: 200,
            imageCropAspectRatio: '2:2',
            imageResizeTargetWidth: 200,
            imageResizeTargetHeight: 200,
            stylePanelLayout: 'compact',
            styleLoadIndicatorPosition: 'center bottom',
            styleProgressIndicatorPosition: 'right bottom',
            styleButtonRemoveItemPosition: 'left bottom',
            styleButtonProcessItemPosition: 'right bottom',
            acceptedFileTypes: ['image/png', 'image/jpeg'],
            labelFileTypeNotAllowed: '.JPG or .PNG files only',
            maxFileSize: '5MB',
        });
        FilePond.setOptions({
            server: {
                url: '/portal/upload',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        });
    </script>

    <script>
        $('#edit').ready(function() {
            $("#edit").css("opacity", "0");
        });
        $("#edit").hover(function() {
            $(this).css("opacity", "1");
        }, function() {
            $(this).css("opacity", "0");
        });
    </script>
@endsection

@section('content')
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg bg-transparent shadow-none position-absolute px-4 w-100 z-index-2">
            <div class="container-fluid py-1">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 ps-2 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="text-white opacity-5" href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Profile</li>
                    </ol>
                    <h6 class="text-white font-weight-bolder ms-2">Profile</h6>
                </nav>
                <div class="collapse navbar-collapse me-md-0 me-sm-4 mt-sm-0 mt-2" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group">
                        </div>
                    </div>
                    <ul class="navbar-nav justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                        </li>
                        <li class="nav-item d-xl-none ps-3 pe-0 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0">
                                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                    <div class="sidenav-toggler-inner">
                                        <i class="sidenav-toggler-line bg-white"></i>
                                        <i class="sidenav-toggler-line bg-white"></i>
                                        <i class="sidenav-toggler-line bg-white"></i>
                                    </div>
                                </a>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
                <span class="mask bg-gradient-success opacity-6"></span>
            </div>
            <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{  asset($user->profile_picture()) }}" alt="{{ $user->name }}'s avatar"
                                    class="w-100 border-radius-lg shadow-sm display-block">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                    class="fas fa-upload position-absolute bottom-7 end-7 text-dark" id="edit"></i></button>
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{ $user->name }}
                            </h5>
                            @if ($user->email_verified_at != null)
                                <span class="badge bg-success mb-3">
                                    <i class="fa fa-check-circle"></i> Account Verified
                                </span>
                            @else
                                <span class="badge bg-danger mb-3">
                                    <i class="fa fa-exclamation-circle"></i> Unverified Account
                                </span>

                                <form action="{{ route('portal.myprofile.verify') }}" method="POST">
                                    @csrf
                                    <input id="verify_submit_button" type="submit" value="Click here to verify your account"
                                        class="btn btn-sm btn-primary" />
                                </form>
                            @endif

                            <p class="mb-0 font-weight-bold text-sm">
                                @if ($user->organization != null)
                                    {{ $user->organization }}
                                @else
                                    <span class="text-danger">
                                        Your account is not linked to any organization
                                    </span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Profile Information</h5>
                        </div>
                        <form action="{{ route('portal.myprofile.save', auth()->user()->id) }}" method="POST">
                            @csrf
                            <div class="card-body pt-2">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Name</label>
                                            <input type="name" name="name" class="form-control"
                                                id="exampleFormControlInput1" value="{{ $user->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control"
                                                id="exampleFormControlInput1" value="{{ $user->email }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Organization</label>
                                            <input type="text" name="organization" class="form-control"
                                                id="exampleFormControlInput1" placeholder="Enter organization "
                                                value="{{ $user->organization }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Phone</label>
                                            <input type="text" name="phone" class="form-control"
                                                id="exampleFormControlInput1" placeholder="Enter phone number "
                                                value="{{ $user->phone }}">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="card-footer " style="margin-top: -20px ;">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('portal.store_avatar_db', auth()->user()->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <label>Upload Profile Photo</label>
                        <input type="file" class="form-control" id="avatar" name="avatar" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-primary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-success">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
