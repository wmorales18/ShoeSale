<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingProduct extends Model
{
   protected $fillable = [
    	'id',
    	'quantity',
    	'type_shipping_id',
    	'shipping_id',
    	'product_inventory_id'
    	

      ];

   	public function typeshippings(){//////nombreHija Plural
    		return $this->belongsTo(TypeShipping::class,'type_shipping_id','id');
    }
    public function shippings(){//////nombreHija Plural
    		return $this->belongsTo(Shipping::class,'shipping_id','id');
    }
    public function productinventories(){//////nombreHija Plural
    		return $this->belongsTo(ProductInventory::class,'product_inventory_id','id');
    }
    }
