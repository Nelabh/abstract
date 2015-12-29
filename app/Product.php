<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['user_id','category_id','sub_category_id','sub_sub_category_id','name','description','image','product_volume','product_unit','max_retail_price','package_type','package_volume','package_unit','min_order_quantity','active','sku_small','sku_medium','sku_large'];
    //
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function sub_category(){
        return $this->belongsTo('App\SubCategory');
    }

    public function sub_sub_category()
    {
        return $this->belongsTo('App\SubSubCategory');
    }
}
