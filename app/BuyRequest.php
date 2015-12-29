<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuyRequest extends Model
{
//    protected $table = 'buy_requests';
    protected $fillable = ['name','email','product_name','product_description','category_id','min_order_quantity','unit','subunit','preferred_unit_price','delivery_location'];
}