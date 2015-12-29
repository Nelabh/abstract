<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = ['user_id','pan','vat','tan','tin','service_tax','cin','is_public','llp','reference','crn','crp','partners'];
    //
}
