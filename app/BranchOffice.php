<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BranchOffice extends Model
{
    protected $fillable = [
    	'id',
    	'name',
    	'phone',
    	'address',
    	 ];

	public function employees(){
    		return $this->hasMany(Employee::class,'branch_office_id','id');
    		}
    public function actives(){
    		return $this->hasMany(Active::class,'branch_office_id','id');
    		}
    public function productinventories(){
    		return $this->hasMany(ProductInventory::class,'branch_office_id','id');
    		}


        public function totalactivo(){
       $totalactivo=0;
       foreach ($this->actives as $active) {
         $totalactivo+=$active->value;

       }
       return round($totalactivo,2);
        }


    public function totalnomina(){
       $totalnomina=0;
       foreach ($this->employees as $employee) {
         $totalnomina+=$employee->salary;

       }
       return round($totalnomina,2);
        }

    
}
