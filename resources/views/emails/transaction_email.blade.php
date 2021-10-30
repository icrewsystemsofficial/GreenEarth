@component('mail::message')

# Payment Processed Successfully
<br>

## Hello {{ $data['name'] }} 

@component('mail::panel')
<b>DETAILS</b>
<ul>
    <li>Transaction ID: <b>{{ $data['transaction_id'] }}</b></li>
    <li>Amount: <b>₹{{ $data['amount'] }}.00</b></li>
    <li>Paid On: <b>{{ $data['date'] }}</b></li>
    {{-- <li>Payment Method: <b></b></li> --}}
</ul>
@endcomponent
<br>
Thank you for choosing {{ config('app.name') }}!
<br>
<br>
Team {{ config('app.name') }}
@endcomponent