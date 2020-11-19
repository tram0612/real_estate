<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\CatRequest;
class CatModel extends Model
{
    protected $table='cat';
    protected $primaryKey = 'cat_id';
    public $timestamps = false;
    public function  getItems(){
    	return DB::table('cat')->get();
    }
    
    public function  getItem($id){
    	return DB::table('cat')->where('cat_id',$id)->first();
    }
    public function  getParent(){
    	return DB::table('cat')->where('parent_id',0)->get();
    }
    
    public function updateItem($id,$req){
    	$cat=CatModel::find($id,'cat_id');
    	$parent_id=0;
        $grand_id=0;
    	if($req->check=='yes'){
    		$parent_id=0;
            $grand_id=0;
    	}
    	else{
    		$parent_id=$cat->parent_id;
            $grand_id=$cat->grand_id;
    	}
        //dd($req);
    	if( $req->cat != 0 ){
    		if( $req->cat1 != 0 ){
    			$parent_id = $req->cat1;
                $grand_id = $req->cat;
    		}
    		else{
    			$parent_id = $req->cat;
                $grand_id=0;
    		}
    	}

        $cat->name=$req->name;
        $cat->parent_id=$parent_id;
        $cat->grand_id=$grand_id;
        $cat->update();
    }
    public function addItem($req){
    	$parent_id = 0;
        $grand_id = 0;
    	if( $req->cat !== 0 ){
    		if( $req->cat1 !==0 ){
    			$parent_id = $req->cat1;
                $grand_id = $req->cat;
    		}
    		else{
    			$parent_id = $req->cat;
    		}
    	}
    	
    	$arCat=array(
    		'name'=>$req->name,
    		'parent_id' =>$parent_id,
            'grand_id' => $grand_id

        );
    	
    	if(DB::table('cat')->insertGetId($arCat)) {
    		$req->session()->flash('msg','Thêm thành công');
    	}
    	return DB::table('cat')->orderBy('cat_id','DESC');

    }
    public function del($id){
    	$cat=CatModel::find($id,'cat_id');
    	$cat->delete();

    }
    public function catChange($id){
    	//dd($id);
    	return DB::table('cat')->where('parent_id',$id)->get();
    }
    public function search($req){
    	//dd($req);
    	$parent_id= '';
    	if($req->cat !== '0'){
    		if($req->cat1 !== '0'){
    			$parent_id=$req->cat1;
    		}else{
    			$parent_id=$req->cat;
    		}
    	}
    	
    	if($parent_id === ''){
    		//dd($parent_id);
    		return DB::table('cat') ->where(
	                'name', 'LIKE', '%' . $req->name . '%',
	               
	            )->get();
    		dd($parent_id);
    		
		}else{
			//dd($parent_id);
			return DB::table('cat') ->where([
    			['parent_id', '=', $parent_id],
	            ['name', 'LIKE', '%' . $req->name . '%'],
	                
	        ])->get();
		}
    	
    }
    public function cat2($id)
    {
    	return DB::table('cat') 
    			->where(
    				'parent_id', '=', $id,
	           	)->get();
    }
    

}
