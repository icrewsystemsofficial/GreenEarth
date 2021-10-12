@extends('layouts.app')

@section('pagetitle')
Cloud Providers Management
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
        Cloud Providers Management
    </h5>

    <div class="row">

        <div class="col-md-12">
            <h5>

            </h5>
        </div>


        <div class="container-fluid py-4">
            <div class="card">
                <div class="card-body">
                    <div class="position-relative">
                        <a type="button" class="btn btn-success" href="{{ route('portal.admin.cloud-providers.create') }}">
                            Create a cloud provider
                        </a>
                    </div>
                    <table id="table_id" class="table">
                        <thead>
                            <tr>
                                <th>NAME</th>
                                <th>URL</th>
                                <th>DATACENTERS</th>
                                <th>ENABLED</th>
                                <th>WHITELISTED</th>
                                <th>UPDATED AT</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cloudProviders as $cloudProvider)
                            <tr>
                                <td>{{$cloudProvider->name}}</td>
                                <td>{{$cloudProvider->url}}</td>
                                <td>{{$cloudProvider->datacenters}}</td>
                                @if ($cloudProvider->enabled == 0)
                                <td>
                                    <span class="badge bg-danger mb-3">
                                        <i class="fa fa-exclamation-circle""></i> No
                                    </span>
                                </td>
                                @elseif ($cloudProvider->enabled == 1)
                                <td>
                                    <span class="badge bg-success mb-3">
                                        <i class="fa fa-check-circle"></i> Yes
                                    </span>
                                </td>
                                @endif
                                @if ($cloudProvider->whitelisted == 0)
                                <td>
                                    <span class="badge bg-danger mb-3">
                                        <i class="fa fa-exclamation-circle"></i> No
                                    </span>
                                </td>
                                @elseif ($cloudProvider->whitelisted == 1)
                                <td>
                                    <span class="badge bg-success mb-3">
                                        <i class="fa fa-check-circle"></i> Yes
                                    </span>
                                </td>
                                @endif
                                <td>{{$cloudProvider->updated_at->diffForHumans()}}</td>
                                <td>
                                    <div>
                                        <a href="{{ route('portal.admin.cloud-providers.edit', $cloudProvider->id) }}" class="btn btn-sm btn-info">
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