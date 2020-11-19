<?php

namespace App\Model;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\Model\NewsModel;
class CommentModel extends Model
{
    protected $table ='comments';
    protected $primaryKey = 'comment_id';
    public $timestamps = false;
    public function getItems($id){
    	return DB::table('comments as c')
    		->join('users as u','c.user_id','=','u.id')
            ->where('c.news_id',$id)
            
             ->select('c.*', 'u.id as uid', 'u.username as username')
            
            ->get();
    }
    public function getItemsIndex(){
        return DB::table('comments as c')
            ->join('users as u','c.user_id','=','u.id')
             ->select('c.*', 'u.id as uid', 'u.username as username')
             ->orderby('comment_id','DESC')
            
            ->paginate(8);
    }
    public function getItem($id){
        return DB::table('comments as c')
            ->join('users as u','c.user_id','=','u.id')
            ->where('c.comment_id',$id)
            
             ->select('c.*','c.news_id as news_id', 'u.id as uid', 'u.username as username')
            
            ->first();
    }
    public function updateItem($id,$req){
        $item=CommentModel::find($id,'comment_id');
        $item->content=$req->content;
        $item->update();
    }
    public function addItem($req){
       
        $arNew=array(
            'user_id' => $req->user_id,
            'news_id' =>$req->news_id,
            'content'=>$req->comment,
            'parent_id'=>$req->parent_id,
        );

        DB::table('comments')->insertGetId($arNew);

        
        return DB::table('comments as c')
            ->join('users as u','c.user_id','=','u.id')
            ->where('c.news_id',$req->news_id)
            
             ->select('c.*', 'u.id as uid', 'u.username as username')
            
            ->get();
    }
     public function add($req){
       
        $arNew=array(
            'user_id' => $req->user_id,
            'news_id' =>$req->news_id,
            'content'=>$req->content,
            'parent_id'=>$req->parent_id,
        );

        DB::table('comments')->insertGetId($arNew);

        
        
    }
    public function delByUserId($id){
        $items=CommentModel::where('user_id',$id)->get();
        //dd($item);
        foreach($items as $item){
            $item->delete();
        }

        
    }
    public function delByNewsId($id){
        $items=CommentModel::where('news_id',$id)->get();
        //dd($item);
        foreach($items as $item){
            $item->delete();
        }
   }
    public function del($id){
        $item=CommentModel::where('comment_id',$id)->first();
        //dd($item);
        
       

        $item->delete();

    }

}
