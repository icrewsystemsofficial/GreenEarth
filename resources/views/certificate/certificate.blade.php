<!DOCTYPE html>
<html>

<head>
    @component('mail::certificate')

    @slot('header')
    {{ config('app.name') }}
    @endslot

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
<style>
    .custom-font{
        font-family: 'Dancing Script', cursive;
    }
</style>
</head>


<body>
    <div style="width:800px; height:600px; padding:20px; border: 10px outset;">
        <div style="width:750px; height:550px; padding:10px; text-align:center; border: 5px outset;">
            <br>
            <span style="font-size:30px; font-weight:bold; text-align:center; color:#69B00B;">GreenEarth</span>
            <br><br><br>
            <span style="font-size:45px; color:#31AECB;" class="custom-font"><i class="custom-font">(Name)</i></span><br /><br />
            <div style='margin: auto; width: 60%; padding: 10px'>
                <span style="font-size:15px"><i>is hereby awarded this certificate of achievement for successfully <b>going Carbon Neutral</b> with the GreenEarth team on (date)</i></span>
            </div><br><br><br><br><br><br><br><br>
            <div class="d-flex justify-content-between" style="width:600px; margin:auto">
                <div style="text-align:left">
                    <span style="font-size:15px">_______________<br>(Name)</span>
                </div>
                <div style="text-align:center">
                    <span style="font-size:15px">images</span>
                </div>
                <div style="text-align:right;">
                    <span style="font-size:15px">_______________<br>(Name)</span>
                </div>
            </div>
        </div>
    </div>

    @slot('footer')
    @component('mail::footer')
    © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
    @endcomponent
    @endslot
    @endcomponent
</body>

</html>