<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierPurchasePeriod extends Model
{
    protected $table = 'suppliers_purchase_period';
    protected $fillable = ['period','active','supplier_id','unit_id'];

    public function period_unit()
    {
    	return $this->belongsTo('App\TimeUnit','unit_id');
    }
    	

}
