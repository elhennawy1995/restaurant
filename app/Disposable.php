<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disposable extends Model
{
    protected $table='menu_items';
    public function items()
    {
        return $this->belongsToMany('App\Item','disposables','disposable_id','item_id');
    }
}
