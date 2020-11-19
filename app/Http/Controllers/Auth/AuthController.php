<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getLogin(){
        return view('auth.login');
    }
    public function postLogin(Request $req){
        $username=$req->username;
        $password=$req->password;
        //dd($req);
        $login=Auth::attempt([
            'username' =>$username,
            'password' => $password,
        ]);
        

        if($login){
            $user=Auth::user();
            $role=$user->role;
            if($role!='user'){
                return redirect()->route('admin.news.index');
            }
            else{
                return redirect()->route('auth.login')->with('msg','Sai username hoặc password');
            }
        }
        else{

            return redirect()->route('auth.login')->with('msg','Sai username hoặc password');
        }
   }
    public function logout(){
        Auth::logout();
        return redirect()->route('auth.login');
    }
}
