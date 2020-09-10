<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        Role::create([
            'rol'=>'Admin',
            'description'=>'rol del administrador tiene todos los permisos'
        ]);

        Role::create([
            'rol'=>'Artist',
            'description'=>'rol del artista'
        ]);

        Role::create([
            'rol'=>'Backer',
            'description'=>'rol de patrocinador'
        ]);

        Role::create([
            'rol'=>'Manage',
            'description'=>'rol de patrocinador'
        ]);

    }
}
