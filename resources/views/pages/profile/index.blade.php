@extends('layouts.app')

{{--@section('css')--}}
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap5.min.css"> --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"> --}}
{{--<link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">--}}
{{--@notifyCss --}}

{{--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>--}}
{{--@endsection--}}

{{--@section('js')--}}
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
{{--@endsection--}}

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
      <span class="mask bg-gradient-primary opacity-6"></span>
    </div>
    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
      <div class="row gx-4">
        <div class="col-auto">
          <div class="avatar avatar-xl position-relative">
            <img src="../assets/img/bruce-mars.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
          </div>
        </div>
        <div class="col-auto my-auto">
          <div class="h-100">
            <h5 class="mb-1">
              Alec Thompson
            </h5>
            <p class="mb-0 font-weight-bold text-sm">
              CEO / Co-Founder
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
          @while (user()->id)
          <form action="{{ route('portal.users.store') }}" method="post">
            @csrf
            @method('post')
            <div class="card-body pt-2">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="form-label">Name</label>
                    <input type="name" name="user_name" class="form-control" id="exampleFormControlInput1" value="{{ $users->name }}">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="form-label">Employee Email</label>
                    <input type="email" name="employee_email" class="form-control" id="exampleFormControlInput1" value="{{ $users->email }}">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="form-label">Organization</label>
                    <input type="text" name="organization" class="form-control" id="exampleFormControlInput1" value="{{ $users->organization }}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="Enter phone number " value="{{ $users->phone }}">
                  </div>
                </div>
              </div>
              <hr>
            </div>
            <div class="card-footer " style="margin-top: -20px ;">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
          @endwhile
        </div>
      </div>

    </div>
  </div>
</div>

<!--   Core JS Files   -->
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
</body>
@endsection