@component('mail::message')
# Hello {{ $data['name'] }} 👋

[WELCOME EMAIL CONTENT TO BE PUBLISHED BY MARKETING TEAM]

We take great privledge in welcoming you onboard {{ config('app.name') }}.
Your account was created, but is not activate yet. You can choose a password
and activate your account by pressing the button below. Once you join, you will
be able to access the {{ config('app.name') }} Portal.


@component('mail::button', ['url' => $data['url']])
Activate my account
@endcomponent

<br>
<i>See you on the other side</i>

Eagerly waiting,<br>
Team {{ config('app.name') }}
@endcomponent
