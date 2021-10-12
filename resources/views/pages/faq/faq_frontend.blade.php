@extends('layouts.frontend')

@section('pagetitle')
@endsection

@section('css')


@endsection

@section('js')


@endsection

@section('content')
<section class="py-7">
    <div class="container">
      <div class="row">
        <div class="col-md-12 ms-auto me-auto text-center">

          <h3 class="text-gradient text-success mb-2 mt-4 h2">
            Frequently Asked Questions
          </h3>

          <p class="p-3">
              We know, doing good could actually induce alot of questions!
              We will strive to answer any questions you might have.
          </p>

        </div>
      </div>

    <div>
        <div class="accordion accordion-flush" id="accordionFlushExample">
            @php ($i = 1)
                @foreach ($faqs as $faq)
                <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne_{{$i}}">
                <button class="accordion-button collapsed rounded border-bottom"  type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne_{{$i}}" aria-expanded="false" aria-controls="flush-collapseOne">
                    <h5 style="font-weight: 500;">{{$faq->title}}</h5>
                </button>
                </h2>
                <div id="flush-collapseOne_{{$i}}" class="accordion-collapse collapse border-bottom"  aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="text-muted accordion-body">{{$faq->body}}</div>
                    <a href="{{ route('portal.faq.show', $faq->id) }}" type="button" class="btn bg-gradient-secondary btn-sm position: relative start-2">View detail</a>
                </div>
                @php ($i+=1)
            @endforeach
        </div>
    </div>

    <div class="mt-5">
      <h3 class="h3 text-gradient text-danger">
        Can't find what you're looking for?
      </h3>
      <p>
        Get in touch with us and we'll answer your questions. You can either write to us,
        or start a conversation on our chatbot.
        <br>
        <a href="{{ route('home.contact.index') }}" class="mt-3 btn btn-sm btn-success">
            Contact
        </a>
        <a href="#" class="mt-3 btn btn-sm btn-dark">
            Live Chat
        </a>
      </p>

    </div>
</section>
@endsection


