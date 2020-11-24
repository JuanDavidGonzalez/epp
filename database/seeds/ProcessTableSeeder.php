<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProcessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('processes')->insert(['name' => 'Urbanismo']);
        DB::table('processes')->insert(['name' => 'Mampostería']);
        DB::table('processes')->insert(['name' => 'Descapote']);
        DB::table('processes')->insert(['name' => 'Demolición']);
        DB::table('processes')->insert(['name' => 'Acabados']);
        DB::table('processes')->insert(['name' => 'Estructuras']);
        DB::table('processes')->insert(['name' => 'Cimentación']);

    }
}
