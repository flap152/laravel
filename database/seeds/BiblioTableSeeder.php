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
        $this->call(TestVehiculesTableSeeder::class);
        $this->call(TestDocumentsTableSeeder::class);
        $this->call(TestDocumentTypesTableSeeder::class);
    }
}
