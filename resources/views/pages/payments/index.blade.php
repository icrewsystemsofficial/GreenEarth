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
        subheading.innerHTML = "There are a total of " + count +" trees in your database";

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


                    <div class="card-body mt-0 mb-4">

                        <div class="text-sm" style="float:right; text-align: right">
                            Search : <input type="text" id="filterbox" style="border: 1px solid #808080">
                        </div>

                        <div class="table-responsive">
                            <table class=" align-items-center mb-1 mt-0 hover row-border" style="width:100%;" id="all-announcements">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="text-uppercase text-center text-secondary text-sm font-weight-bolder opacity-7"> Name </th>
                                        <th class="text-uppercase text-center text-secondary text-sm font-weight-bolder opacity-7"> E-Mail </th>

                                        <th class="text-uppercase text-center text-secondary text-sm font-weight-bolder opacity-7"> Amount </th>

                                        <th class="text-uppercase text-center text-secondary text-sm font-weight-bolder opacity-7"> Status </th>
                                        <th class="text-uppercase text-center text-secondary text-sm font-weight-bolder opacity-7"> Comments </th>
                                        <th class="text-uppercase text-center text-secondary text-sm font-weight-bolder opacity-7"> Action </th>
                                    </tr>
                                </thead>

                                <tbody>
                                @foreach($payments as $payment)
                                <tr>
                                    <td class="text-sm text-center" id="title"> {{ $payment->name }} </td>
                                    <td class="text-sm text-center"> {{ $payment->email }} </td>
                                    <td class="text-sm text-center"> {{ $payment->amount }} </td>

                                    <td class="text-sm text-center">
                                        @if ($payment->status == 1)
                                            <span class="badge bg-gradient-success">Success</span>
                                        @endif
                                        @if ($payment->status == 2)
                                            <span class="badge bg-gradient-danger">Failed</span>
                                        @endif
                                        @if ($payment->status == 0)
                                            <span class="badge bg-gradient-warning">Processing</span>
                                        @endif
                                    </td>
                                    <td class="text-sm text-center m-auto"> 
                                        @if ($payment->admin_remarks == "")
                                            No Comments
                                        @else
                                            {!! $payment->admin_remarks !!}
                                        @endif
                                    </td>
                                    <td class="text-sm text-center"> 
                                       <a href="{{ route('portal.admin.payments.edit',$payment->id) }}" class="btn bg-gradient-secondary m-auto">
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

