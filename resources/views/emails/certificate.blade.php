@component('mail::message')
    [Thank you message with certificate link, so from the link certificate can be downloaded]

@component('mail::button', ['url' => route('certificateDownload', $payment['razorpay_id'])])
    Download Certificate
@endcomponent
@endcomponent