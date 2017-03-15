<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFmroorderresultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('fmroorderresult', function (Blueprint $table) {
            $table->string("OrderNumber");
            $table->integer('LoadWeight')->nullable();
            $table->integer('DeliveredContainerSize')->nullable();
            $table->integer('OrderStatusId')->nullable();
            $table->string('DumpsiteName')->nullable();
            $table->string('PickedUpContainerName')->nullable();
            $table->string('DeliveredContainerName')->nullable();
            $table->string('ScaleTicketNumber')->nullable();
            $table->string('DispatcherNotes')->nullable();
            $table->string('VehicleName')->nullable();
            $table->string('TypeOfWaste')->nullable();
            $table->boolean('IsRecurrent')->nullable();
            $table->dateTime('OrderCompletionTime')->nullable();
            $table->dateTime('OrderStartTime')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->primary('OrderNumber');
            $table->foreign("OrderNumber")->references('OrderNumber')->on('fmroorder');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fmroorderresult');
    }
}

/*
 * {
  "OrderNumber": "513191",
  "OrderStatusId": "4",
  "OrderCompletionTime": "2017-03-13 04:18:40",
  "DeliveredContainerName": null,
  "PickedUpContainerName": "12-1201",
  "DeliveredContainerSize": null,
  "ScaleTicketNumber": "1234555",
  "LoadWeight": "4500",
  "DispatcherNotes": null,
  "VehicleName": "V2",
  "TypeOfWaste": "Mix",
  "IsRecurrent": null,
  "OrderStartTime": "2017-03-13 04:17:51",
  "DumpsiteName": "D\u00e9charge 1"
}
*/
