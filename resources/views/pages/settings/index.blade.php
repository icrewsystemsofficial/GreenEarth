@extends('layouts.app')

@section('pagetitle')
Users Management
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
        var table = $('#table_id').DataTable({
            language: {
                paginate: {
                    // remove previous & next text from pagination
                    previous: '<i class="fas fa-chevron-left"></i>',
                    next: '<i class="fas fa-chevron-right"></i>'
                }
            },
        });



        var info = table.page.info();
        var count = info.recordsTotal;
        var subheading = document.getElementById('subheading');
        subheading.innerHTML = "There are a total of " + count + " settings in your database";
    });
</script>
<script>
    let clname = document.getElementById("settings-active-tag");
    clname.className += " active";
</script>
@endsection

@section('breadcrumb')
<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Settings</li>
</ol>
<h6 class="font-weight-bolder mb-0">Settings</h6>
@endsection

@section('content')

<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div>
                <div class="h5"> Manage all settings in your database </div>
                <div class="text-secondary text-sm" id="subheading"> </div>
            </div>
            <div class="position-relative">
                <a type="button" class="btn btn-success" href="{{ route('portal.admin.settings.create') }}"><i class="fa fa-plus" aria-hidden="true"></i>
                    Add a new setting
                </a>
            </div>
        </div>
        <div class="card-body text-sm">
            <div class="table-responsive">
                <table id="table_id" class="table">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Key</th>
                            <th class="text-center">Value</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($settings as $setting)
                        <tr>
                            <td class="text-center">{{ $setting->id }}</td>
                            <td class="text-center">{{ $setting->key }}</td>
                            <td class="text-center">{{ $setting->value }}</td>
                            <td class="text-center">
                                <div>
                                    <a href="{{ route('portal.admin.settings.edit', $setting->id) }}" class="btn btn-sm btn-info"><i class="fa fa-wrench" aria-hidden="true"></i>
                                        Manage
                                    </a>
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

@endsection