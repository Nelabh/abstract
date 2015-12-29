<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function subcategory(){
        return $this->hasMany('App\SubCategory');
    }

    public function getSubCategories($id){
        $subcategories = SubCategory::where('category_id','=',$id)->get();
        return $subcategories;
    }
}
