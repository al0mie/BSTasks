<?php

use Illuminate\Database\Seeder;

class MissionStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('missionstatus')->insert([
            'status' => 'planned',
        ]); 
        DB::table('missionstatus')->insert([
            'status' => 'in progress',
        ]); 
        DB::table('missionstatus')->insert([
            'status' => 'achieved',
        ]); 
        DB::table('missionstatus')->insert([
            'status' => 'cancelled',
        ]); 
    }
}
