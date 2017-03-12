<?php

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->delete();
               DB::table('contacts')->insert([
            'first_name' => str_random(10),
            'last_name' => str_random(10),
            'email' => str_random(10).'@example.com',
            'department' => str_random(10).'@gmail.com',
            'title' => str_random(15),
            'status' =>'active?',  
        ]);
    }
}


           // $table->string('first_name');
           //  $table->string('last_name');
           //  $table->string('title');
           //  $table->string('department');
           //  $table->string('email');
           //  $table->string('status');