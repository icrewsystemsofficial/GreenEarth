@component('mail::panel')


Hello,<br> There is a new {{ $data['type'] }} message from a user.<br><br>

Id: {{ $data['id'] }}<br>
Email : {{ $data['email'] }}<br>
Message : {{ $data['body'] }}




@component('mail::button', ['url' => $data['url']])
View Message
@endcomponent

@endcomponent
