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
$subtotal = 0;
$tottax = 0;
$payamt = 0;
$totalcost = array();
		for ($i=0;$i<count($product);$i++) {
			 $totalcost[$i] = ($product[$i]->tax +$order_detail[$i]->detail_price) * $order_detail[$i]->detail_quantity; 
		$subtotal += $order_detail[$i]->detail_price * $order_detail[$i]->detail_quantity;
		$tottax += $product[$i]->tax * $order_detail[$i]->detail_quantity;
		$payamt +=$totalcost[$i]; 
		}


//dd($product);

		return \View::make('cart.cart',compact('order','order_detail','product','totalcost','subtotal','tottax','payamt'));
	}
	else
	{
		return Redirect::to('auth/login')->with('message','You need to login first');
	}
}

}