<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Request;
use Input;
use DB;
use Auth;	
use Redirect;
class CartController extends BaseController
{
    use DispatchesJobs, ValidatesRequests;
 public function delete_from_cart($prod_id,$order_id) 
 {
        if (\Auth::check()) {      
            $email = \Auth::user()->email;       
 $qty =    DB::table('order_details')->where('detail_order_id',$order_id)->where('detail_product_id',$prod_id)->pluck('detail_quantity');
 $price = DB::table('order_details')->where('detail_order_id',$order_id)->where('detail_product_id',$prod_id)->pluck('detail_price');
 DB::table('order_details')->where('detail_order_id',$order_id)->where('detail_product_id',$prod_id)->delete();
 $amt= DB::table('orders')->where('order_id',$order_id)->pluck('order_amount');
 $chamt=$amt-($qty*$price);
 DB::table('orders')->where('order_id',$order_id)->update(['order_amount'=>$chamt]);
$products = DB::table('order_details')->where('detail_order_id',$order_id)->pluck('detail_product_id');
if(!$products)
{
 DB::table('orders')->where('order_id',$order_id)->delete();

}  

            return Redirect::to('cart');
            
        
        } else {
            return Redirect::to('/auth/login');
        }
    }

public function increment_quantity($prod_id,$order_id) 
 {
        if (\Auth::check()) {      
            $email = \Auth::user()->email;       
 $qty =    DB::table('order_details')->where('detail_order_id',$order_id)->where('detail_product_id',$prod_id)->pluck('detail_quantity');
 $price = DB::table('order_details')->where('detail_order_id',$order_id)->where('detail_product_id',$prod_id)->pluck('detail_price');
 $qty++;
 DB::table('order_details')->where('detail_order_id',$order_id)->where('detail_product_id',$prod_id)->update(['detail_quantity'=>$qty]);
 $amt= DB::table('orders')->where('order_id',$order_id)->pluck('order_amount');
 $chamt=$amt+$price;
 DB::table('orders')->where('order_id',$order_id)->update(['order_amount'=>$chamt]);

            return Redirect::to('cart');
            
        
        } else {
            return Redirect::to('/auth/login');
        }
    }

    public function decrement_quantity($prod_id,$order_id) 
 {
         if (\Auth::check()) {      
            $email = \Auth::user()->email;       
 $qty =    DB::table('order_details')->where('detail_order_id',$order_id)->where('detail_product_id',$prod_id)->pluck('detail_quantity');
 $price = DB::table('order_details')->where('detail_order_id',$order_id)->where('detail_product_id',$prod_id)->pluck('detail_price');
 $qty--;
 if($qty)
 {
 	
 	DB::table('order_details')->where('detail_order_id',$order_id)->where('detail_product_id',$prod_id)->update(['detail_quantity'=>$qty]);
	 $amt= DB::table('orders')->where('order_id',$order_id)->pluck('order_amount');
	 $chamt=$amt-$price;
	 DB::table('orders')->where('order_id',$order_id)->update(['order_amount'=>$chamt]);
}
else
{
	DB::table('order_details')->where('detail_order_id',$order_id)->where('detail_product_id',$prod_id)->delete();
	 $amt= DB::table('orders')->where('order_id',$order_id)->pluck('order_amount');
 	$chamt=$amt-($qty*$price);
	 DB::table('orders')->where('order_id',$order_id)->update(['order_amount'=>$chamt]);
	$products = DB::table('order_details')->where('detail_order_id',$order_id)->pluck('detail_product_id');
	if(!$products)
	{
 		DB::table('orders')->where('order_id',$order_id)->delete();

	}  

}
            return Redirect::to('cart');
            
        
        } else {
            return Redirect::to('/auth/login');
        }
    }
public function viewcart()
{
	if(\Auth::check())
	{
		$email = \Auth::user()->email;
		$userid = \Auth::user()->id;
		//dd($userid);
		
		$prodid = array();
		$order = DB::table('orders')->where('order_user_id',$userid)->where('order_shipped',0)->first();	
		if($order==null)
	{
		return \View::make('cart.empty_cart');
	}
		$order_detail = DB::table('order_details')->where('detail_order_id',$order->order_id)->get();
		$i=0;
		foreach ($order_detail as $ord) {
			 $prodid[]=$ord->detail_product_id;
		}
		$product = array(); 
		foreach ($prodid as $id) {
			 $product[] = DB::table('products')->where('id',$id)->first();
		}
		foreach ($product as $pro) {
			$order_product_v_cost = DB::table('order_details')->where('detail_order_id',$order->order_id)->where('detail_product_id',$pro->id)->pluck('detail_price');
			$landing_cost = DB::table('products')->where('id',$pro->id)->pluck('landing_cost');
			$supplier_price = DB::table('products')->where('id',$pro->id)->pluck('supplier_price');
			$margin = DB::table('products')->where('id',$pro->id)->pluck('margin');
			$v_cost = $landing_cost + ($supplier_price * $margin/100);
			if($v_cost!=$order_product_v_cost)
			{
				DB::table('order_details')->where('detail_order_id',$order->order_id)->where('detail_product_id',$pro->id)->update(['detail_price'=>$v_cost]);
			}
		}
		$nprodid = array();
		$norder_detail = DB::table('order_details')->where('detail_order_id',$order->order_id)->get();
		$i=0;
		foreach ($norder_detail as $ord) {
			 $nprodid[]=$ord->detail_product_id;
		}
		$nproduct = array(); 
		foreach ($nprodid as $id) {
			 $nproduct[] = DB::table('products')->where('id',$id)->first();
		}
$subtotal = 0;
$tottax = 0;
$payamt = 0;
$totalcost = array();
		for ($i=0;$i<count($nproduct);$i++) {
			 $totalcost[$i] = ($nproduct[$i]->tax +$norder_detail[$i]->detail_price) * $norder_detail[$i]->detail_quantity; 
		$subtotal += $norder_detail[$i]->detail_price * $norder_detail[$i]->detail_quantity;
		$tottax += $nproduct[$i]->tax * $norder_detail[$i]->detail_quantity;
		$payamt +=$totalcost[$i]; 
		}
$order_detail = $norder_detail;
$product = $nproduct; 

//dd($product);

		return \View::make('cart.cart',compact('order','order_detail','product','totalcost','subtotal','tottax','payamt'));
	}
	else
	{
		return Redirect::to('auth/login')->with('message','You need to login first');
	}
}

}