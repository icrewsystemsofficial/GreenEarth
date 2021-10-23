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
        var table = $('#all-trees').DataTable({
            "sDom": 'ftirp',
            language: {
                    paginate: {
                        // remove previous & next text from pagination
                        previous: '<i class="fas fa-chevron-left"></i>',
                        next: '<i class="fas fa-chevron-right"></i>'
                    }
                },
                responsive: true
             
        });

        var info = table.page.info();
        var count = info.recordsTotal;
        var subheading = document.getElementById('subheading');
        subheading.innerHTML = "There are a total of " + count +" trees in your database";          
    });
    </script>
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-1">
                <div class="row justify-content-between  ">
                    <div class="col-md-5 ">
                        <div class="h5 "> Manage all trees in your database </div>
                    </div>
                    <div class="col-md-3 ">
                        <div class="position-relative">
                            <a href="{{ route('portal.admin.tree.create') }}" class="btn btn-success btn-sm">
                                Add Tree
                            </a>
                        </div>
                    </div>
                </div>
                <div class="text-secondary text-sm " id="subheading"> </div>
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
<<<<<<< HEAD
            </div>
=======
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
>>>>>>> 1558bd33c2814bea7d8a0b49730fabb742e5b584
        </div>
    </div>
@endsection

