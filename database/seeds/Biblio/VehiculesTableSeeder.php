<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehiculesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vehicules = array(
            array(
                'name' => 'camion1',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ),
            array(
                'name' => 'camion2',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ),
            array(
                'name' => 'camion3',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ),
            array(
                'name' => 'camion4',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            )
        );

        DB::table('vehicules')->insert($vehicules);
    }
}
