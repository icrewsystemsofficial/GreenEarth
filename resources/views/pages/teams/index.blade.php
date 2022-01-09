@extends('layouts.app')

@section('pagetitle')
    Teams
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap5.min.css">
@endsection

@section('js')
    <script>
        let clname = document.getElementById("teams-active-tag");
        clname.className += " active";
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#table_id').DataTable();

            var info = table.page.info();
            var count = info.recordsTotal;
            var subheading = document.getElementById('subheading');
            subheading.innerHTML = "There are a total of " + count + " Teams in your database";
        });
    </script>
    <script>
        let clname = document.getElementById("faq-active-tag");
        clname.className += " active";
    </script>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Teams</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Teams</h6>
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <div class="h5"> Manage all Teams in your database </div>
                    <div class="text-secondary text-sm" id="subheading"> </div>
                    </div>
                    <div class="position-relative">
                        <a type="button" class="btn bg-gradient-success" href="{{ route('portal.admin.teams.create') }} ">
                            Create new Team
                        </a>
                    </div>
                </div>
                <div class="card-body text-sm">
                    <table id="table_id" class="table">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">TEAM NAME</th>
                                <th class="text-center">TEAM DESCRIPTION</th>
                                <th class="text-center">LAST UPDATED</th>
                                <th class="text-center">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teams as $team)
                                <tr class="align-items-center">
                                    <td class="text-center">{{ $team->id }}</td>
                                    <td class="text-center">{{ $team->name }}</td>
                                    <td class="text-center">
                                        <span class="text-sm">
                                            {{ Str::limit($team->desc, 29, '...') }}
                                        </span>
                                    </td>
                                    <td class="text-center">{{ $team->updated_at->diffForHumans() }}</td>
                                    <td class="text-center">
                                        <div>
                                            <a href="{{ route('portal.admin.teams.edit', $team->id) }}"
                                                class="btn btn-sm btn-info">
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
