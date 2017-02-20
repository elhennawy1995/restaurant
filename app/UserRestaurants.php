<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRestaurants extends Model
{
    protected $table="user_restaurants";      

    public function user()
    {
    	return $this->belongsToMany('App\User');
    }  
}
