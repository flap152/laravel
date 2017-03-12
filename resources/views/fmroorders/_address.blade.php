<div class="form-group">
{{ Form::label($addressType.'AddressStreet', $addressType.' Address: Street') }}
{{ Form::text($addressType.'AddressStreet', null, array('class' => 'form-control')) }}
<!--/div>
<div class="form-group"-->
    <?php
        //var_dump($fmroorder);
    ?>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>


    <table>
        <tr>
            <th>{{ Form::label($addressType.'AddressCity', $addressType.' City') }}</th>
            <th>{{ Form::label($addressType.'AddressProvince', $addressType.' Province') }}</th>
            <th>{{ Form::label($addressType.'AddressPostalCode', $addressType.' PostalCode') }}</th>
            <th>{{ Form::label($addressType.'AddressLat', $addressType.' Lat') }}</th>
            <th>{{ Form::label($addressType.'AddressLng', $addressType.' Lng') }}</th>
        </tr>
        <tr>
            <td>{{ Form::text($addressType.'AddressCity', null, array('class' => 'form-control')) }}</td>
            <td>{{ Form::text($addressType.'AddressProvince', null, array('class' => 'form-control')) }}</td>
            <td>{{ Form::text($addressType.'AddressPostalCode', null, array('class' => 'form-control')) }}</td>
            <td>{{ Form::number($addressType.'AddressLat', null, array('class' => 'form-control','step'=>'0.000001','pattern'=>'-?[0-9]+([\.,][0-9]+)?')) }}</td>
            <td>{{ Form::number($addressType.'AddressLng', null, array('class' => 'form-control','step'=>'0.000001','pattern'=>'-?[0-9]+([\.,][0-9]+)?')) }}</td>



        </tr>
    </table>
    <div id="{{$addressType}}test1"></div>
    <div id="{{$addressType}}test2"></div>

    <script>

        $(function() {
            $('[name*="{{$addressType}}AddressLat"]').add('[name*="{{$addressType}}AddressLng"]')
                .on('change keyup', function(event) {
                    if ( event.target.validity.valid ) {
                        $('#{{$addressType}}test1').text('Value ok');
                        //event.target.style.fontSize='';
                        event.target.style.backgroundColor='#AFA';
                    } else {
                        //event.target.style.fontSize='20px';
                        event.target.style.backgroundColor='#FAA';
                        $('#{{$addressType}}test1').text('Invalid value');
                    }
                })
                .on('blur', function(event) {
                    if ( event.target.validity.valid ) {
                        $('#{{$addressType}}test1').text('');
                        //event.target.style.fontSize='';
                        event.target.style.backgroundColor='';
                    }
                });
            }
        );

    </script>

</div>