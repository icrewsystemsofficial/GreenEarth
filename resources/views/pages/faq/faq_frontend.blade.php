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
              <h2 class="accordion-header" id="flush-heading{{ $i }}">
                <button class="accordion-button collapsed p-3" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $i }}" aria-expanded="false" aria-controls="flush-collapse{{ $i }}">
                    {{$faq->title}}
                </button>
              </h2>
              <div id="flush-collapse{{ $i }}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{ $i }}" data-bs-parent="#accordionFlushExample">
                <div class="p-4">
                    {{$faq->body}}
                </div>
              </div>
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


