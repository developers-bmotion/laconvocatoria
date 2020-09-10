<?php

use Illuminate\Database\Seeder;
use App\User;
use \App\Management;
use  \App\Artist;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         User::truncate();
         Management::truncate();
         Artist::truncate();
        $admin = User::create([

            'name'=>'John Jairo',
            'last_name'=>'Llorente',
            'picture'=>'/backend/assets/app/media/img/users/perfil.jpg',
            'front_picture'=>'/backend/assets/app/media/img/users/perfil.jpg',
            'phone_1'=>'333333333',
            'phone_2'=>'333333333',
            'state'=>'1',
            'slug'=>'john-llorente',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('secret')

        ]);

        $admin->roles()->attach(['1']);
        $manage = User::create([

            'name'=>'Omar',
            'last_name'=>'Sanchez',
            'picture'=>'/backend/assets/app/media/img/users/perfil.jpg',
            'phone_1'=>'333333333',
            'phone_2'=>'333333333',
            'state'=>'1',
            'slug'=>'omar-sanchez',
            'email'=>'odsanchez@gmail.com',
            'password'=>bcrypt('secret')

        ]);
        $manage->roles()->attach(['4']);
        $add_management = Management::create([
            'user_id' => $manage->id,
            'country_id' => '1'
        ]);

        $add_management->categories()->attach(['2','3']);

        $artist = User::create([

            'name'=>'Cristian Salazar',
            'last_name'=>'Salazar',
            'picture'=>'/backend/assets/app/media/img/users/perfil.jpg',
            'phone_1'=>'333333333',
            'phone_2'=>'333333333',
            'state'=>'1',
            'slug'=>'cristian-salazar',
            'email'=>'casalazar@gmail.com',
            'password'=>bcrypt('secret')
        ]);

        $artist->roles()->attach(['2','3']);
        $artista = new Artist;
        $artista->user_id = $artist->id;
        $artista->save();
    }
}
