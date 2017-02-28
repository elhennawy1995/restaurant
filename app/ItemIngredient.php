<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemIngredient extends Model
{
    protected $table = 'item_ingredient';
    protected $fillable = ['menu_item_id','inventory_item_id','unit','count_unit','amount'];

    public function inventory_item()
    {
        return $this->belongsTo('App\InventoryItem','inventory_item_id');
    }

    public function menu_item()
    {
        return $this->belongsTo('App\InventoryItem','menu_item_id');
    }

    public function count_unit()
    {
        return $this->belongsTo('App\InventoryCountUnit','count_unit_id');
    }

    public function unit()
    {
        return $this->belongsTo('App\Unit','unit_id');
    }
}
