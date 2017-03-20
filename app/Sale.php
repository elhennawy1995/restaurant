<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'line_items';    	
    protected $guarded = ['id','created_at','updated_at'];
}
