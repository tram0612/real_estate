<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;

class RateModel extends Model
{
    protected $table ='rate';
    protected $primaryKey = 'rate_id';
    public $timestamps = false;

    public function rate($req){
    	$news_id=$req->news_id;
    	$user_id=$req->user_id;
    	
    	$rate=RateModel::where([
                ['news_id', '=', $news_id],
                ['user_id', '=', $user_id],
            ])
            ->first();
         if($rate){
         	 $rate->rate=$req->rate;
         	 $rate->update();
         }
         else{
         	$arRate=array(
	            'news_id' => $news_id,
	            'user_id'=>$user_id,
	            'rate'=>$req->rate, 
        	);
        	DB::table('rate')->insertGetId($arRate);
         }
         $total_rate=RateModel::where('news_id',$news_id)->sum('rate');
         //dd($total_rate);
         $total=RateModel::where('news_id',$news_id)->count();
         $average_rate= round( $total_rate/$total, 1, PHP_ROUND_HALF_UP);
         $news=DB::table('news')->where('news_id', '=', $news_id)->update(['rate' => $average_rate]);
         
    	
    }
    public function getRateByUserId($user_id,$id){
        $rate=RateModel::where([
                ['user_id', '=', $user_id],
                ['news_id', '=', $id],
            ])->first();
        if($rate){
           // dd($rate);
            $user_rate=$rate->rate;
            return $user_rate;
        }
        else{
            return false;
        }
        
        
    }
    public function getItems(){
        return DB::table('rate as r')
        ->join('users as u','r.user_id','=','u.id')
        ->select('r.*', 'u.id as uid', 'u.username as username')
        ->orderby('rate_id','DESC')
        ->orderby('rate_id','DESC')->paginate(8);
    }
    public function getItem($id){
        return DB::table('rate')->where('rate_id',$id)->first();
    }
   public function updateItem ($id,$req){
        $rate1=RateModel::find($id);
        //dd($rate1);
        $rate1->rate=$req->rate;
        $rate1->update();

   }
   public function delByNewsId($id){
        $items=RateModel::where('news_id',$id)->get();
        //dd($item);
        foreach($items as $item){
            $item->delete();
        }
   }
   public function del ($id){
        $rate1=RateModel::find($id);
        //dd($rate1);
        
        $rate1->delete();

   }
   public function addItem($req){
        $arNew=array(
            'user_id' => $req->user_id,
            'news_id' =>$req->news_id,
            'rate'=>$req->rate,
            
        );

        DB::table('rate')->insertGetId($arNew);

   }

}
