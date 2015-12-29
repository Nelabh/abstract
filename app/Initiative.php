<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Initiative extends Model
{
    protected $fillable = ['user_id','environment_policy','is_small_disadvantaged_business','is_women_owned_business','is_minority_owned_business','is_army_veteran_owned_business','is_public'];
}
