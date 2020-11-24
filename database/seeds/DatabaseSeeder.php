<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ItemTableSeeder::class);
        $this->call(ActivitiesTableSeeder::class);
        $this->call(ActivityRiskTableSeeder::class);
        $this->call(ActivityItemTableSeeder::class);

        //$this->call(UserTableSeeder::class);
        //$this->call(PositionsTableSeeder::class);
        //$this->call(RisksTableSeeder::class);
        //$this->call(ProcessTableSeeder::class);
        //$this->call(PositionProcessTableSeeder::class);
    }
}
