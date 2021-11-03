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
            var table = $('#table_id').DataTable();

            var info = table.page.info();
            var count = info.recordsTotal;
            var subheading = document.getElementById('subheading');
            subheading.innerHTML = "There are a total of " + count + " forests in your database";
        });
    </script>
     <script>
        let clname = document.getElementById("forests-active-tag");
        clname.className += " active";
    </script>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Forests</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Forests</h6>
@endsection

@section('content')
<div class="container-fluid py-4">

    @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
    @endif

    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <div class="h5"> Manage all Forests in your database </div>
                <div class="text-secondary text-sm" id="subheading"> </div>
                </div>
                <div class="position-relative">
                    <a type="button" class="btn btn-success" href="{{ route('portal.admin.forests.create') }}">
                        Add new forest
                    </a>
                </div>
            </div>
            <div class="card-body text-sm">
                <table id="table_id" class="table">
                    <thead>
                        <tr>
                            <th class="text-center">NAME</th>
                            <th class="text-center">AREA</th>
                            <th class="text-center">STATUS</th>
                            <th class="text-center">TOTAL TREES</th>
                            <th class="text-center">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($forests as $forest)
                        <tr>
                            <td class="text-center">{{$forest->name}}</td>
                            <td class="text-center">{{$forest->area}} <sup>2</sup>m</td>
                            <td class="text-center">
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
                            <td class="text-center">NOT_IMPLEMENTED_YET</td>
                            <td class="text-center">
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
