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
            var table = $('#contact_requests').DataTable();

            var info = table.page.info();
            var count = info.recordsTotal;
            var subheading = document.getElementById('subheading');
            subheading.innerHTML = "There are a total of " + count + " contact requests in your database";
        });
    </script>

    <script>
        let clname = document.getElementById("contactreq-active-tag");
        clname.className += " active";
        document.getElementById("contacts-icon").classList.remove('text-dark');
        document.getElementById("contacts-icon").classList.add('text-white');
    </script>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Contact Requests</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Contact Requests</h6>
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header">
                <div class="h5"> Manage all Contact Requests in your database </div>
                <div class="text-secondary text-sm" id="subheading"> </div>
            </div>
            <div class="card-body text-sm">
                <table class="table text-center table-responsive" id="contact_requests">
                    <thead>
                        <tr>
                            <th class="text-center text-uppercase">
                                ID </th>
                            <th class="text-center text-uppercase">
                                Email </th>
                            <th class="text-center text-uppercase">
                                Type </th>
                            <th class="text-center text-uppercase">
                                Body </th>
                            <th class="text-center text-uppercase">
                                Status </th>
                            <th class="text-center text-uppercase">
                                Status Last Updated at</th>
                            <th class="text-center text-uppercase">
                                ACTION</th>
                        </tr>
                    </thead>

                    <?php
                    $status = ['0' => 'New', '1' => 'Contacted', '2' => 'Resolved', '3' => 'Spam'];
                    $colors = ['0' => 'danger', '1' => 'info', '2' => 'success', '3' => 'muted '];
                    ?>

                    <tbody>
                        @foreach ($contact_requests as $contact_request)
                            <tr>
                                <td class="text-sm text-center" id="title"> {{ $contact_request->id }} </td>
                                <td class="text-sm text-center"> {{ $contact_request->email }} </td>
                                <td class="text-sm text-center"> {{ $contact_request->type }} </td>
                                <td class="text-sm text-center"> {{ $contact_request->body }} </td>
                                <td class="text-sm text-center text-{{ $colors[$contact_request->status] }}">
                                    {{ $status[$contact_request->status] }}</td>
                                <td class="text-sm text-center"> {{ $contact_request->updated_at }} </td>
                                <td class="text-sm text-center pb-0 pt-3">
                                    <a href="{{ route('portal.admin.contact-requests.view', $contact_request->id) }}"
                                        class="btn bg-gradient-secondary text-sm">
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



@endsection
