<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*=============================================
CONSULTAS DE PRUEBAS
=============================================*/

Route::get('test' , function (){
    // Artisan::call('projects:close');
    // dd(\App\Category::where('typeCategory_id', 2)->get());
    dd(App\Project::where('status', 1)->count());
});


    // Artisan::call('projects:close');
    // dd(\App\Category::where('typeCategory_id', $id_category)->get());




Route::get('email',function (){
    $project = \App\Project::where('id',65)->first();

    return new \App\Mail\NewProjectArtist($project,'admin');
});
Route::get('fecha',function (){
    $date = date('Y-m-d H:i:s');
   $semana2 = date("Y-m-d H:i:s",strtotime($date."+ 2 week"));
    echo  $semana2;
});
Route::get('/count/{id}',function ($id){
    $hola = \App\Management::select('id')->where('user_id',$id)->first();
     dd($hola->id);
});
Route::get('/projects-sql',function (){
   $projects = \App\Artist::where('user_id',auth()->user()->id)->exists();
   dd($projects);
});
Route::get('/team-all/{id}',function ($id){
    $artists = \App\Project::where('id',$id)->with('teams')->get();
   return datatables()->of($artists)->toJson();
});
Route::get('/managements/{id}',function ($id){
  /* $manage_project = \Illuminate\Support\Facades\DB::table('management_project')
       ->select('project_id')->where('management_id',1)
       ->get();
    $array_project = array();
   for ( $i=0; $i<count($manage_project); $i++) {
       $projects = \App\Project::where('id', $manage_project[$i]->project_id)->with('artists')->get();
       $json_project = json_decode($projects);
       array_push($array_project,$json_project);
   }

   $project = \App\Project::whereHas('management', function ($query) {
       $query->where('managements.id', '=', 1);
   })->get();

    return datatables()->of($project)->toJson();*/

    $projects = \App\Artist::where('user_id',$id)->with(
            [   'users',
                'countries',
                'projects' => function ($q){
                    $q->select('*')
                        ->where('status',\App\Project::APPROVAL)
                        ->OrWhere('status',\App\Project::PUBLISHED);
                }
            ])->latest()
            ->first();

        return $projects;
});
/*=============================================
SELECCIONAR IDIOMAS
=============================================*/
Route::get('/set_language/{lang}','Controller@setLanguage')->name('set_language');

/*=============================================
FRONTEND
=============================================*/
Route::group(['namespace'=>'Frontend'],function (){
    //Rutas para el modulo HOME
    Route::get('/','HomeController@index')->name('home');

    //Rutas para el modulo PROJECTS
    Route::get('/projects','ProjectsController@index')->name('projects');
    Route::get('/about-us','HomeController@nosotros')->name('about-us');
    Route::get('/info-artist','HomeController@artist')->name('info-artist');
    Route::get('/info-backer','HomeController@backer')->name('info-backer');

    Route::get('/projects/{project}','ProjectsController@show')->name('projects.show');
    Route::get('/projectsArt/{user}','ProjectsController@projectArtist')->name('projects.artist');

    Route::get('/projects-for-category','ProjectsController@getByCategory');
    Route::get('/projects-for-category-completed','ProjectsController@getByCategoryCompleted');


    //Rutas para las Categorias
    Route::get('/projects/category/{category}','CategoriesController@show')->name('categories.show');
});

/*=============================================
BACKEND
=============================================*/
Route::group(['namespace'=>'Backend','prefix' => 'dashboard','middleware' => 'auth'],function (){
    //Rutas para el modulo Dashboard
    Route::get('/','DashboardController@index')->name('dashboard');

    //Rutas para el modulo Artistas
    Route::get('/artists','ArtistsController@index')->name('index.artists');
    Route::get('/artists-all-table','ArtistsController@table_all_artists')->name('all.artists.table');


    //RUTAS PARA EL PERFIL
    //Perfil Artista
    Route::get('/profile','ProfileController@index_artist')->name('profile.artist');
    Route::post('/profile-photo-artist','ProfileController@photo')->name('profile.photo.artist');
    Route::post('/front-photo-artist','ProfileController@front_photo')->name('front.photo.artist');
    Route::put('/update-profile-artist/{id_artis}','ProfileController@profile_update_artist')->name('update.profile.artist');
    Route::post('/update-password-artist','ProfileController@update_password')->name('update.password.artist');
    //Proyectos del Artista
    Route::get('/my-projects','MyProjectsController@index_artist')->name('myprojects.artist');
    //Apoyos hechos
    Route::get('/backings-made','BackingsMadeController@index_artist')->name('backings.made.artist');

    //RUTAS PARA AGREGAR PROYECTOS
    Route::get('/new-project','AddProjectController@index')->name('add.project');
    Route::post('/add-project-imagen','AddProjectController@upload_image')->name('add.project.image');
    Route::post('/add-project','AddProjectController@store')->name('add.store.project');
    Route::get('/categories_by_id/{id_category}' , 'AddProjectController@categoryById');

    //RUTAS PARA VER EL PROJECT
    Route::get('/project/{project}','ShowProjectController@index')->name('show.backend.project');
    Route::get('/team-all/{id}',function ($id){
        $teams = \App\Project::where('id',$id)->with('teams')->get()[0]->teams;
        return datatables()->of($teams)->toJson();
    })->name('team-artist');


    //RUTAS PARA EL ADMINISTRADOR DEL SISTEMA -------------------------------------------------------------------------------------------

    //Todos los proyectos....
    Route::get('/managements','ShowProjectController@table_assing_management')->name('assign.managements');
    Route::group(['middleware' => 'admin_permisos'],function (){

        Route::get('/projects-approved', 'Admin\ProjectsApprovedController@index')->name('projects.approved');
        Route::post('publicarProject', 'Admin\ProjectsApprovedController@togglePublish');
        //Lista proyectos managements
        Route::get('/projects-admin', 'Admin\ProjectsAdminController@index')->name('projects.admin');
        Route::put('/project-rejected-admin','Admin\ProjectsAdminController@rejected_project')->name('project.admin.rejected');
        Route::get('/datatables-projects-admin','Admin\ProjectsAdminController@table_projects')->name('datatables.projects.admin');
        Route::get('/datatables-projects-admin-approved','Admin\ProjectsAdminController@table_projects_approved')->name('datatables.projects.admin.approved');
        Route::get('/datatables-managements-admin','Admin\ProjectsAdminController@table_managements')->name('datatables.management.admin');
        //Lista de managaments
        Route::get('/managements-admin','Admin\ManagementsController@index')->name('managements.admin');
        Route::post('/add-management-admin','Admin\ManagementsController@store')->name('add.management.admin');
        //ruta para el perfil del admin
        Route::get('/profile-admin/{user}','Admin\ProfileAdminController@indexAdmin')->name('profile.admin');
        Route::post('/update-password-admin','Admin\ProfileAdminController@update_password_admin')->name('update.password.admin');
        Route::post('/profile-photo-admin','Admin\ProfileAdminController@photo_admin')->name('profile.photo.admin');

        Route::post("/projects-news", "Admin\DashboardAdminController@showProyect")->name("admin.projects_news");
        Route::post("/top-countries", "Admin\DashboardAdminController@showTopCountry")->name("admin.top_country");

    });

    //RUTAS PARA EL MANAGEMENT -------------------------------------------------------------------------------------------
    Route::group(['middleware' => 'manage_permisos'],function (){
        Route::get('/projects-management', 'Manage\ProjectsManageController@index')->name('projects.manage');
        Route::get('datatables-projects-manage','Manage\ProjectsManageController@table_projects')->name('datatables.projects.manage');
        //CALIFICAR PROYECTO POR EL MANAGEMENT
        Route::post('/update-review-management','Manage\ProjectsManageController@add_review')->name('update.review.management');
    });
    Route::get('/profile-managament/{user}','Manage\ProfileController@index')->name('profile.managament');
    Route::get('/profile-my_proyects/{user}','Manage\ProfileController@my_proyects')->name('profile.managament.myProyects');
    Route::put('/update-info-profile-manage/{id}','Manage\ProfileController@update_profile_management')->name('update.profile.management');
    Route::post('/profile-photo-management','Manage\ProfileController@photo_management')->name('profile.photo.management');
    Route::get('datatables-projects-profile-manage','Manage\ProfileController@table_proyects')->name('datatables.projects.profile.manage');
    Route::post('/update-password-management','Manage\ProfileController@update_password_management')->name('update.password.management');
    Route::get('/backings-made-magement/{user}','Manage\BackingsMadeController@index')->name('backings.made.manage');



    //Enviar Mensajes a managers
    Route::post("send-project-management", "Admin\ProjectsAdminController@send_project_management")->name("send.project.admin");

});

/*=============================================
RUTAS PARA LOGIN REDES SOCIALES
=============================================*/
Route::get('login/{driver}','Auth\LoginController@redirectToProvider')->name('social_auth');
Route::get('login/{driver}/callback','Auth\LoginController@handleProviderCallback');
/*=============================================
AUTH RUTAS DE SEGURIDAD
=============================================*/
Auth::routes();

Route::get('/images/{path}/{attachment}', function ($path, $attachment){
    $file = sprintf('storage/%s/%s',$path,$attachment);
    if (File::exists($file)){
        return \Intervention\Image\Facades\Image::make($file)->response();
    }
});

Route::post("registrar","Auth\RegisterController@registrar")->name("registrar");


/*=============================================
AUTH RUTAS DE SEGURIDAD
=============================================*/

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');


Route::get('/test', function () {
    $project = \App\Project::with(['artists','management'])->get();
    $artist = count($project[0]->artists)>0?$project[0]->artists[0]:null;

    foreach($project[0]->management as $management){
        $managementUser = $management->users;
        $managementUser->notify(new \App\Notifications\UpdatedProject($project[0]));
    }
    if ($artist) {
        $artist->users()->first()->notify(new \App\Notifications\UpdatedProject($project[0]));
    }
});


Route::resource('project-message', 'Backend\ProjectMessageController');
Route::get('project-message-artist', 'Backend\ProjectMessageController@showProjectsByArtist');
Route::patch('notification-read/{id}', 'Backend\NotificationController@read');
