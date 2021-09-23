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

  .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
      background: none;
      border: none;
      color: #152238 !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:active {
      background: none;
      border: none;
      color: #152238 !important;
    }

    .card{
        border-radius: 15px;
        border: none;
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
                <div class="card mb-6 ms-2 me-2 text-sm">
                    <div class="card-header pb-3" style="background-color:#fff; border-radius:15px 15px 0px 0px;">
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
                                        <th class="text-uppercase text-center text-secondary text-sm font-weight-bolder opacity-7"> Title </th>
                                        <th class="text-uppercase text-center text-secondary text-sm font-weight-bolder opacity-7"> Author </th>
                                        <th class="text-uppercase text-center text-secondary text-sm font-weight-bolder opacity-7"> Published On </th>
                                        <th class="text-uppercase text-center text-secondary text-sm font-weight-bolder opacity-7"> Options </th>
                                    </tr>
                                </thead>

                                <tbody>
                                @foreach($announcements as $announcement)
                                <tr>
                                    <td class="text-sm text-center" id="title"> {{ $announcement->title }} </td>
                                    <td class="text-sm text-center"> Name </td>
                                    <td class="text-sm text-center"> {{ $announcement->created_at }} </td>
                                    <td class="text-sm text-center pb-0 pt-3"> 
                                       <a href="{{ route('portal.admin.announcements.edit', $announcement->id) }}" class="btn bg-gradient-primary text-sm">
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
        </div>
    </div>

    

@endsection

