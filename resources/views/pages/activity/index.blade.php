@extends('layouts.app')




@section('pagetitle')

@endsection

@section('css')

    <link rel="stylesheet" href="//cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.css">
@endsection



@section('content')
    
    <style>

        td{
            font-size: 15px;
        }

        th{
            font-size: 15px;

        }
    </style>
    <div class="container-fluid py-4">
        <!-- Add Content Here -->
        <h3> Activity Log </h3>
        {{-- {{$activities}}  --}}<br>

    <table id="table_id" class="display">
    <thead>
        <tr>
            <th style="width:70%">ACTIVITY</th>
            <th style="width:15%">CREATED BY</th>
            <th style="width:15%">CREATED AT</th>

        </tr>
    </thead>
    <tbody>

        @foreach ($activities as $activity)


        <tr>
            <td >{{$activity["Activity"]}}</td>
            <td >{{$activity["Createdby"]}}</td>
            <td style="font-size: 14px">{{$activity["Createdat"]}}</td>
        </tr>


        @endforeach

    </tbody>
    </table>

    </div>
@endsection


@section('js')

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.js"></script> 
    
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>

@endsection
