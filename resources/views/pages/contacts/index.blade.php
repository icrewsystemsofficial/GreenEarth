@extends('layouts.app')

@section('pagetitle')
@endsection

@section('css')
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/cs...">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
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

</style>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#contact_requests').DataTable({
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
        subheading.innerHTML = "There are a total of " + count +" Contact requests";

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
            <div class="col-md-12">
                <div class="card mb-6 ms-2 me-2 text-sm" style="border-radius: 15px; border:none;">
                    <div class="card-header pb-3" >
                        <div class="text-lg font-weight-bolder"> Manage Contact Requests </div>
                        <div class="text-secondary text-sm " id="subheading"> </div>
                    </div>


                    <div class="card-body mt-0 mb-4">


                        <div class="text-sm mb-2" style="float:right; text-align: right">
                            Search : <input type="text" id="filterbox" style="border: 1px solid #808080">
                        </div>

                        <div class="table-responsive mt-2">
                            <table class=" align-items-center mb-1 mt-0 hover row-border" style="width:100%;" id="contact_requests">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="text-uppercase text-center text-secondary text-sm font-weight-bolder opacity-7"> ID </th>
                                        <th class="text-uppercase text-center text-secondary text-sm font-weight-bolder opacity-7"> Email </th>
                                        <th class="text-uppercase text-center text-secondary text-sm font-weight-bolder opacity-7"> Type </th>
                                        <th class="text-uppercase text-center text-secondary text-sm font-weight-bolder opacity-7"> Body </th>
                                        <th class="text-uppercase text-center text-secondary text-sm font-weight-bolder opacity-7"> Status </th>
                                        <th class="text-uppercase text-center text-secondary text-sm font-weight-bolder opacity-7"> Status Last Updated at</th>
                                        <th class="text-uppercase text-center text-secondary text-sm font-weight-bolder opacity-7">  </th>
                                    </tr>
                                </thead>

                                <?php
                                    $status = array('0'=>'New','1'=>'Contacted', '2' => 'Resolved', '3' => 'Spam');
                                    $colors = array('0'=>'danger','1'=>'info', '2' => 'success', '3' => 'muted ');
                                ?>

                                <tbody>
                                @foreach($contact_requests as $contact_request)
                                <tr>
                                    <td class="text-sm text-center" id="title"> {{ $contact_request->id }} </td>
                                    <td class="text-sm text-center"> {{ $contact_request->email }} </td>
                                    <td class="text-sm text-center"> {{ $contact_request->type }} </td>
                                    <td class="text-sm text-center"> {{ $contact_request->body }} </td>
                                    <td class="text-sm text-center text-{{ $colors [$contact_request->status] }}"> {{ $status [$contact_request->status]  }}</td>
                                    <td class="text-sm text-center"> {{ $contact_request->updated_at }} </td>
                                    <td class="text-sm text-center pb-0 pt-3">
                                       <a href="{{route('portal.admin.contact-requests.view',$contact_request->id)}}" class="btn bg-gradient-secondary text-sm">
                                            Edit
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

