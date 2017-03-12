
<table>
    <tr>
        <th>{{ Form::label('OrderNumber', 'OrderNumber') }}</th>
        <th>{{ Form::label('VendorPoNumber', 'VendorPoNumber') }}</th>
        <th>{{ Form::label('CustomerPoNumber', 'CustomerPoNumber') }}</th>
        <th>{{ Form::label('OperationType', 'OperationType') }}</th>
        <th>{{ Form::label('RequestedFromTime', 'RequestedFromTime') }}</th>
        <th>{{ Form::label('RequestedToTime', 'RequestedToTime') }}</th>
        <th>{{ Form::label('AmountToCollect', 'AmountToCollect') }}</th>
    </tr>
    <tr>
        <td> {{ Form::text('OrderNumber', null, array('class' => 'form-control')) }}</td>
        <td>{{ Form::text('VendorPoNumber', null, array('class' => 'form-control')) }}</td>
        <td>{{ Form::text('CustomerPoNumber', null, array('class' => 'form-control')) }}</td>
        <td> {{ Form::select('OperationType', array('0' => 'Select an OperationType', '0' => 'Pickup', '1' => 'Delivery', '2' => 'Exchange', '3' => 'Recurring'), null, array('class' => 'form-control')) }}</td>
        <td> {{ Form::datetime('RequestedFromTime', null, array('class' => 'form-control')) }}</td>
        <td>{{ Form::datetime('RequestedToTime', null, array('class' => 'form-control')) }}</td>
        <td>{{ Form::number('AmountToCollect', null, array('class' => 'form-control','step'=>'0.01','pattern'=>'[0-9]+([\.,][0-9]+)?')) }}</td>
    </tr>
</table>



<!--table>
    <tr>
        <th>{{ Form::label('OperationType', 'OperationType') }}</th>
        <th>{{ Form::label('RequestedFromTime', 'RequestedFromTime') }}</th>
        <th>{{ Form::label('RequestedToTime', 'RequestedToTime') }}</th>
    </tr>
    <tr>
        <td> {{ Form::select('OperationType', array('0' => 'Select an OperationType', '0' => 'Pickup', '1' => 'Delivery', '2' => 'Exchange', '3' => 'Recurring'), null, array('class' => 'form-control')) }}</td>
        <td> {{ Form::time('RequestedFromTime', null, array('class' => 'form-control')) }}</td>
        <td>{{ Form::time('RequestedToTime', null, array('class' => 'form-control')) }}</td>
    </tr>
</table-->

<!--div class="form-group">
    {{ Form::label('AmountToCollect', 'AmountToCollect') }}
    {{ Form::number('AmountToCollect', null, array('class' => 'form-control')) }}
</div-->

@if(true)  <?php echo('HELLOO '); ?>
@endif

@include ('fmroorders._address',['addressType' => 'Service'])

@include ('fmroorders._address',['addressType' => 'Destination'])

<div class="form-group">
<table>
    <tr>
        <th>{{ Form::label('SizeOfTheContainerToBeDelivered', 'SizeOfTheContainerToBeDelivered') }}</th>
        <th>{{ Form::label('SizeOfTheContainerToBePickedUp', 'SizeOfTheContainerToBePickedUp') }}</th>
        <th>{{ Form::label('NameOfTheContainerToBePickedUp', 'NameOfTheContainerToBePickedUp') }}</th>
        <th>{{ Form::label('TypeOfWaste', 'TypeOfWaste') }}</th>
    </tr>
    <tr>
        <td> {{ Form::select('SizeOfTheContainerToBeDelivered', array('0' => 'Select a Size', '8' => '8', '12' => '12', '20' => '20', '40' => '40'), null, array('class' => 'form-control')) }}</td>
        <td> {{ Form::select('SizeOfTheContainerToBePickedUp', array('0' => 'Select a Size', '8' => '8', '12' => '12', '20' => '20', '40' => '40'), null, array('class' => 'form-control')) }}</td>
        <td> {{ Form::text('NameOfTheContainerToBePickedUp', null, array('class' => 'form-control')) }}</td>
        <td> {{ Form::text('TypeOfWaste', null, array('class' => 'form-control')) }}</td>
    </tr>
</table>

    <div class="form-group">
        {{ Form::label('DriverNotes', 'DriverNotes') }}
        {{ Form::textarea('DriverNotes', null, array('class' => 'form-control','rows' => 4, 'cols' => 40 )) }}
    </div>

</div>
<table>
    <!--tr>
        <th>{{ Form::label('CompanyName', 'CompanyName') }}</th>
        <th>{{ Form::label('EndCustomerId', 'EndCustomerId') }}</th>
        <th>{{ Form::label('IsRecurrent', 'IsRecurrent') }}</th>
    </tr-->
    <tr>
        <td> {{ Form::hidden('CompanyName',  null, array('class' => 'form-control')) }}</td>
        <td> {{ Form::hidden('EndCustomerId', null, array('class' => 'form-control')) }}</td>
        <td> {{ Form::hidden('IsRecurrent', null, false, array('class' => 'form-control')) }}</td>
    </tr>
</table>


{{ Form::submit($submitButtonText, array('class' => 'btn btn-primary')) }}