<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker = Faker::create();

       for ($i = 0; $i < 100; $i++) { 
        DB::table('users')->insert([
            'firstname' => $faker->firstName,
            'lastname' => $faker->lastName,
            'email' => $faker->email,
            'password'=>Hash::make('1')
        
        ]); 
    	}  
        
        DB::table('users')->insert([
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'alex.mokrencko@yandex.ru',
            'password' => Hash::make('1'),
            'admin' => '1'
        ]); 

          DB::table('users')->insert([
            'firstname' => 'Alex',
            'lastname' => 'ALEXI',
            'email' => 'alex.mokrencko@gmail.com',
            'password' => Hash::make('1'),
            'admin' => '0'
        ]); 
     }
}
