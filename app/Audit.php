<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    protected $fillable = [
    	'id',
    	'user',
    	'bill',
    	'action',
    	'date'
    	 ];
}
