@extends('layouts.app')

@section('pagetitle')
    Users Management
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap5.min.css">
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#table_id').DataTable();

            var info = table.page.info();
            var count = info.recordsTotal;
            var subheading = document.getElementById('subheading');
            subheading.innerHTML = "There are a total of " + count + " users in your database";
        });
    </script>
    <script>
        let clname = document.getElementById("users-active-tag");
        clname.className += " active";
        document.getElementById("users-icon").classList.remove('text-dark');
        document.getElementById("users-icon").classList.add('text-white');
    </script>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Users</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Users</h6>
@endsection

@section('content')
    <div class="container-fluid py-4">

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <h5 class="text-muted">
            Users Management
        </h5>

        <div class="row">

            <div class="col-md-12">
                <h5>
                    // Stats are WIP
                </h5>
            </div>

            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total users</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $usernum }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Administrators</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $totaladminnum }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Volunteers</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $volunteernum }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Pending Invitees</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $pending }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <div class="h5"> Manage all users in your database </div>
                    <div class="text-secondary text-sm" id="subheading"> </div>
                </div>
                <div class="position-relative">
                    <a type="button" class="btn btn-success" href="{{ route('portal.admin.users.create') }}">
                        Create a user
                    </a>
                </div>
            </div>
            <div class="card-body text-sm">
                <table id="table_id" class="table">
                    <thead>
                        <tr>
                            <th class="text-center">NAME</th>
                            <th class="text-center">E-MAIL</th>
                            <th class="text-center">ROLE</th>
                            <th class="text-center">JOINED</th>
                            <th class="text-center">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="text-center">{{ $user->name }}</td>
                                <td class="text-center">{{ $user->email }}</td>
                                <td class="text-center">
                                    <span class="badge bg-success">
                                        @foreach ($user->roles as $role) {{ $role->name }} @endforeach
                                    </span>
                                </td>
                                <td class="text-center">{{ $user->created_at->diffForHumans() }}</td>
                                <td class="text-center">
                                    <div>
                                        <a href="{{ route('portal.admin.users.manage', $user->id) }}"
                                            class="btn btn-sm btn-info">
                                            Manage
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer">

            </div>
        </div>
    </div>

@endsection
