@extends('layouts.frontend')

@section('css')

@endsection

@section('js')

@endsection

@section('content')
<section class="pt-3 pt-md-5 pb-md-5 pt-lg-7 bg-white">
  <div class="container mx-auto my-4">
    <div class="row" style="text-align: center;">
      <form action="{{ route('home.pay') }}" method="POST">
        @csrf
        <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ config('app.RAZORPAY_API_KEY') }}" data-amount="{{ $amount*100 }}" data-currency="INR" data-buttontext="Pay with Razorpay" data-name="Green Earth" data-description="An initiative towards sustainable internet" data-prefill.email="{{ $email }}" data-image="{{asset('img/favicon.png')}}" data-theme.color="#98ec2d"></script>
        <input type="hidden" custom="Hidden Element" name="hidden" style="color: brown">

        <input type="hidden" name="email" value="{{ $email }}">
        <input type="hidden" name="name" value="{{ $name }}">
    </form>
      </div>
      </form>
    </div>
  </div>
  </div>
</section>

@endsection