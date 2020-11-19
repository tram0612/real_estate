<?php

namespace App\Http\Controllers\Cland;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\Validator;
use App\Model\CommentModel;
use Illuminate\Support\Facades\View;
use App\Model\NewsModel;
class ClandCommentController extends Controller
{
	public function __construct(CommentModel $commentModel, NewsModel $newsModel)
	{
		$this->commentModel = $commentModel;
		$this->newsModel=$newsModel;
	}
    public function postComment(Request $req){
    	$data='';
    	if($req->comment==''){

    		return $data;
    	}
    	else{

    		$data=$this->commentModel->addItem($req);
    		$this->newsModel->increaseComment($req->news_id);
	        /*return View::make("cland.comment")
	        ->with("data", $data)
	        ->render();*/
             $html = view('cland.comment')->with(compact('data'))->render();
            return response()->json(['success' => true, 'html' => $html]);

    		
    	}
   	}
   
}
