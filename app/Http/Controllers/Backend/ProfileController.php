<?php

namespace App\Http\Controllers\Backend;

use App\Artist;
use App\Country;
use App\Level;
use App\Location;
use App\Update;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index_artist(){
        $countries = Country::all();
        $locactions = Location::all();
        $levels = Level::all();
        $artist = Artist::where('user_id',auth()->user()->id)->with('users.socialAcounts','countries','location')->first();
        return view('backend.profile.profile-artist',compact('countries','levels','artist','locactions'));
    }

    public function profile_update_artist(Request $request, $id_artis){

        $project_exist = Artist::where('user_id',auth()->user()->id)->with('projects')->first();
        //Actualizar en la tabla Artist
        //Validaciones
        $this->validate($request,[
            'nickname' => 'required',
            'biography' => 'required',
            'level_id' => 'required',
            'country_id' => 'required',
            'location_id' => 'required',
            'phone_1' => 'required',
            'birthdate' => 'required',
        ]);

        Artist::where('user_id','=',$id_artis)->update([
            'nickname' => $request->get('nickname'),
            'biography' => ucfirst($request->get('biography')),
            'level_id' => $request->get('level_id'),
            'country_id' => $request->get('country_id'),
            'location_id' => $request->get('location_id'),
            'facebook' => $request->get('facebook'),
            'instagram' => $request->get('instagram'),
            'youtube' => $request->get('youtube'),
            'birthdate' => Carbon::parse($request->get('birthdate')),
            'age' => $request->get('age'),
        ]);

        User::where('id','=',$id_artis)->update([
            'phone_1' => $request->get('phone_1'),
            'phone_2' => $request->get('phone_2'),
        ]);
        alert()->success(__('perfil_actualizado'),__('muy_bien'))->autoClose(3000);
        $count_project = count($project_exist->projects);
        if ($count_project >= 1){
            return back();
        }else{
            return back()->with('profile_update', __('hora_crear_primer_project'));
        }

    }

    public function update_password(Request $request){

        if ($request->filled('password')) {

            $this->validate($request, [

                'password' => 'confirmed|min:6',

            ]);
            $password = $request->get('password');
            $newpassword = bcrypt($password);

            $user = User::where('id',auth()->user()->id)->update([
               'password' => $newpassword
            ]);

            alert()->success(__('password_actualizado'),__('muy_bien'))->autoClose(3000);
            return back();
        } else {


            return back()->with('eliminar','Ningún Cambio');
        }
    }

    public function photo (Request $request){
        $user = User::where('id',auth()->user()->id)->first();
        $user_picture =  str_replace('storage','',$user->picture);;
        //Elimnar foto de perfil del servidor
        Storage::delete($user_picture);
        //Agregar la nueva foto de perfil
        $photo = $request->file('photo')->store('users');
        User::where('id',auth()->user()->id)->update([
            'picture' => '/storage/'.$photo
        ]);

        return $user_picture;

    }

    public function front_photo (Request $request){
        $user = User::where('id',auth()->user()->id)->first();
        $front_picture =  str_replace('storage','',$user->front_picture);;
        //Elimnar foto de perfil del servidor
        Storage::delete($front_picture);
        //Agregar la nueva foto de perfil
        $front_photo = $request->file('front_photo')->store('front');
        User::where('id',auth()->user()->id)->update([
            'front_picture' => '/storage/'.$front_photo
        ]);

        return $front_picture;

    }
}
