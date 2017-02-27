<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Generator;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // use the factory to create a Faker\Generator instance
        $faker = Faker\Factory::create();

        $fname = $faker->firstName;
        DB::table('users')->insert([
            'name' => $fname . ' ' . $faker->lastName,
            'email' => $fname.'@example.com',
            'password' => bcrypt('secret'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('users')->updateOrInsert([
            'name' => "Frank1",
            'email' => 'flap_152@yahoo.ca',
            'password' => bcrypt('xA2ZYwy7BTmwD'),
        ]);

        // With factory (only override the column you want to set with a value)
        $user = factory(App\User::class)->make([
            'name' => "Frank2",
            'email' => 'flap_1522@yahoo.ca',
            'password' => bcrypt('xA2ZYwy7BTmwD'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('users')->updateOrInsert([
            'name' => 'Nath',
            'email' => 'nath@processoft.com',
            'password' => bcrypt('zzzzzz'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $fname = $faker->firstName;
        DB::table('users')->updateOrInsert ([
            'name' => $fname . ' ' . $faker->lastName,
            'email' => $fname.'@example.com',
            'password' => bcrypt('secret'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}


           // $table->string('first_name');
           //  $table->string('last_name');
           //  $table->string('title');
           //  $table->string('department');
           //  $table->string('email');
           //  $table->string('status');