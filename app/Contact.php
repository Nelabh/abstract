<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['user_id','contact_name','designation','email','url','phone','corporate_address','registered_address'];
}
