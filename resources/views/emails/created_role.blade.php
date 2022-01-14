@component('mail::message')
# Hey 👋

A new role named {{$role}} has been created,
by {{$user->name}}. To contact him leave a mail
to {{$user->email}}.


<br>
<i>See you on the other side</i>

Thanking you,<br>
Team GREEN EARTH.
@endcomponent
