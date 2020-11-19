<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CatModel;
use App\Http\Requests\CatRequest;
use Illuminate\Support\Facades\View;
class AdminCatController extends Controller
{
	public function __construct(CatModel $catModel){
		$this->catModel = $catModel;
	}
    public function index(){
    	$items=$this->catModel->getItems();
    	return view('admin.cat.index',compact('items'));
    }
    public function getEdit($id){
    	$item=$this->catModel->getItem($id);
        $cat5 = $this->catModel->getItem($item->parent_id);
        
    	return view('admin.cat.edit',compact('item','cat5'));
    }
    public function postEdit($id,CatRequest $req){
    	$this->catModel->updateItem($id,$req);
       
        
    	return redirect()->route('admin.cat.index');
    }
    public function getAdd(){

    	return view('admin.cat.add');
    }
    public function postAdd(CatRequest $req){
    	$this->catModel->addItem($req);
    	return redirect()->route('admin.cat.index');
    }
     public function del($id){
    	$this->catModel->del($id);
    	return redirect()->route('admin.cat.index');
    }
    public function catChange($id){

        //$id=$req->input('id1');
        
        //dd($id);
        $cat2 = $this->catModel->catChange($id);
       // dd($cat2);
        return View::make("admin.cat.catchange")
        ->with("cat2", $cat2)
        ->render();

    }
    public function catChange2($id){

        //$id=$req->input('id1');
        
        //dd($id);
        $cat3 = $this->catModel->catChange($id);
       // dd($cat2);
        return View::make("admin.cat.catchange2")
        ->with("cat3", $cat3)
        ->render();

    }
    public function search(Request $req){

        $items = $this->catModel->search($req);
        $cat5 = $this->catModel->cat2($req->cat);
        return view('admin.cat.search',compact('items','req','cat5'));
    }
}
