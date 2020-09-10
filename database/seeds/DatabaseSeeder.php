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
        Storage::deleteDirectory('projects');
        Storage::deleteDirectory('users');
        Storage::deleteDirectory('projects_images');

        Storage::makeDirectory('projects');
        Storage::makeDirectory('users');
        Storage::makeDirectory('projects_images');

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(TypeCategoriesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(LevelTableSeeder::class);
        $this->call(CountryTableSeeder::class);
        $this->call(LocationTableSeeder::class);
        $this->call(SurveyTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }


}
        
    //     /*=============================================
    //     INICIALIZANDO LAS IMAGENES
    //     =============================================*/
    //    Storage::deleteDirectory('projects');
    //    Storage::deleteDirectory('users');
    //    Storage::deleteDirectory('projects_images');

    //    Storage::makeDirectory('projects');
    //    Storage::makeDirectory('users');
    //    Storage::makeDirectory('projects_images');


    //     /*=============================================
    //       CREANDO LAS CATEGORIAS
    //      =============================================*/
    //     factory(\App\Category::class, 1)->create(['category' => 'Rock','slug' => str_slug('Rock')]);
    //     factory(\App\Category::class, 1)->create(['category' => 'Pop','slug' => str_slug('Pop')]);
    //     factory(\App\Category::class, 1)->create(['category' => 'Popular','slug' => str_slug('Popular')]);
    //     factory(\App\Category::class, 1)->create(['category' => 'Vallenato','slug' => str_slug('Vallenato')]);
    //     factory(\App\Category::class, 1)->create(['category' => 'Música Clásica','slug' => str_slug('Música Clásica')]);
    //     factory(\App\Category::class, 1)->create(['category' => 'Jazz','slug' => str_slug('Jazz')]);
    //     factory(\App\Category::class, 1)->create(['category' => 'Norteño','slug' => str_slug('Norteño')]);
    //     factory(\App\Category::class, 1)->create(['category' => 'Reggae','slug' => str_slug('Reggae')]);
    //     factory(\App\Category::class, 1)->create(['category' => 'Rap','slug' => str_slug('Rap')]);
    //     factory(\App\Category::class, 1)->create(['category' => 'Salsa','slug' => str_slug('Salsa')]);
    //     factory(\App\Category::class, 1)->create(['category' => 'Reggaeton','slug' => str_slug('Reggaeton')]);

    //     /*=============================================
    //      CREANDO LOS ROLES PARA LOS USUARIOS
    //      =============================================*/

    //    factory(\App\Role::class, 1)->create(['rol' => 'Admin']);
    //    factory(\App\Role::class, 1)->create(['rol' => 'Artist']);
    //    factory(\App\Role::class, 1)->create(['rol' => 'Backer']);
    //    factory(\App\Role::class, 1)->create(['rol' => 'Manage']);

    //     /*=============================================
    //     CREANDO LOS NIVELES PARA LOS ARTISTAS
    //     =============================================*/

    //     factory(\App\Level::class, 1)->create(['level' => 'Beginner']);
    //     factory(\App\Level::class, 1)->create(['level' => 'Intermediate']);
    //     factory(\App\Level::class, 1)->create(['level' => 'Professional']);

    //     /*=============================================
    //     CREANDO LAS CIUDADES PARA LOS PAISES
    //     =============================================*/

    //     factory(\App\City::class, 1)->create();
    //     factory(\App\City::class, 1)->create();
    //     factory(\App\City::class, 1)->create();
    //     factory(\App\City::class, 1)->create();
    //     factory(\App\City::class, 1)->create();

    //     /*=============================================
    //     CREANDO LOS PAISES
    //     =============================================*/

    //     factory(\App\Country::class, 1)->create(['country' => 'Colombia','flag' => '/backend/assets/app/media/img/countries/colombia.png']);
    //     factory(\App\Country::class, 1)->create(['country' => 'Venezuela','flag' => '/backend/assets/app/media/img/countries/venezuela.png']);
    //     factory(\App\Country::class, 1)->create(['country' => 'Ecuador','flag' => '/backend/assets/app/media/img/countries/ecuador.png']);
    //     factory(\App\Country::class, 1)->create(['country' => 'Perú','flag' => '/backend/assets/app/media/img/countries/peru.png']);
    //     factory(\App\Country::class, 1)->create(['country' => 'Brasil','flag' => '/backend/assets/app/media/img/countries/brazil.png']);
    //     factory(\App\Country::class, 1)->create(['country' => 'Panamá','flag' => '/backend/assets/app/media/img/countries/panama.png']);
    //     factory(\App\Country::class, 1)->create(['country' => 'Paraguay','flag' => '/backend/assets/app/media/img/countries/paraguay.png']);
    //     factory(\App\Country::class, 1)->create(['country' => 'Uruguay','flag' => '/backend/assets/app/media/img/countries/uruguay.png']);
    //     factory(\App\Country::class, 1)->create(['country' => 'Argentina','flag' => '/backend/assets/app/media/img/countries/argentina.png']);
    //     factory(\App\Country::class, 1)->create(['country' => 'Chile','flag' => '/backend/assets/app/media/img/countries/chile.png']);
    //     factory(\App\Country::class, 1)->create(['country' => 'Mexico','flag' => '/backend/assets/app/media/img/countries/mexico.png']);
    //     factory(\App\Country::class, 1)->create(['country' => 'Puerto Rico','flag' => '/backend/assets/app/media/img/countries/puerto-rico.png']);
    //     factory(\App\Country::class, 1)->create(['country' => 'Guatemala','flag' => '/backend/assets/app/media/img/countries/guatemala.png']);
    //     factory(\App\Country::class, 1)->create(['country' => 'Cuba','flag' => '/backend/assets/app/media/img/countries/cuba.png']);
    //     factory(\App\Country::class, 1)->create(['country' => 'El Salvador','flag' => '/backend/assets/app/media/img/countries/el-salvador.png']);
    //     factory(\App\Country::class, 1)->create(['country' => 'República Dominicana','flag' => '/backend/assets/app/media/img/countries/dominican-republic.png']);
    //     factory(\App\Country::class, 1)->create(['country' => 'Honduras','flag' => '/backend/assets/app/media/img/countries/honduras.png']);
    //     factory(\App\Country::class, 1)->create(['country' => 'Nicaragua','flag' => '/backend/assets/app/media/img/countries/nicaragua.png']);
    //     factory(\App\Country::class, 1)->create(['country' => 'Bolivia','flag' => '/backend/assets/app/media/img/countries/bolivia.png']);
    //     factory(\App\Country::class, 1)->create(['country' => 'Estados Unidos','flag' => '/backend/assets/app/media/img/countries/united-states.png']);
    //     factory(\App\Country::class, 1)->create(['country' => 'Costa Rica','flag' => '/backend/assets/app/media/img/countries/costa-rica.png']);

    //     /*=============================================
    //     CREANDO LAS LOCALIZACIONES
    //     =============================================*/

    //     factory(\App\Location::class, 1)->create(['country' => 'Colombia','flag' => '/backend/assets/app/media/img/countries/colombia.png']);
    //     factory(\App\Location::class, 1)->create(['country' => 'Venezuela','flag' => '/backend/assets/app/media/img/countries/venezuela.png']);
    //     factory(\App\Location::class, 1)->create(['country' => 'Ecuador','flag' => '/backend/assets/app/media/img/countries/ecuador.png']);
    //     factory(\App\Location::class, 1)->create(['country' => 'Perú','flag' => '/backend/assets/app/media/img/countries/peru.png']);
    //     factory(\App\Location::class, 1)->create(['country' => 'Brasil','flag' => '/backend/assets/app/media/img/countries/brazil.png']);
    //     factory(\App\Location::class, 1)->create(['country' => 'Panamá','flag' => '/backend/assets/app/media/img/countries/panama.png']);
    //     factory(\App\Location::class, 1)->create(['country' => 'Paraguay','flag' => '/backend/assets/app/media/img/countries/paraguay.png']);
    //     factory(\App\Location::class, 1)->create(['country' => 'Uruguay','flag' => '/backend/assets/app/media/img/countries/uruguay.png']);
    //     factory(\App\Location::class, 1)->create(['country' => 'Argentina','flag' => '/backend/assets/app/media/img/countries/argentina.png']);
    //     factory(\App\Location::class, 1)->create(['country' => 'Chile','flag' => '/backend/assets/app/media/img/countries/chile.png']);
    //     factory(\App\Location::class, 1)->create(['country' => 'Mexico','flag' => '/backend/assets/app/media/img/countries/mexico.png']);
    //     factory(\App\Location::class, 1)->create(['country' => 'Puerto Rico','flag' => '/backend/assets/app/media/img/countries/puerto-rico.png']);
    //     factory(\App\Location::class, 1)->create(['country' => 'Guatemala','flag' => '/backend/assets/app/media/img/countries/guatemala.png']);
    //     factory(\App\Location::class, 1)->create(['country' => 'Cuba','flag' => '/backend/assets/app/media/img/countries/cuba.png']);
    //     factory(\App\Location::class, 1)->create(['country' => 'El Salvador','flag' => '/backend/assets/app/media/img/countries/el-salvador.png']);
    //     factory(\App\Location::class, 1)->create(['country' => 'República Dominicana','flag' => '/backend/assets/app/media/img/countries/dominican-republic.png']);
    //     factory(\App\Location::class, 1)->create(['country' => 'Honduras','flag' => '/backend/assets/app/media/img/countries/honduras.png']);
    //     factory(\App\Location::class, 1)->create(['country' => 'Nicaragua','flag' => '/backend/assets/app/media/img/countries/nicaragua.png']);
    //     factory(\App\Location::class, 1)->create(['country' => 'Bolivia','flag' => '/backend/assets/app/media/img/countries/bolivia.png']);
    //     factory(\App\Location::class, 1)->create(['country' => 'Estados Unidos','flag' => '/backend/assets/app/media/img/countries/united-states.png']);
    //     factory(\App\Location::class, 1)->create(['country' => 'Costa Rica','flag' => '/backend/assets/app/media/img/countries/costa-rica.png']);


    //     /*=============================================
    //     CREANDO UN USUARIO ADMINISTRADOR DEL SISTEMA
    //     =============================================*/

    //    factory(\App\User::class, 1)->create([
    //       'name' => 'admin',
    //        'email' => 'admin@gmail.com',
    //        'password' => bcrypt('secret')
    //    ])->each(function (\App\User $u){
    //       $u->roles()->attach(['1']);
    //    });

    //     /*=============================================
    //      CREANDO 50 USUARIOS POR DEFECTO Y LE ESTAMOS ASIGNANDO UN ARTISTA
    //     =============================================*/
    //     $artis = null;
    //    factory(\App\User::class, 50)->create()
    //        ->each(function (\App\User $u){
    //           factory(\App\Artist::class, 1)->create(['user_id' => $u->id]);
    //           $u->roles()->attach(['2','3']);
    //        });

    //     /*=============================================
    //       CREANDO 10 USUARIOS POR DEFECTO Y LE ESTAMOS ASIGNANDO UN MANAGEMENT
    //      =============================================*/

    //     factory(\App\User::class, 10)->create()
    //         ->each(function (\App\User $u){
    //             factory(\App\Management::class, 1)->create(['user_id' => $u->id])->each(function (\App\Management $m){
    //                 $categories= mt_rand(1,10);
    //                 $m->categories()->attach($categories);
    //             });
    //             $u->roles()->attach(['4']);
    //         });

    //     /*=============================================
    //      CREANDO 50 PROYECTOS POR DEFECTO Y LE ESTAMOS ASIGNANDO UN DONACIONES, REVIEWS, RECOMPENSAS
    //     =============================================*/

    //     factory(\App\Project::class,60)
    //         ->create()
    //         ->each(function (\App\Project $p){
    //             $p->donations()->saveMany(factory(\App\Donation::class, 10)->create());
    //             $p->reviews()->saveMany(factory(\App\Review::class, 4)->create());
    //             $p->rewards()->saveMany(factory(\App\Reward::class, 3)->create());
    //             $p->updates()->saveMany(factory(\App\Update::class, 4)->create());
    //             $artist= mt_rand(1,50);
    //             $manage = mt_rand(1,10);
    //             $p->artists()->attach($artist);
    //             $p->management()->attach($manage);
    //         });
    //     /*=============================================
    //     CREANDO IMAGENES PARA LOS PROYECTOS
    //    =============================================*/
    //     factory(\App\ProjectImage::class,60)->create();
    // }
// }
