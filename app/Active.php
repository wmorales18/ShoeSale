<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Active extends Model
{
     protected $fillable = [
    	'id',
    	'name',
    	'descrition',
    	'value',
    	'type_active_id',
    	'branch_office_id'

      ];

   	public function typeactives(){//////nombreHija Plural
    		return $this->belongsTo(TypeActive::class,'type_active_id','id');
    }
    public function branchoffices(){//////nombreHija Plural
    		return $this->belongsTo(BranchOffice::class,'branch_office_id','id');
    }
}
