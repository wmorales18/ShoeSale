<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypePay extends Model
{
    protected $fillable = [
    	'id',
    	'name',
    	'description'
    	 ];

	public function DetailPays(){
    		return $this->hasMany(Product::class,'detail_pay_id','id');
    }
}

