<?php

namespace App\Http\Controllers\testing;
use Input;
use DB;
use Mail;
use Views;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

 class BDController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function home()
    {
        if(\Auth::check())
      {
    	return \View::make('testing.wel');

        }
        else 
        {
            return Redirect::to('/auth/login'); 
        }
    }
    public function info()
    {
      if(\Auth::check())
      {   
        $email = \Auth::user()->email;

        $name = DB::table('metausers')->where('email',$email)->pluck('name');
        $address = DB::table('metausers')->where('email',$email)->pluck('address');
        $contact = DB::table('metausers')->where('email',$email)->pluck('contact');
        $username = DB::table('metausers')->where('email',$email)->pluck('username'); 
         return \View::make('testing.reg',['name'=> $name,'address'=> $address,'contact'=> $contact, 'email'=> $email,'username'=>$username]);
   }
   else 
   {
    return Redirect::to('/');
   }
    }


    public function pro_detail()
    {
        return \View::make('testing.detail');
    }

    public function request() 
    {
    	//$all = Input::all();
        $email=\Auth::user()->email;
    	$quantity = Input::get('qty');
    	$product = Input::get('product');
    	$description = Input::get('description');
    	$sample = Input::get('sample');
    	$frequency = Input::get('frequency');
    	$num=0;
        $name = DB::table('metausers')->where('email',$email)->pluck('name');
        $address = DB::table('metausers')->where('email',$email)->pluck('address');
        $contact = DB::table('metausers')->where('email',$email)->pluck('contact');
        $username = DB::table('metausers')->where('email',$email)->pluck('username'); 
        
        
foreach($quantity as $quan) {
   $num++;
	}
    $text="";
     $text.="Dear vKulp Sales Team,<br/>";
     $text.="The order has been placed by ".$username." with following specifications:";
    for($prod = 0 ; $prod < $num ; $prod++)
    {
       
      
        $text.="<h2>Product: ". strval($prod + 1)."</h2><br/>";
        $text.="Name: ".$product[$prod]."<br/>";
        $text.="Description: ".$description[$prod]."<br/>";
        $text.="Quantity: ".$quantity[$prod]."<br/>";
        if($frequency[$prod]=="0")
        {
             $text.="Frequency Of Purchase:Once in 7 Days <br/>";
       
        }
        else   if($frequency[$prod]=="1")
        {
             $text.="Frequency Of Purchase:Once in 15 Days <br/>";
       
        }
        else  if($frequency[$prod]=="2")
        {
             $text.="Frequency Of Purchase:Once in 30 Days <br/>";
       
        }
        if(!empty($sample))
        {
             if(in_array($prod, $sample))
            {
                 $text.="Sample Required: Yes <br/>";
                 $test="Yes";
            }
            else
                {
                 $text.="Sample Required: No <br/>";
                $test="No";
             }
        }
        else
        {
            $text.="Sample Required: No <br/>";
            $test="No";
        }
       
        
       //  DB::table('product')->insert(['product' => $product[$prod], 'description' => $description[$prod],'quantity' => $quantity[$prod],'frequency' => $frequency[$prod],'sample' => $test]);

    }
         $text.="<h2>Buyer Details are as follows:</h2><br/>";
        $text.="Name of the Buyer: ".$name."<br/>";
        $text.="Name of the Hotel: ".$username." <br/>";
        $text.="Email id: ".$email."  <br/>";
        $text.="Phone No.: ".$contact."   <br/>";
        $text.="Address: ".$address."    <br/>";
        $text.="Please complete the Order within 48-hours.<br/>Regards,<br/>";

	 Mail::send(['html'=>'testing.mail'], array('text'=>$text), function ($m) {
            $m->from('contact@vkulp.com');
            $m->to('pramilabharti99@gmail.com', 'Pramila')->subject('Order Placed by Buyer Name');
        });

	

	
    		return $text;
    }
     public function insert_meta()
    {
        DB::table('metausers')->insert(['username' => 'nelabh', 'name' => 'Nelabh Kotiya','address' => 'XYZ, xyz,xyz,xyz','contact' => '999999999','email' => 'nelabh@test.com','password' => 'nelabh']);
        
        return "Data Inserted";
    }
    public function post_info()
    {
           $username=Input::get('username');
           $email= Input::get('email');
           $contact= Input::get('phone');
           $address= Input::get('address');
           $name= Input::get('name'); 

        DB::table('metausers')->where('username',$username)->update(['username' => $username, 'name' => $name,'address' => $address,'contact' => $contact,'email' => $email]);
       

        return "Data Updated";
    }
   
}
