<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Financial extends Model
{
    protected $fillable = ['user_id','annual_revenue','audit_file','credit_risk_rating','is_public'];
}
