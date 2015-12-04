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
     public function wait()
    {
        if(\Auth::check())
      {
        return \View::make('testing.wait');

        }
        else 
        {
            return Redirect::to('/auth/login'); 
        }
    }
     public function wait2()
    {
        if(\Auth::check())
      {
        return \View::make('testing.wait2');

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

        $name = DB::table('users')->where('email',$email)->pluck('name');
        $contact = DB::table('users')->where('email',$email)->pluck('phone');
        $username = DB::table('users')->where('email',$email)->pluck('username'); 
        $add1 = DB::table('meta')->where('email',$email)->pluck('address1');
        $add2 = DB::table('meta')->where('email',$email)->pluck('address2');
        $city = DB::table('meta')->where('email',$email)->pluck('city');
        $state = DB::table('meta')->where('email',$email)->pluck('state');
        $zip = DB::table('meta')->where('email',$email)->pluck('zipcode');
        $address= ''.$add1.','.$add2.','.$city.','.$state.'-'.$zip;
 return \View::make('testing.reg',['name'=> $name,'add1'=> $add1, 'add2' => $add2,'city' => $city,'state' => $state,'zipcode' => $zip,'contact'=> $contact, 'email'=> $email,'username'=>$username]);
   }
   else 
   {
    return Redirect::to('/auth/login');
   }
    }


    public function pro_detail()
    {
        return \View::make('testing.detail');
    }

    public function request() 
    {
    
        $email=\Auth::user()->email;
    	$quantity = Input::get('qty');
    	$product = Input::get('product');
    	$description = Input::get('description');
    	$sample = Input::get('sample');
    	$frequency = Input::get('frequency');
    	$num=0;
        $name = DB::table('users')->where('email',$email)->pluck('name');
        $contact = DB::table('users')->where('email',$email)->pluck('phone');
        $username = DB::table('users')->where('email',$email)->pluck('username'); 
        $add1 = DB::table('meta')->where('email',$email)->pluck('address1');
        $add2 = DB::table('meta')->where('email',$email)->pluck('address2');
        $city = DB::table('meta')->where('email',$email)->pluck('city');
        $state = DB::table('meta')->where('email',$email)->pluck('state');
        $zip = DB::table('meta')->where('email',$email)->pluck('zipcode');
        $address= ''.$add1.','.$add2.','.$city.','.$state.'-'.$zip;
      
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
$subj="Order Placed by ".$username;
	 Mail::send(['html'=>'testing.mail'], array('text'=>$text), function ($m) use ($subj) {
            $m->from('contact@vkulp.com');
            $m->to('buyrequest@vkulp.com', 'buyrequest')->subject($subj);
        });

	

	
       return Redirect::to('/wait2');
    		
    }
     
    public function post_info()
    {
           $username=Input::get('username');
           $email= Input::get('email');
           $contact= Input::get('phone');
           $add1= Input::get('add1');
           $add2= Input::get('add2');
           $city= Input::get('city');
           $state= Input::get('state');
           $zip= Input::get('zipcode');
           $name= Input::get('name'); 
$check=DB::table('meta')->where('email',$email)->pluck('email');
if(!empty($check))
{
       DB::table('meta')->where('email',$email)->update(['address1' => $add1, 'address2' => $add2,'city' => $city,'state' => $state,'zipcode' => $zip]);
}  
else
{
    DB::table('meta')->insert(['email'=>$email,'address1' => $add1, 'address2' => $add2,'city' => $city,'state' => $state,'zipcode' => $zip]);
}     

       return Redirect::to('/wait');
    }
   
}
