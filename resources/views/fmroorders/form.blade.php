
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
        <td> {{ Form::select('OperationType', array('0' => 'Select an OperationType', '2' => 'Pickup', '1' => 'Delivery', '3' => 'Exchange', '4' => 'Empty & Return', '5' => 'Move'), null, array('class' => 'form-control')) }}</td>
        <td> <div style="position: relative">{{ Form::datetime('RequestedFromTime', null, array('class' => 'form-control')) }} </div> </td>
        <td> <div style="position: relative">{{ Form::datetime('RequestedToTime', null, array('class' => 'form-control')) }}</div> </td>
        <td>{{ Form::number('AmountToCollect', 0, array('class' => 'form-control','step'=>'0.01','pattern'=>'[0-9]+([\.,][0-9]+)?')) }}</td>
    </tr>
</table>

<script>             $(function() {
        dtFrom = $('input#RequestedFromTime.form-control')[0].value;
        dtTo = $('input#RequestedToTime.form-control')[0].value;
        $('input#RequestedFromTime.form-control').datetimepicker({
            //useCurrent: false, //Important! See issue #1075
            format : 'YYYY-MM-DD HH:mm:ss',
            defaultDate : dtFrom
        });
        $('input#RequestedToTime.form-control').datetimepicker({
            // useCurrent: false, //Important! See issue #1075
            format : 'YYYY-MM-DD HH:mm:ss',
            defaultDate : dtTo
        });
        $('input#RequestedFromTime.form-control').on("dp.change", function (e) {
           // $('input#RequestedToTime.form-control').data("DateTimePicker").minDate(e.date);
        });
        $('input#RequestedToTime.form-control').on("dp.change", function (e) {
            //$('input#RequestedFromTime.form-control').data("DateTimePicker").maxDate(e.date);
        });

    });
</script>

<table>
    <tr>
        <th>{{ Form::label('CustomerName', 'CustomerName') }}</th>
        <th>{{ Form::label('CustomerContactFirstName', 'Contact: First Name') }}</th>
        <th>{{ Form::label('CustomerContactLastName', 'Last Name') }}</th>
        <th>{{ Form::label('CustomerContactPhoneNumber', 'Phone') }}</th>
    </tr>
    <tr>
        <td> {{ Form::text('CustomerName', null, array('class' => 'form-control')) }}</td>
        <td>{{ Form::text('CustomerContactFirstName', null, array('class' => 'form-control')) }}</td>
        <td>{{ Form::text('CustomerContactLastName', null, array('class' => 'form-control')) }}</td>
        <td>{{ Form::text('CustomerContactPhoneNumber', null, array('class' => 'form-control')) }}</td>
    </tr>
</table>


@include ('fmroorders._address',['addressType' => 'CustomerBilling', 'skipLatLng' => true])
@if(isset($fmroorder))
    @include ('fmroorders._address',['addressType' => 'Service', 'skipLatLng' => false, 'initLat' => $fmroorder->ServiceAddressLat, 'initLng' => $fmroorder->ServiceAddressLng])
    @include ('fmroorders._address',['addressType' => 'Destination', 'skipLatLng' => false , 'initLat' => $fmroorder->DestinationAddressLat, 'initLng' => $fmroorder->DestinationAddressLng])
@endif

@if(! isset($fmroorder))
    @include ('fmroorders._address',['addressType' => 'Service', 'skipLatLng' => false, 'initLat' => 45.738549, 'initLng' => -73.463786])
    @include ('fmroorders._address',['addressType' => 'Destination', 'skipLatLng' => false , 'initLat' => 45.738549, 'initLng' => -73.463786])
@endif

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
        <td> {{ Form::text('NameOfTheContainerToBePickedUp', NULL, array('class' => 'form-control')) }}</td>
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
        <td> {{ Form::hidden('IsRecurrent', false, array('class' => 'form-control')) }}</td>
        <td> {{ Form::hidden('Urgency', 1, array('class' => 'form-control')) }}</td>
    </tr>
</table>





{{ Form::submit($submitButtonText, array('class' => 'btn btn-primary')) }}