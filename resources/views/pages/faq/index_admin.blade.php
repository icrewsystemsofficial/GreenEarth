@extends('layouts.app')

@section('pagetitle')
    FAQs
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap5.min.css">
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#table_id').DataTable();

            var info = table.page.info();
            var count = info.recordsTotal;
            var subheading = document.getElementById('subheading');
            subheading.innerHTML = "There are a total of " + count + " FAQs in your database";
        });
    </script>
    <script>
        let clname = document.getElementById("faq-active-tag");
        clname.className += " active";
        document.getElementById("faqs-icon").classList.remove('text-dark');
        document.getElementById("faqs-icon").classList.add('text-white');
    </script>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">FAQs</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">FAQs</h6>
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <div class="h5"> Manage all FAQs in your database </div>
                    <div class="text-secondary text-sm" id="subheading"> </div>
                    </div>
                    <div class="position-relative">
                        <a type="button" class="btn bg-gradient-success" href="{{ route('portal.admin.faq.create') }}">
                            Create new FAQ
                        </a>
                    </div>
                </div>
                <div class="card-body text-sm">
                    <table id="table_id" class="table">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">TITLE</th>
                                <th class="text-center">AUTHOR</th>
                                <th class="text-center">LAST UPDATED</th>
                                <th class="text-center">STATUS</th>
                                <th class="text-center">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faqs as $faq)
                                <tr class="align-items-center">
                                    <td class="text-center">{{ $faq->id }}</td>
                                    <td class="text-center">
                                        <span class="text-sm">
                                            {{ Str::limit($faq->title, 29, '...') }}
                                        </span>
                                    </td>
                                    <td class="text-center">{{ $faq->created_by }}</td>
                                    <td class="text-center">{{ $faq->updated_at->diffForHumans() }}</td>
                                    <td class="text-center">
                                        @if ($faq->status == 1)
                                            <span class="badge bg-success">Enabled</span>
                                        @else
                                            <span class="badge bg-danger">Disabled</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div>
                                            <a href="{{ route('portal.admin.faq.edit', $faq->id) }}"
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
