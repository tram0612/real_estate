<?php

namespace App\Http\Controllers\Cland;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\NewsModel;
use App\Model\CatModel;
use App\Model\CommentModel;
use App\Model\RateModel;
use Illuminate\Support\Facades\Auth;
class ClandController extends Controller
{
	public function __construct(NewsModel $newsModel, CatModel $catModel, CommentModel $commentModel, RateModel $rateModel){
		$this->newsModel = $newsModel; 
		$this->catModel = $catModel;
		$this->commentModel = $commentModel; 
        $this->rateModel = $rateModel; 
	}
     public function index(){
    	$pick=$this->newsModel->pick();
    	$items=$this->newsModel->getItems();
    	return view('cland.index',compact('pick','items'));
    }
    public function cat($slug,$id){
    	$items=$this->newsModel->cat($id);
    	$namecat= $this->catModel->getItem($id);
    	$nameCat=$namecat->name;
    	return view('cland.cat',compact('items','nameCat'));
    }
    public function detail($slug,$id){
    	$item=$this->newsModel->getItem($id);
    	$relatedItems =$this->newsModel->relatedItem($id);
    	$comments = $this->commentModel->getItems($id);
        $rate=floor($item->rate);
        if(Auth::check()){
            $user_id=Auth::id();
            //dd($user_id);
            $rate=floor($this->rateModel->getRateByUserId($user_id,$id));
            //dd($rate);
            if($rate==false){
                $rate=floor($item->rate);
            }
        }
        

    	return view('cland.detail',compact('item','relatedItems','comments','rate'));
    }
    public function search(Request $req){
        $search=$req->search;
        $searchItems =$this->newsModel->searchItems($req);
        $searchItems->appends(['search' => $search]);
        return view('cland.search',compact('searchItems','search'));
    }
   
}
