<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container" style="width: inherit;max-width: inherit">




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
            <td>Latest FM Status</td>
            <td>ServiceAddressStreet</td>
            <td>Size To Be Delivered</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($fmroorders as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->OrderNumber }}</td>
            <td>{{ $value->status }}</td>
            <td>{{ $value->ServiceAddressStreet }}</td>
            <td>{{ $value->SizeOfTheContainerToBeDelivered }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>



                <!-- show the Order (uses the show method found at GET /fmroorders/{id} -->
                <a class="btn btn-small btn-success" style="padding: 0px" href="{{ URL::to('fmroorders/' . $value->id) }}">Show</a>
                @if(! $value->isInFM)
                    <!-- edit this Order (uses the edit method found at GET /fmroorders/{id}/edit -->
                    <a class="btn btn-small btn-info" style="padding: 0px" href="{{ URL::to('fmroorders/' . $value->id . '/edit') }}">Edit</a>
                    <!-- Send this Order to FleetMapper  -->
                    <a class="btn btn-small btn-info" style="padding: 0px" href="{{ URL::to('fmroorders/' . $value->id . '/tofm') }}">Send to FM</a>
                        <!-- delete the Order (uses the destroy method DESTROY /fmroorders/{id} -->
                        <!-- we will add this later since its a little more complicated than the other two buttons -->

                    {{ Form::open(array('url' => 'fmroorders/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-warning', 'style'=>"padding: 0px")) }}
                    {{ Form::close() }}
                    @endif
                    @if( $value->orderResult)
                        <!-- Show the FleetMapper status -->
                            <a class="btn btn-small btn-info" style="padding: 0px" href="{{ URL::to('fmroorderresults/' . $value->OrderNumber ) }}">Show FM Status</a>

                    @endif
               <!-- Get FleetMapper status for this order  -->
                <a class="btn btn-small btn-info" style="padding: 0px" href="{{ URL::to('fmroorders/' . $value->id . '/getfmstatus') }}">Update FM status</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>