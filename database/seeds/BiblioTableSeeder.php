<?php

use Illuminate\Database\Seeder;

class BiblioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(VehiculesTableSeeder::class);
        $this->call(DocumentsTableSeeder::class);
        $this->call(DocumentTypesTableSeeder::class);
    }
}
