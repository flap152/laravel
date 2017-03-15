<html>
<head>
<title> Flap Testing page Number 2</title>
</head>
<body>
<h1>WELCOME to FLap's 2nd test page</h1>

<script src="http://code.jquery.com/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/master/build/js/bootstrap-datetimepicker.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/master/build/css/bootstrap-datetimepicker.min.css">


<div class="row">
    <div class="col-md-12">
        <h6>datetimepicker1</h6>

        <div class="form-group">
            <div class="input-group date" id="datetimepicker1">
                <input type="text" class="form-control" />	<span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
            </div>
        </div>
        <h6>datetimepicker2</h6>

        <input type="text" class="form-control" id="datetimepicker2" />
    </div>
</div>





<script>
    $(window).load(function(){
            $('#datetimepicker1').datetimepicker();
            $('#datetimepicker2').datetimepicker();
        }
    );

</script>

<?php

function getIt($post_fields, $ch) {
    #global $ch;
    # var_dump($post_fields);
    # set fields in the POST
    curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query($post_fields) );
    # echo http_build_query($post_fields);
    # Send request.
    $result = curl_exec($ch);
    echo $result;
}


    echo('sadfsdfasdf asdf asdf asdf f');
   // Artisan::call('db:seed');
use App\Fmroorder;
    $orders = App\Fmroorder::all();
    foreach ($orders as $order){

        echo ("qqqqqqqqqqqq");
        $data = $order->toJson();
        #echo($order->OrderNumber);
        #echo($data);
        $req_identifier = 'psoft_test'; // for test environment
        $url='http://107.22.170.54/EXTgateway/Gateway.php';
   #echo "debug, json data" . $data;
        $ch = curl_init( $url );
        curl_setopt($ch, CURLOPT_POST, 1);
#set proper doc type
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('application/x-www-form-urlencoded; charset=UTF-8'));
# Return response instead of printing.
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

# add order example
        $fields = array( 'requestIdentifier' => $req_identifier,
            'jsonData'=> $data,
            'addRoOrder'=>'true',
        );
        //getIt($fields, $ch);




    }
    echo('<br>sadfsdfasdf asdf asdf asdf f');
?>



</body>
</html>