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
            var table = $('#all-trees').DataTable();

            var info = table.page.info();
            var count = info.recordsTotal;
            var subheading = document.getElementById('subheading');
            subheading.innerHTML = "There are a total of " + count + " trees in your database";
        });
    </script>
    <script>
        let clname = document.getElementById("trees-active-tag");
        clname.className += " active";
    </script>
@endsection

@section('breadcrumb')
<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Trees</li>
</ol>
<h6 class="font-weight-bolder mb-0">Trees</h6>
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header  d-flex justify-content-between">
                <div>
                    <div class="h5"> Manage all trees in your database </div>
                <div class="text-secondary text-sm" id="subheading"> </div>
                </div>
                <div class="position-relative">
                    <a type="button" class="btn btn-success"
                        href="{{ route('portal.admin.tree.create') }}">
                        Add a new tree
                    </a>
                </div>
            </div>
            <div class="card-body text-sm">
                <div class="table-responsive">
                    <table id="all-trees" class="table text-center table-responsive">
                        <thead>
                            <tr>
                                <th> TREE ID  </th>
                                <th> TREE PLANTED ON </th>
                                <th> LAST MAINTAINED </th>
                                <th> HEALTH </th>
                                <th> ACTIONS </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trees as $tree)
                            <tr style="vertical-align: middle;">
                                <td> {{ $tree->id }} </td>
                                <td> {{ $tree->created_at->diffForHumans() }} </td>
                                <td> @if($tree->last_maintained)
                                    {{ \Carbon\Carbon::parse($tree->last_maintained)->diffForHumans() }}
                                    @endif
                                </td>
                                <td>
                                    @if($tree->health == "Healthy")
                                    <span class="badge bg-success text-white">
                                    {{ $tree->health }}
                                    </span>
                                    @elseif($tree->health == "Not So Healthy")
                                    <span class="badge bg-warning text-white">
                                    {{ $tree->health }}
                                    </span>
                                    @else
                                    <span class="badge bg-danger text-white">
                                    {{ $tree->health }}
                                    </span>
                                    @endif
                                </td>
                                <td class="pb-0">
                                    <a href="{{route('portal.admin.tree.manage',$tree->id)}}" class="btn btn-info btn-sm">
                                        Manage
                                    </a>
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

