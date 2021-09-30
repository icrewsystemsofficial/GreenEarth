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
    @php ($i = 1)

            <div class="accordion accordion-flush" id="accordionFlushExample">
                @foreach ($faqs as $faq)<div class="accordion-item">
                    @if($i%2==1)
                        <h2 class="accordion-header" id="flush-headingOne_{{$i}}">
                        <button class="accordion-button collapsed rounded" style=" background-color:#DDFFCC; border:2px solid #DDFFCC" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne_{{$i}}" aria-expanded="false" aria-controls="flush-collapseOne">
                            <b>{{$faq->title}}</b>
                        </button>
                        </h2>
                        <div id="flush-collapseOne_{{$i}}" class="accordion-collapse collapse" style="background-color:#E6FFE6;" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body " S>{{$faq->body}}</div>
                            <a  href="{{ route('home.faq.show', $faq->id) }}" class="btn btn-sm btn-info position: relative start-2">
                                View in Detail
                            </a>
                        </div>

                    @else
                        <h2 class="accordion-header" id="flush-headingOne_{{$i}}">
                        <button class="accordion-button collapsed rounded" style=" background-color:#FFFFCC; border:2px solid #EEFF99" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne_{{$i}}" aria-expanded="false" aria-controls="flush-collapseOne">
                            <b>{{$faq->title}}</b>
                        </button>
                        </h2>
                        <div id="flush-collapseOne_{{$i}}" class="accordion-collapse collapse" style="background-color:#FFFFE6" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body rounded" S>{{$faq->body}}</div>
                            <a  href="{{ route('home.faq.show', $faq->id) }}" class="btn btn-sm btn-info position: relative start-2">
                                View in Detail
                            </a>
                        </div>
                    @endif
                @php ($i+=1)

                @endforeach
            </div>




@endsection
