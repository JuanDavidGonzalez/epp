<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->insert([
            'display_name' => 'Coordinador',
            'name' => 'coordinator',
        ]);

        DB::table('roles')->insert([
            'display_name' => 'Operario',
            'name' => 'operator',
        ]);

        $user = \App\User::create([
            'email' => 'root@epp.com',
            'password' =>  'secret',
            'name' =>  'Root',
            'role_id' => 1,
            'position' => 'Administrador'
        ]);


    }
}
