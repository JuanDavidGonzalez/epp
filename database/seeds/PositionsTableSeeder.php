<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert( ['name' => 'Operadores']);
        DB::table('positions')->insert( ['name' => 'Oficiales']);
        DB::table('positions')->insert( ['name' => 'Ayudantes']);
        DB::table('positions')->insert( ['name' => 'Ejero']);
        DB::table('positions')->insert( ['name' => 'Topografía']);
        DB::table('positions')->insert( ['name' => 'Auxiliar De Trafico']);
        DB::table('positions')->insert( ['name' => 'Maestro']);
        DB::table('positions')->insert( ['name' => 'Contra Maestro Director']);
        DB::table('positions')->insert( ['name' => 'Residente']);
        DB::table('positions')->insert( ['name' => 'Siso']);
        DB::table('positions')->insert( ['name' => 'Vigilante']);
        DB::table('positions')->insert( ['name' => 'Aseadores']);
        DB::table('positions')->insert( ['name' => 'Almacenista']);
        DB::table('positions')->insert( ['name' => 'Auxiliar De Almacen']);
        DB::table('positions')->insert( ['name' => 'Personal De Casino']);
        DB::table('positions')->insert( ['name' => 'Electricista']);
        DB::table('positions')->insert( ['name' => 'Soldador']);
        DB::table('positions')->insert( ['name' => 'Hidraulicos']);
        DB::table('positions')->insert( ['name' => 'Instaladores De Redes De Gas']);
        DB::table('positions')->insert( ['name' => 'Laboratorio']);

    }
}
