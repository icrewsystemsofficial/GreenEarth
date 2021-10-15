@extends('layouts.app')

@section('pagetitle')
    Forests
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

    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-body">
                <div class="position-relative">
                    <a type="button" class="btn btn-success" href="{{ route('portal.admin.forests.create') }}">
                        Add new forest
                    </a>
                </div>
                <table id="table_id" class="table">
                    <thead>
                        <tr>
                            <th>NAME</th>
                            <th>AREA</th>
                            <th>STATUS</th>
                            <th>TOTAL TREES</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($forests as $forest)
                        <tr>
                            <td>{{$forest->name}}</td>
                            <td>{{$forest->area}} <sup>2</sup>m</td>
                            <td>
                                @if($forest->status == 1)
                                    <span class="badge bg-success">
                                        Active <i class="fa fa-check-circle"></i>
                                    </span>
                                @else
                                    <span class="badge bg-danger">
                                        Inactive <i class="fa fa-times"></i>
                                    </span>
                                @endif
                            </td>
                            @php
                                //TODO Implement this!
                            @endphp
                            <td>NOT_IMPLEMENTED_YET</td>
                            <td>
                                <div>
                                    <a href="{{ route('portal.admin.forests.manage', $forest->id) }}" class="btn btn-sm btn-info">
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
