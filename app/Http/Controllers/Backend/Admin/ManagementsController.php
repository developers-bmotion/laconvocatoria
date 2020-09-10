<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Category;
use App\Country;
use App\Mail\NewManagerAdmin;
use App\Management;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManagementsController extends Controller
{
    public function index(){

        $managements = Management::with('users')->paginate(6);
        $countries = Country::all();
        $categories = Category::all();
        return view('backend.admin.management-admin',compact('managements','countries','categories'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
        ]);
        $password = trim(str_random(8));
        $pass = bcrypt($password);
        $add_user = User::create([
            'name' => ucwords($request->get('name')),
            'last_name' => ucwords($request->get('last_name')),
            'picture' => '/backend/assets/app/media/img/users/perfil.jpg',
            'email' => $request->get('email'),
            'password' => $pass
        ]);

        \Mail::to($add_user->email)->send(new NewManagerAdmin($add_user->email,$password));
        $add_management = Management::create([
            'user_id' => $add_user->id,
            'country_id' => $request->get('country_id')
        ]);
        $add_user->roles()->attach(['4']);
        $add_management->categories()->attach($request->get('insteres'));

        //alert()->success(,__('managementCreatedTitle'))->autoClose(10000);
        return back()->with('msg', [__('managementCreatedTitle'), __('managementCreated'), 'success']);
    }
}
