<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    protected $table = 'storages';
    protected $guarded = ['id','created_at','updated_at','storage_items'];

    public function item()
    {
    	return $this->belongsToMany('App\InventoryItem','item_storage');
    }
    	
}
