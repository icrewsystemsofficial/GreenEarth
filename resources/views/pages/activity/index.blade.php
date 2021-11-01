@extends('layouts.app')

@section('pagetitle')
    Activity Log
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
            subheading.innerHTML = "There are a total of " + count + " activities in your database";
        });
    </script>
    <script>
        let clname = document.getElementById("activity-active-tag");
        clname.className += " active";
    </script>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Activity</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Activity</h6>
@endsection

@section('content')

    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header">
                <div class="h5">View all activities in your database </div>
                <div class="text-secondary text-sm" id="subheading"> </div>
            </div>
            <div class="card-body text-sm">
                <div class="table-responsive">
                    <table id="table_id" class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Caused By</th>
                                <th class="text-center">Action Performed</th>
                                <th class="text-center">Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activities as $activity)
                                <tr>
                                    <td class="text-center">{{ $activity->causer->name }}</td>
                                    <td class="text-center">{{ $activity->description }}</td>
                                    <td class="text-center">{{ $activity->updated_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endsection
