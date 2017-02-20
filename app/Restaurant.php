<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $table="restaurants";
    protected $fillable = ['name','description','dine_in','to_go','delivery','breakfast',
    'brunch', 'lunch','dinner'];
    
    public function cuisines()
    {
        return $this->belongsToMany('App\Cuisine','restaurant_cuisine');
    }
    public function branches()
    {
        return $this->hasMany('App\Branch');
    }

    public function user()
    {
        return $this->belongsToMany('App\User');
    }
    	

    	
}
