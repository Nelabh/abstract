<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    protected $fillable = ['user_id','founders','ceo','key_people','share_holders','logo','is_public'];
    //
}
