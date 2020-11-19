<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\NewsModel;
use App\Model\CommentModel;
use App\Model\RateModel;
use App\Http\Requests\NewsRequest;
use Illuminate\Routing\UrlGenerator;
class AdminNewsController extends Controller
{
	public function __construct(NewsModel $newsModel,CommentModel $commentModel,RateModel $rateModel){
		$this->newsModel = $newsModel;
        $this->commentModel = $commentModel;
        $this->rateModel = $rateModel;
	}
    public function index(){
    	$items=$this->newsModel->getItems();
    	
    	//dd($items);//in ra xong dừng lại
    	return view('admin.news.index',compact('items'));//gửi biến items ra view nhờ compact
    }
    public function getEdit($page,$author,$id){
    	$item=$this->newsModel->getItem($id);
    	
    	//dd($item);
    	//return view('admin.edit');
    	return view('admin.news.edit',compact('item'));
    }
    public function postEdit($page,$author,$id,NewsRequest $req){
        
        /*$req->validate([
            'name' => 'required|unique:news,name,'.$id.',story_id',
        ]);*/
    	$this->newsModel->updateItem($id,$req);
    	//dd($item);
    	//return view('admin.edit');
    	return redirect('admin/news?page='.$page);
        
    }
    public function getAdd(){
    	
    	return view('admin.news.add');
    }
    public function postAdd(NewsRequest $req){
      
    	$this->newsModel->addItem($req);
    	//dd($item);
    	//return view('admin.edit');
    	return redirect()->route('admin.news.index');
    }
    public function del($page,$author,$id){
        
    	$this->newsModel->del($id);
        $this->rateModel->delByNewsId($id);
        $this->commentModel->delByNewsId($id);
    	//dd($item);
    	//return view('admin.edit');
    	return redirect('admin/news?page='.$page);
    }
    public function search(Request $req){
        
       $items = $this->newsModel->search($req);
        //dd($items);
        //return view('admin.edit');
        return view('admin.news.search',compact('items','req'));
    }
}
