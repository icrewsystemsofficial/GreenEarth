@component('mail::message')

# Hello,
Thank you for reaching out to us. We have received your message.
One of our team members will reach out to you within 3-4 business days.
<br><br>
The message you left for us:<br>
@component('mail::panel')
{{ $data['body'] }}
@endcomponent

If you need to urgently get in touch with us, please use +91 9884801349
<br><br>
Looking forward, <br>
{{ config('app.name') }}.

<small>
    This is an auto-generated e-mail
</small>

@endcomponent
