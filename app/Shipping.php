<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
     protected $fillable = [
    	'id',
    	'description',
    	'date'
    	 ];

	public function ShippingProducts(){
    		return $this->hasMany(ShippingProduct::class,'shipping_id','id');
 
   }

   public function total(){
       $total=0;
       foreach ($this->shippingproducts as $ShippingProduct) {
         $total+=$ShippingProduct->quantity;

       }
       return round($total);
    }

    
}

