
@component('mail::message')

Hello,<br> There is a new {{ $data['type'] }} message from a user.<br><br>

@component('mail::panel')
Id: {{ $data['id'] }}<br>
Email : {{ $data['email'] }}<br>
Message : {{ $data['body'] }}

@endcomponent



@component('mail::button', ['url' => $data['url']])
View Message
@endcomponent


@endcomponent
