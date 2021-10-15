@extends('layouts.app')

@section('pagetitle')
    Update - Frequently Asked Questions
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

    @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
    @endif

    <h5 class="text-muted">
        Update - Frequently Asked Questions
    </h5>
    <br>
    <div class="row">



        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total FAQs</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ count($faqs) }}
                    </h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">Enabled FAQs</p>
                      <h5 class="font-weight-bolder mb-0">
                        {{ count($enabled_faqs) }}
                      </h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">Disabled FAQs</p>
                      <h5 class="font-weight-bolder mb-0">
                        {{ count($disabled_faqs) }}
                      </h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-body">
                {{-- <div class="position-relative">
                    <a type="button" class="btn btn-success" href="{{ route('portal.admin.users.create') }}">
                        Create a user
                    </a>
                </div> --}}
                <table id="table_id" class="table-responsive ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Created By</th>
                            <th>Status</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($faqs as $faq)
                        <tr>
                            <td>{{$faq->id}}</td>
                            <td>{{$faq->title}}</td>
                            <td>{{$faq->body}}</td>
                            <td>{{$faq->created_by}}</td>
                            @if(($faq->status=='1'))
                                <td>Enabled</td>

                            @else
                                <td>Disabled</td>

                            @endif
                            <td>
                                <div>
                                    <a href="{{ route('portal.admin.faq.edit', $faq->id) }}" class="btn btn-sm btn-info">
                                        Update
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
