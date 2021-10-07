@extends('layouts.frontend')

@section('css')

@endsection

@section('js')

@endsection

@section('content')
<header class="bg-gradient-success">
    <div class="page-header min-vh-75">
      <div class="container">
        <div class="row justify-content-center">
            <h1 class="h1 mt--3">
                <span class="text-white">Contact Us</span>
            </h1>
            <p class="mb-4 text-white opacity-8">
                Share your queries.. Happy to hear from you..!
            </p>
        </div>
      </div>
      <div class="position-absolute w-100 z-index-1 bottom-0">
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
          <defs>
            <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
          </defs>
          <g class="moving-waves">
            <use xlink:href="#gentle-wave" x="48" y="-1" fill="rgba(255,255,255,0.40" />
            <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.35)" />
            <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.25)" />
            <use xlink:href="#gentle-wave" x="48" y="8" fill="rgba(255,255,255,0.20)" />
            <use xlink:href="#gentle-wave" x="48" y="13" fill="rgba(255,255,255,0.15)" />
            <use xlink:href="#gentle-wave" x="48" y="16" fill="rgba(255,255,255,1" />
          </g>
        </svg>
      </div>
    </div>
  </header>

  <section class="my-7 pt-2">
    <div class="container">
        <div class="row">
          <div class="col-lg-9 z-index-2 border-radius-xl mt-n10 mx-auto py-3 bg-white shadow-blur">

            <div class="row">
                <div class="p-3 text-center">
                <span class="h2 text-success text-gradient font-weight-bolder">Contact Form</span>                </div>
            </div>

            <div class="row">
                  <div class="p-8 py-3">

                      <form action="{{ route('home.contact.send') }}" method="POST">

                        @csrf

                        <div class="form-group">

                            <div class="form-group">
                                <label class="h6 control-label col-sm2" for="email">Your email</label>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" placeholder="john.doe@icrewsystems.com" name="email" required>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="h6 control-label col-sm2" for="Body">Your Message for us</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control " placeholder="Hey.. Can you clarify this?" name="body" required></textarea>
                                </div>
                            </div>

                            <?php
                                $types = array('1'=>'Support', '2' => 'Enquiry', '3' => 'Partnership', '4' => 'Other');
                            ?>

                                <label class="h6 control-label col-sm2" for="type">Query Type</label>
                                <div class="col-sm-12">
                                    <select class="form-control" name="type" required>
                                        @foreach ($types as $type )
                                            <option value="{{$type}}"  selected>{{$type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                         <button type="submit" class="btn btn-success" data-dismiss="modal">
                             <span id="footer_action_button" class="glyphicon glyphicon">Send Your Message</span>
                         </button>

                        </form>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
  </section>


  <section class="my-5 pt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6 m-auto">
          <h4 class="text-dark font-weight-bold text-lg">
            <span class="text-success text-gradient">GreenEarth</span>,
            an initiative by icrewsystems
          </h4>
          <p class="mb-4">
            A global web development company with the vision to make the world a better and a greener place.
            It is located in Chennai, India.
          </p>
        </div>
        <div class="col-md-5 ms-auto">
          <div class="position-relative">
            <img class="max-width-50 w-50 position-relative z-index-2" src="https://media.discordapp.net/attachments/861662752174506035/888037915492483102/icrewsystems_logo_highres.png" alt="image">
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
