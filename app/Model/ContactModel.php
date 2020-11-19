<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
class ContactModel extends Model
{
  	protected $table='contact';
   	protected $primaryKey='contact_id';
   	public $timestamps = false;

   	public function getItems(){
   		return DB::table('contact')->orderBy('contact_id')->paginate(3);
   	}
    public function getItem($id){
   		return DB::table('contact')->where('contact_id','=',$id)->first();
   	} 
   	public function updateItem($id,$req)
   	{

   		$contact=ContactModel::find($id,'contact_id');
   		$contact->name=$req->name;
   		$contact->email=$req->email;
   		$contact->subject=$req->subject;
   		$contact->content=$req->content;
   		$contact->update();
   	}
   	public function addItem($req){
   		$arContact=array(
   			'name'=>$req->name,
   			'email'=>$req->email,
   			'subject'=>$req->subject,
   			'content'=>$req->message,
   		);
   		if(DB::table('contact')->insertGetId($arContact)) {
    		$req->session()->flash('msg','Thêm thành công');
    	}
    	return DB::table('contact')->orderBy('contact_id','DESC');
   	}

   	public function del($id){
   		$contact=ContactModel::find($id,'contact_id');
   		$contact->delete();
   	}
}
