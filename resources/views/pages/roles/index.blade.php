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
        let clname = document.getElementById("roles-active-tag");
        clname.className += " active";
    </script>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Roles</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Roles</h6>
@endsection

@section('content')
    <div class="container-fluid py-4">

        @if (session('status'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                <span class="alert-text"><strong>Success!</strong> {{ session('status') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <div class="h5"> Manage all roles in your database </div>
                    <div class="text-secondary text-sm" id="subheading"> </div>
                </div>
                <div class="position-relative">
                    <a type="button" class="btn btn-success" href="{{ route('portal.admin.roles.create') }}">
                        Add a new role
                    </a>
                </div>
            </div>
            <div class="card-body text-sm">
                <table id="table_id" class="table">
                    <thead>
                        <tr>
                            <th class="text-center">S.no</th>
                            <th class="text-center">ROLE</th>
                            <th class="text-center">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td class="text-center">{{ $role->id }}</td>
                            <td class="text-center">
                                <span class="badge bg-success">
                                    {{ $role->name }}
                                </span>
                            </td>
                            <td class="text-center">
                                <div>
                                    <a href="{{ route('portal.admin.roles.edit', $role->id) }}"
                                        class="btn btn-sm btn-info mx-2">
                                        Edit
                                    </a>
                                    <a href="{{ route('portal.admin.roles.delete', $role->id) }}"
                                        class="btn btn-sm btn-danger">
                                        Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                            
                        @endforeach
                        
                        {{-- @foreach ($users as $user)
                            <tr>
                                <td class="text-center">{{ $user->name }}</td>
                                <td class="text-center">{{ $user->email }}</td>
                                <td class="text-center">
                                    <span class="badge bg-success">
                                        @foreach ($user->roles as $role) {{ $role }} @endforeach
                                        {{$user->role}}
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
                        @endforeach --}}
                    </tbody>
                </table>
            </div>

            <div class="card-footer">

            </div>
        </div>
    </div>

@endsection
