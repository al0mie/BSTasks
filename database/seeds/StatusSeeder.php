<?php

use Illuminate\Database\Seeder;

class GoalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert([
            'status' => 'planned',
        ]); 
         DB::table('goalstatus')->insert([
            'status' => 'in progress',
        ]); 
          DB::table('goalstatus')->insert([
            'status' => 'completed',
        ]); 
           DB::table('goalstatus')->insert([
            'status' => 'cancelled',
        ]); 

    }
}
