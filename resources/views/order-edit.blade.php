<html>
<head>
<title> Flap Testing page Number 3</title>
</head>
<body>
<h1>WELCOME to FLap's 3rd test page</h1>
{!! Form::open(['url' => 'flap']) !!}
<?php
use App\Fmroorder;
    echo('sadfsdfasdf asdf asdf asdf f');
echo Form::model('Fmroorder', ['route' => ['flap']]);
echo Form::text('CustomerName');
echo Form::text('CustomerContactFirstName');
echo Form::text('CustomerContactLastName');
echo Form::text('CustomerContactPhoneNumber');
echo Form::text('CustomerContactEmailAddress');
echo Form::text('ServiceAddressStreet');



    echo('<br>sadfsdfasdf asdf asdf asdf f');
?>
{!! Form::close() !!}

</body>
</html>