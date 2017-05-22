@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">FLap 1</div>

                <div class="panel-body">

<?php
use App\Device;
use App\Sim;

                    $devices = \App\psoftadmin\Device::with([ 'produit','sim'] )->limit(2000)->get();


                    foreach ($devices as $device) {
                        $prod = $device->produit;
                        $sim = $device->sim;
                    echo "ID:".$device->ID . " Serial :" . $device->Serial. " Activation :" . $device->Activation . " Notes :" . $device->Notes;
                        if ($prod){
                            echo  "Nom :" . $device->produit->Nom;
                        }
                        if ($sim){
                            echo  "Phone :" . $device->sim->Phone;
                        }
                    echo "<br>";
                    }
?>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
