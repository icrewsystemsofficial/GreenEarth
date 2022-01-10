@component('mail::message')

## Hello {{ $data['name'] }} 

You have been invited to the following event:

@component('mail::panel')
    <b> {{ $data['title'] }} </b> <br>
    Date: <b>{{ $data['date'] }}</b> <br>
    Time: <b>{{ $data['time'] }}</b> <br>
@endcomponent

<br>
Team {{ config('app.name') }}
@endcomponent