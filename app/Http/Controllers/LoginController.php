<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function view(){
        return view('login');
    }

    public function login(Request $req){
        $user=User::where('email',$req->email)->first();
        if(!$user || $user->password!=$req->password){
            return "username or password incorrect";
        }
        $req->session()->put('user',$user);
        return redirect('/');
    }
}
