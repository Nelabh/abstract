<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $fillable = ['user_id','parent_company','business_hours','transportation_mode','delivery_timings','credit_period','payment_mode','company_size','service_areas','service_industry'];
}
