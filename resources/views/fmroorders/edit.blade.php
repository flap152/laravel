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

    <h1>Edit {{ $fmroorder->name }}</h1>

    <!-- if there are creation errors, they will show here -->
    {{ Html::ul($errors->all()) }}

    {{ Form::model($fmroorder, array('route' => array('fmroorders.update', $fmroorder->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('OrderNumber', 'OrderNumber') }}
        {{ Form::text('OrderNumber', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('ServiceAddressStreet', 'ServiceAddressStreet') }}
        {{ Form::text('ServiceAddressStreet', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('SizeOfTheContainerToBeDelivered', 'SizeOfTheContainerToBeDelivered') }}
        {{ Form::select('SizeOfTheContainerToBeDelivered', array('0' => 'Select a Level', '8' => '8', '12' => '12', '20' => '20', '40' => '40'), null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit the Order!', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>
</body>
</html>