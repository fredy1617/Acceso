<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->truncate();
        
        DB::table('users')->insert([
        	'Nombre' => 'Omar',
        	'Apellidos' => 'Ledezma Escobedo', 
        	'email' => 'oledezma@zac.conalep.edu.mx', 
        	'password' => bcrypt('omar1234'),
        	'Rol' => 'ADMINISTRADOR',
        	'Plantel' => 'Zacatecas'
        ]);
    }
}
