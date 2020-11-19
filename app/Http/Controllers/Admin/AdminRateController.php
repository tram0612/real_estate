<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\RateModel;
class AdminRateController extends Controller
{
   public function __construct(RateModel $rateModel){
   		$this->rateModel=$rateModel;
   }

   	public function index(){
   		$items = $this->rateModel->getItems();
   		return view('admin.rate.index',compact('items'));
   	}
   	public function getEdit($page,$id){
   		$item = $this->rateModel->getItem($id);
   		return view('admin.rate.edit',compact('item'));
   	}
   	public function postEdit($page,$id,Request $req){
   		 $this->rateModel->updateItem($id,$req);
   		return redirect('admin/rate?page='.$page);
   	}
   	public function del($page,$id){
   		 $this->rateModel->del($id);
   		return redirect('admin/rate?page='.$page);
   	}
   	public function getAdd(){
   		
   		return view('admin.rate.add');
   	}
   	public function postAdd(Request $req){
   		$this->rateModel->addItem($req);
   		return redirect()->route('admin.rate.index');
   	}
}
