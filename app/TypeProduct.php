<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeProduct extends Model
{
    protected $fillable = [
    	'id',
    	'name',
    	'description'
    	 ];

	public function Products(){
    		return $this->hasMany(Product::class,'product_id','id');
    }
}
