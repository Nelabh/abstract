<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Request;
use Input;
use DB;
class AjaxController extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

 public function add_to_cart() 
 {
        if (\Auth::check()) {
        	if(Request::ajax())
        	{

            $email = \Auth::user()->email;
            $id = Input::get('product_id');
            $data = DB::table('view_products')->where('id', $id)->get();
            $quantity = Input::get('quantity');
            $num = 0;
          $variant = DB::table('view_products')->where('parent_product_id', $data[0]->parent_product_id)->get();
           $parent_product_data = DB::table('parent_products')->where('id', $data[0]->parent_product_id)->get();
            $userid = Input::get('user_id');         
            $vcost = Input::get('vcost');
            $var = Input::get('variant');
            $var_varient = $variant[$var];
            $total = $vcost * $quantity;
            $name = DB::table('users')->where('email', $email)->pluck('name');
            $contact = DB::table('users')->where('email', $email)->pluck('phone');
            $username = DB::table('users')->where('email', $email)->pluck('username');
            $add1 = DB::table('meta')->where('email', $email)->pluck('address1');
            $add2 = DB::table('meta')->where('email', $email)->pluck('address2');
            $city = DB::table('meta')->where('email', $email)->pluck('city');
            $state = DB::table('meta')->where('email', $email)->pluck('state');
            $zip = DB::table('meta')->where('email', $email)->pluck('zipcode');
              $random = '';
            $length = 10;
    for($i = 0; $i < $length; $i++) {
        $random .= mt_rand(0, 9);
    }
    DB::table('orders')->insert(['order_user_id'=>$userid,'order_amount'=>$total,'order_ship_name'=>$name,'order_ship_address1'=>$add1,'order_ship_address2'=>$add2,'order_city'=>$city,'order_state'=>$state,'order_zip'=>$zip,'order_phone'=>$contact,'order_date'=>date("Y-m-d"),'order_shipped'=>0,'order_email'=>$email,'order_tracking_number'=>$random]);
    $order_id = DB::table('orders')->where('order_tracking_number', $random)->pluck('order_id');
    DB::table('order_details')->insert(['detail_order_id'=>$order_id,'detail_product_id'=>$id,'detail_name'=>$var_varient->variant_name,'detail_price'=>$vcost,'detail_quantity'=>$quantity]);
    DB::table('order_status')->insert(['order_id'=>$order_id,'order_tracking_number'=>$random,'order_status'=>"Order Placed. Processing..."]);

            return 1;
        }
        } else {
            return Redirect::to('/auth/login');
        }
    }

public function request_sample() 
 {
        if (\Auth::check()) {
            if(Request::ajax())
            {

            $email = \Auth::user()->email;
            $id = Input::get('product_id');
            $userid = Input::get('user_id');
           
    DB::table('order_sample')->insert(['product_id'=>$id,'requested_by'=>$userid]);
            return 1;
        }
        } else {
            return Redirect::to('/auth/login');
        }
    }
 
 public function delete_from_cart($prod_id,$order_id) 
 {
        if (\Auth::check()) {
            if(Request::ajax())
            {

            $email = \Auth::user()->email;
            
 $qty =    DB::table('order_details')->where('detail_order_id',$order_id)->where('detail_product_id',$prod_id)->pluck('detail_quantity');
 $price = DB::table('order_details')->where('detail_order_id',$order_id)->where('detail_product_id',$prod_id)->pluck('detail_price');
 DB::table('order_details')->where('detail_order_id',$order_id)->where('detail_product_id',$prod_id)->delete();
 $amt= DB::table('orders')->where('order_id',$order_id)->pluck('order_amount');
 $chamt=$amt-($qty*$price);
 DB::table('orders')->where('order_id',$order_id)->update(['order_amount'=>$chamt]);

            return 1;
        }
        } else {
            return Redirect::to('/auth/login');
        }
    }

   
}