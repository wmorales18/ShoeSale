<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailBill extends Model
{
     protected $fillable = [
    	'id',
    	'quantity',
    	'subtotal',
    	'bill_id',
    	'product_inventory_id'
    	

      ];

   	public function bills(){//////nombreHija Plural
    		return $this->belongsTo(Bill::class,'bill_id','id');
    }
    public function productinventories(){//////nombreHija Plural
    		return $this->belongsTo(ProductInventory::class,'product_inventory_id','id');
    }
}
