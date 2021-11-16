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
            subheading.innerHTML = "There are a total of " + count + " plant species in your database";
        });
    </script>
    <script>
        let clname = document.getElementById("plantspecies-active-tag");
        clname.className += " active";
        document.getElementById("plant-species-icon").classList.remove('text-dark');
        document.getElementById("plant-species-icon").classList.add('text-white');
    </script>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Plant Species</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Plant Species</h6>
@endsection

@section('content')

    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <div class="h5"> Manage all plant species in your database </div>
                    <div class="text-secondary text-sm" id="subheading"> </div>
                </div>
                <div class="position-relative">
                    <a type="button" class="btn btn-success"
                        href="{{ route('portal.admin.forests.trees-species.create') }}">
                        Add a new species
                    </a>
                </div>
            </div>
            <div class="card-body text-sm">
                <div class="table-responsive">
                    <table id="table_id" class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Common name</th>
                                <th class="text-center">price per plant</th>
                                <th class="text-center">h2o requirement per plant</th>
                                <th class="text-center">o2 production</th>
                                <th class="text-center">co2 absorption</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($plantspecies as $plantspecie)
                                <tr>
                                    <td class="text-center">{{ $plantspecie->common_name }}</td>
                                    <td class="text-center">{{ $plantspecie->price_per_plant }}</td>
                                    <td class="text-center">{{ $plantspecie->h2o_requirement_per_plant }}</td>
                                    <td class="text-center">{{ $plantspecie->o2_production }}</td>
                                    <td class="text-center">{{ $plantspecie->co2_absorption }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('portal.admin.forests.trees-species.manage', $plantspecie->id) }}"
                                                class="btn btn-xs btn-info">
                                                Manage
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
