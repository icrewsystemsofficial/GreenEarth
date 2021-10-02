@extends('layouts.app')

@section('pagetitle')
FAQs
@endsection

@section('css')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">


@endsection

@section('js')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

@endsection

@section('content')
    <div class="container-fluid py-4">
        <h3>Frequently asked Questions</h3><br>
        <div class="position-relative ">
                    <a type="button" class="btn bg-gradient-success" href="{{ route('portal.admin.faq.create') }}">
                        Create
                    </a>
                    <a type="button" class="btn bg-gradient-warning" href="{{ route('portal.admin.faq.update') }}">
                        Update
                    </a>
                    <a type="button" class="btn bg-gradient-danger" href="{{ route('portal.admin.faq.delete') }}">
                        Delete
                    </a>
        </div>
        <br>

             @php ($i = 1)

             <div class="accordion accordion-flush" id="accordionFlushExample">
                @foreach ($faqs as $faq)<div class="accordion-item">

                        <h2 class="accordion-header" id="flush-headingOne_{{$i}}">
                        <button class="accordion-button collapsed rounded border-bottom {{--  border-top  --}}"  type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne_{{$i}}" aria-expanded="false" aria-controls="flush-collapseOne">
                            <h5 style="font-weight: 500;">{{$faq->title}}</h5>
                        </button>
                        </h2>
                        <div id="flush-collapseOne_{{$i}}" class="accordion-collapse collapse border-bottom"  aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div style="color:gray" class="accordion-body " S>{{$faq->body}}</div>
                            <a href="{{ route('portal.faq.show', $faq->id) }}" type="button" class="btn bg-gradient-secondary btn-sm position: relative start-2">View detail</a>

                        </div>



                @php ($i+=1)
                @endforeach
            </div>







@endsection
