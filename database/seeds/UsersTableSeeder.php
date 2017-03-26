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
         DB::table('users')->insert([
            'name' => 'ADMINISTRADOR',
            'email' => 'Admin',
            'password' => bcrypt('11'),
            'tipo_usuario' => 'Administrador',
            'codigoAndroid' => '11'
        ]);
    }
}
