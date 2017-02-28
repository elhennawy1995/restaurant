<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table='menu_items';
    protected $fillable= ['name','description','price','restaurant_id'];

    public function categories()
    {
        return $this->belongsToMany('App\Category','menu_item_category');
    }
    public function sides()
    {
        return $this->belongsToMany('App\Item','sides','item_id','side_id');
    }
    public function disposables()
    {
        return $this->belongsToMany('App\Item','disposables','item_id','disposable_id');
    }
    public function meal_types()
    {
        return $this->belongsToMany('App\MealType','menu_item_meal_type','item_id','type_id');
    }
    public function ingredients()
    {
        return $this->hasMany('App\ItemIngredient','menu_item_id');
    }
        
}
