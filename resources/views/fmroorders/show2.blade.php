<!--Not used-->

<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('fmroorders') }}">Order Alert</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('fmroorders') }}">View All Orders</a></li>
            <li><a href="{{ URL::to('fmroorders/create') }}">Create a Order</a>
        </ul>
    </nav>

    <h1>Showing {{ $fmroorder->OrderNumber }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $fmroorder->OrderNumber }}</h2>
        <p>
            <strong>ServiceAddressStreet:</strong> {{ $fmroorder->ServiceAddressStreet }}<br>
            <strong>SizeOfTheContainerToBeDelivered:</strong> {{ $fmroorder->SizeOfTheContainerToBeDelivered }}
        </p>
    </div>

</div>
</body>
</html>