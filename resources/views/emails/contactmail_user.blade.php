@component('mail::message')

Hello,<br> Thanks for reaching out to us. <br>
We have received your message. We will get in touch with you in 1-2 Working Days.<br><br>
Your Message to us:<br>
{{ $data['body'] }}

@endcomponent
