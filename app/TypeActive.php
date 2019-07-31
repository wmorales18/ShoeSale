<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeActive extends Model
{
    protected $fillable = [
    	'id',
    	'name',
    	'description'
    	 ];

	public function Actives(){
    		return $this->hasMany(Active::class,'active_id','id');
    }
}
