<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
   
     protected $fillable = [
    	'id',
    	'date',
    	'user_id',
    	'client_id'
      ];

   	public function clients(){//////nombreHija Plural
    		return $this->belongsTo(Client::class,'client_id','id');
    }
    public function detailbills(){
    		return $this->hasMany(DetailBill::class,'bill_id','id');
    		}
        public function users(){//////nombreHija Plural
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function total(){
       $total=0;
       foreach ($this->detailbills as $DetailBill) {
         $total+=$DetailBill->subtotal;

       }
       return round($total,2);
    }
}
