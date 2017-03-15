<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(ContactsTableSeeder::class);
         factory(App\Company::class,3)->create();

        $this->call(FmroorderTableSeeder::class);
        $this->call(FmroorderTableSeeder::class);
        $this->call(FmroorderTableSeeder::class);
        $this->call(FmroorderTableSeeder::class);
        $this->call(FmroorderTableSeeder::class);

        Eloquent::unguard();

        //$this->call('LaravelShopSeeder');

        Eloquent::reguard();
         
    }
}
