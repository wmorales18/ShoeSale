<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPay extends Model
{
   protected $fillable = [
    	'id',
    	'total',
    	'type_pay_id',
    	'bill_id'

      ];

   	public function typepays(){//////nombreHija Plural
    		return $this->belongsTo(TypePay::class,'type_pay_id','id');
    }
    public function bills(){//////nombreHija Plural
    		return $this->belongsTo(Bill::class,'bill_id','id');
    }
}
