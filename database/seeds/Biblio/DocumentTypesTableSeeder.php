<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\DisableForeignKeys;

class DocumentTypesTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        $documentTypes = array(
            array(
                'title' => 'formulaire inspection1',
                'updated_at' => Carbon\Carbon::now(),
                'created_at' => Carbon\Carbon::now()
            ),
            array(
                'title' => 'formulaire inspection2',
                'updated_at' => Carbon\Carbon::now(),
                'created_at' => Carbon\Carbon::now()
            ),
            array(
                'title' => 'formulaire inspection3',
                'updated_at' => Carbon\Carbon::now(),
                'created_at' => Carbon\Carbon::now()
            ),
            array(
                'title' => 'formulaire inspection4',
                'updated_at' => Carbon\Carbon::now(),
                'created_at' => Carbon\Carbon::now()
            ),
            array(
                'title' => 'formulaire inspection5',
                'updated_at' => Carbon\Carbon::now(),
                'created_at' => Carbon\Carbon::now()
            ),
            array(
                'title' => 'formulaire inspection6',
                'updated_at' => Carbon\Carbon::now(),
                'created_at' => Carbon\Carbon::now()
            ),
            array(
                'title' => 'formulaire inspection7',
                'updated_at' => Carbon\Carbon::now(),
                'created_at' => Carbon\Carbon::now()
            ),
            array(
                'title' => 'formulaire inspection8',
                'updated_at' => Carbon\Carbon::now(),
                'created_at' => Carbon\Carbon::now()
            )
        );

        DB::table('document_types')->insert($documentTypes);

        $this->enableForeignKeys();
    }
}
