@component('mail::certificatelayout')

@slot('header')
{{ config('app.name') }}
@endslot

<div style="width:800px; height:600px; padding:20px; text-align:center; border: 10px solid #787878">
<div style="width:750px; height:550px; padding:20px; text-align:center; border: 5px solid #787878">
       <span style="font-size:50px; font-weight:bold">Certificate of Achievement</span>
       <br><br>
       <span style="font-size:25px"><i>This is to certify that</i></span>
       <br><br>
       <span style="font-size:30px"><b>{{ $data['name'] }}</b></span><br/><br/>
       <span style="font-size:25px"><i>has went carbon neutral with</i></span> <br/><br/>
       <span style="font-size:30px">GreenEarth</span> <br/><br/>
       <span style="font-size:20px">with the organization <b>(Organization)</b></span> <br/><br/><br/><br/>
       <span style="font-size:25px"><i>dated</i></span><br>
      (date)
      <span style="font-size:30px">(date)</span>
</div>
</div>

@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent 