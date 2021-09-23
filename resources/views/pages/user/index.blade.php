@extends('layouts.app')

@section('pagetitle')
    Users Management
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.css">
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
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
        <div class="position-relative">
            <a type="button" class="btn btn-success"  href="users/create">
                Create a user
            </a>
        </div>
        <table id="table_id" class="display">
            <thead>
                <tr>
                    <th>NAME</th>
                    <th>#ID</th>
                    <th>E-MAIL</th>
                    <th>ROLE</th>
                    <th>CREATED AT</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>#{{$user->id}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td>{{$user->created_at}} <?php echo date('m'); ?></td>
                    <td>
                        <div>
                            <button type="button" class="btn btn-success " >
                                <i class="bi bi-pencil-fill"></i>
                            </button>
                            <button type="button" class="btn btn-danger ">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
