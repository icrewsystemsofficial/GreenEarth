@extends('layouts.app')

@section('pagetitle')
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap5.min.css">
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#all-events').DataTable();
            var info = table.page.info();
            var count = info.recordsTotal;
            var subheading = document.getElementById('subheading');
            subheading.innerHTML = "There are a total of " + count + " trees in your database";
        });
    </script>

    <script>
        let clname = document.getElementById("events-active-tag");
        clname.className += " active";
        document.getElementById("events-icon").classList.remove('text-dark');
        document.getElementById("events-icon").classList.add('text-white');
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
        events = {!! json_encode($events) !!};
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: events,
        });
        calendar.render();
        });
    </script>

@endsection

@section('breadcrumb')
<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Events</li>
</ol>
<h6 class="font-weight-bolder mb-0">Events</h6>
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-body d-flex justify-content-between">
                <div class="col-8 nav-wrapper position-relative end-0">
                    <ul class="nav nav-pills nav-fill p-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#calendar-tabs-simple" role="tab" aria-controls="profile" aria-selected="true">
                            Calendar View
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#list-tabs-simple" role="tab" aria-controls="dashboard" aria-selected="false">
                            List View
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="position-relative">
                    <a type="button" class="btn btn-success"
                        href="{{ route('portal.events.create') }}">
                        Add an event
                    </a>
                </div>
            </div>

            <div class="tab-content py-4 px-5">
			    <div class="tab-pane active" id="calendar-tabs-simple">
                    <div id='calendar'></div>
				</div>
				<div class="tab-pane" id="list-tabs-simple">
                    <div class="table-responsive">
                        <table id="all-events" class="table text-center">
                            <thead>
                                <tr>
                                    <th> DATE  </th>
                                    <th> TIME </th>
                                    <th> TITLE </th>
                                    <th> DESCRIPTION </th>
                                    <th> ACTIONS </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                <tr style="vertical-align: middle;">
                                    <td> {{ $event->date }} </td>
                                    <td> {{ $event->time }} </td>
                                    <td> {{ $event->title }} </td>
                                    <td> {{ $event->description }} </td>
                                    <td class="pb-0">
                                        <a href="{{route('portal.events.manage',$event->id)}}" class="btn btn-info btn-sm">
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
@endsection

