<div id="wrapper">
    <div id="row">
        <div id="first{{$addressType}}" class="form-group">


            <?php //xdebug_break();
            ?>
            <table>
                <td>
                    <table>
                        <tr>
                            <th>{{ Form::label($addressType.'AddressStreet', $addressType.' Address: Street') }} </th>
                            <th>{{ Form::label($addressType.'AddressCity', ' City') }}</th>
                            <th>{{ Form::label($addressType.'AddressProvince', ' Province') }}</th>
                            <th>{{ Form::label($addressType.'AddressPostalCode', ' PostalCode') }}</th>
                        </tr>
                        <tr>
                            <td>{{ Form::text($addressType.'AddressStreet', null, array('id'=>'formatted_address','style'=>'display:inline','hidden'=>'false','class' => 'form-control')) }}</td>
                            <td>{{ Form::text($addressType.'AddressCity', null, array('id'=>'locality','style'=>'', 'hidden'=>'false','class' => 'form-control')) }}</td>
                            <td>{{ Form::text($addressType.'AddressProvince', null, array('id'=>'administrative_area_level_1','style'=>'width:90px','hidden'=>'false','class' => 'form-control short_field')) }}</td>
                            <td>{{ Form::text($addressType.'AddressPostalCode',  null, array('id'=>'postal_code','style'=>';width:90px','hidden'=>'false','class' => 'form-control short_field')) }}</td>
                        </tr>
                        @if(! $skipLatLng)
                            <tr>

                                <th>{{ Form::label($addressType.'AddressLat', ' Lat') }}</th>
                                <th>{{ Form::label($addressType.'AddressLng', ' Lng') }}</th>
                            </tr>
                            <tr>
                                <td>   {{ Form::number($addressType.'AddressLat', null, array('id'=>'lat','style'=>'display:inline','hidden'=>'false','class' => 'form-control','step'=>'0.00000001','pattern'=>'-?[0-9]+([\.,][0-9]+)?')) }}</td>
                                <td>{{ Form::number($addressType.'AddressLng', null, array('id'=>'lng','style'=>'display:inline','hidden'=>'false','class' => 'form-control','step'=>'0.00000001','pattern'=>'-?[0-9]+([\.,][0-9]+)?')) }}</td>
                            </tr>
                        @endif
                        <input id="{{$addressType}}geoflap1" type="text" placeholder="Type in an address" value=""/>
                        <input id="{{$addressType}}find1" type="button" value="find"/>

                    </table>
                </td>
                @if(! $skipLatLng)
                @endif
                    <td>
                        <div id="{{$addressType}}second" class="map_canvas "></div>

                    </td>
                @if(! $skipLatLng)
                @endif
            </table>


        </div>

    </div>
</div>


     <script>
        $(function () {
            $("#{{$addressType}}geoflap1").geocomplete({
                map: "#{{$addressType}}second.map_canvas",
                details: "#first{{$addressType}}.form-group",
                //detailsScope: ""
                detailsAttribute: "id",
                mapOptions:{scrollwheel: true},
                @if(! $skipLatLng)
                    location :["{{$initLat}}","{{$initLng}}"],
                @endif
                @if($skipLatLng)
                    location :["45.738549","-73.4"],
                @endif

                types: ["geocode", "establishment"],
                markerOptions: {
                    draggable: true
                }
            });
            $("input#{{$addressType}}find1").click(function () {
                $("#{{$addressType}}geoflap1").trigger("geocode");
                //$("#geoLat").val($("#{{$addressType}}geoflap1"). )
                //$("#origAdd").show();
                /*$("#reset").hide();
                $("#apply").hide();
                $("#markerPos").hide();*/
            });

            $('#{{$addressType}}second.map_canvas').resizable();

            $("#{{$addressType}}geoflap1").bind("geocode:result",  function(event, result) {
                console.log(result);
            });

            @if(true)

                $("#{{$addressType}}geoflap1").bind("geocode:result",  function(event, result) {
                console.log(result);
                $('input[name={{$addressType}}AddressStreet].form-control')[0].value = result.formatted_address.split(',')[0];
                           });


                $("#{{$addressType}}geoflap1").bind("geocode:dragged", function (event, latLng) {
                    $('[name*="{{$addressType}}AddressLat"]')[0].value = latLng.lat().toFixed(8);
                    $('[name*="{{$addressType}}AddressLng"]')[0].value = latLng.lng().toFixed(8);
                // $("input[name=lng]").val(latLng.lng());

                //$("#reset").show();
                //$("#apply").show();
                //$("#newFind").show();
                //$("#markerPos").text("Marker moved: " + latLng.lat().toFixed(8) + "," + latLng.lng().toFixed(5)).show();
                //$('input#lat.form-control')[0].value = latLng.lat().toFixed(8);
                   // $('input#lng.form-control')[0].value = latLng.lng().toFixed(8);
            });



            $("#reset").click(function () {
                $("{{$addressType}}#geoflap1").geocomplete("resetMarker");
                $("#reset").hide();
                $("#apply").hide();
                $("#markerPos").hide();
                $("#newFind").hide();
                return false;
            });

            $("#markerPos").hide();
            $("#apply").hide();
        @endif

        });
    </script>


 @if(false) {{-- //pas d'interférence pendant l'implentation de la map--}}
    <script>
        $(function() {
            $('[name*="{{$addressType}}AddressLat"]').add('[name*="{{$addressType}}AddressLng"]')
                .on('change keyup', function(event) {
                    if ( event.target.validity.valid ) {
                        //$('#{{$addressType}}test1').text('Value ok');
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
    @endif

<style>


    /* from http://stackoverflow.com/questions/20179154/html-and-css-how-can-i-align-3-divs-side-by-side */


    #wrapperdd {
        display:table;
        width:100%;
    }
    #rowds {
        display:table-row;
    }
    #firstddd {
        display:table-cell;
        background-color:red;
        width:66%;
    }
     #secondddd {
        display:table-cell;
        background-color:blue;

    }
    #third {
        display:table-cell;
        background-color:#bada55;
        width:34%;
    }


    /** end */

    body {
        color: #333;
    }

    body,
    input,
    button {
        line-height: 1.4;
        font: 13px Helvetica, arial, freesans, clean, sans-serif;
    }

    #{{$addressType}}geoflap1,#geoflap2 {
        width: 100%;
    }

    a {
        color: #4183C4;
        text-decoration: none;
    }

    #examples a {
        text-decoration: underline;
    }

    #geocomplete {
        width: 200px
    }

    .map_canvas {
        height: 120px;
        width:250px;
        margin: 5px 5px 5px 0;
        float : right;
    }

    #multiple li {
        cursor: pointer;
        text-decoration: underline;
    }

    .map_canvas {

    }

    form {
     /*   width: 350px;*/
        float: left;
    }

    fieldset {
        width: 400px;
        margin-top: 20px
    }

    fieldset label {
        /*display: block;*/
        margin: 0.5em 0 0em;
    }

    fieldset input {
        width: 95%;
    }

    .short_field {
        width: 15%;
    }

    .next_field {
        width: 78%;
    }



</style>

