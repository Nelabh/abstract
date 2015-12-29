<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistrationImages extends Model
{
      protected $fillable = array('user_id', 'image_name', 'active');
}
