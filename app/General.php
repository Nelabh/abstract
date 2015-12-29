<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    protected $fillable = ['user_id','company_name','description','company_nature','organization_type','year_of_inception'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
