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
        var table = $('#all-payments').DataTable({
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
        subheading.innerHTML = "There are a total of " + count +" payments in your database";          
    });
</script>
<script>
    let clname = document.getElementById("payments-active-tag");
    clname.className += " active";
</script>
@endsection

@section('breadcrumb')
<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Payments</li>
</ol>
<h6 class="font-weight-bolder mb-0">Payments</h6>
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-1">
                <div class="row justify-content-between  ">
                    <div class="col-md-5 ">
                        <div class="h5 "> Manage all payments in your database </div>
                    </div>
                </div>
                <div class="text-secondary text-sm " id="subheading"> </div>
            </div>
            <div class="card-body text-sm">

                <div class="table-responsive">
                    <table id="all-payments" class="table text-center table-responsive">
                        <thead>
                            <tr>
                                <th> NAME  </th>
                                <th> E-MAIL </th>
                                <th> AMOUNT </th>
                                <th> STATUS </th>
                                <th> COMMENTS </th>
                                <th> ACTIONS </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($payments as $payment)
                            <tr>
                                <td id="title"> {{ $payment->name }} </td>
                                <td> {{ $payment->email }} </td>
                                <td> {{ $payment->amount }} </td>

                                <td>
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
                                    <a href="{{ route('portal.admin.payments.edit',$payment->id) }}" class="btn btn-sm bg-gradient-info m-auto">
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


    