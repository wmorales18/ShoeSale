<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
     protected $fillable = [
    	'id',
    	'description',
    	'date',
    	'total_product'
    	 ];

	public function ShippingProducts(){
    		return $this->hasMany(ShippingProduct::class,'shipping_id','id');
    }
}

