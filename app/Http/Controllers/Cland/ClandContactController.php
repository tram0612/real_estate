<?php

namespace App\Http\Controllers\Cland;
use  App\Http\Requests\ContactRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ContactModel;
class ClandContactController extends Controller
{
    public function __construct(ContactModel $contactModel){
		$this->contactModel = $contactModel; 
		
	}
	public function getContact(){
    	
    	return view('cland.contact');
    }
    public function postContact(ContactRequest $req){
        //dd($req);
    	$this->contactModel->addItem($req);
    	return redirect()->route('cland.index')->with('msg','Đã gửi liên hệ');
    }
}
