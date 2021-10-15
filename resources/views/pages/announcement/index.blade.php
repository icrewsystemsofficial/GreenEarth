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
        var table = $('#all-announcements').DataTable({
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
        subheading.innerHTML = "There are a total of " + count +" announcements in your database";
           
    });
    </script>
   
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header">
                <div class="h5"> Manage all announcements in your database </div>
                <div class="text-secondary text-sm" id="subheading"> </div>
            </div>

            <div class="card-body text-sm">
                <div class="position-relative">
                    @if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin') || \Illuminate\Support\Facades\Auth::user()->hasRole('superadmin'))
                        <a href="{{ route('portal.admin.announcements.create') }}" class="btn btn-success btn-sm">
                            Add Announcement
                        </a>
                    @endif
                    <a type="button" class="btn btn-secondary btn-sm" href="#">
                        Print
                    </a>
                </div>
                <table id="all-announcements" class="table text-center table-responsive">
                    <thead>
                        <tr>
                            <th> TITLE  </th>
                            <th> AUTHOR </th>
                            <th> PUBLISHED ON </th>
                            <th> OPTIONS </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($announcements as $announcement)
                        <tr style="vertical-align: middle;">
                            <td> {{ $announcement->title }} </td> 
                            <td> {{ $announcement->author }} </td>
                            <td> {{ $announcement->created_at->diffForHumans() }}</td>
                            <td class="pb-0">
                                     @if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin') || \Illuminate\Support\Facades\Auth::user()->hasRole('superadmin'))
                                    <a href="{{ route('portal.admin.announcements.edit', $announcement->id) }}" class="btn btn-info btn-sm">
                                        Manage
                                    </a>
                                    @else
                                    <a href="{{ route('portal.announcements.view', $announcement->id) }}" class="btn btn-info btn-sm">
                                        View
                                    </a>
                                    @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>  
        </div>
    </div>

@endsection
