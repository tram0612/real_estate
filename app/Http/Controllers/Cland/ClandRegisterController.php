<?php

namespace App\Http\Controllers\Cland;
use  App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\UserModel;
class ClandRegisterController extends Controller
{
    public function __construct(UserModel $userModel){
		$this->userModel = $userModel; 
		
	}
	public function getRegister(){
    	
    	return view('cland.register');
    }
    public function postRegister(UserRequest $req){
    	$this->userModel->addItem($req);
    	return redirect()->route('cland.index')->with('msg','Tạo tài khoản thành công');
    }
}
