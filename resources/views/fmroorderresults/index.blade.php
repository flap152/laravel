@extends('app')

@section('content')
<h1>All the fmroorderresults</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Order Number</td>
            <td>Status Id</td>
            <td>Started</td>
            <td>Completed</td>
            <td>Delivered Container</td>
            <td>Vehicle</td>
            <td>Type</td>
            <td>DumpsiteName</td>
            <td>Scale Ticket Number</td>
            <td>Load Weight</td>
            <td>Dispatcher Notes</td>
            <td>Recurrent</td>
            <td>Last Update</td>
        </tr>
    </thead>
    <tbody>
    @foreach($fmroorderresults as $key => $value)
        <tr>
            <td> {{ $value->OrderNumber }}</td>
            <td>{{ $value->OrderStatusId }}</td>
            <td>{{ $value->OrderStartTime }}</td>
            <td>{{ $value->OrderCompletionTime }}</td>
            <td>{{ $value->DeliveredContainerName }}</td>
            <td>{{ $value->VehicleName }}</td>
            <td>{{ $value->TypeOfWaste }}</td>
            <td>{{ $value->DumpsiteName }}</td>
            <td>{{ $value->ScaleTicketNumber }}</td>
            <td>{{ $value->LoadWeight }}</td>
            <td>{{ $value->DispatcherNotes }}</td>
            <td>{{ $value->IsRecurrent }}</td>
            <td>{{ $value->updated_at }}</td>
            <!-- we will also add show, edit, and delete buttons -->
            <td>



                <!-- show the Order (uses the show method found at GET /fmroorderresults/{id} -->
                <a class="btn btn-small btn-success" style="padding: 0px" href="{{ URL::to('fmroorderresults/' . $value->OrderNumber) }}">Show status</a>
                <!-- show the Order (uses the show method found at GET /fmroorderresults/{id} -->
                <a class="btn btn-small btn-success" style="padding: 0px" href="{{ URL::to('fmroorders/' . $value->fmroorder->id) }}">Show Order</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@stop