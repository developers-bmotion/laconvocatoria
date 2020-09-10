<?php

namespace App\Http\Controllers\Backend;

use App\Artist;
use App\Category;
use App\EndProject;
use App\Mail\AssignProjectManager;
use App\Mail\NewProjectArtist;
use App\Project;
use App\Survey;
use App\typeCategories;
use App\Team;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class AddProjectController extends Controller
{
    public function index (){
        $categories = Category::all();
        $artist_id = Artist::select('id')->where('user_id',auth()->user()->id)->first();
        $artist = Artist::select('nickname','biography','level_id','country_id')
            ->where('user_id', auth()->user()->id)->first();
            $question=Survey::with('question','question.answer')->get();
            $numProject=DB::table('artist_projects')->select('id')->where('artist_id', '=', $artist_id->id)->get();
            $contProject=count($numProject);
            $tipoCategorias=typeCategories::all();

        if ($artist->nickname == null){
            return redirect(route('profile.artist'))->with('eliminar',__('completa_perfil_artista'));
        }else{
            return view('backend.projects.add-project',compact('categories','artist_id','question','contProject','tipoCategorias'));
        }
    }

    public function categoryById(Request $request, $id){
        if($request->ajax()){
            $categories= Category::where('typeCategory_id',$id)->get();
            return response()->json($categories);
        }
        // Category::where('typeCategory_id', $id_category)->get();
    }

    public function upload_image(Request $request){
        $image = $request->file('image')->store('projects');

        /* $url_go_input = Storage::url($image);
        $url = str_ireplace($request->root(),'',$url_go_input); */

       return '/storage/'.$image;
    }

    public function store (Request $request){
        $slug = str_slug($request->get('title'));
        $ramdoNum = mt_rand(1,10000);
        $project_exist = Artist::where('user_id',auth()->user()->id)->with('projects')->first();
        $project = Project::create([
            'title' => ucfirst($request->get('title')),
            'short_description' => ucfirst($request->get('short_description')),
            'project_picture' => $request->get('project_picture'),
            'iframe_video' => $request->get('iframe_video'),
            'category_id' => $request->get('category_id'),
            'type_categories_id' => $request->get('tCategory_id'),
            'status' => $request->get('status'),
            'price' => $request->get('price'),
            'slug' => $slug.'-'.$ramdoNum
        ]);
        if ($request->get('select_solista') != 1){
            if ($request->get('nombres') != null ){
                for ($i = 0; $i < count($request->get('nombres')); $i++) {

                    $team = new Team();
                    $team->name = ucwords($request->get('nombres')[$i]);
                    $team->role = ucwords($request->get('rol')[$i]);
                    $team->save();
                    $project->teams()->attach($team);
                }
            }
        }



        $ans=Artist::findOrFail($request->get('artist_id'));
        $ans->answers()->attach($request->get('questionGroup'));

        $project->artists()->attach($request->get('artist_id'));
        $artist = Artist::select('nickname')->where('id',$request->get('artist_id'))->first();
        \Mail::to('silviotista93@gmail.com')->send(new NewProjectArtist($project,auth()->user()->name));
        alert()->success(__("projectCreated"),__('projectCreatedTitle'))->autoClose(3000);
        $count_project = count($project_exist->projects);
        $name_artist = $project_exist->nickname;
        if ($count_project >= 1){
            return redirect(route("myprojects.artist"))->with('proyect_add','' . $name_artist . ' ' . __('proyecto_add_notificar'));
        }else{
            return redirect(route("myprojects.artist"))->with('proyect_add',' '. $name_artist . ' ' . __('primer_proyecto_add_notificar'));

        }
      }
}
