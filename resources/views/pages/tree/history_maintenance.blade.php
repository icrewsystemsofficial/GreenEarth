@extends('layouts.app')

@section('pagetitle')
@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/cs...">
<style>
    .btn{
        text-transform: unset !important;
    }
   // #dataTables_Filter{
   //     float: right;
  //  }

  .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
      background: none;
      border: none;
      color: #152238 !important;
    }


    /*below block of css for change style when active*/

    .dataTables_wrapper .dataTables_paginate .paginate_button:active {
      background: none;
      border: none;
      color: #152238 !important;
    }

</style>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#all-announcements').DataTable({
            "sDom": 'tirp',
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
        subheading.innerHTML = "There are a total of " + count +" announcements in your database";

        $("#filterbox").keyup(function() {
            table.search($(this).val()).draw();
         });

        
    });
</script>
@endsection

@section('content')
    <div class="container-fluid py-4">
        <!-- Add Content Here -->
        <div class="row">
            <div class="col-12">
                <div class="card mb-6 text-sm">
                    <div class="card-header pb-3" style="background-color:#fff;">
                        <div class="text-lg font-weight-bolder"> Manage all announcements in your database </div>
                        <div class="text-secondary text-sm " id="subheading"> </div>
                    </div>
                   
                    
                    <div class="card-body mt-0 mb-4">
                        <div class="btn-group flex" role="group" aria-label="Basic example" style="width:120px;" >
                            <button type="button" class="btn bg-gradient-dark text-sm" >Copy</button>
                            <button type="button" class="btn bg-gradient-dark text-sm">Print</button>
                        </div>
                        <div class="text-sm" style="float:right; text-align: right">
                            Search : <input type="text" id="filterbox">
                        </div>
                        <div class="table-responsive">
                            <table class=" align-items-center mb-1 mt-0 hover row-border" style="width:100%;" id="all-announcements">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7"> Maintenance Title </th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7"> Maintenance Date & Time </th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7"> Tree Health </th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7"> Actions </th>
                                    </tr>
                                </thead>

                                <tbody>
                                @foreach ($maintenance_log as $maintenance_record)    
                                <tr>
                                    <td class="text-sm" id="title"> {{$maintenance_record->title}} </td>
                                    <td class="text-sm"> Name </td>
                                    <td class="text-sm"> werwerer </td>
                                    <td class="text-sm">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn bg-gradient-primary text-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Launch demo modal
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    {{$maintenance_record->description}}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
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
            </div>
        </div>
    </div>

    

@endsection

