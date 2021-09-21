

@component('mail::message')

Hey {{$mailInfo['name']}} .. <br><br>
{{ $mailInfo['title'] }}

Click the link below to Setup your Account

@component('mail::button', ['url' => $mailInfo['url']])
Setup my Account
@endcomponent

Thanks,<br>
Project GreenEarth
@endcomponent
