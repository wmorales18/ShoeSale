<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
     protected $fillable = [
    	'id',
    	'name',
    	'surname',
     	'salary',
    	'branch_office_id',
      'user_id'

      ];

   	public function branchoffices(){//////nombreHija Plural
    		return $this->belongsTo(BranchOffice::class,'branch_office_id','id');
    }
    public function users(){//////nombreHija Plural
        return $this->belongsTo(User::class,'user_id','id');
    }
    
}
