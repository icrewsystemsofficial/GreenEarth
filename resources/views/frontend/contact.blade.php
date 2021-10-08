@extends('layouts.frontend')

@section('css')
{!! ReCaptcha::htmlScriptTagJsApi() !!}
@endsection

@section('js')

@endsection

@section('content')

<header class="bg-gradient-dark">
    <div class="page-header min-vh-10">
      <div class="container">
        <div class="row justify-content-center">
            &nbsp;&nbsp;&nbsp;&nbsp;
            <br>
            &nbsp;&nbsp;&nbsp;&nbsp;
        </div>
      </div>
    </div>
  </header>

  <section class="my-7 pt-2">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <span class="h2 text-success text-gradient font-weight-bolder">
                    Reach out to us
                </span>
                <div class="py-2">
                    <p>
                        We're here because of
                        the good <i class="fa fa-heart text-danger"></i>'s of many people.
                        If you wish to reach out to them, here are the details.
                    </p>

                    <br class="mt-3">

                    <h3 class="h6 text-dark opacity-8 mt-2">
                        1. Information Technology - Infrastructure, Planning & Development
                    </h3>
                    <p>
                        <img class="max-width-50 w-30 position-relative z-index-2 mb-3" src="https://media.discordapp.net/attachments/861662752174506035/888037915492483102/icrewsystems_logo_highres.png" alt="image">

                        "The Artisan House" (by the lake), Plot. #98, CSI Church Street, Jayanagar, Porur, Chennai 600044.
                    </p>

                    <h3 class="h6 text-dark opacity-8 mt-2">
                        2. Field Work
                    </h3>
                    <p>
                        Rotract club of Pegasus
                        { LOGO }
                        <br>
                        { ADDRESS }
                    </p>
                </div>

            </div>


            <div class="col-md-6 border-radius-xl">
                <div class="card">
                    <div class="bg-gradient-success text-white rounded-top">
                        <p class="p-3">
                            There's a good chance that your issue is already covered in our FAQ section.
                            Please have a read before you submit a contact request. Thank you! ✌️
                            <a href="{{ route('home.faq.index') }}" class="btn btn-white block mt-2">FAQ Section</a>
                        </p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('home.contact.send') }}" method="POST">
                            @csrf

                                <?php
                                    $types = array('1'=>'Support', '2' => 'Enquiry', '3' => 'Partnership', '4' => 'Other');
                                ?>
                                <div class="form-group">
                                    @if($errors->first('type'))
                                    <div class="alert alert-danger text-white" role="alert">
                                        Please select query type!
                                    </div>
                                    @endif
                                    <label class="h6 control-label col-sm2" for="type">
                                        What is your issue about?
                                    </label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="type" >
                                            @foreach ($types as $type )
                                                <option value="{{$type}}">{{$type}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                            <div class="form-group">
                                @if($errors->first('email'))
                                    <div class="alert alert-danger text-white" role="alert">
                                        An email is required
                                    </div>
                                @endif
                                <label class="h6 control-label col-sm2" for="email">
                                    Your e-mail?
                                </label>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" placeholder="john.doe@icrewsystems.com" name="email"  >
                                </div>
                            </div>


                            <div class="form-group ">

                                @if($errors->first('body'))
                                    <div class="alert alert-danger text-white" role="alert">
                                        An empty message can't be sent!
                                    </div>
                                @endif

                                <label class="h6 control-label col-sm2" for="body">
                                    What's on your mind?
                                </label>
                                <div class="col-sm-12">
                                    <textarea class="form-control " placeholder="Hey.. Can you clarify this?" name="body" ></textarea>
                                </div>
                            </div>






                            <div class="form-group row">
                                @if($errors->first('g-recaptcha-response')=='validation.recaptcha')
                                    <div class="alert alert-danger text-white" role="alert">
                                        Please verify the reCAPTCHA
                                    </div>
                                @endif
                                <label class="col-md-0 col-form-label text-md-right"></label>
                                <div class="col-md-6" > {!! htmlFormSnippet() !!} </div>
                            </div>


                            <button type="submit" class="mx-auto block btn btn-success w-85">
                                Send <i class="fa fa-send"></i>
                            </button>

                        </form>
                    </div>
                </div>
              </div>
          </div>
        </div>
    </div>
  </section>

@endsection
