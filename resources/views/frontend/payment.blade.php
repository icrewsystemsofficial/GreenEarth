@extends('layouts.frontend')

@section('css')

@endsection

@section('js')

@endsection

@section('content')


<section class="pt-3 pt-md-5 pb-md-5 pt-lg-7 bg-white">
    <div class="container mx-auto my-4">
      <div class="row">
        <form method="POST" action="{{ route('home.submit') }}">
            @csrf
        <div class="form-group">
            <label for="FormControlInput1">Name</label>
            <input name="name" type="text" class="form-control" id="FormControlInput1" placeholder="john doe">
        </div>
        <div class="form-group">
            <label for="FormControlInput2">Email address</label>
            <input name="email" type="email" class="form-control" id="FormControlInput2" placeholder="name@example.com">
        </div> 
        <div class="form-group">
            <label for="FormControlInput3">Contact Number</label>
            <input name="phone" type="number" class="form-control" id="FormControlInput3">
        </div>
        <div class="form-group">
            <label for="FormControlInput3">Amount</label>
            <input name="amount" type="number" class="form-control" id="FormControlInput4">
        </div>
        <button type="submit" class="btn btn-success">Proceed</button>
        </form>
      </div>
    </div>
</section>
@endsection
    {{-- <form action="{{ route('home.pay') }}" method="POST">
        @csrf
        <script
            src="https://checkout.razorpay.com/v1/checkout.js"
            data-key="{{ env('RazorPay_API_Key') }}" 
            data-amount="29935" 
            data-currency="INR"
            data-buttontext="Pay with Razorpay"
            data-name="Green Earth"
            data-description="An initiative towards sustainable internet"
            data-prefill.email="{{ Auth::user()?Auth::user()->email:'' }}"
            data-image="{{asset('img/apple-icon.png')}}"
            data-theme.color="#98ec2d"
        ></script>
        <input type="hidden" custom="Hidden Element" name="hidden">
    </form> --}}