<?php

namespace App\Http\Controllers;
use Input;
use Mail;
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
    	//$all = Input::all();
    	$quantity = Input::get('qty');
    	$product = Input::get('product');
    	$description = Input::get('desciption');
    	$sample = Input::get('sample');
    	$frequency = Input::get('frequency');
    	$num=0;
foreach($quantity as $quan) {
   $num++;
	}
    $text="";
     $text.="<h1>The Mail Format Is :</h1></br>";
    for($prod = 0 ; $prod < $num ; $prod++)
    {
       
        $text.="<h2>Product: ". strval($prod + 1)."</h2></br>";
        $text.="Name: ".$product[$prod]."</br>";
        $text.="Description: ".$description[$prod]."</br>";
        $text.="Quantity: ".$quantity[$prod]."</br>";
        $text.="Frequency Of Purchase: ".$frequency[$prod]."</br>";
        if(!empty($sample))
        {
             if(in_array($prod, $sample))
            {
                 $text.="Sample Required: Yes </br>";
            }
            else
                {
                 $text.="Sample Required: No </br>";
        
             }
        }
        else
        {
            $text.="Sample Required: No </br>";
        
        }

    }
    /*
	 Mail::send('mail', array(), function ($m) {
            $m->from('nelabhkotiya@gmail.com', 'Hello');

            $m->to('nelabhkotiya@gmail.com', 'nelabh')->subject('First Mail!');
        });

	*/

	
    		return $text;
    }
}
