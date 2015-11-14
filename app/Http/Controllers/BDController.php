<?php

namespace App\Http\Controllers;
use Input;
use Views;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

 class BDController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function home()
    {
    	return \View::make('wel');
    }
    public function request()
    {
    	$all = Input::all();
    	$quantity = Input::get('qty');
    	$product = Input::get('product');
    	$description = Input::get('desciption');
    	$sample = Input::get('sample');
    	$frequency = Input::get('frequency');
    	$num=0;
foreach($quantity as $quan) {
   $num++;
	}


	for ($prod=0	;	$prod<=$num 	;	$prod++)
	{

	}
	
    		return $all;
    }
}
