<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\NewsRequest;
use Illuminate\Support\Facades\Auth;
class NewsModel extends Model
{
    protected $table ='news';
    protected $primaryKey = 'news_id';
    public $timestamps = false;

    public function getItems(){
    	 
    	return DB::table('news as n')
    		->join('cat as c','n.cat_id','=','c.cat_id')
            ->select('n.*', 'c.cat_id as cid', 'c.name as cname')
    		->orderBy('n.news_id','desc')
    		->paginate(8);
            
    }
    public function cat($id){
        return DB::table('news as n')
            ->join('cat as c','n.cat_id','=','c.cat_id')
            ->where('n.cat_id',$id)
            ->orwhere('c.parent_id',$id)
            ->orwhere('c.grand_id',$id)
             ->select('n.*', 'c.cat_id as cid', 'c.name as cname')
            ->orderBy('n.news_id','desc')
            ->paginate(8);
    }
    public function getItem($id){
        $total_comment= DB::table('comments')
          
            ->where('news_id',$id)
            ->count();
        /*$total_comment= DB::table('news as n')
            ->join('comments as c','n.news_id','=','c.news_id')
            ->where('c.news_id',$id)
            ->count();*/

        $news =DB::table('news as n')
            ->join('cat as c','n.cat_id','=','c.cat_id')
            ->where('news_id',$id)
            ->select('n.*', 'c.cat_id as cid', 'c.name as cname')
            ->first();

        $counter=$news->counter+1;
            DB::table('news')->where('news_id', '=', $id)->update(['counter' => $counter,'total_comment'=>$total_comment]);
        return $news;
            
    }
     public function getNew($id){
        

        return DB::table('news as n')
            ->join('cat as c','n.cat_id','=','c.cat_id')
            ->where('news_id',$id)
            ->select('n.*', 'c.cat_id as cid', 'c.name as cname')
            ->first();
        
       
            
    }
    public function pick(){
        return DB::table('news as n')
            ->join('cat as c','n.cat_id','=','c.cat_id')
            ->where('pick',1)
            ->select('n.*', 'c.cat_id as cid', 'c.name as cname')
            ->orderBy('n.news_id','DESC')
            ->first();
    }
    public function getNewItems(){
        return DB::table('news as n')
            ->join('cat as c','n.cat_id','=','c.cat_id')
            ->select('n.*', 'c.cat_id as cid', 'c.name as cname')
            ->orderBy('n.news_id','desc')
            ->limit(5)
            ->get();
            
    }
    public function getHotItems(){
        return DB::table('news as n')
            ->join('cat as c','n.cat_id','=','c.cat_id')
            ->select('n.*', 'c.cat_id as cid', 'c.name as cname')
            ->orderBy('n.counter','desc')
            ->limit(5)
            ->get();
            
    }
    public function increaseComment($news_id){
        $news=NewsModel::where('news_id', '=', $news_id)->first();
        $news->total_comment +=1;
        $news->update();
    }
    public function decreaseComment($news_id){
        $news=NewsModel::where('news_id', '=', $news_id)->first();
        if($news->total_comment>0){
            $news->total_comment -=1;
            $news->update();
        }
    }
    public function getIdCat($id){
        $item= NewsModel::getNew($id);
        $cid= $item->cid;
        return $cid;
    }
    public function getNameCat($id){
        $item= NewsModel::getNew($id);
        $cname= $item->cname;
        return $cname;
    }
    
    public function updateItem($id,$req){
        
        $new=NewsModel::where('news_id', '=', $id)->first();
        $new->name=$req->name;
        if($req->picture==''){
            $new->picture=$new->picture;
        }
        else{
            $file='/storage/app/files'.$new->picture;
            if (file_exists( $file )){
                unlink( $file);
            }
    
            $tmp=$req->file('picture')->store('files');
            $tmp=explode('/',$tmp);
            $picture=end($tmp);
             $new->picture=$picture;
        
        }
        if($req->cat!=''){
             $new->cat_id=$req->cat; 
        }
       
        if($req->author!=''){
            $new->author=$req->author;
        }
        
        if($req->content!=''){
            $new->content=$req->content;
        }
        
        if($req->created_at!=''){
            $new->created_at=$req->created_at;
        }
        

   
      if($req->pick==1){
        $new->pick=$req->pick;
      }
        
       
        
        if($req->rate!=''){
            $new->rate=$req->rate;
        }
        
        if($req->dia_chi!=''){
            $new->dia_chi=$req->dia_chi;
        }
         if($req->dien_tich!=''){
            $new->dien_tich=$req->dien_tich;
        }

        $new->update();
    }
    
    public function addItem($req){
        $tmp=$req->file('picture')->store('files');
        $tmp=explode('/',$tmp);
        $picture=end($tmp); 
        $author =Auth::user()->username;
         if($req->pick==1){
                $pick=1;
            }else{
                $pick=0;
            }

        $arNew=array(
            'name' => $req->name,
            'picture'=>$picture,

            'cat_id'=>$req->cat,        
            'author' =>$author,
            'content'=>$req->content,
           

            'pick'=> $pick,

          
            'rate' => $req->rate,
            'dia_chi' => $req->dia_chi,
            'dien_tich'=>$req->dien_tich,
            
        );


        if (DB::table('news')->insertGetId($arNew)){
            $req->session()->flash('msg','Thêm thành công');
        }
        else{
            $req->session()->flash('error','Có lỗi.Thêm không thành công');
        }
        return DB::table('news')->orderBy('id','DESC');
        //return this->find($id);
    }
    public function del($id){

       $news=NewsModel::where('news_id', '=', $id)->first();
       $file='/storage/app/files'.$news->picture;
            if (file_exists( $file )){
                unlink( $file);
            }
       $news->delete();
    }


    public function relatedItem($id){
        $cid= NewsModel::getIdCat($id);
        return DB::table('news as n') 
            ->join('cat as c','n.cat_id','=','c.cat_id')
            ->where([
                ['n.cat_id', '=', $cid],
                ['news_id', '!=', $id],
            ])->select('n.*', 'c.cat_id as cid', 'c.name as cname')->limit(4)->get();
            
    }
    public function relatedCat($cid){
         
        return DB::table('news as n') 
            ->join('cat as c','n.cat_id','=','c.cat_id')
            ->where(
                'n.cat_id', '=', $cid
                
            )
            ->select('n.*', 'c.cat_id as cid', 'c.name as cname')
            ->paginate(5);
    }
    public function search($req){
        //dd($req);
        
            if ($req->cat==null){

               return DB::table('news as n') 
                ->join('cat as c','n.cat_id','=','c.cat_id')
                ->where('n.name', 'LIKE', '%' . $req->name . '%',)
                ->orwhere('n.content', 'LIKE', '%' . $req->name . '%')
                 ->orwhere('n.author', 'LIKE', '%' . $req->name . '%')
                ->orwhere('n.dia_chi', 'LIKE', '%' . $req->name . '%')
                ->orwhere('c.name', 'LIKE', '%' . $req->name . '%')
                ->select('n.*', 'c.cat_id as cid', 'c.name as cname')
                ->paginate(5);
               

            }
            elseif($req->name==null){
               return DB::table('news as n') 
                ->join('cat as c','n.cat_id','=','c.cat_id')
                ->where('n.cat_id', '=', $req->cat)
                ->select('n.*', 'c.cat_id as cid', 'c.name as cname')
                ->paginate(5);
                //dd($i);
            }
            else
            {  
                //dd($req);
                return DB::table('news as n') 
                ->join('cat as c','n.cat_id','=','c.cat_id')
                ->where([
                    ['n.name', 'LIKE', '%' . $req->name . '%'],
                    ['n.cat_id', '=', $req->cat]
                ])
                ->orwhere([
                    ['n.content', 'LIKE', '%' . $req->name . '%'],
                    ['n.cat_id', '=', $req->cat]
                ])
                ->orwhere([
                    ['n.dia_chi', 'LIKE', '%' . $req->name . '%'],
                    ['n.cat_id', '=', $req->cat]
                ])
                ->orwhere([
                    ['n.author', 'LIKE', '%' . $req->name . '%'],
                    ['n.cat_id', '=', $req->cat]
                ])
                ->orwhere([
                    ['c.name', 'LIKE', '%' . $req->name . '%'],
                    ['n.cat_id', '=', $req->cat]
                ])
                ->select('n.*', 'c.cat_id as cid', 'c.name as cname')
                ->paginate(5);
            }
        
    }
    public function searchItems($req){
         return DB::table('news as n') 
            ->join('cat as c','n.cat_id','=','c.cat_id')
            ->where('n.name', 'LIKE', '%' . $req->search . '%')
            ->orwhere('n.content', 'LIKE', '%' . $req->search . '%')
            ->orwhere('n.dia_chi', 'LIKE', '%' . $req->search . '%')
            ->orwhere('c.name', 'LIKE', '%' . $req->search . '%')
            ->select('n.*', 'c.cat_id as cid', 'c.name as cname')
            ->paginate(8);
    }
    public function count($id){
         
        $news=NewsModel::where('news_id', '=', $id)->first();
        $news->counter+=1;
        $news->update();
         
    }
}
