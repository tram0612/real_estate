<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ContactModel;
use App\Http\Requests\ContactRequest;
class AdminContactController extends Controller
{
	public function __construct(ContactModel $contactModel){
		$this->contactModel = $contactModel;
	}
    public function index(){
    	$items=$this->contactModel->getItems();
    	return view('admin.contact.index',compact('items'));
    }
    public function getEdit($page,$id){
    	$item=$this->contactModel->getItem($id);
    	return view('admin.contact.edit',compact('item'));
    }
    public function postEdit($page,$id,ContactRequest $req){
    	$this->contactModel->updateItem($id,$req);
    	return redirect('/admin/contact?page='.$page);
    }
    public function getAdd(){

    	return view('admin.contact.add');
    }
    public function postAdd(ContactRequest $req){
    	$this->contactModel->addItem($req);
    	return redirect()->route('admin.contact.index');
    }
     public function del($page,$id){
    	$this->contactModel->del($id);
    	return redirect('/admin/contact?page='.$page);
    }
}
