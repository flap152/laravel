<?php

use Illuminate\Database\Seeder;
use Faker\Generator;

class FmroorderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // use the factory to create a Faker\Generator instance
        $faker = Faker\Factory::create('fr_CA');
        $uniqueID = rand(500000,599999);
# a new order with a uniqueID
        $reqDay = rand(20,28);
#$reqDay= '03';

        $fname = $faker->firstName;
        DB::table('fmroorder')->insert([
            'OrderNumber'=> $uniqueID,
            'VendorPoNumber'=> $uniqueID,
            'CustomerPoNumber'=> $uniqueID,
            'CustomerName'=>'Construction '. $faker->company,
            'CustomerBillingAddressStreet'=>$faker->randomNumber(4) . ' ' . $faker->streetName ,
            'CustomerBillingAddressCity'=>$faker->city ,
            'CustomerBillingAddressProvince'=>"Quebec",
            'CustomerBillingAddressPostalCode'=>$faker->postcode,
            'CustomerContactFirstName'=>$faker->firstName,
            'CustomerContactLastName'=>$faker->lastName,
            'CustomerContactPhoneNumber'=>$faker->phoneNumber,
            'CustomerContactEmailAddress'=>$faker->email,
            'ServiceAddressStreet'=> $faker->randomNumber(4) . ' ' . $faker->streetName ,
            'ServiceAddressCity'=> $faker->city ,
            'ServiceAddressProvince'=>"Quebec",
            'ServiceAddressPostalCode'=> $faker->postcode,
           // 'ServiceAddressLat'=> ((4550483 +rand(0,50000)-25000)/100000)  ,
           // 'ServiceAddressLng'=> -((7342995 +rand(0,50000)-25000)/100000)  ,
            'ServiceAddressLat'=> $faker->latitude(45.250, 45.8 )  ,
            'ServiceAddressLng'=> $faker->latitude(-73.75, -73.0)  ,
            'OperationType'=>1,
            'SizeOfTheContainerToBeDelivered'=>$faker->randomElement($array = array ('8','12','20',40)),
            'SizeOfTheContainerToBePickedUp'=>null,
            'NameOfTheContainerToBePickedUp'=>"",
            'TypeOfWaste'=>"Mix",
            'RequestedFromTime'=> '2017-02-' . $reqDay .  " 05:0:0",
            'RequestedToTime'=> '2017-02-' . $reqDay . " 19:0:0",
            'DriverNotes'=>"",
            'DestinationAddressStreet'=>null,
            'DestinationAddressCity'=>null,
            'DestinationAddressPostalCode'=>null,
            'DestinationAddressProvince'=>null,
            'DestinationAddressLat'=>null,
            'DestinationAddressLng'=>null,
            'Urgency'=>1,
            'AmountToCollect'=>"0",
            'CompanyName'=>null,
            'EndCustomerId'=>521,
            'IsRecurrent'=>0,
            'created_at'=>\Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now(),
        ]);




      }
}


