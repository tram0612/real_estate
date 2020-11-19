<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CommentModel;
use App\Model\NewsModel;
class AdminCommentController extends Controller
{
    public function __construct(CommentModel $commentModel,NewsModel $newsModel){
    	$this->commentModel=$commentModel;
    	$this->newsModel=$newsModel;

    }
    public function index(){
    	$items = $this->commentModel->getItemsIndex();
    	return view('admin.comment.index',compact('items')); 
    }
    public function getEdit($page, $id){
    	$item = $this->commentModel->getItem($id);
     	return view('admin.comment.edit',compact('item'));

    }
    public function postEdit($page, $id,Request $req){
    	 $this->commentModel->updateItem($id,$req);
     	 return redirect('/admin/comment?page='.$page);

    }
    public function getAdd(){
    	return view('admin.comment.add'); 
    }
    public function postAdd(Request $req){
    	$this->commentModel->add($req);
    	return redirect()->route('admin.comment.index'); 
    }
    public function del($page,$id){
    	$item=$this->commentModel->getItem($id);
    	$news_id=$item->news_id;
    	$this->commentModel->del($id);
    	$this->newsModel->decreaseComment($news_id);
    	return redirect('/admin/comment?page='.$page);
    }
}
