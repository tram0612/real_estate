<?php

namespace App\Http\Controllers\Cland;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\UserModel;
use  App\Http\Requests\UserRequest;
use  App\Http\Requests\ConfirmRequest;
class ClandLoginController extends Controller
{
    public function __construct(UserModel $userModel ){
        $this->userModel=$userModel;
    }
    public function getLogin(){
    	return view('cland.login');
    }
    public function postLogin(Request $req){
    	$username=$req->username;
    	$password=$req->password;
    	$login=Auth::attempt([
    		'username' =>$username,
    		'password' => $password,
    	]);
    	if($login){
    		return redirect()->route('cland.index');
    	}
    	else{

    		return redirect()->route('cland.login')->with('msg','Sai username hoặc password');
    	}
   	}
    public function logout(){
        Auth::logout();
        return redirect()->route('cland.login');
    }
    public function getConfirm(){
        return view('cland.confirm');
    }
    public function postConfirm(ConfirmRequest $req){
        $username=$req->username;
        $password=$req->password;
        $login=Auth::attempt([
            'username' =>$username,
            'password' => $password,
        ]);
        if($login){
            
           $user = $this->userModel->getItemByName($username);
            return view('cland.edit',compact('user'));
        }
        else{

            return redirect()->route('cland.login')->with('msg','Sai username hoặc password');
        }
    }
    /*public function getEdit($username){
        $user = $this->userModel->getItemByName($username);
        return view('cland.edit',compact('user'));
    }*/
    public function postEdit($username,UserRequest $req){
         $this->userModel->edit($username,$req);
          return redirect()->route('cland.index')->with('msg','Chỉnh sửa thành công');

    }
}
