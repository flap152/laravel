<?php


$remData = $remData;
$remorqueId = session()->get('remorqueId');
$remSelects = session()->get('remSelects');

function giveBG($temp){
    if ($temp < 15)
        return "blue";
    if ($temp > 25)
        return "red";
    if ($temp <= 16 || $temp >= 24)
        return "yellow";
    else
        return "green";
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="refresh" content="60; url= {{url('tempShow/'.$remorqueId) }}">
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

</head>
<body  id="bootstrap-overrides">
<div class="center-block">
<div class="card text-center cjustify-content-center" >
    <div class="card-header justify-content-center">
        Heure: {{ \Carbon\Carbon::now() }}<br/>
        Remorque: {{ $remSelects[$remorqueId] }} <br/>
    </div>
    <div class="card-body text-center">
        <div class="card justify-content-center text-white">
            @foreach($remData as $temp)
                @php($temp2 = 1.0 * rand (120,300)/10 )
                <h3 class="card-header m-3 text-center" style="background-color: {!! giveBG($temp) !!} ;">
                    Temperature {{$loop->index}} : {{$temp }} <br/>
                </h3>
            @endforeach

        </div>
    </div>
</div>
</div>


@if(false)
    {{-- Variations on button use. Maybe they'll be used in later versions --}}
    {!!  Form::open(['action' => '/flap']) !!}
    {!! Form::submit('Ne plus suivre!') !!}
    {!! Form::close() !!}
    <form url="flap">
        <input type="submit" value="Ne plus suivre" />
    </form>
    {{-- Form::select('remorqueId',$remSelects) --}}
    {!! Form::submit('Ne plus suivre!',['class'=>'btn']) !!}
@endif
{!! Form::open(['url' => url('/tempIndex')]) !!}
{!!   Form::button('Ne plus suivre', array('class'=>'btn btnSuivre','onClick'=>"location.href='".url('/tempIndex')."'")) !!}
{!! Form::close() !!}

</body>
</html>
