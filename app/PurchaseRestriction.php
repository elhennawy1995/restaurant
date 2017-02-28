<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseRestriction extends Model
{
    protected $table = 'purchase_restrictions';
    protected $fillable = ['max_budget','active','restaurant_id'];
}
