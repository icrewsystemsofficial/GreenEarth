@extends('layouts.app')

{{--@section('css')--}}
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap5.min.css"> --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"> --}}
{{--<link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">--}}
{{--@notifyCss --}}

{{--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>--}}
{{--@endsection--}}

{{-- @section('js')--}}
{{--<script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>--}}
{{--<script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js"></script>--}}
{{-- <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script> --}}
{{--<script>--}}
{{-- $(document).ready(function() {--}}
{{-- $('#employees_table').DataTable({--}}
{{-- language: {--}}

{{-- paginate: {--}}
{{-- // remove previous & next text from pagination--}}
{{-- previous: '<i class="fas fa-chevron-left"></i>',--}}
{{-- next: '<i class="fas fa-chevron-right"></i>'--}}
{{-- }--}}
{{-- }--}}
{{-- });--}}
{{-- });--}}

{{-- --}}
{{--</script>--}}
{{--@endsection --}}
@section('css')
{{-- <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" /> --}}
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
    <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
      <span class="mask bg-gradient-success opacity-6"></span>
    </div>
    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
      <div class="row gx-4">
        <div class="col-auto">
          <div class="avatar avatar-xl position-relative">
            <img src="{{ $user->profile_picture() }}" alt="{{ $user->name }}'s avatar" class="w-100 border-radius-lg shadow-sm">
            <input type="file" class="absolute" id="avatar" name="filepond" multiple data-max-file-size="3MB" data-max-files="3"/>
          </div>
        </div>
        <div class="col-auto my-auto">
          <div class="h-100">
            <h5 class="mb-1">
            {{ $user->name }}
            </h5>
            @if($user->email_verified_at != null)
                <span class="badge bg-success mb-3">
                    <i class="fa fa-check-circle"></i> Account Verified
                </span>
            @else
                <span class="badge bg-danger mb-3">
                    <i class="fa fa-exclamation-circle"></i> Unverified Account
                </span>

                <form action="{{ route('portal.myprofile.verify') }}" method="POST">
                    @csrf
                    <input id="verify_submit_button" type="submit" value="Click here to verify your account" class="btn btn-sm btn-primary"/>
                </form>
            @endif

            <p class="mb-0 font-weight-bold text-sm">
                @if($user->organization != null)
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
                    <input type="name" name="name" class="form-control" id="exampleFormControlInput1" value="{{ $user->name }}">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" value="{{ $user->email }}">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="form-label">Organization</label>
                    <input type="text" name="organization" class="form-control" id="exampleFormControlInput1" placeholder="Enter organization " value="{{ $user->organization }}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="Enter phone number " value="{{ $user->phone }}">
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

@endsection

@section('js')
<script>
  // FilePond.registerPlugin(FilePondPluginImageCrop);
  // const inputElement = document.querySelector('input[id="avatar"]');
  // const pond = FilePond.create(inputElement);



  /*
We need to register the required plugins to do image manipulation and previewing.
*/
FilePond.registerPlugin(
	// encodes the file as base64 data
  FilePondPluginFileEncode,
	
	// validates files based on input type
  FilePondPluginFileValidateType,
	
	// corrects mobile image orientation
  FilePondPluginImageExifOrientation,
	
	// previews the image
  FilePondPluginImagePreview,
	
	// crops the image to a certain aspect ratio
  FilePondPluginImageCrop,
	
	// resizes the image to fit a certain size
  FilePondPluginImageResize,
	
	// applies crop and resize information on the client
  FilePondPluginImageTransform
);

// Select the file input and use create() to turn it into a pond
// in this example we pass properties along with the create method
// we could have also put these on the file input element itself
FilePond.create(
	document.querySelector('input[id="avatar"]'),
	{
		labelIdle: `<span class="filepond--label-action">Edit</span>`,
    imagePreviewHeight: 170,
    imageCropAspectRatio: '1:1',
    imageResizeTargetWidth: 200,
    imageResizeTargetHeight: 200,
    stylePanelLayout: 'compact circle',
    styleLoadIndicatorPosition: 'center bottom',
    styleButtonRemoveItemPosition: 'center bottom'
	}
);
</script>
@endsection