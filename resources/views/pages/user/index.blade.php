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
            $('#table_id').DataTable();
        } );
    </script>
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
                      {{-- {{ $usernum }} --}}
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
                        {{-- {{ $totaladminnum }} --}}
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
                        {{-- {{ $volunteernum }} --}}
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
            <div class="card-body">
                <div class="position-relative">
                    <a type="button" class="btn btn-success" href="{{ route('portal.admin.users.create') }}">
                        Create a user
                    </a>
                </div>
                <table id="table_id" class="table">
                    <thead>
                        <tr>
                            <th>NAME</th>
                            <th>E-MAIL</th>
                            <th>ROLE</th>
                            <th>JOINED</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <span class="badge bg-success">
                                    @foreach($user->roles as $role) {{ $role->name }} @endforeach
                                </span>
                            </td>
                            <td>{{$user->created_at->diffForHumans()}}</td>
                            <td>
                                <div>
                                    <a href="{{ route('portal.admin.users.manage', $user->id) }}" class="btn btn-sm btn-info">
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
