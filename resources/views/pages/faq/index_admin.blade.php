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
            $('#table_id').DataTable();
        } );
    </script>
@endsection


@section('content')
    <div class="container-fluid py-4">
        <h3 class="h5 text-muted">Manage FAQs</h3>
        <br>
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="position-relative">
                        <a type="button" class="btn bg-gradient-success" href="{{ route('portal.admin.faq.create') }}">
                            Create new FAQ
                        </a>
                    </div>
                    <table id="table_id" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>TITLE</th>
                                <th>AUTHOR</th>
                                <th>LAST UPDATED</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faqs as $faq)
                            <tr>
                                <td>{{ $faq->id }}</td>
                                <td>
                                    <span class="text-sm">
                                        {{ Str::limit($faq->title, 29, '...') }}
                                    </span>
                                </td>
                                <td>{{ $faq->created_by }}</td>
                                <td>{{ $faq->updated_at->diffForHumans()}}</td>
                                <td>
                                    <div>
                                        <a href="{{ route('portal.admin.faq.edit', $faq->id) }}" class="btn btn-sm btn-info">
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
