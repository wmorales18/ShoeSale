<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
   protected $fillable = [
    	'id',
    	'name',
    	'surname',
    	'phone',
    	'address'
    	 ];

	public function bills(){
    		return $this->hasMany(Bill::class,'bill_id','id');
    }
}
