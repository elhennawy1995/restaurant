<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function restaurantItems($restaurant_id)
    {
        return $this->belongsToMany('App\Item','menu_item_category')->where('menu_items.restaurant_id',$restaurant_id);
 	
    }    	
}
