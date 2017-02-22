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
        <li><a href="{{ URL::to('fmroorders') }}">View All fmroorders</a></li>
        <li><a href="{{ URL::to('fmroorders/create') }}">Create a Order</a>
    </ul>
</nav>

<h1>All the fmroorders</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>OrderNumber</td>
            <td>ServiceAddressStreet</td>
            <td>SizeOfTheContainerToBeDelivered</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($fmroorders as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->OrderNumber }}</td>
            <td>{{ $value->ServiceAddressStreet }}</td>
            <td>{{ $value->SizeOfTheContainerToBeDelivered }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the Order (uses the destroy method DESTROY /fmroorders/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
                <!-- delete the fmroorder (uses the destroy method DESTROY /fmroorders/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
            {{ Form::open(array('url' => 'fmroorders/' . $value->id, 'class' => 'pull-right')) }}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Delete this Order', array('class' => 'btn btn-warning')) }}
            {{ Form::close() }}

                <!-- show the Order (uses the show method found at GET /fmroorders/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('fmroorders/' . $value->id) }}">Show this Order</a>

                <!-- edit this Order (uses the edit method found at GET /fmroorders/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('fmroorders/' . $value->id . '/edit') }}">Edit this Order</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>