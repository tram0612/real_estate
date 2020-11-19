<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
class UserModel extends Model
{
    protected $table ='users';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function getItems(){
    	//return $this->all();//this chính là UserModel <=> select *from users 
    	return DB::table('users')->orderBy('id','DESC')->paginate(4);//Phân 2 items/1trang sắp xếp giảm dần theo id

    }
    public function getItem($id){
    	return DB::table('users')->where('id',$id)->first();
    	//return this->find($id);
    }
    public function getItemByName($username){
        return DB::table('users')->where('username',$username)->first();
    }
    public function edit($username,$req){
        //dd($req);
        $user = UserModel::where('username',$username)->first();
        //dd($user);
       if($req->password!==null){
            $user->password=bcrypt($req->password);
        }
        $user->username=$req->username;
        $user->email=$req->email;
       
        $user->update();
    }
    public function updateItem($id,$req){
       
        $user=UserModel::find($id);
        if($req->password!=''){
            $user->password=bcrypt($req->password);
        }
        $user->username=$req->username;
        $user->email=$req->email;
        $user->role=$req->role;
        $user->update();
    }
    public function addItem($req){

        $arUser=array(
            'username' => $req->username,
            'password'=>bcrypt($req->password),
            'role'=> 'user',
            'email'=>$req->email,
        );
        if (DB::table('users')->insertGetId($arUser)){
            $req->session()->flash('msg','Thêm thành công');
        }
        else{
            $req->session()->flash('error','Có lỗi.Thêm không thành công');
        }
        return DB::table('users')->orderBy('id','DESC')->paginate(7);
        //return this->find($id);
    }
     public function addUser($req){

        $arUser=array(
            'username' => $req->username,
            'password'=>bcrypt($req->password),
            'role'=> $req->role,
            'email'=>$req->email,
        );
        if (DB::table('users')->insertGetId($arUser)){
            $req->session()->flash('msg','Thêm thành công');
        }
        else{
            $req->session()->flash('error','Có lỗi.Thêm không thành công');
        }
        return DB::table('users')->orderBy('id','DESC')->paginate(7);
        //return this->find($id);
    }
    public function del($id){
        $user=UserModel::find($id);
        $user->delete();
    }
}
