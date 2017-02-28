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

    public function items()
    {
        return $this->hasMany('App\Item','restaurant_id');
    }
    public function inventory_items()
    {
        return $this->hasMany('App\InventoryItem');
    }
    public function suppliers()
    {
        return $this->hasMany('App\Supplier');
    }
    public function storages()
    {
        return $this->hasMany('App\Storage');
    }
    public function purchase_restriction()
    {
        return $this->hasOne('App\PurchaseRestriction');
    }
    // public function categoryItems($category_id)
    // {
    //     return $this->belongsToMany('App\Item','menu_item_category')->where('menu_item_category.category_id',$category_id);
    
    // }    
    // public function sides()
    // {
    //     return 
    //     \DB::select(
    //         '
    //         select `menu_items`.* from `menu_items` WHERE menu_items.id in (SELECT `menu_item_category`.`item_id` FROM menu_item_category WHERE category_id=4 and menu_items.restaurant_id =
    //         '.$this->id.')'
    //         );
    // }
}
