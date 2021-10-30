@component('mail::message')

# Payment Processed Successfully
<br>

## Hello {{ $data['name'] }} 

@component('mail::panel')
Your payment of ₹{{ $data['amount'] }} has been received on {{ $data['date'] }} at {{ $data['time'] }}.
@endcomponent
<br>
Thank you for choosing {{ config('app.name') }}!
<br>
<br>
Team {{ config('app.name') }}
@endcomponent