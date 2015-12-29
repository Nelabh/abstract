<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public function getSubCategories($id){
        $subcategories = SubSubCategory::where('sub_category_id','=',$id)->get();
        return $subcategories;
    }
}
