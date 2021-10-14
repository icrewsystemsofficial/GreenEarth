@extends('layouts.app')

@section('pagetitle')
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap5.min.css">
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#all-maintenance').DataTable({
            "sDom": 'ftirp',
            language: {
                paginate: {
                    next: '&#8594;', // or '→'
                    previous: '&#8592;' // or '←'

                }
            },

        });

        var info = table.page.info();
        var count = info.recordsTotal;
        var subheading = document.getElementById('subheading');
        subheading.innerHTML = "There are a total of " + count +" maintenance records for this tree";

    });
</script>
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header">
                <div class="h5"> Tree Maintenance History  </div>
                <div class="text-secondary text-sm ">{{$tree->name}} planted at {{$tree->location}} on {{$tree->created_at->diffForHumans()}} ({{ $tree->created_at->format('d/m/Y') }})</div>
                <div class="text-secondary text-sm" id="subheading"> </div>
            </div>

            <div class="card-body text-sm">
                <table id="all-maintenance" class="table text-center table-responsive">
                    <thead>
                        <tr>
                            <th> REMARKS </th>
                            <th> HEALTH </th>
                            <th> DATE  </th>
                            <th> VOLUNTEER </th>
                            <th> ACTIONS </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($maintenance_log as $maintenance_record)
                        <tr style="vertical-align: middle;">
                            <td> {!! Str::limit($maintenance_record->remarks, 17) !!} </td>
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
                            <td> {{ $maintenance_record->created_at->diffForHumans() }} </td>
                            <td> {{ $maintenance_record->updated_by }} </td>
                            <td class="pb-0">
                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#show<?php echo $maintenance_record->id ?>">
                                    View
                                </button>
                                <div class="modal fade " id="show<?php echo $maintenance_record->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title h5" id="exampleModalLabel">{{ $tree->name }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body m-2">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <img src="<?php echo asset("storage/uploads/tree-updates/".$maintenance_record->image_path); ?>" alt="tree image" style="height: 350px; width:400px; object-fit:cover; ">
                                                    </div>
                                                    <div class="col-3"  style="text-align:left;">
                                                        <p>
                                                            <span class="h6"> Date:</span> {{ $maintenance_record->created_at->diffForHumans() }} <br>
                                                            <span class="h6"> Updated By:</span> {{ $maintenance_record->updated_by }} <br>
                                                            <span class="h6"> Tree Health:</span> <br> 
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
                                                            <br>
                                                            <span class="h6"> Remarks: </span> {!! $maintenance_record->remarks !!} 
                                                        </p>
                                                    </div>
                                                </div>   
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal">Dismiss</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>  
        </div>
    </div>
@endsection
