<?php /** @var \App\Fmroorderresult $fmroorderresult */?>

<table>
    <tr>
        <th>{{ Form::label('OrderNumber', 'OrderNumber') }}</th>
        <th>{{ Form::label('OrderStatusId', 'Status') }}</th>
        <th>{{ Form::label('OrderStartTime', 'StartTime') }}</th>
        <th>{{ Form::label('OrderCompletionTime', 'Completion Time') }}</th>
        <th>{{ Form::label('VehicleName', 'VehicleName') }}</th>
        <th>{{ Form::label('DeliveredContainerName', 'Delivered Container') }}</th>
        <th>{{ Form::label('DeliveredContainerSize', 'Delivered Container Size') }}</th>
    </tr>
    <tr>
        <td> {{ Form::text('OrderNumber', null, array('class' => 'form-control')) }}</td>
        <td>{{ Form::text('OrderStatusLabel', $fmroorderresult->orderStatusLabel() ,  array('class' => 'form-control')) }}</td>
        <td>{{ Form::text('OrderStartTime', null, array('class' => 'form-control')) }}</td>
        <td>{{ Form::text('OrderCompletionTime', null, array('class' => 'form-control')) }}</td>
        <td>{{ Form::text('VehicleName', null, array('class' => 'form-control')) }}</td>
        <td>{{ Form::text('DeliveredContainerName', null, array('class' => 'form-control')) }}</td>
        <td>{{ Form::text('DeliveredContainerSize', null, array('class' => 'form-control')) }}</td>
    </tr>
</table>

<table>
    <tr>
        <th>{{ Form::label('PickedUpContainerName', 'Picked Up Container') }}</th>
        <th>{{ Form::label('TypeOfWaste', 'Type Of Waste') }}</th>
        <th>{{ Form::label('DumpsiteName', 'Dump Site') }}</th>
        <th>{{ Form::label('ScaleTicketNumber', 'Scale Ticket Number') }}</th>
        <th>{{ Form::label('LoadWeight', 'LoadWeight') }}</th>
        <th>{{ Form::label('DispatcherNotes', 'Dispatcher Notes') }}</th>
        <th>{{ Form::label('IsRecurrent', 'Is Recurrent') }}</th>
    </tr>
    <tr>
        <td>{{ Form::text('PickedUpContainerName', null, array('class' => 'form-control')) }}</td>
        <td>{{ Form::text('TypeOfWaste', null, array('class' => 'form-control')) }}</td>
        <td>{{ Form::text('DumpsiteName', null, array('class' => 'form-control')) }}</td>
        <td>{{ Form::text('ScaleTicketNumber', null, array('class' => 'form-control')) }}</td>
        <td>{{ Form::text('LoadWeight', null, array('class' => 'form-control')) }}</td>
        <td>{{ Form::text('DispatcherNotes', null, array('class' => 'form-control')) }}</td>
        <td>{{ Form::text('IsRecurrent', null, array('class' => 'form-control',  'title' => '1 for yes ')) }}</td>
    </tr>
</table>

<script>
    document.write('<a href="' + document.referrer + '">Go Back</a>');
    //{ Form::submit($submitButtonText, array('class' => 'btn btn-primary')) }}
</script>

