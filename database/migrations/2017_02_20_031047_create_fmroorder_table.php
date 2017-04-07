<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateFmroorderTable
 */
class CreateFmroorderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('fmroorder', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status')->default(0);
            $table->boolean('isInFM')->default(false);
            $table->string('OrderNumber')->unique();
            $table->string('VendorPoNumber')->nullable();
            $table->string('CustomerPoNumber')->nullable();
            $table->string('CustomerName');
            $table->string('CustomerBillingAddressStreet')->nullable();
            $table->string('CustomerBillingAddressCity')->nullable();
            $table->string('CustomerBillingAddressProvince')->nullable();
            $table->string('CustomerBillingAddressPostalCode')->nullable();
            $table->string('CustomerContactFirstName');
            $table->string('CustomerContactLastName');
            $table->string('CustomerContactPhoneNumber');
            $table->string('CustomerContactEmailAddress')->nullable();
            $table->string('ServiceAddressStreet');
            $table->string('ServiceAddressCity');
            $table->string('ServiceAddressProvince');
            $table->string('ServiceAddressPostalCode');
            $table->string('ServiceAddressLat')->nullable()->default(null);
            $table->string('ServiceAddressLng')->nullable()->default(null);
            $table->integer('OperationType');
            $table->string('SizeOfTheContainerToBeDelivered')->nullable();
            $table->string('SizeOfTheContainerToBePickedUp')->nullable();
            $table->string('NameOfTheContainerToBePickedUp')->nullable();
            $table->string('TypeOfWaste');
            $table->dateTime('RequestedFromTime');
            $table->dateTime('RequestedToTime');
            $table->text('DriverNotes');
            $table->string('DestinationAddressStreet')->nullable();
            $table->string('DestinationAddressCity')->nullable();
            $table->string('DestinationAddressPostalCode')->nullable();
            $table->string('DestinationAddressProvince')->nullable();
            $table->string('DestinationAddressLat')->nullable()->default(null);
            $table->string('DestinationAddressLng')->nullable()->default(null);
            $table->string('Urgency')->nullable()->default(1);
            $table->float('AmountToCollect')->nullable();
            $table->string('CompanyName')->nullable();
            $table->string('EndCustomerId')->nullable();
            $table->string('IsRecurrent')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Fmroorder');
        Schema::dropIfExists('fmroorder');
    }
}


/*
 *
 * $data='{"OrderNumber":"' . $uniqueID . '","VendorPoNumber":"' . $uniqueID . '","CustomerPoNumber":"' . $uniqueID .
    '","CustomerName":"Construction Processoft2",
    "CustomerBillingAddressStreet":null,
    "CustomerBillingAddressCity":null,
    "CustomerBillingAddressProvince":null,
    "CustomerBillingAddressPostalCode":null,
    "CustomerContactFirstName":"Rejean",
    "CustomerContactLastName":"Ayotte",
    "CustomerContactPhoneNumber":"514-317-9317",
    "CustomerContactEmailAddress":"rayotte@processoft.com",
    "ServiceAddressStreet":"' . rand(10,19999) .' boul Cousineau 180",
    "ServiceAddressCity":"St-Hubert",
    "ServiceAddressProvince":"Quebec",
    "ServiceAddressPostalCode":"J3Y0E1",
    "ServiceAddressLat":' . ((4550483 +rand(0,50000)-25000)/100000) . ',
    "ServiceAddressLng":-' . ((7342995 +rand(0,50000)-25000)/100000) . ',
    "OperationType":1,
    "SizeOfTheContainerToBeDelivered":12,
    "SizeOfTheContainerToBePickedUp":null,
    "NameOfTheContainerToBePickedUp":"",
    "TypeOfWaste":"Mix",
    "RequestedFromTime":"2017-02-' . $reqDay . ' 05:0:0",
    "RequestedToTime":"2017-02-' . $reqDay . ' 19:0:0",
    "DriverNotes":"drivernoessssss",
    "DestinationAddressStreet":null,
    "DestinationAddressCity":null,
    "DestinationAddressPostalCode":null,
    "DestinationAddressProvince":null,
    "DestinationAddressLat":null,
    "DestinationAddressLng":null,
    "Urgency":1,
    "AmountToCollect":"0",
    "CompanyName":null,
    "EndCustomerId":521,
    "IsRecurrent":0
}';
 *
 */

