<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryItem extends Model
{
    protected $table ='inventory_items';
    protected $guarded = ['id','created_at','updated_at'];

    public function purchase_unit()
    {
    	return $this->belongsTo('App\PurchaseUnit','purchase_unit_id');
    }
    public function category()
    {
    	return $this->belongsTo('App\InventoryCategory');
    }
    public function count_unit()
    {
        return $this->belongsTo('App\InventoryCountUnit','count_unit_id');
    }
    public function count_unit_size_unit()
    {
        return $this->belongsTo('App\Unit','cu_size_unit_id');
    }
    public function remaining_shelf_life_unit()
    {
        return $this->belongsTo('App\TimeUnit','remaining_shelf_life_unit_id');
    }
    public function suppliers()
    {
        return $this->belongsToMany('App\Supplier','item_supplier','item_id','supplier_id');
    }
    public function storage()
    {
        return $this->belongsToMany('App\Storage','item_storage');
    }
    	
}
