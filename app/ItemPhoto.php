<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemPhoto extends Model
{
    protected $table = 'menu_item_photo';
    protected $fillable = ['path','menu_item_id'];
}
