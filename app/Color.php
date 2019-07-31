<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
 protected $fillable = [
    	'id',
    	'name'
    	 ];

	public function Products(){
    		return $this->hasMany(Product::class,'product_id','id');
    }
}
