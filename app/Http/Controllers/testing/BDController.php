<?php

namespace App\Http\Controllers\testing;
use Input;
use DB;
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
    	return \View::make('testing.wel');
    }
    public function info()
    {
        $username="test1";

        $name = DB::table('metausers')->where('username',$username)->pluck('name');
        $address = DB::table('metausers')->where('username',$username)->pluck('address');
        $contact = DB::table('metausers')->where('username',$username)->pluck('contact');
        $email = DB::table('metausers')->where('username',$username)->pluck('email'); 
         return \View::make('testing.reg',['name'=> $name,'address'=> $address,'contact'=> $contact, 'email'=> $email,'username'=>$username]);
    }

    public function pro_detail()
    {
        return \View::make('testing.detail');
    }

    public function request() 
    {
    	//$all = Input::all();
    	$quantity = Input::get('qty');
    	$product = Input::get('product');
    	$description = Input::get('description');
    	$sample = Input::get('sample');
    	$frequency = Input::get('frequency');
    	$num=0;
foreach($quantity as $quan) {
   $num++;
	}
    $text="";
     $text.="<h1>The Mail Format Is :</h1><br/>";
    for($prod = 0 ; $prod < $num ; $prod++)
    {
       
      
        $text.="<h2>Product: ". strval($prod + 1)."</h2><br/>";
        $text.="Name: ".$product[$prod]."<br/>";
        $text.="Description: ".$description[$prod]."<br/>";
        $text.="Quantity: ".$quantity[$prod]."<br/>";
        $text.="Frequency Of Purchase: ".$frequency[$prod]."<br/>";
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
         DB::table('product')->insert(['product' => $product[$prod], 'description' => $description[$prod],'quantity' => $quantity[$prod],'frequency' => $frequency[$prod],'sample' => $test]);

    }
    
	 Mail::send(['html'=>'testing.mail'], array('text'=>$text), function ($m) {
            $m->from('contact@vkulp.com');
            $m->to('nelabhkotiya@gmail.com', 'Nelabh')->subject('Requirements');
        });

	

	
    		return $text;
    }
     public function insert_meta()
    {
        DB::table('metausers')->insert(['username' => 'test1', 'name' => 'tester1','address' => 'vkulp tester1','contact' => '999999999','email' => 'test1@test.com','password' => 'testing1']);
        DB::table('metausers')->insert(['username' => 'test2', 'name' => 'tester2','address' => 'vkulp tester2','contact' => '999999999','email' => 'test2@test.com','password' => 'testing2']);
        DB::table('metausers')->insert(['username' => 'test3', 'name' => 'tester3','address' => 'vkulp tester3','contact' => '999999999','email' => 'test3@test.com','password' => 'testing3']);
        DB::table('metausers')->insert(['username' => 'test4', 'name' => 'tester4','address' => 'vkulp tester4','contact' => '999999999','email' => 'test4@test.com','password' => 'testing4']);
        DB::table('metausers')->insert(['username' => 'test5', 'name' => 'tester5','address' => 'vkulp tester5','contact' => '999999999','email' => 'test5@test.com','password' => 'testing5']);

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
