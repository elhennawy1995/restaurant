<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Side extends Model
{
    protected $table='menu_items';
    public function items()
    {
        return $this->belongsToMany('App\Item','sides','side_id','item_id');
    }
}
