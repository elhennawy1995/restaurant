<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';
    protected $fillable = ['name','address','description','restaurant_id'];

    public function items()
    {
    	return $this->belongsToMany('App\InventoryItem','item_supplier','supplier_id','item_id');
    }

    public function restriction_period()
    {
    	return $this->belongsToMany('App\SupplierPurchasePeriod','suppliers_purchase_period',
            'supplier_id','item_id');
    }
    	
}
