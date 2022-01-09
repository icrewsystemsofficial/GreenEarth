@component('mail::message')

Hello,<br> There is a new setting changed.<br><br>

@component('mail::panel')
Key : {{ $data['key'] }}<br>
Value : {{ $data['value'] }}

@endcomponent



@component('mail::button', ['url' => $data['url']])
View Message
@endcomponent


@endcomponent
