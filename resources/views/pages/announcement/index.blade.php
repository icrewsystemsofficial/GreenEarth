@extends('layouts.app')

@section('pagetitle')
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap5.min.css">
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap5.min.js"></script>

    <script>
         $(document).ready(function() {
            var table = $('#all-announcements').DataTable();

            var info = table.page.info();
            var count = info.recordsTotal;
            var subheading = document.getElementById('subheading');
            subheading.innerHTML = "There are a total of " + count + " users in your database";
        });
    </script>
    <script>
        let clname = document.getElementById("announcements-active-tag");
        clname.className += " active";
    </script>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Announcements</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Announcements</h6>
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="container-fluid py-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <div class="h5"> Manage all announcements in your database </div>
                        <div class="text-secondary text-sm" id="subheading"> </div>
                    </div>
                    <div class="position-relative">
                        @if (\Illuminate\Support\Facades\Auth::user()->hasRole('admin') || \Illuminate\Support\Facades\Auth::user()->hasRole('superadmin'))
                            <a href="{{ route('portal.admin.announcements.create') }}" class="btn btn-success">
                                Add Announcement
                            </a>
                        @endif
                        <a type="button" class="btn btn-secondary" href="#">
                            Print
                        </a>
                    </div>
                </div>

                <div class="card-body text-sm">
                    <table id="all-announcements" class="table text-center table-responsive">
                        <thead>
                            <tr>
                                <th> TITLE </th>
                                <th> AUTHOR </th>
                                <th> PUBLISHED ON </th>
                                <th> OPTIONS </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($announcements as $announcement)
                                <tr style="vertical-align: middle;">
                                    <td> {{ $announcement->title }} </td>
                                    <td> {{ $announcement->author }} </td>
                                    <td> {{ $announcement->created_at->diffForHumans() }}</td>
                                    <td class="pb-0">
                                        @if (\Illuminate\Support\Facades\Auth::user()->hasRole('admin') || \Illuminate\Support\Facades\Auth::user()->hasRole('superadmin'))
                                            <a href="{{ route('portal.admin.announcements.edit', $announcement->id) }}"
                                                class="btn btn-info btn-sm">
                                                Manage
                                            </a>
                                        @else
                                            <a href="{{ route('portal.announcements.view', $announcement->id) }}"
                                                class="btn btn-info btn-sm">
                                                View
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    @endsection
