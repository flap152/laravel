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
        Schema::table('fmroorder', function (Blueprint $table) {
            $table->dateTime('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('fmroorder', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
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

