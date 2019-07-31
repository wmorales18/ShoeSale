<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeShipping extends Model
{
    protected $fillable = [
    	'id',
    	'name'
    	 ];

	public function ShippingProducts(){
    		return $this->hasMany(ShippingProduct::class,'shipping_product_id','id');
    }
}