@extends('layouts.frontend')

@section('pagetitle')
@endsection

@section('css')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

@endsection

@section('js')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

@endsection

@section('content')
<section class="py-7">
    <div class="container">
      <div class="row">
        <div class="col-md-12 ms-auto me-auto text-center">

          <h3 class="text-gradient text-success mb-0 mt-4 h2">
            Frequently Asked Questions
          </h3>
          <br><br>

        </div>
      </div>


      <div>
         @php ($i = 1)

                <div class="accordion accordion-flush" id="accordionFlushExample">
                     @foreach ($faqs as $faq)<div class="accordion-item">

                             <h2 class="accordion-header" id="flush-headingOne_{{$i}}">
                             <button class="accordion-button collapsed rounded border-bottom"  type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne_{{$i}}" aria-expanded="false" aria-controls="flush-collapseOne">
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


        </div>

  </section>


@endsection


