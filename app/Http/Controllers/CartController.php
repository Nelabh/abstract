<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Request;
use Input;
use DB;
class CartController extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

public function viewcart()
{
	return \View::make('cart.cart');
}

}