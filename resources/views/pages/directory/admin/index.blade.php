@extends('layouts.app')

@section('pagetitle')
Carbon-neutral Businesses
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
    });
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
        Carbon-neutral Businesses
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
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Partner Businesses</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ count($directory) }}
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
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">CO<sub>2</sub> Offset</p>
                                <h5 class="font-weight-bolder mb-0">
                                    535 KG
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
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Trees Planted</p>
                                <h5 class="font-weight-bolder mb-0">
                                    135
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
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Offset Target</p>
                                <h5 class="font-weight-bolder mb-0">
                                    1555 KG
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
                <a type="button" class="btn btn-success" href="{{ route('portal.admin.directory.create') }}">
                    Add a Carbon-neutral Business
                </a>
            </div>
            <div class="table-responsive">
                <table id="table_id" class="table table-hover">
                    <thead>
                        <tr>
                            <th>NAME</th>
                            <th>TREES</th>
                            <th>CO<sub>2</sub> OFFSET</th>
                            <th>CARBON-NEUTRAL</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($directory as $business)
                        <tr>
                            <td>
                                <span class="text-sm">
                                    {{ Str::limit($business->business_name, 25, '...') }}
                                </span>
                                <br>
                                <span class="text-sm">
                                    {{ $business->business_owner }}
                                </span>
                            </td>
                            <td>{{$business->total_trees_in_grove}}</td>
                            <td>{{$business->total_carbon_offset}}</td>
                            <td>{{$business->carbon_neutral_since->diffForHumans()}}</td>
                            <td>
                                <div>
                                    <a href="{{ route('portal.admin.directory.edit', $business->id) }}" class="btn btn-sm btn-info">
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
