<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="http://code.jquery.com/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" />

    <link href="/css/myapp.css" rel="stylesheet">


    <script src="https://ubilabs.github.io/geocomplete/jquery.geocomplete.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDzdqU0EiO9UOQTh3CrJ_MoZeOU7rEccw&libraries=places"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


    <title>FM Entry</title>

    <!-- Styles -->
    <!-- link href="/css/app.css" rel="stylesheet" -->

</head>
<body>
@include('toppart')
<div class="container" style="width: inherit;max-width: inherit">



        @yield('content')
    </div>

            @yield('footer')


</body>
</html>

{{--
body {
color: #333;
}

body,
input,
button {
line-height: 1.4;
font: 13px Helvetica, arial, freesans, clean, sans-serif;
}

#geoflap1 {
width: 400px;
}

a {
color: #4183C4;
text-decoration: none;
}

#examples a {
text-decoration: underline;
}

#geocomplete {
width: 200px
}

.map_canvas {
width: 600px;
height: 400px;
margin: 10px 20px 10px 0;
}

#multiple li {
cursor: pointer;
text-decoration: underline;
}

.map_canvas {
float: right;
}--}}
