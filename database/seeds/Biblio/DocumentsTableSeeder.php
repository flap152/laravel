<?php

use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

class DocumentsTableSeeder extends Seeder
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

        $documents = array(

            array(
                'title' => 'formulaire inspection1',
                'document_type_id' => 1,
                'vehicule_id' => 1,
                'user_id' => 1,
                'document_date' => date('Y-m-d h:m:s'),
                'localpath' => 'lien',
                'updated_at' => Carbon\Carbon::now(),
                'created_at' => Carbon\Carbon::now()

            ),
            array(
                'title' => 'formulaire inspection2',
                'document_type_id' => 2,
                'vehicule_id' => 2,
                'user_id' => 2,
                'localpath' => 'lien',
                'document_date' => date('Y-m-d h:m:s'),
                'updated_at' => Carbon\Carbon::now(),
                'created_at' => Carbon\Carbon::now()
            ),
            array(
                'title' => 'formulaire inspection3',
                'document_type_id' => 2,
                'vehicule_id' => 3,
                'user_id' => 3,
                'localpath' => 'lien',
                'document_date' => date('Y-m-d h:m:s'),
                 'updated_at' => Carbon\Carbon::now(),
                'created_at' => Carbon\Carbon::now()
            ),
            array(
                'title' => 'formulaire inspection4',
                'document_type_id' => 1,
                'vehicule_id' => 4,
                'user_id' => 1,
                'localpath' => 'lien',
                'document_date' => date('Y-m-d h:m:s'),
                'updated_at' => Carbon\Carbon::now(),
                'created_at' => Carbon\Carbon::now()
            ),
            array(
                'title' => 'formulaire inspection5',
                'document_type_id' => 2,
                'vehicule_id' => 1,
                'user_id' => 2,
                'localpath' => 'lien',
                'document_date' => date('Y-m-d h:m:s'),
                'updated_at' => Carbon\Carbon::now(),
                'created_at' => Carbon\Carbon::now()
            ),
            array(
                'title' => 'formulaire inspection6',
                'document_type_id' => 1,
                'vehicule_id' => 2,
                'user_id' => 3,
                'localpath' => 'lien',
                'document_date' => date('Y-m-d h:m:s'),
                'updated_at' => Carbon\Carbon::now(),
                'created_at' => Carbon\Carbon::now()
            ),
            array(
                'title' => 'formulaire inspection7',
                'document_type_id' => 2,
                'vehicule_id' => 3,
                'user_id' => 1,
                'localpath' => 'lien',
                'document_date' => date('Y-m-d h:m:s'),
                'updated_at' => Carbon\Carbon::now(),
                'created_at' => Carbon\Carbon::now()
            ),
            array(
                'title' => 'formulaire inspection8',
                'document_type_id' => 1,
                'vehicule_id' => 3,
                'user_id' => 2,
                'localpath' => 'lien',
                'document_date' => date('Y-m-d h:m:s'),
                'updated_at' => Carbon\Carbon::now(),
                'created_at' => Carbon\Carbon::now()
            )
        );

        DB::table('documents')->insert($documents);

        $this->enableForeignKeys();
    }
}
