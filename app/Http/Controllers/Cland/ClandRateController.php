<?php

namespace App\Http\Controllers\Cland;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\RateModel;
use App\Model\NewsModel;
class ClandRateController extends Controller
{
    public function __construct(RateModel $rateModel, NewsModel $newsModel)
    {
    	$this->rateModel=$rateModel;
    	$this->newsModel=$newsModel;
    }
    public function rate(Request $req){
    	$this->rateModel->rate($req);
    	

    }
}
