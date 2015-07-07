<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) { 
    		DB::table('users')->insert([
            'firstname' => 'Name #'. $i,
            'lastname' => 'Surname #' . $i,
            'email' => 'user' . $i . '@example.com',
        
        ]); 
    	}   
     }
}
