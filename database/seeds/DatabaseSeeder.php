<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(MissionStatusSeeder::class);
        $this->command->info("Mission status table seeded :)");
        
        $this->call(GoalStatusSeeder::class);
        $this->command->info("Goal status table seeded :)");

        Model::reguard();
    }
}
