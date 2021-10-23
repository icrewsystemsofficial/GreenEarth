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
            $('#table_id').DataTable({
                language: {
                    paginate: {
                        // remove previous & next text from pagination
                        previous: '<i class="fas fa-chevron-left"></i>',
                        next: '<i class="fas fa-chevron-right"></i>'
                    }
                },
                responsive: true
            });
        } );
    </script>
@endsection

@section('content')

    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-body">
                <div class="position-relative">
                    <a type="button" class="btn btn-success" href="{{ route('portal.admin.forests.trees-species.create') }}">
                        Add a new species
                    </a>
                </div>
            <div class="table-responsive">
                <table id="table_id" class="table">
                    <thead>
                        <tr>
                            <th>Common name</th>
                            <th>price per plant</th>
                            <th>h2o requirement per plant</th>
                            <th>o2 production</th>
                            <th>co2 absorption</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($plantspecies as $plantspecie)
                        <tr>
                            <td class="text-center">{{$plantspecie->common_name}}</td>
                            <td class="text-center">{{$plantspecie->price_per_plant}}</td>
                            <td class="text-center">{{$plantspecie->h2o_requirement_per_plant}}</td>
                            <td class="text-center">{{$plantspecie->o2_production}}</td>
                            <td class="text-center">{{$plantspecie->co2_absorption}}</td>
                            <td>
                                <div>
                                    <a href="{{ route('portal.admin.forests.trees-species.manage', $plantspecie->id) }}" class="btn btn-xs btn-info">
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

            <div class="card-footer">

            </div>
        </div>
    </div>

@endsection
