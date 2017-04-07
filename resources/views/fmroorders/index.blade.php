@extends('app')
<?php /** @var \App\Fmroorder $value */?>


@section('content')


<h1>All the Orders</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>OrderNumber</td>
            <td>Customer Name</td>
            <td>Operation</td>
            <td>When</td>
            <td>FM Status</td>
            <td>FM Status Date</td>
            <td>ServiceAddressStreet</td>
            <td>Size To Be Picked up</td>
            <td>Size To Be Delivered</td>
            <td>Order Created</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($fmroorders as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->OrderNumber }}</td>
            <td>{{ $value->CustomerName }}</td>
            <td>{{ $value->operationTypeLabel() }}</td>
            <td>{{ $value->RequestedFromTime }}</td>
            @if ($value->orderResult)
                <td>{{ $value->orderResult->orderStatusLabel() }}</td>
            @else
                <td></td>
            @endif
            <td>{{ $value->updated_at }}</td>
            <td>{{ $value->ServiceAddressStreet }}</td>
            <td>{{ $value->SizeOfTheContainerToBePickedUp }}</td>
            <td>{{ $value->SizeOfTheContainerToBeDelivered }}</td>
            <td>{{ $value->created_at }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>



                <!-- show the Order (uses the show method found at GET /fmroorders/{id} -->
                <a class="btn btn-small btn-success" style="" href="{{ URL::to('fmroorders/' . $value->id) }}">Show</a>
                @if(! $value->isInFM)
                    <!-- edit this Order (uses the edit method found at GET /fmroorders/{id}/edit -->
                    <a class="btn btn-small btn-info" style="" href="{{ URL::to('fmroorders/' . $value->id . '/edit') }}">Edit</a>
                    <!-- Send this Order to FleetMapper  -->
                    <a class="btn btn-small btn-info" style="" href="{{ URL::to('fmroorders/' . $value->id . '/tofm') }}">Send to FM</a>
                        <!-- delete the Order (uses the destroy method DESTROY /fmroorders/{id} -->
                        <!-- we will add this later since its a little more complicated than the other two buttons -->

                    {{ Form::open(array('url' => 'fmroorders/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-warning', 'style'=>"")) }}
                    {{ Form::close() }}
                    @endif
                    @if( $value->orderResult)
                        <!-- Show the FleetMapper status -->
                            <a class="btn btn-small btn-info" style="" href="{{ URL::to('fmroorderresults/' . $value->OrderNumber ) }}">Show FM Status</a>

                    @endif
               <!-- Get FleetMapper status for this order  -->
                <a class="btn btn-small btn-info" style="" href="{{ URL::to('fmroorders/' . $value->id . '/getfmstatus') }}">Update FM status</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{!! $fmroorders->render() !!}

@stop