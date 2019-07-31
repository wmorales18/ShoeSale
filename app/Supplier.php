<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
    	'id',
    	'name',
    	'description',
    	'phone',
    	 ];

	public function Products(){
    		return $this->hasMany(Product::class,'product_id','id');
    }


}
